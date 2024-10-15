<?php
session_start();
include 'config.php';

$berita_id = $_GET['berita_id'];
$sql = "DELETE FROM berita WHERE berita_id = $berita_id";

if (mysqli_query($config, $sql)) {
    $_SESSION['message'] = "Berita berhasil dihapus";
} else {
    $_SESSION['message'] = "Gagal menghapus berita: " . mysqli_error($config);
}

header("Location: halaman_beritaterkini.php");
exit();
?>
