<!DOCTYPE html>
<?php
include("Connect_dbstock.php");
session_start();
if (@$_SESSION['checked'] <> 1) {
  echo "<script>alert('ກະລຸນາລ໋ອກອິນກ່ອນ');location='index.php';</script>";
} else {
?>
  <html lang="en">

  <head>
    <title></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- ໄອຄ້ອນ Modernize ແລະ submenu -->
    <link rel="stylesheet" href="link/css/styles.min.css" />

    <link rel="stylesheet" href="icon/css/all.min.css">
    <script src="link/js/popper.min.js"></script>
    <!-- <script src="link/js/bootstrap.min.js"></script> -->
    <!-- <link id="theme-style" rel="stylesheet" href="link/css/portal.css"> -->
    <link id="theme-style" rel="stylesheet" href="assets/css/portal.css">
    <style>
    *{
      font-family:Phetsarath OT;}
      </style>
  </head>

  <body class="app">
    <header class="app-header fixed-top">
      <div class="app-header-content">
        <div class="row justify-content-between align-items-center">
          <div class="col-md-4"></div>
          <div class="col-md-6" style="padding-top: 10px;">
            <h4 class='text-right'>ຍິນດີຕ້ອນຮັບ <?= $_SESSION['fname'] . " " . $_SESSION['lname']; ?></h4>
          </div><!--//col-->
          <div class="search-mobile-trigger d-sm-none col">
            <img class="profile-image" src="../assets/images/profiles/profile-1.png" alt="">
          </div><!--//col-->
          <div class="app-utilities col-auto">
            <div class="app-utility-item app-user-dropdown dropdown">

              <a class="dropdown-toggle" id="user-dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                <i class="fas fa-cog fa-spin" style="font-size: 30px;"></i> </a>
              <ul class="dropdown-menu" aria-labelledby="user-dropdown-toggle">
                <li><a class="dropdown-item" href="logout.php"><b>ອອກຈາກລະບົບ</b></a></li>
              </ul>
            </div><!--//app-user-dropdown-->
          </div><!--//app-utilities-->
        </div><!--//row-->
      </div><!--//app-header-content-->
      <div id="app-sidepanel" class="app-sidepanel">
        <div id="sidepanel-drop" class="sidepanel-drop"></div>
        <div class="sidepanel-inner d-flex flex-column">
          <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
          <div class="app-branding">
            <a class="app-logo" href="#"><img class="logo-icon me-3" src="download (1).jpeg" alt="logo"><span class="logo-text">ລະບົບສາງສິນຄ້າ</span></a>
          </div><!--//app-branding-->
          <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
            <ul class="app-menu list-unstyled accordion" id="menu-accordion">
              <li class="nav-item">
                <a class="nav-link active" href="Homepage.php" target="n">
                  <span class="nav-icon">
                    <i class="ti ti-home" style="font-size: 20px;"></i>
                  </span>
                  <span class="nav-link-text">
                    <b><i class="fas fa-home"></i> ໜ້າຫຼັກ</b>
                  </span>
                </a><!--//nav-link-->
              </li><!--//nav-item-->
              <li class="nav-item has-submenu">
                <a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-66" aria-expanded="false" aria-controls="submenu-1">
                  <span class="nav-icon">
                    <i class="fas fa-font"></i>
                  </span>
                  <span class="nav-link-text"><b>ຂໍ້ມູນປະເພດສິນຄ້າ</b></span>
                  <span class="submenu-arrow">
                    <i class="fas fa-angle-down right"></i>
                  </span><!--//submenu-arrow-->
                </a><!--//nav-link-->
                <div id="submenu-66" class="collapse submenu submenu-1" data-bs-parent="#menu-accordion">
                  <ul class="submenu-list list-unstyled">
                    <!-- ໂຟລເດີ categories -->
                    <li class="submenu-item"><a class="submenu-link" href="categories1/form_categories.php" target="n">ບັນທຶກຂໍ້ມູນປະເພດສິນຄ້າ</a></li>
                    <li class="submenu-item"><a class="submenu-link" href="categories1/select-categories.php" target="n">ລາຍງານຂໍ້ມູນປະເພດສິນຄ້າ</a></li>

                  </ul>
                </div>
              </li><!--//nav-item-->
              <li class="nav-item has-submenu">
                <a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-6" aria-expanded="false" aria-controls="submenu-1">
                  <span class="nav-icon">
                    <i class="fas fa-store"></i>
                  </span>
                  <span class="nav-link-text"><b> ຂໍ້ມູນສິນຄ້າ</b></span>
                  <span class="submenu-arrow">
                    <i class="fas fa-angle-down right"></i>
                  </span><!--//submenu-arrow-->
                </a><!--//nav-link-->
                <div id="submenu-6" class="collapse submenu submenu-1" data-bs-parent="#menu-accordion">
                  <ul class="submenu-list list-unstyled">
                    <!-- folder products -->
                    <li class="submenu-item"><a class="submenu-link" href="products2/form_products.php" target="n">ບັນທຶກຂໍ້ມູນສິນຄ້າ</a></li>
                    <li class="submenu-item"><a class="submenu-link" href="products2/select-products.php" target="n">ລາຍງານຂໍ້ມູນສິນຄ້າ</a></li>
                    <li class="submenu-item"><a class="submenu-link" href="products2/form_search_products.php" target="n">ຊອກຫາສິນຄ້າ</a></li>
                  </ul>
                </div>
              </li><!--//nav-item-->
              <li class="nav-item has-submenu">
                <a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-5" aria-expanded="false" aria-controls="submenu-1">
                  <span class="nav-icon">
                  <i class="fas fa-shopping-bag"></i>
                  </span>
                  <span class="nav-link-text"><b>ຂໍ້ມູນສິນຄ້ານຳເຂົ້າ</b></span>
                  <span class="submenu-arrow">
                    <i class="fas fa-angle-down right"></i>
                  </span><!--//submenu-arrow-->
                </a><!--//nav-link-->
                <div id="submenu-5" class="collapse submenu submenu-1" data-bs-parent="#menu-accordion">
                  <ul class="submenu-list list-unstyled">
                    <!-- ໂຟລເດີ receives -->
                    <li class="submenu-item"><a class="submenu-link" href="receives3/form_receives.php" target="n">ບັນທຶກຂໍ້ມູນສິນຄ້ານຳເຂົ້າ</a></li>
                    <li class="submenu-item"><a class="submenu-link" href="receives3/select-receives.php" target="n">ລາຍຂໍ້ມູນສິນຄ້ານຳເຂົ້າ</a></li>
                    <li class="submenu-item"><a class="submenu-link" href="receives3/form_seach_receives.php" target="n">ຊອກຫາສິນຄ້ານຳເຂົ້າ</a></li>
                  </ul>
                </div>
              </li><!--//nav-item-->
              <li class="nav-item has-submenu">
                <a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-3" aria-expanded="false" aria-controls="submenu-1">
                  <span class="nav-icon">
                  <i class="fas fa-shopping-cart"></i>
                  </span>
                  <span class="nav-link-text"><b>ຂໍ້ມູນສິນຄ້າຂາຍອອກ</b></span>
                  <span class="submenu-arrow">
                    <i class="fas fa-angle-down right"></i>
                  </span><!--//submenu-arrow-->
                </a><!--//nav-link-->
                <div id="submenu-3" class="collapse submenu submenu-1" data-bs-parent="#menu-accordion">
                  <ul class="submenu-list list-unstyled">
                    <!-- ໂຟລເດີ orders -->
                    <li class="submenu-item"><a class="submenu-link" href="orders4/Form_order.php" target="n">ບັນທຶກຂໍ້ມູນສິນຄ້າຂາຍອອກ</a></li>
                    <li class="submenu-item"><a class="submenu-link" href="orders4/select-orders.php" target="n">ລາຍຂໍ້ມູນສິນຄ້າຂາຍອອກ</a></li>
                    <li class="submenu-item"><a class="submenu-link" href="orders4/form_seach_orders.php" target="n">ຊອກຫາສິນຄ້າຂາຍ</a></li>
                  </ul>
                </div>
              </li><!--//nav-item-->

              <!-- folder orders -->


            </ul><!--//app-menu-->
          </nav><!--//app-nav-->
          

        </div><!--//sidepanel-inner-->
      </div><!--//app-sidepanel-->
    </header><!--//app-header-->

    <div class="app-wrapper">
      <iframe src="Homepage.php" width="100%" height="700" name="n" style="border: none;"></iframe>
      <footer class="app-footer">
        <div class="container text-center py-3">
          ເວີຊັ່ນ 1.0.1
        </div>
      </footer><!--//app-footer-->
    </div><!--//app-wrapper-->

    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
  </body>
<?php
 }
?>

  </html>