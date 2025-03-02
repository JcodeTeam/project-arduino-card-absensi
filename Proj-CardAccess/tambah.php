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
        <div class="row py-4">
            <div class="col card shadow">
                <div class="card-body">
                    <h4 class="mt-3">FORMULIR TAMBAH DATA SISWA</h4>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolore perspiciatis ex explicabo minima adipisci sed, reprehenderit ratione odio error libero nemo, natus, sapiente doloremque? Architecto iusto porro nulla. Sunt, suscipit.</p>
                    <hr>
                    <h5 class="text-center card-title">FORMULIR TAMBAH DATA SISWA</h5>
                    <form method="post" action="tambah_aksi.php" enctype="multipart/form-data">

                        <!-- uid -->
                        <div class="row mb-3">
                            <div class="col-2">
                                <label class="form-label my-1" for="uid">UID</label>
                            </div>
                            <div class="col-10">
                                <input class="form-control" type="text" name="uid" placeholder="Masukan UID" maxlength="15" required>
                            </div>
                        </div> <!-- end -->

                        <!-- nisn -->
                        <div class="row mb-3">
                            <div class="col-2">
                                <label class="form-label my-1" for="nisn">N I S N</label>
                            </div>
                            <div class="col-10">
                                <input class="form-control" type="text" name="nisn" placeholder="Masukan N I S N" maxlength="10" required>
                            </div>
                        </div> <!-- end -->

                        <!-- Nama -->
                        <div class="row mb-3">
                            <div class="col-2">
                                <label class="form-label my-1" for="Nama">Nama Lengkap</label>
                            </div>
                            <div class="col-10">
                                <input class="form-control" type="text" name="Nama" placeholder="Masukan Nama Anda" required>
                            </div>
                        </div> <!-- end -->


                        <!-- submit -->
                        <div class="row mb-3">
                            <div class="col">
                                <button type="submit" class="btn btn-success float-end">
                                    <i class="bi bi-check2-square"></i> Submit
                                </button>
                                <a class="btn btn-danger float-end me-2" href="index.php">
                                    <i class="bi bi-x-circle"></i>
                                </a>
                            </div>
                        </div> <!-- end -->
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>