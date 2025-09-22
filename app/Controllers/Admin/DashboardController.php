<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\RendezvousModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $rendezvousModel = new RendezvousModel();
        $rendezvous = $rendezvousModel->getAllWithDetails();

        return view('admin/dashboard', [
            'rendezvous' => $rendezvous
        ]);
    }
}
