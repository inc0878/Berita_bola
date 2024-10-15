<?php
// Memulai session jika belum dimulai
session_start();

// Cek apakah user sudah login, jika belum redirect ke halaman login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Sisipkan file konfigurasi database
include "config.php";

// Ambil ID transfer dari parameter URL
if (isset($_GET['id'])) {
    $transfer_id = $_GET['id'];

    // Query untuk menghapus data transfer berdasarkan ID
    $sql = "DELETE FROM transfer WHERE transfer_id = '$transfer_id'";

    if (mysqli_query($config, $sql)) {
        // Redirect ke halaman transfer.php jika data berhasil dihapus
        header("Location: halaman_transfer.php");
        exit();
    } else {
        // Redirect ke halaman transfer.php dengan pesan error jika query gagal
        header("Location: transfer.php?error=" . urlencode(mysqli_error($config)));
        exit();
    }
} else {
    // Redirect ke halaman transfer.php jika ID tidak ditemukan
    header("Location: transfer.php");
    exit();
}
?>
