<?php 
session_start();
    require_once ("Ayarlar/ayar.php");
    require_once ("Ayarlar/Fonksiyonlar.php");
    include "netting/baglan.php";  
    $komut=$db->prepare("SELECT * FROM urunler INNER JOIN encoksatanurun ON urunler.Urun_ID=encoksatanurun.Urun_ID ORDER BY encoksatanurun.Satis_Miktari DESC LIMIT 4");
    $komut->execute();
?>
    
<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Robots" content="index, follow"><!--Arama Motoru Ayarları-->
    <meta name="googlebot" content="index , follow"><!--Google botları-->
    <meta name="revisit-after" content="10 days"><!--Arama Motoru siteyi hangi aralıkta ziyaret etmesi gerektigini söyleriz.-->
    <title><?php echo DonusumleriGeriDondur($SiteTitle) ; ?> </title>    <!-- title -->
    <meta name="descripton" content="<?php echo DonusumleriGeriDondur($SiteDescription); ?>">
    <meta name="keywords" content="<?php echo DonusumleriGeriDondur($SiteKeywords); ?>">
    <link rel="shortcut icon" type="img/png" href="<?php echo DonusumleriGeriDondur($Favicon); ?>" > <!-- favicon -->

    <!-- google font -->
  	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	 <script src="https://kit.fontawesome.com/081d03dba3.js" crossorigin="anonymous"></script><!--Fontawesome iconlar için eklenmiştir. -->
    <!--Fontawesome iconlar için eklenmiştir. -->
    <!-- bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- mean menu css -->
    <link rel="stylesheet" href="css/meanmenu.min.css">
    <!-- main style -->
    <link rel="stylesheet" href="css/style.css">
    <!-- responsive -->
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/slider.css">

    <style type="text/css">
        .icerik .col-lg-3 .PopulerUrunButon{
            font-family: 'Poppins', sans-serif;
            border-radius:10px;
            color:#1D3557;
            border: none;
            background-color:#fff;
            transition:0.5s;
        }
        .icerik .col-lg-3 .PopulerUrunButon:hover{
            color:#F1FAEE;
            background-color:#1D3557;
            transition:0.5s;
        }

        .filtre table .UygulaButon{
            font-family: 'Poppins', sans-serif;
            font-size: 19px;
            font-weight:bold;
            border-radius:10px;
            color:#1D3557;
            border: none;
            background-color:#fff;
            transition:0.5s;
        }
        .filtre table .UygulaButon:hover{
            color:#F1FAEE;
            background-color:#1D3557;
            transition:0.5s;
        }
    </style>

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
                            <?php   if (isset($_SESSION["Sponsor"])) { ?>
                                    <li><a href="urunlerim.php">Ürünlerim</a></li>
                                    <li><a href="urunlerimListe.php">Ürümlerim Liste</a></li>
                                    <li><a href="urunekle.php">Ürün Ekle</a></li>
                                    <?php } else{?>
                                         <li><a href="index.php">Anasayfa</a></li>
                                         <li><a href="hakkimizda.php">Hakkımızda</a></li>
                                         <li><a href="Urunler.php">Urunler</a></li>
                                         <li><a href="iletisim.php">İletişim</a></li>
                                         <?php }?>
                                    <li>          
                    <?php
					        if(isset($_SESSION["Kullanici"])){ ?>
                                <div class="header-icons">
                                     <a href="Sepetim.php"><i class="fas fa-shopping-basket"></i></a>
                                     <a href="KullaniciCikis.php"> <i class="fas fa-door-open"> </i><span class="d-none d-md-inline-block"> &nbsp;Çıkış</span></a>
                                     <a href="KullaniciProfil.php"> <i class="fas fa-user-alt"> </i><span class="d-none d-md-inline-block">&nbsp;<?php echo $KullaniciAd ?></span></a>
								</div>
					<?php }
                    else if(isset($_SESSION["Sponsor"])){ ?>
                                <div class="header-icons">
                                    <a href="SponsorCikis.php"> <i class="fas fa-door-open"> </i><span class="d-none d-md-inline-block"> &nbsp;Çıkış</span></a>
                                     <a href="SponsorProfil.php"> <i class="fas fa-user-alt"> </i><span class="d-none d-md-inline-block">&nbsp;<?php echo $FirmaAd; ?></span></a>
								</div>
					<?php
					    }else{ ?>
                                 <div class="header-icons">
                                    <a href="Sepetim.php"><i class="fas fa-shopping-basket"></i></a>
                                    <a href="KullaniciGiris.php"> <i class="fas fa-sign-in-alt"> </i> <span class="d-none d-md-inline-block">&nbsp;Giriş</span> </a>
                                    <a href="SponsorGiris.php"> <i class="fas fa-sign-in-alt"> </i> <span class="d-none d-md-inline-block">&nbsp;Sponsor</span> </a>
                                </div>
					<?php }?>
                       
					

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


    <!-- slider -- boostrap Slider Kullanılmıştır. -->
    <header>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active" style="background-image:  url('img/slider/slider1.jpg')">
                    <div class="carousel-caption d-none d-md-block">
                    </div>
                </div>
                <div class="carousel-item" style="background-image: url('img/slider/slider2.jpg')">
                    <div class="carousel-caption d-none d-md-block">
                    </div>
                </div>
                <div class="carousel-item" style="background-image: url('img/slider/slider3.jpg')">
                    <div class="carousel-caption d-none d-md-block">
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Geri</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">İleri</span>
            </a>
        </div>
    </header>
    <!--Slider Bitiş -->


   
    <!--Jumbotron Start -->
    <div class="container">
        <div class="jumbotron">
            <div class="container">
                <h1><?php echo DonusumleriGeriDondur($jumbotronBaslik) ?></h1>
                <p><?php echo DonusumleriGeriDondur($jumbotronMetin ) ?></p>
            </div>
        </div>
    </div>
    <!--jumbotron end -->

    
    <div class="container">
        <div class="urun text-center">
        <?php if(isset($_SESSION["Sponsor"])){?>
            <h3 style="color:black;">Ürünlerim</h3>
        <?php }else { ?>
            <h3 style="color:black;">Popüler Ürünler</h3>
            <?php } ?>
        </div>     
    </div

    <style type="text/css">
        #Iletisim .col-lg-3 .PopulerUrunButon{
            font-family: 'Poppins', sans-serif;
            border-radius:10px;
            color:#1D3557;
            border: none;
            background-color:#fff;
            transition:0.5s;
        }
        #Iletisim .col-lg-3 .PopulerUrunButon:hover{
            color:#F1FAEE;
            background-color:#1D3557;
            transition:0.5s;
        }
    </style>

        
    <div class="container">
    <div class="icerik" style="margin-bottom:-150px; margin-top:25px;">
    <div class="row">
            <?php if(isset($_SESSION["Sponsor"])) { ?>
                <?php 
                $encoksatanSayac=0;
                while($oku=$komut->fetch(PDO::FETCH_ASSOC)) {                    
                   $encoksatanSayac++;
                ?> 
                <div class="col-lg-3">
                    <form action="UrunDetay.php?Urun_ID=<?php echo $oku['Urun_ID']?>&Sponsor_ID=<?php echo $oku['Sponsor_ID']?>" method="POST">
                    <div class="urun">
                        <table>
                            <tr>
                                <td style="text-align:center;padding-top:5px;"><strong style="color:black;"><?php echo $oku['Urun_Ad']; ?></strong> </td>
                            </tr>
                            <tr>
                                <td><img src="img/<?php echo $oku['Urun_Resim']; ?>" width="100%" height="175" /> </a></td>
                            </tr>
                            <tr>
                                <td style="text-align:center; padding-top:5px; color: black;"><strong><?php echo $oku['Urun_Fiyat'];?>₺</strong></td>
                            </tr>
                        </table>
                    </div>
                </form>
                </div>
                <?php 
                if($encoksatanSayac==4){
                    break; }
            } ?>
            <?php } else { ?>
                <?php 
                $encoksatanSayac=0;
                while($oku=$komut->fetch(PDO::FETCH_ASSOC)) {                    
                   $encoksatanSayac++;
                ?>
                <div class="col-lg-3">
                    <form action="UrunDetay.php?Urun_ID=<?php echo $oku['Urun_ID']?>&Sponsor_ID=<?php echo $oku['Sponsor_ID']?>" method="POST">
                    <div class="urun">
                        <table>
                            <tr>
                                <td style="text-align:center;padding-top:5px;">
                                    <strong style="color:black;"><?php echo $oku['Urun_Ad']; ?></strong>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                        <img src="img/<?php echo $oku['Urun_Resim']; ?>" width="100%" height="175" /> </a>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:center; padding-top:5px; color: black;">
                                    <strong> <?php echo $oku['Urun_Fiyat'];?>₺</strong>
                                </td>
                            </tr>
                           <tr width="10px">
                            <td style="text-align:center; padding-top:5px;">
                                    <strong><button class="PopulerUrunButon" type="submit" name="btn_sepeteEkle" style="font-size:18px; "><i class="fas fa-cart-plus"></i>&nbsp;Ürünü İncele</button></strong>
                                </td>
                            </tr>
                        </table>
                    </div>
                </form>
                </div>
                <?php 
                if($encoksatanSayac==4){
                    break;
                }
            } ?>
            <?php } ?>
        </div>
        </div>
        <div style="clear:both"> </div>
        </div>
  




    <br><br><br><br><br><br>

    <br><br><br><br><br><br>



    <!-- Reklam banner Start-->
    <div class="container">
        <div class="big-add-area">
            <div class="container-fluid">
                <a href="iletisim.php"><img src="<?php echo DonusumleriGeriDondur($SiteReklam); ?>" alt=""></a>
            </div>
        </div>
    </div>
    <!-- Reklam banner end -->



    <!-- Ortaklar Bölümü -->
    <div class="ortak">
        <div class="container">
            <div class="row">
                <div class="duzen text-center">
                    <img src="img/ortaklar/ort1.png" alt="..." class="img-thumbnail">
                    <img src="img/ortaklar/ort1.png" alt="..." class="img-thumbnail">
                    <img src="img/ortaklar/ort1.png" alt="..." class="img-thumbnail">
                    <img src="img/ortaklar/ort1.png" alt="..." class="img-thumbnail">
                </div>
            </div>
        </div>
    </div>
    
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
                        <li><a href="hakkımızda.php">Hakkımızda</a></li>
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
                    <p><i class="fa fa-envelope-o mr-3"></i><a href="mailto:<?php echo DonusumleriGeriDondur($SiteEmailAdresi);?> "><?php echo DonusumleriGeriDondur($SiteEmailAdresi);?> </a></p>
                </div>
            </div>

            <div class="mb-2">
                <section class="w3l-footer-22">
                <div class="sub-two-right" >
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