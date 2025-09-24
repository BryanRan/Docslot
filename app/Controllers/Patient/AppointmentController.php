<?php

namespace App\Controllers\Patient;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\RendezvousModel;

class AppointmentController extends BaseController
{
    public function appointment()
    {
        $session = session();
        $idUtilisateur = $session->get('user_id');

        if (!$idUtilisateur) {
            $session->setFlashdata('error', 'Vous devez être connecté pour voir vos rendez-vous.');
            return redirect()->to(base_url('login'));
        }

        $rendezvousModel = new RendezvousModel();

        $rendezvous = $rendezvousModel
            ->select('rendezvous.id, rendezvous.statut, creneaux.date, creneaux.heure_debut, creneaux.heure_fin, medecins.nom as medecin_nom, medecins.prenom as medecin_prenom, medecins.specialite')
            ->join('creneaux', 'creneaux.id = rendezvous.id_creneau')
            ->join('medecins', 'medecins.id = creneaux.medecin_id')
            ->where('rendezvous.id_utilisateur', $idUtilisateur)
            ->orderBy('creneaux.date', 'ASC')
            ->orderBy('creneaux.heure_debut', 'ASC')
            ->findAll();

        return view('patient/appointment', [
            'title' => 'Mes rendez-vous',
            'rendezvous' => $rendezvous
        ]);
    }
}
