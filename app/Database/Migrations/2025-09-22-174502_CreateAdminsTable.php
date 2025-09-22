<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAdminsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'           => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'nom'          => ['type' => 'VARCHAR', 'constraint' => '100'],
            'email'        => ['type' => 'VARCHAR', 'constraint' => '150', 'unique' => true],
            'contact'      => ['type' => 'VARCHAR', 'constraint' => '20', 'null' => true],
            'mot_de_passe' => ['type' => 'VARCHAR', 'constraint' => '255'],
            'created_at'   => ['type' => 'DATETIME', 'null' => true],
            'updated_at'   => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('admins');

        // Insertion d’un admin par défaut
        $data = [
            'nom'          => 'Administrateur',
            'email'        => 'admin@docslot.com',
            'contact'      => '0325687612',
            'mot_de_passe' => password_hash('admin123', PASSWORD_DEFAULT),
            'created_at'   => date('Y-m-d H:i:s'),
        ];

        $this->db->table('admins')->insert($data);
    }

    public function down()
    {
        $this->forge->dropTable('admins');
    }
}
