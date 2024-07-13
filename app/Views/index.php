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
            <h2>Aplikasi Prediksi Harga Sembako</h2>
          </div>
        </div>
      </div>
      <!-- end row -->
    </div>

    <p class="mb-10 text-justify">Aplikasi ini dirancang untuk memprediksi harga sembako dalam satu bulan ke depan menggunakan model LSTM (Long Short-Term Memory). Model LSTM adalah jenis jaringan saraf tiruan yang sangat efektif dalam memproses dan memprediksi data urutan waktu, sehingga sangat cocok untuk analisis data harga sembako yang bersifat periodik dan memiliki pola musiman.</p>
    <p class="mb-30 text-justify">Prediksi harga ini bisa dijadikan dasar acuan untuk melakukan berbagai kegiatan dalam rangka menjaga kestabilan harga. Aplikasi ini menggunakan data historis harga sembako selama beberapa tahun terakhir untuk melatih model prediksi, sehingga mampu memberikan estimasi harga yang akurat dan andal. Dengan analisis data yang mendalam, aplikasi ini dapat mengidentifikasi tren dan pola harga yang tidak terlihat secara kasat mata. Hal ini memungkinkan berbagai pihak seperti pedagang, konsumen, dan pemerintah untuk mengambil keputusan yang lebih baik dan berdasarkan data yang kuat. Pedagang dapat meminimalkan risiko kerugian akibat perubahan harga yang tiba-tiba, konsumen dapat membeli barang dengan harga yang lebih wajar, dan pemerintah dapat menjaga inflasi tetap terkendali dengan intervensi yang lebih tepat waktu dan efektif.</p>

    <h4 class="mb-15">Fitur Utama</h4>
    <ul class="mb-30">
      <li class="text-justify">1. Memprediksi harga sembako dalam satu bulan ke depan.</li>
      <li class="text-justify">2. Menggunakan model LSTM untuk analisis dan prediksi yang lebih akurat.</li>
      <li class="text-justify">3. Menampilkan data harga historis dan prediksi dalam format yang mudah dipahami.</li>
    </ul>

    <h4 class="mb-15">Dokumentasi</h4>
    <p class="text-justify">Seluruh dokumentasi source code, dataset, dan pemodelan machine learning, dapat diakses pada link berikut</p>
    <a href="https://github.com/wisnukuncoro/final-project" class="mb-30" target="_blank">https://github.com/wisnukuncoro/final-project</a>

    <p class="mb-15 text-justify">Dengan aplikasi ini, diharapkan dapat membantu menjaga kestabilan harga sembako dan mengurangi fluktuasi harga yang tidak diinginkan. Aplikasi ini juga dapat digunakan sebagai alat bantu dalam perencanaan stok dan manajemen rantai pasokan sembako.</p>
    <p class="mb-15 text-justify">Terima kasih telah menggunakan aplikasi prediksi harga sembako kami. Kami berharap aplikasi ini dapat memberikan manfaat yang besar bagi Anda.</p>

  </div>
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

<?= $this->endSection(); ?>