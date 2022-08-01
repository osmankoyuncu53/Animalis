<?php 
    session_start();
    require_once ("../Ayarlar/ayar.php");
    require_once ("../Ayarlar/Fonksiyonlar.php");    
?>

<?php
if(isset($_SESSION["admin"])){

    if(isset($_GET["ID"])){
        $GelenID	=	Guvenlik($_GET["ID"]);
    }else{
        $GelenID		=	"";
    }


    if($GelenID!=""){
        $AdminYetkiSorgusu      = 	$VeritabaniBaglantisi->prepare("DELETE FROM admin WHERE id = ? LIMIT 1 ");
        $AdminYetkiSorgusu->execute([$GelenID]);
        $AdresSilmeSayisi 	    = 	$AdminYetkiSorgusu->rowCount(); 
        
        if($AdresSilmeSayisi>0){
         header("Location:AdminKullanicilar.php");
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