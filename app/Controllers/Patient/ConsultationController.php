<?php

namespace App\Controllers\Patient;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ConsultationController extends BaseController
{
    public function consult()
    {
        return view('patient/consult', [
            'title' => 'Mes rendez-vous'
        ]);
    }
}
