<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddSujetToRendezvous extends Migration
{
    public function up()
    {
        $this->forge->addColumn('rendezvous', [
            'sujet' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
                'after' => 'statut',
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('rendezvous', 'sujet');
    }
}
