<?php
    // Cek status di URL
    if (isset($_GET['status'])) {
        $status = $_GET['status'];
        if ($status == 'sukses') {
            echo "<script>alert('Data berhasil dihapus!');</script>";
        } elseif ($status == 'error') {
            echo "<script>alert('Terjadi kesalahan saat menghapus data!');</script>";
        }
    }
    ?>