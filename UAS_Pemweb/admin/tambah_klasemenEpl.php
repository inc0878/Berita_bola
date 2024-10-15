<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $liga_id = $_POST['liga_id'];
    $nama_tim = $_POST['nama_tim'];
    $main = $_POST['main'];
    $menang = $_POST['menang'];
    $seri = $_POST['seri'];
    $kalah = $_POST['kalah'];
    $gol = $_POST['gol'];
    $kebobolan = $_POST['kebobolan'];
    $selisi_gol = $gol - $kebobolan;
    $poin = ($menang * 3) + $seri;

    $sql = "INSERT INTO klasemen (liga_id, nama_tim, main, menang, seri, kalah, gol, kebobolan, selisi_gol, poin) 
            VALUES ('$liga_id', '$nama_tim', '$main', '$menang', '$seri', '$kalah', '$gol', '$kebobolan', '$selisi_gol', '$poin')";
    
    if (mysqli_query($config, $sql)) {
        header("Location: halaman_klasemenEpl.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($config);
    }
}

$sql_liga = "SELECT * FROM liga";
$result_liga = mysqli_query($config, $sql_liga);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Tim</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h3 class="text-center">Tambah Tim</h3>
        <form action="" method="post">
            <div class="form-group">
                <label for="liga_id">Liga</label>
                <select name="liga_id" id="liga_id" class="form-control" required>
                    <option value="">Pilih Liga</option>
                    <?php while ($liga = mysqli_fetch_array($result_liga)) { ?>
                        <option value="<?php echo $liga['liga_id']; ?>"><?php echo $liga['nama_liga']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="nama_tim">Nama Tim</label>
                <input type="text" name="nama_tim" id="nama_tim" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="main">Pertandingan</label>
                <input type="number" name="main" id="main" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="menang">Menang</label>
                <input type="number" name="menang" id="menang" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="seri">Seri</label>
                <input type="number" name="seri" id="seri" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="kalah">Kalah</label>
                <input type="number" name="kalah" id="kalah" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="gol">Gol</label>
                <input type="number" name="gol" id="gol" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="kebobolan">Kebobolan</label>
                <input type="number" name="kebobolan" id="kebobolan" class="form-control" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
