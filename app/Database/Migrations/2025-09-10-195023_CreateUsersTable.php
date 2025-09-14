<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        // Création de la table users
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'nom' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => false,
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'unique'     => true,
                'null'       => false,
            ],
            'mot_de_passe' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => false,
            ],
            'role' => [
                'type'       => 'ENUM',
                'constraint' => ['patient', 'admin'],
                'default'    => 'patient'
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('users');

        // Insertion d'un admin par défaut
        $data = [
            'nom' => 'Admin',
            'email' => 'administrator@gmail.com',
            'mot_de_passe' => password_hash('admin12345', PASSWORD_DEFAULT),
            'role' => 'admin'
        ];
        $this->db->table('users')->insert($data);
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
