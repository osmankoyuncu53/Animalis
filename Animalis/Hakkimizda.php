<?php
session_start();
require_once("Ayarlar/ayar.php");
require_once("Ayarlar/Fonksiyonlar.php");
include "netting/baglan.php";
?>

<!DOCTYPE html>
<html lang="tr">

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="Robots" content="index, follow">
  <!--Arama Motoru Ayarları-->
  <meta name="googlebot" content="index , follow">
  <!--Google botları-->
  <meta name="revisit-after" content="10 days">
  <!--Arama Motoru siteyi hangi aralıkta ziyaret etmesi gerektigini söyleriz.-->
  <title><?php echo DonusumleriGeriDondur($SiteTitle); ?> | Hakkımızda </title> <!-- title -->
  <meta name="descripton" content="<?php echo DonusumleriGeriDondur($SiteDescription); ?>">
  <meta name="keywords" content="<?php echo DonusumleriGeriDondur($SiteKeywords); ?>">
  <link rel="shortcut icon" type="img/png" href="<?php echo DonusumleriGeriDondur($Favicon); ?>"> <!-- favicon -->



  <!-- google font -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/081d03dba3.js" crossorigin="anonymous"></script>
  <!--Fontawesome iconlar için eklenmiştir. -->
  <!-- bootstrap -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- mean menu css -->
  <link rel="stylesheet" href="css/meanmenu.min.css">
  <!-- main style -->
  <link rel="stylesheet" href="css/style.css">
  <!-- responsive -->
  <link rel="stylesheet" href="css/responsive.css">
  <link rel="stylesheet" href="css/ourTeam.css">



</head>

