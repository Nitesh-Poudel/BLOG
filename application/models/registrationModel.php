<?php
    class registrationModel extends CI_Model{
        public function register($fname,$lname,$email,$gender,$password){

            //$this->load->library('database');//this_can_be_include_in_auto_load
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