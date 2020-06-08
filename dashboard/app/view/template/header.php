<?php
if (isset($_SESSION['status'])) {
  # code...
if ($_SESSION['status'] == 'pegawai') {
$pegawai = query("SELECT * FROM pegawai WHERE nip = $_SESSION[id_user]")[0];
}
elseif ($_SESSION['status'] == 'admin') {
$admin = query("SELECT * FROM admin WHERE id = $_SESSION[id_user]")[0];
}
}
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
    Argon Dashboard - Free Dashboard for Bootstrap 4 by Creative Tim
    </title>
    <!-- Favicon -->
    <link href="<?= BASE_URL .'assets/img/brand/favicon.png' ?>" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="<?= BASE_URL .'assets/js/plugins/nucleo/css/nucleo.css'?>
    " rel="stylesheet" />
    <link href="<?= BASE_URL .'assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css' ?>
    " rel="stylesheet" />
    <link rel="stylesheet" href="<?= BASE_URL.'assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css' ?>">
    <link rel="stylesheet" href="<?= BASE_URL.'assets/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css' ?>">
    <link rel="stylesheet" href="<?= BASE_URL.'assets/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css' ?>"> 
    <!-- CSS Files -->
    <link rel="stylesheet" href="<?= BASE_URL.'assets/css/argon.min9f1e.css?v=1.1.0' ?>">
    <link href="<?= BASE_URL .'assets/css/argon-dashboard.css?v=1.1.0' ?>
    " rel="stylesheet" />
    
  </head>
  <?php if (isset($_SESSION['status'])): ?>
  
  <body class="">
    <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
      <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="../index.html">
          <img src="<?= BASE_URL.'/assets/img/brand/blue.png' ?>" class="navbar-brand-img" alt="...">
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
          
          <li class="nav-item dropdown">
            <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Welcome!</h6>
              </div>
              
              <div class="dropdown-divider"></div>
              <a href="<?= BASE_URL . 'app/function/logout.php' ?>" class="dropdown-item">
                <i class="ni ni-user-run"></i>
                <span>Logout</span>
              </a>
            </div>
          </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Collapse header -->
          <div class="navbar-collapse-header d-md-none">
            <div class="row">
              <div class="col-6 collapse-brand">
                <a href="../index.html">
                  <img src="../assets/img/brand/blue.png">
                </a>
              </div>
              <div class="col-6 collapse-close">
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
                </button>
              </div>
            </div>
          </div>
          <?php if ($_SESSION['status'] == 'admin'): ?>
          <!-- Navigation -->
          <ul class="navbar-nav">
            <li class="nav-item    active " active=" ">
              <a class=" nav-link " href="<?= BASE_URL.'dashboard' ?>"> <i class="ni ni-tv-2 text-primary"></i> Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="<?= BASE_URL.'setting_presensi' ?>">
                <i class="ni ni-planet text-blue"></i> Setting Presensi
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= BASE_URL.'kelola_pegawai' ?>">
                <i class="ni ni-single-02 text-yellow"></i> Kelola Pegawai
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="<?= BASE_URL.'rekap_presensi' ?>">
                <i class="ni ni-bullet-list-67 text-red"></i> Rekap Presensi
              </a>
            </li>
            
          </ul>
          <?php elseif ($_SESSION['status'] == 'pegawai'): ?>
          <ul class="navbar-nav">
            <li class="nav-item    active " active=" ">
              <a class=" nav-link " href="<?= BASE_URL.'dashboard' ?>"> <i class="ni ni-tv-2 text-primary"></i> Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="<?= BASE_URL.'rekap_presensi' ?>">
                <i class="ni ni-bullet-list-67 text-red"></i> Rekap Presensi
              </a>
            </li>
            
            
          </ul>
          <?php endif ?>
          
          <!-- Divider -->
          <hr class="my-3">
          <!-- Heading -->
          
        </div>
      </div>
    </nav>
    <div class="main-content">
      <!-- Navbar -->
      <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
          <!-- Brand -->
          <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" ><?= $url[0] ?></a>
          <!-- Form -->
          
          <!-- User -->
          <ul class="navbar-nav align-items-center d-none d-md-flex">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <?php if ($_SESSION['status'] == 'pegawai'): ?>
                      <?php if ($pegawai['foto'] == NULL): ?>
                        <img src="<?= BASE_URL.'/assets/img/profil/user_icon.png' ?>" >
                      <?php elseif ($pegawai['foto'] != NULL): ?>
                        <img src="<?= BASE_URL.'/assets/img/profil/'.$pegawai['foto'] ?>">
                      <?php endif ?>
                    <!-- foto admin -->
                    <?php elseif ($_SESSION['status'] == 'admin'): ?>
                      <?php if ($admin['foto'] == NULL): ?>
                        <img src="<?= BASE_URL.'/assets/img/profil/user_icon.png' ?>" >
                      <?php elseif ($admin['foto'] != NULL): ?>
                        <img src="<?= BASE_URL.'/assets/img/profil/'.$pegawai['foto'] ?>">
                      <?php endif ?>
                    <?php endif ?>
                  </span>
                  <div class="media-body ml-2 d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold"><?= $_SESSION['nama_user'] ?></span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                <div class=" dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Welcome!</h6>
                </div>
                
                <div class="dropdown-divider"></div>
                <a href="<?= BASE_URL . 'app/function/logout.php' ?>" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>Logout</span>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </nav>
      <?php endif ?>