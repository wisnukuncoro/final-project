<?php

namespace App\Models;

use CodeIgniter\Model;

class ForecastModels extends Model
{
  protected $table = 'dataset';

  public function getInputX( $month)
  {
    return $this->select("*")
      ->where('MONTH(tanggal) <', $month)
      ->where('YEAR(tanggal) = 2024')
      ->order_by('tanggal', 'DESC') // Urutkan berdasarkan tanggal terbaru terlebih dahulu
      ->limit(31) // Batasi jumlah baris yang diambil
      ->findAll();
  }
}
