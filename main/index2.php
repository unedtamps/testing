<?php 

session_start() ;
//cek session
if(!isset($_SESSION["login"]))
{
    header(("Location: login.php")) ;
    exit;
}
//Koneksi ke database
require 'functions.php' ;
$meme = query("SELECT * FROM memes ORDER BY ID ASC") ;

if (isset($_POST["cari"])) {
    $meme = search($_POST["keyword"]) ;
}
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
</head>
<body>
    <a href="logut.php">Logout</a>
    <h1>Daftar Meme</h1>
     <a href="add.php">Add Meme</a>
     <br>
     <form action="" method="post">
        <input type="text" name="keyword" size="40px" autofocus placeholder="ketik keyword meme" autocomplete="off" id="keyword">
        <button type="submit" name="cari" id="tombol-cari">Cari</button>
    </form>
    <br>
    <div id="container">
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Nama</th> 
            <th>Gambar</th>
            <th>Tahun</th>
            <th>Sumber</th>
            <th>Detail</th>
        </tr>
        <?php $i = 1 ; ?>
        <?php foreach($meme as $row) : ?>
            
        <tr>
            <td><?php echo $i ;?></td>
            <td>
                    <a href="ubah.php?ID=<?php echo $row["ID"]?>">Ubah</a>
                    <a href="hapus.php?ID=<?php echo $row["ID"] ?>" onclick="return confirm('sure?')";>Hapus</a>
            </td>
            <td><?php echo $row["Nama"] ;?></td>
            <td><img src="memedatabase/<?php echo $row["Gambar"]?>" alt="#" width="300px" ></td>
            <td><?php echo $row["Tahun"] ;?></td>
            <td><?php echo $row["Sumber"] ;?></td>
            <td><?php echo $row["Detail"] ?></td>
        </tr>
        <?php $i++; ?>
        <?php endforeach  ; ?>
    </table>
    </div>
    <script src="js/index.js"></script>
</body>
</html>