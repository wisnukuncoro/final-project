<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ForecastModels;

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
    ];

    return view('forecast', $data);
  }

  public function predict()
  {
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

    $response = curl_exec($ch);

    // Jalankan dan ambil hasil
    $result = curl_exec($ch);
    curl_close($ch);

    $response = json_decode($result, false);

    return $response;
  }

  public function getInputX()
  {
    $foodType = "bawang_putih";

    if (date('d') == date('d', strtotime('last day of this month'))) {
      $endDate = date('Y-m-d', strtotime('last day of this month'));
    } else {
      $endDate = date('Y-01-31', strtotime('last day of last month'));
    }

    $forecastModels = new ForecastModels();

    $result = $forecastModels->getInputX($foodType, $endDate);
    $result = array_reverse($result);

    foreach ($result as $key) {
      $data[] = (float)$key['data'];
    }

    return $data;
  }
}
