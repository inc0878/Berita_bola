<?php
include "Config.php";
$id_berita = $_GET['berita_id'];
$sql = "DELETE FROM berita WHERE berita_id = '$id_berita'";
mysqli_query($config, $sql);
mysqli_close($config); 

// Menggunakan alert dengan JavaScript untuk memberi notifikasi
echo "<script> alert('Data berhasil dihapus'); window.location.href = 'halaman_utama.php'; </script>";
?>