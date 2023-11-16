<?php 
session_start();
require "./aksi/koneksi.php";

date_default_timezone_set("Asia/Makassar");
$date = date('Y/m/d');

if (isset($_GET["id"])) {
    $idgame = $_GET["id"];
    $result = mysqli_query($conn, "select * from game where id_game = '$idgame'");
    $game = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $game[] = $row;
    }
    $game = $game[0];
    
    if(mysqli_num_rows($result) === 0){
        header("Location: index.php");
        exit;
    }
    
    if (isset($_POST["pesan"])){
        $iduser = $_SESSION['id'];
        $id_in_game = $_POST["id_in_game"];
        $email = $_POST["email"];
        $harga = $game['harga']; 
    
        $results = mysqli_query($conn, "insert into pembayaran 
        (id_pembayaran, id_user, id_game, gameid, jumlah, total, tanggal_bayar, email) 
        values ('', '$iduser', '$idgame', '$id_in_game', 1, '$harga', '$date', '$email')");
        if ($results) {
            echo "
                    <script>
                        alert('Data Berhasil Dipesan!');
                        document.location.href = 'index.php';
                    </script>
                ";
        }
        else {
            echo error_log($result) . "
            <script>
                alert('Data Gagal Ditambahkan!');
                document.location.href = 'index.php';
            </script>
            ";
        }
    }
    
}
else{
    header("Location: index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <div>
        <h1>Anda Akan Membeli</h1>
        <?=$game["nama_game"]?>
        <?=$game["produk"]?>
        <?=$game["harga"]?>
        <form action="" method="post">
            <label for="">Masukkan Id In Game</label>
            <input type="number" value="Masukkan ID" name="id_in_game"><br>
            <label for="">Email Anda</label>
            <input type="email" value="<?php echo $_SESSION["email"]?>" name="email">
            <input type="submit" name="pesan" value="PESAN">
        </form>
    </div>
    <a href="index.php">kembali</a>
    
</body>
</html>