<?php

namespace App\Models;

use CodeIgniter\Model;

class CreneauxModel extends Model
{
    protected $table      = 'creneaux';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'medecin_id',
        'date',
        'heure_debut',
        'heure_fin',
        'statut'
    ];

    public function getCreneauxWithMedecins()
    {
        return $this->select('creneaux.*, medecins.nom as medecin_nom, medecins.prenom as medecin_prenom,medecins.specialite as medecin_spec')
            ->join('medecins', 'medecins.id = creneaux.medecin_id', 'left')
            ->where('creneaux.statut', 'disponible')
            ->orderBy('creneaux.date', 'ASC')
            ->orderBy('creneaux.heure_debut', 'ASC')
            ->findAll();
    }


    // gestion automatique des timestamps (avec CURRENT_TIMESTAMP en DB)
    protected $useTimestamps = true;
}
