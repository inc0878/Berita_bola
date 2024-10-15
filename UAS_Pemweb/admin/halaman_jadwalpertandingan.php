<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); 
    exit();
}

include "config.php";

$sql_schedules = "SELECT p.*, l.nama_liga 
                 FROM pertandingan p 
                 JOIN liga l ON p.liga_id = l.liga_id
                 ORDER BY p.tanggal  ASC";
$result = mysqli_query($config, $sql_schedules);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Jadwal</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <p class="text-left">Anda Login sebagai "<strong><?php echo $_SESSION['username']; ?></strong>" | Klik 
            <a href="logout.php" class="btn btn-danger btn-sm">disini</a> untuk logout.</p>
        <h3 class="text-center">Data Jadwal Pertandingan</h3>
        <div class="d-flex justify-content-between mb-3">
            <a href="tambah_jadwal.php" class="btn btn-success btn-sm">+ Tambah Jadwal</a>
        </div>

        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr class="text-center">
                    <th>No.</th>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <th>Pertandingan</th>
                    <th>Kelola</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                while ($data = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?php echo $no;?></td>
                    <td><?php echo $data['tanggal'];?></td>
                    <td><?php echo $data['waktu']. " WIB";?></td>
                    <td><?php echo $data['tim_home'] . ' vs ' . $data['tim_away']; ?></td>
                    <td class="text-center">
                        <a href="edit_jadwal.php?pertandingan_id=<?php echo $data['pertandingan_id'];?>" class="btn btn-warning btn-sm mb-2">Edit</a>
                        <a href="hapus_jadwal.php?pertandingan_id=<?php echo $data['pertandingan_id'];?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus jadwal ini?');">Hapus</a>
                    </td>
                </tr>
                <?php 
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS dan dependensinya -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
