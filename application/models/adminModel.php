<?php
    class adminModel extends createTableModel{
        public function addCatagory($catagory){
            if(!$this->db->table_exists('catagory')){
                $createTable=new createTableModel();
                $createTable->createCatagoryTable();
            }
            $data=[
                "catagory"=>$catagory,
                "cimg"=>rand(00000000,99999999999),
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