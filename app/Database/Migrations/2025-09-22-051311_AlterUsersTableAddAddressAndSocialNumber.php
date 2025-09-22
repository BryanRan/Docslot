<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterUsersTableAddAddressAndSocialNumber extends Migration
{
    public function up()
    {
        // Ajout de la colonne adresse
        $this->forge->addColumn('users', [
            'adresse' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
                'after'      => 'gender' // après la colonne gender
            ],
            // Ajout de la colonne numero de sécurité sociale
            'numero_securite_sociale' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => true,
                'after'      => 'adresse'
            ]
        ]);

        // Suppression de la colonne role
        $this->forge->dropColumn('users', 'role');
    }

    public function down()
    {
        // Recréer la colonne role
        $this->forge->addColumn('users', [
            'role' => [
                'type'       => 'ENUM',
                'constraint' => ['patient', 'admin'],
                'default'    => 'patient',
                'after'      => 'mot_de_passe'
            ]
        ]);

        // Supprimer les colonnes adresse et numero_securite_sociale
        $this->forge->dropColumn('users', ['adresse', 'numero_securite_sociale']);
    }
}
