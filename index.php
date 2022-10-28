<?php
require 'functions.php';
$hewan = query("SELECT * FROM hewan");

// tombol cari ditekan
if (isset($_POST["cari"]) ) {
    $hewan = cari($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
     <!-- Bootstrap CSS only -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />

    <!-- Font Awesome CSS -->
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
    integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
    />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet" />

    <!-- Style -->
    <link href="./assets/css/style.css" rel="stylesheet" />

</head>
<body>
        <!-- TOP BAR START-->
    <div class="bg-primary text-light border-bottom border-5  sticky-top shadow">
      <!-- .container start -->
      <div class="container">
        <!-- .row start -->
        <div class="row py-3">
          <!-- .col start -->
          <div class="col-lg-12">
            <div class="d-lg-flex flex-xl-wrap align-items-center justify-content-lg-between justify-content-xl-between">
              <div class="text-center">
                <a href="#" class="text-decoration-none link-light me-3"><i class="fa-solid fa-house"></i> Home</a>
                <a href="#" class="text-decoration-none link-light me-3"><i class="fa-solid fa-address-card"></i> about</a>
                <a href="login.html" class="link-light fw-bolder text-decoration-none me-3"><i class="fa-brands fa-envira"></i> Galery</a>
              </div>

              <div class="d-flex flex-wrap justify-content-center text-center">
                <a href="daftar.html" class="link-light fw-bolder text-decoration-none"><i class="fa-solid fa-right-to-bracket"></i> Login</a>
              </div>
            </div>
          </div>
          <!-- .col end -->
        </div>
        <!-- .row end -->
      </div>
      <!-- .container end -->
    </div>
    <!-- TOP BAR END -->

<!-- TABEL DAFTAR START -->
        <div class="py-5">
      <!-- .container start -->
      <div class="container my-4">
        <!-- .row start -->
        <div class="row">
          <!-- .col start -->
          <div class="col-lg-12 mx-auto text-center mb-4">
            <h1 class="display-5 fw-bolder text-info">
            <i class="fa-solid fa-list"></i>
              Daftar Hewan
            </h1>

            <p class="text-muted pt-1">Berbagai Jenis Hewan Menarik Di Papua <b><a href="#" class="text-decoration-none">Lihat Hewan-Hewan Unik Di Papua</a></b></p>
          </div>
          <!-- .col end -->
        </div>
        <!-- .row end -->

        <!-- .row start -->
        <div class="row">
          <!-- .col start -->
          <div class="col-xl-12 col-lg">
            <!-- .card start -->
            <div class="card shadow">
              <!-- .card body start -->
              <div class="card-body">
                
              <div class="text-muted py-3">
                <div class="py-3">
                  <form action="" method="POST">
                    <div class="input-group">
                    <input type="text" class="form-control form-control-sm px-4 py-3 shadow" name="keyword" autofocus placeholder="Keyword Pencarian.." autocomplete="off">
                    <button class="btn btn-primary fw-bolder px-lg-5 text-light" type="submit" name="cari"><i class="fa-solid fa-search me-2"></i>Cari!</button>
                    </div>
                </form>
                </div>
                <div class="mt-2">
                    <h3>
                  <a href="./function/tambah.php" class="text-decoration-none link-success"> <i class="fa-sharp fa-solid fa-circle-plus"></i> Tambah Data Hewan</a>
                  </h3>
                </div>
                </div>

                <!-- .table start -->
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                        <th class="bg-primary text-light py-3">No</th>
                        <th class="bg-primary text-light py-3">Aksi</th>
                        <th class="bg-primary text-light py-3">Gambar</th>
                        <th class="bg-primary text-light py-3">Nama</th>
                        <th class="bg-primary text-light py-3">Jenis Kelamin</th>
                        <th class="bg-primary text-light py-3">Asal</th>
                        <th class="bg-primary text-light py-3">Distrik</th>
                    </tr>
                  </thead>

                    <!-- table hewan start -->
                    <tbody>
                    <?php $i = 1; ?>
                    <?php foreach($hewan as $row) : ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td>
                            <a href="ubahdata.php?id=<?= $row["id"]; ?>" class="text-primary text-decoration-none"><i class="fa-regular fa-pen-to-square"></i> Edit</a><br>
                            <a href="hapusdata.php?id=<?= $row["id"]; ?>" onclick="
                            return confirm('yakin?');" class="text-danger text-decoration-none"><i class="fa-solid fa-trash"></i> Hapus</a>
                        </td>
                        <td><img src="./assets/img/<?= $row["gambar"]; ?>" width="80"></td>
                        <td><?= $row["nama"]; ?></td>
                        <td><?= $row["gender"]; ?></td>
                        <td><?= $row["asal"]; ?></td>
                        <td><?= $row["distrik"]; ?></td>
                    </tr>
                    <?php $i++ ?>
                    <?php endforeach; ?>    
                </table>
                <!-- .table hewan end -->
              </div>
              <!-- .card body end -->
            </div>
            <!-- .card end -->
          </div>
          <!-- .col end -->

          </div>
          <!-- .col end -->
        </div>
        <!-- .row end -->
      </div>
      <!-- .container end -->
    </div>
    <!-- TABEL DAFTAR END -->
    
    <!-- Bootstrap JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

</body>
</html>