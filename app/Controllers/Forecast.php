<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Controllers\Dashboard;
use App\Models\DatasetModel;

class Forecast extends BaseController
{
  public function index()
  {
    $datasetModel = new DatasetModel();
    $dashboardController = new Dashboard();

    $month = '5';
    $year = '2021';
    $foodType = "bawang_merah";

    $availableMonthYear = $datasetModel->getAvailableMonthYear();

    foreach ($availableMonthYear as $items) {
      foreach ($items as $item) {
        $availableDates[] = $item;
      }
    }

    array_splice($availableDates, 0, 2);

    if (date('d') == date('d', strtotime('last day of this month'))) {
      $newMonth = date('Y-F', strtotime('first day of next month'));
      $availableDates[] = $newMonth;
    }

    $predictData = $dashboardController->getData($month, $year, $foodType, $isRealData = True);
    $realData = $dashboardController->getData($month, $year, $foodType);

    $data = [
      'predictData' => $predictData,
      'realData' => $realData,
      'month' => $month,
      'year' => $year,
      'title' => "Prediksi Harga " . ucwords(str_replace('_', ' ', $foodType)),
      'foodType' => $foodType,
      'availableDates' => $availableDates,
    ];

    return view('forecast', $data);
  }

  public function filter()
  {
    $datasetModel = new DatasetModel();
    $dashboardController = new Dashboard();

    $month = $this->request->getPost('month');
    $year = $this->request->getPost('year');
    $foodType = strval($this->request->getPost('foodType'));

    $availableMonthYear = $datasetModel->getAvailableMonthYear();

    foreach ($availableMonthYear as $items) {
      foreach ($items as $item) {
        $availableDates[] = $item;
      }
    }

    array_splice($availableDates, 0, 2);

    if (date('d') == date('d', strtotime('last day of this month'))) {
      $newMonth = date('Y-F', strtotime('first day of next month'));
      $availableDates[] = $newMonth;
    }

    $predictData = $this->predict($month, $year, $foodType);
    $realData = $dashboardController->getData($month, $year, $foodType);

    $data = [
      'predictData' => $predictData,
      'realData' => $realData,
      'month' => $month,
      'year' => $year,
      'title' => "Prediksi Harga " . ucwords(str_replace('_', ' ', $foodType)),
      'foodType' => $foodType,
      'availableDates' => $availableDates,
    ];

    return view('forecast', $data);
  }

  public function predict($month, $year, $foodType)
  {
    // Jalankan API Python dari file app.py
    // $command = 'cmd /c "start /B ' . ROOTPATH . '.venv/Scripts/activate && python ' . APPPATH . 'MachineLearning/scripts/app.py';
    // shell_exec($command);

    // // Tunggu beberapa detik agar API bisa siap menerima request
    // sleep(10);

    if ($foodType == 'bawang_merah'){
      $n_models = 1;
      $n_scalers = 1;
    } else if ($foodType == 'bawang_putih'){
      $n_models = 2;
      $n_scalers = 2;
    } else if ($foodType == 'cabai_merah_keriting'){
      $n_models = 3;
      $n_scalers = 3;
    } else if ($foodType == 'cabai_rawit_merah'){
      $n_models = 4;
      $n_scalers = 4;
    } else if ($foodType == 'daging_sapi'){
      $n_models = 5;
      $n_scalers = 5;
    } else if ($foodType == 'daging_ayam'){
      $n_models = 6;
      $n_scalers = 6;
    }else if ($foodType == 'telur_ayam'){
      $n_models = 7;
      $n_scalers = 7;
    } else if ($foodType == 'beras'){
      $n_models = 8;
      $n_scalers = 8;
    } else {
      $n_models = 9;
      $n_scalers = 9;
    } 

    $data = [
      'data' => $this->getInputX($month, $year, $foodType),
      'n_scalers' => $n_scalers,
    ];
    $data_json = json_encode($data);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://localhost:5000/transform");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);

    // Jalankan dan ambil hasil
    $result = curl_exec($ch);
    curl_close($ch);

    $response = json_decode($result, true);

    // Data input untuk prediksi  
    $input_data = [
      'response' => $response,
      'n_models' => $n_models,
      'n_scalers' => $n_scalers,
    ];

    // Prepare data for API request
    $data_json = json_encode($input_data);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://localhost:5000/predict");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);

    // Jalankan dan ambil hasil
    $result = curl_exec($ch);
    curl_close($ch);

    $prices = json_decode($result, false);
    $n = date("t", mktime(0, 0, 0, $month, 1, $year));

    array_splice($prices, -(count($prices) - $n), (count($prices) - $n));

    for ($i=1; $i <= $n; $i++) { 
      $days[] = $i;
    }

    $lowestPrice = min($prices);
    $highestPrice = max($prices);
    $averagePrice = round(array_sum($prices) / count($prices));

    $lowestPriceDateindex = array_search($lowestPrice, $prices);
    $highestPriceDateindex = array_search($highestPrice, $prices);

    $lowestPriceDate = $days[$lowestPriceDateindex];
    $highestPriceDate = $days[$highestPriceDateindex];

    $data = [
      'prices' => $prices,
      'lowestPrice' => $lowestPrice,
      'lowestPriceDate' => $lowestPriceDate,
      'highestPrice' => $highestPrice,
      'highestPriceDate' => $highestPriceDate,
      'averagePrice' => $averagePrice,
      'days' => $days,
      'month' => $month,
      'detailedMonth' => date('F', mktime(0, 0, 0, $month, 1)),
      'year' => $year,
    ];

    return $data;
  }

  public function getInputX($month, $year, $foodType)
  {
    $endDate = date("Y-m-t", mktime(0, 0, 0, $month-1, 1, $year));

    $datasetModel = new datasetModel();

    $result = $datasetModel->getInputForModel($foodType, $endDate);
    $result = array_reverse($result);

    foreach ($result as $key) {
      $data[] = (float)$key['data'];
    }

    return $data;
  }
}
