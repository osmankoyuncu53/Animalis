<?php
session_start();
require_once("../Ayarlar/ayar.php");
//require_once("Ayarlar/Fonksiyonlar.php");
include "../Ayarlar/Fonksiyonlar.php";
require_once ("../Framworks/Verot/src/class.upload.php");
?>

<?php if (isset($_SESSION["admin"])) { ?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"content="Anahtar kelime gelmektedir.">
    <meta name="description"content="Site açıklaması gelecektir.">
    <meta name="robots" content="noindex,nofollow">
    <title>Animalis Admin panel profil</title>
    <link rel="canonical" href="admin.php" /><!-- Cannonical Önemlidir.-->
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
                            <img src="../img/adminLogo.png" alt="homepage" />
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
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <!-- User Profile-->
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
        </div>
    </aside>

        <div class="page-wrapper">
            <!-- Breadcrumb -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-12 col-sm-4 col-xs-12">
                        <h4 class="page-title">Sözleşme Ve Metinler </h4>
                    </div>
                </div>
            </div>
            <!-- End Breadcrumb -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                  
                    <!-- Column -->
                    <div class="col-lg-12 col-xlg-9 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="form-horizontal form-material" action="siteSozlesmeMetinSonuc.php" method="POST" enctype="multipart/form-data">
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Hakkımızda Metni</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="HakkimizdaMetni" value="<?php echo DonusumleriGeriDondur($HakkimizdaMetni) ?>" class="form-control p-0 border-0"> </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Hakkımızda Metni Footer</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="HakkimizdaMetniFooter" value="<?php echo DonusumleriGeriDondur($HakkimizdaMetniFooter ) ?>" class="form-control p-0 border-0">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Hakkımızda Görsel</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="file" name="HakkimizdaMetniGorsel"  class="form-control p-0 border-0">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Jumbotron Başlık</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="jumbotronBaslik" value="<?php echo DonusumleriGeriDondur($jumbotronBaslik) ?>" class="form-control p-0 border-0">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Jumbotron Metin</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="jumbotronMetin" value="<?php echo DonusumleriGeriDondur($jumbotronMetin ) ?>" class="form-control p-0 border-0">
                                        </div>
                                    </div>
									<div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Üyelik Sozleşmesi Metni</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="UyelikSozlesmesiMetni" value="<?php echo DonusumleriGeriDondur($UyelikSozlesmesiMetni) ?>" class="form-control p-0 border-0">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Kullanim Koşullari Metni</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="KullanimKosullariMetni" value="<?php echo DonusumleriGeriDondur($KullanimKosullariMetni ) ?>" class="form-control p-0 border-0"> </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Gizlilik Sozleşmesi Metni</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="GizlilikSozlesmesiMetni" value="<?php echo DonusumleriGeriDondur($GizlilikSozlesmesiMetni) ?>" class="form-control p-0 border-0"> </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Mesafeli Satis Sozlesmesi Metni</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="MesafeliSatisSozlesmesiMetni" value="<?php echo DonusumleriGeriDondur($MesafeliSatisSozlesmesiMetni) ?>" class="form-control p-0 border-0"> </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <div class="col-sm-12">
                                            <button type="submit" name="gonder" class="btn btn-success">Güncelle</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
            </div>
            <!-- End Container fluid  -->
          <!-- footer -->
          <footer class="footer text-center"> 2021 © Animalis Admin Panel</footer>
          <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->

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