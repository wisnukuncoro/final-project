<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<?php $currentDates = date('M Y'); ?>

<!-- ========== section start ========== -->
<section class="section">
  <div class="container-fluid">
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
      <div class="row align-items-center">
        <div class="col-md-10 col-sm-12">
          <div class="title">
            <h1><?= $title; ?></h1>
            <h4 class="mt-15"><?= $currentData['detailedMonth'] . " " . $currentData['year']; ?></h4>
          </div>
          <a href="/scraper"><button id="scrapeData" class="main-btn dark-btn rounded-md btn-hover mb-30 p-3">Input data harga sembako hari ini</button></a>
          <div class="progress mb-30" style="display: none;">
            <div id="progressBar" class="progress-bar bg-success" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>
      </div>
      <!-- end row -->
    </div>
    <!--  -->

    <h6 class="mb-10">Data yang tersedia: </h6>
    <h6 class="mb-20">May 2021 - <?= $currentDates; ?></h6>
    <form action="/dashboard" method="post" id="MyForm">
      <div class="row">
        <div class="col-xl-3 col-lg-3 col-sm-12">
          <div class="select-style-1">
            <div class="select-position select-sm">
              <select class="light-bg" name="month" id="month">
                <?php for ($i = 1; $i <= 12; $i++) : ?>
                  <option value="<?= $i ?>" <?= $i == $currentData['month'] ? 'selected' : '' ?>>
                    <?= date('F', mktime(0, 0, 0, $i, 1)) ?>
                  </option>
                <?php endfor; ?>
              </select>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-sm-12">
          <div class="select-style-1">
            <div class="select-position select-sm">
              <select class="light-bg w-100" name="year" id="year">
                <?php for ($i = 2021; $i <= 2024; $i++) : ?>
                  <option value="<?= $i ?>" <?= $i == $currentData['year'] ? 'selected' : '' ?>>
                    <?= $i ?>
                  </option>
                <?php endfor; ?>
              </select>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-sm-12">
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
        <div class="col-xl-3 col-lg-3 col-sm-6">
          <button type="submit" class="main-btn dark-btn rounded-md btn-hover p-2" value="Submit">Submit</button>
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
            <h3 class="text-bold mb-10">Rp<?= number_format($currentData['lowestPrice'], 0, ',', '.'); ?></h3>
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
            <h3 class="text-bold mb-10">Rp<?= number_format($currentData['highestPrice'], 0, ',', '.'); ?></h3>
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

<!-- ========= All Javascript files linkup ======== -->
<script src="/js/bootstrap.bundle.min.js"></script>
<script src="/js/Chart.min.js"></script>
<script src="/js/dynamic-pie-chart.js"></script>
<script src="/js/moment.min.js"></script>
<script src="/js/fullcalendar.js"></script>
<script src="/js/jvectormap.min.js"></script>
<script src="/js/world-merc.js"></script>
<script src="/js/polyfill.js"></script>
<script src="/js/main.js"></script>

<script>
  document.getElementById('scrapeData').addEventListener('click', function() {
    var progressBar = document.getElementById('progressBar');
    var progressContainer = document.querySelector('.progress');
    var startTime = Date.now();
    var duration = 20000; // 10 seconds

    progressContainer.style.display = 'block';
    progressBar.style.width = '0%';
    progressBar.setAttribute('aria-valuenow', 0);

    function updateProgress() {
      var elapsedTime = Date.now() - startTime;
      var progress = Math.min((elapsedTime / duration) * 100, 100);
      progressBar.style.width = progress + '%';
      progressBar.setAttribute('aria-valuenow', progress);

      if (progress < 100) {
        requestAnimationFrame(updateProgress);
      }
    }

    updateProgress();
  });
</script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const modalElement = document.getElementById('errorModal');
    const modal = new bootstrap.Modal(modalElement);
    // Check if there is a flash message
    <?php if (session()->getFlashdata('message')): ?>
      var message = <?= json_encode(session()->getFlashdata('message')); ?>;
      var type = <?= json_encode(session()->getFlashdata('type')); ?>;
      // Set the message and show the modal
      document.querySelector('#errorModal .modal-body .message').textContent = message;
      document.querySelector('#errorModal .modal-body .title').textContent = type;
      modal.show();
    <?php endif; ?>
  });
</script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const availableDates = <?php echo json_encode($availableDates); ?>;
    const modalElement = document.getElementById('ModalOne');
    const modal = new bootstrap.Modal(modalElement);

    document.getElementById('MyForm').addEventListener('submit', function(event) {
      // Mencegah form submit
      event.preventDefault();

      // Menangkap nilai input
      let year = document.getElementById('year').value;
      let month = document.getElementById('month').value;

      let monthYear = year + "-" + month;

      if (!availableDates.includes(monthYear)) {
        modal.show();
      } else {
        this.submit();
      }
    });
  });
</script>

<script>
  // =========== chart one start
  <?php if (count($currentData['days']) > count($comparedData['days'])) {
    $labels = $currentData['days'];
  } else {
    $labels = $comparedData['days'];
  }; ?>

  var labels = [
    <?php foreach ($labels as $label) : ?> "<?php echo $label; ?>",
    <?php endforeach; ?>
  ];

  var currentPrices = [
    <?php foreach ($currentData['prices'] as $price) : ?> "<?php echo $price; ?>",
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
      labels: labels,
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