<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DashboardModels;
use CodeIgniter\HTTP\ResponseInterface;

class Dashboard extends BaseController
{
  public function index()
  {
    // $DashboardModels = model(DashboardModels::class);
    
    // $data['dataset'] = $DashboardModels->getPrices();
    
    return view('index');
  }
}

