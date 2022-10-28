<?php 
require 'functions.php';

// ambil data di url
$id = $_GET["id"];

// query data hewan berdasarkan id
$hwn = query("SELECT * FROM hewan WHERE id = $id")[0];

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {

    // cek apakah data berhasil di ubah atau tidak
   if ( ubah($_POST) > 0) {
    echo "
        <script> 
            alert('data berhasil di ubah');
            document.location.href = 'index.php';
        </script>
    ";
   } else {
    echo "
        <script> 
            alert('data gagal diubah');
            document.location.href = 'index.php';
        </script>
    ";
   }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ubah Data Hewan</title>
    <!-- Bootstrap CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet'>

    <!-- Style -->
    <link href='./assets/css/style.css' rel='stylesheet'>
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
            </div>
          </div>
          <!-- .col end -->
        </div>
        <!-- .row end -->
      </div>
      <!-- .container end -->
    </div>
    <!-- TOP BAR END -->
    <!-- Tambah START -->
    <div class="py-5">
      <div class="container my-5">
        <div class="row">
          <div class="col-8 mx-auto">
            <!-- CARD START -->
            <div class="card text-center">

              <!-- CARD HEADER START -->
              <div class="card-header pt-5 bg-primary">
                <h1 class="text-light"> <i class="fa-regular fa-pen-to-square"></i> Ubah Data Hewan</h1>
                <p class="text-dark py-4"> Mengubah Data yang ada. setiap isi yang ingin dirubah</p>
              </div>
              <!-- CARD HEADER END -->

              <!-- card body start -->
              <div class="card-body p-5 mb-3 text-start shadow-lg">
              <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $hwn["id"]; ?>">
                <input type="hidden" name="gambarlama" value="<?= $hwn["gambar"]; ?>">

                    <!-- form group start -->
                    <div class="form-group mb-3">
                        <label for="nama" class="form-label fw-bolder text-muted">
                        <i class="fa-solid fa-id-card-clip me-1"></i> Nama hewan :</label>
                        <input type="text" name="nama" id="nama" class="form-control form-control-lg p-4" required value="<?= $hwn["nama"]; ?>">
                    </div>
                    <!-- form group end -->

                    <!-- form group start -->
                    <div class="form-group mb-3">
                        <label for="gender" class="form-label fw-bolder text-muted">
                        <i class="fa-solid fa-person-half-dress me-1"></i> Jenis Kelamin</label>
                        <select id="jenis-kelamin" name="gender" class="form-select form-select-lg py-4 mb-3" id="gender" required>
                            <option value="<?= $hwn["gender"]; ?>">Jantang</option>
                            <option value="<?= $hwn["gender"]; ?>">Betina</option>
                        </select>
                    </div>
                    <!-- form group end -->

                    <!-- form group start -->
                    <div class="form-group mb-3">
                        <label for="asal" class="form-label fw-bolder text-muted">
                        <i class="fa-solid fa-id-card-clip me-1"></i> Kabupaten</label>
                        <input type="text" name="asal" id="asal" class="form-control form-control-lg p-4" required value="<?= $hwn["asal"]; ?>">
                    </div>
                    <!-- form group end -->

                    <!-- form group start -->
                    <div class="form-group mb-3">
                        <label for="distrik" class="form-label fw-bolder text-muted">
                        <i class="fa-solid fa-id-card-clip me-1"></i> Distrik</label>
                        <input type="text" name="distrik" id="distrik" class="form-control form-control-lg p-4" required value="<?= $hwn["distrik"]; ?>">
                    </div>
                    <!-- form group end -->

                    <!-- form group start -->
                    <div class="form-group mb-3">
                        <label for="gambar" class="form-label fw-bolder text-muted"> <i class="fa-solid fa-id-card-clip me-1"></i> Gambar :</label><br>
                        <img src="img/<?= $hewan['gambar']; ?>" width="60"><br>
                        <input type="file" name="gambar" id="gambar"  class="form-control form-control-lg p-4"  required>
                    </div>
                    <!-- form group end -->
                    
                    <!-- form group start -->
                <div class="form-group mb-3">
                    <button type="submit" name="submit" class="btn btn-primary text-light p-4 w-100 fw-bolder"> Ubah Data</button>
                  </div>
                  <!-- form group end -->
                </form>
              </div>
              <!-- card body end -->

            <!-- CARD END -->
          </div>
        </div>
      </div>
    </div>
    <!-- tambah END -->
</body>
</html>