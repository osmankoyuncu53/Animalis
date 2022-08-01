<?php
session_start();
require_once ("Ayarlar/ayar.php");
require_once ("Ayarlar/Fonksiyonlar.php");//güvenlik içindir.

if(isset($_POST["EmailAdresi"])){
	$GelenEmailAdresi		=	Guvenlik($_POST["EmailAdresi"]);
}else{
	$GelenEmailAdresi		=	"";
}
if(isset($_POST["Sifre"])){
	$GelenSifre				=	Guvenlik($_POST["Sifre"]);
}else{
	$GelenSifre				=	"";
}

$MD5liSifre					=	md5($GelenSifre);

if(($GelenEmailAdresi!="") and ($GelenSifre!="")){
	$KontrolSorgusu		=	$VeritabaniBaglantisi->prepare("SELECT * FROM sponsor WHERE EmailAdresi = ? AND Sifre = ? ");
	$KontrolSorgusu->execute([$GelenEmailAdresi, $MD5liSifre]);
	$SponsorSayisi	=	$KontrolSorgusu->rowCount();
	$SponsorKaydi		=	$KontrolSorgusu->fetch(PDO::FETCH_ASSOC);
	
	if($SponsorSayisi>0){
			$_SESSION["Sponsor"]	=	$GelenEmailAdresi;	
			$_SESSION["Sponsor_ID"]	=$SponsorKaydi['S_id'];	
			
			if($_SESSION["Sponsor"]==$GelenEmailAdresi){
				header("Location:index.php");//üye girisi dogruysa yönlendirilir.
				exit();
			}else{
				header("Location:KullaniciGirisHata.php");//üye giris sonucunda hata
				exit();
			}	
	}else{
		header("Location:SponsorGirisEksikBilgi.php");//eşleşen bir kayıt bulunamamıştır.
		exit();
	}
}else{
	header("Location:SponsorGirisEksikKalan.php");//eksik bir veri girişi vardır.
	exit();
}
?>