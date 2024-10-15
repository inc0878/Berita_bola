<?php
// Sertakan file koneksi database
include 'config.php';

// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = []; // Array untuk menyimpan pesan kesalahan validasi

    // Ambil data input
    $date = $_POST['tanggal'];
    $league_id = $_POST['liga'];
    $home_team = $_POST['tim_home'];
    $away_team = $_POST['tim_away'];
    $time = $_POST['waktu'];

    // Validasi input
    if (empty($date)) {
        $errors[] = "Date is required";
    }
    if (empty($league_id)) {
        $errors[] = "League is required";
    }
    if (empty($home_team)) {
        $errors[] = "Home Team is required";
    }
    if (empty($away_team)) {
        $errors[] = "Away Team is required";
    }
    if (empty($time)) {
        $errors[] = "Time is required";
    }

    // Jika tidak ada kesalahan, lanjutkan dengan memasukkan data ke database
    if (empty($errors)) {
        $sql = "INSERT INTO pertandingan (liga_id, tanggal, waktu, tim_home, tim_away) 
                VALUES ('$league_id', '$date', '$time', '$home_team', '$away_team')";
        if ($config->query($sql) === TRUE) {
            // Redirect kembali ke halaman utama jadwal atau tampilkan pesan sukses
            header('Location: halaman_jadwalpertandingan.php');
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $config->error;
        }
    } else {
        // Jika ada kesalahan validasi, tampilkan pesan kesalahan
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
}
?>