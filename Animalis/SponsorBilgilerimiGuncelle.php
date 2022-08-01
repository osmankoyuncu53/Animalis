<?php 
    session_start();
    require_once ("Ayarlar/ayar.php");
    require_once ("Ayarlar/Fonksiyonlar.php");//güvenlik içindir.

    if(isset($_SESSION["Sponsor"])){ 

     if(isset($_POST["EmailAdresi"])){
            $GelenEmailAdres		=	Guvenlik($_POST["EmailAdresi"]);
        }else{
            $GelenEmailAdres		=	"";
        }
      if(isset($_POST["FirmaAd"])){
            $GelenFirmaAd		=	Guvenlik($_POST["FirmaAd"]);
        }else{
            $GelenFirmaAd		=	"";
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
        if(isset($_POST["Sponsorİban"])){
            $Gelenİban		=	Guvenlik($_POST["Sponsorİban"]);
        }else{
            $Gelenİban		=	"";
        }
        if(isset($_POST["TelefonNumarasi"])){
            $GelenTelefonNumarasi		=	Guvenlik($_POST["TelefonNumarasi"]);
        }else{
            $GelenTelefonNumarasi		=	"";
        }

        $MD5liSifre				=	md5($GelenSifre);


        if( (($GelenSifre!="") and ($GelenSifreTekrar!="") and $GelenFirmaAd!="") and ($GelenEmailAdres!="")  and ($Gelenİban!="") and ($GelenTelefonNumarasi!="")){
            if($GelenSifre!=$GelenSifreTekrar){
                header("Location:KullaniciProfilUyusmayanSifre.php");//şifre ve şifre tekrarı uyuşmuyorsa.
                exit();
            }else{
                if($GelenSifre=="EskiSifre"){
                    $SifreDegistirmeDurumu  =   0;
                }else{
                    $SifreDegistirmeDurumu  =   1;
                }

                if($EmailAdresi != $GelenEmailAdres){
                    $KontrolSorgusu		=	$VeritabaniBaglantisi->prepare("SELECT * FROM sponsor WHERE EmailAdresi = ?");
                    $KontrolSorgusu->execute([$GelenEmailAdres]);
                    $KullaniciSayisi	=	$KontrolSorgusu->rowCount();
                    
                    if($KullaniciSayisi>0){
                        header("Location:KullaniciProfilTekrarlanan.php");//Kullanıcı bilgileri tekrar ediyorsa hata verir.
                        exit();
                    }
                }

                if($SifreDegistirmeDurumu == 1){
                    $KullaniciGuncelleme	=  $VeritabaniBaglantisi->prepare("UPDATE sponsor  SET EmailAdresi = ? , FirmaAd = ?, Sifre = ? , iban = ?,  TelefonNumarasi = ?  WHERE S_id = ? LIMIT 1");
                    $KullaniciGuncelleme->execute([$GelenEmailAdres, $GelenFirmaAd , $MD5liSifre, $Gelenİban, $GelenTelefonNumarasi, $SponsorID]);
                }else{
                    $KullaniciGuncelleme	=  $VeritabaniBaglantisi->prepare("UPDATE sponsor  SET EmailAdresi = ? , FirmaAd = ?, iban = ?,  TelefonNumarasi = ?  WHERE S_id = ? LIMIT 1");
                    $KullaniciGuncelleme->execute([$GelenEmailAdres, $GelenFirmaAd ,$Gelenİban, $GelenTelefonNumarasi, $SponsorID]);
                }
                $KayitKontrol		=	$KullaniciGuncelleme->rowCount();

				
                if($KayitKontrol>0){
                    $_SESSION["Sponsor"] = $GelenEmailAdres;

				    header("Location:sponsorProfil.php");//Güncelleme Sonucu Gidilecek Sayfa.
				    exit();	
				}else{
					header("Location:KullaniciProfilGuncelemeHata.php");//GÜNCELLEMEDE HATA VARDIR.
					exit();
				}
		}
    }else{
	    header("Location:KullaniciProfilEksikVeri.php");//Eksik Veri Girişi
	    exit();
    }
 }else {
    header("location:index.php");
    exit();
    }
    ?>