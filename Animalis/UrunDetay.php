<?php include "netting/baglan.php";
    
    session_start(); 
    require_once ("Ayarlar/ayar.php");
    require_once ("Ayarlar/Fonksiyonlar.php");
    
    $komut=$db->prepare("SELECT * FROM urunler WHERE Urun_ID=:id");
    $komut->execute(array('id'=>$_GET['Urun_ID']));
    $oku=$komut->fetch(PDO::FETCH_ASSOC);

    $komut2=$db->prepare("SELECT * FROM sponsor WHERE S_id=:id2");
    $komut2->execute(array('id2'=>$_GET['Sponsor_ID']));
    $oku2=$komut2->fetch(PDO::FETCH_ASSOC);
     
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Robots" content="index, follow"><!--Arama Motoru Ayarları-->
    <meta name="googlebot" content="index , follow"><!--Google botları-->
    <meta name="revisit-after" content="10 days"><!--Arama Motoru siteyi hangi aralıkta ziyaret etmesi gerektigini söyleriz.-->
    <title><?php echo DonusumleriGeriDondur($SiteTitle) ; ?> | Ürünler </title>    <!-- title -->
    <meta name="descripton" content="<?php echo DonusumleriGeriDondur($SiteDescription); ?>">
    <meta name="keywords" content="<?php echo DonusumleriGeriDondur($SiteKeywords); ?>">
    <link rel="shortcut icon" type="img/png" href="<?php echo DonusumleriGeriDondur($Favicon); ?>" > <!-- favicon -->

    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Krona+One&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/081d03dba3.js" crossorigin="anonymous"></script>
    <!--Fontawesome iconlar için eklenmiştir. -->
    <!-- bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- mean menu css -->
    <link rel="stylesheet" href="css/meanmenu.min.css">
    <!-- main style -->
    <link rel="stylesheet" href="css/style.css">
    <!-- responsive -->
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/slider.css">



    <!--Yıldız Olayı -->
    <link rel="stylesheet" href="http://fortawesome.github.io/Font-Awesome/assets/font-awesome/css/font-awesome.css">

    <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.1.min.js"></script>

    <script type="text/javascript">

        $(function(){

            var kontrol=0;//kontrol değişkenimiz.tıklandıktan sonra renkler sıfırlanmasın diye



            $("#yildiz i").mouseover(function(){//yıldızların üzerine mouse ile gelinirse

                    var index=$(this).index();//üzerine gelinenin sayfadaki sırasını al.

                    $("#yildiz i").css("color","#EAD6B6")//tüm yıldızları siyah yap

                    

                    for(i=index;i>=0;i--){//seçtiğimiz yıldız ve altındakileri döngüye alıyoruz.

                        $("#yildiz i:eq("+i+")").css("color","#FCA311");//tek tek renklerini değiştiriyoruz.
                        $("#yildiz i").css("transition","0.1s");
                        $("#yildiz i").css("cursor","pointer");
                    }

            })



            $("#yildiz i").mouseout(function(){//yıldızların üzerinden mouse çekilirse

                if(kontrol==0){//kontrol 0 ise

                    $("#yildiz i").css("color","#EAD6B6");//hepsini siyah yap
                    $("#yildiz i").css("transition","0.2s");
                }

            })



            $("#yildiz i").click(function(){//yıldıza tıklanırsa

                var index=$(this).index()+1;//seçilen yıldız sayısını buluyoruz.

                kontrol=1;//kontrolü 1 yapıyoruz

                alert(index+" yıldız verdiniz.");//yıldız sayısını ekrana bastırıyoruz.
                
            })

        })
        

    </script>

    <style type="text/css">

        #yildiz{font-size:30px;}

    </style>


</head>

