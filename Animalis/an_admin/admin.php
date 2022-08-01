<?php
session_start();
require_once("../Ayarlar/ayar.php");
//require_once("Ayarlar/Fonksiyonlar.php");
include "../Ayarlar/Fonksiyonlar.php"; 
include "../netting/baglan.php";
$komut=$db->prepare("SELECT * FROM satis INNER JOIN urunler ON satis.Urun_ID=urunler.Urun_ID");
$komut->execute(); 
?>

<?php if (isset($_SESSION["admin"])) { ?>
<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Anahtar kelime">
    <meta name="description"content="Site açıklama kısmı seo">
    <meta name="robots" content="noindex,nofollow">
    <title>Animalis Admin Paneline hoş geldiniz</title>
    <!-- Favicon icon -->
    <link rel="icon" type="img/png" sizes="16x16" href="img/logo.png">
    <!-- Custom CSS -->
    <link href="../css/chartist.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/chartist-plugin-tooltip.css">
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
                                <span class="text-white font-medium"><?php echo $adminAdSoyad ?></span>
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
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="AdminProfil.php"aria-expanded="false">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <span class="hide-menu">Profil</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="AdminKullanicilar.php" aria-expanded="false">
							<i class="fas fa-table"></i>     <!--<i class="fa fa-table" aria-hidden="true"></i>-->
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
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->

        <!-- Page wrapper  -->
        <div class="page-wrapper">
          
            <!-- Breadcrumb  -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-12 col-sm-4 col-xs-12">
                        <h4 class="page-title">Gösterge Paneli</h4>
                    </div>
                </div>
            </div>
            <!-- End Breadcrumb -->



            <!-- Container fluid  -->
            <div class="container-fluid">
                <div class="row justify-content-center">
            
                <!-- SATIŞLAR -->
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <div class="d-md-flex mb-3">
                                <h3 class="box-title mb-0">SATIŞLAR</h3>
                                <div class="col-md-3 col-sm-4 col-xs-6 ms-auto">
                                    <select class="form-select shadow-none row border-top">
                                        <option>Ocak 2021</option>
                                        <option>Şubat 2021</option>
                                    </select>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table no-wrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">Ürün Adı</th>
                                            <th class="border-top-0">Kategori</th>
                                            <th class="border-top-0">Adet</th>
                                            <th class="border-top-0">Fiyat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while($oku=$komut->fetch(PDO::FETCH_ASSOC)) { ?>
                                            <tr>
                                                <td><?php echo $oku["Satis_ID"]?></td>
                                                <td class="txt-oflo"><?php echo $oku["Urun_Ad"];?></td>
                                                <td><?php echo $oku["Urun_Kategori"];?></td>
                                                <td><?php echo $oku["adet"];?></td>
                                                <?php $t_Fiyat=$oku['Urun_Fiyat']*$oku['adet']; ?>
                                                <td><?php echo $t_Fiyat ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
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
    <script src="js/jquery.sparkline.min.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.js"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="js/chartist.min.js"></script>
    <script src="js/chartist-plugin-tooltip.min.js"></script>
    <script src="js/dashboard1.js"></script>
	<script src="https://kit.fontawesome.com/18c1996b5f.js" crossorigin="anonymous"></script>
</body>

</html>

<?php } else {
    header("location:index.php");
} ?>