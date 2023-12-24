<?php
    class loginModel extends CI_Model{
        public function LoginValidate($email,$password){
            //echo $email.'  ',$password;
            $query=$this->db->where(['email'=>$email,'password'=>$password])
                          
                            ->get('users');
            
            if ($query->num_rows() == 1) {
            
                return $query->row()->uid; // Return the user object
            } 
            else {
                return false;
            }   
        }


        public function userinfo($userid){
            //echo $email.'  ',$password;
            $query=$this->db->where(['uid'=>$userid])
                          
                            ->get('users');
            
            if ($query->num_rows() == 1) {
            
                return $query->row(); // Return the user object
            } 
            else {
                return false;
            }   
        }



    }
?>
