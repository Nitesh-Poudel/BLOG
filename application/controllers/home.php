<?php 
    class home extends My_controller{
       
        public function __construct() {
            parent::__construct();
            //$this->load->model('loginModel');
            $this->load->model('homeModel');
            $this->load->model('reactionModel');
            $this->load->model('notificationModel');
            $this->load->library('session');
        }
    
       

        public function index(){

            $user=$this->session->userdata('userid');

           
            $data['notifications'] = $this->notificationModel->showNotification($user); // Call the method showNotification from notificationModel
            
            $category = $this->input->get('catagory'); // Using CodeIgniter's input class for better security
            $contents = $this->homeModel->showContent($category);
            
            $blogid=$this->input->post('blogid');

            
            if($contents){
           
                $limitedContents=[];//its_arrey_to_store_many_contents
                
                foreach ($contents as $content) {
                    $limitedContent = $this->limit_text($content->content); // Process content
                    $limitedContents[] = $limitedContent; 
                }
             
               
                $data['contents'] = $contents;
                $data['lcontents'] = $limitedContents;
                $categoriesData = $this->homeModel->getCatagory(); 
                
                if ($categoriesData) {
                    $data['categories'] = $categoriesData;
                }
                else{
                    echo"no-data_availabel";
                }
            }


            //get_like_and_comment_count
          
            foreach ($contents as $content) {
                $blogid = $content->blogid;
                
                // Pass blogid to model method
                $data['likeCount'][$blogid] = $this->reactionModel->likeCount($blogid);
                $data['CommentCount'][$blogid] = $this->reactionModel->CommentCount($blogid);
                
                // Rest of your code...
            }
            //echo'<pre>';
           // print_r($data);
            //exit()
            $this->load->view('header', $data);
            $this->load->view('home', $data);
        //}


 
    }

     function limit_text($text, $limit = 100) {
        $words = explode(" ", $text);
        if (count($words) > $limit) {
            $text = implode(" ", array_slice($words, 0, $limit));
            $text .= " <p>See More...</p>";
        }
        return $text;
    }

        
    
    public function maincontent(){
        $this->load->library('session');
        $user=$this->session->userdata('userid');

        $content['notifications'] = $this->notificationModel->showNotification($user); // Call the method showNotification from notificationModel
       
        $blogid = $this->input->get('blogid');
    
        $content['result']=$this->homeModel->mainContent($blogid);
    
        $this->load->model('reactionModel');
        $content['likeCount'] = $this->reactionModel->LikeCount($blogid);
        $content['getComment']=$this->reactionModel->getComment($blogid);
        $content['doILike']=$this->reactionModel->doILike($blogid,$user);
      
        $this->load->view('contentHighlight',$content);
        
    }   



    public function save(){
       $user=$this->session->userdata('userid');
        $blogid=$this->input->post('blogid');

        $this->load->model('home');


       
    }   
           

    }
    
    
?>