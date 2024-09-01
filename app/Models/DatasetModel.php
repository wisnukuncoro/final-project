<?php

namespace App\Models;

use CodeIgniter\Model;
use Datetime;

class DatasetModel extends Model
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
    $result = $query->getResultArray();

    foreach ($result as $item) {
      $dates[] = $item['year'] . "-" . $item['month']; 
    }

    $data = [
      'dates' => $dates,
    ];

    return $data;
  }

  public function getInputForModel($foodType, $endDate)
  {
    return $this->select("$foodType AS data")
      ->where("tanggal <= '$endDate'")
      ->orderby("tanggal", "DESC")
      ->limit(30)
      ->findAll();
  }

  public function inputDataFromScraper($date, $foodType)
  {
    $data = [
      'tanggal' => $date,
      'bawang_merah' => $foodType['Bawang Merah'] * 1000,
      'bawang_putih' => $foodType['Bawang Putih Bonggol']  * 1000,
      'cabai_merah_keriting' => $foodType['Cabai Merah Keriting']  * 1000,
      'cabai_rawit_merah' => $foodType['Cabai Rawit Merah']  * 1000,
      'daging_sapi' => $foodType['Daging Sapi Murni']  * 1000,
      'daging_ayam' => $foodType['Daging Ayam Ras']  * 1000,
      'telur_ayam' => $foodType['Telur Ayam Ras']  * 1000,
      'beras' => $foodType['Beras Premium']  * 1000,
      'minyak_goreng' => $foodType['Minyak Goreng Kemasan Sederhana']  * 1000,
    ];

    if ($this->db->table('dataset')->insert($data)) {
      return "Data Berhasil Diinput!";
    }
  }

  public function getStatusForInputData($date)
  {
    if ($this->where('tanggal', $date)->first()) {
      $date = DateTime::createFromFormat('Y-m-d' . ' 00:00:00', $date)->format('d/m/Y');
      return "Data Pada Tanggal " . $date . " Sudah Ada!";
    }

    return null;
  }
}
