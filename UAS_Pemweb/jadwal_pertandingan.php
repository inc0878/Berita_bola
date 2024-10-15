<?php
include 'config.php'; 


$sql_schedules = "SELECT p.*, l.nama_liga 
                  FROM pertandingan p 
                  JOIN liga l ON p.liga_id = l.liga_id
                  ORDER BY p.tanggal, p.waktu ASC";
$result_schedules = $config->query($sql_schedules);
$schedules = [];
if ($result_schedules->num_rows > 0) {
    while ($row = $result_schedules->fetch_assoc()) {
        $schedules[$row['tanggal']][] = $row;
    }
}

$sql_news = "SELECT berita_id, berita_judul, berita_isi, berita_gambar, user_nama, berita_tanggal FROM berita ORDER BY berita_tanggal DESC LIMIT 5";
$result_news = mysqli_query($config, $sql_news);

$news = [];
if (mysqli_num_rows($result_news) > 0) {
    while ($row_news = mysqli_fetch_assoc($result_news)) {
        $news[] = $row_news;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Pertandingan Hari Ini</title>
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

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <h2>Jadwal Pertandingan</h2>
                <?php foreach ($schedules as $date => $daySchedules) : ?>
                    
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th colspan="3"><?php echo date('d/m/Y', strtotime($date)); ?></th>
                            </tr>
                            <tr class="text-center">
                                <th>Liga</th>
                                <th>Pertandingan</th>
                                <th>Waktu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($daySchedules as $schedule) : ?>
                                <tr class="text-center">
                                    <td><?php echo $schedule['nama_liga']; ?></td>
                                    <td><?php echo $schedule['tim_home']  . ' vs ' .  $schedule['tim_away']; ?></td>
                                    <td><?php echo $schedule['waktu'] . ' WIB'; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endforeach; ?>
            </div>
            <div class="col-md-4">
    <div class="border p-3 mb-3">
        <h2><u>HIGHLIGHT</u></h2>
        <?php
        #berita
        $highlightNews = array_slice($news, 0, 3);
        ?>
        <?php foreach ($highlightNews as $item): ?>
            <div class="highlight-item mb-3">
                <img src="admin/<?php echo $item['berita_gambar']; ?>" class="img-fluid mb-2" alt="<?php echo $item['berita_judul']; ?>">
                <h5><a href="detail_berita.php?id=<?php echo $item['berita_id']; ?>"><?php echo $item['berita_judul']; ?></a></h5>
                <p><small class="text-muted">By <?php echo $item['user_nama']; ?> on <?php echo $item['berita_tanggal']; ?></small></p>
            </div>
        <?php endforeach; ?>
    </div>
</div>

</div>
        </div>
    </div>

    <!-- Awal Footer -->
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
    <!-- Akhir Footer -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
