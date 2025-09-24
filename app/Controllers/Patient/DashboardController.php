<?php

namespace App\Controllers\Patient;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\RendezvousModel;

class DashboardController extends BaseController
{
    public function dashboard()
    {
        $rdv = new RendezvousModel();
        $data['totalRdv'] = $rdv->countAllResults();
        $now = date('Y-m-d H:i:s');
        $data['rdvEnAttente'] = $rdv->where('statut','en_attente')->where('updated_at >=',$now)->countAllResults();
        return view('patient/dashboard',$data);
    }
}
