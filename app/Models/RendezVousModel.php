<?php

namespace App\Models;

use CodeIgniter\Model;

class RendezvousModel extends Model
{
    protected $table = 'rendezvous';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_utilisateur', 'id_creneau', 'statut'];

    public function getAllWithDetails()
    {
        return $this->select('rendezvous.id, users.nom, users.prenom, creneaux.date, creneaux.heure_debut, creneaux.heure_fin, rendezvous.statut')
            ->join('users', 'users.id = rendezvous.id_utilisateur')
            ->join('creneaux', 'creneaux.id = rendezvous.id_creneau')
            ->orderBy('creneaux.date', 'DESC')
            ->findAll();
    }
}
