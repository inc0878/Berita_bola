<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    body {
      background-color: #000;
      color: #fff;
    }

    .list-group-item {
      background-color: #222;
      /* border: none; */
      color: #fff;
      transition: background-color 0.3s, color 0.3s;
    }

    .list-group-item:hover {
      background-color: #444;
      color: #fff;
    }
  </style>
</head>

<body>
  <?php 
    session_start();

    if (!isset($_SESSION['username'])) {
      header("Location: login.php");
      exit();
  }

    if (isset($_SESSION['username'])) { ?>
      <div class="container mt-5">
        <div class="row">
          <div class="col-md-8 offset-md-2 text-center">
            <h2>Halaman Admin</h2>
            <p>Selamat Datang, <strong><?php echo $_SESSION['username']; ?></strong>.</p>
            <p>Klik <a href="logout.php" class="btn btn-danger btn-sm">disini</a> untuk logout.</p>
            <p>Berikut ini adalah menu berita Anda:</p>
            <div class="list-group">
              <a href="halaman_beritaterkini.php" class="list-group-item ">Halaman Utama</a>
              <a href="halaman_jadwalpertandingan.php" class="list-group-item ">Halaman Jadwal</a>
              <a href="halaman_klasemenEpl.php" class="list-group-item ">Halaman Klasemen Liga</a>
              <a href="halaman_transfer.php" class="list-group-item ">Halaman Transfer</a>
              <a href="halaman_livescore.php" class="list-group-item ">Halaman Livescore</a>
            </div>
          </div>
        </div>
      </div>
  <?php 
    } else { ?>
      <div class="container mt-5">
        <div class="row">
          <div class="col-md-8 offset-md-2 text-center">
            <h2>Maaf...</h2>
            <p>Anda tidak berhak mengakses halaman ini. Silakan <a href="login.php" class="btn btn-primary btn-sm">login</a> terlebih dahulu.</p>
          </div>
        </div>
      </div>
  <?php 
    } ?>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+5hb7O2dvlFtFfAZnrAAp1zN/C4jjH0sowb8Brd" crossorigin="anonymous"></script>
</body>

</html>
