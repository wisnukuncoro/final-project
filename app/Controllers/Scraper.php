<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ScraperModels;
use CodeIgniter\HTTP\ResponseInterface;
use DateTime;

class Scraper extends BaseController
{
  public function index()
  {
    $scraperModels = new ScraperModels();

    $date = date('Y-m-d 00:00:00');

    $scraperModels->getStatus($date);

    // shell_exec('')
    $output = shell_exec(ROOTPATH . '.venv/Scripts/activate && python ' . APPPATH . 'MachineLearning/scripts/data_scraper.py');

    $data = json_decode($output, true);

    $hargaKomoditas = [];

    foreach ($data as $komoditas) {
      $namaKomoditas = $komoditas["Komoditas (Rp)"];
      $hargaKomoditas[$namaKomoditas] = [];

      foreach ($komoditas as $key => $value) {
        if ($key !== "Komoditas (Rp)") {
          $hargaKomoditas[$namaKomoditas][$key] = $value;
        }
      }
    }

    $date = DateTime::createFromFormat('Y-m-d' . ' 00:00:00', $date)->format('d/m/Y');
    $foodType = [];

    foreach ($hargaKomoditas as $key => $value) {
      // Mengambil harga berdasarkan tanggal
      $harga = $value[$date];
      // Menyimpan ke dalam array baru
      $foodType[$key] = $harga;
    }    

    $date = DateTime::createFromFormat('d/m/Y', $date)->format('Y-m-d') . ' 00:00:00';

    $scraperModels->inputDataFromScraper($date, $foodType);
  }
}
