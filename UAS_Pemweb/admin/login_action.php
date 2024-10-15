<?php 
  session_start();
  include('config.php');
  $user = $_POST['username'];
  $pass = $_POST['password'];

  $sql = "SELECT * FROM users WHERE user_nama = '$user' AND user_password = '$pass'";
  $result = mysqli_query($config, $sql);

  if (mysqli_num_rows($result) == 1) {
    $_SESSION['username'] = $user;
    header("Location: halaman_admin.php");
    exit();
  } 
?>