<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCreneauxTable extends Migration
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
            'date' => [
                'type' => 'DATE',
                'null' => false,
            ],
            'heure_debut' => [
                'type' => 'TIME',
                'null' => false,
            ],
            'heure_fin' => [
                'type' => 'TIME',
                'null' => false,
            ],
            'statut' => [
                'type'       => 'ENUM',
                'constraint' => ['disponible', 'occupé'],
                'default'    => 'disponible'
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('creneaux');
    }

    public function down()
    {
        $this->forge->dropTable('creneaux');
    }
}
