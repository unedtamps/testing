<?php 

    require 'functions.php' ;
    if (isset($_POST["register"])) {
        
        if(register($_POST) > 0 ){
            echo "<script>
            alert('Berhasil membuat akun!')
            </script>"
            ;
        }
        else{
            echo mysqli_error($conn) ;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link rel="stylesheet" href="../style/registerstyle.css">
</head>
<body>
    <div class="main">
    <div class="subcontent">

    </div>
    <div class="content">
    <h1>Halaman Registrasi</h1>
    <form action="" method="post">
        <ul>
            <li>
                <label id="usepass" for="username">Username</label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label id="usepass" for="password">Password</label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <label id="usepass" for="confirm">Konfirmasi Password</label>
                <input type="password" name="confirm" id="confirm">
            </li>
            <li>
                <button type="submit" name="register">Registrasi</button>
            </li>
            <li>kembali ke halaman login</li>
            <li>
                <button><a href="login.php
                ">Login</a></button>
            </li>
        </ul>
    </form>
    </div>
    </div>
</body>
</html>