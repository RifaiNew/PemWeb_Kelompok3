<?php
session_start();
require "./aksi/koneksi.php";

if($_SESSION['username'] == "admin"){
    $username = $_SESSION['username'];
    if(isset($_GET['keyword'])){
        $keyword = $_GET['keyword'];
        $result = mysqli_query($conn, "SELECT * from pembayaran pbr
        join user usr on pbr.id_user = usr.id_user
        join game gm on pbr.id_game = gm.id_game
        where usr.username LIKE '%$keyword%'");
    } else {
        $result = mysqli_query($conn, "SELECT * from pembayaran pbr
        join user usr on pbr.id_user = usr.id_user
        join game gm on pbr.id_game = gm.id_game
        order by pbr.id_game
         ");
    }
}
else if(isset($_SESSION['login'])){
    $username = $_SESSION['username'];
    if(isset($_GET['keyword'])){
        $keyword = $_GET['keyword'];
        $result = mysqli_query($conn, "SELECT * from pembayaran pbr
        join user usr on pbr.id_user = usr.id_user
        join game gm on pbr.id_game = gm.id_game
        where gm.nama_game LIKE '%$keyword%' and usr.username = '$username'");
    } else {
        $result = mysqli_query($conn, "SELECT * from pembayaran pbr
        join user usr on pbr.id_user = usr.id_user
        join game gm on pbr.id_game = gm.id_game
        where usr.username = '$username'
         ");
    }
}
else{
    header('Location: login.php');
    exit;
}


$history = [];

while ($row = mysqli_fetch_assoc($result)) {
    $history[] = $row;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/formadmin.css">
    <title>History Pemesanan</title>
</head>

<body>
    <div class="fContainer">
        <nav class="wrapper">
            <a href="index.php">
                <div class="brand">
                    <div class="firstname">PlayPoint</div>
                    <div class="lastname">Store</div>
                </div>
            </a>
            <ul class="navigation">
                <?php 
                    if(isset($notlogin)){
                        echo "<li><a href='regis.php'>Regis</a></li>";
                        echo "<li><a href='login.php'>Login</a></li>";
                    }
                    else{
                        echo "<li><a href='#'>".$_SESSION["username"]."</a></li>";
                        echo "<li><a href='keranjang.php'>Keranjang</a></li>";
                        echo "<li><a href='historyuser.php'>History User</a></li>";
                        echo "<li><a href='logout.php'>Logout</a></li>";
                    }
                ?>
            </ul>
        </nav>
    </div>
    <h1>Riwayat Pemesanan</h1>
    <form action="" method="get">
        <input type="text" name="keyword" id="">
    </form>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Username</th>
            <th>Nama Game</th>
            <th>Produk</th>
            <th>Jumlah</th>
            <th>Total</th>
            <th>Game ID</th>
            <th>Tanggal Pembayaran</th>
            <th>Email</th>
        </tr>
            <?php $i = 1;
        foreach ($history as $htr) : ?>
            <tr>
                <td><?= $i; ?> </td>
                <td><?php echo $htr["username"] ?> </td>
                <td><?= $htr["nama_game"] ?></td>
                <td><?php echo $htr["produk"] ?></td>
                <td><?php echo $htr["jumlah"] ?></td>
                <td><?php echo $htr["total"] ?></td>
                <td><?= $htr["gameid"] ?></td>
                <td><?= $htr["tanggal_bayar"] ?></td>
                <td><?= $htr["email"] ?> </td>
            </tr>
            <?php $i++;
        endforeach; ?>
    </table>
</body>
</html>