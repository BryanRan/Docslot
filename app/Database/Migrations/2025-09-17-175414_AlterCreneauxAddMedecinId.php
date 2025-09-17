<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterCreneauxAddMedecinId extends Migration
{
    public function up()
    {
        // Ajouter la colonne medecin_id
        $fields = [
            'medecin_id' => [
                'type'       => 'INT',
                'unsigned'   => true,
                'null'       => false,
                'after'      => 'id', // position de la colonne
            ],
        ];
        $this->forge->addColumn('creneaux', $fields);

        // Ajouter la clé étrangère
        $this->forge->addForeignKey('medecin_id', 'medecins', 'id', 'CASCADE', 'CASCADE', 'creneaux_medecin_id_foreign');
    }

    public function down()
    {
        // Supprimer la clé étrangère
        $this->forge->dropForeignKey('creneaux', 'creneaux_medecin_id_foreign');

        // Supprimer la colonne
        $this->forge->dropColumn('creneaux', 'medecin_id');
    }
}
