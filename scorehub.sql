-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2024 at 06:20 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scorehub`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `berita_id` int(11) NOT NULL,
  `berita_judul` varchar(150) NOT NULL,
  `berita_isi` text NOT NULL,
  `berita_gambar` varchar(255) DEFAULT NULL,
  `berita_tanggal` date NOT NULL,
  `user_nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`berita_id`, `berita_judul`, `berita_isi`, `berita_gambar`, `berita_tanggal`, `user_nama`) VALUES
(9, 'Timnas mulai menuju generasi emas!!!!', 'Yogyakarta - Indonesia kini berada di ambang perubahan besar dalam berbagai sektor, dengan tekad untuk mencapai generasi emas. Berbagai langkah strategis dan program unggulan telah dicanangkan oleh pemerintah dan berbagai elemen masyarakat untuk mewujudkan visi tersebut.\r\n\r\nSalah satu fokus utama dalam upaya ini adalah peningkatan kualitas pendidikan. Berbagai inisiatif telah diluncurkan untuk meningkatkan kualitas guru, menyediakan fasilitas pendidikan yang memadai, serta memperluas akses pendidikan bagi seluruh lapisan masyarakat. Program beasiswa dan pelatihan keterampilan juga digalakkan untuk menciptakan SDM yang kompeten dan siap bersaing di kancah global.\r\n\r\nDi sektor ekonomi, pemerintah gencar mendorong pengembangan industri kreatif dan teknologi. Berbagai startup dan perusahaan rintisan mulai bermunculan, menciptakan inovasi yang tidak hanya berdampak positif bagi perekonomian nasional tetapi juga mampu bersaing di pasar internasional. Dukungan terhadap UMKM juga diperkuat, mengingat peran vitalnya dalam menggerakkan roda ekonomi dan menciptakan lapangan kerja.\r\n\r\nSelain itu, pembangunan infrastruktur yang masif terus dilakukan untuk mempercepat konektivitas antar daerah. Proyek-proyek seperti tol laut, bandara, dan jalan tol diharapkan dapat meningkatkan efisiensi logistik dan membuka akses bagi daerah-daerah terpencil.\r\n\r\nKesehatan masyarakat juga menjadi perhatian utama dalam visi generasi emas ini. Program-program kesehatan seperti imunisasi massal, penyediaan layanan kesehatan gratis, dan peningkatan fasilitas kesehatan terus digalakkan untuk memastikan masyarakat Indonesia tumbuh sehat dan produktif.\r\n\r\nDalam bidang sosial dan budaya, pemerintah bersama masyarakat berupaya mempertahankan nilai-nilai luhur bangsa sambil terus beradaptasi dengan perkembangan zaman. Program-program pelestarian budaya dan penguatan karakter bangsa dijalankan untuk membangun identitas nasional yang kuat.\r\n\r\nPeran aktif masyarakat sangat dibutuhkan dalam mewujudkan generasi emas ini. Kolaborasi antara pemerintah, swasta, dan masyarakat akan menjadi kunci sukses dalam menghadapi tantangan dan memanfaatkan peluang di masa depan.\r\n\r\nDengan semangat gotong royong dan tekad yang kuat, Indonesia optimis dapat mencapai generasi emas, di mana setiap individu dapat hidup sejahtera, berkualitas, dan berkontribusi bagi kemajuan bangsa dan dunia.', 'upload/berita2.jpg', '2024-07-15', 'abi'),
(10, 'Squad timnas indonesia di round 3 kualifikasi piala dunia....', 'Yogyakarta - Timnas Indonesia telah mengumumkan daftar pemain yang akan berlaga di round 3 kualifikasi Piala Dunia 2026. Pelatih utama, Shin Tae-yong, telah memilih para pemain terbaik yang diharapkan dapat membawa Indonesia melangkah lebih jauh di ajang bergengsi ini.\r\nPelatih Shin Tae-yong menyatakan bahwa pemilihan pemain didasarkan pada performa terkini di klub masing-masing serta kesiapan mental dan fisik untuk menghadapi pertandingan internasional yang ketat. \"Kami telah melalui proses seleksi yang ketat dan memilih pemain yang tidak hanya berbakat, tetapi juga memiliki semangat juang yang tinggi. Saya yakin dengan kemampuan mereka untuk bersaing di level ini,\" ujar Shin Tae-yong dalam konferensi pers.\r\n\r\nTimnas Indonesia akan menghadapi beberapa lawan tangguh di round 3 kualifikasi Piala Dunia. Pertandingan pertama akan digelar melawan Timnas Korea Selatan pada 1 September di Seoul. Laga ini diharapkan menjadi ujian berat sekaligus kesempatan emas bagi para pemain untuk menunjukkan kemampuan terbaik mereka.\r\n\r\nPersiapan intensif telah dilakukan, termasuk latihan dan beberapa pertandingan persahabatan untuk meningkatkan kekompakan tim. Dukungan penuh dari masyarakat Indonesia sangat diharapkan untuk memberikan semangat kepada para pahlawan di lapangan.\r\n\r\nDengan komposisi pemain yang solid dan strategi yang matang, Timnas Indonesia optimis dapat memberikan penampilan terbaiknya dan melangkah lebih jauh di kualifikasi Piala Dunia 2026. Semua mata kini tertuju pada para pemain Garuda yang siap mengharumkan nama bangsa di kancah internasional.', 'upload/berita4.jpg', '2024-07-14', 'abi'),
(11, 'Suporter indonesia menjadi suporter terbaik di piala asia 2024 qatar', 'Doha - Ajang Piala Asia 2024 yang berlangsung di Qatar tidak hanya menjadi panggung bagi para pemain terbaik Asia untuk unjuk gigi, tetapi juga menjadi ajang pembuktian bagi suporter dari berbagai negara. Di tengah gegap gempita pertandingan, suporter Indonesia berhasil mencuri perhatian dunia dan dinobatkan sebagai suporter terbaik di Piala Asia 2024.\r\n\r\nPara suporter Indonesia yang dikenal dengan sebutan \"Garuda Supporters\" tampil luar biasa dalam mendukung tim nasionalnya. Mereka memenuhi stadion dengan semangat dan kreativitas yang tinggi, membawa warna-warni khas Indonesia melalui bendera, spanduk, dan atribut kebanggaan lainnya. Tidak hanya itu, koreografi spektakuler yang ditampilkan pada setiap pertandingan menjadi daya tarik tersendiri yang mengundang decak kagum dari penonton lain dan media internasional.\r\n\r\nKetua panitia penyelenggara Piala Asia 2024, Sheikh Salman bin Ebrahim Al Khalifa, memberikan apresiasi tinggi kepada suporter Indonesia. \"Suporter Indonesia telah menunjukkan dukungan yang luar biasa, tidak hanya untuk tim mereka tetapi juga menciptakan atmosfer yang sangat positif dan meriah di stadion. Mereka benar-benar layak mendapatkan penghargaan sebagai suporter terbaik di Piala Asia tahun ini,\" ujar Sheikh Salman.\r\n\r\nTidak hanya di dalam stadion, kehadiran suporter Indonesia juga terasa di seluruh kota-kota tempat pertandingan digelar. Mereka dengan ramah berinteraksi dengan suporter dari negara lain, menyebarkan semangat persaudaraan dan sportivitas. Hal ini memberikan kesan mendalam bagi masyarakat lokal dan suporter internasional lainnya.\r\n\r\nSejumlah pemain timnas Indonesia juga memberikan pujian kepada suporter yang terus memberikan dukungan tanpa henti. Kapten tim, Evan Dimas, menyatakan bahwa dukungan suporter memberikan energi tambahan bagi tim di setiap pertandingan. \"Kami sangat berterima kasih kepada para suporter yang telah datang jauh-jauh ke Qatar untuk mendukung kami. Mereka adalah pemain ke-12 yang selalu memberikan semangat dan motivasi bagi kami di lapangan,\" ujar Evan.', 'upload/berita5.jpg', '2024-07-14', 'abi');

