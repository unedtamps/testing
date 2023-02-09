<?php 

$conn= mysqli_connect("localhost","unedo","Anjing123*","phpdasar") ;
function query($query){
    global $conn ;
    $res = mysqli_query($conn,$query) ;
    $rows = [] ;
    while($row = mysqli_fetch_assoc($res)){
        $rows[] = $row;
    }
    return $rows ;
}



function adds($data){
    global $conn ;
    $Nama = htmlspecialchars($data["Nama"]) ;
    
    $Tahun = htmlspecialchars($data["Tahun"]) ;
    $Sumber = htmlspecialchars($data["Sumber"]) ;
    $Detail = htmlspecialchars($data["Detail"]) ;


    //upload gambar
    $Gambar = upload();
    if(!$Gambar){
        return false ;
    }
    $sql = "INSERT INTO memes (Nama,Gambar,Tahun,Sumber,Detail)
                       VALUES 
            ('$Nama','$Gambar',$Tahun,'$Sumber','$Detail')" ;
            
     mysqli_query($conn,$sql) ;
     return mysqli_affected_rows($conn) ;
}

function upload(){
    $filename = $_FILES['Gambar']['name'] ;
    $filesize = $_FILES['Gambar']['size'] ;
    $fileerror = $_FILES['Gambar']['error'] ;
    $filetmp = $_FILES['Gambar']['tmp_name'] ;

    //check if already uploaded
    if ($fileerror == 4) {
        echo "<script>
                alert('upload the file first')
                </script>";
        return false ;
    }

    //check if they upload a image

    $validextension = ['jpg','jpeg','png','gif'] ;
    $extension = explode('.',$filename) ;
    $extension = strtolower(end($extension)) ;
    if(!in_array($extension,$validextension)){
        echo "<script>
        alert('file yang diupload bukan img')
        </script>" ;
        return false ;
    }

    //ukurannya terlau besar
    if($filesize > 500000){
        echo "<script>
        alert('file yang diupload terlalu besar bozz')
        </script>" ;
        return false ;
    }
    // ganti nama file nya dulu
    $newfilename = uniqid() ;
    $newfilename .= '.' ;
    $newfilename .= $extension ;
    //ready to upload
    move_uploaded_file($filetmp,'memedatabase/'. $newfilename);
    return $newfilename ;
}



function delete($id){
    global $conn ;
    mysqli_query($conn,"DELETE FROM memes WHERE ID = $id") ;
    return mysqli_affected_rows($conn) ;
}

function change($data)
{
    global $conn ;
    $id = $data["ID"] ;
    $Nama = htmlspecialchars($data["Nama"]) ;
    
    $Tahun = htmlspecialchars($data["Tahun"]) ;
    $Sumber = htmlspecialchars($data["Sumber"]) ;
    $Detail = htmlspecialchars($data["Detail"]) ;
    $Gambarlama = htmlspecialchars($data["Gambarlama"]) ;
    
    if ($_FILES['Gambar']['error'] === 4) {
        $Gambar = $Gambarlama ;
    } else {
        $Gambar = upload();
    }
    $sql = "UPDATE memes SET
            Nama = '$Nama',
            Gambar ='$Gambar',
            Tahun = $Tahun,
            Sumber ='$Sumber',
            Detail ='$Detail' 

            WHERE ID = $id ;
            ";
            
     mysqli_query($conn,$sql) ;
     return mysqli_affected_rows($conn) ;
}

function search($keyword){
    $sql = "SELECT * FROM memes WHERE 
            Nama LIKE '%$keyword%' OR 
            Gambar LIKE '%$keyword%' OR 
            Tahun LIKE '%$keyword%' OR 
            Sumber LIKE '%$keyword%' OR 
            Detail LIKE '%$keyword%'
            
    ";
    return query($sql) ;
}

function register($data){
    global $conn ;

    $username = strtolower(stripslashes($data["username"])) ;
    $password = mysqli_real_escape_string($conn,$data["password"]) ; //passwrod ada tanda kutip dimasukkan ke sql 
    $confirm = mysqli_real_escape_string($conn,$data["confirm"]) ;
    // chek username udah ada atau belum
    $same = mysqli_query($conn,"SELECT username FROM user WHERE username = '$username'") ;

    if(mysqli_fetch_assoc($same)){
        echo "<script>
        alert('username udah ada')
        </script>" ;
        return false ;
    } 

    if($password !== $confirm){
        echo "<script>
            alert('komfirmasi tidak sesuai') ;
        </script>" ;
        return false ;
    }

    //enkripsi password 

    $password = password_hash($password,PASSWORD_DEFAULT) ;

    //Tambahkan ke database

    mysqli_query($conn,"INSERT INTO user (username,password) VALUE('$username','$password')") ;

    return mysqli_affected_rows($conn) ;
}
?>