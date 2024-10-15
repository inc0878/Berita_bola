<?php
include "config.php";
$user = $_POST['usernama'];
$pass = $_POST['password'];
$nama = $_POST['namalengkap'];
$email = $_POST['email'];
$sql = "UPDATE users
        SET user_password='$pass', user_namalengkap='$nama', user_email='$email'
        WHERE user_nama='$user'";
$hasil = mysqli_query($config, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data User</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <?php
        if ($hasil) {
            echo "<div class='alert alert-success' role='alert'>Data berhasil diubah</div>";
        } else {
            echo "<div class='alert alert-danger' role='alert'>Data gagal diubah</div>";
        }
        ?>
        <a href="halaman_register.php" class="btn btn-primary">Kembali ke Halaman User</a>
    </div>

    <!-- Bootstrap JS and dependencies (optional, but recommended for Bootstrap's JS components) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>