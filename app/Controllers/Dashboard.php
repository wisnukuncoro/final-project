<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DashboardModels;

class Dashboard extends BaseController
{
  public function index()
  {
    $month = "12";
    $year = "2022";
    $foodType = "bawang_merah";

    $previousMonth = $month - 1;
    $comparedMonth = 

    $data = $this->getData($month, $year, $foodType);

    return view('dashboard', $data);
  }

  public function filter()
  {
    $month = $this->request->getPost('month');
    $year = $this->request->getPost('year');
    $foodType = $this->request->getPost('foodType');

    

    // if (empty($month) || empty($year) || empty($foodType)) {
    //   return redirect()->back()->with('error', 'Bulan, tahun, dan jenis sembako harus dipilih');
    // }

    $data = $this->getData($month, $year, $foodType);

    return view('dashboard', $data);

    // var_dump($data);
    //   if (!empty($prices)) {
    //     $price = array_column($prices, $foodType);

    //     if (empty($price)) {
    //       return redirect()->back()->with('error', 'Tidak ada data untuk jenis sembako yang dipilih.');
    //     }

    //     $date = array_column($prices, 'Tanggal');

    //     $lowestPrice = min($price);
    //     $highestPrice = max($price);
    //     $averagePrice = array_sum($price) / count($price);
    //     $percentageOfPriceChanges = ((end($price) - reset($price)) / reset($price)) * 100;

    //     $lowestDate = $date[array_search($lowestPrice, $price)];
    //     $highestDate = $date[array_search($highestPrice, $price)];

    //     $labels = array_map(function ($item) {
    //       return date('d-m-Y', strtotime($item));
    //     }, $date);

    //     $data = [
    //       'lowestPrice' => $lowestPrice,
    //       'lowestDate' => $lowestDate,
    //       'highestPrice' => $highestPrice,
    //       'highestDate' => $highestDate,
    //       'averagePrice' => $averagePrice,
    //       'percentageOfPriceChanges' => $percentageOfPriceChanges,
    //       'labels' => $labels,
    //       'data' => $price
    //     ];

    //     return view('dashboard', $data);
    //   } else {
    //     return redirect()->back()->with('error', 'Tidak ada data yang ditemukan untuk bulan dan tahun yang dipilih');
    //   }
    // }
  }

  public function getData($month, $year, $foodType)
  {
    $dashboardModels = new DashboardModels();
    $result = $dashboardModels->getPricesByMonth($month, $year, $foodType);

    $prices = [];
    $days = [];

    foreach ($result as $item) {
      $days[] = $item['days'];
      $prices[] = $item['prices'];
    }

    $lowestPrice = min($prices);
    $highestPrice = max($prices);
    $averagePrice = round(array_sum($prices) / count($prices));

    $lowestPriceDateindex = array_search($lowestPrice, $prices);
    $highestPriceDateindex = array_search($highestPrice, $prices);

    $lowestPriceDate = $days[$lowestPriceDateindex];
    $highestPriceDate = $days[$highestPriceDateindex]; 
    
    $data = [
      'lowestPrice' => $lowestPrice,
      'lowestPriceDate' => $lowestPriceDate,
      'highestPrice' => $highestPrice,
      'highestPriceDate' => $highestPriceDate,
      'averagePrice' => $averagePrice,
      // 'percentageOfPriceChanges' => null,
      'days' => $days,
      'month' => $month,
      'detailedMonth' => date('F', mktime(0, 0, 0, $month, 1)),
      'year' => $year,
      'prices' => $prices,
      'foodType' => $foodType,
      'title' => "Dashboard Harga " . ucwords(str_replace('_', ' ', $foodType)),
    ];

    return $data;
  }
}
