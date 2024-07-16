<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<!-- ========== section start ========== -->
<section class="section">
  <div class="container-fluid">
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
      <div class="row align-items-center">
        <div class="col-md-6">
          <div class="title">
            <h2>Prediksi Harga Beras</h2>
          </div>
        </div>
      </div>
      <!-- end row -->
    </div>

    <?php
    $currentMonth = date('n'); // Bulan (1-12)
    $currentYear = date('Y'); // Tahun (4 digit)
    ?>

    <form action="/dashboard/filter" method="post" name="filter">
      <div class="row">
        <div class="col-xl-3 col-lg-4 col-sm-6">
          <div class="select-style-1">
            <div class="select-position select-sm">
              <select class="light-bg" name="month">
                <?php for ($i = 1; $i <= 12; $i++) : ?>
                  <option value="<?= $i ?>" <?= $i == $currentMonth ? 'selected' : '' ?>>
                    <?= date('F', mktime(0, 0, 0, $i, 1)) ?>
                  </option>
                <?php endfor; ?>
              </select>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-sm-6">
          <div class="select-style-1">
            <div class="select-position select-sm">
              <select class="light-bg w-100" name="year">
                <?php for ($i = 2021; $i <= 2024; $i++) : ?>
                  <option value="<?= $i ?>" <?= $i == $currentYear ? 'selected' : '' ?>>
                    <?= $i ?>
                  </option>
                <?php endfor; ?>
              </select>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-sm-6">
          <div class="select-style-1">
            <div class="select-position select-sm">
              <select class="light-bg w-100" name="foodType">
                <option value="bawang_merah" selected>Bawang Merah</option>
                <option value="bawang_putih">Bawang Putih</option>
                <option value="cabai_rawit_merah">Cabai Rawit Merah</option>
                <option value="daging_sapi">Daging Sapi</option>
                <option value="daging_ayam">Daging Ayam</option>
                <option value="telur_ayam">Telur Ayam</option>
                <option value="beras">Beras</option>
                <option value="minyak_goreng">Minyak Goreng</option>
              </select>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-sm-6">
          <button type="submit" class="main-btn submit-btn">Submit</button>
        </div>
      </div>
    </form>

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
          <div class="icon primary">
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
<script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@latest/dist/tf.min.js"></script>

