<?php

namespace App\Models;

use CodeIgniter\Model;

class ForecastModels extends Model
{
  protected $table = 'dataset';

  public function getInputX($foodType, $endDate)
  {
    return $this->select("$foodType AS data")
      ->where("tanggal <= '$endDate'")
      ->orderby("tanggal", "DESC")
      ->limit(30)
      ->findAll();
  }
}
