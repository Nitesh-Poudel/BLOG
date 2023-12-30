<?php
    class userinfoModel extends CI_Model{
        public function index($userid){
            $query=$this->db->where(['uid'=>$userid])
                          
            ->get('users');

            if ($query->num_rows() == 1) {
                 return $query->row(); // Return the user object
            } 
            else {
                return false;
            }  

        }


        public function uploadedContent($userid){
            $query=$this->db->where(['userid'=>$userid])
                          
            ->get('blogs');

            if ($query->num_rows() >= 1) {
                 return $query->result(); // Return the user object
            } 
            else {
                return false;
            }  

        }
        
    }
?>