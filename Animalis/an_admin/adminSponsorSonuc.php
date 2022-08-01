<?php  
include "../netting/baglan.php";

if(isset($_GET['talepsil']))
{	
	$komut=$db->prepare("DELETE FROM sponsoronay where onay_id=:id");
	$oku=$komut->execute(array("id"=>$_GET["onay_id"]));
	
	if($oku)
    {
	   header("Location:AdminSponsorKabul.php?talepsil=on"); 
    }
    else
    {
       ?>
       <script type="text/javascript">
       	alert("Silme İşlemi Başarısız...");
       </script>
       <?php
	   header("Location:AdminSponsorKabul.php?talepsil=off"); 
    }
}



if(isset($_POST['talepekle']))
{
	$bos =" ";
	$zamanDamgasi=time();

	$komut=$db->prepare("SELECT * FROM sponsoronay WHERE onay_id=:id");
    $komut->execute(array('id'=>$_GET['onay_id']));
    $oku=$komut->fetch(PDO::FETCH_ASSOC);

    $Email=$oku['EmailAdresi'];
    $FirmaAd=$oku['FirmaAd'];
    $Sifre=$oku['Sifre'];	

    $kontrol = $db->prepare("SELECT * FROM sponsor WHERE EmailAdresi=?");
    $kontrol->execute(array($oku['EmailAdresi'])); 

    if($kontrol->rowCount()){  
        ?>
        <script type="text/javascript">
        	alert("Bu Maile Ait Bir Sponsor Mevcut...");
        </script>
        <?php
        header("Location:AdminSponsorKabul.php?talepekle=off");  
    }

    else{
    $sponsorEkle = $db->exec("INSERT INTO sponsor(EmailAdresi,FirmaAd,Sifre,TelefonNumarasi,iban,kayitTarih) VALUES('$Email','$FirmaAd','$Sifre','$bos','$bos','$zamanDamgasi')");

    $sponsoronaySil=$db->prepare("DELETE FROM sponsoronay WHERE onay_id=:id");
	$sponsoronayOku=$sponsoronaySil->execute(array("id"=>$_GET["onay_id"]));

    if($sponsoronayOku){
    	header("Location:AdminSponsorKabul.php?talepekle=on");
    }
    else
    {
        header("Location:AdminSponsorKabul.php?talepekle=off");
    }
    }
	
}	


?>