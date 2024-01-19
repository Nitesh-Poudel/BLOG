<?php
    class adminModel extends CI_Model{
        public function addCatagory($catagory,$imgName=''){
            if(!$this->db->table_exists('catagory')){
                $createTable=new createTableModel();
                $createTable->createCatagoryTable();
            }
            $data=[
                "catagory"=>$catagory,
                "cimg"=>$imgName,
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