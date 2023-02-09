<?php 
session_start() ;
//cek session
if(!isset($_SESSION["login"]))
{
    header(("Location: login.php")) ;
    exit;
}
require 'functions.php' ;
 $id = $_GET["ID"] ;
 if(delete($id)>0){
    echo "<script>
    alert('delete berhasil dilakukan!') ;
    document.location.href='index.php';
</script>";
 } else{
    echo "<script>
    alert('delete gagal dilakukan!') ;
    document.location.href='index.php';
</script>";
 }

?>