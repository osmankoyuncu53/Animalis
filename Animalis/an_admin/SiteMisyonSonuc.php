<?php 
    session_start();
    require_once ("../Ayarlar/ayar.php");
    require_once ("../Ayarlar/Fonksiyonlar.php");//güvenlik içindir.
    require_once ("../Framworks/Verot/src/class.upload.php");
    




    
    if(isset($_SESSION["admin"])){ 
      
        if(isset($_POST["MisyonBaslik"])){
            $GelenMisyonBaslik		=	Guvenlik($_POST["MisyonBaslik"]);
        }else{
            $GelenMisyonBaslik		=	"";
        }
        if(isset($_POST["MisyonAciklama"])){
            $GelenMisyonAciklama		=	Guvenlik($_POST["MisyonAciklama"]);
        }else{
            $GelenMisyonAciklama		=	"";
        }
        if(isset($_POST["id"])){
            $GelenID	=	Guvenlik($_POST["id"]);
        }else{
            $GelenID		=	"";
        }

        $GelenMisyonGorsel		= $_FILES["MisyonGorsel"];
        $klasor="img/".$GelenMisyonGorsel["name"];
        
    

        if(($GelenMisyonBaslik!="") and ($GelenMisyonAciklama!="") and ($GelenID!="") ) {


            

            if(($GelenMisyonGorsel["name"]!="") and ($GelenMisyonGorsel["type"]!="") and ($GelenMisyonGorsel["tmp_name"]!="") and ($GelenMisyonGorsel["error"]==0) and ($GelenMisyonGorsel["size"]>0)){
                $SiteAdminPp	=	new upload($GelenMisyonGorsel, "tr-TR");
                    if($SiteAdminPp->uploaded){
                        
                       $SiteAdminPp->mime_magic_check		=	true;
                       $SiteAdminPp->allowed				=	array("image/*");
                       $SiteAdminPp->image_quality			=	100;
                       $SiteAdminPp->image_background_color	=	null;
                       $SiteAdminPp->image_resize			=	true;
                       $SiteAdminPp->image_y				=	88;
                       $SiteAdminPp->image_x				=	88;
                       $SiteAdminPp->process($VerotIcinKlasorYolu);
                        
                        if($SiteAdminPp->processed){
                        $SiteAdminPp->clean();
                        $KontrolSorgusu		=	$VeritabaniBaglantisi->prepare("UPDATE misyonvisyon SET  MisyonGorsel= ? WHERE id=? LIMIT 1");
                        $KontrolSorgusu->execute([$klasor,$GelenID]);
                        }else{
                            header("Location:hata.php");
                            exit();
                        } 
                    }
            }


            $MisyonGuncelleme	=  $VeritabaniBaglantisi->prepare("UPDATE misyonvisyon  SET  MisyonBaslik = ?, MisyonAciklama = ?  WHERE id = ? LIMIT 1");
            $MisyonGuncelleme->execute([$GelenMisyonBaslik , $GelenMisyonAciklama,$GelenID]);
            $KayitKontrol		=	$MisyonGuncelleme->rowCount();

                header("Location:SiteMisyon.php");//Güncelleme Sonucu Gidilecek Sayfa.
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