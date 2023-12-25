<?php 
    class home extends CI_controller{
        public function index(){
    $this->load->library('session');
    $user = $this->session->userdata('userid');
    if ($user) {
        $this->load->model('loginModel');
        $userDetail = $this->loginModel->userinfo($user);
        if($userDetail){
            $data = array('userDetail' => $userDetail);
            $this->load->model('homeModel');

            $category = $this->input->get('catagory'); // Using CodeIgniter's input class for better security
            $contents = $this->homeModel->showContent($category);
            
            
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
            $this->load->view('home', $data);
        }


    } 
    else {
        redirect('login');
    }
}


        public function admin(){
            $this->load->view('adminPannel');
        }



        public function upload(){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('title','Title','required|trim',);
            $this->form_validation->set_rules('content','Content','required');
            $this->form_validation->set_rules('catagory','catagory','required');


            if($this->form_validation->run()){
                $title=$this->input->post('title');
                $content=$this->input->post('content');
                $category=$this->input->post('catagory');
                //echo$title.' '.$content;

                $this->load->model('HomeModel'); // Loads the HomeModel
                $this->load->library('session');
                if($a=$this->HomeModel->uploadBlog($title,$content,$category)){
                    redirect('home');
                } 

            }
            else{
                $this->load->view('home');
               // redirect('home');
            }
      
           // echo"hello_hiii_tata_bye";
        }




      

        public function maincontent(){
            
            
            $blogid = $this->input->get('blogid');
            $this->load->model('homeModel');
            $content['result']=$this->homeModel->mainContent($blogid);
        
            $this->load->model('reactionModel');
            $content['likeCount'] = $this->reactionModel->LikeCount($blogid);
            
            $this->load->view('contentHighlight',$content);
            
        }   
           

    }

    
    
?>