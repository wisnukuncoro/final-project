<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use TensorFlowPHP\TensorFlow;

class Forecast extends BaseController
{
  public function index()
  {
    return view('forecast');
  }
}
