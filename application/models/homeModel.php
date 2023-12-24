<?php
    class homeModel extends CI_Model{
        public function uploadBlog($title,$content,$category){
            $data=[
                'title'=>$title,
                'content'=>$content,
                'date'=> date("Y-m-d H:i:s"),
                'userid'=> $_SESSION['userid'],
                'catagoryID'=>$category

            ];
           
            $q=$this->db->insert('blogs',$data);//active_record_user
            if($q){
                return true;
            }
    
        }


        public function showContent(){
            $this->db->select('blogs.*, users.fname, users.lname');
            $this->db->from('blogs');
            $this->db->join('users', 'blogs.userid = users.uid');
            $this->db->order_by('blogs.blogid', 'DESC');

            $query = $this->db->get();
            if($query->num_rows()>=1){
                return $query->result();
            }
        }


        public function mainContent($blogid){
            $this->db->select('blogs.*, users.fname, users.lname');
            $this->db->from('blogs');
            $this->db->join('users', 'blogs.userid = users.uid');
            $this->db->where('blogs.blogid', $blogid);

            $query = $this->db->get();
            if($query->num_rows()>=1){
                return $query->row_array();
            }
        
        }



        public function getCatagory(){
            $this->db->from('catagory');
            $this->db->order_by('catagory', 'ASC');
            $query=$this->db->get();
            if($query->num_rows()>=1){
                return $query->result();
            }
        
        }
    }
?>