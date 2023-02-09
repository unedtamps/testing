<?php 

session_start() ;
//cek session
if(!isset($_SESSION["login"]))
{
    header(("Location: login.php")) ;
    exit;
}
    require 'functions.php' ;
        if(isset($_POST["Submit"])){
            if(adds($_POST) > 0 ){
                echo "<script>
                    alert('add berhasil dibuat!') ;
                    document.location.href='index2.php';
                </script>";
            }
            else{
                echo "
                <script>
                    alert('add gagal dibuat!') ;
                    document.location.href='index2.php';
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
    <title>Add Memes</title>
    <link rel="stylesheet" href="../style/add.css">
</head>
<body>
    
    <div class="container">
    <h1>Tambahkan Meme</h1>
    <form action=""  method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="Nama">Nama Meme</label>
                <input type="text" name="Nama" id="Nama" require>
            </li>
            <li>
                <label for="Gambar">Gambar</label>
                <input type="file" name="Gambar" id="Gambar" require>
            </li>
            <li>
                <label for="Tahun">Tahun Meme</label>
                <input type="text" name="Tahun" id="Tahun" require>
            </li>
            <li>
                <label for="Sumber">Sumber Meme</label>
                <input type="text" name="Sumber" id="Sumber" require>
            </li>
            <li>
                <label for="Detail">Detail Meme</label>
                <input type="text" name="Detail" id="Detail" require>
            </li>

            <button  type="submit" name="Submit">Submit</button>
        </ul>

    </form>
    </div>
</body>
</html>