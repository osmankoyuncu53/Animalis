<?php 
session_start();
    include "netting/baglan.php";  
    $komut=$db->prepare("SELECT * FROM urunler INNER JOIN encoksatanurun ON urunler.Urun_ID=encoksatanurun.Urun_ID");
    $komut->execute();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- title -->
    <title>Animalis | Anasayfa</title>

    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="assets/img/favicon.png">
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
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/slider.css">



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
                            <a href="index.php"><img src="img/logo.png" alt=""></a>
                        </div>
                        <!-- logo -->

                        <!-- menu start -->
                        <nav class="main-menu">
                            <ul>
                                <li><a href="index.php">Anasayfa</a></li>
                                <li><a href="hakkımızda.php">Hakkımızda</a></li>
                                <li><a href="Urunler.php">Urunler</a></li>
                                <li><a href="iletisim.php">İletişim</a></li>
                                <li>
                                    <div class="header-icons">
                                        <a href="Sepetim.php"><i class="fas fa-shopping-cart"></i></a>
                                        <a href="KullaniciCikis.php"> <i class="fas fa-door-open"> </i><span class="d-none d-md-inline-block"> Çıkış</span></a>
                                        <a href="KullaniciProfil.php"> <i class="fas fa-user-alt"> </i><span class="d-none d-md-inline-block"> <?php echo $_SESSION["adsoyad"]; ?></span></a>
                                    </div>
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
                <h1>YENİ SİTEMİZE HOŞGELDİNİZ</h1>
                <p> Dünya ve Türkiye de artık vazgeçilmez olmuş en iyi Hayvan ürünleriniz sitemizde bulabilir ve bu şekilde Sokak hayvanlarına bir yardım eli uzatmış olabilirsiniz.</p>

            </div>
        </div>
    </div>
    <!--jumbotron end -->

    <div class="container">
        <div class="urun text-center">
            <h3 style="color:black; ">Ürünler</h3>
        </div>
    </div>



    <form action="" method="post">

        <div class="icerik" style="margin-left:12em; margin-bottom:9em; margin-top:4em;">
            <div class="container">
                <div class="row">
                    <?php while($oku=$komut->fetch(PDO::FETCH_ASSOC)) { ?>
                    <div class="col-lg-3">
                        <div class="urun" >
            <table>
                
                
                <tr>
                    <td align="center">
                        <strong><a href="UrunDetay.php?Urun_ID=<?php echo $oku['Urun_ID']?>"><?php echo $oku['Urun_Ad'];?></a></strong>
                    </td>
                </tr>

                <tr>
                    <td>
                        <a href="UrunDetay.php?Urun_ID=<?php echo $oku['Urun_ID']?>">
                        <img src="img/<?php echo $oku['Urun_Resim']; ?>" width="100%" height="175"/> </a>
                    </td>
                </tr>
            
                <tr>
                    <td style="text-align:center; padding-top:5px; color: black;">
                        <strong> <?php echo $oku['Urun_Fiyat'];?>₺ </strong>                                                                   
                    </td>
                </tr>

                
                <tr width="10px">
                    <td style="text-align:center; padding-top:5px;">
                        <strong><button type="submit" name="btn_sepeteEkle"><img src="icons/sepet.png" width="40px">Sepete Ekle </button></strong>
                    </td>
                </tr>
            </table>
            </div>
           
            </div>
         <?php } ?>
            
            
        </div>
        </div>
        <div style="clear:both"> </div>
    </form>









    <br><br><br><br><br><br>

    <br><br><br><br><br><br>



    <!-- Reklam banner Start-->
    <div class="container">
        <div class="big-add-area">
            <div class="container-fluid">
                <a href="iletisim.html"><img src="img/reklam.png" alt=""></a>
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

                <div class="col-lg-5 col-xs-12 hakkımızda">
                    <h2>Hakkımızda</h2>
                    <p class="pr-5 ">Yardıma muhtaç tüm sokak hayvanlarına sizin de katkılarınızla yardım ediyoruz.</p>
                </div>

                <div class="col-lg-3 col-xs-12 Sayfa">
                    <h4 class="mt-lg-0 mt-sm-3">Sayfalar</h4>
                    <ul class="m-0 p-0">
                        <li>-> <a href="index.php">Anasayfa</a></li>
                        <li>-> <a href="hakkımızda.php">Hakkımızda</a></li>
                        <li>-> <a href="Urunler.php">Urunler</a></li>
                        <li>-> <a href="iletisim.php">İletisim</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-xs-12 adres">
                    <h4 class="mt-lg-0 mt-sm-4">Adres</h4>
                    <p>Cihangir, Petrol Ofisi Cd. No: 7, 34310 Avcılar/İstanbul</p>
                    <p class="mb-0"><i class="fa fa-phone mr-3"></i>(534)0151-1004</p>
                    <p><i class="fa fa-envelope-o mr-3"></i>info@gmail.com</p>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col copyright">
                    <p class=""><small class="text-white-50">© 2021. Tüm Hakları Saklıdır.</small></p>
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
