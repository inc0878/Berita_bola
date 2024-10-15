<?php
session_start();

// Cek apakah user sudah login, jika belum redirect ke halaman login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// konfigurasi database
include "config.php";

// Inisialisasi variabel untuk menyimpan pesan error
$errors = [];

// Ambil ID transfer 
if (isset($_GET['id'])) {
    $transfer_id = $_GET['id'];

    // Query untuk mengambil data transfer berdasarkan ID
    $sql = "SELECT * FROM transfer WHERE transfer_id = '$transfer_id'";
    $result = mysqli_query($config, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Ambil data dari form
            $nama_pemain = $_POST['nama_pemain'];
            $tim_asal = $_POST['tim_asal'];
            $tim_tujuan = $_POST['tim_tujuan'];
            $jumlah_transfer = str_replace(',', '', $_POST['jumlah_transfer']);
            $tanggal_transfer = $_POST['tanggal_transfer'];
            $deskripsi = $_POST['deskripsi'];

            // Cek apakah ada file gambar baru yang diupload
            if (!empty($_FILES["gambar_pemain"]["name"])) {
                $target_dir = "upload/";
                $target_file = $target_dir . basename($_FILES["gambar_pemain"]["name"]);
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];

                if (in_array($imageFileType, $allowed_extensions)) {
                    if (move_uploaded_file($_FILES["gambar_pemain"]["tmp_name"], $target_file)) {
                        $gambar_pemain = $target_file;
                        // Query untuk update data transfer dengan gambar baru
                        $update_sql = "UPDATE transfer SET 
                                        nama_pemain = '$nama_pemain', 
                                        tim_asal = '$tim_asal', 
                                        tim_tujuan = '$tim_tujuan', 
                                        jumlah_transfer = '$jumlah_transfer', 
                                        tanggal_transfer = '$tanggal_transfer', 
                                        deskripsi = '$deskripsi', 
                                        gambar_pemain = '$gambar_pemain' 
                                        WHERE transfer_id = '$transfer_id'";
                    } else {
                        $errors[] = "Maaf ada kesalahan dalam pengupload-an gambar.";
                    }
                } else {
                    $errors[] = "Maaf, hanya file JPG, JPEG, PNG & GIF yang diizinkan.";
                }
            } else {
                // Query untuk update data transfer tanpa gambar baru
                $update_sql = "UPDATE transfer SET 
                                nama_pemain = '$nama_pemain', 
                                tim_asal = '$tim_asal', 
                                tim_tujuan = '$tim_tujuan', 
                                jumlah_transfer = '$jumlah_transfer', 
                                tanggal_transfer = '$tanggal_transfer', 
                                deskripsi = '$deskripsi' 
                                WHERE transfer_id = '$transfer_id'";
            }

            if (empty($errors) && mysqli_query($config, $update_sql)) {
                // Redirect ke halaman transfer.php jika data berhasil diupdate
                header("Location: halaman_transfer.php");
                exit();
            } else {
                // Tambahkan pesan error jika query gagal
                $errors[] = "Error: " . mysqli_error($config);
            }
        }
    } else {
        // Redirect ke halaman transfer.php jika data tidak ditemukan
        header("Location: transfer.php");
        exit();
    }
} else {
    // Redirect ke halaman transfer.php jika ID tidak ditemukan
    header("Location: transfer.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Transfer Pemain</title>
    <link rel="stylesheet" href="style.css"> <!-- Ganti dengan file CSS Anda -->

    <!-- Bootstrap CSS (Contoh penggunaan Bootstrap) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Edit Transfer Pemain</h2>
        
        <!-- Form untuk edit data transfer pemain -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $transfer_id; ?>" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nama_pemain" class="form-label">Nama Pemain:</label>
                <input type="text" class="form-control" id="nama_pemain" name="nama_pemain" value="<?php echo $row['nama_pemain']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="tim_asal" class="form-label">Tim Asal:</label>
                <input type="text" class="form-control" id="tim_asal" name="tim_asal" value="<?php echo $row['tim_asal']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="tim_tujuan" class="form-label">Tim Tujuan:</label>
                <input type="text" class="form-control" id="tim_tujuan" name="tim_tujuan" value="<?php echo $row['tim_tujuan']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="jumlah_transfer" class="form-label">Jumlah Transfer:</label>
                <div class="input-group">
                    <span class="input-group-text">£</span>
                    <input type="text" class="form-control" id="jumlah_transfer" name="jumlah_transfer" value="<?php echo number_format($row['jumlah_transfer']); ?>" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="tanggal_transfer" class="form-label">Tanggal Transfer:</label>
                <input type="date" class="form-control" id="tanggal_transfer" name="tanggal_transfer" value="<?php echo $row['tanggal_transfer']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi:</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required><?php echo $row['deskripsi']; ?></textarea>
            </div>
            <div class="mb-3">
                <label for="gambar_pemain" class="form-label">Upload Gambar Pemain:</label>
                <input type="file" class="form-control" id="gambar_pemain" name="gambar_pemain" accept="image/*">
                <img src="<?php echo $row['gambar_pemain']; ?>" alt="Gambar Pemain" class="img-thumbnail mt-3" width="200">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
