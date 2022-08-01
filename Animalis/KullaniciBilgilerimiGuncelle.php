<?php 
    session_start();
    require_once ("Ayarlar/ayar.php");
    require_once ("Ayarlar/Fonksiyonlar.php");//güvenlik içindir.

    if(isset($_SESSION["Kullanici"])){ 

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
            $GelenSoyad		=	"";
        }
        if(isset($_POST["TelefonNumarasi"])){
            $GelenTelefonNumarasi		=	Guvenlik($_POST["TelefonNumarasi"]);
        }else{
            $GelenTelefonNumarasi		=	"";
        }
       

        $MD5liSifre				=	md5($GelenSifre);


        if( (($GelenSifre!="") and ($GelenSifreTekrar!="") and $GelenKullaniciAdi!="") and ($GelenEmailAdresi!="") and ($GelenAd!="") and ($GelenSoyad!="") and ($GelenTelefonNumarasi!="")){
            if($GelenSifre!=$GelenSifreTekrar){
                header("Location:KullaniciProfilUyusmayanSifre.php");//şifre ve şifre tekrarı uyuşmuyorsa.
                exit();
            }else{
                if($GelenSifre=="EskiSifre"){
                    $SifreDegistirmeDurumu  =   0;
                }else{
                    $SifreDegistirmeDurumu  =   1;
                }

                if($KullaniciAd != $GelenKullaniciAdi){
                    $KontrolSorgusu		=	$VeritabaniBaglantisi->prepare("SELECT * FROM uyeler WHERE KullaniciAdi = ?");
                    $KontrolSorgusu->execute([$GelenKullaniciAdi]);
                    $KullaniciSayisi	=	$KontrolSorgusu->rowCount();
                    
                    if($KullaniciSayisi>0){
                        header("Location:KullaniciProfilTekrarlanan.php");//Kullanıcı bilgileri tekrar ediyorsa hata verir.
                        exit();
                    }
                }

                if($SifreDegistirmeDurumu == 1){
                    $KullaniciGuncelleme	=  $VeritabaniBaglantisi->prepare("UPDATE uyeler  SET KullaniciAdi = ? , EmailAdresi = ?, Sifre = ? ,  Ad = ? , Soyad = ?, TelefonNumarasi = ?  WHERE K_id = ? LIMIT 1");
                    $KullaniciGuncelleme->execute([$GelenKullaniciAdi, $GelenEmailAdresi , $MD5liSifre, $GelenAd, $GelenSoyad,  $GelenTelefonNumarasi, $KullaniciID]);
                }else{
                    $KullaniciGuncelleme	=  $VeritabaniBaglantisi->prepare("UPDATE uyeler  SET KullaniciAdi = ? , EmailAdresi = ?, Ad = ? , Soyad = ?, TelefonNumarasi = ? WHERE K_id= ? LIMIT 1");
                    $KullaniciGuncelleme->execute([$GelenKullaniciAdi,$GelenEmailAdresi,$GelenAd,$GelenSoyad,$GelenTelefonNumarasi,$KullaniciID]);
                }
                $KayitKontrol		=	$KullaniciGuncelleme->rowCount();

				
                if($KayitKontrol>0){
                    $_SESSION["Kullanici"] = $GelenKullaniciAdi;

				    header("Location:KullaniciProfil.php");//Güncelleme Sonucu Gidilecek Sayfa.
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