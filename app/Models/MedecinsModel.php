<?php

namespace App\Models;

use CodeIgniter\Model;

class MedecinsModel extends Model
{
    protected $table      = 'medecins';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'nom',
        'prenom',
        'email',
        'phone',
        'specialite',
        'description',
        'created_at',
        'updated_at'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
