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

    // gestion automatique des timestamps (avec CURRENT_TIMESTAMP en DB)
    protected $useTimestamps = true;
}
