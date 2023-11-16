<?php 
session_start();
require "./aksi/koneksi.php";

date_default_timezone_set("Asia/Makassar");
$date = date('Y/m/d');

if($_SESSION['username'] == 'admin'){
    header('Location: index.php');
    exit;
}

if(isset($_POST['pesan'])){
    if(isset($_POST['idgameubah'])){
        $idgameubahs = $_POST['idgameubah'];
        $jumlahs = $_POST['jumlah'];
        $gameids = $_POST['gameid'];
        
        foreach($idgameubahs as $key => $idgameubah){
            $jumlah = $jumlahs[$key];
            $gameid = $gameids[$key];
            $ubah = mysqli_query($conn, "UPDATE keranjang set jumlah = '$jumlah', gameid = '$gameid' where id_keranjang = '$idgameubah'");
        }
        
        if(isset($_POST['check'])){
            $checks = $_POST['check'];
            foreach($checks as $key => $check){
                $data = explode(',', $check);
                
                $idkeranjang = $data[0];
                $iduser = $data[1];
                $idgame = $data[2];
                $harga = $data[3];
                
                $result = mysqli_query($conn, "select * from keranjang where id_keranjang = '$idkeranjang'");
                $carts = [];
                while ($row = mysqli_fetch_assoc($result)) {
                    $carts[] = $row;
                }
                $carts = $carts[0];

                $gameid = $carts['gameid'];
                if($gameid == NULL){
                    echo "
                        <script>
                            document.location.href = 'keranjang.php';
                        </script>
                    ";
                }
                else{
                    $jumlah = $carts['jumlah'];
                    if($jumlah <= 0){
                        echo "
                            <script>
                                confirm('Masukkan Jumlah Dengan Benar');
                                document.location.href = 'keranjang.php';
                            </script>
                        ";
                    }
                    else{
                        $total = $jumlah * $harga;
                        
                        $tambah = mysqli_query($conn, "insert into pembayaran 
                        (id_pembayaran, id_user, id_game, gameid, jumlah, total, tanggal_bayar) 
                        values ('', '$iduser', '$idgame', '$gameid', '$jumlah', '$total', '$date')");
            
                        $hapus = mysqli_query($conn,"DELETE from keranjang where id_keranjang = '$idkeranjang'");
                        if($tambah){
                            echo "
                                <script>
                                    confirm('Berhasil Top Up');
                                    document.location.href = 'keranjang.php';
                                </script>
                            ";
                        }
                    }
                }
            }
        }
        else{
            echo "
                <script>
                    document.location.href = 'keranjang.php';
                </script>
            ";
        }
    }
    else{
        echo "
            <script>
                document.location.href = 'keranjang.php';
            </script>
        ";
    }
}
echo "
    <script>
        document.location.href = 'keranjang.php';
    </script>
";
?>