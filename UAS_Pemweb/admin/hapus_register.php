<?php
include "config.php";

$user = $_GET['user_nama'];
$sql = "DELETE FROM users WHERE user_nama='$user'";
$hasil = mysqli_query($config, $sql);
mysqli_close($config);

if ($hasil) {
    echo "
    <div class='alert alert-success alert-dismissible fade show' role='alert'>
        Data berhasil dihapus.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
        </button>
    </div>";
} else {
    echo "
    <div class='alert alert-danger alert-dismissible fade show' role='alert'>
        Terjadi kesalahan saat menghapus data.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
        </button>
    </div>";
}

echo "<script>
    setTimeout(function() {
        window.location.href = 'halaman_register.php';
    }, 3000); // Redirect after 3 seconds
</script>";
?>
