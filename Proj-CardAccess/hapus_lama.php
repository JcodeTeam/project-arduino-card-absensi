<?php 
include 'koneksi.php';

mysqli_query($koneksi, "DELETE FROM `data_absen` WHERE `waktu` < NOW() - INTERVAL 12 HOUR");

header("Location: absen.php");
?>
