<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<!-- ========== section start ========== -->
<section class="section">
  <div class="container-fluid">
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
      <div class="row align-items-center">
        <div class="col-md-10">
          <div class="title">
            <h1><?= $title; ?></h1>
            <h4 class="mt-15"><?= $currentData['detailedMonth'] . " " . $currentData['year']; ?></h4>
          </div>
        </div>
      </div>
      <!-- end row -->
    </div>

    <a href="/scraper"><button class="main-btn submit-btn mb-30">Input data harga sembako hari ini</button></a>

    <form action="/dashboard" method="post">
      <div class="row">
        <div class="col-xl-3 col-lg-4 col-sm-6">
          <div class="select-style-1">
            <div class="select-position select-sm">
              <select class="light-bg" name="month">
                <?php for ($i = 1; $i <= 12; $i++) : ?>
                  <option value="<?= $i ?>" <?= $i == $currentData['month'] ? 'selected' : '' ?>>
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
                  <option value="<?= $i ?>" <?= $i == $currentData['year'] ? 'selected' : '' ?>>
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
                <option value="bawang_merah" <?= 'bawang_merah' == $foodType ? 'selected' : '' ?>>Bawang Merah</option>
                <option value="bawang_putih" <?= 'bawang_putih' == $foodType ? 'selected' : '' ?>>Bawang Putih</option>
                <option value="cabai_merah_keriting" <?= 'cabai_merah_keriting' == $foodType ? 'selected' : '' ?>>Cabai Merah Keriting </option>
                <option value="cabai_rawit_merah" <?= 'cabai_rawit_merah' == $foodType ? 'selected' : '' ?>>Cabai Rawit Merah</option>
                <option value="daging_sapi" <?= 'daging_sapi' == $foodType ? 'selected' : '' ?>>Daging Sapi</option>
                <option value="daging_ayam" <?= 'daging_ayam' == $foodType ? 'selected' : '' ?>>Daging Ayam</option>
                <option value="telur_ayam" <?= 'telur_ayam' == $foodType ? 'selected' : '' ?>>Telur Ayam</option>
                <option value="beras" <?= 'beras' == $foodType ? 'selected' : '' ?>>Beras</option>
                <option value="minyak_goreng" <?= 'minyak_goreng' == $foodType ? 'selected' : '' ?>>Minyak Goreng</option>
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
            <h3 class="text-bold mb-10">Rp<?= number_format($currentData['lowestPrice'], 0, ',', '.');; ?></h3>
            <p class="text-sm text">
              <?php echo $currentData['lowestPriceDate'] . " " . $currentData['detailedMonth'] . " " . $currentData['year'] ?>
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
            <h3 class="text-bold mb-10">Rp<?= number_format($currentData['highestPrice'], 0, ',', '.');; ?></h3>
            <p class="text-sm text">
              <?php echo $currentData['highestPriceDate'] . " " . $currentData['detailedMonth'] . " " . $currentData['year'] ?>
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
            <h3 class="text-bold mb-10">Rp<?= number_format($currentData['averagePrice'], 0, ',', '.'); ?></h3>
            <p class="text-sm <?= ($percentageOfPriceChanges > 0) ? 'text-success' : 'text-danger'; ?>">
              <i class="lni <?= ($percentageOfPriceChanges > 0) ? 'lni-arrow-up' : 'lni-arrow-down'; ?>"></i> <?= number_format($percentageOfPriceChanges, 2); ?>% dibanding bulan lalu
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
              <h6 class="text-medium mb-30">Perkembangan Harga</h6>
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

<script>
  // =========== chart one start
  var currentLabels = [
    <?php foreach ($currentData['days'] as $day) : ?> "<?php echo $day; ?>",
    <?php endforeach; ?>
  ];

  var currentPrices = [
    <?php foreach ($currentData['prices'] as $price) : ?> "<?php echo $price; ?>",
    <?php endforeach; ?>
  ];

  var comparedLabels = [
    <?php foreach ($comparedData['days'] as $day) : ?> "<?php echo $day; ?>",
    <?php endforeach; ?>
  ];

  var comparedPrices = [
    <?php foreach ($comparedData['prices'] as $price) : ?> "<?php echo $price; ?>",
    <?php endforeach; ?>
  ];

  const ctx1 = document.getElementById("Chart1").getContext("2d");
  const chart1 = new Chart(ctx1, {
    type: "line",
    data: {
      labels: currentLabels,
      datasets: [{
        label: "<?php echo $currentData['detailedMonth'] ?>",
        backgroundColor: "transparent",
        borderColor: "#EEEEEE",
        data: currentPrices,
        pointBackgroundColor: "transparent",
        pointHoverBackgroundColor: "#000",
        pointBorderColor: "transparent",
        pointHoverBorderColor: "#eee",
        pointHoverBorderWidth: 5,
        borderWidth: 5,
        pointRadius: 8,
        pointHoverRadius: 8,
        cubicInterpolationMode: "monotone", // Add this line for curved line
      }, {
        label: "<?php echo $comparedData['detailedMonth'] ?>",
        backgroundColor: "transparent",
        borderColor: "#76ABAE",
        data: comparedPrices,
        pointBackgroundColor: "transparent",
        pointHoverBackgroundColor: "#fff",
        pointBorderColor: "transparent",
        pointHoverBorderColor: "#76ABAE",
        pointHoverBorderWidth: 5,
        borderWidth: 5,
        pointRadius: 8,
        pointHoverRadius: 8,
        cubicInterpolationMode: "monotone", // Add this line for curved line
      }],
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
          display: true,
          position: 'top',
          labels: {
            color: "#fff",
            padding: 40,
            boxWidth: 2,
          },
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
            color: "#fff",
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
            color: "#fff",
          },
        },
      },
    },
  });
  // =========== chart one end
</script>

<?= $this->endSection(); ?>