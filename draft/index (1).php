<?php
session_start();

if( !isset($_SESSION["login"])  ) {
    header("Location: login.php");
    exit;
}

// menghubungkan ke halaman functions.php
require "functions.php";

$mahasiswa = query("SELECT * FROM mahasiswa");

// tombol cari ditekan
if( isset($_POST["cari"]) ) {
    $mahasiswa = cari($_POST["keyword"]);
}

// tombol sortir ditekan
if( isset($_POST["sortirDefault"]) ) {
    $mahasiswa = query("SELECT * FROM mahasiswa ORDER BY id ASC");
} elseif( isset($_POST["sortirNama"]) ) {
    $mahasiswa = query("SELECT * FROM mahasiswa ORDER BY nama ASC");
} elseif( isset($_POST["sortirNIM"]) ) {
    $mahasiswa = query("SELECT * FROM mahasiswa ORDER BY nim ASC");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        a { color: white; text-decoration: none; }
        a:hover { color: wheat; }
        #loader {
            width: 30px;
            display: none;
            margin-left: 10px;
        }
        .d-grid:hover {
            background: #eaeaea;
        }
        .d-grid {
            transition: .3s;
        }
        @media (max-width: 576px) {
            .a {
                width: 250px;
            }
        }
    </style>
</head>
<body style="background: #eaeaea;">

    <!-- header -->
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">Navbar</a>
            <!-- hamburger menu -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <!-- akhir hamburger menu -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php" onclick="return confirm('Logout?');">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- akhir header -->

    <div class="container-sm mt-3">
        <h1 class="text-center mb-3">Daftar Mahasiswa IT</h1>

        <div class="d-flex justify-content-between">
            <a href="tambah.php" class="btn btn-primary btn-sm" style="color: white; text-decoration: none;">Tambah data mahasiswa</a>
            <div class="btn-group dropstart">
                <button type="button" class="btn btn-sm btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Urutkan berdasarkan
                </button>
                <ul class="dropdown-menu">
                    <form action="" method="POST">
                        <li>
                            <div class="d-grid">
                                <button class="btn btn-sm btn-transparent" type="submit" name="sortirDefault">Default</button>
                            </div>
                        </li>
                        <li>
                            <div class="d-grid">
                                <button class="btn btn-sm btn-transparent" type="submit" name="sortirNama">Nama</button>
                            </div>
                        </li>
                        <li>
                            <div class="d-grid">
                                <button class="btn btn-sm btn-transparent" type="submit" name="sortirNIM">NIM</button>
                            </div>
                        </li>
                    </form>
                </ul>
            </div>
        </div>

        <br>

        <form class="d-flex mb-3" action="" method="POST">
            <input style="max-width: 400px;" class="form-control btn-sm a" type="text" name="keyword" autofocus autocomplete="off" id="keyword" placeholder="Cari data mahasiswa" aria-label="Search">
            <!-- <button class="btn btn-primary" type="submit" name="cari" id="tombol-cari">Cari</button> -->
            <img id="loader" src="img/loader.gif" alt="loading">
        </form>


        <!-- table data mahasiswa -->
        <div id="container">
            <div class="table-responsive" style="line-height: 30px;">
                <table class="table table-dark table-hover table-bordered table-sm table-striped mb-5">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">No.</th>
                            <th scope="col">Aksi</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Jurusan</th>
                        </tr>
                    </thead>

                    <?php $i = 1; ?>
                    <?php foreach($mahasiswa as $mhs) : ?>
                    <tbody>
                        <tr>
                            <th scope="row" class="text-center"><?= $i, "."; ?></th>
                            <td class="text-center">
                                <a href="ubah.php?id=<?= $mhs["id"]; ?>">ubah</a> |
                                <a href="hapus.php?id=<?= $mhs["id"]; ?>" onclick="return confirm('Hapus data?');">hapus</a>
                            </td>
                            <td class="text-center"><img src="img/<?= $mhs["gambar"]; ?>" width="50"></td>
                            <td class="text-center"><?= $mhs["nim"]; ?></td>
                            <td><?= $mhs["nama"]; ?></td>
                            <td><?= $mhs["email"]; ?></td>
                            <td><?= $mhs["jurusan"]; ?></td>
                        </tr>
                    </tbody>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
        <!-- akhir table data mahasiswa -->
    </div>

    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>