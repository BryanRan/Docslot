<?php

namespace App\Controllers\Patient;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\RendezvousModel;
use App\Models\CreneauxModel;

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
            ->select('rendezvous.id, rendezvous.statut,rendezvous.sujet as sujet, creneaux.date, creneaux.heure_debut, creneaux.heure_fin, medecins.nom as medecin_nom, medecins.prenom as medecin_prenom, medecins.specialite')
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

    public function annulerRDV($idRdv)
    {
        $session = session();
        $idUtilisateur = $session->get('user_id');

        if (!$idUtilisateur) {
            $session->setFlashdata('error', 'Vous devez être connecté pour annuler un rendez-vous.');
            return redirect()->to(base_url('login'));
        }

        $rendezvousModel = new RendezvousModel();
        $creneauxModel = new CreneauxModel();

        // On vérifie que le RDV appartient bien à ce patient
        $rdv = $rendezvousModel
            ->where('id', $idRdv)
            ->where('id_utilisateur', $idUtilisateur)
            ->first();

        if (!$rdv) {
            $session->setFlashdata('error', 'Rendez-vous introuvable ou non autorisé.');
            return redirect()->back();
        }

        // On met à jour le statut du RDV (par exemple "annulé")
        $rendezvousModel->update($idRdv, ['statut' => 'annulé']);

        // On remet le créneau à "disponible"
        $creneauxModel->update($rdv['id_creneau'], ['statut' => 'disponible']);

        $session->setFlashdata('success', 'Votre rendez-vous a été annulé avec succès.');
        return redirect()->to(base_url('patient/appointment'));
    }
}
