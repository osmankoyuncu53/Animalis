<?php
session_start();
require_once ("Ayarlar/ayar.php");
require_once ("Ayarlar/Fonksiyonlar.php");//güvenlik içindir.
if(isset($_SESSION["Kullanici"])){

if(isset($_POST["Adsoyad"])){
	$GelenAdSoyad				=	Guvenlik($_POST["Adsoyad"]);
}else{
	$GelenAdSoyad				=	"";
}
if(isset($_POST["adres"])){
	$GelenAdres				=	Guvenlik($_POST["adres"]);
}else{
	$GelenAdres				=	"";
}
if(isset($_POST["ilce"])){
	$GelenIlce				=	Guvenlik($_POST["ilce"]);
}else{
	$GelenIlce				=	"";
}
if(isset($_POST["Sehir"])){
	$GelenSehir				=	Guvenlik($_POST["Sehir"]);
}else{
	$GelenSehir				=	"";
}
if(isset($_POST["TelefonNumarasi"])){
	$GelenTelefon				=	Guvenlik($_POST["TelefonNumarasi"]);
}else{
	$GelenTelefon				=	"";
}


if(($GelenAdSoyad!="") and ($GelenAdres!="") and ($GelenIlce!="") and ($GelenSehir!="") and ($GelenTelefon!="")){

    $AdresEklemeSorgusu		=	$VeritabaniBaglantisi->prepare("INSERT INTO adresler (k_id,ad_soyad,Adres,Ilce,Sehir,TelefonNumarasi) VALUES (?, ?, ?, ?, ?, ?)");
    $AdresEklemeSorgusu->execute([$KullaniciID,$GelenAdSoyad,$GelenAdres,$GelenIlce,$GelenSehir,$GelenTelefon]);
    $EklemeKontrol          = $AdresEklemeSorgusu->rowCount();


    if($EklemeKontrol>0){
            header("location:KullaniciProfil.php");
            exit();
    }else{
        header("location:Başarısız.php");
        exit();
    }
}else{
    header("location:hata.php");
            exit();
}


 }else{
	header("Location:KullaniciGirisEksikKalan.php");//eksik bir veri girişi vardır.
	exit();
}


?>