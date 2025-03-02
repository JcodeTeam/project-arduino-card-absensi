<?php 
include 'koneksi.php';
 
$id = $_GET['id'];
$uid = $_POST['uid'];
$nisn = $_POST['nisn'];
$Nama = $_POST['Nama'];

    mysqli_query($koneksi, "UPDATE data_siswa SET uid='$uid', nisn='$nisn', Nama='$Nama' WHERE id='$id'");
    header("location:index.php?alert=berhasil");                                                                         
 
?>