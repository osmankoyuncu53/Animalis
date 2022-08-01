<!DOCTYPE html>
<html lang="tr">
<head>
	<title>Sponsor | Giriş</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="icon" type="image/png" href="img/kullanıcıfavicon.png">
	  <script src="https://kit.fontawesome.com/081d03dba3.js" crossorigin="anonymous"></script><!--Fontawesome iconlar için eklenmiştir. -->


	<link rel="stylesheet" type="text/css" href="css/kullanıcıform.css">


</head>
<body>
	
	<div class="container">
		<div class="row imgS">
			<div class="login-form pdg-fl"><!--pdg-fl(padding top-bottom-left-right hepsini kullanır.)-->

				<form class="login-form2" action="SponsorGirisSonuc.php" method="POST">
								<!--pdg-b(Padding-bottom)-->
					<span class="login-form2-title pdg-b">
						Giriş Yap <i class="fa fa-hand-o-down" aria-hidden="true"></i>
					</span>

					<div class="input-brd">
						<input class="input-byt" type="text" name="EmailAdresi" placeholder="EmailAdresi*" required >
					</div>

					<div class="input-brd">
						<input class="input-byt" type="password" name="Sifre" placeholder="Şifre">
					</div>

					<!--mg-t(margin-top) -->
					<div class="mg-t">
						<button class="button-btn" name="giris">Giriş</button>
					</div>
					<!--pb-pt(padding-bottom-padding-top) -->
					<div class="text-center">
						<span class="txt1">Hesabınız Yok mu ? | </span>
						<a href="SponsorKayıt.php" class="txt2 hov1">Talepte Bulun</a>
					</div>
					
				</form>

			</div>
		</div>
	</div>
	

	


</body>
</html>


