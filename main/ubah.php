<?php 
session_start() ;
//cek session
if(!isset($_SESSION["login"]))
{
    header(("Location: login.php")) ;
    exit;
}
    require 'functions.php' ;

    //take id
    $id = $_GET["ID"] ;

    //query berdasarkan id
    $meme = query("SELECT * FROM memes WHERE ID = $id")[0] ;
    
  
        if(isset($_POST["Submit"])){
            if(change($_POST) > 0 ){
                echo "<script>
                    alert('change berhasil dibuat!') ;
                    document.location.href='index.php';
                </script>";
            }
            else{
                echo "
                <script>
                    alert('change gagal dibuat!') ;
                    document.location.href='index.php';
                </script>
                ";
            }
        }
            
      
    
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Memes</title>
    <link rel="stylesheet" href="../style/add.css">
</head>
<body>
    
    <div class="container">
    <h1>Ubah Meme Kamu</h1>
    <form action=""  method="post" enctype="multipart/form-data" >
        <ul>
            <input type="hidden" name="ID" value="<?php echo $meme["ID"];?>" >
            <input type="hidden" name="Gambarlama" value="<?php echo $meme["Gambar"];?>" >
            <li>
                <label for="Nama">Nama Meme</label>
                <input type="text" name="Nama" id="Nama" required value="<?php echo $meme["Nama"];?>">
            </li>
            <li>
                <label for="Gambar">Gambar</label>
                <img src="../memedatabase/<?php echo $meme["Gambar"]?>" alt="" width="100px">
                <br>
                <input type="file" name="Gambar" id="Gambar" >
            </li>
            <li>
                <label for="Tahun">Tahun Meme</label>
                <input type="text" name="Tahun" id="Tahun" required value="<?php echo $meme["Tahun"];?>">
            </li>
            <li>
                <label for="Sumber">Sumber Meme</label>
                <input type="text" name="Sumber" id="Sumber" required value="<?php echo $meme["Sumber"];?>">
            </li>
            <li>
                <label for="Detail">Detail Meme</label>
                <input type="text" name="Detail" id="Detail" required value="<?php echo $meme["Detail"];?>">
            </li>

            <button  type="submit" name="Submit">Submit</button>
        </ul>

    </form>
    </div>
</body>
</html>