<body>

    <!-- header -->
    <div class="menuArka">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 text-center">
                    <div class="positons">
                        <!-- logo -->
                        <div class="site-logo">
                            <a href="index.php"><img src="<?php echo DonusumleriGeriDondur($SiteLogo);  ?>" alt=""></a>
                        </div>
                        <!-- logo -->

                        <!-- menu start -->
                        <nav class="main-menu">
                            <ul>
                                <li><a href="index.php">Anasayfa</a></li>
                                <li><a href="hakkımızda.php">Hakkımızda</a></li>
                                <li><a href="Urunler.php">Urunler</a></li>
                                <li><a href="iletisim.php">İletişim</a></li>
                                <li>
                                <?php
                            if(isset($_SESSION["Kullanici"])){ ?>
                                <div class="header-icons">
                                     <a href="Sepetim.php"><i class="fas fa-shopping-cart"></i></a>
                                     <a href="KullaniciCikis.php"> <i class="fas fa-door-open"> </i><span class="d-none d-md-inline-block"> Çıkış</span></a>
                                     <a href="KullaniciProfil.php"> <i class="fas fa-user-alt"> </i><span class="d-none d-md-inline-block"><?php echo $KullaniciAd ?></span></a>
                                </div>
                    <?php }else{ ?>
                                <div class="header-icons">
                                    <a href="Sepetim.php"><i class="fas fa-shopping-cart"></i></a>
                                    <a href="KullaniciGiris.php"> <i class="fas fa-sign-in-alt"> </i> <span class="d-none d-md-inline-block">Giriş</span> </a>
                                    <a href="SponsorGiris.php"> <i class="fas fa-sign-in-alt"> </i> <span class="d-none d-md-inline-block">Sponsor</span> </a>
                                </div>
                    <?php
                    }
                    ?>
                                </li>
                            </ul>
                        </nav>
                        <div class="mobile-menu"></div>
                        <!-- menu end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end header -->


    <!-- slider  -->
    <div class="hk-option hk-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="hk-text">
                        <p>Sizin Ürünleriniz</p>
                        <h1>Urunler</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Slider Bitiş -->
    
    <style type="text/css">
        .icerikKapsayici .icerik .detaySag input[type=button]{
            border:none;
            border-left: 2px solid #FFD100;
            border-radius:5px;
            cursor: pointer;
            font-size:15px;
            font-weight:bold;
            font-family: 'Krona One', sans-serif;
            transition:0.1s;
        }
        .icerikKapsayici .icerik .detaySag input[type=button]:hover{
            border:none;
            border-left: 3px solid #2A2B2A;
            border-radius:5px;
            cursor: pointer;
            transition:0.3s;
        }

        .icerikKapsayici .icerik .detaySag input[type=text]{
            border:none;
            border-left: 2px solid #FFD100;
            border-right: 2px solid #FFD100;
            border-radius:5px;
            font-size:15px;
            font-weight:bold;
            font-family: 'Krona One', sans-serif;
        }

        .icerikKapsayici .icerik .detaySag button{
            margin:0px 15px;
            color: #333533;
            background-color: #fff;
            border:none;
            border: 2px solid #202020;
            font-size:15px;
            font-weight:bold;
            border-radius:5px;
            transition:0.2s;
        }
        .icerikKapsayici .icerik .detaySag button:hover{
            color: #FFEE32;
            background-color: #2A2B2A;
            transition:0.3s;
            border:none;
            border: 2px solid #333533;
        }

        .icerikKapsayici .icerik .detaySag .UrunHakkinda{
            width: 600px;
            border-radius: 10px;
            background-color: #C3C3C3;
            border: none;
            padding: 10px;
            font-size: 15px;
            color: #333533;
            font-weight: bold;
        }

        
    </style>
    
    <!-- Icerik-->
    <div class="icerikKapsayici">
        <div class="icerik">
                <?php 
                    if(isset($_GET['btn_sepeteEkle'])){
                        if($_GET['sepeteEkle']=="on"){ ?>
                            <b style="color: green;">İşlem Başarılı... || Ürün Sepete Başarıyla Eklendi</b>
                        <?php } 
                        else if($_GET['sepeteEkle']=="off") {?>
                            <b style="color: maroon;">İşlem Başarısız...|| Giriş Yapmak Gerekli</b>
                <?php } } ?>
            <div class="detaySol">
                <table class="auto-style2">
                    <tr>
                        <td>
                             <img src="img/<?php echo $oku['Urun_Resim']; ?>" alt="" style="width:100%; margin: 65px 100px; padding: 10px; box-shadow: 0 0 20px 0 rgb(0 0 0 / 20%), 0 5px 5px 0 rgb(255 193 7 / 78%); border-radius: 16px;">
                        </td>
                    </tr>
                </table>
            </div>
            
            <div class="detaySag" style="margin:30px 100px; border-radius: 15px; box-shadow: 1px 1px 5px 5px #212529; background-color:#495057;">

                <table class="auto-style2">
                    <form action="netting/islem.php" method="POST">
                    <tr>
                        <td>
                            
                            <span style="font-weight: normal; color:#CED4DA;; "><strong>Ürün Adı: </strong><?php echo $oku['Urun_Ad']; ?></span></h3>
                            <br>
                            <span style="font-weight: normal; color:CED4DA; "><strong>Ürün Kategorisi: </strong><?php echo $oku['Urun_Kategori']; ?></span></h3>
                            <br>
                           
                            <span style="font-weight: normal; color:CED4DA; "><strong>Satıcı: </strong><?php echo $oku2['FirmaAd']; ?></span></h3>
                  
                            <div class="aciklama UrunHakkinda" style="width: 600px;">
                                <?php echo $oku['Urun_Aciklama']; ?>
                                <br>
                                <br><br><br><br><br><br><br>
                            </div>

                            <!--Yıldız Olayı -->
                            <div id="yildiz">

                                <i class="fa fa-star" style="color:#EAD6B6"></i>

                                <i class="fa fa-star" style="color:#EAD6B6"></i>

                                <i class="fa fa-star" style="color:#EAD6B6"></i>

                                <i class="fa fa-star" style="color:#EAD6B6"></i>

                                <i class="fa fa-star" style="color:#EAD6B6"></i>

                            </div>
                          
                            <hr> </hr>
                            <form action="netting/islem.php" method="POST">
                            <input type="button" onclick="azalt()" value="-" style="width:25px;" class="SayiButonlari">
                            <input type="text" name="txt_miktar" id="sonuc" value="1" style="width:30px; text-align:center;">
                            <input type="button" onclick="arttir()" value="+" style="width:25px;" class="SayiButonlari">
                            <input type="hidden" name="Urun_ID" value="<?php echo $_GET['Urun_ID'];?>">
                           
                            <button type="submit" name="btn_sepeteEkle"> <i class="fas fa-shopping-basket"></i>&nbsp;SEPETE EKLE </button>
                            
                            </form>
                        </td>
                   </tr>
               </table>
           </div>    
        </div>    
    </div>
    
    <div style="clear:both"> </div>
    
 <script type="text/javascript">
    function arttir(){
    var sonuc=document.getElementById("sonuc");
    sonuc.value=Number(sonuc.value)+1;
    }
 
    function azalt(){
 
    var sonuc=document.getElementById("sonuc");
    if(sonuc.value==1){
    alert("Sıkıntı Büyük Brom");
    }
    else{
        sonuc.value=Number(sonuc.value)-1;
    }
    

    }
 </script>
    
    
    
    <!-- footer star -->
     <div class="mt-5 pt-5 pb-5 footer">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-xs-12 hakkımızda">
                    <h2>Hakkımızda</h2>
                    <p class="pr-5"><?php echo DonusumleriGeriDondur($HakkimizdaMetniFooter); ?></p>
                </div>

                <div class="col-lg-2 col-xs-12 Sayfa">
                    <h4 class="mt-lg-0 mt-sm-3">Sayfalar</h4>
                    <ul class="m-0 p-0">
                        <li><a href="index.php">Anasayfa</a></li>
                        <li><a href="hakkımızda.php">Hakkımızda</a></li>
                        <li><a href="Urunler.php">Urunler</a></li>
                        <li><a href="iletisim.php">İletisim</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-xs-12 Sayfa">
                    <h4 class="mt-lg-0 mt-sm-3">Sözleşmeler</h4>
                    <ul class="m-0 p-0">
                        <li><a href="UyelikSozlesmesiMetni.php">Üyelik Sözleşmesi</a></li>
                        <li><a href="KullanimKosulları.php">Kullanım Koşulları</a></li>
                        <li><a href="GizlilikSozlesmesiMetni.php">Gizlilik Sözleşmesi</a></li>
                        <li><a href="MesafeliSatisSozlesmesiMetni.php">Mesafeli Satış Sözleşmesi</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-xs-12 adres">
                    <h4 class="mt-lg-0 mt-sm-4">İletişim</h4>
                    <p> <i class="fa fa-map-marker mr-3"></i> <?php echo DonusumleriGeriDondur($SiteAdres); ?></p>
                    <p class="mb-0"><i class="fa fa-phone mr-3"></i><a href="tel:<?php echo DonusumleriGeriDondur($SiteTelefon); ?>"><?php echo DonusumleriGeriDondur($SiteTelefon); ?></a></p>
                    <p><i class="fa fa-envelope-o mr-3"></i><a href="mailto:<?php echo DonusumleriGeriDondur($SiteEmailAdresi);?> "><?php echo DonusumleriGeriDondur($SiteEmailAdresi);?> </a></p>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col copyright">
                    <p class=""><small class="text-white-50"><?php echo DonusumleriGeriDondur($SiteCopyrightMetni);  ?></small></p>
                </div>
            </div>

        </div>
    </div>
    <!-- footer end-->










    <!-- jquery -->
    <script src="js/jquery-1.11.3.min.js"></script>
    <!-- bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- count down -->
    <script src="js/jquery.countdown.js"></script>
    <!-- isotope -->
    <script src="js/jquery.isotope-3.0.6.min.js"></script>
    <!-- waypoints -->
    <script src="js/waypoints.js"></script>
    <!-- owl carousel -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- magnific popup -->
    <script src="js/jquery.magnific-popup.min.js"></script>
    <!-- mean menu -->
    <script src="js/jquery.meanmenu.min.js"></script>
    <!-- sticker js -->
    <script src="js/sticker.js"></script>
    <!-- main js -->
    <script src="js/main.js"></script>

</body>
</html>
<?php
$VeritabaniBaglantisi = null;
?>