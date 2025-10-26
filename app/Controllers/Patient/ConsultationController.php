<?php

namespace App\Controllers\Patient;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\CreneauxModel;
use App\Models\RendezvousModel;
class ConsultationController extends BaseController
{
    public function consult()
    {
        $creneauxModel = new CreneauxModel();
        $creneaux = $creneauxModel->getCreneauxWithMedecins();

        return view('patient/consult', [
            'creneaux' => $creneaux
        ]);
    }

    public function reserver($idCreneau)
    {
        $session = session();
        $idUtilisateur = $session->get('user_id');

        if (!$idUtilisateur) {
            $session->setFlashdata('error', 'Vous devez être connecté pour réserver.');
            return redirect()->to(base_url('login'));
        }

        $creneauxModel = new CreneauxModel();
        $creneau = $creneauxModel->find($idCreneau);

        if (!$creneau || $creneau['statut'] !== 'disponible') {
            $session->setFlashdata('error', 'Ce créneau n’est plus disponible.');
            return redirect()->back();
        }

        $sujet = $this->request->getPost();

        $rendezvousModel = new RendezvousModel();
        $rendezvousModel->insert([
            'id_utilisateur' => $idUtilisateur,
            'id_creneau'     => $idCreneau,
            'statut'         => 'en_attente',
            'sujet'          => $sujet
        ]);

        $creneauxModel->update($idCreneau, ['statut' => 'occupé']);

        $session->setFlashdata('success', 'Votre rendez-vous est en attente de validation.');
        return redirect()->to(base_url('patient/appointment'));
    }
}
