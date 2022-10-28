<?php
    // koneksi ke database
    $conn = mysqli_connect("localhost", "root", "root", "phppemula");

    function query($query){
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }


    function tambah($data) {
        global $conn;

        $nama = htmlspecialchars($data["nama"]);
        $gender = htmlspecialchars($data["gender"]);
        $asal = htmlspecialchars($data["asal"]);
        $distrik = htmlspecialchars($data["distrik"]);

        // upload gambar
        $gambar = upload();
        if (!$gambar) {
            return false;
        }

    $query = "INSERT INTO hewan
    VALUES
    ('', '$nama', '$gender', '$asal', '$distrik', '$gambar')
    ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
    }

    function upload() {
        $namaFile = $_FILES['gambar']['name'];
        $ukuranFile = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $tmpNama = $_FILES['gambar']['tmp_name'];

        //cek apakah tidak ada gambar yang diupload
        if( $error === 4 ) {
            echo "<script>
                    alert('pilih gambar terlebih dahulu');
                </script>";
            return false;
        }

        //cek apakah yang diupload adalah gambar
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
            echo "<script>
                alert('yang anda upload bukan gambar!');
            </script>";
        return false;
        }

        //cek jika ukurannya terlalu besar
        if ($ukuranFile > 1000000) {
            echo "<script>
                alert('ukuran gambar terlalu besar!');
            </script>";
        return false;
        }

        //lolos pengecekan, gamabr siap diupload
        //generate nama gambar baru
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;

        move_uploaded_file($tmpNama, 'img/' . $namaFileBaru);
        return $namaFileBaru;

    }

    function hapus($id) {
        global $conn;
        mysqli_query($conn, "DELETE FROM hewan WHERE id = $id");
        return mysqli_affected_rows($conn);
    }

    function ubah($data) {
        global $conn;

        $id = $data["id"];
        $nama = htmlspecialchars($data["nama"]);
        $gender = htmlspecialchars($data["gender"]);
        $asal = htmlspecialchars($data["asal"]);
        $distrik = htmlspecialchars($data["distrik"]);
        $gambarlama = htmlspecialchars($data["gambarlama"]);

        //cek apakah user pilih gambar baru atau tidak
        if($_FILES['gambar']['error'] === 4) {
            $gambar = $gambarlama;
        } else {
            $gambar = upload();
        }

        $query = "UPDATE hewan SET
            nama = '$nama',
            gender = '$gender',
            asal = '$asal',
            distrik = '$distrik',
            gambar = '$gambar'

            WHERE id = $id
        ";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function cari($keyword){
        $query = "SELECT * FROM hewan
                WHERE
            nama LIKE '$keyword'
            ";
        return query($query);
    }
?>