<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="images/favicon.svg" type="image/x-icon" />
  <title>Rice Price Forecaster</title>

  <!-- ========== All CSS files linkup ========= -->
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/lineicons.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="css/fullcalendar.css" />
  <link rel="stylesheet" href="css/fullcalendar.css" />
  <link rel="stylesheet" href="css/main.css" />
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
      <a href="/">
        <h4>ricepriceforecaster.</h4>
      </a>
    </div>
    <nav class="sidebar-nav">
      <ul>
        <li class="nav-item">
          <a href="/">
            <span class="icon">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M8.74999 18.3333C12.2376 18.3333 15.1364 15.8128 15.7244 12.4941C15.8448 11.8143 15.2737 11.25 14.5833 11.25H9.99999C9.30966 11.25 8.74999 10.6903 8.74999 10V5.41666C8.74999 4.7263 8.18563 4.15512 7.50586 4.27556C4.18711 4.86357 1.66666 7.76243 1.66666 11.25C1.66666 15.162 4.83797 18.3333 8.74999 18.3333Z" />
                <path d="M17.0833 10C17.7737 10 18.3432 9.43708 18.2408 8.75433C17.7005 5.14918 14.8508 2.29947 11.2457 1.75912C10.5629 1.6568 10 2.2263 10 2.91665V9.16666C10 9.62691 10.3731 10 10.8333 10H17.0833Z" />
              </svg>
            </span>
            <span class="text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="/forecast">
            <span class="icon">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M14.9211 10.1294C15.1652 9.88534 15.1652 9.48967 14.9211 9.24559L10.7544 5.0789C10.5103 4.83482 10.1147 4.83482 9.87057 5.0789C9.62649 5.32297 9.62649 5.71871 9.87057 5.96278L12.9702 9.06251H1.97916C1.63398 9.06251 1.35416 9.34234 1.35416 9.68751C1.35416 10.0327 1.63398 10.3125 1.97916 10.3125H12.9702L9.87057 13.4123C9.62649 13.6563 9.62649 14.052 9.87057 14.2961C10.1147 14.5402 10.5103 14.5402 10.7544 14.2961L14.9211 10.1294Z" />
                <path d="M11.6383 15.18L15.805 11.0133C16.5373 10.2811 16.5373 9.09391 15.805 8.36166L11.6383 4.195C11.2722 3.82888 10.7923 3.64582 10.3125 3.64582V3.02082C10.3125 2.10035 11.0587 1.35416 11.9792 1.35416H16.9792C17.8997 1.35416 18.6458 2.10035 18.6458 3.02082V16.3542C18.6458 17.2747 17.8997 18.0208 16.9792 18.0208H11.9792C11.0587 18.0208 10.3125 17.2747 10.3125 16.3542V15.7292C10.7923 15.7292 11.2722 15.5461 11.6383 15.18Z" />
              </svg>
            </span>
            <span class="text">Forecast</span>
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

    <!-- ========== section start ========== -->
    <section class="section">
      <div class="container-fluid">
        <!-- ========== title-wrapper start ========== -->
        <div class="title-wrapper pt-30">
          <div class="row align-items-center">
            <div class="col-md-6">
              <div class="title">
                <h2>Dashboard Harga Beras</h2>
              </div>
            </div>
          </div>
          <!-- end row -->
        </div>

        <div class="row">
          <div class="col-xl-4 col-lg-4 col-sm-6">
            <div class="select-style-1">
              <div class="select-position select-sm">
                <select class="light-bg">
                  <option value="">Pilih Bulan</option>
                  <option value="">Januari</option>
                  <option value="">Februari</option>
                  <option value="">Maret</option>
                  <option value="">April</option>
                  <option value="">Mei</option>
                  <option value="">Juni</option>
                  <option value="">Juli</option>
                  <option value="">Agustus</option>
                  <option value="">September</option>
                  <option value="">Oktober</option>
                  <option value="">November</option>
                  <option value="">Desember</option>
                </select>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-4 col-sm-6">
            <div class="select-style-1">
              <div class="select-position select-sm">
                <select class="light-bg">
                  <option value="">Pilih Tahun</option>
                  <option value="">2024</option>
                  <option value="">2023</option>
                  <option value="">2022</option>
                </select>
              </div>
            </div>
          </div>
        </div>



        <!-- ========== title-wrapper end ========== -->
        <div class="row">
          <div class="col-xl-4 col-lg-4 col-sm-6">
            <div class="icon-card mb-30">
              <div class="icon danger">
                <i class="lni lni-stats-down"></i>
              </div>
              <div class="content">
                <h6 class="mb-10">Harga Terendah</h6>
                <h3 class="text-bold mb-10">Rp14.310</h3>
                <p class="text-sm text">
                  1 Januari 2024
                </p>
              </div>
            </div>
            <!-- End Icon Cart -->
          </div>
          <!-- End Col -->
          <div class="col-xl-4 col-lg-4 col-sm-6">
            <div class="icon-card mb-30">
              <div class="icon success">
                <i class="lni lni-stats-up"></i>
              </div>
              <div class="content">
                <h6 class="mb-10">Harga Tertinggi</h6>
                <h3 class="text-bold mb-10">Rp14.950</h3>
                <p class="text-sm text">
                  30 Januari 2024
                </p>
              </div>
            </div>
            <!-- End Icon Cart -->
          </div>
          <!-- End Col -->
          <div class="col-xl-4 col-lg-4 col-sm-6">
            <div class="icon-card mb-30">
              <div class="icon">
                <i class="lni lni-pulse"></i>
              </div>
              <div class="content">
                <h6 class="mb-10">Harga Rata-rata</h6>
                <h3 class="text-bold mb-10">Rp15.937</h3>
                <p class="text-sm text-danger">
                  <i class="lni lni-arrow-down"></i> -2.00%
                </p>
              </div>
            </div>
            <!-- End Icon Cart -->
          </div>
          <!-- End Col -->
        </div>
        <!-- End Row -->
        <div class="row">
          <div class="col-lg-12">
            <div class="card-style mb-30">
              <div class="title d-flex flex-wrap justify-content-between">
                <div class="left">
                  <h6 class="text-medium mb-10">Perkembangan Harga</h6>
                </div>
              </div>
              <!-- End Title -->
              <div class="chart">
                <canvas id="Chart1" style="width: 100%; height: 400px; margin-left: -35px;"></canvas>
              </div>
              <!-- End Chart -->
            </div>
          </div>
          <!-- End Col -->
        </div>
        <!-- End Row -->
      </div>
      <!-- end container -->
    </section>
    <!-- ========== section end ========== -->

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

  <!-- ========= All Javascript files linkup ======== -->
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/Chart.min.js"></script>
  <script src="js/dynamic-pie-chart.js"></script>
  <script src="js/moment.min.js"></script>
  <script src="js/fullcalendar.js"></script>
  <script src="js/jvectormap.min.js"></script>
  <script src="js/world-merc.js"></script>
  <script src="js/polyfill.js"></script>
  <script src="js/main.js"></script>

  <script>
    // ======== jvectormap activation
    var markers = [{
        name: "Egypt",
        coords: [26.8206, 30.8025]
      },
      {
        name: "Russia",
        coords: [61.524, 105.3188]
      },
      {
        name: "Canada",
        coords: [56.1304, -106.3468]
      },
      {
        name: "Greenland",
        coords: [71.7069, -42.6043]
      },
      {
        name: "Brazil",
        coords: [-14.235, -51.9253]
      },
    ];

    var jvm = new jsVectorMap({
      map: "world_merc",
      selector: "#map",
      zoomButtons: true,

      regionStyle: {
        initial: {
          fill: "#d1d5db",
        },
      },

      labels: {
        markers: {
          render: (marker) => marker.name,
        },
      },

      markersSelectable: true,
      selectedMarkers: markers.map((marker, index) => {
        var name = marker.name;

        if (name === "Russia" || name === "Brazil") {
          return index;
        }
      }),
      markers: markers,
      markerStyle: {
        initial: {
          fill: "#4A6CF7"
        },
        selected: {
          fill: "#ff5050"
        },
      },
      markerLabelStyle: {
        initial: {
          fontWeight: 400,
          fontSize: 14,
        },
      },
    });
    // ====== calendar activation
    document.addEventListener("DOMContentLoaded", function() {
      var calendarMiniEl = document.getElementById("calendar-mini");
      var calendarMini = new FullCalendar.Calendar(calendarMiniEl, {
        initialView: "dayGridMonth",
        headerToolbar: {
          end: "today prev,next",
        },
      });
      calendarMini.render();
    });

    // =========== chart one start
    const ctx1 = document.getElementById("Chart1").getContext("2d");
    const chart1 = new Chart(ctx1, {
      type: "line",
      data: {
        labels: [
          "1",
          "2",
          "3",
          "4",
          "5",
          "6",
          "7",
          "8",
          "9",
          "10",
          "11",
          "12",
          "13",
          "14",
          "15",
          "16",
          "17",
          "18",
          "19",
          "20",
          "21",
          "22",
          "23",
          "24",
          "25",
          "26",
          "27",
          "28",
          "29",
        ],
        datasets: [{
          label: "",
          backgroundColor: "transparent",
          borderColor: "#365CF5",
          data: [
            14770,
            14920,
            14750,
            15040,
            14740,
            15250,
            15280,
            15220,
            15260,
            15140,
            15240,
            15330,
            15530,
            15940,
            16290,
            16170,
            16100,
            16140,
            16270,
            16380,
            16160,
            16450,
            16130,
            16350,
            16490,
            16320,
            16560,
            16360,
            16710,
          ],
          pointBackgroundColor: "transparent",
          pointHoverBackgroundColor: "#365CF5",
          pointBorderColor: "transparent",
          pointHoverBorderColor: "#fff",
          pointHoverBorderWidth: 5,
          borderWidth: 5,
          pointRadius: 8,
          pointHoverRadius: 8,
          cubicInterpolationMode: "monotone", // Add this line for curved line
        }, ],
      },
      options: {
        plugins: {
          tooltip: {
            callbacks: {
              labelColor: function(context) {
                return {
                  backgroundColor: "#ffffff",
                  color: "#171717"
                };
              },
            },
            intersect: false,
            backgroundColor: "#f9f9f9",
            title: {
              fontFamily: "Plus Jakarta Sans",
              color: "#8F92A1",
              fontSize: 12,
            },
            body: {
              fontFamily: "Plus Jakarta Sans",
              color: "#171717",
              fontStyle: "bold",
              fontSize: 16,
            },
            multiKeyBackground: "transparent",
            displayColors: false,
            padding: {
              x: 30,
              y: 10,
            },
            bodyAlign: "center",
            titleAlign: "center",
            titleColor: "#8F92A1",
            bodyColor: "#171717",
            bodyFont: {
              family: "Plus Jakarta Sans",
              size: "16",
              weight: "bold",
            },
          },
          legend: {
            display: false,
          },
        },
        responsive: true,
        maintainAspectRatio: false,
        title: {
          display: false,
        },
        scales: {
          y: {
            grid: {
              display: false,
              drawTicks: false,
              drawBorder: false,
            },
            ticks: {
              padding: 35,
              max: 1200,
              min: 500,
            },
          },
          x: {
            grid: {
              drawBorder: false,
              color: "rgba(143, 146, 161, .1)",
              zeroLineColor: "rgba(143, 146, 161, .1)",
            },
            ticks: {
              padding: 20,
            },
          },
        },
      },
    });
    // =========== chart one end
  </script>
</body>

</html>