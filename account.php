<?php
  include 'connect.php';

  session_start();
  
  //cek apakah user sudah login
  if(!isset($_SESSION['username'])){
    header("Location: login.php?pesan=Silahkan Login Terlebih Dahulu&alert=alert-warning");
  }
  
  //cek level user
  if($_SESSION['level']!="Admin")
  {
    header("Location: index.php");
  }

?>
<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Pengaturan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">    
    <!--Font Awesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <meta name="description" content="" />

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
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->
        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="index.html" class="app-brand-link">
              <span class="app-brand-logo demo">
                
              </span>
              <span class="app-brand-text text-capitalize demo menu-text fw-bolder ms-2">Bokori Island</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item">
              <a href="dashboard.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>

            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Menu</span>
            </li>

            <li class="menu-item">
              <a href="tabel-penyeberangan.php" class="menu-link">
              <i class="menu-icon tf-icons bi bi-signpost-split"></i>
                <div data-i18n="Basic">Penyeberangan</div>
              </a>
            </li>

            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Basic">Tiket</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="tabel-stok-tiket.php" class="menu-link">
                    <div data-i18n="Basic">Stok Tiket</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="tabel-tiket.php" class="menu-link">
                    <div data-i18n="Basic">Daftar Tiket</div>
                  </a>
                </li>
              </ul>

            <li class="menu-item">
              <a href="tabel-kapal.php" class="menu-link">
              <i class="menu-icon tf-icons fa-solid fa-sailboat"></i>
              <!-- <i class="menu-icon tf-icons "><img src="assets/images/kapal.png" width="18" alt=""></i> -->
                <div data-i18n="Basic">Kapal</div>
              </a>
            </li>

            <li class="menu-item">
              <a href="tabel-papalimbang.php" class="menu-link">
              <i class="menu-icon tf-icons bi bi-people"></i>
                <div data-i18n="Basic">Papalimbang</div>
              </a>
            </li>

            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Akun</span>
            </li>

            <li class="menu-item active">
              <a href="account.php" class="menu-link">
              <i class="menu-icon tf-icons bi bi-gear"></i>
                <div data-i18n="Basic">Pengaturan Akun</div>
              </a>
            </li>
          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                  <i class="bx bx-search fs-4 lh-0"></i>
                  <input
                    type="text"
                    class="form-control border-0 shadow-none"
                    placeholder="Search..."
                    aria-label="Search..."
                  />
                </div>
              </div>
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">

                <!-- User -->
                <?php
                  $nik=$_SESSION['nik'];
                  $queryy=mysqli_query($connect,"SELECT * FROM tb_user WHERE `nik`='$nik'");
                  $profile=mysqli_fetch_array($queryy);
                ?>
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="assets/img/profile/<?php echo $profile['gambar'];?>" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="account.php">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="assets/img/profile/<?php echo $profile['gambar'];?>" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block"><?php echo $profile['nama'];?></span>
                            <small class="text-muted">Admin</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="account.php">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">Profil Saya</span>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="logout.php">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4>

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
                  <form id="formAccountSettings" action="act-account.php?act=update&nik=<?php echo $data['nik']; ?>" method="POST" enctype="multipart/form-data">
                    <div class="card-body">
                      <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <img
                          src="assets/img/profile/<?php echo $data['gambar'];?>"
                          alt="<?php echo $data['nama'];?>"
                          class="d-block rounded"
                          height="100"
                          width="100"
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
                    </div>
                    <hr class="my-0" />
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
                      <form id="formAccountDeactivation" action="act-account.php?act=delete$nik=<?php echo $data['nik'];?>">
                        <div class="form-check mb-3">
                          <input
                            class="form-check-input"
                            type="checkbox"
                            name="delete"
                            id="delete"
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
                  <div class="card mt-4">
                    <h5 class="card-header">Tambah Akun Admin</h5>
                    <div class="card-body">
                      Untuk Membuat Akun Admin Baru, 
                        <a href="register-admin.php">Klik di sini</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  Fakultas Teknik
                  <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">Universitas Halu Oleo</a>
                </div>
                <div>
                  <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
                  <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More Themes</a>

                  <a
                    href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
                    target="_blank"
                    class="footer-link me-4"
                    >Documentation</a
                  >

                  <a
                    href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
                    target="_blank"
                    class="footer-link me-4"
                    >Support</a
                  >
                </div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="assets/js/pages-account-settings-account.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
