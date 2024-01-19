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


        public function getContent($userid,$todo=''){

            if($todo=='saved'){
                $this->db->select('*');
                $this->db->join('save', 'blogs.blogid = save.blogid'); // Fix the join statement
                $this->db->where(['save.userid'=>$userid]);
                $query=$this->db->get('blogs');

                if ($query->num_rows() >= 1) {
                     return $query->result(); // Return the user object
                } 
                else {
                    return false;
                } 
            } 
            else{
                $this->db->where(['userid'=>$userid]);

                $query=$this->db->get('blogs');

                if ($query->num_rows() >= 1) {
                     return $query->result(); // Return the user object
                } 
                else {
                    return false;
                } 
            }

        }
        
    }
?>