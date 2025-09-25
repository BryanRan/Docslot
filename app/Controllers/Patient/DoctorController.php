<?php

namespace App\Controllers\Patient;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\MedecinsModel;
use App\Models\CreneauxModel;

class DoctorController extends BaseController
{
    public function doctor()
{
    $medecinsModel = new MedecinsModel();
    $creneauxModel = new CreneauxModel();

    $liste_medecins = $medecinsModel->findAll();

    // Ajouter la disponibilité de chaque médecin
    foreach ($liste_medecins as &$medecin) {
        $creneaux = $creneauxModel
            ->where('medecin_id', $medecin['id'])
            ->where('date >=', date('Y-m-d')) // on ne prend que les créneaux futurs
            ->findAll();

        // Vérifier s'il y a au moins un créneau disponible
        $disponible = false;
        foreach ($creneaux as $c) {
            if ($c['statut'] === 'disponible') {
                $disponible = true;
                break;
            }
        }

        $medecin['disponibilite'] = $disponible ? 'disponible' : 'occupé';
    }

    return view('patient/doctor', [
        'title' => 'Médecins',
        'medecins' => $liste_medecins
    ]);
}

}
