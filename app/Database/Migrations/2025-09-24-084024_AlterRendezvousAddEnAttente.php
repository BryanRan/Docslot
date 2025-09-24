<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterRendezvousAddEnAttente extends Migration
{
    public function up()
    {
        // Modifier l'ENUM pour ajouter 'en_attente'
        $fields = [
            'statut' => [
                'name'       => 'statut',
                'type'       => 'ENUM',
                'constraint' => ['validé', 'refusé', 'annulé', 'en_attente'],
                'default'    => 'en_attente',
            ],
        ];

        $this->forge->modifyColumn('rendezvous', $fields);
    }

    public function down()
    {
        // Revenir à l'ancienne ENUM sans 'en_attente'
        $fields = [
            'statut' => [
                'name'       => 'statut',
                'type'       => 'ENUM',
                'constraint' => ['validé', 'refusé', 'annulé'],
                'default'    => 'validé',
            ],
        ];

        $this->forge->modifyColumn('rendezvous', $fields);
    }
}
