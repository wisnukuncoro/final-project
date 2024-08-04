<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ForecastModels;
use TensorFlow\Tensor;
use TensorFlow\SavedModelBundle;

class Forecast extends BaseController
{
  public function index()
  {
    // Data input untuk prediksi
    $input_data = [[
      [0.40265207, 0.62464066, 0.16933761, 0.15614879, 0.43003219, 0.36490413, 0.55499076, 0.23793103, 0.22343324],
      [0.37465797, 0.62464066, 0.19433761, 0.14731573, 0.43003219, 0.40325392, 0.54297597, 0.30344828, 0.22343324],
      [0.38854978, 0.70431211, 0.22991453, 0.15359702, 0.47699299, 0.48866938, 0.56053604, 0.3362069, 0.22343324],
      [0.41359714, 0.71416838, 0.23696581, 0.15506919, 0.49990532, 0.51191168, 0.56099815, 0.32586207, 0.23342416],
      [0.38139339, 0.72977413, 0.24850427, 0.17224458, 0.47699299, 0.54735619, 0.56377079, 0.30344828, 0.22343324],
      [0.38328773, 0.70102669, 0.23429487, 0.15261557, 0.4525658, 0.50842533, 0.5577634, 0.30344828, 0.22343324],
      [0.37465797, 0.71786448, 0.24241453, 0.16203749, 0.4525658, 0.53747821, 0.5577634, 0.32586207, 0.22343324],
      [0.38328773, 0.71786448, 0.24594017, 0.14653057, 0.47699299, 0.47704823, 0.5577634, 0.34655172, 0.21253406],
      [0.39381183, 0.77494867, 0.22873932, 0.13985671, 0.4525658, 0.41603719, 0.6155268, 0.32586207, 0.21253406],
      [0.36034519, 0.79383984, 0.20844017, 0.11453528, 0.43003219, 0.46135967, 0.57486137, 0.3362069, 0.21253406],
    ]];

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

    $response = json_decode($result, true);

    // Tampilkan hasil prediksi
    print_r($response);
  }

  public function getInputX()
  {
    $foodType = "bawang_merah";

    if (date('d') < 20) {
      $month = date('m', strtotime('first day of last month'));
    } else {
      $month = date('m');
    }
    
    $forecastModels = new ForecastModels();

    $result = $forecastModels->getInputX($foodType, $month);
  }
}
