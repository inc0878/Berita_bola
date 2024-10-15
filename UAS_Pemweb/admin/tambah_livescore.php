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

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $home_team = $_POST['home_team'];
    $away_team = $_POST['away_team'];
    $home_score = $_POST['home_score'];
    $away_score = $_POST['away_score'];
    $match_date = $_POST['match_date'];
    $status = $_POST['status'];

    // Query untuk menyimpan data pertandingan ke database
    $sql = "INSERT INTO matches (home_team, away_team, home_score, away_score, match_date, status) 
            VALUES ('$home_team', '$away_team', '$home_score', '$away_score', '$match_date', '$status')";

    if (mysqli_query($config, $sql)) {
        // Redirect ke halaman live score jika data berhasil disimpan
        header("Location: halaman_livescore.php");
        exit();
    } else {
        // Tambahkan pesan error jika query gagal
        $errors[] = "Error: " . mysqli_error($config);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Live Score Pertandingan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Tambah Live Score Pertandingan</h2>
        
        <!-- Form untuk input data live score pertandingan -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="mb-3">
                <label for="home_team" class="form-label">Tim Home:</label>
                <input type="text" class="form-control" id="home_team" name="home_team" required>
            </div>
            <div class="mb-3">
                <label for="away_team" class="form-label">Tim Away:</label>
                <input type="text" class="form-control" id="away_team" name="away_team" required>
            </div>
            <div class="mb-3">
                <label for="home_score" class="form-label">Skor Home:</label>
                <input type="number" class="form-control" id="home_score" name="home_score" required>
            </div>
            <div class="mb-3">
                <label for="away_score" class="form-label">Skor Away:</label>
                <input type="number" class="form-control" id="away_score" name="away_score" required>
            </div>
            <div class="mb-3">
                <label for="match_date" class="form-label">Tanggal:</label>
                <input type="date" class="form-control" id="match_date" name="match_date" required>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status:</label>
                <select class="form-select" id="status" name="status" required>
                    <option value="Soon">Soon</option>
                    <option value="Live">Live</option>
                    <option value="End">End</option>
                </select>
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

  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
