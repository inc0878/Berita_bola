<?php
// Memulai session jika belum dimulai
session_start();

// Cek apakah user sudah login, jika belum redirect ke halaman login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Sisipkan file konfigurasi database
include "config.php";

// Inisialisasi variabel untuk menyimpan pesan error
$errors = [];

// Handle request untuk menghapus pertandingan
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM matches WHERE matches_id = $id";
    if (mysqli_query($config, $sql)) {
        // Redirect ke halaman live score setelah berhasil hapus
        header("Location: halaman_livescore.php");
        exit();
    } else {
        $errors[] = "Error deleting match: " . mysqli_error($config);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Live Score</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Hapus Live Score</h2>

        <!-- Menampilkan pesan error jika ada -->
        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger" role="alert">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php else: ?>
            <div class="alert alert-success" role="alert">
                Data berhasil dihapus.
            </div>
        <?php endif; ?>

        <a href="halaman_livescore.php" class="btn btn-primary">Kembali ke Halaman Live Score</a>
    </div>

    <!-- Bootstrap JS (diperlukan untuk komponen-komponen Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
