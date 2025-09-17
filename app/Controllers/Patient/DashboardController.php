<?php

namespace App\Controllers\Patient;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class DashboardController extends BaseController
{
    public function dashboard()
    {
        return view('patient/dashboard', [
            'title' => 'Dashboard'
        ]);
    }
}
