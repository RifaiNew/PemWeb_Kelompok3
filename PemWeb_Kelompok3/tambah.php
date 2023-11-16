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
    if (isset($_POST["tambah"])){
        $nama = $_POST["nama_game"];
        $produk = $_POST["produk"];
        $harga = $_POST["harga"]; 

        if($harga < 0){
            echo"
            <script>
                alert('Data Gagal Ditambahkan!');
                document.location.href = 'tambah.php';
            </script>";
        }
        else{
            $results = mysqli_query($conn, "insert into game (id_game, nama_game, produk, harga) values ('', '$nama', '$produk', '$harga')");
            if ($results) {
                echo "
                        <script>
                            alert('Data Berhasil Ditambahkan!');
                            document.location.href = 'formadmin.php';
                        </script>
                    ";
            }
            else {
                echo error_log($results) . "
                <script>
                    alert('Data Gagal Ditambahkan!');
                    document.location.href = 'tambah.php';
                </script>
                ";
            }
        }
    }
}
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./style/styleinput.css">
    <title>Document</title>
    
</head>
<body>

    <div>
        <h1>Tambah Data</h1>
        <form action="" method="post">
            <label for="">Masukkan Nama Game</label>
            <input type="text" value="" name="nama_game" required><br>
            <label for="">Produk</label>
            <input type="text" value="" name="produk" required>
            <label for="">Harga</label>
            <input type="number" value="Harga" name="harga" required>
            <input type="submit" name="tambah" value="tambah">
        </form>
    </div>
    <a href="formadmin.php">kembali</a>
    
</body>
</html>