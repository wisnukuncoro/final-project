<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<section class="section">
  <div class="container-fluid">
    <div class="title-wrapper pt-30">
      <div class="row align-items-center">
        <div class="col-md-10">
          <div class="title">
            <h1>Informasi Model Prediksi Harga Sembako</h1>
          </div>
        </div>
      </div>
      <!-- end row -->
    </div>

    <div class="tables-wrapper">
      <div class="row">
        <div class="col-lg-12">
          <div class="card-style mb-30">
            <p class="text-sm mb-20">
              Algoritma yang digunakan adalah Long Short-Term Memory
            </p>
            <div class="table-wrapper table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>
                      <h6>Jenis Sembako</h6>
                    </th>
                    <th>
                      <h6>Accuracy</h6>
                    </th>
                    <th>
                      <h6>Mean Squared Error (MSE)</h6>
                    </th>
                    <th>
                      <h6>Root Mean Squared Error (RMSE)</h6>
                    </th>
                    <th>
                      <h6>Mean Absolute Error (MAE)</h6>
                    </th>
                    <th>
                      <h6>R-squared (R<sup>2</sup>)</h6>
                    </th>
                  </tr>
                  <!-- end table row-->
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <p>Bawang Merah</p>
                    </td>
                    <td class="center-cols">
                      <p>90%</p>
                    </td>
                    <td>
                      <p>90%</p>
                    </td>
                    <td>
                      <p>90%</p>
                    </td>
                    <td>
                      <p>90%</p>
                    </td>
                    <td>
                      <p>90%</p>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <p>Bawang Putih</p>
                    </td>
                    <td>
                      <p>90%</p>
                    </td>
                    <td>
                      <p>90%</p>
                    </td>
                    <td>
                      <p>90%</p>
                    </td>
                    <td>
                      <p>90%</p>
                    </td>
                    <td>
                      <p>90%</p>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <p>Cabai Merah Keriting</p>
                    </td>
                    <td>
                      <p>90%</p>
                    </td>
                    <td>
                      <p>90%</p>
                    </td>
                    <td>
                      <p>90%</p>
                    </td>
                    <td>
                      <p>90%</p>
                    </td>
                    <td>
                      <p>90%</p>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <p>Cabai Rawit Merah</p>
                    </td>
                    <td>
                      <p>90%</p>
                    </td>
                    <td>
                      <p>90%</p>
                    </td>
                    <td>
                      <p>90%</p>
                    </td>
                    <td>
                      <p>90%</p>
                    </td>
                    <td>
                      <p>90%</p>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <p>Daging Sapi</p>
                    </td>
                    <td>
                      <p>90%</p>
                    </td>
                    <td>
                      <p>90%</p>
                    </td>
                    <td>
                      <p>90%</p>
                    </td>
                    <td>
                      <p>90%</p>
                    </td>
                    <td>
                      <p>90%</p>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <p>Daging Ayam</p>
                    </td>
                    <td>
                      <p>90%</p>
                    </td>
                    <td>
                      <p>90%</p>
                    </td>
                    <td>
                      <p>90%</p>
                    </td>
                    <td>
                      <p>90%</p>
                    </td>
                    <td>
                      <p>90%</p>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <p>Telur Ayam</p>
                    </td>
                    <td>
                      <p>90%</p>
                    </td>
                    <td>
                      <p>90%</p>
                    </td>
                    <td>
                      <p>90%</p>
                    </td>
                    <td>
                      <p>90%</p>
                    </td>
                    <td>
                      <p>90%</p>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <p>Beras</p>
                    </td>
                    <td>
                      <p>90%</p>
                    </td>
                    <td>
                      <p>90%</p>
                    </td>
                    <td>
                      <p>90%</p>
                    </td>
                    <td>
                      <p>90%</p>
                    </td>
                    <td>
                      <p>90%</p>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <p>Minyak Goreng</p>
                    </td>
                    <td>
                      <p>90%</p>
                    </td>
                    <td>
                      <p>90%</p>
                    </td>
                    <td>
                      <p>90%</p>
                    </td>
                    <td>
                      <p>90%</p>
                    </td>
                    <td>
                      <p>90%</p>
                    </td>
                  </tr>
                  <!-- end table row -->
                </tbody>
              </table>
              <!-- end table -->
            </div>
          </div>
          <!-- end card -->
        </div>
        <!-- end col -->
      </div>
      <!-- end row -->

    </div>
</section>

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

<?= $this->endSection(); ?>