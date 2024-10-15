<!DOCTYPE html>
<html>
<head>
    <title>Edit Jadwal Pertandingan</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-group {
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="mt-5">Edit Jadwal Pertandingan</h2>

        <?php
$pertandingan_id = $_GET['pertandingan_id'];    

$sql = "SELECT * FROM pertandingan WHERE pertandingan_id = $pertandingan_id";

include "config.php";

$result = mysqli_query($config, $sql);

if ($result) {
    $jadwal = mysqli_fetch_assoc($result);
    ?>
    <form action="edit_jadwal_action.php" method="POST">
        <input type="hidden" name="pertandingan_id" value="<?php echo $jadwal['pertandingan_id'];?>">

        <div class="form-group">
            <label for="tanggal">Tanggal:</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?php echo $jadwal['tanggal']; ?>">
        </div>

        <div class="form-group">
            <label for="waktu">Waktu:</label>
            <input type="time" class="form-control" id="waktu" name="waktu" value="<?php echo $jadwal['waktu'];?>">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
    <?php
} else {
    echo "Error: " . mysqli_error($config);
}

mysqli_close($config);
?>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
