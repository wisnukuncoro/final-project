<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ModelML extends BaseController
{
  public function index()
  {
    return view('model_information');
  }
}
