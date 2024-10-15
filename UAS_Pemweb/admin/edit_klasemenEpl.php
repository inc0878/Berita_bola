<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include "config.php";

if (isset($_GET['klasemen_id'])) {
    $klasemen_id = $_GET['klasemen_id'];
    $sql = "SELECT * FROM klasemen WHERE klasemen_id = '$klasemen_id'";
    $result = mysqli_query($config, $sql);
    $data = mysqli_fetch_array($result);
}

$sql_liga = "SELECT * FROM liga";
$result_liga = mysqli_query($config, $sql_liga);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Tim</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h3 class="text-center">Edit Tim</h3>
        <form action="edit_klasemenEpl_action.php" method="post">
            <input type="hidden" name="klasemen_id" value="<?php echo $data['klasemen_id']; ?>">
            <div class="form-group">
                <label for="liga_id">Liga</label>
                <select name="liga_id" id="liga_id" class="form-control" disabled>
                    <option value="">Pilih Liga</option>
                    <?php while ($liga = mysqli_fetch_array($result_liga)) { ?>
                        <option value="<?php echo $liga['liga_id']; ?>" <?php if ($liga['liga_id'] == $data['liga_id']) echo 'selected'; ?>><?php echo $liga['nama_liga']; ?></option>
                    <?php } ?>
                </select>
                <input type="hidden" name="liga_id" value="<?php echo $data['liga_id']; ?>">
            </div>
            <div class="form-group">
                <label for="nama_tim">Nama Tim</label>
                <input type="text" name="nama_tim" id="nama_tim" class="form-control" value="<?php echo $data['nama_tim']; ?>" required>
            </div>
            <div class="form-group">
                <label for="main">Main</label>
                <input type="number" name="main" id="main" class="form-control" value="<?php echo $data['main']; ?>" required>
            </div>
            <div class="form-group">
                <label for="menang">Menang</label>
                <input type="number" name="menang" id="menang" class="form-control" value="<?php echo $data['menang']; ?>" required>
            </div>
            <div class="form-group">
                <label for="seri">Seri</label>
                <input type="number" name="seri" id="seri" class="form-control" value="<?php echo $data['seri']; ?>" required>
            </div>
            <div class="form-group">
                <label for="kalah">Kalah</label>
                <input type="number" name="kalah" id="kalah" class="form-control" value="<?php echo $data['kalah']; ?>" required>
            </div>
            <div class="form-group">
                <label for="gol">Gol</label>
                <input type="number" name="gol" id="gol" class="form-control" value="<?php echo $data['gol']; ?>" required>
            </div>
            <div class="form-group">
                <label for="kebobolan">Kebobolan</label>
                <input type="number" name="kebobolan" id="kebobolan" class="form-control" value="<?php echo $data['kebobolan']; ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
