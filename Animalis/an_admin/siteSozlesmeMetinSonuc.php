<?php 
    session_start();
    require_once ("../Ayarlar/ayar.php");
    require_once ("../Ayarlar/Fonksiyonlar.php");//güvenlik içindir.
    require_once ("../Framworks/Verot/src/class.upload.php");
    

    if(isset($_SESSION["admin"])){ 

     if(isset($_POST["HakkimizdaMetni"])){
            $GelenHakkimizdaMetni	=	Guvenlik($_POST["HakkimizdaMetni"]);
        }else{
            $GelenHakkimizdaMetni		=	"";
        }
        if(isset($_POST["HakkimizdaMetniFooter"])){
            $GelenHakkimizdaMetniFooter	=	Guvenlik($_POST["HakkimizdaMetniFooter"]);
        }else{
            $GelenHakkimizdaMetniFooter		=	"";
        }
        if(isset($_POST["jumbotronBaslik"])){
            $GelenjumbotronBaslik	=	Guvenlik($_POST["jumbotronBaslik"]);
        }else{
            $GelenjumbotronBaslik		=	"";
        }
        if(isset($_POST["jumbotronMetin"])){
            $GelenjumbotronMetin	=	Guvenlik($_POST["jumbotronMetin"]);
        }else{
            $GelenjumbotronMetin		=	"";
        }
        if(isset($_POST["UyelikSozlesmesiMetni"])){
            $GelenUyelikSozlesmesiMetni	=	Guvenlik($_POST["UyelikSozlesmesiMetni"]);
        }else{
            $GelenUyelikSozlesmesiMetni		=	"";
        }
        if(isset($_POST["KullanimKosullariMetni"])){
            $GelenKullanimKosullariMetni	=	Guvenlik($_POST["KullanimKosullariMetni"]);
        }else{
            $GelenKullanimKosullariMetni		=	"";
        }
        if(isset($_POST["GizlilikSozlesmesiMetni"])){
            $GelenGizlilikSozlesmesiMetni	=	Guvenlik($_POST["GizlilikSozlesmesiMetni"]);
        }else{
            $GelenGizlilikSozlesmesiMetni		=	"";
        }
        if(isset($_POST["MesafeliSatisSozlesmesiMetni"])){
            $GelenMesafeliSatisSozlesmesiMetni	=	Guvenlik($_POST["MesafeliSatisSozlesmesiMetni"]);
        }else{
            $GelenMesafeliSatisSozlesmesiMetni		=	"";
        }
       

        $GelenHakkimizdaGorsel		= $_FILES["HakkimizdaMetniGorsel"];
     

        if(($GelenHakkimizdaMetni!="") and ($GelenHakkimizdaMetniFooter!="") and ($GelenUyelikSozlesmesiMetni!="") and ($GelenKullanimKosullariMetni!="") and ($GelenGizlilikSozlesmesiMetni!="") and ($GelenMesafeliSatisSozlesmesiMetni!="") and ($GelenjumbotronBaslik!="") and ($GelenjumbotronMetin!="") ) {

            $MetinleriGuncelle    = 	$VeritabaniBaglantisi->prepare("UPDATE sozlesmevemetin SET HakkimizdaMetni=?, HakkimizdaMetniFooter=?, UyelikSozlesmesiMetni=?, KullanimKosullariMetni=?, GizlilikSozlesmesiMetni=?, MesafeliSatisSozlesmesiMetni=? ,jumbotronBaslik=? ,jumbotronMetin=?");
            $MetinleriGuncelle->execute([$GelenHakkimizdaMetni,$GelenHakkimizdaMetniFooter,$GelenUyelikSozlesmesiMetni,$GelenKullanimKosullariMetni,$GelenGizlilikSozlesmesiMetni,$GelenMesafeliSatisSozlesmesiMetni,$GelenjumbotronBaslik,$GelenjumbotronMetin]);
            $GuncellemeSayisi 	 = 	$MetinleriGuncelle->rowCount(); 
            
    
            if(($GelenHakkimizdaGorsel["name"]!="") and ($GelenHakkimizdaGorsel["type"]!="") and ($GelenHakkimizdaGorsel["tmp_name"]!="") and ($GelenHakkimizdaGorsel["error"]==0) and ($GelenHakkimizdaGorsel["size"]>0)){
                $SiteHkGorsel	=	new upload($GelenHakkimizdaGorsel, "tr-TR");
                    if($SiteHkGorsel->uploaded){
                        
                       $SiteHkGorsel->mime_magic_check		    =	true;
                       $SiteHkGorsel->allowed				    =	array("image/*");
                       $SiteHkGorsel->file_new_name_body		=	"Hakkimizdaİmage";
                       $SiteHkGorsel->file_overwrite			=	true;
                       $SiteHkGorsel->image_convert			    =	"png";
                       $SiteHkGorsel->image_quality			    =	100;
                       $SiteHkGorsel->image_background_color	=	null;
                       $SiteHkGorsel->image_resize			    =	true;
                       $SiteHkGorsel->image_y				    =	446;
                       $SiteHkGorsel->image_x			    	=	518;
                       $SiteHkGorsel->process($VerotIcinKlasorYolu);
                        
                        if($SiteHkGorsel->processed){
                            $SiteHkGorsel->clean();
                        }else{
                            header("Location:hata.php");
                            exit();
                        } 
                    }
            }


          

            header("Location:siteSozlesmeMetin.php");//Eksik Veri Girişi
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