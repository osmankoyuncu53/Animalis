<?php 
session_start(); 
    require_once ("Ayarlar/ayar.php");
    require_once ("Ayarlar/Fonksiyonlar.php");
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
    <title><?php echo DonusumleriGeriDondur($SiteTitle) ; ?> | İletisim </title>    <!-- title -->
    <meta name="descripton" content="<?php echo DonusumleriGeriDondur($SiteDescription); ?>">
    <meta name="keywords" content="<?php echo DonusumleriGeriDondur($SiteKeywords); ?>">
	<link rel="shortcut icon" type="img/png" href="<?php echo DonusumleriGeriDondur($Favicon); ?>" > <!-- favicon -->


	
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
							<a href="index.php"><img src="<?php echo DonusumleriGeriDondur($SiteLogo);?>" alt=""></a>
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
					<?php }?>
                       
					

                                </li>
                            </ul>
                        </nav>
						<div class="mobile-menu">
						</div>
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
						<p>Bir sorunmu yaşıyorsunuz ? </p>
						<h1>İletişim</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--Slider Bitiş -->
	



<div class="container iletisim">
	<div class="row">
	
		<div class="col-md-3 bg-bilgi">
			<div class="iletisim-bilgi">
				<img src="img/iletisim.png" alt="image"/>
				<h2>İletişim</h2>
				<h4>Bizimle İletişime Geçin</h4>
			</div>
		</div>
	
		<div class="col-md-9">
			<div class="iletisim-form">
			<form action="mail.php" method="post">	
			
				<div class="form-group">
				  <label class="control-label col-sm-2" for="fname">Adınız:</label>
				  <div class="col-sm-10">          
					<input type="text" class="form-control" name="ad" placeholder="Ad" >
				  </div>
				</div>

				<div class="form-group">
				  <label class="control-label col-sm-2" for="lname">Soyadınız:</label>
				  <div class="col-sm-10">          
					<input type="text" class="form-control"  name="soyad" placeholder="Soyad" >
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-2" for="email">Email:</label>
				  <div class="col-sm-10">
					<input type="email" class="form-control" name="email" placeholder="EmailGiriniz">
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-2" for="comment">Mesajınız:</label>
				  <div class="col-sm-10">
					<textarea class="form-control" rows="5" id="comment" name="mesaj"></textarea>
				  </div>
				</div>
				<div class="form-group">        
				  <div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-default">Gonder</button>
				  </div>
				</div>
				</form>
			</div>
		</div>
	</div>
</div>




<!--Harita -->
<div class="container-fluid">
    <div class="map">
   <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3011.360279186804!2d28.69703407850618!3d40.995486944873015!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14caa0f50b3c8269%3A0x9a2cb9b0d3495b24!2zxLBTVEFOQlVMIEdFTMSwxZ7EsE0gw5xOxLBWRVJTxLBURVPEsCBSRUtUw5ZSTMOcSw!5e0!3m2!1str!2str!4v1609843304140!5m2!1str!2str" 
		width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</div>
</div>	
<!--Harita end -->

	
	
	
	
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