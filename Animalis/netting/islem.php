<?php include "baglan.php";

if(isset($_GET['urunsil']))
{	
	$komut2=$db->prepare("DELETE FROM encoksatanurun where Urun_ID=:id");
	$oku2=$komut2->execute(array("id"=>$_GET["urun_id"]));

	$komut=$db->prepare("DELETE FROM urunler where Urun_ID=:id");
	$oku=$komut->execute(array("id"=>$_GET["urun_id"]));
	
	if($oku)
    {
	   header("location:../urunlerim.php");
    }
    else
    {
	   header("location:../urunlerim.php");
    }

}

if(isset($_POST['urun_ekle']))
{
	try {
        session_start();
        $dosyaadi = $_FILES['UrunResim']['name'];
        $gecici = $_FILES['UrunResim']['tmp_name'];
        $klasor = "../img/".$dosyaadi;

        $ad = $_POST["UrunAd"];
        $miktar = $_POST["UrunMiktar"];
        $fiyat = $_POST["UrunFiyat"];
        $kategori = $_POST["UrunKategori"];
        $tur=$_POST["UrunTuru"];
        $aciklama=$_POST["UrunAciklama"];

        $sponsor =$_SESSION["Sponsor_ID"];

        $komut = $db->exec("INSERT INTO urunler(Sponsor_ID,Urun_Ad,Urun_Fiyat,Urun_Kategori,Urun_Tur,Urun_Miktar,Urun_Resim,Urun_Aciklama) VALUES('$sponsor','$ad','$fiyat','$kategori','$tur','$miktar','$klasor','$aciklama')");


        if(($komut) && (move_uploaded_file($gecici,$klasor))){
            header("Location:../urunekle.php?urunekle=on");  
        }
        else
        {
            header("Location:../urunekle.php?urunekle=off");
        }

    } 
    catch (Exception $e) 
    {
        echo "Hata Mesajı :".$e->getMessage();
	}
}


if(isset($_POST['urun_guncelle'])){
		$urun_id=$_POST["urun_id"];

	if(empty($_FILES['urun_resim']['tmp_name'])){
		$komut=$db->prepare("UPDATE urunler SET 

			Urun_Ad=:a,
			Urun_Fiyat=:b,
			Urun_Kategori=:c,
			Urun_Tur=:d,
			Urun_Miktar=:e,
			Urun_Aciklama=:g

			WHERE urun_id={$_POST["urun_id"]}");

		$oku=$komut->execute(array(
			'a'=>$_POST['urun_ad'],
			'b'=>$_POST['urun_fiyat'],
			'c'=>$_POST['urun_kategori'],
			'd'=>$_POST['urun_tur'],
			'e'=>$_POST['urun_miktar'],
			'g'=>$_POST['urun_aciklama']
		));	
	}else{
		$dosyaadi=$_FILES['urun_resim']['name'];
		$gecici=$_FILES['urun_resim']['tmp_name'];
		$klasor="../img/".$dosyaadi;

		$eskiResim=$_POST['urun_resim'];
		unlink("../img".$eskiResim);
		move_uploaded_file($tmp_name,"$dosyaadi");

		$komut=$db->prepare("UPDATE urunler SET 

			Urun_Ad=:a,
			Urun_Fiyat=:b,
			Urun_Kategori=:c,
			Urun_Tur=:d,
			Urun_Miktar=:e,
			Urun_Resim=:f,
			Urun_Aciklama=:g

			WHERE urun_id={$_POST["urun_id"]}");

		$oku=$komut->execute(array(
			'a'=>$_POST['urun_ad'],
			'b'=>$_POST['urun_fiyat'],
			'c'=>$_POST['urun_kategori'],
			'd'=>$_POST['urun_tur'],
			'e'=>$_POST['urun_miktar'],
			'f'=>$dosyaadi,
			'g'=>$_POST['urun_aciklama']
		));	
	}
		
		
}

if(($oku) && (move_uploaded_file($gecici,$klasor))){
	header("location:../urunlerim.php");
}
else{
	header("location:../urunlerim.php");
}



//SEPETE EKLEME

// Burada JS Koduna Dön Bi Bak.
if(isset($_POST['btn_sepeteEkle'])){
	session_start();

	$Kullanici_ID=$_SESSION["Kullanici_ID"];
	$UrunMiktar=$_POST['txt_miktar'];
	$Urun_ID=$_POST["Urun_ID"];


	$kontrol = $db->prepare("SELECT * FROM sepet WHERE Urun_ID=?");
    $kontrol->execute(array($Urun_ID)); 

    if($kontrol->rowCount()){  
        header("Location:../Urunler.php?sepeteEkle=off");
    }

    else{
		$komut = $db->prepare("INSERT INTO sepet set 
			Kullanici_ID=:kullanici_id,
			Urun_ID=:urun_id,
			Alim_Adet=:adet");
		$komut->execute(array(
			'kullanici_id'=>$Kullanici_ID,
			'urun_id'=>$Urun_ID,
			'adet'=>$UrunMiktar
		)); 
	
	if($komut){
		header("Location:../Urunler.php?sepeteEkle=on");
    }
    else
    {
        header("Location:../Urunler.php?sepeteEkle=off");
    }
    }
}

if(isset($_GET['sepetsil']))
{	
	$komut=$db->prepare("DELETE FROM sepet where Urun_ID=:id");
	$oku=$komut->execute(array("id"=>$_GET["sepet_id"]));
	
	if($oku)
    {
	   header("location:../Sepetim.php");
    }
    else
    {

	   header("location:../Sepetim.php");
    }
}

// Admin İşlemleri


?>
