<?php 
 require '../main/functions.php' ;
 $keyword = $_GET["keyword"] ;

 $query = "SELECT * FROM memes WHERE 
            Nama LIKE '%$keyword%' OR 
            Gambar LIKE '%$keyword%' OR 
            Tahun LIKE '%$keyword%' OR 
            Sumber LIKE '%$keyword%' OR 
            Detail LIKE '%$keyword%'
 
";
 $meme = query($query) ;

?>

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