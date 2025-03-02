<?php 
include 'koneksi.php';

$uid = $_POST['uid'];
$nisn = $_POST['nisn'];
$nama = $_POST['Nama'];


    mysqli_query($koneksi, "INSERT INTO data_siswa VALUES(NULL,'$uid','$nisn','$nama')");

    header("location:index.php?alert=berhasil");


?>