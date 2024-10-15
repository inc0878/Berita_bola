<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kompetisi Liga</title>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    
  </head>
  <body>
    <!-- awal Navbar -->
    <nav class="navbar navbar-expand-lg position-relative sticky-top">
    <div class="container-fluid text-center">
        <a class="navbar-brand rounded py-1 px-2 z-1" href="index.php">Berita Terkini</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarNavDropdown">
            <ul class="navbar-nav mb-2 mb-lg-0 text-end">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="jadwal_pertandingan.php">Jadwal Pertandingan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="kompetisi_liga.php">Kompetisi Liga</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="transfer.php">Transfer</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="live_score.php">Live Score</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Login/Register
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="admin/index.php">Login</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="admin/halaman_register.php">Register</a></li>
                    </ul>
                </li>
            </ul>
            <div class="ms-auto">
                <h2>Score<span class="text-danger">Hub</span></h2>
            </div>
        </div>
    </div>
</nav>

            
    <!-- Offcanvas -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h3 class="offcanvas-title" id="offcanvasExampleLabel">Score<span class="text-danger">Hub</span></h3>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="navbar-nav mb-2 mb-lg-0  text-end">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="jadwal_pertandingan.php">Jadwal Pertandingan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="kompetisi_liga.php">Kompetisi Liga</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="transfer.php">Transfer</a>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="live_score.php">Live Score</a>
                    </li>
                </li>
                <li><hr></li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="admin/index.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="admin/halaman_register.php">Register</a>
                </li>
            </ul>
        </div>
    </div>

    <!-- akhir Navbar -->


    <!-- Jadwal pertandingan -->
    <!-- Kompetisi liga -->
     <div class="ms-3 mt-2">
     <h2>Liga-Liga</h2>
     </div>
    <div class="mt-2 Liga-Liga">
      <div class="d-flex">
        <div class="premier-leguage ">
          <img src="gambar/premier_league.png" alt="">
          <a href="klasemenEpl.php"><h3>Premier Leguage</h3></a>
        </div>
        <div class="serie-A">
          <img src="gambar/serie A.png" alt="">
          <a href="klasemenSeriea.php"><h3>Serie A</h3></a>
        </div>
        <div class="laliga">
          <img src="gambar/laliga.png" alt="">
          <a href=""><h3>Laliga</h3></a>
        </div>
        <div class="bunders-liga">
          <img src="gambar/bundesliga.png" alt="">
          <a href=""><h3>Bunders Liga</h3></a>
        </div>
        <div class="ligue-1">
          <img src="gambar/Ligue1.png" alt="">
          <a href=""><h3>Ligue 1</h3></a>
        </div>
      </div>
    </div>
    <!-- berita bawahnya -->
    <div class="d-flex berita align-items-center gap-2">
      <img src="gambar/berita1.jpeg" alt="">
      <h2>Ini lawan City dan Arsenal dipekan terakhir, Siapa yang akan terpeleset?</h2>
    </div>

    <!-- Footer -->
  <footer class="footer">
    <div class="container mt-5">
      <div class="row">
        <!-- About Us Section -->
        <div class="col-md-3 mt-4">
          <h5>Tentang Kami</h5>
          <p>Kami menyajikan berita sepak bola terbaru, jadwal pertandingan, klasemen liga, dan pembaruan transfer dari seluruh dunia.</p>
        </div>
        <!-- Quick Links Section -->
        <div class="col-md-3 mt-4">
          <h5>Pintasan Menu</h5>
          <ul class="list-unstyled">
              <li><a href="index.php">Home</a></li>
              <li><a href="jadwal_pertandingan.php">Jadwal Pertandingan</a></li>
              <li><a href="kompetisi_liga.php">Kompetisi Liga</a></li>
              <li><a href="transfer.php">Transfer News</a></li>
              <li><a href="live_score.php">Live Score</a></li>
            </ul>
        </div>
        <!-- Contact Section -->
        <div class="col-md-3 mt-4">
          <h5>Kontak</h5>
          <ul class="list-unstyled">
            <li>Email: info@ScoreHub.com</li>
            <li>Phone: +6249827193718</li>
            <li>Address: Universitas Amikom Yogyakarta</li>
          </ul>
        </div>
        <!-- Social Media Section -->
        <div class="col-md-3 mt-4">
          <h5>Follow Kami</h5>
          <div class="social-icons">
            <a href="#"><i class="bi bi-facebook"></i></a>
            <a href="#"><i class="bi bi-twitter"></i></a>
            <a href="#"><i class="bi bi-instagram"></i></a>
            <a href="#"><i class="bi bi-youtube"></i></a>
          </div>
        </div>
        <hr>
        <div class="text-center">
          <p>&copy; 2024 ScoreHub. All rights reserved.</p>
        </div>
      </div>

    </div>
  </footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  </body>
</html>