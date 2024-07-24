<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
  <title>Sekretariat Daerah</title>

  <!-- ========== All CSS files linkup ========= -->
  <link rel="stylesheet" href="/css/bootstrap.min.css" />
  <link rel="stylesheet" href="/css/lineicons.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="/css/fullcalendar.css" />
  <link rel="stylesheet" href="/css/fullcalendar.css" />
  <link rel="stylesheet" href="/css/main.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
  <script src="https://kit.fontawesome.com/0694a224c2.js" crossorigin="anonymous"></script>
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
        <img src="images/logo/logo.png" alt="Logo" style="height: 150px; margin-bottom: 20px;"> <!-- Tambahkan margin-bottom di sini -->
        <h4>sekretariatdaerah.</h4>
      </a>
    </div>
    <nav class="sidebar-nav">
      <ul>
        <li class="nav-item <?php echo ($_SERVER['REQUEST_URI'] === '/dashboard') ? 'active' : ''; ?>">
          <a href="/dashboard" >
            <span class="icon">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M8.74999 18.3333C12.2376 18.3333 15.1364 15.8128 15.7244 12.4941C15.8448 11.8143 15.2737 11.25 14.5833 11.25H9.99999C9.30966 11.25 8.74999 10.6903 8.74999 10V5.41666C8.74999 4.7263 8.18563 4.15512 7.50586 4.27556C4.18711 4.86357 1.66666 7.76243 1.66666 11.25C1.66666 15.162 4.83797 18.3333 8.74999 18.3333Z" />
                <path d="M17.0833 10C17.7737 10 18.3432 9.43708 18.2408 8.75433C17.7005 5.14918 14.8508 2.29947 11.2457 1.75912C10.5629 1.6568 10 2.2263 10 2.91665V9.16666C10 9.62691 10.3731 10 10.8333 10H17.0833Z" />
              </svg>
            </span>
            <span class="text">Real Price Dashboard</span>
          </a>
        </li>
        <li class="nav-item <?php echo ($_SERVER['REQUEST_URI'] === '/forecast') ? 'active' : ''; ?>">
          <a href="/forecast">
            <span class="icon">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M14.9211 10.1294C15.1652 9.88534 15.1652 9.48967 14.9211 9.24559L10.7544 5.0789C10.5103 4.83482 10.1147 4.83482 9.87057 5.0789C9.62649 5.32297 9.62649 5.71871 9.87057 5.96278L12.9702 9.06251H1.97916C1.63398 9.06251 1.35416 9.34234 1.35416 9.68751C1.35416 10.0327 1.63398 10.3125 1.97916 10.3125H12.9702L9.87057 13.4123C9.62649 13.6563 9.62649 14.052 9.87057 14.2961C10.1147 14.5402 10.5103 14.5402 10.7544 14.2961L14.9211 10.1294Z" />
                <path d="M11.6383 15.18L15.805 11.0133C16.5373 10.2811 16.5373 9.09391 15.805 8.36166L11.6383 4.195C11.2722 3.82888 10.7923 3.64582 10.3125 3.64582V3.02082C10.3125 2.10035 11.0587 1.35416 11.9792 1.35416H16.9792C17.8997 1.35416 18.6458 2.10035 18.6458 3.02082V16.3542C18.6458 17.2747 17.8997 18.0208 16.9792 18.0208H11.9792C11.0587 18.0208 10.3125 17.2747 10.3125 16.3542V15.7292C10.7923 15.7292 11.2722 15.5461 11.6383 15.18Z" />
              </svg>
            </span>
            <span class="text">Prediction Dashboard</span>
          </a>
        </li>
        <li class="nav-item <?php echo ($_SERVER['REQUEST_URI'] === '/modelling') ? 'active' : ''; ?>">
          <a href="/modelling">
            <span class="icon">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4.16666 4.16675C4.16666 2.78604 6.77833 1.66675 9.99999 1.66675C13.2217 1.66675 15.8333 2.78604 15.8333 4.16675V4.57073C15.8027 4.60316 15.7678 4.637 15.7282 4.6722C15.4683 4.90251 15.0568 5.13848 14.4946 5.34931C13.3747 5.76924 11.7858 6.04175 9.99999 6.04175C8.21415 6.04175 6.62521 5.76924 5.5054 5.34931C4.94318 5.13848 4.53162 4.90251 4.27185 4.6722C4.23215 4.637 4.19726 4.60316 4.16666 4.57073V4.16675Z" />
                <path d="M4.16666 6.10992V8.73742C4.19726 8.76983 4.23215 8.80367 4.27185 8.83883C4.53162 9.06917 4.94318 9.30517 5.5054 9.516C6.62521 9.93592 8.21415 10.2084 9.99999 10.2084C11.7858 10.2084 13.3747 9.93592 14.4946 9.516C15.0568 9.30517 15.4683 9.06917 15.7282 8.83883C15.7678 8.80367 15.8027 8.76983 15.8333 8.73742V6.10992C15.5592 6.26222 15.2563 6.39865 14.9335 6.51972C13.6404 7.00462 11.8961 7.29175 9.99999 7.29175C8.10394 7.29175 6.35954 7.00462 5.06649 6.51972C4.74364 6.39865 4.44074 6.26222 4.16666 6.10992Z" />
                <path d="M15.8333 10.2766C15.5592 10.4289 15.2563 10.5653 14.9335 10.6864C13.6404 11.1712 11.8961 11.4584 9.99999 11.4584C8.10394 11.4584 6.35954 11.1712 5.06649 10.6864C4.74364 10.5653 4.44074 10.4289 4.16666 10.2766V12.904C4.19726 12.9365 4.23215 12.9703 4.27185 13.0055C4.53162 13.2358 4.94318 13.4718 5.5054 13.6826C6.62521 14.1025 8.21415 14.375 9.99999 14.375C11.7858 14.375 13.3747 14.1025 14.4946 13.6826C15.0568 13.4718 15.4683 13.2358 15.7282 13.0055C15.7678 12.9703 15.8027 12.9365 15.8333 12.904V10.2766Z" />
                <path d="M15.8333 14.4432C15.5592 14.5956 15.2563 14.732 14.9335 14.8531C13.6404 15.3379 11.8961 15.6251 9.99999 15.6251C8.10394 15.6251 6.35954 15.3379 5.06649 14.8531C4.74364 14.732 4.44074 14.5956 4.16666 14.4432V15.8334C4.16666 17.2142 6.77833 18.3334 9.99999 18.3334C13.2217 18.3334 15.8333 17.2142 15.8333 15.8334V14.4432Z" />
              </svg>
            </span>
            <span class="text">Model Information</span>
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
                <button id="menu-toggle" class="main-btn primary-btn btn-hover">
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

</body>

</html>