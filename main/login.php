<?php 
session_start() ;
require 'functions.php' ;
//check cookie
if(isset($_COOKIE['ID']) && isset($_COOKIE['key'])){
    $ID = $_COOKIE['ID'] ;
    $key = $_COOKIE['key'] ;
    $res = mysqli_query($conn,"SELECT username FROM user WHERE ID = $ID") ;

    $row = mysqli_fetch_assoc($res) ;
    if($key === hash('sha256',$row['username'])) {
        $_SESSION['login'] = true ;
    }
 }

if(isset($_SESSION["login"]))
{
    header("Location: index.php") ;
    exit;
}

if(isset($_POST["login"])){

    $username = $_POST["username"] ;
    $password = $_POST["password"] ;

    $res = mysqli_query($conn,"SELECT * FROM user WHERE username = '$username'" ) ;

    if(mysqli_num_rows($res) === 1) // ada berapa baris yang dikembalikan select = 1
    {
        //cek password 
        $row = mysqli_fetch_assoc($res) ;
       if ( password_verify($password,$row["password"])) {
        //set session
        $_SESSION["login"] = true ;

        // cek remember me
        if(isset($_POST["remember"])){
            //buat cookie

           setcookie('ID',$row['ID'],time()+60) ;
           setcookie('key',hash('sha256',$row['username']),time()+60);
        }
        header("Location: index.php") ;
       }

    }

    $err = true ;
    

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../style/loginstyle.css">
</head>
<body>

    <div class="main">
    <div class="subcontent">

    </div>
    <div class="content">
    <h1>Halaman Login</h1>
    
    <?php if(isset($err)) :?>
        <script>alert('Username atau password salah')</script>
        <?php endif ; ?>
    <form action="" method="post">
        <ul>
            <li >
                <label id="usepass" for="username">Username</label>
                <input type="text" name="username" id="username">
            </li>
            <li >
                <label id="usepass" for="password">Password</label>
                <input type="password" name="password" id="password">

            </li>
            <li>
                
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Ingat?</label>
            </li>
            <li>
                <button type="submit" name="login">Kirim</button>
            </li>
            <li>belum punya akun?</li>
            <li>
                <button><a href="registrasi.php">Registrasi</a></button>
            </li>

        </ul>

    </form>
    </div>
    </div>
</body>
</html>