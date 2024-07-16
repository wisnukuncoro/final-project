<?php

namespace App\Models;

use CodeIgniter\Database\Query;
use CodeIgniter\Model;

class DashboardModels extends Model
{
  protected $table = 'dataset';

  public function getPricesByMonth($month, $year, $foodType)
  {
    return $this->select("DAY(tanggal) AS days, $foodType AS prices")
      ->where('MONTH(tanggal)', $month)
      ->where('YEAR(tanggal)', $year)
      ->orderBy('tanggal', 'ASC')
      ->findAll();
  }

  public function getAvailableMonthYear()
  {
    $builder = $this->db->table($this->table);
    $builder->select('DISTINCT MONTH(tanggal) AS month, YEAR(tanggal) AS year');
    $query = $builder->get();
    return $query->getResultArray();
  }
}
