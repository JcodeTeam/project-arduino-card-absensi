<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'card_access');

if (mysqli_connect_errno()) {
    echo "Koneksi database gagal : " . mysqli_connect_error();
}
?>