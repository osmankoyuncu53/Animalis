<?php
    session_start(); 
    require_once ("Ayarlar/ayar.php");
    require_once ("Ayarlar/Fonksiyonlar.php");
    include "netting/baglan.php";  
    $komut=$db->prepare("SELECT * FROM urunler");
    $komut->execute();

    // Sponsor Listeleme
    $komut3=$db->prepare("SELECT * FROM Sponsor");
    $komut3->execute();

   
   
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
    <title><?php echo DonusumleriGeriDondur($SiteTitle) ; ?> | Ürünler </title>    <!-- title -->
    <meta name="descripton" content="<?php echo DonusumleriGeriDondur($SiteDescription); ?>">
    <meta name="keywords" content="<?php echo DonusumleriGeriDondur($SiteKeywords); ?>">
    <link rel="shortcut icon" type="img/png" href="<?php echo DonusumleriGeriDondur($Favicon); ?>" > <!-- favicon -->

    
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/081d03dba3.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Orelega+One&family=Poppins:wght@300&display=swap" rel="stylesheet">
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
                                    <a href="SponsorCikis.php"> <i class="fas fa-door-open"> </i><span class="d-none d-md-inline-block"> Çıkış</span></a>
                                     <a href="SponsorProfil.php"> <i class="fas fa-user-alt"> </i><span class="d-none d-md-inline-block"><?php echo $FirmaAd; ?></span></a>
								</div>
					<?php
					    }else{ ?>
                                 <div class="header-icons">
                                    <a href="Sepetim.php"><i class="fas fa-shopping-basket"></i></a>
                                    <a href="KullaniciGiris.php"> <i class="fas fa-sign-in-alt"> </i> <span class="d-none d-md-inline-block">Giriş</span> </a>
                                    <a href="SponsorGiris.php"> <i class="fas fa-sign-in-alt"> </i> <span class="d-none d-md-inline-block">Sponsor</span> </a>
                                </div>
					<?php  $_SESSION['sepet_id']=$oku['Urun_ID'];} ?>
                       
					

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
                        <p>Sizin Ürünleriniz</p>
                        <h1>Urunler</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Slider Bitiş -->
        <?php 
            if(isset($_GET['btn_sepeteEkle'])){
                if($_GET['sepeteEkle']=="on"){ ?>
                    <b style="color: green;">İşlem Başarılı... || Ürün Sepete Başarıyla Eklendi</b>
        <?php } 
                else if($_GET['sepeteEkle']=="off") {?>
                    <b style="color: maroon;">İşlem Başarısız...|| Giriş Yapmak Gerekli</b>
        <?php } } ?>
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

    <!-- Icerik-->
    <div class="icerikKapsayici">
        <div class="filtre">

            <table cellpadding="0.1" cellspacing="0.1">
                <tr>
                    <td align="center" colspan="4"><strong style="color:black; ">FILTRE</strong></td>
                </tr>
                <tr>
                    <td colspan="4">
                        <hr>
                        </hr>
                    </td>
                </tr>
                <tr>
                    <td align="center" colspan="4"><strong style="color:black; ">FIYAT ARALIGI</strong></td>
                </tr>

                <form action="Urunler_Fiyat_Filtre.php" method="POST">
                <tr>
                    <td colspan="4" align="center">
                        <select name="fiyatAraligi" style="width:170px;">
                            <option selected></option>
                            <option value="bir">1-99 </option></a>
                            <option value="yuz">100-199 </option>
                            <option value="ikiyuz">200-299 </option>
                            <option value="ucyuz">300-399</option>
                            <option value="dortyuz">400-499+</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td colspan="4">
                        <hr>
                        </hr>
                    </td>
                </tr>

                <tr>
                    <td align="center" colspan="4"><strong style="color:black;">HAYVAN KATEGORISI</strong></td>
                </tr>

                <tr>
                    <td colspan="4" align="center">
                        <select name="hayvanKategori" style="width:170px;">
                            <option selected></option>
                            <option value="Kedi">Kedi </option></a>
                            <option value="Kopek">Köpek </option>
                            <option value="Balik">Balık </option>
                        </select>
                    </td>

                </tr>

                <tr>
                    <td colspan="4">
                        <hr>
                        </hr>
                    </td>
                </tr>

                <tr>
                    <td align="center" colspan="4"><strong style="color:black; ">URUN KATEGORISI</strong></td>
                </tr>

                <tr>
                    <td colspan="4" align="center">
                        <select name="urunKategori" style="width:170px;">
                            <option selected></option>
                            <option value="Beslenme">Beslenme </option>
                            <option value="Oyun">Oyun </option>
                            <option value="Giyim">Giyim </option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td colspan="4">
                        <hr>
                        </hr>
                    </td>
                </tr>

                <tr>
                    <td align="center" colspan="4"><strong style="color:black; ">SPONSOR KATEGORISI</strong></td>
                </tr>

                <tr>
                    <td colspan="4" align="center">
                        <select name="SponsorKategori" style="width:170px;">
                        <?php while($oku3=$komut3->fetch(PDO::FETCH_ASSOC)) { ?>
                            <option selected></option>
                            <option value="<?php echo $oku3['S_id']?>"><?php echo $oku3['FirmaAd'];?></option>
                        <?php } ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td colspan="4">
                        <hr>
                        </hr>
                    </td>
                </tr>

                <tr>
                    <td colspan="4" align="center">
                        <button class="UygulaButon" type="submit" name="uygula"><i class="fas fa-filter"></i>FİLTRELE</button>
                    </td>
                </tr>
            </form>

            </table>
        </div>

        <div class="icerik" style="float:left;">
            <div class="row">
                <?php while($oku=$komut->fetch(PDO::FETCH_ASSOC)) { ?>
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
                                    <strong> <?php echo $oku['Urun_Fiyat'];?>₺ </strong>
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
                <?php } ?>


            </div>
        </div>
        <div style="clear:both"> </div>
    </div>


    <br><br><br><br><br><br>








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