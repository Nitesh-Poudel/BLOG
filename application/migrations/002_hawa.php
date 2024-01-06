<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_users extends CI_Migration {

    public function up() {
        $fields = [
            'aaauid' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'fnameveve' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'lnamevrv' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'emailee' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'unique' => TRUE, // Adding unique constraint to email field
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'gender' => [
                'type' => "ENUM('male', 'female', 'others')",
            ],
            // Add more fields as needed
        ];

        $this->dbforge->add_field('aaaid');
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('aaaid', TRUE);
        $this->dbforge->create_table('hawa');
        
        // Adding unique constraint to email field after table creation
        $this->dbforge->add_unique('email');
    }

    public function down() {
        $this->dbforge->drop_table('users', TRUE);
    }
}
