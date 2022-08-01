<?php
    session_start();
    require_once ("../Ayarlar/ayar.php");
    require_once ("../Ayarlar/Fonksiyonlar.php");//güvenlik içindir.
    require_once ("../Framworks/Verot/src/class.upload.php");

if(isset($_SESSION["admin"])){


if(isset($_POST["MisyonBaslik"])){
	$GelenMisyonBaslik				=	Guvenlik($_POST["MisyonBaslik"]);
}else{
	$GelenMisyonBaslik			=	"";
}
if(isset($_POST["MisyonAciklama"])){
	$GelenMisyonAciklama				=	Guvenlik($_POST["MisyonAciklama"]);
}else{
	$GelenMisyonAciklama				=	"";
}


$GelenMisyonGorsel		= $_FILES["MisyonGorsel"];
$klasor="img/".$GelenMisyonGorsel["name"];



if(($GelenMisyonBaslik!="") and ($GelenMisyonAciklama!="")){


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
                }else{
                    header("Location:hata.php");
                    exit();
                } 
            }
    }

    $MisyonEklemeSorgusu		=	$VeritabaniBaglantisi->prepare("INSERT INTO misyonvisyon (MisyonBaslik,MisyonAciklama,MisyonGorsel) VALUES (?, ?,?)");
    $MisyonEklemeSorgusu->execute([$GelenMisyonBaslik, $GelenMisyonAciklama,$klasor]);
    $EklemeKontrol          = $MisyonEklemeSorgusu->rowCount();

    if($EklemeKontrol>0){
            header("location:SiteMisyon.php");
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