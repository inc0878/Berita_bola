<?php
include 'config.php'; // koneksi database


$sql_leagues = "SELECT * FROM liga";
$result_leagues = $config->query($sql_leagues);
$leagues = [];
if ($result_leagues->num_rows > 0) {
    while ($row = $result_leagues->fetch_assoc()) {
        $leagues[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Tambah Jadwal</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Tambah Jadwal</h2>
    <form method="POST" action="tambah_jadwal_action.php">
        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
        </div>
        <div class="mb-3">
            <label for="liga" class="form-label">Liga</label>
            <select class="form-select" id="liga" name="liga" required>
                <option value="">Pilih Liga</option>
                <?php foreach ($leagues as $liga) : ?>
                    <option value="<?php echo $liga['liga_id']; ?>"><?php echo $liga['nama_liga']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="tim_home" class="form-label">Tim Home</label>
            <input type="text" class="form-control" id="tim_home" name="tim_home" required>
        </div>
        <div class="mb-3">
            <label for="tim_away" class="form-label">Tim Away</label>
            <input type="text" class="form-control" id="tim_away" name="tim_away" required>
        </div>
        <div class="mb-3">
            <label for="waktu" class="form-label">Waktu</label>
            <input type="time" class="form-control" id="waktu" name="waktu" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
