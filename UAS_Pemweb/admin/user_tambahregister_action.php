<?php

include "config.php";
$user = $_POST['usernama'];
$pass  = $_POST['password'];
$nama = $_POST['namalengkap'];
$email = $_POST['email'];
$sql = "INSERT INTO users (user_nama, user_password, user_namalengkap, user_email) 
        VALUES ('$user', '$pass', '$nama', '$email');";

$hasil = mysqli_query($config, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data User</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="alert <?php echo $hasil ? 'alert-success' : 'alert-danger'; ?>" role="alert">
            <?php
            if ($hasil) {
                echo "Data berhasil ditambahkan";
            } else {
                echo "Data gagal disimpan";
            }
            ?>
        </div>
        <a href="halaman_register.php" class="btn btn-primary">Kembali ke halaman user</a>
    </div>

    <!-- Bootstrap JS and dependencies (optional, but recommended for Bootstrap's JS components) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>