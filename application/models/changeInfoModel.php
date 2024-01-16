<?php
class changeInfoModel extends CI_Model{
    public function updatePassword($oldPassword,$newPassword,$userid='',$email=''){
        
        $data=[
            'password'=>$newPassword
        ];
        $this->db->where('uid', $userid);
        $this->db->where('password', $oldPassword);
        $update=$this->db->update('users', $data);
        if($update){
            return true;
        }

        else{
            return false;
        }
       
    }
}
?>