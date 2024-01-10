<?php
    class registrationModel extends createTableModel{
        public function register($fname,$lname,$email,$gender,$password){

            //$this->load->library('database');//this_can_be_include_in_auto_load
                if(!$this->db->table_exists('users')){
                $createTable=new createTableModel();
                $createTable->createUsersTable();
            }
           $data=[
            'fname'=>$fname,
            'lname'=>$lname,
            'email'=>$email,
            'gender'=>$gender,
            'password'=>$password
        ];

     
            //$this->load->library('database');//this_can_be_include_in_auto_load
          

            
            $q=$this->db->insert('users',$data);//active_record_user
            if($q){
                return true;
            }

        }
    }
?>