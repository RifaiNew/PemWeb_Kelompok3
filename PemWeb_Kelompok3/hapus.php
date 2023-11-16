<?php 
session_start();
require "./aksi/koneksi.php";

date_default_timezone_set("Asia/Makassar");
$date = date('Y/m/d');

if($_SESSION['username'] != "admin"){
    header('Location: login.php');
    exit;
}
else{
    if (isset($_GET["id"])) {
        $idgame = $_GET["id"];
        
        
        $result = mysqli_query($conn, "delete from game where id_game = '$idgame'"); 
    
        $cek = mysqli_query($conn, "select * from game where id_game = '$idgame'");
        if(mysqli_num_rows($cek) === 0){
            header("Location: formadmin.php");
            exit;
        }
    }
    else{
        header("Location: formadmin.php");
    }
}
