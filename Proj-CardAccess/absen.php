<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD (Create, Read, Updete, Delete)</title>
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script type="text/javascript">
        setTimeout(function(){
            location.reload();
        }, 5000); 
    </script>
</head>

<body>
    <div class="container ">
        <div class="row py-4">
            <div class="col card shadow">
                <h4 class="mt-4">CRUD (Create, Read, Updete, Delete)</h4>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolore perspiciatis ex explicabo minima adipisci sed, reprehenderit ratione odio error libero nemo, natus, sapiente doloremque? Architecto iusto porro nulla. Sunt, suscipit.</p>
                <hr>
                <div class="">
                    <a class="btn btn-primary mb-3" href="index.php"><b>Back</b></a>
                </div>
                <h1>DATA ABSEN SISWA</h1>
                <?php
                // Check if there are new records in the last minute
                $new_records_query = mysqli_query($koneksi, "SELECT * FROM data_absen WHERE waktu >= NOW() - INTERVAL 1 MINUTE");
                if (mysqli_num_rows($new_records_query) > 0) {
                    echo "<script>
                            Swal.fire({
                                title: 'New Record!',
                                text: 'Data baru berhasil ditambahkan!',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            });
                        </script>";
                }
                ?>
                <table class="table table-bordered">
                    <tr>
                        <th>No</th>
                        <th>UID</th>
                        <th>NISN</th>
                        <th>Nama</th>
                        <th>Waktu</th>
                    </tr>
                    <?php
                    $no = 1;
                    $query = mysqli_query($koneksi, "SELECT  data_absen.uid, data_siswa.nisn, data_siswa.Nama, data_absen.waktu FROM data_absen INNER JOIN data_siswa ON data_absen.uid = data_siswa.uid;");
                    while ($data = mysqli_fetch_array($query)) {
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $data['uid']; ?></td>
                            <td><?= $data['nisn']; ?></td>
                            <td><?= $data['Nama']; ?></td>
                            <td><?= $data['waktu']; ?></td>
                            <td>

                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>

            </div>
        </div>
    </div>

    <script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>