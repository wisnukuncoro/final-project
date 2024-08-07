<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DashboardModels;

class Dashboard extends BaseController
{
  public function index()
  {
    $month = date('m');
    $year = date('Y');
    $foodType = "bawang_merah";
    $availableMonthYear = $this->getAvailableMonthYear();

    foreach ($availableMonthYear as $items) {
      foreach ($items as $item) {
        $availableDates[] = $item;
      }
    }

    array_splice($availableDates, 0, 2);

    if ($month == 1) {
      $comparedMonth = 12;
      $comparedYear = $year - 1;
    } else {
      $comparedMonth = $month - 1;
      $comparedYear = $year;
    }

    $currentData = $this->getData($month, $year, $foodType);
    $comparedData = $this->getData($comparedMonth, $comparedYear, $foodType);

    $percentageOfPriceChanges = ($currentData['averagePrice'] - $comparedData['averagePrice']) / $comparedData['averagePrice'] * 100;

    $data = [
      'currentData' => $currentData,
      'comparedData' => $comparedData,
      'title' => "Dashboard Harga " . ucwords(str_replace('_', ' ', $foodType)),
      'foodType' => $foodType,
      'percentageOfPriceChanges' => $percentageOfPriceChanges,
      'availableDates' => $availableDates,
    ];

    return view('dashboard', $data);
  }

  public function filter()
  {
    $month = $this->request->getPost('month');
    $year = $this->request->getPost('year');
    $foodType = strval($this->request->getPost('foodType'));
    $availableMonthYear = $this->getAvailableMonthYear();

    foreach ($availableMonthYear as $items) {
      foreach ($items as $item) {
        $availableDates[] = $item;
      }
    }

    array_splice($availableDates, 0, 2);

    if ($month == 1) {
      $comparedMonth = 12;
      $comparedYear = $year - 1;
    } else {
      $comparedMonth = $month - 1;
      $comparedYear = $year;
    }

    $currentData = $this->getData($month, $year, $foodType);
    $comparedData = $this->getData($comparedMonth, $comparedYear, $foodType);

    $percentageOfPriceChanges = ($currentData['averagePrice'] - $comparedData['averagePrice']) / $comparedData['averagePrice'] * 100;

    $data = [
      'title' => "Dashboard Harga " . ucwords(str_replace('_', ' ', $foodType)),
      'currentData' => $currentData,
      'comparedData' => $comparedData,
      'percentageOfPriceChanges' => $percentageOfPriceChanges,
      'foodType' => $foodType,
      'availableDates' => $availableDates,
    ];

    return view('dashboard', $data);
  }

  public function getAvailableMonthYear()
  {
    $dashboardModels = new DashboardModels();

    $result = $dashboardModels->getAvailableMonthYear();

    foreach ($result as $item) {
      $dates[] = $item['year'] . "-" . $item['month']; 
    }

    $data = [
      'dates' => $dates,
    ];

    return $data;
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
