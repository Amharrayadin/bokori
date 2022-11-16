<?php
session_start();

//cek apakah user sudah login
if (!isset($_SESSION['username'])) {
  header('Location: login.php?pesan=Silahkan Login Terlebih Dahulu&alert=alert-warning');
}

//cek level user
if ($_SESSION['level'] != 'Admin') {
  header('Location: index.php');
}

ob_start();
include 'connect.php';
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

    <title>Daftar Tiket</title>
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

            <li class="menu-item active open">
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
                <li class="menu-item active">
                  <a href="tabel-tiket.php" class="menu-link">
                    <div data-i18n="Basic">Daftar Tiket</div>
                  </a>
                </li>
              </ul>

            <li class="menu-item">
              <a href="tabel-kapal.php" class="menu-link">
                <i class="menu-icon tf-icons fa-solid fa-sailboat"></i>
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

            <li class="menu-item">
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
                $nik = $_SESSION['nik'];
                $queryy = mysqli_query($connect, "SELECT * FROM tb_user WHERE `nik`='$nik'");
                $profile = mysqli_fetch_array($queryy);
                ?>
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="assets/img/profile/<?php echo $profile[
                        'gambar'
                      ]; ?>" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="account.php">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="assets/img/profile/<?php echo $profile[
                                'gambar'
                              ]; ?>" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block"><?php echo $profile['nama']; ?></span>
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
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tabel /</span> Tabel Daftar Tiket Kapal</h4>

              <!-- Basic Bootstrap Table -->
              <div class="card">
              <?php if (isset($_GET['pesan'])) {
                $pesan = $_GET['pesan'];
                $alert = $_GET['alert'];
                echo "
                  <div class='alert $alert alert-dismissible' role='alert'>
                  $pesan
                  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                  </div>";
              } ?>
                <h5 class="card-header">Daftar Tiket</h5>
                
                    <div class="col-lg-4 col-md-6 ">
                        <!-- Button trigger modal -->
                        <button
                          type="button"
                          class="btn btn-primary mb-2 ms-3"
                          data-bs-toggle="modal"
                          data-bs-target="#modalCenter"
                        >
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                          <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                        </svg>  Tambah Tiket
                        </button>
                    </div>
                        
                <div class="table-responsive text-nowrap">              
                  <table class="table">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>ID Tiket</th>
                        <th>Nama Tiket</th>
                        <th>Kapal</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>

                  <?php
                  $sqlget = "SELECT tb_tiket.id_tiket, tb_tiket.nama_tiket, tb_tiket.harga_tiket, tb_kapal.id_kapal, tb_kapal.nama_kapal
                              FROM tb_tiket INNER JOIN tb_kapal ON tb_tiket.id_kapal=tb_kapal.id_kapal";
                  $query = mysqli_query($connect, $sqlget);
                  $no = 1;

                  while ($data = mysqli_fetch_row($query)) { ?>
                    <tbody class="table-border-bottom-0">
                      <tr>
                        <td scope="row"><?php echo $no; ?></td>
                        <td><?php echo $data[0]; ?></td>
                        <td><?php echo $data[1]; ?></td>
                        <td><?php echo $data[4]; ?></td>
                        <td><?php echo $data[2]; ?></td>
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item"
                                data-bs-toggle="modal"
                                data-bs-target="#modalCenter<?php echo $data[0]; ?>"
                                ><i class="bx bx-edit-alt me-1"></i> Edit</a
                              >
                              <a class="dropdown-item" href="act-tiket.php?act=delete&id_tiket=<?php echo $data[0]; ?>"
                                ><i class="bx bx-trash me-1"></i> Delete</a
                              >
                            </div>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                        <!-- Modal Edit-->
                        <div class="modal fade" id="modalCenter<?php echo $data[0]; ?>" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="modalCenterTitle">Edit Data Papalimbang</h5>
                              <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"
                              ></button>
                            </div>
                            <div class="modal-body">
                              <div class="row">
                              <form action="act-tiket.php?act=update&id_tiket=<?php echo $data[0]; ?>" method="post" enctype="multipart/form-data">
                                  <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="nama_tiket">Nama Tiket</label>
                                    <div class="col-sm-10">
                                      <div class="input-group input-group-merge">
                                        <span id="nama_tiket2" class="input-group-text"
                                          ><i class="bx bx-user"></i
                                        ></span>
                                        <input
                                          type="text"
                                          class="form-control"
                                          id="nama_tiket"
                                          name="nama_tiket"
                                          value="<?php echo $data[1]; ?>"
                                          aria-describedby="nama_tiket2"
                                          required
                                        />
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="id_kapal">Kapal</label>
                                    <div class="col-sm-10">
                                      <div class="input-group input-group-merge">
                                        <span id="id_kapal2" class="input-group-text"
                                          ><i class="bx bx-home"></i
                                        ></span>
                                        <select class="form-select" name="id_kapal" id="id_kapal">
                                          <option selected value="<?php echo $data[3]; ?>"><?php echo $data[4]; ?></option>
                                          <?php
                                          $querySelect = mysqli_query($connect, 'SELECT * FROM tb_kapal');
                                          while ($option = mysqli_fetch_row($querySelect)) {
                                            echo "
                                            <option value='$option[0]'>$option[1]</option>
                                            ";
                                          }
                                          ?>
                                        </select>  
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="harga_tiket">Harga Tiket</label>
                                    <div class="col-sm-10">
                                      <div class="input-group input-group-merge">
                                        <span id="harga_tiket2" class="input-group-text"
                                          ><i class="bx bx-dollar"></i
                                        ></span>
                                        <input
                                          type="text"
                                          class="form-control"
                                          id="harga_tiket"
                                          name="harga_tiket"
                                          value="<?php echo $data[2]; ?>"
                                          aria-describedby="harga_tiket2"
                                          required
                                        />
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row justify-content-end">
                                    <div class="col-sm-10">
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                          Batal
                                        </button>
                                        <input type="submit" class="btn btn-primary" name="edit" value="Edit"></input>
                                      </div>
                                    </div>
                                    </div>
                                  </div>
                                </form>

                              </div>
                            </div>

                          </div>
                        </div>
                      <!-- Modal End -->
                  <?php $no++;}
                  ?>
                 <!-- Modal Insert -->
                 <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="modalCenterTitle">Tambah Tiket</h5>
                              <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"
                              ></button>
                            </div>
                            <div class="modal-body">
                              <div class="row">
                              <form action="act-tiket.php?act=create" method="post" enctype="multipart/form-data">
                                  <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="nama_tiket">Nama Tiket</label>
                                    <div class="col-sm-10">
                                      <div class="input-group input-group-merge">
                                        <span id="nama_tiket2" class="input-group-text"
                                          ><i class="bx bx-user"></i
                                        ></span>
                                        <input
                                          type="text"
                                          class="form-control"
                                          id="nama_tiket"
                                          name="nama_tiket"
                                          placeholder="Masukan Nama Tiket"
                                          aria-label="Masukan Nama Tiket"
                                          aria-describedby="nama_tiket2"
                                          required
                                        />
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="id_kapal">Kapal</label>
                                    <div class="col-sm-10">
                                      <div class="input-group input-group-merge">
                                        <span id="id_kapal2" class="input-group-text"
                                          ><i class="bx bx-home"></i
                                        ></span>
                                        <select class="form-select" name="id_kapal" id="id_kapal">
                                          <option selected>Pilih Kapal</option>
                                          <?php
                                          $querySelect = mysqli_query($connect, 'SELECT * FROM tb_kapal');
                                          while ($option = mysqli_fetch_row($querySelect)) {
                                            echo "
                                            <option value='$option[0]'>$option[1]</option>
                                            ";
                                          }
                                          ?>
                                        </select>  
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="harga_tiket">Harga Tiket</label>
                                    <div class="col-sm-10">
                                      <div class="input-group input-group-merge">
                                        <span id="harga_tiket2" class="input-group-text"
                                          ><i class="bx bx-dollar"></i
                                        ></span>
                                        <input
                                          type="text"
                                          class="form-control"
                                          id="harga_tiket"
                                          name="harga_tiket"
                                          placeholder="Masukan Nama Harga"
                                          aria-label="Masukan Nama Harga"
                                          aria-describedby="harga_tiket2"
                                          required
                                        />
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row justify-content-end">
                                    <div class="col-sm-10">
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                          Batal
                                        </button>
                                        <input type="submit" class="btn btn-primary" name="tambah" value="Tambah"></input>
                                      </div>
                                    </div>
                                    </div>
                                  </div>
                                </form>

                              </div>
                            </div>

                          </div>
                        </div>
                      <!-- Modal Insert -->

                  
                  </table>
                </div>
              </div>
              <!--/ Basic Bootstrap Table -->

            

              <hr class="my-5" />

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
    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
