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
    <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico" />

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
                        <img src="assets/images/logo.png" alt="">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="index.php" >Beranda</a></li>
                        <li><a href="tentang.php">Tentang</a></li>
                        <li><a href="pesan-tiket.php" class="active">Pesan Tiket</a></li>
                        <?php
                        if(!isset($_SESSION['username'])){
                          echo "<li><a href='login.php'>Masuk/Daftar</a></li>";
                        }
                        if(isset($_SESSION['username'])){
                          echo "
                          <li><a href='#'>Pesanan</a></li>
                          <li><a href='#'>Profil</a></li>
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

  <div class="second-page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h4>Book Prefered Deal Here</h4>
          <h2>Make Your Reservation</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt uttersi labore et dolore magna aliqua is ipsum suspendisse ultrices gravida</p>
          <div class="main-button"><a href="about.html">Discover More</a></div>
        </div>
      </div>
    </div>
  </div>

  <div class="more-info reservation-info">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-sm-6">
          <div class="info-item">
            <i class="fa fa-phone"></i>
            <h4>Make a Phone Call</h4>
            <a href="#">+123 456 789 (0)</a>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6">
          <div class="info-item">
            <i class="fa fa-envelope"></i>
            <h4>Contact Us via Email</h4>
            <a href="#">company@email.com</a>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6">
          <div class="info-item">
            <i class="fa fa-map-marker"></i>
            <h4>Visit Our Offices</h4>
            <a href="#">24th Street North Avenue London, UK</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="reservation-form">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div id="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12469.776493332698!2d-80.14036379941481!3d25.907788681148624!2m3!1f357.26927939317244!2f20.870722720054623!3f0!3m2!1i1024!2i768!4f35!3m3!1m2!1s0x88d9add4b4ac788f%3A0xe77469d09480fcdb!2sSunny%20Isles%20Beach!5e1!3m2!1sen!2sth!4v1642869952544!5m2!1sen!2sth" width="100%" height="450px" frameborder="0" style="border:0; border-top-left-radius: 23px; border-top-right-radius: 23px;" allowfullscreen=""></iframe>
          </div>
        </div>
        <div class="col-lg-12">
          <form id="reservation-form" name="gs" method="post" action="">
            <div class="row">
              <div class="col-lg-12">
                <h4>Make Your <em>Reservation</em> Through This <em>Form</em></h4>
              </div>
              <div class="col-lg-6">
                <fieldset>
                    <label for="tgl_stok" class="form-label">Tanggal Penyeberangan</label>
                    <input type="date" name="tgl_stok" name="tgl_stok" class="date">
                </fieldset>
              </div>
              <div class="col-lg-6">
                <fieldset>
                    <label for="jumlah_pesan" class="form-label">Jumlah</label>
                    <input type="number" name="jumlah_pesan" name="jumlah_pesan" class="number" placeholder="Masukan Jumlah Tiket">
                </fieldset>
              </div>                
                  <fieldset>
                    
                    <input type="submit" class="button main-button" name="cari" value="Cari Tiket"></input>
                    
                  </fieldset>
              </div>
              <?php
                if(isset($_POST['cari'])){
                  echo "
                  <div class='table-responsive text-nowrap'>
                    <table class='table'>
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Tiket</th>
                          <th>Tanggal</th>
                          <th>Waktu</th>
                          <th>Harga</th>
                          <th>Pesan</th>
                        </tr>
                      </thead>
                  ";

                  $tgl_stok = $_POST['tgl_stok'];
                  $jumlah_pesan = $_POST['jumlah_pesan'];
                  $no=1;
                  $sqlsearch = "SELECT tb_stok_tiket.id_stok, 
                                      tb_stok_tiket.tgl_stok, 
                                      tb_stok_tiket.jam_stok, 
                                      tb_stok_tiket.jumlah_stok, 
                                      tb_tiket.id_tiket, 
                                      tb_tiket.nama_tiket, 
                                      tb_tiket.harga_tiket, 
                                      tb_kapal.id_kapal, 
                                      tb_kapal.nama_kapal 
                                FROM tb_stok_tiket INNER JOIN (tb_tiket INNER JOIN tb_kapal ON tb_tiket.id_kapal = tb_kapal.id_kapal) ON tb_stok_tiket.id_tiket = tb_tiket.id_tiket WHERE tgl_stok = '$tgl_stok' AND jumlah_stok>='$jumlah_pesan'";
                  $querysearch = mysqli_query($connect,$sqlsearch);
                  while ($data = mysqli_fetch_row($querysearch)){
              ?>
                      <tbody class="table-border-bottom-0">
                        <tr>
                          <td scope="row"><?php echo $no; ?></td>
                          <td><?php echo "$data[5] - $data[8]"; ?></td>
                          <td><?php echo "$data[1]"; ?></td>
                          <td><?php echo "$data[2]"; ?></td>
                          <td><?php echo "$data[6]"; ?></td>
                          <td>
                            <form action="" method="post">
                              <input type="submit" name="beli" value="Beli Tiket" class="p-0">
                            </form>
                            <?php
                              if(isset($_POST['beli'])){
                                header("Location: act-pesan-tiket.php");
                              }
                            
                            ?>
                        </tr>
                      </tbody>
              <?php
                $no++;
                  }if(mysqli_num_rows($querysearch) == 0){
                    echo "<tbody class='table-border-bottom-0'>
                    <center>
                    <div class='alert alert-warning alert-dismissible' role='alert'>
                    Tidak Ada Tiket yang Tersedia
                    </div>
                    </center>
                    </tbody>";
                  }
                  echo "
                  </table>
                  </div> ";
                }
              ?>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Copyright © 2036 <a href="#">WoOx Travel</a> Company. All rights reserved. 
          <br>Design: <a href="https://templatemo.com" target="_blank" title="free CSS templates">TemplateMo</a> Distribution: <a href="https://themewagon.com target="_blank" >ThemeWagon</a></p>
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
