<?php
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

    <title>Daftar Penyebrangan</title>
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

            <li class="menu-item active">
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
              <!--<i class="menu-icon tf-icons "><img src="assets/images/kapal.png" width="18" alt=""></i>-->
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
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tabel /</span> Tabel Penyebrangan</h4>

              <!-- Basic Bootstrap Table -->
              <div class="card">
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
                <h5 class="card-header">Daftar Penyeberangan</h5>
                                    
                <div class="table-responsive text-nowrap">              
                  <table class="table">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>ID Penyeberangan</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>Jumlah</th>
                        <th>Tiket</th>
                        <th>Total Harga</th>
                        <th>Status</th>
                        <th>Admin</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>

                    <?php
                    $batas = 10;
                    $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                    $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	
           
                    $previous = $halaman - 1;
                    $next = $halaman + 1;

                    $jumlah = mysqli_query($connect,"SELECT * FROM tb_penyeberangan");
                    $jumlah_data = mysqli_num_rows($jumlah);
                    $total_halaman = ceil($jumlah_data / $batas);
                  
                    $sqlget = "SELECT tb_penyeberangan.id_penyeberangan,
                    tb_penyeberangan.nik, 
                    tb_penyeberangan.jumlah_penyeberangan, 
                    tb_penyeberangan.total_harga, 
                    tb_penyeberangan.status_penyeberangan, 
                    tb_penyeberangan.admin,
                    tb_penyeberangan.id_stok,
                    tb_stok_tiket.tgl_stok,
                    tb_stok_tiket.jam_stok, 
                    tb_stok_tiket.id_tiket,
                    tb_tiket.nama_tiket,
                    tb_tiket.id_kapal, 
                    tb_kapal.nama_kapal 
                    FROM tb_penyeberangan INNER JOIN (tb_stok_tiket INNER JOIN (tb_tiket INNER JOIN tb_kapal ON tb_tiket.id_kapal = tb_kapal.id_kapal) ON tb_stok_tiket.id_stok = tb_tiket.id_tiket) ON tb_penyeberangan.id_stok=tb_stok_tiket.id_stok ORDER BY tb_penyeberangan.id_penyeberangan DESC LIMIT $halaman_awal, $batas";
                    $query = mysqli_query($connect, $sqlget);
                    $no=$halaman_awal+1;

                    while ($data = mysqli_fetch_row($query)){
                      $getnama = "SELECT nama FROM tb_user WHERE NIK='$data[1]'";
                      $querynama = mysqli_query($connect,$getnama);
                      $nama = mysqli_fetch_row($querynama);
                      $nama_user = $nama[0];
                  ?>
                    <tbody class="table-border-bottom-0">
                      <tr>
                        <td scope="row"><?php echo $no; ?></td>
                        <td><?php echo $data[0]; ?></td>
                        <td><?php echo $nama_user; ?></td>
                        <td><?php echo $data[7]; ?></td>
                        <td><?php echo $data[8]; ?></td>
                        <td><?php echo $data[2]; ?></td>
                        <td><?php echo "$data[9] - $data[10] - $data[12]"; ?></td>
                        <td><?php echo "Rp $data[3]"; ?></td>
                        <td><?php if($data[4]==0){
                              echo"<span class='badge bg-label-warning me-1'>Ditunda</span>";
                            }else if($data[4]==1){
                              echo"<span class='badge bg-label-success me-1'>Terkonfirmasi</span>";
                            }else{
                              echo"<span class='badge bg-label-danger me-1'>Dibatalkan</span>";
                            }; ?></td>
                        <td><?php echo $data[5]; ?></td>
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <?php
                              $nik_admin = $_SESSION['nik'];
                              $getadmin = "SELECT nama FROM tb_user WHERE NIK='$nik_admin'";
                              $queryadmin = mysqli_query($connect,$getadmin);
                              $adm = mysqli_fetch_row($queryadmin);
                              $admin=$adm[0];
                              if($data[4]==0){
                                echo "
                                  <a class='dropdown-item' href='act-pesan-tiket.php?act=confirm&id_penyeberangan=$data[0]&admin=$admin'><i class='bx bx-edit-alt me-1'></i> Konfirmasi</a>
                                ";
                              }else if($data[4]==1){
                                echo "
                                  <a class='dropdown-item' href='cetak.php?id_penyeberangan=$data[0]&admin=$admin&nik=$data[1]'
                                  ><i class='bx bx-edit-alt me-1'></i> Cetak</a
                                  >
                                ";
                              }else{
                                echo "
                                  <a class='dropdown-item' href='act-pesan-tiket.php?act=delete&id_penyeberangan=$data[0]'
                                  ><i class='bx bx-trash me-1'></i>Hapus Riwayat</a
                                  >
                                ";
                              }
                              ?>
                            </div>
                          </div>
                        </td>
                      </tr>
                    </tbody>

                  <?php
                    $no++;
                  }
                  ?>
                 
                  </table>
                  <nav>
		              	<ul class="pagination justify-content-center">
		              		<li class="page-item">
		              			<a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$previous'"; } ?>>Previous</a>
		              		</li>
		              		<?php 
		              		for($x=1;$x<=$total_halaman;$x++){
		              			?> 
		              			<li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
		              			<?php
		              		}
		              		?>				
		              		<li class="page-item">
		              			<a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>Next</a>
		              		</li>
		              	</ul>
		              </nav>
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
