<?php

session_start();
//cek session
if (!isset($_SESSION["login"])) {
    header(("Location: login.php"));
    exit;
}
//Koneksi ke database
require 'functions.php';
$meme = query("SELECT * FROM memes ORDER BY ID ASC");

if (isset($_POST["cari"])) {
    $meme = search($_POST["keyword"]);
}
?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/index2.css">
    <title>Halaman Admin</title>
</head>

<body>
    <h1>Root Of Meme</h1>
    <nav>
        <span><a href="logut.php">Logout</a></span>
        <span><a href="about.php">About</a></span>
        <span><a href="add.php">Add Meme</a></span>
    </nav>
    <form action="" method="post">
        <input type="text" name="keyword" size="40px" autofocus placeholder="ketik keyword meme" autocomplete="off" id="keyword">
        <button type="submit" name="cari" id="tombol-cari">Cari</button>
    </form>

    <div id="container">
    
        <?php foreach ($meme as $row) : ?>
            
            <div class="main">
            <h2><?php echo $row["Nama"]; ?></h2>
            <div class="mainnav">
            <span><a href="ubah.php?ID=<?php echo $row["ID"] ?>">Ubah</a></span>
            <span><a href="hapus.php?ID=<?php echo $row["ID"] ?>" onclick="return confirm('sure?')" ;>Hapus</a></span>
            </div>
            <div class="maincontent">
            <img src="../memedatabase/<?php echo $row["Gambar"] ?>" alt="#" width="300px">
            <h4>Tahun : <?php echo $row["Tahun"]; ?></h4>
            <h4>Sumber : <?php echo $row["Sumber"]; ?></h4>
            <div id="detail">
            <h4>Detail</h4>
            <p><?php echo $row["Detail"] ?></p>
            </div>
            </div>
            </div>
        <?php endforeach; ?>
        
    </div>
    <script src="../js/index.js"></script>
</body>

</html>