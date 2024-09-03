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
            <p class="text-xl mb-20">
              Hyperparameter yang digunakan
            </p>
            <div class="table-wrapper table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>
                      <p>Parameter</p>
                    </th>
                    <th>
                      <p>Value</p>
                    </th>
                  </tr>
                  <!-- end table row-->
                </thead>
                <tbody>
                  <tr>
                    <th>
                      <p>Optimizer</p>
                    </th>
                    <th>
                      <p>Adam</p>
                    </th>
                  </tr>
                  <tr>
                    <th>
                      <p>Loss Function</p>
                    </th>
                    <th>
                      <p>Mean Squared Error</p>
                    </th>
                  </tr>
                  <tr>
                    <th>
                      <p>Epoch</p>
                    </th>
                    <th>
                      <p>20</p>
                    </th>
                  </tr>
                  <tr>
                    <th>
                      <p>Batch Size</p>
                    </th>
                    <th>
                      <p>32</p>
                    </th>
                  </tr>
                  <tr>
                    <th>
                      <p>Validation Data</p>
                    </th>
                    <th>
                      <p>valX, valY</p>
                    </th>
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

    <div class="tables-wrapper">
      <div class="row">
        <div class="col-lg-12">
          <div class="card-style mb-30">
            <p class="text-sm mb-20">
              Arsitektur Model
            </p>
            <div class="table-wrapper table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>
                      <p>Layer</p>
                    </th>
                    <th>
                      <p>Tipe Layer</p>
                    </th>
                    <th>
                      <p>Units</p>
                    </th>
                    <th>
                      <p>Return Sequences</p>
                    </th>
                    <th>
                      <p>Activation</p>
                    </th>
                  </tr>
                  <!-- end table row-->
                </thead>
                <tbody>
                  <tr>
                    <th>
                      <p>Input Layer</p>
                    </th>
                    <th>
                      <p>Input</p>
                    </th>
                    <th>
                      <p> - </p>
                    </th>
                    <th>
                      <p> - </p>
                    </th>
                    <th>
                      <p> - </p>
                    </th>
                  </tr>
                  <tr>
                    <th>
                      <p>Hidden Layer 1</p>
                    </th>
                    <th>
                      <p>LSTM</p>
                    </th>
                    <th>
                      <p>256</p>
                    </th>
                    <th>
                      <p>True</p>
                    </th>
                    <th>
                      <p>Tanh (Default)</p>
                    </th>
                  </tr>
                  <tr>
                    <th>
                      <p>Hidden Layer 2</p>
                    </th>
                    <th>
                      <p>LSTM</p>
                    </th>
                    <th>
                      <p>256</p>
                    </th>
                    <th>
                      <p>True</p>
                    </th>
                    <th>
                      <p>Tanh (Default)</p>
                    </th>
                  </tr>
                  <tr>
                    <th>
                      <p>Hidden Layer 3</p>
                    </th>
                    <th>
                      <p>LSTM</p>
                    </th>
                    <th>
                      <p>256</p>
                    </th>
                    <th>
                      <p>False</p>
                    </th>
                    <th>
                      <p>Tanh (Default)</p>
                    </th>
                  </tr>
                  <tr>
                    <th>
                      <p>Output Layer</p>
                    </th>
                    <th>
                      <p>Dense</p>
                    </th>
                    <th>
                      <p>1</p>
                    </th>
                    <th>
                      <p> - </p>
                    </th>
                    <th>
                      <p>ReLU</p>
                    </th>
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


    <h4 class="mb-20">Performa Model</h4>

    <h6 class="mb-10">Bawang Merah</h6>
    <div class="row">
      <div class="col-xl-3 col-lg-3 col-sm-6">
        <div class="icon-card mb-30">
          <div class="content">
            <h6 class="mb-10">Mean Squared <br>Error</h6>
            <h3 class="text-bold mb-10">0.02871</h3>
          </div>
        </div>
        <!-- End Icon Cart -->
      </div>
      <!-- End Col -->
      <div class="col-xl-3 col-lg-3 col-sm-6">
        <div class="icon-card mb-30">
          <div class="content">
            <h6 class="mb-10">Mean Absolute <br>Error</h6>
            <h3 class="text-bold mb-10">0.12687</h3>
          </div>
        </div>
        <!-- End Icon Cart -->
      </div>
      <!-- End Col -->
      <div class="col-xl-3 col-lg-3 col-sm-6">
        <div class="icon-card mb-30">
          <div class="content">
            <h6 class="mb-10">Root Mean <br>Squared Error</h6>
            <h3 class="text-bold mb-10">0.16945</h3>
          </div>
        </div>
        <!-- End Icon Cart -->
      </div>
      <!-- End Col -->
       <div class="col-xl-3 col-lg-3 col-sm-6">
        <div class="icon-card mb-30">
          <div class="content">
            <h6 class="mb-10">Mean Absolute Percentage Error</h6>
            <h3 class="text-bold mb-10">17.89303</h3>
          </div>
        </div>
        <!-- End Icon Cart -->
      </div>
      <!-- End Col -->
    </div>
    <!-- End Row -->

    <h6 class="mb-10">Bawang Putih</h6>
    <div class="row">
      <div class="col-xl-3 col-lg-3 col-sm-6">
        <div class="icon-card mb-30">
          <div class="content">
            <h6 class="mb-10">Mean Squared <br>Error</h6>
            <h3 class="text-bold mb-10">0.00659</h3>
          </div>
        </div>
        <!-- End Icon Cart -->
      </div>
      <!-- End Col -->
      <div class="col-xl-3 col-lg-3 col-sm-6">
        <div class="icon-card mb-30">
          <div class="content">
            <h6 class="mb-10">Mean Absolute <br>Error</h6>
            <h3 class="text-bold mb-10">0.06962</h3>
          </div>
        </div>
        <!-- End Icon Cart -->
      </div>
      <!-- End Col -->
      <div class="col-xl-3 col-lg-3 col-sm-6">
        <div class="icon-card mb-30">
          <div class="content">
            <h6 class="mb-10">Root Mean <br>Squared Error</h6>
            <h3 class="text-bold mb-10">0.08123</h3>
          </div>
        </div>
        <!-- End Icon Cart -->
      </div>
      <!-- End Col -->
       <div class="col-xl-3 col-lg-3 col-sm-6">
        <div class="icon-card mb-30">
          <div class="content">
            <h6 class="mb-10">Mean Absolute Percentage Error</h6>
            <h3 class="text-bold mb-10">8.39094</h3>
          </div>
        </div>
        <!-- End Icon Cart -->
      </div>
      <!-- End Col -->
    </div>
    <!-- End Row -->

    <h6 class="mb-10">Cabai Merah Keriting</h6>
    <div class="row">
      <div class="col-xl-3 col-lg-3 col-sm-6">
        <div class="icon-card mb-30">
          <div class="content">
            <h6 class="mb-10">Mean Squared <br>Error</h6>
            <h3 class="text-bold mb-10">0.00608</h3>
          </div>
        </div>
        <!-- End Icon Cart -->
      </div>
      <!-- End Col -->
      <div class="col-xl-3 col-lg-3 col-sm-6">
        <div class="icon-card mb-30">
          <div class="content">
            <h6 class="mb-10">Mean Absolute <br>Error</h6>
            <h3 class="text-bold mb-10">0.0607</h3>
          </div>
        </div>
        <!-- End Icon Cart -->
      </div>
      <!-- End Col -->
      <div class="col-xl-3 col-lg-3 col-sm-6">
        <div class="icon-card mb-30">
          <div class="content">
            <h6 class="mb-10">Root Mean <br>Squared Error</h6>
            <h3 class="text-bold mb-10">0.07802</h3>
          </div>
        </div>
        <!-- End Icon Cart -->
      </div>
      <!-- End Col -->
       <div class="col-xl-3 col-lg-3 col-sm-6">
        <div class="icon-card mb-30">
          <div class="content">
            <h6 class="mb-10">Mean Absolute Percentage Error</h6>
            <h3 class="text-bold mb-10">18.48</h3>
          </div>
        </div>
        <!-- End Icon Cart -->
      </div>
      <!-- End Col -->
    </div>
    <!-- End Row -->

    <h6 class="mb-10">Cabai Rawit Merah</h6>
    <div class="row">
      <div class="col-xl-3 col-lg-3 col-sm-6">
        <div class="icon-card mb-30">
          <div class="content">
            <h6 class="mb-10">Mean Squared <br>Error</h6>
            <h3 class="text-bold mb-10">0.00585</h3>
          </div>
        </div>
        <!-- End Icon Cart -->
      </div>
      <!-- End Col -->
      <div class="col-xl-3 col-lg-3 col-sm-6">
        <div class="icon-card mb-30">
          <div class="content">
            <h6 class="mb-10">Mean Absolute <br>Error</h6>
            <h3 class="text-bold mb-10">0.06727</h3>
          </div>
        </div>
        <!-- End Icon Cart -->
      </div>
      <!-- End Col -->
      <div class="col-xl-3 col-lg-3 col-sm-6">
        <div class="icon-card mb-30">
          <div class="content">
            <h6 class="mb-10">Root Mean <br>Squared Error</h6>
            <h3 class="text-bold mb-10">0.07654</h3>
          </div>
        </div>
        <!-- End Icon Cart -->
      </div>
      <!-- End Col -->
       <div class="col-xl-3 col-lg-3 col-sm-6">
        <div class="icon-card mb-30">
          <div class="content">
            <h6 class="mb-10">Mean Absolute Percentage Error</h6>
            <h3 class="text-bold mb-10">19.21</h3>
          </div>
        </div>
        <!-- End Icon Cart -->
      </div>
      <!-- End Col -->
    </div>
    <!-- End Row -->

    <h6 class="mb-10">Daging Sapi</h6>
    <div class="row">
      <div class="col-xl-3 col-lg-3 col-sm-6">
        <div class="icon-card mb-30">
          <div class="content">
            <h6 class="mb-10">Mean Squared <br>Error</h6>
            <h3 class="text-bold mb-10">0.002</h3>
          </div>
        </div>
        <!-- End Icon Cart -->
      </div>
      <!-- End Col -->
      <div class="col-xl-3 col-lg-3 col-sm-6">
        <div class="icon-card mb-30">
          <div class="content">
            <h6 class="mb-10">Mean Absolute <br>Error</h6>
            <h3 class="text-bold mb-10">0.03524</h3>
          </div>
        </div>
        <!-- End Icon Cart -->
      </div>
      <!-- End Col -->
      <div class="col-xl-3 col-lg-3 col-sm-6">
        <div class="icon-card mb-30">
          <div class="content">
            <h6 class="mb-10">Root Mean <br>Squared Error</h6>
            <h3 class="text-bold mb-10">0.04475</h3>
          </div>
        </div>
        <!-- End Icon Cart -->
      </div>
      <!-- End Col -->
       <div class="col-xl-3 col-lg-3 col-sm-6">
        <div class="icon-card mb-30">
          <div class="content">
            <h6 class="mb-10">Mean Absolute Percentage Error</h6>
            <h3 class="text-bold mb-10">8.79</h3>
          </div>
        </div>
        <!-- End Icon Cart -->
      </div>
      <!-- End Col -->
    </div>
    <!-- End Row -->

    <h6 class="mb-10">Daging Ayam</h6>
    <div class="row">
      <div class="col-xl-3 col-lg-3 col-sm-6">
        <div class="icon-card mb-30">
          <div class="content">
            <h6 class="mb-10">Mean Squared <br>Error</h6>
            <h3 class="text-bold mb-10">0.00356</h3>
          </div>
        </div>
        <!-- End Icon Cart -->
      </div>
      <!-- End Col -->
      <div class="col-xl-3 col-lg-3 col-sm-6">
        <div class="icon-card mb-30">
          <div class="content">
            <h6 class="mb-10">Mean Absolute <br>Error</h6>
            <h3 class="text-bold mb-10">0.04423</h3>
          </div>
        </div>
        <!-- End Icon Cart -->
      </div>
      <!-- End Col -->
      <div class="col-xl-3 col-lg-3 col-sm-6">
        <div class="icon-card mb-30">
          <div class="content">
            <h6 class="mb-10">Root Mean <br>Squared Error</h6>
            <h3 class="text-bold mb-10">0.05972</h3>
          </div>
        </div>
        <!-- End Icon Cart -->
      </div>
      <!-- End Col -->
       <div class="col-xl-3 col-lg-3 col-sm-6">
        <div class="icon-card mb-30">
          <div class="content">
            <h6 class="mb-10">Mean Absolute Percentage Error</h6>
            <h3 class="text-bold mb-10">15.89</h3>
          </div>
        </div>
        <!-- End Icon Cart -->
      </div>
      <!-- End Col -->
    </div>
    <!-- End Row -->

    <h6 class="mb-10">Telur Ayam</h6>
    <div class="row">
      <div class="col-xl-3 col-lg-3 col-sm-6">
        <div class="icon-card mb-30">
          <div class="content">
            <h6 class="mb-10">Mean Squared <br>Error</h6>
            <h3 class="text-bold mb-10">0.00234</h3>
          </div>
        </div>
        <!-- End Icon Cart -->
      </div>
      <!-- End Col -->
      <div class="col-xl-3 col-lg-3 col-sm-6">
        <div class="icon-card mb-30">
          <div class="content">
            <h6 class="mb-10">Mean Absolute <br>Error</h6>
            <h3 class="text-bold mb-10">0.02590</h3>
          </div>
        </div>
        <!-- End Icon Cart -->
      </div>
      <!-- End Col -->
      <div class="col-xl-3 col-lg-3 col-sm-6">
        <div class="icon-card mb-30">
          <div class="content">
            <h6 class="mb-10">Root Mean <br>Squared Error</h6>
            <h3 class="text-bold mb-10">0.03677</h3>
          </div>
        </div>
        <!-- End Icon Cart -->
      </div>
      <!-- End Col -->
       <div class="col-xl-3 col-lg-3 col-sm-6">
        <div class="icon-card mb-30">
          <div class="content">
            <h6 class="mb-10">Mean Absolute Percentage Error</h6>
            <h3 class="text-bold mb-10">12.64</h3>
          </div>
        </div>
        <!-- End Icon Cart -->
      </div>
      <!-- End Col -->
    </div>
    <!-- End Row -->

    <h6 class="mb-10">Beras</h6>
    <div class="row">
      <div class="col-xl-3 col-lg-3 col-sm-6">
        <div class="icon-card mb-30">
          <div class="content">
            <h6 class="mb-10">Mean Squared <br>Error</h6>
            <h3 class="text-bold mb-10">0.00948</h3>
          </div>
        </div>
        <!-- End Icon Cart -->
      </div>
      <!-- End Col -->
      <div class="col-xl-3 col-lg-3 col-sm-6">
        <div class="icon-card mb-30">
          <div class="content">
            <h6 class="mb-10">Mean Absolute <br>Error</h6>
            <h3 class="text-bold mb-10">0.12056</h3>
          </div>
        </div>
        <!-- End Icon Cart -->
      </div>
      <!-- End Col -->
      <div class="col-xl-3 col-lg-3 col-sm-6">
        <div class="icon-card mb-30">
          <div class="content">
            <h6 class="mb-10">Root Mean <br>Squared Error</h6>
            <h3 class="text-bold mb-10">0.09216</h3>
          </div>
        </div>
        <!-- End Icon Cart -->
      </div>
      <!-- End Col -->
       <div class="col-xl-3 col-lg-3 col-sm-6">
        <div class="icon-card mb-30">
          <div class="content">
            <h6 class="mb-10">Mean Absolute Percentage Error</h6>
            <h3 class="text-bold mb-10">9.32</h3>
          </div>
        </div>
        <!-- End Icon Cart -->
      </div>
      <!-- End Col -->
    </div>
    <!-- End Row -->

    <h6 class="mb-10">Minyak Goreng</h6>
    <div class="row">
      <div class="col-xl-3 col-lg-3 col-sm-6">
        <div class="icon-card mb-30">
          <div class="content">
            <h6 class="mb-10">Mean Squared <br>Error</h6>
            <h3 class="text-bold mb-10">0.00152</h3>
          </div>
        </div>
        <!-- End Icon Cart -->
      </div>
      <!-- End Col -->
      <div class="col-xl-3 col-lg-3 col-sm-6">
        <div class="icon-card mb-30">
          <div class="content">
            <h6 class="mb-10">Mean Absolute <br>Error</h6>
            <h3 class="text-bold mb-10">0.00321</h3>
          </div>
        </div>
        <!-- End Icon Cart -->
      </div>
      <!-- End Col -->
      <div class="col-xl-3 col-lg-3 col-sm-6">
        <div class="icon-card mb-30">
          <div class="content">
            <h6 class="mb-10">Root Mean <br>Squared Error</h6>
            <h3 class="text-bold mb-10">0.01924</h3>
          </div>
        </div>
        <!-- End Icon Cart -->
      </div>
      <!-- End Col -->
       <div class="col-xl-3 col-lg-3 col-sm-6">
        <div class="icon-card mb-30">
          <div class="content">
            <h6 class="mb-10">Mean Absolute Percentage Error</h6>
            <h3 class="text-bold mb-10">6.42</h3>
          </div>
        </div>
        <!-- End Icon Cart -->
      </div>
      <!-- End Col -->
    </div>
    <!-- End Row -->

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