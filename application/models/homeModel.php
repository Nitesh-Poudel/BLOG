<?php
    class homeModel extends CI_Model{
        private $createTable;
        public function __construct() {
            //$this->load->model('createTableModel'); // Load the createTableModel-loader_in_autoload

            parent::__construct();
            $this->createTable= new CreateTableModel(); 
        }

        public function uploadBlog($title,$content,$category){
            if (!$this->db->table_exists('blogs')) {
                $this->createTable->createBlogsTable();
             }
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

        public function showContent($category){
            $this->db->from('blogs');
            $this->db->select('blogs.*, users.fname, users.lname');
            $this->db->order_by('blogs.blogid', 'DESC');


            $this->db->join('users', 'blogs.userid = users.uid');

            if (!empty($category)) {
                $this->db->where('catagoryID', $category);
            }
        

            $query = $this->db->get();
            if($query->num_rows()>=1){
                return $query->result();
            }
        }


        public function mainContent($blogid){
            $this->db->select('blogs.*, users.fname, users.lname,users.uid, catagory.catagory');
            $this->db->from('blogs');
            $this->db->join('users', 'blogs.userid = users.uid');
            $this->db->where('blogs.blogid', $blogid);

            $this->db->join('catagory', 'blogs.catagoryID = catagory.cid');
        
            $query = $this->db->get();
            if($query->num_rows() >= 1){
                return $query->row_array();
            }
        }
        



        public function getcatagoryForUpload(){
            $this->db->from('catagory');
            $this->db->order_by('catagory', 'ASC');
         
            $query=$this->db->get();
            if($query->num_rows()>=1){
                return $query->result();
            }
        
        }


        public function getCatagory() {
            $this->db->select('c.*, COUNT(b.catagoryid) AS occurrence_count');
            $this->db->from('catagory c');
            $this->db->join('blogs b', 'c.cid = b.catagoryid', 'left');
            $this->db->group_by('c.cid');
            $this->db->order_by('occurrence_count', 'DESC');
            //$this->db->limit(5);
        
            $query = $this->db->get();
        
            if ($query->num_rows() >= 1) {
                return $query->result();
            } else {
                return array(); // Return an empty array if no results found
            }
        }
        


        public function deleteContent($blogid){
            $this->db->where('blogid',$blogid);
           $delete= $this->db->delete('blogs');
           if($delete){
            return true;
           }
           else{
            return false;
           }
        }

    

    public function updateContent($blogid,$title,$content,$catagoryId){
        $data=[
            'title'=>$title,
            'catagoryID'=>$catagoryId,
            'content'=>$content,
            

        ];
        $user=$this->session->userdata['userid'];
        $this->db->where('blogid', $blogid);
        $this->db->where('userid', $user);
        $this->db->set($data); 
        $update=$this->db->update('blogs');

        if($update){
            return $data;
        }
        else{
            return false;
        }   
    }




    //to_save_post_for_future:
        public function savePost($userid, $blogid) {
          
                 $existingRecord = $this->db
                ->where('userid', $userid)
                ->where('blogid', $blogid)
                ->get('save')
                ->row();
        
              if ($existingRecord) {
                return false;
            }
            $data = [
                'userid' => $userid,
                'blogid' => $blogid,
                'date'   => date("Y-m-d H:i:s")
            ];
        
            $q = $this->db->insert('save', $data);
        
            return $q ? true : false;
        }
     
    }



?>