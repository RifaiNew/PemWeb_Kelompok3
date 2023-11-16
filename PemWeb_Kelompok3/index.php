<?php
session_start();
require "./aksi/koneksi.php";

if(!isset($_SESSION['login'])){
    $notlogin = true;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Play Point Store</title>
    <link rel="stylesheet" href="./style/index.css">
</head>

<body>
    <!-- <p>
        <a href="historyuser.php">Riwayat Pemesanan</a>
        <p><a href="keranjang.php">Keranjang</a></p>
    </p> -->
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

    <main class="main-content">
    
        <!-- Card for a game -->
    <section class="game-cards">
        <div class="game-card">
            <a href="./game/pubg.php">
                <img src="img/pubg.jpg" alt="Game 1">
            </a>
        </div>

        <div class="game-card">
            <a href="./game/apex.php">
                <img src="https://media.esportsedition.com/wp-content/uploads/2019/02/Apex-Banner.jpg" alt="Game 2">
            </a>
        </div>

        <div class="game-card">
            <a href="./game/ml.php">
                <img src="img/mobile legend.jpg" alt="Game 3">
            </a>
        </div>

        <div class="game-card">
            <a href="./game/freefire.php">
                <img src="img/free fire.jpg" alt="Game 4">
            </a>
        </div>

        <div class="game-card">
            <a href="./game/genshin.php">
                <img src="img/genshin.jpeg" alt="Game 5">
            </a>
        </div>

        <div class="game-card">
            <a href="./game/coc.php">
                <img src="img/coc.jpeg" alt="Game 6">
            </a>
        </div>

        <div class="game-card">
            <a href="./game/codm.php">
                <img src="https://blog.activision.com/content/dam/atvi/activision/atvi-touchui/blog/callofduty/feature/codm/COD-LAUNCH-TOUT.jpg" alt="Game 7">
            </a>
        </div>

        <div class="game-card">
            <a href="./game/valorant.php">
                <img src="img/valorant.jpg" alt="Game 8">
            </a>
        </div>

        <!-- Teks Codashop -->
        <div class="codashop-info">
        <h2>Play Point Store</h2>
        <p>Play Point Store: Platform top-up game terkemuka, yang dapat diandalkan dan tercepat di Indonesia. Setiap bulannya, jutaan gamer mempercayai Play Point Store untuk pengisian kredit game dengan lancar, tanpa hambatan saat registrasi atau masuk, dan kredit permainan langsung tersedia. Tersedia top-up untuk Mobile Legends, Free Fire, Valorant, serta beragam game lainnya!</p>
        </div>

        <!-- You can add more game cards as needed -->
    </section>

    </main>

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
    <script src="script.js"></script>
</body>
</html>