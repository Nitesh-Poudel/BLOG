<?php 
    class home extends CI_controller{
        public function index(){
   //comment_outs_are_responsible_to_run_page_only_after_login_which is_not_useable
    //$user = $this->session->userdata('userid');
    //if ($user) {
        $this->load->model('loginModel');
        //$userDetail = $this->loginModel->userinfo($user);
        //if($userDetail){
            //$personaldata = array('userDetail' => $userDetail);
            $this->load->model('homeModel');
            $this->load->model('reactionModel');

            $category = $this->input->get('catagory'); // Using CodeIgniter's input class for better security
            $contents = $this->homeModel->showContent($category);
            
            $blogid=$this->input->post('blogid');

            
            if($contents){
               /* echo'<pre>';
                print_r($contents);
                echo'</pre>';*/

                $limitedContents=[];//its_arrey_to_store_many_contents
                
                foreach ($contents as $content) {
                    $limitedContent = $this->limit_text($content->content); // Process content
                    $limitedContents[] = $limitedContent; 
                }
                
                //print_r($contents->content);
                //echo$limitedContents[3];
                
               
                $data['contents'] = $contents;
                $data['lcontents'] = $limitedContents;
               
               
                echo'<pre>';
                //print_r($data['contents']);
               echo'</pre>';
                //exit();
                
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
        //}


       


    //} 
    //else {
    //    redirect('login');
    //}
}


        



        public function limit_text($text, $limit = 100) {
            $words = explode(" ", $text);
            if (count($words) > $limit) {
                $text = implode(" ", array_slice($words, 0, $limit));
                $text .= " <p>See More...</p>";
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