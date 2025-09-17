<?php

namespace App\Controllers\Patient;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AppointmentController extends BaseController
{
    public function appointment()
    {
        return view('patient/appointment', [
            'title' => 'Mes rendez-vous'
        ]);
    }
}
