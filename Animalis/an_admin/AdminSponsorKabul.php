<?php
session_start();
require_once("../Ayarlar/ayar.php");
//require_once("Ayarlar/Fonksiyonlar.php");
include "../Ayarlar/Fonksiyonlar.php";
include "../netting/baglan.php";
$komut=$db->prepare("SELECT * FROM sponsoronay");
$komut->execute();  
?>

<?php if (isset($_SESSION["admin"])) { ?>
<!DOCTYPE html>
<html  lang="tr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Anahtar kelime">
    <meta name="description"content="Site açıklama seo">
    <meta name="robots" content="noindex,nofollow">
    <title>Kullanıcılar Admin Panel</title>
    <link rel="canonical" href="admin.php"/>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <!-- Custom CSS -->
   <link href="../css/style.min.css" rel="stylesheet">

</head>

<body>
    <!-- Main wrapper - style you can find in pages.scss -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- Topbar header - style you can find in pages.scss -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <!-- Logo başlangıç -->
            <div class="navbar-header" data-logobg="skin6">
                    <a class="navbar-brand" href="admin.php">
                        <span class="logo-text">
                            <img src="../img/adminLogo.png" alt="Anasayfa" />
                        </span>
                    </a>
            </div>
          <!-- Logo bitiş -->
             
                <!-- Kullanıcı Profil başlangıc -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <ul class="navbar-nav ms-auto d-flex align-items-center">
                      
                        <li>
                            <?php  if($adminLogo!=""){ ?>
                        <a class="profile-pic" href="#"><img src="../<?php echo DonusumleriGeriDondur($adminLogo); ?>" alt="" width="36"class="img-circle"> 
                                <span class="text-white font-medium"><?php echo $adminAdSoyad ?></span></a><?php } else { ?>
                                    <a class="profile-pic" href="#"><img src="../img/hk-img/d1.jpg" alt="" width="36"class="img-circle"> 
                                <span class="text-white font-medium"><?php echo $adminAdSoyad ?></span></a>
                            <?php 
                        } ?>
                            
                        </li>
                    </ul>
                </div>
                 <!-- Kullanıcı Profil bitiş -->
            </nav>
        </header>
        <!-- End Topbar header -->


      <!-- Left Sidebar - style you can find in sidebar.scss  -->
      <aside class="left-sidebar" data-sidebarbg="skin6">
        <div class="scroll-sidebar">
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <!-- Kullanıcı Profil -->
                    <li class="sidebar-item pt-2">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="admin.php" aria-expanded="false">
                            <i class="far fa-clock" aria-hidden="true"></i>
                            <span class="hide-menu">Gösterge Paneli</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="AdminProfil.php" aria-expanded="false">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <span class="hide-menu">Profil</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="AdminKullanicilar.php" aria-expanded="false">
                            <i class="fa fa-table" aria-hidden="true"></i>
                            <span class="hide-menu">Kullanıcılar</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="AdminSponsorKabul.php" aria-expanded="false">
                            <i class="fa fa-table" aria-hidden="true"></i>
                            <span class="hide-menu">Sponsor Kabul</span>
                        </a>
                    </li>

					 <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="AdminYetkiVer.php" aria-expanded="false">
                            <i class="fas fa-user-plus" aria-hidden="true"></i>
                            <span class="hide-menu">Yetki Ver</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="siteAyarlari.php" aria-expanded="false">
                        <i class="fas fa-cog" aria-hidden="true"></i> 
                            <span class="hide-menu">Site Ayarları</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="siteSozlesmeMetin.php" aria-expanded="false">
                        <i class="fa fa-file-text" aria-hidden="true"></i> 
                            <span class="hide-menu">Sözleşme Ve Metin</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="SiteMisyon.php" aria-expanded="false">
                        <i class="fa fa-file-text" aria-hidden="true"></i> 
                            <span class="hide-menu">Misyon ve Vizyon</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="adminCikis.php" aria-expanded="false">
                        <i class="fas fa-door-open" aria-hidden="true"></i> 
                            <span class="hide-menu">Çıkış Yap</span>
                        </a>
                    </li>
                </ul>

            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>


        <!-- Page wrapper  -->
        <div class="page-wrapper">

            <!-- Bread crumb  -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-12 col-sm-4 col-xs-12">
                        <h4 class="page-title">Sponsorlar</h4>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- End Breadcrumb -->


            <!-- Container fluid  -->
            <div class="container-fluid">
                <?php 
                    if(isset($_GET['talepekle'])){
                        if($_GET['talepekle']=="on"){ ?>
                            <b style="color: green;">İşlem Başarılı... || Sponsor Oluşturuldu</b>
                        <?php } 
                        else if($_GET['talepekle']=="off") {?>
                            <b style="color: maroon;">İşlem Başarısız...|| Sponsor Tekrarı</b>
                <?php } } ?>
                <?php 
                    if(isset($_GET['talepsil'])){
                        if($_GET['talepsil']=="on"){ ?>
                            <b style="color: green;">Silme İşlemi Başarılı...</b>
                        <?php } 
                        else if($_GET['talepsil']=="off") {?>
                            <b style="color: maroon;">Silme İşlemi Başarısız...</b>
                <?php } } ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                    <h3 class="box-title">Sponsorlar</h3>
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                    
                                        <tr>
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">Firma Ad</th>
                                            <th class="border-top-0">E-Mail Adres</th>
                                            <th class="border-top-0">Şifre</th>
                                            <th class="border-top-0">Talep Zaman</th>
                                            <th class="border-top-0">Durum 1</th>
                                            <th class="border-top-0">Durum 2</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php while($oku=$komut->fetch(PDO::FETCH_ASSOC)) { ?>
                                        <form action="adminSponsorSonuc.php?onay_id=<?php echo $oku['onay_id']?>" method="POST">
                                            <tr>
                                                <td><?php echo $oku["onay_id"];?></td>
                                                <td><?php echo $oku["EmailAdresi"];?></td>
                                                <td><?php echo $oku["FirmaAd"];?></td>
                                                <td><?php echo $oku["Sifre"];?></td>
                                                <td><?php echo $oku["kayitTarih"];?></td>

                                                
                                                <td>
                                                    <button type="submit" name="talepekle" class="btn btn-admin btn-floating "><i class="fas fa-trash"></i></button>
                                                   
                                                </td>

                                                <td><a href="adminSponsorSonuc?onay_id=<?php echo $oku['onay_id'];?>&talepsil">
                                                        <button type="button" class="btn btn-admin btn-floating "><i class="fas fa-trash"></i></button>
                                                    </a>
                                                </td>
                                               
                                            </tr>
                                        </form>
                                    <?php }?>
                                 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                      
                    </div>
                </div>
            </div>

           <!-- footer -->
           <footer class="footer text-center"> 2021 © Animalis Admin Panel</footer>
           <!-- End footer -->

        </div>
    </div>
    <!-- End Wrapper -->

    <!-- All Jquery -->
    <script src="js/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.js"></script>
	<!--Fontları çekmektedir -->
	<script src="https://kit.fontawesome.com/18c1996b5f.js" crossorigin="anonymous"></script>
</body>

</html>

<?php } else {
    header("location:index.php");
} ?>