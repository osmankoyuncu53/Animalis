<?php
ob_start();
session_start();
require_once('config.php');
include "../netting/baglan.php";

$token=$_POST['token'];
$siparis_no=$_GET['siparis_no'];


$request = new \Iyzipay\Request\RetrieveCheckoutFormRequest();
$request->setLocale(\Iyzipay\Model\Locale::TR);
$request->setConversationId("$siparis_no");
$request->setToken("$token");
$checkoutForm = \Iyzipay\Model\CheckoutForm::retrieve($request, Config::options());

//print_r($checkoutForm->getStatus());
echo $odeme_durum=$checkoutForm->getPaymentStatus();
echo "<br>";
$islem_no=$checkoutForm->getpaymentId();

if ($odeme_durum=="FAILURE") {
	
	echo "Başarısız Ödeme...";


} elseif ($odeme_durum=="SUCCESS") {
    echo $SESSION['Kullanici_ID'];
    $cek=$db->prepare("SELECT * FROM sepet WHERE Kullanici_ID=:id");
    $cek->execute(array("id"=>$_SESSION['Kullanici_ID']));
    while($oku_cek=$cek->fetch(PDO::FETCH_ASSOC)) { 
        $arttir = $db->prepare("INSERT INTO gecmissiparis set 
			Kullanici_ID=:kullanici_id,
			Urun_ID=:urun_id,
			Alim_Adet=:adet");
    	$arttir->execute(array(
    			'kullanici_id'=>$_SESSION['Kullanici_ID'],
    			'urun_id'=>$oku_cek['Urun_ID'],
    			'adet'=>$oku_cek['Alim_Adet']
    	)); 
    	
    	$kontrol = $db->prepare("SELECT * FROM satis WHERE Urun_ID=?");
        $kontrol->execute(array($Urun_ID)); 
     
        if($kontrol->rowCount()){  
        	$arttir=$db->prepare("UPDATE satis SET 
                Urun_ID=:urun_id,
    			Kullanici_ID=:kullanici_id,
    			adet=:UrunAdet+adet
    			
    			WHERE Kullanici_ID={$_SESSION['Kullanici_ID']}");
    
    		$oku_arttir=$arttir->execute(array(
    			'urun_id'=>$oku_cek['Urun_ID'],
    			'kullanici_id'=>$_SESSION['Kullanici_ID'],
    			'UrunAdet'=>$oku_cek['Alim_Adet']
    	));	
        }
        else{
        	$ekle = $db->prepare("INSERT INTO satis set 
    			Urun_ID=:urun_id,
    			Kullanici_ID=:kullanici_id,
    			adet=:UrunAdet
    		");
    		$ekle->execute(array(
    			'urun_id'=>$oku_cek['Urun_ID'],
    			'kullanici_id'=>$_SESSION['Kullanici_ID'],
    			'UrunAdet'=>$oku_cek['Alim_Adet']
    	)); 
        }
    }
    
    $komut=$db->prepare("DELETE FROM sepet where Kullanici_ID=:id");
	$komut->execute(array("id"=>$_SESSION['Kullanici_ID']));

    
    header("Location:../index.php?durum=ok");
}
?>
