<?php

namespace App\Controllers\Patient;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ProfileController extends BaseController
{
    public function profile()
    {
        return view('patient/profile');
    }
}
