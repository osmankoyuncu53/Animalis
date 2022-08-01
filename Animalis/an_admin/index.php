
<?php 
session_start(); 
    require_once ("../Ayarlar/ayar.php");
    require_once ("../Ayarlar/Fonksiyonlar.php");
?>
<!doctype html>
<html lang="tr" class="fullscreen-bg">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Robots" content="index, nofollow, noarchive"><!--Arama Motoru Ayarları-->
    <meta name="googlebot" content="index , nofollow,noarchive"><!--Google botları-->
    <meta name="revisit-after" content="10 days"><!--Arama Motoru siteyi hangi aralıkta ziyaret etmesi gerektigini söyleriz.-->
    <title><?php echo DonusumleriGeriDondur($SiteTitle) ; ?> | Admin Panel </title>    <!-- title -->
    <link rel="shortcut icon" type="img/png" href="<?php echo DonusumleriGeriDondur($Favicon); ?>" > <!-- favicon -->

	<!-- google font -->
	 <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	 <script src="https://kit.fontawesome.com/081d03dba3.js" crossorigin="anonymous"></script><!--Fontawesome iconlar için eklenmiştir. -->
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
	
</head>

<body style="
    background-color: #F3F5F8;
    font-size: 15px;
    color: #676a6d;
">
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">
						<div class="content">
							<div class="header">
								<div class="logo text-center"><img src="../img/adminLogo.png" alt="Klorofil Logo"></div>
								<p class="lead">hesabınıza giriş yapın</p>
							</div>
							<form class="form-auth-small" action="adminGirisSonuc.php"  method="POST">
								<div class="form-group">
									<input type="email" name="AdminEmail" class="form-control" id="signin-email"  placeholder="Email">
								</div>
								<div class="form-group">
									<input type="password" name="AdminSifre" class="form-control" id="signin-password"  placeholder="Şifre">
								</div>
								<button type="submit" name="gonder" class="btn btn-primary btn-lg btn-block">OTURUM AÇ</button>
								<div class="bottom">
									<span class="helper-text"><i class="fa fa-home"></i> <a href="../index.php">Siteye Dön</a></span>
								</div>
							</form>
						</div>
					</div>
					<div class="right">
						<div class="overlay"></div>
						<div class="content text">
							<h1 class="heading">Animalis Yönetici Paneline Hoş Geldin</h1>
							<p>Admin Giris Paneli</p>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>

</html>
