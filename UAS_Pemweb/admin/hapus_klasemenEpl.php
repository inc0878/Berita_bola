<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include "config.php";

if (isset($_GET['klasemen_id'])) {
    $klasemen_id = $_GET['klasemen_id'];
    $sql = "DELETE FROM klasemen WHERE klasemen_id = '$klasemen_id'";
    
    if (mysqli_query($config, $sql)) {
        header("Location: halaman_klasemenEpl.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($config);
    }
}
?>
