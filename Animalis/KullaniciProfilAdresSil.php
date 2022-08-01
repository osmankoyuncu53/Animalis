<?php 
    session_start();
    require_once ("Ayarlar/ayar.php");
    require_once ("Ayarlar/Fonksiyonlar.php");    
?>

<?php
if(isset($_SESSION["Kullanici"])){

    if(isset($_GET["ID"])){
        $GelenID	=	Guvenlik($_GET["ID"]);
    }else{
        $GelenID		=	"";
    }


    if($GelenID!=""){
        $AdresSilmeSorgusu      = 	$VeritabaniBaglantisi->prepare("DELETE FROM adresler WHERE id = ? LIMIT 1 ");
        $AdresSilmeSorgusu->execute([$GelenID]);
        $AdresSilmeSayisi 	    = 	$AdresSilmeSorgusu->rowCount(); 
        
        if($AdresSilmeSayisi>0){
         header("Location:KullaniciProfil.php");
         exit();
        }else{
            header("Location:silmeişlemiBaşarısız.php");
            exit();
        }
    }else{
        header("location:hata.php");
        exit();
    }
}else{
    header("location:index.php");
    exit();
}
?>