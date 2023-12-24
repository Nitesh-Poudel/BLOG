<?php 
    class home extends CI_controller{
        public function index(){
            $this->load->library('session');


            $user = $this->session->userdata('userid');
            $data='';

            if ($user) {
                // User data is available in the session
                // Pass user data to the view to display on the 'home' page
               
                //$this->load->view('home', ['userid' => $user]); // Load 'home' view with user data
                $this->load->model('loginModel');
                $userDetail=$this->loginModel->userinfo($user);
                if($userDetail){
                    $data = array();
                    $this->load->helper('form');
                    $data['userDetail'] = $userDetail; // Assign userDetail to the $data array

                    
                    
                    $this->load->model('homeModel');
                    $contents=$this->homeModel->showContent();
                    if($contents){
                        $contentsData=array();
                        $contentsData['contents']=$contents;
                    }


                    $this->load->view('home',$contentsData);
                }

                //redirect('home');


            } 
            else {
                // User data not found in session, handle accordingly (e.g., redirect to login)
               
                redirect('login'); // Redirect to login page if user data is not available;

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