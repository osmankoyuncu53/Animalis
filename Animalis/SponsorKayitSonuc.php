<?php
require_once ("Ayarlar/ayar.php");
require_once ("Ayarlar/Fonksiyonlar.php"); //güvenlik içindir.
 

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
if(isset($_POST["FirmaAd"])){
	$GelenFirmaAdi		=	Guvenlik($_POST["FirmaAd"]);
}else{
	$GelenFirmaAdi		=	"";
}
if(isset($_POST["SozlesmeOnay"])){
	$GelenSozlesmeOnay		=	Guvenlik($_POST["SozlesmeOnay"]);
}else{
	$GelenSozlesmeOnay		=	"";
}

$bos =" ";
$MD5liSifre				=	md5($GelenSifre);
$ZamanDamgasi			=	time();

if(($GelenEmailAdresi!="") and ($GelenSifre!="") and ($GelenSifreTekrar!="") and ($GelenFirmaAdi!="") and ($GelenSozlesmeOnay!="")){
	if($GelenSozlesmeOnay==0){//eğer sözleşme onaylanmadıysa.
		header("Location:index.php");//sözleşme onaylanmadı sayfası
		exit();
	}else{
		if($GelenSifre!=$GelenSifreTekrar){//şifre ve şifre tekrarı uyuşmuyorsa.
			header("Location:SponsorKayitUyusmayanSifre.php");
			exit();
		}else{//eğer E-mail adresi bir başkası tarafından kullanılıyorsa tekrarlanan kayıt sayfasına gönderilir.
			$KontrolSorgusu		=	$VeritabaniBaglantisi->prepare("SELECT * FROM sponsoronay WHERE EmailAdresi = ?");
			$KontrolSorgusu->execute([$GelenEmailAdresi]);
			$KullaniciSayisi	=	$KontrolSorgusu->rowCount();
			
			if($KullaniciSayisi>0){//eğer uye kayıt  tekrarlanıyorsa.
				header("Location:SponsorKayitTekrar.php");
				exit();
			}else{
				$SponsorEklemeSorgusu	=  $VeritabaniBaglantisi->prepare("INSERT INTO sponsoronay (EmailAdresi,FirmaAd,Sifre,kayitTarih) values (?, ?, ?,?)");
				$SponsorEklemeSorgusu->execute([$GelenEmailAdresi,$GelenFirmaAdi,$MD5liSifre,$ZamanDamgasi]);
				$KayitKontrol		=	$SponsorEklemeSorgusu->rowCount();
				
				if($KayitKontrol>0){
                    try{
                    	?>
                    	<script type="text/javascript">
                    		alert("Talep Başarıyla Oluşturuldu...");
                    	</script>
                    	<?php
                    	header("refresh:0;url=SponsorGiris.php");//TEBRİKLER. Yeni Üye Kaydı Başarıyla Tamamlandı.
						
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
	header("Location:SponsorKayitEksik.php");//DİKKAT. Yeni Üye Kayıt Formunda Eksik Veri Girişi
	exit();
}
?>

