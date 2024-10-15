<?php
// Memulai session jika belum dimulai
session_start();
// Sisipkan file konfigurasi database
include "config.php";

// Inisialisasi variabel untuk menyimpan pesan error
$errors = [];

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $nama_pemain = $_POST['nama_pemain'];
    $tim_asal = $_POST['tim_asal'];
    $tim_tujuan = $_POST['tim_tujuan'];
    $jumlah_transfer = $_POST['jumlah_transfer'];
    $tanggal_transfer = $_POST['tanggal_transfer'];
    $deskripsi = $_POST['deskripsi'];
   
   // Upload file gambar pemain
   $lokasifile = $_FILES['gambar_pemain']['tmp_name'];
   $namafile = $_FILES['gambar_pemain']['name'];

   $uploaddir = "upload/";
   $uploadfile = $uploaddir . basename($namafile);

    // Query untuk menyimpan data transfer pemain tanpa foto
    // $sql = "INSERT INTO transfer (nama_pemain, tim_asal, tim_tujuan, jumlah_transfer, tanggal_transfer, deskripsi) 
    //         VALUES ('$nama_pemain', '$tim_asal', '$tim_tujuan', '$jumlah_transfer', '$tanggal_transfer', '$deskripsi')";

    // if (mysqli_query($config, $sql)) {
    //     // Redirect ke halaman transfer.php jika data berhasil disimpan
    //     header("Location: halaman_transfer.php");
    //     exit();
    // } else {
    //     // Tambahkan pesan error jika query gagal
    //     $errors[] = "Error: " . mysqli_error($config);
    // }

    if (move_uploaded_file($lokasifile, $uploadfile)) {
        // File berhasil diunggah, tambahkan data ke database
        $sql = "INSERT INTO transfer (nama_pemain, tim_asal, tim_tujuan, jumlah_transfer, tanggal_transfer, deskripsi, gambar_pemain) 
                VALUES ('$nama_pemain', '$tim_asal', '$tim_tujuan', '$jumlah_transfer', '$tanggal_transfer', '$deskripsi', '$namafile')";

        if (mysqli_query($config, $sql)) {
            // Redirect ke halaman transfer.php jika data berhasil disimpan
            header("Location: halaman_transfer.php");
            exit();
        } else {
            // Tambahkan pesan error jika query gagal
            $errors[] = "Error: " . mysqli_error($config);
        }
    } else {
        // Tambahkan pesan error jika gagal mengunggah file
        $errors[] = "Gagal mengunggah file gambar.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Transfer Pemain</title>
    <link rel="stylesheet" href="style.css"> <!-- Ganti dengan file CSS Anda -->

    <!-- Bootstrap CSS (Contoh penggunaan Bootstrap) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Tambah Transfer Pemain</h2>
        
        <!-- Form untuk input data transfer pemain -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nama_pemain" class="form-label">Nama Pemain:</label>
                <input type="text" class="form-control" id="nama_pemain" name="nama_pemain" required>
            </div>
            <div class="mb-3">
                <label for="tim_asal" class="form-label">Tim Asal:</label>
                <input type="text" class="form-control" id="tim_asal" name="tim_asal" required>
            </div>
            <div class="mb-3">
                <label for="tim_tujuan" class="form-label">Tim Tujuan:</label>
                <input type="text" class="form-control" id="tim_tujuan" name="tim_tujuan" required>
            </div>
            <div class="mb-3">
                <label for="jumlah_transfer" class="form-label">Jumlah Transfer:</label>
                <div class="input-group">
                    <span class="input-group-text">£</span>
                    <input type="number" class="form-control" id="jumlah_transfer" name="jumlah_transfer" step="0.01" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="tanggal_transfer" class="form-label">Tanggal Transfer:</label>
                <input type="date" class="form-control" id="tanggal_transfer" name="tanggal_transfer" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi:</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="gambar_pemain" class="form-label">Upload Gambar Pemain:</label>
                <!-- <input type="file" class="form-control" id="gambar_pemain" name="gambar_pemain" accept="image/*" required> -->
                <input type="file" class="form-control" id="gambar_pemain" name="gambar_pemain" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <!-- Menampilkan pesan error jika ada -->
        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger mt-3" role="alert">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>

    <!-- Bootstrap JS (Contoh penggunaan Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
