<?php
    class adminModel extends CI_model{
        public function addCatagory($catagory){
            $data=[
                "catagory"=>$catagory
            ];

            $query=$this->db->insert('catagory',$data);
            if($query){
                return TRUE;
                echo $data."is catagory";
                //print_r($data);
            }
        }
    }
?>