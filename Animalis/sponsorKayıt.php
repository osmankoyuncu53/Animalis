<?php
session_start(); 
?>

<!DOCTYPE html>
<html lang="tr">
<head>
	<title>Sponsor | Kayıt </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" type="image/png" href="img/kullanıcıfavicon.png">
	  <script src="https://kit.fontawesome.com/081d03dba3.js" crossorigin="anonymous"></script><!--Fontawesome iconlar için eklenmiştir. -->


	<link rel="stylesheet" type="text/css" href="css/kullanıcıform.css">


</head>
<body>
	
	<div class="container">
		<div class="row imgS">
			<div class="login-form pdg-fl">
				<form class="login-form2" action="SponsorKayitSonuc.php" method="post">
				
				<span class="login-form2-title pdg-b">
						Sponsor Kayıt  <i class="fa fa-hand-o-down" aria-hidden="true"></i>
					</span>
				<div class="input-brd rs1 ">
						<input class="input-byt" type="text" name="EmailAdresi" placeholder="Email Adresi*" required>
					</div>
					<div class="input-brd">
						<input class="input-byt" type="text" name="FirmaAd" placeholder="Firma Adı*" required > 
					</div>
		
					<div class="input-brd rs1 ">
						<input class="input-byt" type="password" name="Sifre" placeholder="Şifre">
					</div>
					<div class="input-brd rs1 ">
						<input class="input-byt" type="password" name="SifreTekrar" placeholder="Şifre Tekrar">
					</div>
					 <div class=" input-brd rs1 form-check">
					<input type="checkbox" class="form-check-input" id="exampleCheck1" value="1" name="SozlesmeOnay">
					<label class="form-check-label" for="exampleCheck1"><a href="UyelikSozlesmesiMetni.php" target="_blank" class="uyelik">Üyelik Sözleşmesi</a>'ni Okudum ve Onaylıyorum.</label>
					</div>

					<div class="mg-t">
						<button class="button-btn" name="kayıt">Kayıt Talebi Oluşturun</button>
						
					</div>


					<div class="text-center pb-pt">
					<span class="txt1">Zaten hesabınız var mı ? | </span>
						<a href="SponsorGiris.php" class="txt2 hov1" >Giriş </a>
					</div>

					
					
				</form>
			</div>
		</div>
	</div>
</body>
</html>


