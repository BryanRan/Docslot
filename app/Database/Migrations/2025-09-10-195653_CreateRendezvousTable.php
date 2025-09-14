<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateRendezvousTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'id_utilisateur' => [
                'type'       => 'INT',
                'unsigned'   => true,
                'null'       => false
            ],
            'id_creneau' => [
                'type'       => 'INT',
                'unsigned'   => true,
                'null'       => false
            ],
            'statut' => [
                'type'       => 'ENUM',
                'constraint' => ['validé', 'refusé', 'annulé'],
                'default'    => 'validé'
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_utilisateur', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_creneau', 'creneaux', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('rendezvous');
    }

    public function down()
    {
        $this->forge->dropTable('rendezvous');
    }
}
