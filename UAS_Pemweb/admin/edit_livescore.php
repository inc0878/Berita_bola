<?php
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $home_score = $_POST['home_score'];
    $away_score = $_POST['away_score'];
    $status = $_POST['status'];
    
    $sql = "UPDATE matches SET home_score = '$home_score', away_score = '$away_score', status = '$status' WHERE matches_id = $id";
    if (mysqli_query($config, $sql)) {
        // Redirect ke halaman live score setelah berhasil update
        header("Location: halaman_livescore.php");
        exit();
    } else {
        $errors[] = "Error updating match: " . mysqli_error($config);
    }
}

// Dapatkan data pertandingan berdasarkan ID
$id = $_GET['id'];
$sql = "SELECT * FROM matches WHERE matches_id = $id";
$result = mysqli_query($config, $sql);
$match = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Live Score</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Edit Live Score</h2>

        <!-- Menampilkan pesan error jika ada -->
        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger" role="alert">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <!-- Form untuk mengedit data pertandingan -->
        <form action="edit_livescore.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $match['matches_id']; ?>">
            <div class="mb-3">
                <label for="home_score" class="form-label">Home Score:</label>
                <input type="number" class="form-control" id="home_score" name="home_score" value="<?php echo $match['home_score']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="away_score" class="form-label">Away Score:</label>
                <input type="number" class="form-control" id="away_score" name="away_score" value="<?php echo $match['away_score']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status:</label>
                <select class="form-select" id="status" name="status" required>
                    <option value="Soon" <?php if ($match['status'] == 'Soon') echo 'selected'; ?>>Soon</option>
                    <option value="Live" <?php if ($match['status'] == 'Live') echo 'selected'; ?>>Live</option>
                    <option value="End" <?php if ($match['status'] == 'End') echo 'selected'; ?>>End</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
