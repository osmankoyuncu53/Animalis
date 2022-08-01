<?php
session_start();
require_once ("Ayarlar/ayar.php");
require_once ("Ayarlar/Fonksiyonlar.php");//güvenlik içindir.

if(isset($_POST["KullaniciAdi"])){
	$GelenKullaniciAdi		=	Guvenlik($_POST["KullaniciAdi"]);
}else{
	$GelenKullaniciAdi		=	"";
}
if(isset($_POST["Sifre"])){
	$GelenSifre				=	Guvenlik($_POST["Sifre"]);
}else{
	$GelenSifre				=	"";
}

$MD5liSifre					=	md5($GelenSifre);

if(($GelenKullaniciAdi!="") and ($GelenSifre!="")){
	$KontrolSorgusu		=	$VeritabaniBaglantisi->prepare("SELECT * FROM uyeler WHERE KullaniciAdi = ? AND Sifre = ? ");
	$KontrolSorgusu->execute([$GelenKullaniciAdi, $MD5liSifre]);
	$KullaniciSayisi	=	$KontrolSorgusu->rowCount();
	$KullaniciKaydi		=	$KontrolSorgusu->fetch(PDO::FETCH_ASSOC);
	
	if($KullaniciSayisi>0){
			$_SESSION["Kullanici"]	=	$GelenKullaniciAdi;
			//Tunahan Genç Ekledi
			$_SESSION["Kullanici_ID"] = $KullaniciKaydi["K_id"];
			if($_SESSION["Kullanici"]==$GelenKullaniciAdi){
				header("Location:index.php");
				exit();
			}else{
				header("Location:KullaniciGirisHata.php");//üye giris sonucunda hata
				exit();
			}	
	}else{
		header("Location:KullaniciGirisEksikBilgi.php");//eşleşen bir kayıt bulunamamıştır.
		exit();
	}
}else{
	header("Location:KullaniciGirisEksikKalan.php");//eksik bir veri girişi vardır.
	exit();
}
?>