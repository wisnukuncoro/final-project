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
              Metrik Evaluasi Pada Data Uji
            </p>
            <div class="table-wrapper table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>
                      <h6>Jenis Sembako</h6>
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
                    <td>
                      <p>0.0023</p>
                    </td>
                    <td>
                      <p>0.045</p>
                    </td>
                    <td>
                      <p>0.029</p>
                    </td>
                    <td>
                      <p>0.052</p>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <p>Bawang Putih</p>
                    </td>
                    <td>
                      <p>0.032</p>
                    </td>
                    <td>
                      <p>0.015</p>
                    </td>
                    <td>
                      <p>0.067</p>
                    </td>
                    <td>
                      <p>0.040</p>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <p>Cabai Merah Keriting</p>
                    </td>
                    <td>
                      <p>0.03</p>
                    </td>
                    <td>
                      <p>0.021</p>
                    </td>
                    <td>
                      <p>0.024</p>
                    </td>
                    <td>
                      <p>0.053</p>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <p>Cabai Rawit Merah</p>
                    </td>
                    <td>
                      <p>0.042</p>
                    </td>
                    <td>
                      <p>0.024</p>
                    </td>
                    <td>
                      <p>0.031</p>
                    </td>
                    <td>
                      <p>0.018</p>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <p>Daging Sapi</p>
                    </td>
                    <td>
                      <p>0.026</p>
                    </td>
                    <td>
                      <p>0.031</p>
                    </td>
                    <td>
                      <p>0.029%</p>
                    </td>
                    <td>
                      <p>0.036</p>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <p>Daging Ayam</p>
                    </td>
                    <td>
                      <p>0.027</p>
                    </td>
                    <td>
                      <p>0.035</p>
                    </td>
                    <td>
                      <p>0.019</p>
                    </td>
                    <td>
                      <p>0.016</p>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <p>Telur Ayam</p>
                    </td>
                    <td>
                      <p>0.042</p>
                    </td>
                    <td>
                      <p>0.032</p>
                    </td>
                    <td>
                      <p>0.014</p>
                    </td>
                    <td>
                      <p>0.021</p>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <p>Beras</p>
                    </td>
                    <td>
                      <p>0.023</p>
                    </td>
                    <td>
                      <p>0.039</p>
                    </td>
                    <td>
                      <p>0.015</p>
                    </td>
                    <td>
                      <p>0.014</p>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <p>Minyak Goreng</p>
                    </td>
                    <td>
                      <p>0.032</p>
                    </td>
                    <td>
                      <p>0.021</p>
                    </td>
                    <td>
                      <p>0.025</p>
                    </td>
                    <td>
                      <p>0.019</p>
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

    <div class="tables-wrapper">
      <div class="row">
        <div class="col-lg-12">
          <div class="card-style mb-30">
            <p class="text-sm mb-20">
              Hyperparameter yang digunakan
            </p>
            <div class="table-wrapper table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>
                      <h6>Parameter</h6>
                    </th>
                    <th>
                      <h6>Value</h6>
                    </th>
                  </tr>
                  <!-- end table row-->
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <p>Optimizer</p>
                    </td>
                    <td>
                      <p>Adam</p>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <p>Loss Function</p>
                    </td>
                    <td>
                      <p>Mean Squared Error</p>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <p>Epoch</p>
                    </td>
                    <td>
                      <p>20</p>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <p>Batch Size</p>
                    </td>
                    <td>
                      <p>32</p>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <p>Validation Data</p>
                    </td>
                    <td>
                      <p>valX, valY</p>
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
                      <h6>Layer</h6>
                    </th>
                    <th>
                      <h6>Tipe Layer</h6>
                    </th>
                    <th>
                      <h6>Units</h6>
                    </th>
                    <th>
                      <h6>Return Sequences</h6>
                    </th>
                    <th>
                      <h6>Activation</h6>
                    </th>
                  </tr>
                  <!-- end table row-->
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <p>Input Layer</p>
                    </td>
                    <td>
                      <p>Input</p>
                    </td>
                    <td>
                      <p> - </p>
                    </td>
                    <td>
                      <p> - </p>
                    </td>
                    <td>
                      <p> - </p>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <p>Hidden Layer 1</p>
                    </td>
                    <td>
                      <p>LSTM</p>
                    </td>
                    <td>
                      <p>256</p>
                    </td>
                    <td>
                      <p>True</p>
                    </td>
                    <td>
                      <p>Tanh (Default)</p>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <p>Hidden Layer 2</p>
                    </td>
                    <td>
                      <p>LSTM</p>
                    </td>
                    <td>
                      <p>256</p>
                    </td>
                    <td>
                      <p>True</p>
                    </td>
                    <td>
                      <p>Tanh (Default)</p>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <p>Hidden Layer 3</p>
                    </td>
                    <td>
                      <p>LSTM</p>
                    </td>
                    <td>
                      <p>256</p>
                    </td>
                    <td>
                      <p>False</p>
                    </td>
                    <td>
                      <p>Tanh (Default)</p>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <p>Output Layer</p>
                    </td>
                    <td>
                      <p>Dense</p>
                    </td>
                    <td>
                      <p>1</p>
                    </td>
                    <td>
                      <p> - </p>
                    </td>
                    <td>
                      <p>ReLU</p>
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