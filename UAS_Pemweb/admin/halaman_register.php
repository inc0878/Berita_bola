<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data User</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .table-hover tbody tr:hover {
            background-color: #f5f5f5;
        }
        .btn-sm {
            font-size: 0.875rem;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h3 class="text-center mb-4">Data User</h3>

        <div class="mb-3">
            <a href="user_tambahregister.php" class="btn btn-success btn-sm">+ Tambah User</a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>No.</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Nama Lengkap</th>
                        <th>E-Mail</th>
                        <th>Kelola</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        include "config.php";
                        $sql = "SELECT user_nama, user_password, user_namalengkap, user_email FROM users ORDER BY user_namalengkap";
                        $hasil = mysqli_query($config, $sql);
                        $no = 1;
                        while ($data = mysqli_fetch_array($hasil)) {
                    ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo htmlspecialchars($data['user_nama']); ?></td>
                        <td><?php echo htmlspecialchars($data['user_password']); ?></td>
                        <td><?php echo htmlspecialchars($data['user_namalengkap']); ?></td>
                        <td><?php echo htmlspecialchars($data['user_email']); ?></td>
                        <td class="text-center">
                            <a href="register_edit.php?user_nama=<?php echo urlencode($data['user_nama']); ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="hapus_register.php" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus user ini?')">Hapus</a>
                        </td>
                    </tr>
                    <?php 
                        $no++;
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies (optional, but recommended for Bootstrap's JS components) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