<body>



  <!-- header -->
  <div class="menuArka">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-sm-12 text-center">
          <div class="positons">

            <!-- logo -->
            <div class="site-logo">
              <a href="index.php"><img src="<?php echo DonusumleriGeriDondur($SiteLogo);  ?>" alt=""></a>
            </div>
            <!-- logo -->

            <!-- menu start -->
            <nav class="main-menu">
              <ul>
                <?php if (isset($_SESSION["Sponsor"])) { ?>
                  <li><a href="urunlerim.php">Ürünlerim</a></li>
                  <li><a href="urunlerimListe.php">Ürümlerim Liste</a></li>
                  <li><a href="urunekle.php">Ürün Ekle</a></li>
                <?php } else { ?>
                  <li><a href="index.php">Anasayfa</a></li>
                  <li><a href="hakkimizda.php">Hakkımızda</a></li>
                  <li><a href="Urunler.php">Urunler</a></li>
                  <li><a href="iletisim.php">İletişim</a></li>
                <?php } ?>
                <li>
                  <?php
                  if (isset($_SESSION["Kullanici"])) { ?>
                    <div class="header-icons">
                      <a href="Sepetim.php"><i class="fas fa-shopping-basket"></i></i></a>
                      <a href="KullaniciCikis.php"> <i class="fas fa-door-open"> </i><span class="d-none d-md-inline-block"> &nbsp;Çıkış</span></a>
                      <a href="KullaniciProfil.php"> <i class="fas fa-user-alt"> </i><span class="d-none d-md-inline-block">&nbsp;<?php echo $KullaniciAd ?></span></a>
                    </div>
                  <?php } else if (isset($_SESSION["Sponsor"])) { ?>
                    <div class="header-icons">
                      <a href="SponsorCikis.php"> <i class="fas fa-door-open"> </i><span class="d-none d-md-inline-block"> Çıkış</span></a>
                      <a href="SponsorProfil.php"> <i class="fas fa-user-alt"> </i><span class="d-none d-md-inline-block"><?php echo $FirmaAd; ?></span></a>
                    </div>
                  <?php
                  } else { ?>
                    <div class="header-icons">
                      <a href="Sepetim.php"><i class="fas fa-shopping-basket"></i></i></a>
                      <a href="KullaniciGiris.php"> <i class="fas fa-sign-in-alt"> </i> <span class="d-none d-md-inline-block">Giriş</span> </a>
                      <a href="SponsorGiris.php"> <i class="fas fa-sign-in-alt"> </i> <span class="d-none d-md-inline-block">Sponsor</span> </a>
                    </div>
                  <?php } ?>



                </li>
              </ul>
            </nav>
            <div class="mobile-menu"></div>
            <!-- menu end -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end header -->


  <!-- slider  -->
  <div class="hk-option hk-bg">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2 text-center">
          <div class="hk-text">
            <p>Bizi tanıyın</p>
            <h1>Hakkımızda</h1>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--Slider Bitiş -->

  <!--Hakkkımızda-->
  <div class="container">
    <div class="row">
      <div class="col column">
        <h1 style="color:black">Hakkımızda</h1>
        <p style="color:black"><?php echo DonusumleriGeriDondur($HakkimizdaMetni); ?></p>
      </div>
      <div class="col column">
        <img src="<?php echo DonusumleriGeriDondur($HakkimizdaMetniGorsel); ?>" alt="image" />
      </div>
    </div>
  </div>
  <!--Hakkımızda bitiş-->


  <div class="container">
    <div class="top">
      <div class="baslık text-center mb-5">
      <?php
      $MisyonSorgusu     =   $VeritabaniBaglantisi->prepare("SELECT * FROM misyonvisyon");
      $MisyonSorgusu->execute();
      $MisyonSayisi      =   $MisyonSorgusu->rowCount();
      $Misyonlar        =  $MisyonSorgusu->fetchAll(PDO::FETCH_ASSOC);
      if ($MisyonSayisi > 0) {  ?>
        <h2>Misyon ve Yaklaşımımız</h2>
      </div>
      <!--mb-5 yükseklik ayarlamasını yapar text center !important ile yazıyı ortalar.-->
        <div class="row">
          <?php foreach ($Misyonlar as $misyon) { ?>

            <div class="col-md-6 col-lg-4 mb-5 text-center">
              <div class="Hk-img">
                <?php if ($misyon["MisyonGorsel"]!="") { ?>
                  <img src="<?php echo DonusumleriGeriDondur($misyon["MisyonGorsel"]); ?>" alt="İmage" class="mb-4">
                <?php } else { ?>
                  <img src="img/hk-img/d1.jpg" alt="İmage" class="mb-4">
                <?php } ?>
                <h3 class="hk-ekpa h4"><?php echo DonusumleriGeriDondur($misyon["MisyonBaslik"]); ?></h3>
              </div>

              <div class="hk-ekpksl">
                <?php if ($misyon["MisyonAciklama"] != "") { ?>
                  <p><?php echo DonusumleriGeriDondur($misyon["MisyonAciklama"]); ?></p>
                <?php } else { ?>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
                <?php } ?>
              </div>

            </div>

          <?php } ?>
        </div>
      <?php
      } else {
      } ?>
    </div>
  </div>




 <!-- Team -->
 <section id="team" class="pb-5">
    <div class="container">
        <h5 class="team-title h2">Ekip Arkadaşları</h5>
        <?php
      $AdminlerSorgusu     =   $VeritabaniBaglantisi->prepare("SELECT AdSoyad,Gorsel,admin_vasif,admin_hakkinda FROM admin where goster=1");
      $AdminlerSorgusu->execute();
      $AyarSayisi      =   $AdminlerSorgusu->rowCount();
      $Ayarlar        =  $AdminlerSorgusu->fetchAll(PDO::FETCH_ASSOC);
      if ($AyarSayisi > 0) {  ?>
        <div class="row">
        <?php foreach ($Ayarlar as $adminler) { ?>
            <!-- Team member -->
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip" >
                    <div class="mainflip flip-0">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                
                                <?php if ($adminler["Gorsel"]!="") { ?>
                                    <p><img class=" img-fluid" src="<?php echo DonusumleriGeriDondur($adminler["Gorsel"]); ?>" alt="card image"></p>
                                    <?php } else { ?>
                                  <img src="img/hk-img/d1.jpg" alt="İmage" class="mb-4">
                                      <?php } ?>
                                    <h4 class="card-title"><?php echo DonusumleriGeriDondur($adminler["AdSoyad"]); ?></h4>
                                    <?php if ($adminler["admin_vasif"] != "") { ?>
                                    <p class="hk-ekpbil"><?php echo DonusumleriGeriDondur($adminler["admin_vasif"]); ?></p>
                                  <?php } else { ?>
                                    <p class="hk-ekpbil">Kullanıcı İş Alanı</p>
                                  <?php } ?>
                                    <?php if ($adminler["admin_hakkinda"] != "") { ?>
                                    <p class="card-text"><?php  $str=DonusumleriGeriDondur($adminler["admin_hakkinda"]); echo substr($str, 0, 76); ?></p>
                                    <?php } else { ?>
                                      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                                    <?php } ?>
                                    <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title"><?php echo DonusumleriGeriDondur($adminler["AdSoyad"]); ?></h4>

                                    <?php if ($adminler["admin_hakkinda"] != "") { ?>
                                    <p class="card-text"><?php echo DonusumleriGeriDondur($adminler["admin_hakkinda"]); ?></p>
                                    <?php } else { ?>
                                      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                                    <?php } ?>


                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-skype"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-google"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <?php
      } else {
      } ?>
      
    </div>
</section>

<!-- Team -->


 



  <!-- footer star -->
  <div class="mt-5 pt-5 pb-5 footer">
    <div class="container">
      <div class="row">

        <div class="col-lg-4 col-xs-12 hakkımızda">
          <h2>Hakkımızda</h2>
          <p class="pr-5"><?php echo DonusumleriGeriDondur($HakkimizdaMetniFooter); ?></p>
        </div>

        <div class="col-lg-2 col-xs-12 Sayfa">
          <h4 class="mt-lg-0 mt-sm-3">Sayfalar</h4>
          <ul class="m-0 p-0">
            <li><a href="index.php">Anasayfa</a></li>
            <li><a href="hakkimizda.php">Hakkımızda</a></li>
            <li><a href="Urunler.php">Urunler</a></li>
            <li><a href="iletisim.php">İletisim</a></li>
          </ul>
        </div>
        <div class="col-lg-3 col-xs-12 Sayfa">
          <h4 class="mt-lg-0 mt-sm-3">Sözleşmeler</h4>
          <ul class="m-0 p-0">
            <li><a href="UyelikSozlesmesiMetni.php">Üyelik Sözleşmesi</a></li>
            <li><a href="KullanimKosullari.php">Kullanım Koşulları</a></li>
            <li><a href="GizlilikSozlesmesiMetni.php">Gizlilik Sözleşmesi</a></li>
            <li><a href="MesafeliSatisSozlesmesiMetni.php">Mesafeli Satış Sözleşmesi</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-xs-12 adres">
          <h4 class="mt-lg-0 mt-sm-4">İletişim</h4>
          <p> <i class="fa fa-map-marker mr-3"></i> <?php echo DonusumleriGeriDondur($SiteAdres); ?></p>
          <p class="mb-0"><i class="fa fa-phone mr-3"></i><a href="tel:<?php echo DonusumleriGeriDondur($SiteTelefon); ?>"><?php echo DonusumleriGeriDondur($SiteTelefon); ?></a></p>
          <p><i class="fa fa-envelope-o mr-3"></i><a href="mailto:<?php echo DonusumleriGeriDondur($SiteEmailAdresi); ?> "><?php echo DonusumleriGeriDondur($SiteEmailAdresi); ?> </a></p>
        </div>
      </div>

      <div class="mb-2">
        <section class="w3l-footer-22">
          <div class="sub-two-right">
            <ul>
              <li><a class="pay-method" href="#"><span class="fa fa-cc-visa" aria-hidden="true"></span></a></li>
              <li><a class="pay-method" href="#"><span class="fa fa-cc-mastercard" aria-hidden="true"></span></a></li>
              <li><a class="pay-method" href="#"><span class="fa fa-cc-paypal" aria-hidden="true"></span></a></li>
              <li><a class="pay-method" href="#"><span class="fa fa-cc-amex" aria-hidden="true"></span></a></li>
            </ul>
          </div>
        </section>
      </div>

      <div class="row mt-5">
        <div class="col copyright">
          <p class=""><small class="text-white-50"><?php echo DonusumleriGeriDondur($SiteCopyrightMetni);  ?></small></p>
        </div>
      </div>

    </div>
  </div>
  <!-- footer end-->








  <!-- jquery -->
  <script src="js/jquery-1.11.3.min.js"></script>
  <!-- bootstrap -->
  <script src="js/bootstrap.min.js"></script>
  <!-- count down -->
  <script src="js/jquery.countdown.js"></script>
  <!-- isotope -->
  <script src="js/jquery.isotope-3.0.6.min.js"></script>
  <!-- waypoints -->
  <script src="js/waypoints.js"></script>
  <!-- owl carousel -->
  <script src="js/owl.carousel.min.js"></script>
  <!-- magnific popup -->
  <script src="js/jquery.magnific-popup.min.js"></script>
  <!-- mean menu -->
  <script src="js/jquery.meanmenu.min.js"></script>
  <!-- sticker js -->
  <script src="js/sticker.js"></script>
  <!-- main js -->
  <script src="js/main.js"></script>
</body>

</html>
<?php
$VeritabaniBaglantisi = null;
?>