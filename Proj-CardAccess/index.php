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
</head>

<body>
    <div class="container ">
        <div class="row py-4">
            <div class="col card shadow">
                <h4 class="mt-4">CRUD (Create, Read, Updete, Delete)</h4>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolore perspiciatis ex explicabo minima adipisci sed, reprehenderit ratione odio error libero nemo, natus, sapiente doloremque? Architecto iusto porro nulla. Sunt, suscipit.</p>
                <hr>
                <div class="">
                    <a class="btn btn-primary mb-3" href="tambah.php">
                        <i class="bi bi-person-add"></i> <b>Tambah Siswa</b>
                    </a>
                    <a class="btn btn-success mb-3" href="absen.php">
                        <b>Lihat Data Absen</b>
                    </a>
                </div>
                <table class="table table-bordered">
                    <tr>
                        <th>No</th>
                        <th>UID</th>
                        <th>NISN</th>
                        <th>Nama</th>
                        <th>Opsi</th>
                    </tr>
                    <?php
                    $no = 1;
                    $query = mysqli_query($koneksi, "select * from data_siswa");
                    while ($data = mysqli_fetch_array($query)) {
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $data['uid']; ?></td>
                            <td><?= $data['nisn']; ?></td>
                            <td><?= $data['Nama']; ?></td>
                            <td>
                                <a class="btn btn-primary" href="edit.php?id=<?= $data['id']; ?>">
                                    EDIT
                                </a>
                                <a class="btn btn-outline-danger " href="hapus.php?id=<?php echo $data['id']; ?>">
                                    <i class="bi bi-trash3-fill"></i>
                                </a>
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
</body>

</html>