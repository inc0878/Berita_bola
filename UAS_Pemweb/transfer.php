<?php
// Sisipkan file konfigurasi database
include "config.php";

// Query untuk mengambil semua data transfer
$sql = "SELECT * FROM transfer ORDER BY transfer_id ASC";
$result = mysqli_query($config, $sql);

// Inisialisasi variabel untuk menyimpan data transfer
$transfers = [];
$counter = 1;
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $row['nomor_urut'] = $counter++; 
        $transfers[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Transfer Pemain</title>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="style.css">

    <style>
    html, body {
        height: 100%;
    }
    body {
        display: flex;
        flex-direction: column;
    }
    .content {
        flex: 1;
    }
    .table tbody tr td a {
        color: #000000; /* Mengatur warna teks link menjadi hitam */
        text-decoration: none; /* Menghapus dekorasi garis bawah */
    }

    .table tbody tr td a:hover {
        color: #FF0000; /* Atur warna teks saat dihover (opsional) */
    }
    </style>
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
    
    <div class="content container mt-5">
        <h2 class="mb-4">Daftar Transfer Pemain</h2>

        <!-- Tabel untuk menampilkan data transfer -->
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Pemain</th>
                    <th scope="col">Tim Asal</th>
                    <th scope="col">Tim Tujuan</th>
                    <th scope="col">Jumlah Transfer</th>
                    <th scope="col">Tanggal Transfer</th>
                    <th scope="col">Deskripsi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($transfers as $transfer): ?>
                <tr>
                    <th scope="row"><?php echo $transfer['nomor_urut']; ?></th>
                    <td><a href="biodata_pemain.php?id=<?php echo $transfer['transfer_id']; ?>"><?php echo $transfer['nama_pemain']; ?></a></td>
                    <td><?php echo $transfer['tim_asal']; ?></td>
                    <td><?php echo $transfer['tim_tujuan']; ?></td>
                    <td><?php echo '£ ' . number_format($transfer['jumlah_transfer'], 0, ',', '.'); ?></td>
                    <td><?php echo date('d/m/Y', strtotime($transfer['tanggal_transfer'])); ?></td>
                    <td><?php echo $transfer['deskripsi']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <footer class="footer mt-5">
    <div class="container">
        <div class="row">
            <!-- About Us Section -->
            <div class="col-md-3 col-sm-6 mt-4">
                <h5>Tentang Kami</h5>
                <p>Kami menyajikan berita sepak bola terbaru, jadwal pertandingan, klasemen liga, dan pembaruan transfer dari seluruh dunia.</p>
            </div>
            <!-- Quick Links Section -->
            <div class="col-md-3 col-sm-6 mt-4">
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
            <div class="col-md-3 col-sm-6 mt-4">
                <h5>Kontak</h5>
                <ul class="list-unstyled">
                    <li>Email: info@ScoreHub.com</li>
                    <li>Phone: +6249827193718</li>
                    <li>Address: Universitas Amikom Yogyakarta</li>
                </ul>
            </div>
            <!-- Social Media Section -->
            <div class="col-md-3 col-sm-6 mt-4">
                <h5>Follow Kami</h5>
                <div class="social-icons">
                    <a href="#"><i class="bi bi-facebook"></i></a>
                    <a href="#"><i class="bi bi-twitter"></i></a>
                    <a href="#"><i class="bi bi-instagram"></i></a>
                    <a href="#"><i class="bi bi-youtube"></i></a>
                </div>
            </div>
        </div>
        <hr>
        <div class="text-center mt-3">
            <p>&copy; 2024 ScoreHub. All rights reserved.</p>
        </div>
    </div>
    </footer>

    <!-- Bootstrap JS (diperlukan untuk komponen-komponen Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
