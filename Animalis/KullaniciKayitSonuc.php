<?php
require_once ("Ayarlar/ayar.php");
require_once ("Ayarlar/Fonksiyonlar.php");//güvenlik içindir.


if(isset($_POST["EmailAdresi"])){
	$GelenEmailAdresi		=	Guvenlik($_POST["EmailAdresi"]);
}else{
	$GelenEmailAdresi		=	"";
}
if(isset($_POST["Sifre"])){
	$GelenSifre				=	Guvenlik($_POST["Sifre"]);
}else{
	$GelenSifre				=	"";
}
if(isset($_POST["SifreTekrar"])){
	$GelenSifreTekrar		=	Guvenlik($_POST["SifreTekrar"]);
}else{
	$GelenSifreTekrar		=	"";
}
if(isset($_POST["KullaniciAdi"])){
	$GelenKullaniciAdi		=	Guvenlik($_POST["KullaniciAdi"]);
}else{
	$GelenKullaniciAdi		=	"";
}
if(isset($_POST["SozlesmeOnay"])){
	$GelenSozlesmeOnay		=	Guvenlik($_POST["SozlesmeOnay"]);
}else{
	$GelenSozlesmeOnay		=	"";
}

$bos = " ";
$MD5liSifre				=	md5($GelenSifre);
$ZamanDamgasi			=	time();

if(($GelenEmailAdresi!="") and ($GelenSifre!="") and ($GelenSifreTekrar!="") and ($GelenKullaniciAdi!="") and ($GelenSozlesmeOnay!="")){
	if($GelenSozlesmeOnay==0){//eğer sözleşme onaylanmadıysa.
		header("Location:index.php");//sözleşme onaylanmadı sayfası
		exit();
	}else{
		if($GelenSifre!=$GelenSifreTekrar){//şifre ve şifre tekrarı uyuşmuyorsa.
			header("Location:KullaniciKayitUyusmayanSifre.php");
			exit();
		}else{//eğer kullanici adi bir başkası tarafından kullanılıyorsa tekrarlanan kayıt sayfasına gönderilir.
			$KontrolSorgusu		=	$VeritabaniBaglantisi->prepare("SELECT * FROM uyeler WHERE KullaniciAdi = ?");
			$KontrolSorgusu->execute([$GelenKullaniciAdi]);
			$KullaniciSayisi	=	$KontrolSorgusu->rowCount();
			
			if($KullaniciSayisi>0){//eğer uye kayıt  tekrarlanıyorsa.
				header("Location:KullaniciKayitTekrar.php");
				exit();
			}else{
				$UyeEklemeSorgusu	=  $VeritabaniBaglantisi->prepare("INSERT INTO uyeler (KullaniciAdi,EmailAdresi,Sifre,Ad,Soyad,TelefonNumarasi,kayitTarih) values ( ?, ?, ?, ?, ?, ?, ?)");
				$UyeEklemeSorgusu->execute([$GelenKullaniciAdi,$GelenEmailAdresi,$MD5liSifre,$bos,$bos,$bos,$ZamanDamgasi]);
				$KayitKontrol		=	$UyeEklemeSorgusu->rowCount();
				
				if($KayitKontrol>0){
                    try{
						header("Location:KullaniciGiris.php");//TEBRİKLER. Yeni Üye Kaydı Başarıyla Tamamlandı.
						exit();
					}catch(Exception $e){
						header("Location:index.php");
						exit();
					}
				}else{
					header("Location:KullaniciKayithata.php");//HATA. Yeni Üye Kaydı Yapılamadı.
					exit();
				}
			}
		}
	}
}else{
	header("Location:KullaniciKayitEksik.php");//DİKKAT. Yeni Üye Kayıt Formunda Eksik Veri Girişi
	exit();
}
?>