<script>
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

  // =========== chart two start
  const ctx2 = document.getElementById("Chart2").getContext("2d");
  const chart2 = new Chart(ctx2, {
    type: "bar",
    data: {
      labels: [
        "Jan",
        "Fab",
        "Mar",
        "Apr",
        "May",
        "Jun",
        "Jul",
        "Aug",
        "Sep",
        "Oct",
        "Nov",
        "Dec",
      ],
      datasets: [{
        label: "",
        backgroundColor: "#365CF5",
        borderRadius: 30,
        barThickness: 6,
        maxBarThickness: 8,
        data: [
          600, 700, 1000, 700, 650, 800, 690, 740, 720, 1120, 876, 900,
        ],
      }, ],
    },
    options: {
      plugins: {
        tooltip: {
          callbacks: {
            titleColor: function(context) {
              return "#8F92A1";
            },
            label: function(context) {
              let label = context.dataset.label || "";

              if (label) {
                label += ": ";
              }
              label += context.parsed.y;
              return label;
            },
          },
          backgroundColor: "#F3F6F8",
          titleAlign: "center",
          bodyAlign: "center",
          titleFont: {
            size: 12,
            weight: "bold",
            color: "#8F92A1",
          },
          bodyFont: {
            size: 16,
            weight: "bold",
            color: "#171717",
          },
          displayColors: false,
          padding: {
            x: 30,
            y: 10,
          },
        },
      },
      legend: {
        display: false,
      },
      legend: {
        display: false,
      },
      layout: {
        padding: {
          top: 15,
          right: 15,
          bottom: 15,
          left: 15,
        },
      },
      responsive: true,
      maintainAspectRatio: false,
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
            min: 0,
          },
        },
        x: {
          grid: {
            display: false,
            drawBorder: false,
            color: "rgba(143, 146, 161, .1)",
            drawTicks: false,
            zeroLineColor: "rgba(143, 146, 161, .1)",
          },
          ticks: {
            padding: 20,
          },
        },
      },
      plugins: {
        legend: {
          display: false,
        },
        title: {
          display: false,
        },
      },
    },
  });
  // =========== chart two end

  // =========== chart three start
  const ctx3 = document.getElementById("Chart3").getContext("2d");
  const chart3 = new Chart(ctx3, {
    type: "line",
    data: {
      labels: [
        "Jan",
        "Feb",
        "Mar",
        "Apr",
        "May",
        "Jun",
        "Jul",
        "Aug",
        "Sep",
        "Oct",
        "Nov",
        "Dec",
      ],
      datasets: [{
          label: "Revenue",
          backgroundColor: "transparent",
          borderColor: "#365CF5",
          data: [80, 120, 110, 100, 130, 150, 115, 145, 140, 130, 160, 210],
          pointBackgroundColor: "transparent",
          pointHoverBackgroundColor: "#365CF5",
          pointBorderColor: "transparent",
          pointHoverBorderColor: "#365CF5",
          pointHoverBorderWidth: 3,
          pointBorderWidth: 5,
          pointRadius: 5,
          pointHoverRadius: 8,
          fill: false,
          tension: 0.4,
        },
        {
          label: "Profit",
          backgroundColor: "transparent",
          borderColor: "#9b51e0",
          data: [
            120, 160, 150, 140, 165, 210, 135, 155, 170, 140, 130, 200,
          ],
          pointBackgroundColor: "transparent",
          pointHoverBackgroundColor: "#9b51e0",
          pointBorderColor: "transparent",
          pointHoverBorderColor: "#9b51e0",
          pointHoverBorderWidth: 3,
          pointBorderWidth: 5,
          pointRadius: 5,
          pointHoverRadius: 8,
          fill: false,
          tension: 0.4,
        },
        {
          label: "Order",
          backgroundColor: "transparent",
          borderColor: "#f2994a",
          data: [180, 110, 140, 135, 100, 90, 145, 115, 100, 110, 115, 150],
          pointBackgroundColor: "transparent",
          pointHoverBackgroundColor: "#f2994a",
          pointBorderColor: "transparent",
          pointHoverBorderColor: "#f2994a",
          pointHoverBorderWidth: 3,
          pointBorderWidth: 5,
          pointRadius: 5,
          pointHoverRadius: 8,
          fill: false,
          tension: 0.4,
        },
      ],
    },
    options: {
      plugins: {
        tooltip: {
          intersect: false,
          backgroundColor: "#fbfbfb",
          titleColor: "#8F92A1",
          bodyColor: "#272727",
          titleFont: {
            size: 16,
            family: "Plus Jakarta Sans",
            weight: "400",
          },
          bodyFont: {
            family: "Plus Jakarta Sans",
            size: 16,
          },
          multiKeyBackground: "transparent",
          displayColors: false,
          padding: {
            x: 30,
            y: 15,
          },
          borderColor: "rgba(143, 146, 161, .1)",
          borderWidth: 1,
          enabled: true,
        },
        title: {
          display: false,
        },
        legend: {
          display: false,
        },
      },
      layout: {
        padding: {
          top: 0,
        },
      },
      responsive: true,
      // maintainAspectRatio: false,
      legend: {
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
          },
          max: 350,
          min: 50,
        },
        x: {
          grid: {
            drawBorder: false,
            color: "rgba(143, 146, 161, .1)",
            drawTicks: false,
            zeroLineColor: "rgba(143, 146, 161, .1)",
          },
          ticks: {
            padding: 20,
          },
        },
      },
    },
  });
  // =========== chart three end

  // ================== chart four start
  const ctx4 = document.getElementById("Chart4").getContext("2d");
  const chart4 = new Chart(ctx4, {
    type: "bar",
    data: {
      labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
      datasets: [{
          label: "",
          backgroundColor: "#365CF5",
          borderColor: "transparent",
          borderRadius: 20,
          borderWidth: 5,
          barThickness: 20,
          maxBarThickness: 20,
          data: [600, 700, 1000, 700, 650, 800],
        },
        {
          label: "",
          backgroundColor: "#d50100",
          borderColor: "transparent",
          borderRadius: 20,
          borderWidth: 5,
          barThickness: 20,
          maxBarThickness: 20,
          data: [690, 740, 720, 1120, 876, 900],
        },
      ],
    },
    options: {
      plugins: {
        tooltip: {
          backgroundColor: "#F3F6F8",
          titleColor: "#8F92A1",
          titleFontSize: 12,
          bodyColor: "#171717",
          bodyFont: {
            weight: "bold",
            size: 16,
          },
          multiKeyBackground: "transparent",
          displayColors: false,
          padding: {
            x: 30,
            y: 10,
          },
          bodyAlign: "center",
          titleAlign: "center",
          enabled: true,
        },
        legend: {
          display: false,
        },
      },
      layout: {
        padding: {
          top: 0,
        },
      },
      responsive: true,
      // maintainAspectRatio: false,
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
            min: 0,
          },
        },
        x: {
          grid: {
            display: false,
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
  // =========== chart four end
</script>

<?= $this->endSection(); ?>