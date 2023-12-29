<?php 
    class home extends CI_controller{
        public function index(){
   
    $user = $this->session->userdata('userid');
    if ($user) {
        $this->load->model('loginModel');
        $userDetail = $this->loginModel->userinfo($user);
        if($userDetail){
            $data = array('userDetail' => $userDetail);
            $this->load->model('homeModel');
            $this->load->model('reactionModel');

            $category = $this->input->get('catagory'); // Using CodeIgniter's input class for better security
            $contents = $this->homeModel->showContent($category);
            
            $blogid=$this->input->post('blogid');

            
            if($contents){
                $data['contents'] = $contents;

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
        
            $this->load->view('home', $data);
        }


       


    } 
    else {
        redirect('login');
    }
}


        



        public function limit_text($text, $limit = 200) {
            $words = explode(" ", $text);
            if (count($words) > $limit) {
                $text = implode(" ", array_slice($words, 0, $limit));
                $text .= " <a href='#'>See More</a>";
            }
            return $text;
        }

        


      

        public function maincontent(){
            
            
            $blogid = $this->input->get('blogid');
            $this->load->model('homeModel');
            $content['result']=$this->homeModel->mainContent($blogid);
        
            $this->load->model('reactionModel');
            $content['likeCount'] = $this->reactionModel->LikeCount($blogid);


            $content['getComment']=$this->reactionModel->getComment($blogid);
            
          
            $this->load->view('contentHighlight',$content);
            
        }   
           

    }
    
    
?>