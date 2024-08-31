<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ForecastModels;
use App\Controllers\Dashboard;

class Forecast extends BaseController
{
  public function index()
  {        
    $predict = $this->predict();

    $lowestPrice = min($predict);
    $highestPrice = max($predict);
    $averagePrice = round(array_sum($predict)/ count($predict));

    $lowestPriceDateindex = array_search($lowestPrice, $predict);
    $highestPriceDateindex = array_search($highestPrice, $predict);

    if (date('d') == date('d', strtotime('last day of this month'))){
      $month = date('F', strtotime('first day of next month'));
      $year = date('Y', strtotime('first day of next month'));
    } else {
      $month = date('F', strtotime('first day of this month'));
      $year = date('Y', strtotime('first day of this month'));
    }

    $lowestPriceDate = $lowestPriceDateindex+1; 
    $highestPriceDate = $highestPriceDateindex+1;

    $predict = array_map('strval', $predict);

    $data = [
      'predict' => $predict,
      'lowestPrice' => $lowestPrice,
      'lowestPriceDate' => $lowestPriceDate,
      'highestPrice' => $highestPrice,
      'highestPriceDate' => $highestPriceDate,
      'averagePrice' => $averagePrice,
      'month'=> $month,
      'year' => $year,
      'foodType' => 'bawang_merah',
    ];

    return view('forecast', $data);
  }

  public function predict()
  {
    // Jalankan API Python dari file app.py
    // $command = 'cmd /c "start /B ' . ROOTPATH . '.venv/Scripts/activate && python ' . APPPATH . 'MachineLearning/scripts/app.py';
    // shell_exec($command);

    // // Tunggu beberapa detik agar API bisa siap menerima request
    // sleep(10);

    $data = $this->getInputX();
    $data_json = json_encode($data);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://localhost:5000/transform");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);

    $response = curl_exec($ch);

    // Jalankan dan ambil hasil
    $result = curl_exec($ch);
    curl_close($ch);

    $response = json_decode($result, true);

    // Data input untuk prediksi  
    $input_data = [
      $response
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

    $response = json_decode($result, false);

    return $response;
  }

  public function getInputX()
  {
    $foodType = "bawang_merah";

    if (date('d') == date('d', strtotime('last day of this month'))) {
      $endDate = date('Y-m-d', strtotime('last day of this month'));
    } else {
      $endDate = date('Y-m-d', strtotime('last day of last month'));
    }

    $forecastModels = new ForecastModels();

    $result = $forecastModels->getInputX($foodType, $endDate);
    $result = array_reverse($result);

    foreach ($result as $key) {
      $data[] = (float)$key['data'];
    }

    return $data;
  }

  // public function filter()
  // {
  //   $dashboardController = new Dashboard();
    
  //   $month = $this->request->getPost('month');
  //   $year = $this->request->getPost('year');
  //   $foodType = strval($this->request->getPost('foodType'));
  //   $availableMonthYear = $dashboardController->getAvailableMonthYear();

  //   foreach ($availableMonthYear as $items) {
  //     foreach ($items as $item) {
  //       $availableDates[] = $item;
  //     }
  //   }

  //   array_splice($availableDates, 0, 2);

  //   if ($month == 1) {
  //     $comparedMonth = 12;
  //     $comparedYear = $year - 1;
  //   } else {
  //     $comparedMonth = $month - 1;
  //     $comparedYear = $year;
  //   }

  //   $percentageOfPriceChanges = ($currentData['averagePrice'] - $comparedData['averagePrice']) / $comparedData['averagePrice'] * 100;

  //   $data = [
  //     'title' => "Dashboard Harga " . ucwords(str_replace('_', ' ', $foodType)),
  //     'currentData' => $currentData,
  //     'comparedData' => $comparedData,
  //     'percentageOfPriceChanges' => $percentageOfPriceChanges,
  //     'foodType' => $foodType,
  //     'availableDates' => $availableDates,
  //   ];

  //   return view('dashboard', $data);
  // }
}
