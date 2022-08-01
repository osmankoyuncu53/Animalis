<?php 
 session_start();
    require_once ("Ayarlar/ayar.php");
    require_once ("Ayarlar/Fonksiyonlar.php");//güvenlik içindir.

     if(isset($_POST["KullaniciAdi"])){
            $GelenKullaniciAdi		=	Guvenlik($_POST["KullaniciAdi"]);
        }else{
            $GelenKullaniciAdi		=	"";
        }
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
        if(isset($_POST["SifreTekrar"])){
            $GelenSifreTekrar		=	Guvenlik($_POST["SifreTekrar"]);
        }else{
            $GelenSifreTekrar		=	"";
        }
        if(isset($_POST["Ad"])){
            $GelenAd		=	Guvenlik($_POST["Ad"]);
        }else{
            $GelenAd		=	"";
        }
        if(isset($_POST["Soyad"])){
            $GelenSoyad		=	Guvenlik($_POST["Soyad"]);
        }else{
            $GelenSoyad			=	"";
        }
        if(isset($_POST["TelefonNumarasi"])){
            $GelenTelefonNumarasi		=	Guvenlik($_POST["TelefonNumarasi"]);
        }else{
            $GelenTelefonNumarasi		=	"";
        }
        if(isset($_POST["DogumTarihi"])){
            $GelenDogumTarihi		=	Guvenlik($_POST["DogumTarihi"]);
        }else{
            $GelenDogumTarihi		=	"";
        }


        echo "". $GelenKullaniciAdi	."".$GelenEmailAdresi."".$GelenAd."".$GelenSoyad."".$GelenTelefonNumarasi."".$GelenDogumTarihi."".$GelenSifre."". $GelenSifreTekrar;



        ?>