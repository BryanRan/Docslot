<?php

namespace App\Controllers\Patient;

use App\Controllers\BaseController;
use App\Models\CreneauxModel;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\RendezvousModel;

class DashboardController extends BaseController
{
    public function dashboard()
    {
        $rdv = new RendezvousModel();
        $cr = new CreneauxModel();

        $userId = session()->get('user_id');

        $data['totalRdv'] = $rdv->where('id_utilisateur', $userId)->countAllResults();

        $rdv->resetQuery();

        $now = date('Y-m-d H:i:s');
        $data['rdvEnAttente'] = $rdv
            ->where('id_utilisateur', $userId)
            ->where('statut', 'en_attente')
            ->countAllResults();

        $data['prochainRdv'] = $rdv
            ->select('rendezvous.id, creneaux.date, creneaux.heure_debut, creneaux.heure_fin,creneaux.medecin_id ,medecins.id,medecins.nom as nom_medecin,medecins.prenom as prenom_medecin')
            ->join('creneaux','creneaux.id = rendezvous.id_creneau')
            ->join('medecins','creneaux.medecin_id = medecins.id')
            ->where('rendezvous.id_utilisateur', $userId)
            ->first();

        $data['listeCreneaux'] = $cr
            ->select('creneaux.date as cr_date,creneaux.heure_debut as cr_hd,creneaux.heure_fin,creneaux.medecin_id,medecins.id,medecins.nom as nom_medecin')
            ->join('medecins', 'creneaux.medecin_id = medecins.id')
            ->where('statut','disponible')
            ->findAll();

        $data['historique'] = $rdv
            ->select('rendezvous.id,rendezvous.statut as rd_statut, creneaux.date as date, creneaux.heure_debut as cr_d, creneaux.heure_fin as cr_f,creneaux.medecin_id ,medecins.id,medecins.nom as nom_medecin,medecins.prenom as prenom_medecin,medecins.specialite as spec_medecin')
            ->join('creneaux', 'creneaux.id = rendezvous.id_creneau')
            ->join('medecins', 'creneaux.medecin_id = medecins.id')
            ->where('rendezvous.id_utilisateur', $userId)
            ->whereNotIn('rendezvous.statut',['en_attente'])
            ->findAll();

        return view('patient/dashboard', $data);
    }
}
