<?php
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['pertandingan_id'])) {
    
    $pertandingan_id = $_GET['pertandingan_id'];

    $sql = "DELETE FROM pertandingan WHERE pertandingan_id='$pertandingan_id'";

    if (mysqli_query($config, $sql)) {

        echo "<script>alert('Data berhasil dihapus!'); window.location.href='halaman_jadwalpertandingan.php';</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan saat menghapus data!'); window.location.href='halaman_jadwalpertandingan.php';</script>";
    }

    mysqli_close($config);
} else {
    echo "<script>alert('Metode tidak diizinkan atau pertandingan_id tidak ditemukan!'); window.location.href='halaman_jadwalpertandingan.php';</script>";
}
?>
