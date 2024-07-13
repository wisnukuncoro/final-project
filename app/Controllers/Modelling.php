<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Modelling extends BaseController
{
  public function index()
  {
    return view('modelling');
  }
}
