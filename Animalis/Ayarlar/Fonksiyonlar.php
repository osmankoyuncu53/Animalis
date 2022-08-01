<?php

$IPAdresi				=	$_SERVER["REMOTE_ADDR"];
$ZamanDamgasi			=	time();
$TarihSaat				=	date("d.m.Y", $ZamanDamgasi);
$SiteKokDizini			=	$_SERVER["DOCUMENT_ROOT"];
$ResimKlasoruYolu		=	"/Animalis/img/";
$VerotIcinKlasorYolu	=	$SiteKokDizini.$ResimKlasoruYolu;


//zaman damgasını dönüştürür.
function TarihBul($Deger){
	$Cevir				=	date("d.m.Y", $Deger);
	$Sonuc				=	$Cevir;
	return $Sonuc;
}

function UcGunIleriTarihBul(){
	global $ZamanDamgasi;
	$BirGun				=	86400;
	$Hesapla			=	$ZamanDamgasi+(3*$BirGun);
	$Cevir				=	date("d.m.Y", $Hesapla);
	$Sonuc				=	$Cevir;
	return $Sonuc;
}

function SifreDonustur($Gelensifre,$Deger){
	password_verify($Gelensifre,$Deger);
}


function RakamlarHaricTumKarakterleriSil($Deger){
	$Islem				=	preg_replace("/[^0-9]/", "", $Deger);
	$Sonuc				=	$Islem;
	return $Sonuc;
}

function TumBosluklariSil($Deger){
	$Islem				=	preg_replace("/\s|&nbsp;/", "", $Deger);
	$Sonuc				=	$Islem;
	return $Sonuc;
}

function DonusumleriGeriDondur($Deger){
	$GeriDondur			=	htmlspecialchars_decode($Deger, ENT_QUOTES);//etkisiz hale getirilen degerleri etkili hale geri döndür.
	$Sonuc				=	$GeriDondur;
	return $Sonuc;
}

function Guvenlik($Deger){
	$BoslukSil			=	trim($Deger);
	$TaglariTemizle		=	strip_tags($BoslukSil);
	$EtkisizYap			=	htmlspecialchars($TaglariTemizle, ENT_QUOTES);
	$Sonuc				=	$EtkisizYap;
	return $Sonuc;
}



function ResimAdiOlustur(){
	$Sonuc			=	substr(md5(uniqid(time())), 0, 25);
	return $Sonuc;
}

?>