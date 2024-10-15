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

// Query untuk mengambil semua data transfer
$sql = "SELECT * FROM transfer ORDER BY transfer_id ASC";
$result = mysqli_query($config, $sql);

// Inisialisasi variabel untuk menyimpan data transfer
$transfers = [];
$counter = 1;
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $row['nomor_urut'] = $counter++; // Menambahkan nomor urut secara increment
        $transfers[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Transfer Pemain</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Daftar Transfer Pemain</h2>

        <!-- Tampilkan tombol untuk tambah transfer -->
        <a href="tambah_transfer.php" class="btn btn-primary mb-3">Tambah Transfer Pemain</a>

        <!-- Tabel untuk menampilkan data transfer -->
        <table class="table table-bordered">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Nama Pemain</th>
                    <th>Tim Asal</th>
                    <th>Tim Tujuan</th>
                    <th>Jumlah Transfer</th>
                    <th>Tanggal Transfer</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $counter = 1; ?>
                <?php foreach ($transfers as $transfer): ?>
                <tr class="text-center">
                    <td><?php echo $counter; ?></td>
                    <td><?php echo $transfer['nama_pemain']; ?></td>
                    <td><?php echo $transfer['tim_asal']; ?></td>
                    <td><?php echo $transfer['tim_tujuan']; ?></td>
                    <td><?php echo '£ ' . number_format($transfer['jumlah_transfer'], 0, ',', '.'); ?></td>
                    <td><?php echo date('d/m/Y', strtotime($transfer['tanggal_transfer'])); ?></td>
                    <td><?php echo $transfer['deskripsi']; ?></td>
                    <td>
                        <a href="edit_transfer.php?id=<?php echo $transfer['transfer_id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                        <a href="hapus_transfer.php?id=<?php echo $transfer['transfer_id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus pemain ini?');">Hapus</a>
                    </td>
                </tr>
                <?php $counter++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Tampilkan pesan error jika ada -->
        <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-danger mt-3" role="alert">
                <?php echo htmlspecialchars($_GET['error']); ?>
            </div>
        <?php endif; ?>
    </div>

    <!-- Bootstrap JS (Contoh penggunaan Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
