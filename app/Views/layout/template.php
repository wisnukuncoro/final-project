<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  <title>Sekretariat Daerah</title>

  <!-- ========== All CSS files linkup ========= -->
  <link rel="stylesheet" href="/css/bootstrap.min.css">
  <link rel="stylesheet" href="/css/lineicons.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="/css/materialdesignicons.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="/css/fullcalendar.css">
  <link rel="stylesheet" href="/css/fullcalendar.css">
  <link rel="stylesheet" href="/css/main.css">
</head>

<body>
  <!-- ======== Preloader =========== -->
  <div id="preloader">
    <div class="spinner"></div>
  </div>
  <!-- ======== Preloader =========== -->

  <!-- ======== sidebar-nav start =========== -->
  <aside class="sidebar-nav-wrapper">
    <div class="navbar-logo">
      <a href="/" style="display: flex; flex-direction: column; align-items: center;">
        <img src="images/logo/logo.png" alt="Logo" style="height: 150px; margin-bottom: 20px;">
        <h4>sekretariatdaerah.</h4>
      </a>
    </div>
    <nav class="sidebar-nav">
      <ul>
        <li class="nav-item <?php echo ($_SERVER['REQUEST_URI'] === '/dashboard') ? 'active' : ''; ?>">
          <a href="/dashboard">
            <div class="icon-card p-3">
              <div class="icon dark">
                <i class="lni lni-tag"></i>
              </div>
              <div class="content">
                Real Price Dashboard
              </div>
            </div>
          </a>
        </li>
        <li class="nav-item <?php echo ($_SERVER['REQUEST_URI'] === '/forecast') ? 'active' : ''; ?>">
          <a href="/forecast">
            <div class="icon-card p-3">
              <div class="icon dark">
                <i class="lni lni-target-revenue"></i>
              </div>
              <div class="content">
                Prediction Dashboard
              </div>
            </div>
          </a>
        </li>
        <li class="nav-item <?php echo ($_SERVER['REQUEST_URI'] === '/model-information') ? 'active' : ''; ?>">
          <a href="/model-information">
            <div class="icon-card p-3">
              <div class="icon dark">
                <i class="lni lni-support"></i>
              </div>
              <div class="content">
                Model Information
              </div>
            </div>
          </a>
        </li>
      </ul>
    </nav>
  </aside>
  <div class="overlay"></div>
  <!-- ======== sidebar-nav end =========== -->

  <!-- ======== main-wrapper start =========== -->
  <main class="main-wrapper">
    <!-- ========== header start ========== -->
    <header class="header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-5 col-md-5 col-6">
            <div class="header-left d-flex align-items-center">
              <div class="menu-toggle-btn mr-15">
                <button id="menu-toggle" class="main-btn dark-btn btn-hover">
                  <i class="lni lni-chevron-left me-2"></i> Menu
                </button>
              </div>
            </div>
          </div>
          <div class="col-lg-7 col-md-7 col-6">
            <div class="header-right">
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- ========== header end ========== -->

    <?= $this->renderSection('content'); ?>

    <!-- ========== footer start =========== -->
    <footer class="footer">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6 order-last order-md-first">
            <div class="copyright text-center text-md-start">
              <p class="text-sm">
                Developed by Kuncoro Wisnu Jati
              </p>
            </div>
          </div>
          <!-- end col-->
          <!-- end row -->
        </div>
        <!-- end container -->
    </footer>
    <!-- ========== footer end =========== -->
  </main>
  <!-- ======== main-wrapper end =========== -->
   
  <!-- ModalTwo start -->
  <div class="warning-modal">
    <div class="modal fade" id="ModalOne" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content card-style-1 warning-card text-center">
          <div class="modal-body">
            <div class="icon text-danger mb-20">
              <i class="lni lni-warning"></i>
            </div>
            <div class="content mb-30">
              <h2 class="mb-15">Error!</h2>
              <p class="text-sm text-medium">
                Bulan dan Tahun Yang Anda Pilih Tidak Valid, Lihat Pada Informasi Data Yang Tersedia!
              </p>
            </div>
            <div class="action d-flex flex-wrap justify-content-center">
              <button data-bs-dismiss="modal" class="main-btn btn-sm dark-btn rounded-full btn-hover m-1">
                Close
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- ModalTwo End -->

  <!-- Modal for error -->
  <div class="error-modal">
    <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="messageModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content card-style-1 warning-card text-center">
          <div class="modal-body">
            <div class="icon text-danger mb-20">
              <i class="lni lni-warning"></i>
            </div>
            <div class="content mb-30">
              <h2 class="title mb-15">
                <!-- title appears -->
              </h2>
              <p class="message text-sm text-medium">
                <!-- message appears -->
              </p>
            </div>
            <div class="action d-flex flex-wrap justify-content-center">
              <button data-bs-dismiss="modal" class="main-btn btn-sm dark-btn rounded-full btn-hover m-1">
                Close
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>

</html>