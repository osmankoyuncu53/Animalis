<?php
require_once ("../Ayarlar/ayar.php");
require_once ("../Ayarlar/Fonksiyonlar.php");//güvenlik içindir.
include "../netting/islem.php";


if(isset($_POST["AdSoyad"])){
	$GelenAdSoyad		=	Guvenlik($_POST["AdSoyad"]);
}else{
	$GelenAdSoyad		=	"";
}
if(isset($_POST["mail"])){
	$GelenEmailAdres		=	Guvenlik($_POST["mail"]);
}else{
	$GelenEmailAdres		=	"";
}
if(isset($_POST["sifre"])){
	$GelenSifre				=	Guvenlik($_POST["sifre"]);
}else{
	$GelenSifre				=	"";
}
if(isset($_POST["telefon"])){
	$GelenTelefonNumarasi		=	Guvenlik($_POST["telefon"]);
}else{
	$GelenTelefonNumarasi		=	"";
}
if(isset($_POST["yetki"])){
	$GelenYetki		=	Guvenlik($_POST["yetki"]);
}else{
	$GelenYetki		=	"";
}

$MD5liSifre				=	md5($GelenSifre);


if(isset($_POST['gonder'])and ($GelenEmailAdres!="") and ($GelenSifre!="") and ($GelenAdSoyad!="") and ($GelenTelefonNumarasi!="") and ($GelenYetki!="")){

	$kontrol = $db->prepare("SELECT * FROM admin WHERE EmailAdresi=?");
    $kontrol->execute(array($GelenEmailAdres)); 

    if($kontrol->rowCount()){  
       header("Location:AdminYetkiVer.php?gonder=off");  
    }

    else{
    $bos=" ";
    $varsayilan=0;
    $adminEkle = $db->exec("INSERT INTO admin(EmailAdresi,sifre,AdSoyad,TelefonNumarasi,Gorsel,yetki,admin_vasif,admin_hakkinda,goster) VALUES('$GelenEmailAdres','$MD5liSifre','$GelenAdSoyad','$GelenTelefonNumarasi','$bos','$GelenYetki','$bos','$bos','$varsayilan')");

    if($adminEkle){
        header("Location:AdminKullanicilar.php?gonder=on");
    }
    else
    {
        header("Location:AdminYetkiVer.php?gonder=off");
    }
    }
}



?>

