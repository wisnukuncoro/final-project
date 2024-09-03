<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DatasetModel;
use DateTime;

class Scraper extends BaseController
{
  public function index()
  {
    $datasetModel = new DatasetModel();

    $date = date('Y-m-2 00:00:00');
    $hour = date('H');

    $message = $datasetModel->getStatusForInputData($date);
    if ($message) {
      return redirect()->to('dashboard')->with('message', $message)->with('type', 'Error!');
    }

    // if($hour) {
    //   $message = "Data Belum Tersedia, Tunggu Hingga Jam 15.00 WIB Untuk Input Data Harga Hari Ini!";
    //   return redirect()->to('dashboard')->with('message', $message)->with('type', 'Error!');
    // }

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

    $message = $datasetModel->inputDataFromScraper($date, $foodType);

    if ($message) {
      return redirect()->to('dashboard')->with('message', $message)->with('type', 'Pesan!');
    }
  }
}
