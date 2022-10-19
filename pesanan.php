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
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Pesan Tiket</title>

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
                          <li><a href='pesanan.php' class='active'>Pesanan</a></li>
                          <li><a href='profil.php'>Profil</a></li>
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
    <div class="container">
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
      <center>
      <h5 class="card-header mb-3">Pesanan Anda</h5>
      </center>
    <div class="table-responsive text-nowrap">              
                  <table class="table">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Tiket</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>

                  <?php
                    $nik = $_SESSION['nik'];
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
                                      FROM tb_penyeberangan INNER JOIN (tb_stok_tiket INNER JOIN (tb_tiket INNER JOIN tb_kapal ON tb_tiket.id_kapal = tb_kapal.id_kapal) ON tb_stok_tiket.id_stok = tb_tiket.id_tiket) ON tb_penyeberangan.id_stok=tb_stok_tiket.id_stok WHERE tb_penyeberangan.nik = '$nik' ORDER BY tb_penyeberangan.id_penyeberangan DESC";
                    $query = mysqli_query($connect, $sqlget);
                    $no=1;

                    while ($data = mysqli_fetch_row($query)){
                  ?>
                    <tbody class="table-border-bottom-0">
                    <tr>
                        <td scope="row"><?php echo $no; ?></td>
                        <td><?php echo "
                        Nama Tiket  : $data[10]-$data[12]<br>
                        Jumlah      : $data[2] <br>
                        Tanggal     : $data[7] <br>
                        Waktu       : $data[8] <br>
                        Total Bayar : Rp $data[3]
                        "; ?></td>
                        <td><?php if($data[4]==0){
                              echo"<span class='badge bg-label-warning me-1'>Ditunda</span>";
                            }else if($data[4]==1){
                              echo"<span class='badge bg-label-success me-1'>Terkonfirmasi</span>";
                            }else{
                              echo"<span class='badge bg-label-danger me-1'>Dibatalkan</span>";
                            }; ?></td>
                        <td><div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <?php
                              $nik=$_SESSION['nik'];
                              if($data[4]==0){
                                echo "
                                <a class='dropdown-item' href='act-pesan-tiket.php?act=cancel&id_penyeberangan=$data[0]&jumlah_penyeberangan=$data[2]&id_stok=$data[6]'
                                ><i class='bx bx-trash me-1'></i> Batalkan</a
                                >

                                <a class='dropdown-item' href='cetak-tiket.php?id_penyeberangan=$data[0]&nik=$nik'
                                ><i class='bx bx-edit-alt me-1'></i> Cetak</a
                                >
                                ";
                              }
                              if($data[4]==1){
                                $getadm = "SELECT tb_penyeberangan.admin FROM tb_penyeberangan WHERE tb_penyeberangan.id_penyeberangan='$data[0]'";
                                $queryadm = mysqli_query($connect, $getadm);
                                $a = mysqli_fetch_row($queryadm);
                                echo "
                                <a class='dropdown-item' href='cetak.php?id_penyeberangan=$data[0]&nik=$nik&admin=$a[0]'
                                ><i class='bx bx-edit-alt me-1'></i> Cetak</a
                                >
                                ";
                              }
                              if($data[4]==2){
                                echo "
                                <a class='dropdown-item' href='act-pesan-tiket.php?act=delete&id_penyeberangan=$data[0]'
                                ><i class='bx bx-trash me-1'></i>Hapus Riwayat</a
                                >
                                ";
                              }
                              ?>
                            </div>
                          </div></td>
                      </tr>
                    </tbody>
                    <?php
                    $no++;
                  }
                  ?>
          </table>
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