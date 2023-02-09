<?php 
session_start() ;
//cek session
if(!isset($_SESSION["login"]))
{
    header(("Location: login.php")) ;
    exit;
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/about.css">
    <title>About</title>
</head>

<body>
        <div class="container">
        <h1>Tentang / About</h1>
   
    
        <h2>Konten</h2>
        <p>Konten dalam website ini berisi "root of meme" atau meme material yang ada di internet selama ini dari sepanjang waktu</p>
    
        <h2>Fungsi</h2>
        <p>Dalam website ini anda bisa mengupdate,menghapus,mencari serta menambah meme material yang kalian temukan diinternet atau yang kalian ketahui. Website ini dapan melakukan CRUD</p>
        </div>

</body>

</html>