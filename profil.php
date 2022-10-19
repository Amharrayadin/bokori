<?php
    session_start();
  
    //cek apakah user sudah login
    if(!isset($_SESSION['username'])){
      header("Location: login.php?pesan=Silahkan Login Terlebih Dahulu&alert=alert-warning");
    }
    
    //cek level user
    if($_SESSION['level']!="Public")
    {
      header("Location: index.php");
    }

    ob_start();
    include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="assets/"
  data-template="vertical-menu-template-free"
>
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/x-icon" href="assets/images/logobiru.ico" />

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Profil Pengguna</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/images/logobiru.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="assets/js/config.js"></script>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-woox-travel.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
<!--

TemplateMo 580 Woox Travel

https://templatemo.com/tm-580-woox-travel

-->
  </head>

<body>

  <!-- ***** Preloader Start ***** -->
  <!-- <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div> -->
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.php" class="logo">
                      <img src="assets/images/logoputih.png" widht="9" height="60" class="mt-0 mb-1"  alt="">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="index.php" >Beranda</a></li>
                        <li><a href="tentang.php">Tentang</a></li>
                        <li><a href="pesan-tiket.php">Pesan Tiket</a></li>
                        <?php
                        if(!isset($_SESSION['username'])){
                          echo "<li><a href='login.php'>Masuk/Daftar</a></li>";
                        }
                        if(isset($_SESSION['username'])){
                          echo "
                          <li><a href='pesanan.php'>Pesanan</a></li>
                          <li><a href='profil.php' class='active'>Profil</a></li>
                          <li><a href='logout.php'>Keluar</a></li>";
                        }
                        ?>     
                    </ul>   
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <div class="reservation-form">
  <div class="row">
              <?php 
                if(isset($_GET['pesan'])){
                  $pesan = $_GET['pesan'];
                  $alert = $_GET['alert'];
                  echo"
                  <div class='alert $alert alert-dismissible' role='alert'>
                  $pesan
                  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                  </div>";
                }
              ?>
                <div class="col-md-12">
                  <div class="card mb-4">
                    <h5 class="card-header">Profile Details</h5>
                    <!-- Account -->
                  <?php
                    $nik=$_SESSION['nik'];
                    $sqlget = "SELECT * FROM tb_user WHERE nik='$nik'";
                    $query = mysqli_query($connect, $sqlget);
                    while ($data = mysqli_fetch_array($query)){
                  ?>
                  <form id="formAccountSettings" action="act-account.php?act=update_public&nik=<?php echo $data['nik']; ?>" method="POST" enctype="multipart/form-data">
                    <div class="card-body">
                      <!-- <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <img
                          src="assets/img/profile/<?php echo $data['gambar'];?>"
                          alt="<?php echo $data['nama'];?>"
                          style="object-fit: contain"
                          class="d-block rounded"
                          height="300"
                          width=""
                          id="uploadedAvatar"
                        />
                        <div class="button-wrapper">
                          <label for="gambar" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Upload Foto Baru</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input
                              type="file"
                              id="gambar"
                              name="gambar"
                              class="account-file-input"
                              accept="image/png, image/jpeg, image/jpg"
                              hidden
                            />
                          </label>
                          <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                            <i class="bx bx-reset d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Reset</span>
                          </button>
                          <p class="text-muted mb-0">Upload Foto Berformat JPG, JPEG atau PNG. Ukuran Lebih Kecil dari 1 MB</p>
                        </div>
                      </div>
                    </div> -->
                    <!-- <hr class="my-0" /> -->
                    <div class="card-body">
                      
                        <div class="row">
                          <div class="mb-3 col-md-6">
                            <label for="nik" class="form-label">NIK</label>
                            <input
                              class="form-control"
                              type="text"
                              id="nik"
                              name="nik"
                              value="<?php echo $data['nik']; ?>"
                              autofocus
                              readonly
                            />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input class="form-control" type="text" name="nama" id="nama" value="<?php echo $data['nama']; ?>" />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input class="form-control" type="email" id="email" name="email" value="<?php echo $data['email']; ?>" />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="username" class="form-label">Username</label>
                            <input
                              type="text" class="form-control" id="username" name="username" value="<?php echo $data['username']; ?>"/>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="level" class="form-label">Role</label>
                            <input
                              type="text" class="form-control" id="level" name="level" value="<?php echo $data['level']; ?>" readonly/>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input
                              type="text"
                              class="form-control"
                              id="alamat"
                              name="alamat"
                              value="<?php echo $data['alamat']; ?>"
                            />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="nohp" class="form-label">No Telepon</label>
                            <input type="text" class="form-control" id="nohp" name="nohp" value="<?php echo $data['nohp']; ?>" />
                          </div>
                          
                        </div>
                        <div class="mt-2">
                          <input type="submit" class="btn btn-primary me-2" name="submit" value="Perbarui Data"></input>
                        </div>
                    </div>
                  </form>
                    <!-- /Account -->
                  </div>
                  <div class="card">
                    <h5 class="card-header">Hapus Akun</h5>
                    <div class="card-body">
                      <div class="mb-3 col-12 mb-0">
                        <div class="alert alert-warning">
                          <h6 class="alert-heading fw-bold mb-1">Apakah Anda yakin ingin menghapus akun?</h6>
                          <p class="mb-0">Saat Anda menghapus akun, Anda tidak dapat memulihkannya. Mohon berhati - hati.</p>
                        </div>
                      </div>
                      <form id="formAccountDeactivation" method="POST" action="act-account.php?act=delete&nik=<?php echo $data['nik'];?>">
                        <div class="form-check mb-3">
                          <input
                            class="form-check-input"
                            type="checkbox"
                            name="delete"
                            id="delete"
                            required
                          />
                          <label class="form-check-label" for="delete"
                            >Saya mengonfirmasi ingin menghapus akun saya</label
                          >
                        </div>
                        <input type="submit" class="btn btn-danger" value="Hapus Akun"></input>
                      </form>
                  <?php
                    }
                  ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
  </div>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Copyright ©2022  <!--<a href="#">WoOx Travel</a>--> Universitas Halu Oleo.
          <br>Fakultas Teknik Jurusan Teknik Informatika</a>
          </p>
        </div>
      </div>
    </div>
  </footer>


  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/wow.js"></script>
  <script src="assets/js/tabs.js"></script>
  <script src="assets/js/popup.js"></script>
  <script src="assets/js/custom.js"></script>

  <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

  <script>
    $(".option").click(function(){
      $(".option").removeClass("active");
      $(this).addClass("active"); 
    });
  </script>

  </body>

</html>