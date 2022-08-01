<?php
session_start();
require_once("Ayarlar/ayar.php");
require_once("Ayarlar/Fonksiyonlar.php");
?>
<?php if (isset($_SESSION["Sponsor"])) { ?>

    <!DOCTYPE html>
    <html lang="tr">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <title><?php echo DonusumleriGeriDondur($SiteAdi . " | " . $FirmaAd); ?> Hesabım </title><!-- title -->
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
                                    <?php }?>
                                    <li>

                                        <?php
                                        if (isset($_SESSION["Sponsor"])) { ?>

                                            <div class="header-icons">
                                                <a href="SponsorCikis.php"> <i class="fas fa-door-open"> </i><span class="d-none d-md-inline-block"> &nbsp;Çıkış</span></a>
                                                <a href="SponsorProfil.php"> <i class="fas fa-user-alt"> </i><span class="d-none d-md-inline-block">&nbsp;<?php echo $FirmaAd ?></span></a>
                                            </div>
                                        <?php } else { ?>
                                            <div class="header-icons">
                                                <a href="Sepetim.php"><i class="fas fa-shopping-cart"></i></a>
                                                <a href="KullaniciGiris.php"> <i class="fas fa-sign-in-alt"> </i> <span class="d-none d-md-inline-block">&nbsp;Giriş</span> </a>
                                                <a href="SponsorGiris.php"> <i class="fas fa-sign-in-alt"> </i> <span class="d-none d-md-inline-block">&nbsp;Sponsor</span> </a>
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
                            <p><?php echo  $FirmaAd; ?></p>
                            <h1>Hesabım</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Slider Bitiş -->




        <!-- My Account Start -->
        <div class="my-account">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3 col-md-99">
                        <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="dashboard-nav" data-toggle="pill" href="#dashboard-tab" role="tab"><i class="fa fa-tachometer-alt"></i>Hesabım</a>
                            <a class="nav-link"  href="urunlerim.php"><i class="fa fa-shopping-bag"></i>Ürünlerim</a>
                            <a class="nav-link" id="payment-nav" data-toggle="pill" href="#kartlarım" role="tab"><i class="fa fa-credit-card"></i>Kayıtlı kartlarım</a>
                            <a class="nav-link" id="address-nav" data-toggle="pill" href="#Adres" role="tab"><i class="fa fa-map-marker-alt"></i>Adres Bilgilerim</a>
                            <a class="nav-link" id="account-nav" data-toggle="pill" href="#Bilgilerim" role="tab"><i class="fa fa-user"></i>Kullanıcı Bilgilerim</a>
                            <a class="nav-link" href="SponsorCikis.php"><i class="fa fa-sign-out-alt"></i>Çıkış Yap</a>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content">

                            <div class="tab-pane fade show active" id="dashboard-tab" role="tabpanel" aria-labelledby="dashboard-nav">
                                <h4>Hesabım</h4>
                                <p>
                                    Merhaba <b><?php echo $FirmaAd ?></b> Hesabım bölümünden hesap ayarlarını ve kart/iban bilgilerini güncelleye bilirsiniz.
                                </p>
                                <p> Sitemize <?php echo TarihBul($KayitTarihi); ?> Tarihinde kayıt olmuş bulunmaktasınız. </p>
                            </div>

                           

                            <div class="tab-pane fade" id="kartlarım" role="tabpanel" aria-labelledby="payment-nav">
                                <h4>Kayıtlı Kartlarım</h4>
                                <p>
                                    Kart bilgileri gelecektir.
                                </p>
                            </div>



                            <div class="tab-pane fade" id="Adres" role="tabpanel" aria-labelledby="address-nav">
                                <h4>Adreslerim </h4>
                                <form action="" method="post"><button type="submit" class="button" name='AdresEkle' style="float:right; margin-bottom: 9px;">Adres Ekle</button></form>
                                <?php
                                $AdreslerSorgusu        =    $VeritabaniBaglantisi->prepare("SELECT * FROM adresler WHERE K_id = ? ");
                                $AdreslerSorgusu->execute([$SponsorID]);
                                $AdreslerSayisi            =    $AdreslerSorgusu->rowCount();
                                $AdreslerKayitlari        =    $AdreslerSorgusu->fetchAll(PDO::FETCH_ASSOC);

                                if ($AdreslerSayisi > 0) {
                                    foreach ($AdreslerKayitlari as $Satirlar) {
                                ?>
                                
                                        <div class="table-responsive">
                                            <table class="table table-bordered ">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>Ad Soyad</th>
                                                        <th>Adres</th>
                                                        <th>İlçe</th>
                                                        <th>Sehir</th>
                                                        <th>Telefon Numarası</th>
                                                        <th>Düzenle</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><?php echo $Satirlar["ad_soyad"]; ?></td>
                                                        <td style="width:0px"><?php echo $Satirlar["Adres"]; ?></td>
                                                        <td><?php echo $Satirlar["Ilce"]; ?></td>
                                                        <td><?php echo $Satirlar["Sehir"]; ?></td>
                                                        <td><?php echo $Satirlar["TelefonNumarasi"]; ?></td>
                                                        <td>
                                                            <a href="KullaniciProfilAdresSil.php?ID=<?php echo $Satirlar["id"]; ?>"> <button class="button">Sil</button></a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    <?php }
                                } else { ?>
                                    <p> Merhaba <b><?php echo $FirmaAd ?></b> Bu bölümde adres bilgilerini Güncelleye bilir silebilir ve düzenleye bilirsin. </p>
                                    <p> Şu anda adres bilginiz bulunmamaktadır. Lütfen adres ekleyiniz.</p>
                                <?php } ?>


                                <?php if (isset($_POST['AdresEkle'])) { ?>
                                    <br>
                                    <h4>Adres Ekle</h4>
                                    <form action="KullaniciProfilAdresEkle.php" method="post">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p class="forms-user">Ad Soyad</p>
                                                <input class="form-control" type="text" name="Adsoyad" placeholder="Ad Soyad">
                                            </div>

                                            <div class="col-md-6">
                                                <p class="forms-user">Adres(*)</p>
                                                <input class="form-control" type="text" name="adres" placeholder="Adres">
                                            </div>

                                            <div class="col-md-6">
                                                <p class="forms-user">İlçe</p>
                                                <input class="form-control" type="text" name="ilce" placeholder="ilçe">
                                            </div>

                                            <div class="col-md-6">
                                                <p class="forms-user">Şehir</p>
                                                <input class="form-control" type="text" name="Sehir" placeholder="Şehir">
                                            </div>
                                            <div class="col-md-6">
                                                <p class="forms-user">Telefon Numarası</p>
                                                <input class="form-control" type="text" name="TelefonNumarasi" placeholder="Telefon Numarasi">
                                            </div>

                                            <div class="col-md-12">
                                                <button type="submit" class="button" name="kaydet">Kaydet</button>
                                            </div>
                                        </div>
                                    </form>

                                <?php } ?>
                            </div>



                            <div class="tab-pane fade" id="Bilgilerim" role="tabpanel" aria-labelledby="account-nav">
                                <form action="SponsorBilgilerimiGuncelle.php" method="POST">
                                    <h4>Üyelik Bilgilerim</h4>
                                    <div class="row">

                                        <div class="col-md-6">
                                            <p class="forms-user">E-mail</p>
                                            <input class="form-control" type="text" name="EmailAdresi" value="<?php echo $EmailAdresi; ?>" placeholder="E-mail Adresi">
                                        </div>

                                        <div class="col-md-6">
                                            <p class="forms-user">Firma Adı</p>
                                            <input class="form-control" type="text" name="FirmaAd" value="<?php echo $FirmaAd; ?>" placeholder="Email Adresi">
                                        </div>

                                        <div class="col-md-6">
                                            <p class="forms-user">İban</p>
                                            <input class="form-control" type="text" name="Sponsorİban" value="<?php echo $Sponsorİban; ?>" placeholder="İban">
                                        </div>
                                        <div class="col-md-6">
                                            <p class="forms-user">Telefon Numarası</p>
                                            <input class="form-control" type="text" name="TelefonNumarasi" value="<?php echo $TelefonNumarasi; ?>" placeholder="Telefon Numarasi">
                                        </div>
                                        <div class="col-md-12">
                                            <button class="button" name="guncelle">Güncelle</button>
                                            <br><br>
                                        </div>

                                    </div>



                                    <h4>Şifre Güncelleme</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="forms-user">Şifre</p>
                                            <input class="form-control" type="password" name="Sifre" value="EskiSifre">
                                        </div>
                                        <div class="col-md-6">
                                            <p class="forms-user">Şifre Tekrar</p>
                                            <input class="form-control" type="password" name="SifreTekrar" value="EskiSifre">
                                        </div>
                                        <div class="col-md-12">
                                            <button class="button" name="guncelle">Güncelle</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END -->




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
					<?php if (isset($_SESSION["Sponsor"])) { ?>
                        <ul class="m-0 p-0">
							<li><a href="urunlerim.php">Ürünlerim</a></li>
							<li><a href="urunlerimListe.php">Ürümlerim Liste</a></li>
                            <li><a href="urunekle.php">Ürün Ekle</a></li>
                        </ul>
					<?php } else { ?>
                        <ul class="m-0 p-0">
                            <li><a href="index.php">Anasayfa</a></li>
                            <li><a href="hakkimizda.php">Hakkımızda</a></li>
                            <li><a href="Urunler.php">Urunler</a></li>
                            <li><a href="iletisim.php">İletisim</a></li>
                        </ul>
					<?php }?>
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
?>