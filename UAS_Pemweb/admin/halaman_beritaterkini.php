<?php
    session_start();

    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Berita</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <p class="text-left">Anda Login sebagai "<strong><?php echo $_SESSION['username']; ?></strong>" | Klik 
            <a href="logout.php" class="btn btn-danger btn-sm">disini</a> untuk logout.</p>
        <h3 class="text-center">Data Berita</h3>
        <div class="d-flex justify-content-between mb-3">
            <a href="berita_tambah.php" class="btn btn-success btn-sm">+ Tambah Berita</a>
        </div>

 
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr class="text-center">
                    <th>No.</th>
                    <th>Judul Berita</th>
                    <th>Isi Berita</th>
                    <th>Tanggal Upload</th>
                    <th>Gambar</th>
                    <th>Kelola</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    include "config.php";
                    $sql = "SELECT berita_id, berita_judul, berita_isi, berita_tanggal, berita_gambar FROM berita ORDER BY berita_id";
                    $hasil = mysqli_query($config, $sql);
                    $no = 1;
                    while ($data = mysqli_fetch_array($hasil)) {
                ?>
                <tr>
                    <td><?php echo $no;?></td>
                    <td><?php echo $data['berita_judul']?></td>
                    <td><?php echo $data['berita_isi']?></td>
                    <td><?php echo $data['berita_tanggal']?></td>
                    <td><img src="<?php echo $data['berita_gambar']?>" class="img-fluid"></td>
                    <td class="text-center">
                        <a href="edit_terkini.php?berita_id=<?php echo $data['berita_id'];?>" class="btn btn-warning btn-sm mb-2">Edit</a>
                        <a href="hapus_terkini.php?berita_id=<?php echo $data['berita_id'];?>" class="btn btn-danger btn-sm"onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</a>
                    </td>
                </tr>
                <?php 
                    $no++;
                    }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS and dependencies (optional, but recommended for Bootstrap's JS components) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>