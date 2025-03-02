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
</head>

<body>
    <div class="container">
        <div class="row pt-5">
            <div class="col card shadow">
                <div class="card-body">
                    <h5 class="text-center card-title">FORMULIR EDIT DATA SISWA</h5>
                    <hr>
                    <?php
                    $id = $_GET['id'];
                    $query = mysqli_query($koneksi, "SELECT * FROM data_siswa WHERE id='$id'");
                    while ($data = mysqli_fetch_array($query)) {
                    ?>
                        <form method="post" enctype="multipart/form-data" action="edit_aksi.php?id=<?= $data['id']; ?>">
                            <!-- nama -->
                            <div class="row mb-3">
                                <div class="col-2">
                                    <label class="form-label my-1" for="nama">Nama</label>
                                </div>
                                <div class="col-10">
                                    <input class="form-control" type="text" name="Nama" placeholder="Masukan Nama" value="<?php echo $data['Nama']; ?>" required>
                                </div>
                            </div> <!-- end -->

                            <!-- uid -->
                            <div class="row mb-3">
                                <div class="col-2">
                                    <label class="form-label my-1" for="uid">UID</label>
                                </div>
                                <div class="col-10">
                                    <input class="form-control" type="text" name="uid" placeholder="Masukan Nama" value="<?php echo $data['uid']; ?>" required>
                                </div>
                            </div> <!-- end -->

                            <!-- nisn -->
                            <div class="row mb-3">
                                <div class="col-2">
                                    <label class="form-label my-1" for="nisn">N I S N</label>
                                </div>
                                <div class="col-10">
                                    <input class="form-control" type="text" name="nisn" placeholder="Masukan N I S N" maxlength="10" value="<?php echo $data['nisn']; ?>" required>
                                </div>
                            </div> <!-- end -->

                            <!-- submit -->
                            <div class="row mb-3">
                                <div class="col">
                                    <button type="submit" class="btn btn-success float-end">
                                        <i class="bi bi-check2-square"></i> Save
                                    </button>
                                    <a class="btn btn-danger float-end me-2" href="index.php?id=<?= $data['id']; ?>">
                                        <i class="bi bi-x-circle"></i>
                                    </a>
                                </div>
                            </div> <!-- end -->
                        </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>