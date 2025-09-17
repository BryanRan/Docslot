<?php

namespace App\Controllers\Patient;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class DoctorController extends BaseController
{
    public function doctor()
    {
        return view('patient/doctor', [
            'title' => 'medecins'
        ]);
    }
}
