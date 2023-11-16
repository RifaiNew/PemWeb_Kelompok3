<?php
session_start();
require "./aksi/koneksi.php";

if($_SESSION['username'] != "admin"){
    header('Location: login.php');
    exit;
}

if(isset($_GET['keyword'])){
    $keyword = $_GET['keyword'];
    $result = mysqli_query($conn, "SELECT * FROM game WHERE nama_game LIKE '%$keyword%'");
} else {
    $result = mysqli_query($conn, "SELECT * FROM game");
}

$game = [];

while ($row = mysqli_fetch_assoc($result)) {
    $game[] = $row;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./style/formadmin.css">
    <title>Form Admin</title>
</head>

<body>
    <div class="fContainer">
        <nav class="wrapper">
            <div class="brand">
                <div class="firstname">PlayPoint</div>
                <div class="lastname">Store</div>
            </div>
            <ul class="navigation">
                <li><a href="historyuser.php">Histoy User</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </div>
    <h1>Data game</h1>
    <form action="" method="get">
        <a href="tambah.php" class="Tambah">Tambah</a><br><br><br>
        <input type="text" name="keyword" id="">
    </form>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Game</th>
            <th>Produk</th>
            <th>Harga</th>
            <!-- <th>Gambar</th> -->
            <th colspan="2">Aksi</th>
        </tr>
        <?php $i = 1;
        foreach ($game as $gm) : ?>
            <tr>
                <td> <?= $i; ?> </td>
                <td> <?php echo $gm["nama_game"] ?> </td>
                <td> <?= $gm["produk"] ?> </td>
                <td> <?= $gm["harga"] ?> </td>
                <!-- <td> <img src="img/<?= $gm['gambar'] ?>" alt="ini gambar" width="50px" height="50px"> </td> -->
                <td><a href="edit.php?id=<?=$gm["id_game"];?>">Edit</a></td>
                <td><a href="hapus.php?id=<?=$gm["id_game"];?>" onclick="return confirm('Apa Anda Yakin ingin menghapus data ini ?')">hapus</a></td>
            </tr>
        <?php $i++;
        endforeach; ?>
    </table>
    
</body>
</html>