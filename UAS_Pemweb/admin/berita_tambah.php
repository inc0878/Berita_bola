<?php
    session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Berita</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Tambah Berita</h2>
        <form method="POST" action="berita_tambah_action.php" enctype="multipart/form-data">
            <div class="form-group row">
                <label for="judul" class="col-sm-2 col-form-label">Judul Berita</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="judul" name="Judul" size="60">
                </div>
            </div>
            <div class="form-group row">
                <label for="isi" class="col-sm-2 col-form-label">Isi Berita</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="isi" name="isi" rows="6" cols="60"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control-file" id="gambar" name="gambar">
                </div>
            </div>
            <div class="form-group row">
                <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                <div class="col-sm-4">
                    <input type="date" class="form-control" id="tanggal" name="tanggal">
                </div>
                <label for="user_nama" class="col-sm-2 col-form-label">Nama User / Admin</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="user_nama" name="user_nama" size="60" value="<?php echo $_SESSION['username']; ?>" readonly>
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