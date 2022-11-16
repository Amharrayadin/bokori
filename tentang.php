<?php
    
    ob_start();
    include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <link rel="icon" type="image/x-icon" href="asssets/images/logobiru.ico"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> -->

    <title>Tentang Pulau Bokori</title>

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
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <style type="text/css">
                          span{
                            font-size : 30px;
                          }
                          </style>
                          <a href="index.php" class="logo mt-0">
                                  <img src="assets/images/logoputih.png" widht="9" height="60" class="mt-0 mb-1"  alt="">
                              </a>
                          
                      <!--<img src="assets/images/logo12.png" widht="8" height="70" class="mt-2 mb-1"  alt="">-->
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="index.php">Beranda</a></li>
                        <li><a href="tentang.php" class="active">Tentang</a></li>
                        <li><a href="pesan-tiket.php">Pesan Tiket</a></li>
                        <?php
                        if(!isset($_SESSION['username'])){
                          echo "<li><a href='login.php'>Masuk/Daftar</a></li>";
                        }
                        if(isset($_SESSION['username'])){
                          echo "
                          <li><a href='pesanan.php'>Pesanan</a></li>
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

  <!-- ***** Main Banner Area Start ***** -->
  <div class="about-main-content">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="content">
            <div class="blur-bg"></div>
            <h4>JELAJAHI SULTRA</h4>
            <div class="line-dec"></div>
            <h2>Penyebrangan Ke Pulau Bokori</h2>
            <p>Pulau Bokori, sering disebut pulau pasir terapung. Dia merupakan hamparan pulau pasir putih, membentang di bibir Teluk Kendari. Pasirnya, menjadi daya tarik tersendiri bagi wisatawan. Sebab, tak banyak lokasi pantai di sekitar Kota Kendari yang memiliki pasir seputih Bokori. Bokori juga memiliki beberapa jenis pepohonan rindang, tumbuh terawat. Wisatawan tak akan merasa kepanasan terik matahari. Jika capek mengitari pulau, cukup duduk dibawah pohon, menikmati semilir angin laut dan deburan ombak Teluk Kendari. Di sepanjang garis pulau, ada jogging track dan area khusus pejalan kaki. Area ini, juga memiliki kesan teduh. Sehingga, wisatawan tak perlu takut kulit terbakar sinar ultraviolet saat sibuk berburu foto di spot-spot menarik. Selain memiliki banyak fasilitas, di sekitar pulau juga ada lokasi cukup lapang. Sehingga, di sela-sela waktu, pengunjung bisa menghabiskan waktu sambil bermain sepakbola atau bola voli pantai.</p>
            <div class="main-button">
              <a href="pesan-tiket.php">Pesan Tiket Sekarang</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- ***** Main Banner Area End ***** -->
  
  <div class="cities-town">
    <div class="container">
      <div class="row">
        <div class="slider-content">
          <div class="row">
            <div class="col-lg-12">
              <h2>Wisata Alam <em>Sulawesi Tenggara</em></h2>
            </div>
            <div class="col-lg-12">
              <div class="owl-cites-town owl-carousel">
                <div class="item">
                  <div class="thumb">
                    <img src="assets/images/b1.jpg" alt="">
                    <!--<h4>Havana</h4>-->
                  </div>
                </div>
                <div class="item">
                  <div class="thumb">
                    <img src="assets/images/b2.jpg" alt="">
                    
                  </div>
                </div>
                <div class="item">
                  <div class="thumb">
                    <img src="assets/images/b3.jpg" alt="">
                    
                  </div>
                </div>
                <div class="item">
                  <div class="thumb">
                    <img src="assets/images/b4.jpg" alt="">
                    
                  </div>
                </div>
                <div class="item">
                  <div class="thumb">
                    <img src="assets/images/b1.jpg" alt="">
                    <h4></h4>
                  </div>
                </div>
                <div class="item">
                  <div class="thumb">
                    <img src="assets/images/b2.jpg" alt="">
                    <h4></h4>
                  </div>
                </div>
                <div class="item">
                  <div class="thumb">
                    <img src="assets/images/b3.jpg" alt="">
                    <h4></h4>
                  </div>
                </div>
                <div class="item">
                  <div class="thumb">
                    <img src="assets/images/b4.jpg" alt="">
                    <h4></h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="weekly-offers">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="section-heading text-center">
            <?php
            $sqljumlah = "SELECT * FROM tb_tiket" ;
            $getjumlah = mysqli_query($connect,$sqljumlah);
            $jumlah = mysqli_num_rows($getjumlah);
            echo "
            <h2>Tiket Penyebrangan</h2>
            <p>Terdapat $jumlah Jenis Pilihan Tiket: </p>
            ";
             ?>
            
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="owl-weekly-offers owl-carousel">
            <?php
              $sqlget = "SELECT tb_tiket.id_tiket, tb_tiket.nama_tiket, tb_tiket.harga_tiket, tb_kapal.id_kapal, tb_kapal.nama_kapal
              FROM tb_tiket INNER JOIN tb_kapal ON tb_tiket.id_kapal=tb_kapal.id_kapal";
              $query = mysqli_query($connect, $sqlget);
              $no = 1;

             while ($data = mysqli_fetch_row($query)) { ?>
            <div class="item">
              <div class="thumb">
                <img src="assets/images/b_1.jpg" alt="">
                <div class="text">
                  <ul>
                    <h2><?php echo $data[1]; ?><br></h2><i class="fa fa-users"></i>  <?php echo $data[4]; ?>
                    <br><h6><span>Rp <?php echo $data[2]; ?>/Orang</span><h6>
                  </ul>
                  <div class="main-button">
                    <a href="pesan-tiket.">Buat Pesanan</a>
                  </div>
                </div>
              </div>
            </div>
            <?php
  }
            ?>            
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="more-about">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center">
          <div class="left-image">
            <img src="assets/images/about2.jpg" alt="">
          </div>
        </div>
        <div class="col-lg-6">
          <div class="section-heading">
            <h2>Pelayanan Penyebrangan Ke Pulau Bokori</h2>
            <p>Nikmati Penyebrangan Anda Dengan Pelayanan Yang Kami Berikan</p>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="info-item">
                <h4>2 Jenis Tiket</h4>
                <span>Tiket Dewasa Dan Tiket Anak-Anak</span>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="info-item">
                <h4>4 Papalimbang</h4>
                <span>2 Papalimbang Resmi dari DISHUB dan 2 dari Masyarakat</span>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="info-item">
                <div class="row">
                  <div class="col-lg-6">
                    <h4>3 Pengelola Tiket</h4>
                    <span>Memperoleh Informasi Lebih Mudah Untuk Kunjungan Kembali</span>
                  </div>
                  <!-- <div class="col-lg-6">
                    <h4>240.580+</h4>
                    <span>Different Check-ins Yearly</span>
                  </div> -->
                </div>
              </div>
            </div>
          <!-- </div>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
          <div class="main-button">
            <a href="reservation.html">Discover More</a>
          </div> -->
        </div>
      </div>
    </div>
  </div>

  <!-- <div class="best-locations">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="section-heading text-center">
            <h2>Best Locations In Caribbeans</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
          </div>
        </div>
        <div class="col-lg-8 offset-lg-2">
          <div class="options">
            <div class="option active" style="--optionBackground:url(https://buttoncreatives.com/html/woox/assets/images/best-01.jpg);">
               <div class="shadow"></div>
               <div class="label">
                  <div class="icon">
                     <i class="fas fa-expand"></i>
                  </div>
                  <div class="info">
                     <div class="main">Havana</div>
                     <div class="sub">Population: 2M</div>
                  </div>
               </div>
            </div>
            <div class="option" style="--optionBackground:url(https://buttoncreatives.com/html/woox/assets/images/best-02.jpg);">
               <div class="shadow"></div>
               <div class="label">
                  <div class="icon">
                    <i class="fas fa-expand"></i>
                  </div>
                  <div class="info">
                     <div class="main">Kingston</div>
                     <div class="sub">Population: 3.5M</div>
                  </div>
               </div>
            </div>
            <div class="option" style="--optionBackground:url(https://buttoncreatives.com/html/woox/assets/images/best-03.jpg);">
               <div class="shadow"></div>
               <div class="label">
                  <div class="icon">
                    <i class="fas fa-expand"></i>
                  </div>
                  <div class="info">
                     <div class="main">London</div>
                     <div class="sub">Population: 4.1M</div>
                  </div>
               </div>
            </div>
            <div class="option" style="--optionBackground:url(https://buttoncreatives.com/html/woox/assets/images/best-04.jpg);">
               <div class="shadow"></div>
               <div class="label">
                  <div class="icon">
                    <i class="fas fa-expand"></i>
                  </div>
                  <div class="info">
                     <div class="main">Pristina</div>
                     <div class="sub">Population: 520K</div>
                  </div>
               </div>
            </div>
            <div class="option" style="--optionBackground:url(https://buttoncreatives.com/html/woox/assets/images/best-05.jpg);">
               <div class="shadow"></div>
               <div class="label">
                  <div class="icon">
                    <i class="fas fa-expand"></i>
                  </div>
                  <div class="info">
                     <div class="main">Paris</div>
                     <div class="sub">Population: 3M</div>
                  </div>
               </div>
            </div>
         </div>
        </div>
        <div class="col-lg-12">
          <div class="main-button text-center">
            <a href="deals.html">Discover All Places</a>
          </div>
        </div>
      </div>
    </div>
  </div> -->

  <div class="call-to-action">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h2>Lakukan Pemesanan Tiket Dengan Mudah</h2>
                    <h4>Nikmati Liburan Anda Dengan Kenyamanan Yang Di Berikan</h4>
                </div>
                <div class="col-lg-4">
                    <!-- <div class="border-button">
                        <a href="reservation.html">Book Yours Now</a>
                    </div> -->
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

  <script>
    $(".option").click(function(){
      $(".option").removeClass("active");
      $(this).addClass("active"); 
    });
  </script>

  </body>

</html>
