<?php

try{
	$VeritabaniBaglantisi	=	new PDO("mysql:host=localhost;dbname=animaliss;charset=utf8","root", "");
}catch(PDOException $Hata){
	//echo "Bağlantı Hatası<br />" . $Hata->getMessage(); // Bu alanı kapalı kalmalıdır çünkü hata ile karşılaşılırsa kullanıcı görür.   
	die();
}


$AyarlarSorgusu     = 	$VeritabaniBaglantisi->prepare("SELECT * FROM ayarlar LIMIT 1");
$AyarlarSorgusu->execute();
$AyaSayisi 			= 	$AyarlarSorgusu->rowCount(); 
$Ayarlar 				=   $AyarlarSorgusu->fetch(PDO::FETCH_ASSOC); 

if($AyaSayisi>0){
	$SiteAdi          	  =  $Ayarlar["SiteAdi"];
	$SiteTitle            =  $Ayarlar["SiteTitle"];
	$SiteDescription      =  $Ayarlar["SiteDescription"];
	$SiteKeywords         =  $Ayarlar["SiteKeywords"];
	$SiteCopyrightMetni   =  $Ayarlar["SiteCopyrightMetni"];
	$SiteLogo             =  $Ayarlar["SiteLogo"];
	$Favicon			  =  $Ayarlar["Favicon"];
	$SiteEmailAdresi      =  $Ayarlar["SiteEmailAdresi"];
	$SiteEmailSifresi     =  $Ayarlar["SiteEmailSifresi"];
	$SiteAdres		      =  $Ayarlar["SiteAdres"];
	$SiteTelefon    	  =  $Ayarlar["SiteTelefon"];
	$SiteReklam			  =	 $Ayarlar["SiteReklam"];

	

}else{//echo "Site ayar sorgusu hatalı";//bu alan kapalı kalmalıdır.
	die();
}








$MetinlerSorgusu     = 	$VeritabaniBaglantisi->prepare("SELECT * FROM sozlesmevemetin LIMIT 1");
$MetinlerSorgusu->execute();
$MetinlerSayisi	  	= 	$MetinlerSorgusu->rowCount(); 
$Metinler				=   $MetinlerSorgusu->fetch(PDO::FETCH_ASSOC); 

if($MetinlerSayisi>0){
	$HakkimizdaMetni        	  		=  $Metinler["HakkimizdaMetni"];
	$HakkimizdaMetniFooter      	  	=  $Metinler["HakkimizdaMetniFooter"];
	$HakkimizdaMetniGorsel				=  $Metinler["HakkimizdaMetniGorsel"];
	$jumbotronBaslik					=  $Metinler["jumbotronBaslik"];
	$jumbotronMetin						=  $Metinler["jumbotronMetin"];
	$UyelikSozlesmesiMetni				=  $Metinler["UyelikSozlesmesiMetni"];
	$KullanimKosullariMetni   			=  $Metinler["KullanimKosullariMetni"];
	$GizlilikSozlesmesiMetni            =  $Metinler["GizlilikSozlesmesiMetni"];
	$MesafeliSatisSozlesmesiMetni       =  $Metinler["MesafeliSatisSozlesmesiMetni"];
}else{//echo "Site ayar sorgusu hatalı";//bu alan kapalı kalmalıdır.
	die();
}





if(isset($_SESSION["Kullanici"])){
	$KullaniciSorgusu		=	$VeritabaniBaglantisi->prepare("SELECT * FROM uyeler WHERE KullaniciAdi = ? LIMIT 1");
	$KullaniciSorgusu->execute([$_SESSION["Kullanici"]]);
	$KullaniciSayisi		=	$KullaniciSorgusu->rowCount();
	$Kullanici				=	$KullaniciSorgusu->fetch(PDO::FETCH_ASSOC);

	if($KullaniciSayisi>0){
		$KullaniciID		=	$Kullanici["K_id"];
		$KullaniciAd		=	$Kullanici["KullaniciAdi"];
		$EmailAdresi		=	$Kullanici["EmailAdresi"];
		$Sifre      		=	$Kullanici["Sifre"];
        $Ad	                =	$Kullanici["Ad"];
        $Soyad          	=	$Kullanici["Soyad"];
        //$DogumTarihi        =	$Kullanici["DogumTarihi"];
		$TelefonNumarasi    =	$Kullanici["TelefonNumarasi"];
		$KayitTarihi		=	$Kullanici["kayitTarih"];
	}else{
		//echo "Kullanıcı Sorgusu Hatalı"; // Bu alanı kapatın çünkü site hata yaparsa kullanıcılar hata değerini görmesin.
		die();
	}
}


if(isset($_SESSION["Sponsor"])){
	$SponsorSorgusu		=	$VeritabaniBaglantisi->prepare("SELECT * FROM sponsor WHERE EmailAdresi = ? LIMIT 1");
	$SponsorSorgusu->execute([$_SESSION["Sponsor"]]);
	$KullaniciSayisi		=	$SponsorSorgusu->rowCount();
	$Sponsor				=	$SponsorSorgusu->fetch(PDO::FETCH_ASSOC);

	if($KullaniciSayisi>0){
		$SponsorID			=	$Sponsor["S_id"];
		$FirmaAd			=	$Sponsor["FirmaAd"];
		$EmailAdresi		=	$Sponsor["EmailAdresi"];
		$Sifre      		=	$Sponsor["Sifre"];
		$TelefonNumarasi    =	$Sponsor["TelefonNumarasi"];
		$KayitTarihi		=	$Sponsor["kayitTarih"];
		$Sponsorİban		=	$Sponsor["iban"];
	}else{
		//echo "Kullanıcı Sorgusu Hatalı"; // Bu alanı kapatın çünkü site hata yaparsa kullanıcılar hata değerini görmesin.
		die();
	}
}

if(isset($_SESSION["admin"])){
	$AdminSorgusu		=	$VeritabaniBaglantisi->prepare("SELECT * FROM admin WHERE EmailAdresi = ? LIMIT 1");
	$AdminSorgusu->execute([$_SESSION["admin"]]);
	$AdminSayisi		=	$AdminSorgusu->rowCount();
	$Admin				=	$AdminSorgusu->fetch(PDO::FETCH_ASSOC);

	if($AdminSayisi>0){
		$adminId				=	$Admin["id"];
		$adminEmailAdresi		=	$Admin["EmailAdresi"];
		$adminsifre				=	$Admin["sifre"];
		$adminAdSoyad			=	$Admin["AdSoyad"];
		$adminTelefonNumarasi	=	$Admin["TelefonNumarasi"];
		$adminYetki				=	$Admin["yetki"];
		$adminLogo				=	$Admin["Gorsel"];
		$admin_vasif			=	$Admin["admin_vasif"];
		$admin_hakkinda			=	$Admin["admin_hakkinda"];
		$goster					=	$Admin["goster"];

	}else{
		//echo "Yönetici Sorgusu Hatalı"; // Bu alanı kapatın çünkü site hata yaparsa kullanıcılar hata değerini görmesin.
		die();
	}
}




?>