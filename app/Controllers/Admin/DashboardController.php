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

    public function updateStatus($id, $status)
    {
        $validStatuses = ['validé', 'refusé', 'annulé'];

        if (!in_array($status, $validStatuses)) {
            return redirect()->back()->with('error', 'Statut invalide.');
        }

        $rendezvousModel = new RendezvousModel();
        $rendezvousModel->update($id, ['statut' => $status]);

        return redirect()->to(base_url('admin/dashboard'))->with('success', "Le rendez-vous a été $status.");
    }
}
