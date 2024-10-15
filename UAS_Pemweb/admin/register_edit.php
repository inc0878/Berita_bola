<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Ubah Data</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <?php
        include "config.php";
        $user = $_GET['user_nama'];
        $sql = "SELECT * FROM users WHERE user_nama='$user'";
        $hasil = mysqli_query($config, $sql);
        $data = mysqli_fetch_assoc($hasil);
        ?>
        <h3 class="text-center mb-4">Ubah Data Username</h3>
        <form method="POST" action="register_edit_action.php">
            <div class="form-group row">
                <label for="username" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="username" value="<?php echo htmlspecialchars($data['user_nama']); ?>" disabled>
                    <input type="hidden" name="usernama" value="<?php echo htmlspecialchars($data['user_nama']); ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="password" name="password" value="<?php echo htmlspecialchars($data['user_password']); ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="namalengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="namalengkap" name="namalengkap" value="<?php echo htmlspecialchars($data['user_namalengkap']); ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($data['user_email']); ?>">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" class="btn btn-primary" name="ubah">Simpan</button>
                    <button type="reset" class="btn btn-secondary">Batal</button>
                </div>
            </div>
        </form>
        <div class="text-center mt-4">
            <a href="halaman_register.php" class="btn btn-primary">Kembali ke Halaman User</a>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies (optional, but recommended for Bootstrap's JS components) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
