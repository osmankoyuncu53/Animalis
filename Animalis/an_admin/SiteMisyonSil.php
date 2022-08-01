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
        $MisyonYetkiSorgusu      = 	$VeritabaniBaglantisi->prepare("DELETE FROM misyonvisyon WHERE id = ? LIMIT 1 ");
        $MisyonYetkiSorgusu->execute([$GelenID]);
        $MisyonSilmeSayisi 	    = 	$MisyonYetkiSorgusu->rowCount(); 
        
        if($MisyonSilmeSayisi>0){
         header("Location:SiteMisyon.php");
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