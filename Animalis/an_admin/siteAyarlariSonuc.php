<?php 
    session_start();
    require_once ("../Ayarlar/ayar.php");
    require_once ("../Ayarlar/Fonksiyonlar.php");//güvenlik içindir.
    require_once ("../Framworks/Verot/src/class.upload.php");
    

    if(isset($_SESSION["admin"])){ 

     if(isset($_POST["SiteTitle"])){
            $GelenSiteTitle		=	Guvenlik($_POST["SiteTitle"]);
        }else{
            $GelenSiteTitle		=	"";
        }
        if(isset($_POST["SiteDescription"])){
            $GelenSiteDescription		=	Guvenlik($_POST["SiteDescription"]);
        }else{
            $GelenSiteDescription		=	"";
        }
        if(isset($_POST["SiteKeywords"])){
            $GelenSiteKeywords		=	Guvenlik($_POST["SiteKeywords"]);
        }else{
            $GelenSiteKeywords		=	"";
        }
        if(isset($_POST["SiteCopyrightMetni"])){
            $GelenSiteCopyrightMetni		=	Guvenlik($_POST["SiteCopyrightMetni"]);
        }else{
            $GelenSiteCopyrightMetni		=	"";
        }
        if(isset($_POST["SiteEmailAdresi"])){
            $GelenSiteEmailAdresi		=	Guvenlik($_POST["SiteEmailAdresi"]);
        }else{
            $GelenSiteEmailAdresi		=	"";
        }
        if(isset($_POST["SiteEmailSifresi"])){
            $GelenSiteEmailSifresi		=	Guvenlik($_POST["SiteEmailSifresi"]);
        }else{
            $GelenSiteEmailSifresi		=	"";
        }
        if(isset($_POST["SiteAdres"])){
            $GelenSiteAdres		=	Guvenlik($_POST["SiteAdres"]);
        }else{
            $GelenSiteAdres		=	"";
        } 
        if(isset($_POST["SiteTelefon"])){
            $GelenSiteTelefon		=	Guvenlik($_POST["SiteTelefon"]);
        }else{
            $GelenSiteTelefon		=	"";
        } 


        $GelenSiteLogosu		= $_FILES["SiteLogo"];
        $GelenFavicon           = $_FILES["Favicon"];
        $GelenSiteReklam        = $_FILES["SiteReklam"];

        

        if(($GelenSiteTitle!="") and ($GelenSiteDescription!="") and ($GelenSiteKeywords!="") and ($GelenSiteCopyrightMetni!="") and ($GelenSiteEmailAdresi!="") and ($GelenSiteEmailSifresi!="") and ($GelenSiteAdres!="") and ($GelenSiteTelefon!="")) {

            $AyarlariGuncelle    = 	$VeritabaniBaglantisi->prepare("UPDATE ayarlar SET SiteTitle=?, SiteDescription=?, SiteKeywords=?, SiteCopyrightMetni=?, SiteEmailAdresi=?, SiteEmailSifresi=?, SiteAdres=?,  SiteTelefon=?");
            $AyarlariGuncelle->execute([$GelenSiteTitle,$GelenSiteDescription,$GelenSiteKeywords,$GelenSiteCopyrightMetni,$GelenSiteEmailAdresi,$GelenSiteEmailSifresi,$GelenSiteAdres,$GelenSiteTelefon]);
            $GuncellemeSayisi 	 = 	$AyarlariGuncelle->rowCount(); 
            
    
            
            if(($GelenSiteLogosu["name"]!="") and ($GelenSiteLogosu["type"]!="") and ($GelenSiteLogosu["tmp_name"]!="") and ($GelenSiteLogosu["error"]==0) and ($GelenSiteLogosu["size"]>0)){
                $SiteLogosuYukle	=	new upload($GelenSiteLogosu, "tr-TR");
                    if($SiteLogosuYukle->uploaded){
                        
                       $SiteLogosuYukle->mime_magic_check		=	true;
                       $SiteLogosuYukle->allowed				=	array("image/*");
                       $SiteLogosuYukle->file_new_name_body		=	"Logo";
                       $SiteLogosuYukle->file_overwrite			=	true;
                       $SiteLogosuYukle->image_convert			=	"png";
                       $SiteLogosuYukle->image_quality			=	100;
                       $SiteLogosuYukle->image_background_color	=	null;
                       $SiteLogosuYukle->image_resize			=	true;
                       $SiteLogosuYukle->image_y				=	30;
                       $SiteLogosuYukle->image_x				=	150;
                       $SiteLogosuYukle->process($VerotIcinKlasorYolu);
                        
                        if($SiteLogosuYukle->processed){
                            $SiteLogosuYukle->clean();
                        }else{
                            header("Location:hata.php");
                            exit();
                        } 
                    }
            }
            if(($GelenFavicon["name"]!="") and ($GelenFavicon["type"]!="") and ($GelenFavicon["tmp_name"]!="") and ($GelenFavicon["error"]==0) and ($GelenFavicon["size"]>0)){
                $SitefaviconYukle	=	new upload($GelenFavicon, "tr-TR");
                    if($SitefaviconYukle->uploaded){
                        
                       $SitefaviconYukle->mime_magic_check		=	true;
                       $SitefaviconYukle->allowed				=	array("image/*");
                       $SitefaviconYukle->file_new_name_body		=	"Favicon";
                       $SitefaviconYukle->file_overwrite			=	true;
                       $SitefaviconYukle->image_convert			=	"png";
                       $SitefaviconYukle->image_quality			=	100;
                       $SitefaviconYukle->image_background_color	=	null;
                       $SitefaviconYukle->image_resize			=	true;
                       $SitefaviconYukle->image_y				=	32;
                       $SitefaviconYukle->image_x				=	32;
                       $SitefaviconYukle->process($VerotIcinKlasorYolu);
                        
                        if($SitefaviconYukle->processed){
                            $SitefaviconYukle->clean();
                        }else{
                            header("Location:hata.php");
                            exit();
                        } 
                    }
            }
            if(($GelenSiteReklam["name"]!="") and ($GelenSiteReklam["type"]!="") and ($GelenSiteReklam["tmp_name"]!="") and ($GelenSiteReklam["error"]==0) and ($GelenSiteReklam["size"]>0)){
                $SiteReklam	=	new upload($GelenSiteReklam, "tr-TR");
                    if($SiteReklam->uploaded){
                        
                       $SiteReklam->mime_magic_check		=	true;
                       $SiteReklam->allowed				    =	array("image/*");
                       $SiteReklam->file_new_name_body		=	"reklam";
                       $SiteReklam->file_overwrite			=	true;
                       $SiteReklam->image_convert			=	"png";
                       $SiteReklam->image_quality			=	100;
                       $SiteReklam->image_background_color	=	null;
                       $SiteReklam->image_resize			=	true;
                       $SiteReklam->image_y				=	139;
                       $SiteReklam->image_x				=	991;
                       $SiteReklam->process($VerotIcinKlasorYolu);
                        
                        if($SiteReklam->processed){
                            $SiteReklam->clean();
                        }else{
                            header("Location:hata.php");
                            exit();
                        } 
                    }
            }

            header("Location:siteAyarlari.php");//Eksik Veri Girişi
            exit();
    }else{
	    header("Location:KullaniciProfilEksikVeri.php");//Eksik Veri Girişi
	    exit();
    }
 }else {
    header("location:index.php");
    exit();
    }
    ?>