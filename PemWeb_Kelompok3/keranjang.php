<?php
session_start();
require "./aksi/koneksi.php";

if($_SESSION['username'] == 'admin'){
    header('Location: index.php');
    exit;
}

if(isset($_SESSION['login'])){
    if(isset($_GET["id"])){
        $idgame = $_GET["id"];
        $iduser = $_SESSION['id'];
        $result = mysqli_query($conn, "select * from game where id_game = '$idgame'");
        $results = mysqli_query($conn, "insert into keranjang 
        (id_keranjang, id_user, id_game, jumlah) 
        values ('', '$iduser', '$idgame', 1)");
        if ($results) {
            echo "
                <script>
                    alert('Berhasil Dipesan!');
                    document.location.href = 'keranjang.php';
                </script>
            ";
            exit;
        }
        else {
            echo error_log($result) . "
            <script>
                alert('Data Gagal Ditambahkan!');
                document.location.href = 'index.php';
            </script>
            ";
            exit;
        }  
    }
    else{
        $username = $_SESSION['username'];
        $result = mysqli_query($conn, "SELECT * from keranjang krj
        join user usr on krj.id_user = usr.id_user
        join game gm on krj.id_game = gm.id_game
        where usr.username = '$username'
        ");
    }
}
else{
    header('Location: index.php');
    exit;
}

$games = [];

while ($row = mysqli_fetch_assoc($result)) {
    $games[] = $row;
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/keranjang.css">
    <title>Keranjang</title>
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
                    
    <div class="container">
        <form action="pesankeranjang.php" method="post">
            <div class="up-content">
                <h1>Keranjang</h1>
                <input type="submit" name="pesan" value="Pesan">
            </div>
            <table>
                <tr class="title-div">
                    <th class="check">Check</th>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Game ID</th>
                    <th class="aksi">Aksi</th>
                </tr>
<?php $i = 1;
foreach ($games as $game) { 
?>
                <tr class="custom-div">
                    <td class="check">
                        <input type="checkbox" id="<?= "element",$i ?>" name="check[]" value="
                            <?php echo $game["id_keranjang"] ?>,
                            <?php echo $game["id_user"] ?>,
                            <?= $game['id_game'] ?>,
                            <?= $game['harga'] ?>
                        ">
                    </td>
                        <td>
                            <label class="label" for="<?= "element",$i ?>">
                                <p><?= $game["nama_game"] ?></p>
                                <p><?php echo $game["produk"] ?></p>
                            </label>
                        </td>
                        <td class="input">
                            <label class="label" for="<?= "element",$i ?>">
                                Rp.<?php echo $game["harga"] ?>
                            </label>
                        </td>
                        <td class="input">
                            <input type="hidden" value="<?=$game["id_keranjang"];?>" name="idgameubah[]">
                            <input type="number" value="<?php echo $game["jumlah"] ?>" name="jumlah[]">
                        </td>
                        <td class= "input">
                            <input type="text" value="<?php echo $game["gameid"] ?>" name="gameid[]">
                        </td>
                        <td class = "aksi">
                            <a href='hapuskeranjang.php?id=<?=$game["id_keranjang"];?>'>Hapus</a>
                        </td>
                </tr>
<?php $i++; } ?>
            </table>
        </form>
    </div>
    
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-section about">
            <h2>About</h2>
            <p>Website ini menyediakan layanan top-up untuk berbagai game populer. Kami berkomitmen untuk memberikan pengalaman terbaik kepada para gamer dalam melakukan transaksi pembelian diamond, coin, dan item permainan lainnya.</p>
            <div class="contact">
                <span><i class="fas fa-phone"></i> 123-456-789</span>
                <span><i class="fas fa-envelope"></i> info@PlayPointStore.com</span>
            </div>
            <div class="socials">
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
            </div>
            </div>

            <div class="footer-section links">
            <h2>Quick Links</h2>
            <ul>
                <li><a href="#">Beranda</a></li>
                <li><a href="#">Permainan</a></li>
                <li><a href="#">Tentang Kami</a></li>
                <li><a href="#">Kontak</a></li>
                <li><a href="#">Kebijakan Privasi</a></li>
            </ul>
            </div>
        </div>

        <div class="footer-bottom">
            &copy; 2023 GameStore - All Rights Reserved
        </div>
    </footer>
</body>
</html>