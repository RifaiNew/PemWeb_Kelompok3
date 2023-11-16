<?php
    require './aksi/koneksi.php';

    if(isset($_POST['regis'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $cpassword = $_POST['cpassword'];

        $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

        if(mysqli_fetch_assoc($result) || $username == "admin"){
            $error = true;
        } 
        else {
            // 92
            if($password === $cpassword){
                $password = password_hash($password, PASSWORD_DEFAULT);

                $result = mysqli_query($conn, "INSERT INTO user VALUES ('', '$username', '$password', '$email')");
                if(mysqli_affected_rows($conn) > 0){
                    echo "
                        <script>
                            alert('Registrasi Berhasil!');
                            document.location.href = 'login.php';
                        </script>
                    ";
                } else {
                    echo "
                        <script>
                            alert('Registrasi Gagal!');
                            document.location.href = 'regis.php';
                        </script>
                    ";
                }
            } else {
                echo "
                    <script>
                        alert('Konfirmasi Password tidak sesuai!');
                        document.location.href = 'regis.php';
                    </script>
                ";
            }
        }

    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-Up </title>
    <link rel="stylesheet" href="./style/style.css">
</head>

<body>
    <div class="container">
    <div class="login">
    <form action="" method="post">
        <h1>Sign-Up</h1>
        <hr>
        <?php
        if (isset($error)) {
            echo "<p style='color: red;'> Gunakan Username Yang Lain </p>";
        } else {
            echo "<p> Top-Up Game Terpercaya </p>";
        }
        ?>
        <label for="">Username : </label>
        <input type="text" name="username" id="" required> 
        <label for="">Password : </label>
        <input type="password" name="password" id="" required> 
        <label for="">Konfirmasi Password : </label>
        <input type="password" name="cpassword" id="" required> 
        <label for="">Email : </label>
        <input type="email" name="email" id="" required> 
        <button type="submit" name="regis">Sign-Up</button>
        <P> 
            <p1>Already have an account</p1>
            <a href="Login.php">Login</a>
        </P>
    </form>
    </div>
    <div class="right" style="margin-top: 3%;">
        <p>Play Point Store</p>
        <img src="img/gambar login.jpeg" alt="Top-up Game">
       

    </div>
    </div>
</body>

</html>