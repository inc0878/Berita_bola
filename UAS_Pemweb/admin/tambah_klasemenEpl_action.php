<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_tim = $_POST['nama_tim'];
    $liga_id = $_POST['liga_id'];

    $sql = "INSERT INTO klasemen (liga_id, nama_tim) VALUES ('$liga_id', '$nama_tim')";
    if (mysqli_query($config, $sql)) {
        header("Location: tambah_klasemenEpl.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($config);
    }
}
?>
