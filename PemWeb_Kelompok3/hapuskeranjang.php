<?php 
session_start();
require "./aksi/koneksi.php";

date_default_timezone_set("Asia/Makassar");
$date = date('Y/m/d');

if (isset($_GET["id"])) {
    $idkeranjang = $_GET["id"];
    
    
    $result = mysqli_query($conn, "delete from keranjang where id_keranjang = '$idkeranjang'"); 

    $cek = mysqli_query($conn, "select * from keranjang where id_keranjang = '$idkeranjang'");
    if(mysqli_num_rows($cek) === 0){
        header("Location: keranjang.php");
        exit;
    }
}
else{
    header("Location: keranjang.php");
}