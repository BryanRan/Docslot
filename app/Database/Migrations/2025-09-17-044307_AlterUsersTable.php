<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterUsersTable extends Migration
{
    public function up()
    {
        // Ajout de colonnes
        $this->forge->addColumn('users', [
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['active', 'inactive', 'banned'],
                'default'    => 'active',
                'after'      => 'role'
            ],
            'phone' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'null'       => true,
                'after'      => 'mot_de_passe'
            ],
            'date_of_birth' => [
                'type' => 'DATE',
                'null' => true,
                'after' => 'phone'
            ],
            'gender' => [
                'type'       => 'ENUM',
                'constraint' => ['Homme', 'Femme', 'Autre'],
                'null'       => true,
                'after'      => 'date_of_birth'
            ]
        ]);
    }

    public function down()
    {
        // Suppression des colonnes si rollback
        $this->forge->dropColumn('users', ['role', 'status', 'phone', 'date_of_birth', 'gender']);
    }
}
