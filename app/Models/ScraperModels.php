<?php

namespace App\Models;

use CodeIgniter\Model;

class ScraperModels extends Model
{
  protected $table = 'dataset';

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

    $this->db->table('dataset')->insert($data);

    echo "Data Berhasil Diinput!";
  }

  public function getStatus($date)
  {
    if ($this->where('tanggal', $date)->first()) {
      echo "Data Sudah Ada!";
      exit;
    }
  }
}
