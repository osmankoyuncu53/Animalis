<?php 
    session_start();
    require_once ("../Ayarlar/ayar.php");
    require_once ("../Ayarlar/Fonksiyonlar.php");//güvenlik içindir.
    require_once ("../Framworks/Verot/src/class.upload.php");

    if(isset($_SESSION["admin"])){ 

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
        if(isset($_POST["sifreTekrar"])){
            $GelenSifreTekrar	=	Guvenlik($_POST["sifreTekrar"]);
        }else{
            $GelenSifreTekrar		=	"";
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
        if(isset($_POST["admin_vasif"])){
            $GelenAdminVasif		=	Guvenlik($_POST["admin_vasif"]);
        }else{
            $GelenAdminVasif		=	"";
        }
        if(isset($_POST["admin_hakkinda"])){
            $GelenAdminHakkinda		=	Guvenlik($_POST["admin_hakkinda"]);
        }else{
            $GelenAdminHakkinda		=	"";
        }
        if(isset($_POST["goster"])){
            $GelenAdminGoster		=	Guvenlik($_POST["goster"]);
        }else{
            $GelenAdminGoster	=	"";
        }

        $GelenAdminPp		=  $_FILES["Gorsel"];
        $klasor="img/".$GelenAdminPp["name"];
        $MD5liSifre			=	md5($GelenSifre);


        if( (($GelenSifre!="") and ($GelenSifreTekrar!="") and $GelenAdSoyad!="") and ($GelenEmailAdres!="")  and ($GelenYetki!="") and ($GelenTelefonNumarasi!="") and ($GelenAdminVasif!="")and ($GelenAdminHakkinda!="") and ($GelenAdminGoster!="")){
            if($GelenSifre!=$GelenSifreTekrar){
                header("Location:KullaniciProfilUyusmayanSifre.php");//şifre ve şifre tekrarı uyuşmuyorsa.
                exit();
            }else{
                if($GelenSifre=="EskiSifre"){
                    $SifreDegistirmeDurumu  =   0;
                }else{
                    $SifreDegistirmeDurumu  =   1;
                }

                if($adminEmailAdresi != $GelenEmailAdres){
                    $KontrolSorgusu		=	$VeritabaniBaglantisi->prepare("SELECT * FROM admin WHERE EmailAdresi = ?");
                    $KontrolSorgusu->execute([$GelenEmailAdres]);
                    $KullaniciSayisi	=	$KontrolSorgusu->rowCount();
                    
                    if($KullaniciSayisi>0){
                        header("Location:KullaniciProfilTekrarlanan.php");//Kullanıcı bilgileri tekrar ediyorsa hata verir.
                        exit();
                    }
                }

                if(($GelenAdminPp["name"]!="") and ($GelenAdminPp["type"]!="") and ($GelenAdminPp["tmp_name"]!="") and ($GelenAdminPp["error"]==0) and ($GelenAdminPp["size"]>0)){
                    $SiteAdminPp	=	new upload($GelenAdminPp, "tr-TR");
                        if($SiteAdminPp->uploaded){
                            
                           $SiteAdminPp->mime_magic_check		=	true;
                           $SiteAdminPp->allowed				=	array("image/*");
                           /*$SiteAdminPp->file_new_name_body		=	"AdminPp";*/
                          /* $SiteAdminPp->file_overwrite			=	true;*/
                         /*  $SiteAdminPp->image_convert			=	"png";*/
                           $SiteAdminPp->image_quality			=	100;
                           $SiteAdminPp->image_background_color	=	null;
                           $SiteAdminPp->image_resize			=	true;
                           $SiteAdminPp->image_y				=	88;
                           $SiteAdminPp->image_x				=	88;
                           $SiteAdminPp->process($VerotIcinKlasorYolu);
                            
                            if($SiteAdminPp->processed){
                            $SiteAdminPp->clean();
                            $KontrolSorgusu		=	$VeritabaniBaglantisi->prepare("UPDATE admin SET  Gorsel= ? WHERE id=? LIMIT 1");
                            $KontrolSorgusu->execute([$klasor,$adminId]);
                            
                            }else{
                                header("Location:hata.php");
                                exit();
                            } 
                        }
                }


                if($SifreDegistirmeDurumu == 1){
                    $AdminGuncelleme	=  $VeritabaniBaglantisi->prepare("UPDATE admin  SET EmailAdresi = ? , AdSoyad = ?, sifre = ? , yetki = ?,  TelefonNumarasi = ?, admin_vasif=? ,admin_hakkinda=? ,goster=?  WHERE id = ? LIMIT 1");
                    $AdminGuncelleme->execute([$GelenEmailAdres, $GelenAdSoyad , $MD5liSifre, $GelenYetki, $GelenTelefonNumarasi,$GelenAdminVasif,$GelenAdminHakkinda,$GelenAdminGoster, $adminId	]);
                    
                }else{
                    $AdminGuncelleme	=  $VeritabaniBaglantisi->prepare("UPDATE admin  SET EmailAdresi = ? , AdSoyad = ?, yetki = ?, TelefonNumarasi = ? ,admin_vasif=? ,admin_hakkinda=? ,goster=?  WHERE id = ? LIMIT 1");
                    $AdminGuncelleme->execute([$GelenEmailAdres, $GelenAdSoyad ,$GelenYetki, $GelenTelefonNumarasi,$GelenAdminVasif,$GelenAdminHakkinda,$GelenAdminGoster ,$adminId]);
                }
                $KayitKontrol		=	$AdminGuncelleme->rowCount();

                

				
                if($KayitKontrol>0){
                    $_SESSION["admin"] = $GelenEmailAdres;

				    header("Location:AdminProfil.php");//Güncelleme Sonucu Gidilecek Sayfa.
				    exit();	
				}else{
					header("Location:AdminProfil.php");//GÜNCELLEMEDE HATA VARDIR.
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