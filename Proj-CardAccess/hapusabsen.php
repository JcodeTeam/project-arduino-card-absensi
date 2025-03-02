<?php 
include 'koneksi.php';

$id = $_GET['id'];

mysqli_query($koneksi, "DELETE FROM data_absen WHERE data_absen.id ='$id'"); ;

header("location:absen.php");
?>