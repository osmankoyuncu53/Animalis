<?php
session_start();
    require_once ("Ayarlar/ayar.php");
    require_once ("Ayarlar/Fonksiyonlar.php");
    include "netting/baglan.php";

    $Sorgu = $VeritabaniBaglantisi->prepare("SELECT * FROM uye_sepeti WHERE K_id = ?");
    $Sorgu->execute([$KullaniciID]);


?>
<?php if (isset($_SESSION["Kullanici"])) { ?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="img/png" href="<?php echo DonusumleriGeriDondur($Favicon); ?>" > <!-- favicon -->

    <!-- title -->
    <title>Animalis | Sepetim</title>

    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
     <script src="https://kit.fontawesome.com/081d03dba3.js" crossorigin="anonymous"></script><!--Fontawesome iconlar için eklenmiştir. -->
    <!-- bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- mean menu css -->
    <link rel="stylesheet" href="css/meanmenu.min.css">
    <!-- main style -->
    <link rel="stylesheet" href="css/style.css">
    <!-- responsive -->
    <link rel="stylesheet" href="css/responsive.css">
    

</head>
<body>
    
    
    
<!-- header -->
    <div class="menuArka" >
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
                                <li><a href="hakkimizda.php">Hakkımızda</a></li>
                                <li><a href="Urunler.php">Urunler</a></li>
                                <li><a href="iletisim.php">İletişim</a></li>
                                <li>
                                <?php
                            if(isset($_SESSION["Kullanici"])){ ?>
                                <div class="header-icons">
                                     <a href="Sepetim.php"><i class="fas fa-shopping-basket"></i></a>
                                     <a href="KullaniciCikis.php"> <i class="fas fa-door-open"> </i><span class="d-none d-md-inline-block"> &nbsp;Çıkış</span></a>
                                     <a href="KullaniciProfil.php"> <i class="fas fa-user-alt"> </i><span class="d-none d-md-inline-block">&nbsp;<?php echo $KullaniciAd ?></span></a>
                                </div>
                    <?php }else{ ?>
                                <div class="header-icons">
                                    <a href="Sepetim.php"><i class="fas fa-shopping-basket"></i></a>
                                    <a href="KullaniciGiris.php"> <i class="fas fa-sign-in-alt"> </i> <span class="d-none d-md-inline-block">Giriş</span> </a>
                                    <a href="SponsorGiris.php"> <i class="fas fa-sign-in-alt"> </i> <span class="d-none d-md-inline-block">Sponsor</span> </a>
                                </div>
                    <?php
                    }
                    ?>
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
                        <p>Lorem İpsum Lorem İpsum</p>
                        <h1>Alışveriş çantası</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--Slider Bitiş -->
    
    <br><br><br><br><br>

<style type="text/css">
 .container .tablo table{
     color: black;
     text-align:center;
 }
 .container .tablo table tr{
    border-bottom:1px solid black;
 }
 .container .tablo table td{
    padding:10px;
 }
 .container .tablo table button{
    color:black;
 }

  /*Tablo silme butonları*/
  .container .tablo table button i{
    color:black;
    transition:0.2s;
}
.container .tablo table button i:hover {
    color:#FF9500;
    transition:0.3s;
}

/*------------------------------*/

 .container .odeme{
     margin: 200px 30px;
 }
 .container .odeme table{
     color: black;
     text-align: center;
 }
 .container .odeme table th{
     font-size: 16px;
 }
 .container .odeme table td{
     font-weight:bold;
 }

 .container .odeme table .OdemeButonu{
    border: none;
    background-color: #E7E094;
    font-size: 14px;
    font-weight: bold;
    border-radius: 5px;
    color: #202020;
    transition: 0.2s;
 }
 .container .odeme table .OdemeButonu:hover{
    background-color: #202020;
    color: #FFD100;
    transition: 0.3s;
 }

</style>

    <div class="container">
        <div class="row">
            <div class="col-md-8 tablo">
                <table border="0" width="95%">
                    <tr style="background-color: #353535; color:#D9D9D9;">
                        <th>Durum</th>
                        <th>Ürün Resmi</th>
                        <th>Ürün Adı</th>
                        <th>Fiyat</th>
                        <th>Adet</th>
                        <th>Toplam</th>
                    </tr>
                <!--Sepet Satır Ekleme -->
                <?php
                    $total = 0;
                    $kargo=10;
                    $genel_total=0;
                    while($oku=$Sorgu->fetch(PDO::FETCH_ASSOC)) { ?>
                    <tr>
                        <td style="border-right:1px solid black;">
                            <a href="netting/islem.php?sepet_id=<?php echo $oku['Urun_ID'];?>&sepetsil">
                                <button style="font-size:32px; background-color: #ffffff; border:none;">
                                    <i class="far fa-window-close"></i>
                                </button>
                            </a>
                        </td>
                        <td><img src="img/<?php echo $oku['Urun_Resim'];?>" width="100" height="100"></td>
                        <td><?php echo $oku['Urun_Ad']; ?></td>
                        <td><?php echo $oku['Urun_Fiyat'];?></td>
                        <td><?php echo $oku['Alim_Adet']; ?></td>
                        <td>
                            <?php
                                $toplamFiyat=(($oku['Urun_Fiyat'])*($oku['Alim_Adet'])); 
                                $total += $toplamFiyat;
                                echo $toplamFiyat;
                                $genel_total=$total+$kargo;
                            ?>  
                        </td>
                    </tr>   
                <?php } 

                $_SESSION['genel_total']=$genel_total;
                $_SESSION['urun_miktar']=$oku['Alim_Adet']; 
                ?>             
                </table>
            </div>

            <div class="col-md-3 odeme">
                <form action="iyzico/index.php" method="POST">
                <table border="1" width="100%">
                    <tr style="background-color: #353535; color:#D9D9D9; border-right:4px solid #353535; border-left:4px solid #353535;">
                        <th colspan="2">Toplam Fiyat</th>
                    </tr>
                    <tr style="border-right:4px solid #353535; border-left:4px solid #353535;">
                        <td style="background-color: #6B6C6B; color:#D9D9D9; border-right:2px solid #353535;">Ara Toplam</td>
                        <td><?php echo $total; ?></td>
                    </tr>
                    <tr style="border-right:4px solid #353535; border-left:4px solid #353535;">
                        <td style="background-color: #6B6C6B; color:#D9D9D9; border-right:2px solid #353535;">Kargo</td>
                        <td><?php echo $kargo; ?></td>
                    </tr>
                    <tr style="border-right:4px solid #353535; border-left:4px solid #353535;">
                        <td  style="background-color: #6B6C6B; color:#D9D9D9; border-right:2px solid #353535;">Toplam</td>
                        <td><?php echo $genel_total; ?></td>
                    </tr>
                    <tr style="background-color: #353535; color:#D9D9D9; border-right:4px solid #353535; border-left:4px solid #353535;">
                        <td colspan="2">
                            <button class="OdemeButonu" type="submit">
                                ÖDEME YAP
                            </button>
                        </td>
                    </tr>
                </table>
                </form>
            </div>
        </div>
    </div>

    <br><br><br><br><br>

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
<?php } else {
    header("location:index.php");
} ?>
<?php
$VeritabaniBaglantisi = null;
ob_end_flush();
?>