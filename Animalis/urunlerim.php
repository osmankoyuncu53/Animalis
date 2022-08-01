<?php  
session_start();
	require_once ("Ayarlar/ayar.php");
	require_once ("Ayarlar/Fonksiyonlar.php");
	 include "netting/baglan.php";
     $komut=$db->prepare("SELECT * FROM urunler INNER JOIN sponsor ON urunler.Sponsor_ID=sponsor.S_id WHERE 
    	S_id=:sponsor_id");
     $komut->execute(array('sponsor_id'=>$_SESSION['Sponsor_ID']));
?>
<?php if (isset($_SESSION["Sponsor"])) { ?>


<!DOCTYPE html>
<html lang="tr">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">


	<title><?php echo DonusumleriGeriDondur($SiteTitle) ; ?> | Ürünlerim </title>    <!-- title -->
	<link rel="shortcut icon" type="img/png" href="<?php echo DonusumleriGeriDondur($Favicon); ?>"> <!-- favicon -->


	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	 <script src="https://kit.fontawesome.com/081d03dba3.js" crossorigin="anonymous"></script><!--Fontawesome iconlar için eklenmiştir. -->
	 <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons">
	<link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
	
	<!-- bootstrap -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- mean menu css -->
	<link rel="stylesheet" href="css/meanmenu.min.css">
	<!-- main style -->
	<link rel="stylesheet" href="css/style.css">
	<!-- responsive -->
	<link rel="stylesheet" href="css/responsive.css">
	<!-- tunahan -->
	<link rel="stylesheet" href="css/style2.css">


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
                                    <a href="Sepetim.php"><i class="fas fa-shopping-cart"></i></a>
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

	
	<!-- slider  -->
	<div class="hk-option hk-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="hk-text">
						<p><?php echo  $FirmaAd; ?></p>
						<h1>Ürünlerim</h1>
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
                    <div class="col-md-3  col-md-99">
                        <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                            <a class="nav-link" class="nav-link"  href="index.php"><i class="fa fa-shopping-bag"></i>Anasayfa</a>
                            <a class="nav-link active"  href="urunlerim.php"><i class="fa fa-shopping-bag"></i>Ürünlerim</a>
							<a class="nav-link"  href="urunekle.php"><i class="fa fa-shopping-bag"></i>Ürün Ekle</a>
                        </div>
                    </div>

					<div class="col-8">	
	         
					<section class="ftco-section">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="table-wrap">
						<table class="table">
						  <thead class="thead-primary">
						    <tr>	
						      <th>Görsel</th>
						      <th>Ürün Adı</th>
						      <th>Miktarı</th>
						      <th>Fiyatı</th>
						      <th>Kategori</th>
						      <th>Tür</th>
						      <th>Sponsor</th>
							  <th>Güncelle</th>
							  <th>Sil</th>
						    </tr>
						  </thead>
	                <?php while($oku=$komut->fetch(PDO::FETCH_ASSOC)) { ?>
						  <tbody>
						    <tr class="alert" role="alert">
						      <td><img class="img" src="img/<?php echo $oku['Urun_Resim'];?>" ></td>
						      <td><span><?php echo $oku['Urun_Ad'];?></span></td>
						      <td><?php echo $oku['Urun_Miktar'];?></td>
						      <td><?php echo $oku['Urun_Fiyat'];?></td>
	                    	  <td><?php echo $oku['Urun_Kategori'];?></td>
	                    	  <td><?php echo $oku['Urun_Tur'];?></td>
							  <td><?php echo $oku['FirmaAd'];?></td>
	
						    <td>
							  	<a href="guncelleme.php?urun_id=<?php echo $oku['Urun_ID'] ?>">
							  		<button type="button" class="btn btn-primary btn-floating">
							  			<i class="fas fa-edit"></i>
									</button>
							  	</a>
				        	</td>

							<td>
								<a href="netting/islem.php?urun_id=<?php echo $oku['Urun_ID'];?>&urunsil">
									<button class="btn btn-primary btn-floating">
	  									<i class="fas fa-trash"> </i>
									</button>
								</a>
						   </td>
					<?php } ?>     
						    </tr>
						   
						  </tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>

	    </div>




                </div>
             </div>
        </div>
        <!-- END -->

<br><br><br><br><br><br><br><br><br><br>
	
	
	
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
                    <h4 class="mt-lg-0 mt-sm-4">Adres</h4>
                    <p>Cihangir, Petrol Ofisi Cd. No: 7, 34310 Avcılar/İstanbul</p>
                    <p class="mb-0"><i class="fa fa-phone mr-3"></i>(534)0151-1004</p>
                    <p><i class="fa fa-envelope-o mr-3"></i>info@gmail.com</p>
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
