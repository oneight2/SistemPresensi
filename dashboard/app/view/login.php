<?php
// session_start();
$notif = isset($url[1]) ? true : false;
if(isset($_SESSION['status'])){
echo "<script>
            document.location.href='" . BASE_URL . "dashboard';
        </script>";
}
?>
<body class="bg-default">
  <div class="main-content">
    
    <!-- Header -->
    <div class="header bg-gradient-primary  pb-8 pt-3">
      <div class="container">
        <div class="header-body text-center mb-2">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6">
              <h1 class="text-white">Selamat Datang!</h1>
              <p class="text-lead text-light">Di Sistem Presensi PT. Inovindo Digital Media.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary shadow border-0">
            
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                <small>Login</small>
              </div>
              <form action="<?php echo BASE_URL."app/function/proses_login.php"; ?>" method="POST">
                <div class="form-group mb-3">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" placeholder="Username/NIP" type="text" name="username">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Password" type="password" name="password">
                  </div>
                </div>
                <div class="custom-control custom-control-alternative custom-checkbox">
                  <input class="custom-control-input" id=" customCheckLogin" type="checkbox">
                  
                </div>
                <div class="text-center">
                  <input type="submit" class="btn btn-primary my-4" value="login" />
                </div>
              </form>
              <p>
                <?php
                if($notif == true)
                echo "<div class='notif underlinehover'>Maaf, username atau password yang kamu masukan tidak cocok</div>";
                ?>
              </p>
            </div>
          </div>
          
        </div>
      </div>
    </div>
    <footer class="py-5">
      <div class="container">
        <div class="row align-items-center justify-content-xl-between">
          <div class="col-xl-6">
            <div class="copyright text-center text-xl-left text-muted">
              © 2019 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">PT. INOVINDO DIGITAL MEDIA</a>
            </div>
          </div>
         
        </div>
      </div>
    </footer>
  </div>
