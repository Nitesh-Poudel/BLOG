<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_users extends CI_Migration {

    public function up() {
        $fields = [
            'uid' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'fname' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'lname' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'email' => [
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

        $this->dbforge->add_field('uid');
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('uid', TRUE);
        $this->dbforge->create_table('users');
        
        // Adding unique constraint to email field after table creation
        $this->dbforge->add_unique('email');
    }

    public function down() {
        $this->dbforge->drop_table('users', TRUE);
    }
}
