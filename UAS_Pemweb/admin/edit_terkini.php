<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $berita_id = $_POST['berita_id'];
    $judul = mysqli_real_escape_string($config, $_POST['judul']);
    $isi = mysqli_real_escape_string($config, $_POST['isi']);
    $tanggal = $_POST['tanggal'];
    $user_nama = $_POST['user_nama'];
    
    $gambar = $_FILES['gambar']['name'];
    $gambar_tmp = $_FILES['gambar']['tmp_name'];

    if (!empty($gambar)) {
        $gambar_path = 'upload/' . $gambar;
        move_uploaded_file($gambar_tmp, $gambar_path);
        $sql = "UPDATE berita SET berita_judul='$judul', berita_isi='$isi', berita_tanggal='$tanggal', berita_gambar='$gambar_path', user_nama='$user_nama' WHERE berita_id=$berita_id";
    } else {
        $sql = "UPDATE berita SET berita_judul='$judul', berita_isi='$isi', berita_tanggal='$tanggal', user_nama='$user_nama' WHERE berita_id=$berita_id";
    }

    if (mysqli_query($config, $sql)) {
        $_SESSION['message'] = "Berita berhasil diperbarui";
    } else {
        $_SESSION['message'] = "Gagal memperbarui berita: " . mysqli_error($config);
    }
    header("Location: halaman_beritaterkini.php");
    exit();
} else {
    $berita_id = $_GET['berita_id'];
    $sql = "SELECT * FROM berita WHERE berita_id = $berita_id";
    $hasil = mysqli_query($config, $sql);
    $data = mysqli_fetch_assoc($hasil);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Berita</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Edit Berita</h2>
        <form method="POST" action="edit_terkini.php" enctype="multipart/form-data">
            <input type="hidden" name="berita_id" value="<?php echo $data['berita_id']; ?>">
            <div class="form-group row">
                <label for="judul" class="col-sm-2 col-form-label">Judul Berita</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="judul" name="judul" value="<?php echo $data['berita_judul']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="isi" class="col-sm-2 col-form-label">Isi Berita</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="isi" name="isi" rows="6"><?php echo $data['berita_isi']; ?></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control-file" id="gambar" name="gambar">
                    <img src="<?php echo $data['berita_gambar']; ?>" alt="Gambar Berita" class="img-fluid mt-2">
                </div>
            </div>
            <div class="form-group row">
                <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                <div class="col-sm-4">
                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?php echo $data['berita_tanggal']; ?>">
                </div>
                <label for="user_nama" class="col-sm-2 col-form-label">Nama User</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="user_nama" name="user_nama" value="<?php echo $_SESSION['username']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12 text-center">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
            </div>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
