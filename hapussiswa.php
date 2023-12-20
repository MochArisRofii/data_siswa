<?php
include 'koneksi.php';
    $sql=mysqli_query($config,"DELETE from siswa WHERE id_siswa='$_GET[id]'");

    echo "<script>alert('Data Siswa Berhasil Di HAPUS!');</script>";
    echo "<script>location='index.php?page=siswa';</script>";
?>