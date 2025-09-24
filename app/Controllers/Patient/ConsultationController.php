<?php

namespace App\Controllers\Patient;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\CreneauxModel;

class ConsultationController extends BaseController
{
    public function consult()
    {
        $creneauxModel = new CreneauxModel();

        $creneaux = $creneauxModel
            ->where('statut', 'disponible')
            ->orderBy('date', 'ASC')
            ->orderBy('heure_debut', 'ASC')
            ->findAll();

        return view('patient/consult', [
            'creneaux' => $creneaux
        ]);
    }
}
