<?php
session_start();
require_once ("../Ayarlar/ayar.php");
require_once ("../Ayarlar/Fonksiyonlar.php");//güvenlik içindir.

if(isset($_POST["AdminEmail"])){
	$GelenEmailAdresi		=	Guvenlik($_POST["AdminEmail"]);
}else{
	$GelenEmailAdresi		=	"";
}
if(isset($_POST["AdminSifre"])){
	$GelenSifre				=	Guvenlik($_POST["AdminSifre"]);
}else{
	$GelenSifre				=	"";
}

$MD5liSifre					=	md5($GelenSifre);

if(($GelenEmailAdresi!="") and ($GelenSifre!="")){
	$KontrolSorgusu		=	$VeritabaniBaglantisi->prepare("SELECT * FROM ADMİN WHERE EmailAdresi = ? AND sifre = ? ");
	$KontrolSorgusu->execute([$GelenEmailAdresi, $MD5liSifre]);
	$KullaniciSayisi	=	$KontrolSorgusu->rowCount();
	$KullaniciKaydi		=	$KontrolSorgusu->fetch(PDO::FETCH_ASSOC);
	
	if($KullaniciSayisi>0){
			$_SESSION["admin"]	=	$GelenEmailAdresi;
			if($_SESSION["admin"]==$GelenEmailAdresi){
				header("Location:admin.php");
				exit();
			}else{
				header("Location:KullaniciGirisHata.php");//üye giris sonucunda hata
				exit();
			}	
	}else{
		header("Location:index.php");//eşleşen bir kayıt bulunamamıştır.
		exit();
	}
}else{
	header("Location:index.php");//eksik bir veri girişi vardır.
	exit();
}
?>