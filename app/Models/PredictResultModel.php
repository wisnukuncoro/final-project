<?php

namespace App\Models;

use CodeIgniter\Model;

class PredictResultModel extends Model
{
  protected $table            = 'predict_results';

  public function getPrices($month, $year, $foodType)
  {
    return $this->select("DAY(tanggal) AS days, $foodType AS prices")
      ->where('MONTH(tanggal)', $month)
      ->where('YEAR(tanggal)', $year)
      ->orderBy('tanggal', 'ASC')
      ->findAll();
  }
}
