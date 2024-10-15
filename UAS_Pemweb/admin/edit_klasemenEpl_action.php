<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $klasemen_id = $_POST['klasemen_id'];
    $nama_tim = $_POST['nama_tim'];
    $main = $_POST['main'];
    $menang = $_POST['menang'];
    $seri = $_POST['seri'];
    $kalah = $_POST['kalah'];
    $gol = $_POST['gol'];
    $kebobolan = $_POST['kebobolan'];
    $selisi_gol = $gol - $kebobolan;
    $poin = ($menang * 3) + $seri;

    $sql_update = "UPDATE klasemen 
                   SET nama_tim = '$nama_tim' ,main = '$main', menang = '$menang', seri = '$seri', kalah = '$kalah', gol = '$gol', kebobolan = '$kebobolan', selisi_gol = '$selisi_gol', poin = '$poin'
                   WHERE klasemen_id = '$klasemen_id'";
    
    if (mysqli_query($config, $sql_update)) {
        header("Location: halaman_klasemenEpl.php");
        exit();
    } else {
        echo "Error: " . $sql_update . "<br>" . mysqli_error($config);
    }
}
?>