-- --------------------------------------------------------

--
-- Table structure for table `klasemen`
--

CREATE TABLE `klasemen` (
  `klasemen_id` int(11) NOT NULL,
  `liga_id` int(11) NOT NULL,
  `nama_tim` varchar(255) NOT NULL,
  `main` int(11) NOT NULL,
  `menang` int(11) NOT NULL,
  `seri` int(11) NOT NULL,
  `kalah` int(11) NOT NULL,
  `gol` int(11) NOT NULL,
  `kebobolan` int(11) NOT NULL,
  `selisi_gol` int(11) NOT NULL,
  `poin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `klasemen`
--

INSERT INTO `klasemen` (`klasemen_id`, `liga_id`, `nama_tim`, `main`, `menang`, `seri`, `kalah`, `gol`, `kebobolan`, `selisi_gol`, `poin`) VALUES
(3, 1, 'Newcastle United F.C.', 38, 30, 5, 3, 60, 39, 21, 95),
(4, 1, 'Manchester United', 38, 37, 1, 0, 100, 3, 97, 112),
(7, 1, 'Manchester city', 38, 35, 2, 1, 100, 5, 95, 107),
(8, 1, 'Chealsea', 38, 34, 2, 2, 50, 10, 40, 104),
(13, 1, 'Totenham Hotspur', 38, 33, 3, 2, 99, 10, 89, 102),
(15, 1, 'Arsenal', 38, 34, 2, 2, 102, 30, 72, 104),
(16, 1, 'Liverpool F.C', 38, 36, 0, 1, 99, 20, 79, 108),
(17, 1, 'WestHam United', 38, 27, 10, 1, 70, 10, 60, 91),
(18, 1, 'Aston Villa', 38, 30, 3, 5, 100, 20, 80, 93),
(19, 1, 'Crystal palace F.C.', 38, 25, 5, 8, 50, 60, -10, 80),
(21, 1, 'Fulham', 38, 25, 5, 8, 60, 30, 30, 80);

-- --------------------------------------------------------

--
-- Table structure for table `liga`
--

CREATE TABLE `liga` (
  `liga_id` int(11) NOT NULL,
  `nama_liga` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `liga`
--

INSERT INTO `liga` (`liga_id`, `nama_liga`) VALUES
(1, 'Premier Legue'),
(3, 'Seria A'),
(4, 'Laliga'),
(5, 'bundersliga'),
(6, 'ligue1');

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `matches_id` int(11) NOT NULL,
  `home_team` varchar(100) NOT NULL,
  `away_team` varchar(100) NOT NULL,
  `home_score` int(11) DEFAULT 0,
  `away_score` int(11) DEFAULT 0,
  `match_date` date NOT NULL,
  `status` enum('Soon','Live','End') DEFAULT 'Soon'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`matches_id`, `home_team`, `away_team`, `home_score`, `away_score`, `match_date`, `status`) VALUES
(1, 'Man Utd', 'Man City', 1, 2, '2024-07-07', 'Soon'),
(2, 'Brazil', 'Uruguay', 1, 2, '2024-07-08', 'Soon'),
(3, 'Spanyol', 'England', 2, 1, '2024-07-15', 'End');

-- --------------------------------------------------------

--
-- Table structure for table `pertandingan`
--

CREATE TABLE `pertandingan` (
  `pertandingan_id` int(11) NOT NULL,
  `liga_id` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `waktu` varchar(10) DEFAULT NULL,
  `tim_home` varchar(255) DEFAULT NULL,
  `tim_away` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pertandingan`
--

INSERT INTO `pertandingan` (`pertandingan_id`, `liga_id`, `tanggal`, `waktu`, `tim_home`, `tim_away`) VALUES
(2, 1, '2024-07-05', '03:42', 'Man Utd', 'Man City'),
(3, 3, '2024-07-05', '00:06', 'AS roma', 'Man City'),
(9, 1, '2024-07-06', '12:43', 'Arsenal', 'WestHam'),
(10, 1, '2024-07-14', '21:33', 'Liverpool', 'Totenham Hotspur'),
(11, 4, '2024-07-14', '10:00', 'Barcelona', 'Girona');

-- --------------------------------------------------------

--
-- Table structure for table `transfer`
--

CREATE TABLE `transfer` (
  `transfer_id` int(11) NOT NULL,
  `nama_pemain` varchar(100) NOT NULL,
  `tim_asal` varchar(100) NOT NULL,
  `tim_tujuan` varchar(100) NOT NULL,
  `jumlah_transfer` decimal(10,2) NOT NULL,
  `tanggal_transfer` date NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `gambar_pemain` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transfer`
--

INSERT INTO `transfer` (`transfer_id`, `nama_pemain`, `tim_asal`, `tim_tujuan`, `jumlah_transfer`, `tanggal_transfer`, `deskripsi`, `gambar_pemain`) VALUES
(17, 'Cristiano Ronaldo', 'Man Utd', 'AL-Nasr', 99999999.99, '2024-07-14', 'Transfer', 'do.png'),
(18, 'Messi', 'PSG', 'Inter Miami', 90000000.00, '2024-07-15', 'Transfer', 'messi.jpg'),
(19, 'K. Mbape', 'PSG', 'Real-Madrid', 99999999.99, '2024-07-15', 'Transfer', 'mbape.jpg'),
(20, 'Ramus Hojlund', 'Atalanta', 'Manchester United', 70000000.00, '2024-07-16', 'Transfer', 'Rasmus-Hojlund.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_nama` varchar(20) NOT NULL,
  `user_password` varchar(20) NOT NULL,
  `user_namalengkap` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_nama`, `user_password`, `user_namalengkap`, `user_email`) VALUES
('abi', '12345', 'AbiHaidar', 'abi@gmail.com'),
('ilham', '12345', 'ilham cahyo', 'ilham@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`berita_id`),
  ADD KEY `user_nama` (`user_nama`);

--
-- Indexes for table `klasemen`
--
ALTER TABLE `klasemen`
  ADD PRIMARY KEY (`klasemen_id`),
  ADD KEY `liga_id` (`liga_id`);

--
-- Indexes for table `liga`
--
ALTER TABLE `liga`
  ADD PRIMARY KEY (`liga_id`);

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`matches_id`);

--
-- Indexes for table `pertandingan`
--
ALTER TABLE `pertandingan`
  ADD PRIMARY KEY (`pertandingan_id`),
  ADD KEY `liga_id` (`liga_id`);

--
-- Indexes for table `transfer`
--
ALTER TABLE `transfer`
  ADD PRIMARY KEY (`transfer_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_nama`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `berita_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `klasemen`
--
ALTER TABLE `klasemen`
  MODIFY `klasemen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `liga`
--
ALTER TABLE `liga`
  MODIFY `liga_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `matches_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pertandingan`
--
ALTER TABLE `pertandingan`
  MODIFY `pertandingan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `transfer`
--
ALTER TABLE `transfer`
  MODIFY `transfer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_ibfk_1` FOREIGN KEY (`user_nama`) REFERENCES `users` (`user_nama`);

--
-- Constraints for table `klasemen`
--
ALTER TABLE `klasemen`
  ADD CONSTRAINT `klasemen_ibfk_1` FOREIGN KEY (`liga_id`) REFERENCES `liga` (`liga_id`);

--
-- Constraints for table `pertandingan`
--
ALTER TABLE `pertandingan`
  ADD CONSTRAINT `pertandingan_ibfk_1` FOREIGN KEY (`liga_id`) REFERENCES `liga` (`liga_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
