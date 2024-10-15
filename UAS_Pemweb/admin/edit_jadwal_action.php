<?php
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $pertandingan_id = $_POST['pertandingan_id'];
    $tanggal = $_POST['tanggal'];
    $waktu = $_POST['waktu'];

    $sql = "UPDATE pertandingan SET tanggal='$tanggal', waktu='$waktu' 
            WHERE pertandingan_id='$pertandingan_id'";

    if (mysqli_query($config, $sql)) {
        header("Location: halaman_jadwalpertandingan.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($config);
    }

    mysqli_close($config);
} else {
    echo "Metode tidak diizinkan.";
}
?>
