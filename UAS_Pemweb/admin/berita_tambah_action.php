<?php
    include "config.php";
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $judul = $_POST["Judul"];
      $isiberita = $_POST["isi"];
      $tgl_upload = $_POST["tanggal"];
      $usernama = $_POST["user_nama"];

      // nama file temporary yang akan disimpan di server 
      $lokasifile = $_FILES['gambar']['tmp_name'];
      // membaca nama file yang akan diupload 
      $namafile = $_FILES['gambar']['name'];
      // folder penyimpanan berkas/file 
      $uploaddir = "upload/";
      // menggabungkan nama folder dan nama file 
      $uploadfile = $uploaddir . basename($namafile);

      // Jika file berhasil di upload 
      if (move_uploaded_file($lokasifile, $uploadfile)) {
          echo "Nama File: <b>$namafile</b> sukses di upload";
          // masukkan informasi hasil inputan ke dalam database 
          $sql = "INSERT INTO berita (berita_judul, berita_isi, berita_gambar, berita_tanggal, user_nama)
                  VALUES ('$judul', '$isiberita', '$uploadfile', '$tgl_upload', '$usernama')";
          $hasil = mysqli_query($config, $sql);
          if ($hasil) {
              header('Location: halaman_beritaterkini.php');
              exit;
          } else {
              echo "Error: " . mysqli_error($config);
          }
      } else {
          echo "File gagal disimpan. Error code: " . $_FILES['gambar']['error'];
      }
  }
?>