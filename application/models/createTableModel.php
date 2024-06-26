<?php
class createTableModel extends CI_Model{
        public function __construct(){
        parent::__construct();
        $this->load->dbforge(); // Load dbforge library
        if(!$this->db->table_exists('notification')){
            $this->createNotificationTable();
        }
        if(!$this->db->table_exists('blogs')){
            $this->createBlogsTable();
        }
        if(!$this->db->table_exists('likes')){
            $this->createLikesTable();
        }
        if(!$this->db->table_exists('comments')){
            $this->createCommentsTable();
        }
        if(!$this->db->table_exists('save')){
            $this->createSaveTable();
        }
        if(!$this->db->table_exists('users')){
            $this->createCommentsTable();
        }
        if(!$this->db->table_exists('catagory')){
            $this->createCommentsTable();
        }

        if(!$this->db->table_exists('follow')){
            $this->createFollowTable();
        }
        if(!$this->db->table_exists('block')){
            $this->createFollowTable();
        }

    }

    protected function createFollowTable(){
        $fields=[
            'followid'=>[
                'type'=>'INT',
                'constraint'=>11,
                'auto_increment'=>true
            ],
            'followBy'=>[
                'type'=>'INT'
            ],
            'followTo'=>[
                'type'=>'INT'
            ],
            'date'=>[
                'type'=>'VARCHAR',
                'constraint'=>22
            ]

            
            ];
        $this->dbforge->add_key('followid', true);
        $this->dbforge->add_field($fields);
        //$this->dbforge->create_table('follow');
    }

    protected function createBlockTable(){
        $fields=[
            'blockid'=>[
                'type'=>'INT',
                'constraint'=>11,
                'auto_increment'=>true
            ],
            'blockBy'=>[
                'type'=>'INT'
            ],
            'blockTo'=>[
                'type'=>'INT'
            ],
            'date'=>[
                'type'=>'VARCHAR',
                'constraint'=>22
            ]

            
            ];
        $this->dbforge->add_key('blockid', true);
        $this->dbforge->add_field($fields);
        $this->dbforge->create_table('block');
    }

    protected function createBlogsTable(){
        $fields=[
            'blogid'=>[
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'content' => [
                'type' => 'VARCHAR',
                'constraint' => 2000
            ],
            'date' => [
                'type' => 'VARCHAR',
                'constraint' => 22
            ],
            'userid' => [
                'type' => 'INT',
                'constraint' => 11

            ],
            'catagoryID' => [
                'type' => 'INT',
                'constraint' => 11

            ]
          
        ];
    
        $this->dbforge->add_key('blogid', true);
        $this->dbforge->add_field($fields);
        $this->dbforge->create_table('blogs');

        
    }


    protected function createSaveTable(){
        $fields = [
            'savingId' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'userid' => [
                'type' => 'INT',
                'constraint' => 11
            ],
            'blogid' => [
                'type' => 'INT',
                'constraint' => 11
            ],
            'date' => [
                'type' => 'VARCHAR',
                'constraint' => 22

            ]
         
        ];
    

        $this->dbforge->add_key('savingId', true);
        $this->dbforge->add_field($fields);
        $this->dbforge->create_table('save');
    }

    protected function createCommentsTable(){
        $fields=[ 
            'commentId' => [
            'type' => 'INT',
            'constraint' => 11,
            'auto_increment' => true,
            'unsigned' => true,
            'primary_key' => true,
        ],
        'blogid' => [
            'type' => 'INT',
            'constraint' => 11,
            'unsigned' => true,
            'default' => 0,
        ],
        'userid' => [
            'type' => 'INT',
            'constraint' => 11,
            'unsigned' => true,
            'default' => 0,
        ],
        'date' => [
            'type' => 'VARCHAR',
            'constraint' => 22,
        ],
        'comment' => [
            'type' => 'VARCHAR',
            'constraint' => 200,
        ],
        // Add more fields as needed...
        ];

        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('commentId', true); // Set primary key
        $this->dbforge->create_table('comments', true); // Create 'comments' table
    }

    protected function createUsersTable(){
        $fields = [
            'uid' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
                'unsigned' => true,
                'primary_key' => true,
            ],
            'fname' => [
                'type' => 'VARCHAR',
                'constraint' => 22,
                'null' => false,
            ],
            'lname' => [
                'type' => 'VARCHAR',
                'constraint' => 22,
                'null' => false,
            ],
            'gender' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => false,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false,
                'unique' => true
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 150,
                'null' => false,
            ],
            // Add more fields as needed...
        ];
    
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('uid', true); // Set primary key
        $this->dbforge->create_table('users', true); // Create 'users' table
    }
    
    protected function createCatagoryTable(){
        $fields=[
            'cid'=>[
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
                'primary_key' => true,
            ],
            'catagory'=>[
                'type'=>'VARCHAR',
                'constraint'=>100,
                'unique'=>true

            ],
            'cimg'=>[
                'type'=>'VARCHAR',
                'constraint'=>100,
                //'unique'=>true
            ]
        ];

        
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('cid', true); // Set primary key
        $this->dbforge->create_table('catagory', true); // Create 'users' table
   

    }

    protected function createLikesTable(){
        $fields=[
            'likeid'=>[
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
                'primary_key' => true,
          
            ],
            'blogid'=>[
                'type' => 'INT',
                'constraint' => 11,
                
            ],
            'userid'=>[
                'type' => 'INT',
                'constraint' => 11,
              
            ],
            'date'=>[
                'type'=>'VARCHAR',
                'constraint'=>22,
            ]

            ];

            $this->dbforge->add_field($fields);
            $this->dbforge->add_key('likeid', true); // Set primary key
            $this->dbforge->create_table('likes', true); // Create 'users' table
       


    }

    public function createNotificationTable(){
        $fields=[
            'notificationId'=>[
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
                'primary_key' => true,
          
            ],
            'notificationFrom'=>[
                'type' => 'INT',
                'constraint' => 11,
                
            ],
            'notificationTo'=>[
                'type' => 'INT',
                'constraint' => 11,
              
            ],

            'notificationOn'=>[
                'type' => 'INT',
                'constraint' => 11,
              
            ],

            'notification'=>[
                'type' => 'VARCHAR',
                'constraint' => 200,
              
            ],


            'date'=>[
                'type'=>'VARCHAR',
                'constraint'=>22,
            ],

            'seen'=>[
                'type'=>'INT',
                'constraint'=>1,
            ]




            ];

            $this->dbforge->add_field($fields);
            $this->dbforge->add_key('notificationId', true); // Set primary key
            $this->dbforge->create_table('notification', true); // Create 'users' table
       

    }
    

}
?>