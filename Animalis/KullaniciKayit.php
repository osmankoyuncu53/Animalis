<?php
session_start(); 
?>

<!DOCTYPE html>
<html lang="tr">
<head>
	<title>Kullanıcı | Kayıt </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" type="image/png" href="img/kullanıcıfavicon.png">
	  <script src="https://kit.fontawesome.com/081d03dba3.js" crossorigin="anonymous"></script><!--Fontawesome iconlar için eklenmiştir. -->
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">  -->  

	<link rel="stylesheet" type="text/css" href="css/kullanıcıform.css">


</head>
<body>
	
	<div class="container">
		<div class="row imgG">
			<div class="login-form pdg-fl">
				<form class="login-form2" action="KullaniciKayitSonuc.php" method="post">
				
					<span class="login-form2-title pdg-b">
						Kayıt Olun  <i class="fa fa-hand-o-down" aria-hidden="true"></i>
					</span>

					<div class="input-brd">
						<input class="input-byt" type="text" name="KullaniciAdi" placeholder="Kullanıcı adı*" required > 
					</div>
				<div class="input-brd rs1 ">
						<input class="input-byt" type="text" name="EmailAdresi" placeholder="Email Adresi*" required>
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
						<button class="button-btn" name="kayıt">Kayıt Olun</button>
						
					</div>


					<div class="text-center pb-pt">
					<span class="txt1">Zaten hesabınız var mı ? | </span>
						<a href="KullaniciGiris.php" class="txt2 hov1" >Giriş </a>
					</div>

					
					
				</form>
			</div>
		</div>
	</div>
	
	
	<!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>
<?php

?>



