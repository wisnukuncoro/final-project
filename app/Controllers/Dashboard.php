<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DashboardModels;

class Dashboard extends BaseController
{
  public function index()
  {
    $month = date('n');
    $year = date('Y');
    $foodType = "bawang_merah";

    if ($month == 1) {
      $comparedMonth = 12;
      $comparedYear = $year - 1;
    } else {
      $comparedMonth = $month - 1;
      $comparedYear = $year;
    }

    $currentData = $this->getData($month, $year, $foodType);
    $comparedData = $this->getData($comparedMonth, $comparedYear, $foodType);

    $percentageOfPriceChanges = ($currentData['averagePrice'] - $comparedData['averagePrice']) / $currentData['averagePrice'] * 100;

    $data = [
      'currentData' => $currentData,
      'comparedData' => $comparedData,
      'title' => "Dashboard Harga " . ucwords(str_replace('_', ' ', $foodType)),
      'foodType' => $foodType,
      'percentageOfPriceChanges' => $percentageOfPriceChanges,
    ];

    return view('dashboard', $data);
  }

  public function filter()
  {
    $month = $this->request->getPost('month');
    $year = $this->request->getPost('year');
    $foodType = $this->request->getPost('foodType');

    if ($month == 1) {
      $comparedMonth = 12;
      $comparedYear = $year - 1;
    } else {
      $comparedMonth = $month - 1;
      $comparedYear = $year;
    }

    $currentData = $this->getData($month, $year, $foodType);
    $comparedData = $this->getData($comparedMonth, $comparedYear, $foodType);

    $percentageOfPriceChanges = ($currentData['averagePrice'] - $comparedData['averagePrice']) / $currentData['averagePrice'] * 100;

    $data = [
      'title' => "Dashboard Harga " . ucwords(str_replace('_', ' ', $foodType)),
      'currentData' => $currentData,
      'comparedData' => $comparedData,
      'percentageOfPriceChanges' => $percentageOfPriceChanges,
      'foodType' => $foodType,
    ];

    return view('dashboard', $data);
  }

  public function getAvailableMonthYear()
  {
    $dashboardModels = new DashboardModels();

    $result = $dashboardModels->getAvailableMonthYear();

    $month = [];
    $year = [];

    foreach ($result as $item) {
      $month[] = $item['month'];
      $year[] = $item['year'];
    }

    $data = [
      'month' => $month,
      'year' => $year
    ];

    return $data;
  }

  public function getData($month, $year, $foodType)
  {
    $dashboardModels = new DashboardModels();

    $result = $dashboardModels->getPricesByMonth($month, $year, $foodType);

    // if (empty($result)) {
    //   throw new \Exception("Data not found for the given criteria.");
    // }

    $prices = [];
    $days = [];

    foreach ($result as $item) {
      if ($item['prices'] == 0) {
        continue;
      } else {
        $days[] = $item['days'];
        $prices[] = $item['prices'];
      }
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
}
