<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include "config.php";

$sql_standings = "SELECT k.*, l.nama_liga 
                  FROM klasemen k 
                  JOIN liga l ON k.liga_id = l.liga_id
                  ORDER BY k.poin DESC, k.selisi_gol DESC";
$result = mysqli_query($config, $sql_standings);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klasemen Liga</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <p class="text-left">Anda Login sebagai "<strong><?php echo $_SESSION['username']; ?></strong>" | Klik 
            <a href="logout.php" class="btn btn-danger btn-sm">disini</a> untuk logout.</p>
        <h3 class="text-center">Halaman Klasemen Liga Premier League</h3>
        <div class="d-flex justify-content-between mb-3">
            <a href="tambah_klasemenEpl.php" class="btn btn-success btn-sm">+ Tambah Tim</a>
        </div>
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr class="text-center">
                    <th>No.</th>
                    <th>Tim</th>
                    <th>Pertandingan</th>
                    <th>Menang</th>
                    <th>Seri</th>
                    <th>Kalah</th>
                    <th>Gol</th>
                    <th>Kebobolan</th>
                    <th>Selisih Gol</th>
                    <th>Poin</th>
                    <th>Kelola</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                while ($data = mysqli_fetch_array($result)) {
                ?>
                <tr class="text-center">
                    <td><?php echo $no;?></td>
                    <td><?php echo $data['nama_tim'];?></td>
                    <td><?php echo $data['main'];?></td>
                    <td><?php echo $data['menang'];?></td>
                    <td><?php echo $data['seri'];?></td>
                    <td><?php echo $data['kalah'];?></td>
                    <td><?php echo $data['gol'];?></td>
                    <td><?php echo $data['kebobolan'];?></td>
                    <td><?php echo $data['selisi_gol'];?></td>
                    <td><?php echo $data['poin'];?></td>
                    <td class="text-center">
                        <a href="edit_klasemenEpl.php?klasemen_id=<?php echo $data['klasemen_id'];?>" class="btn btn-warning btn-sm mb-2">Edit</a>
                        <a href="hapus_klasemenEpl.php?klasemen_id=<?php echo $data['klasemen_id'];?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus tim ini?');">Hapus</a>
                    </td>
                </tr>
                <?php 
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
