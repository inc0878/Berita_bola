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

// Query untuk mengambil semua data pertandingan
$sql = "SELECT * FROM matches ORDER BY matches_id ASC";
$result = mysqli_query($config, $sql);

// Inisialisasi variabel untuk menyimpan data pertandingan
$matches = [];

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $matches[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Score Pertandingan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Live Score Pertandingan</h2>

        <!-- Tombol untuk menambah live score pertandingan -->
        <a href="tambah_livescore.php" class="btn btn-primary mb-3">Tambah Live Score</a>

        <!-- Tabel untuk menampilkan data pertandingan -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tim Home</th>
                    <th scope="col">Tim Away</th>
                    <th scope="col">Skor Home</th>
                    <th scope="col">Skor Away</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($matches as $match): ?>
                <tr>
                    <th scope="row"><?php echo $match['matches_id']; ?></th>
                    <td><?php echo $match['home_team']; ?></td>
                    <td><?php echo $match['away_team']; ?></td>
                    <td><?php echo $match['home_score']; ?></td>
                    <td><?php echo $match['away_score']; ?></td>
                    <td><?php echo $match['match_date']; ?></td>
                    <td><?php echo ucfirst($match['status']); ?></td>
                    <td>
                        <a href="edit_livescore.php?id=<?php echo $match['matches_id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="hapus_livescore.php?id=<?php echo $match['matches_id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS (diperlukan untuk komponen-komponen Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
