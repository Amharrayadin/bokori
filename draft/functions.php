<?php
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

function query($query) {
    global $conn;

    // mengambil data di tabel mahasiswa di phpdasar
    $result = mysqli_query($conn, $query);
    $rows = [];

    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }

    return $rows;
}


// fungsi tambah data
function tambah($data) {
    global $conn;

    $nama = ucwords(addslashes(htmlspecialchars($data["nama"])));
    $nim = strtoupper(htmlspecialchars($data["nim"]));
    $email = htmlspecialchars($data["email"]);
    $jurusan = ucwords(htmlspecialchars($data["jurusan"]));

    // upload gambar
    $gambar = upload();
    if( !$gambar ) {
        return false;
    }

    $query = "INSERT INTO mahasiswa VALUES
                (NULL, '$nama', '$nim', '$email', '$jurusan', '$gambar')
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function upload() {

    $namaFile = $_FILES["gambar"]["name"];
    $ukuranFile = $_FILES["gambar"]["size"];
    $error = $_FILES["gambar"]["error"];
    $tmpName = $_FILES["gambar"]["tmp_name"];

    // cek apakah tidak ada gambar yang diupload
    if( $error === 4 ) {    // pesan error 4 -> tidak ada gambar diupload
        echo "<script>
                alert('Gambar belum diupload!');
                window.location='tambah.php';
              </script>";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ["jpeg", "jpg", "png"];
    $ekstensiGambar = explode(".", $namaFile);   // explode -> memecah string menjadi array
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {    // mengecek apakah ada string didalam array
        echo "<script>
                alert('Silahkan upload gambar yang valid!');
                window.location='tambah.php';
              </script>";
        return false;
    }

    // cek jika ukuran gambar terlalu besar
    if( $ukuranFile > 1024000 ) { // 1024000 byte (1 MB)
        echo "<script>
                alert('Gambar melebihi 1 MB!');
              </script>";
        return false;
    }

    // lolos pengecekan, gambar siap diupload
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFileBaru;
}


// fungsi hapus data
function hapus($id) {
    global $conn;

    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
    mysqli_affected_rows($conn);
}


// fungsi ubah data
function ubah($data) {
    global $conn;

    $id = $data["id"];
    $nama = ucwords(addslashes(htmlspecialchars($data["nama"])));
    $nim = strtoupper(htmlspecialchars($data["nim"]));
    $email = htmlspecialchars($data["email"]);
    $jurusan = ucwords(htmlspecialchars($data["jurusan"]));
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    // cek apakah user pilih gambar baru atau tidak
    if( $_FILES["gambar"]["error"] === 4 ) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

    $query = "UPDATE mahasiswa SET
                nama = '$nama',
                nim = '$nim',
                email = '$email',
                jurusan = '$jurusan',
                gambar = '$gambar'
              WHERE id = $id
             ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


// fungsi cari data
function cari($keyword) {
    $query = "SELECT * FROM mahasiswa
                WHERE
                nama LIKE '%$keyword%' OR
                nim LIKE '%$keyword%' OR
                email LIKE '%$keyword%' OR
                jurusan LIKE '%$keyword%'
            ";
    return query($query);
}


// fungsi registrasi
function registrasi($data) {
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");
    if( mysqli_fetch_assoc($result) ) {
        echo "
            <script>
                alert('Username sudah terdaftar!');
                window.location='registrasi.php';
            </script>
        ";
        return false;
    }

    // cek konfirmasi password
    if( $password !== $password2 ) {
        echo "
            <script>
                alert('Konfirmasi password tidak sesuai!');
                window.location='registrasi.php';
            </script>
        ";
        return false;
    }

    // enkripsi
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan userbaru ke database
    mysqli_query($conn, "INSERT INTO users VALUES(NULL, '$username', '$password')");

    mysqli_affected_rows($conn);
}

?>