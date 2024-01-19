<?php
    class userProfile extends My_controller{

        public function __construct(){
            parent::__construct();
            $this->load->model('userinfoModel');
            $this->load->library('session');
            $this->load->model('homeModel');
            $this->load->model('relationModel');
            
        }
        public function index(){
            $user=$this->session->userdata['userid'];
            $url_userid = $this->input->get('userid');
            if($url_userid){
                $data=$this->input->get('userid');
            }
            else{
                $data = $this->session->userdata('userid');
            }
          

            $userdata['userdata']=$this->userinfoModel->index($data);
           
            $userdata['userUploadeddata']=$this->userinfoModel->getContent($data);
            $userdata['doIFollow']=$this->relationModel->isFollow($user,$url_userid);
         
            //print_r($userdata);
            $this->load->view('userProfile',$userdata);
        }



        public function edit(){
            //echo"lets_edit";
           $userid= $this->input->post('uid');
           $blogid= $this->input->post('blogid');

          // echo$blogid;exit();
         
            $sessionUserId=$this->session->userdata('userid');

            $data['sessionUserId']= $sessionUserId;
            //echo"userid: ".$userid." session userId : ".$sessionUserId;
            if($userid==$sessionUserId){
                //echo"can_edit";
                $this->load->model('homeModel');
                $data['editable']=$this->homeModel->mainContent($blogid);
                $data['categories']= $this->homeModel->getcatagoryForUpload(); 
                //print_r($editable);

                $this->load->view('uploadBlog',$data);
                //redirect('upload');

            }

        }

        public function delete(){
            echo"lets_delete";
            $userid= $this->input->post('uid');
           $blogid= $this->input->post('blogid');

          // echo$blogid;exit();
        
            $sessionUserId=$this->session->userdata('userid');

            //echo"userid: ".$userid." session userId : ".$sessionUserId;
            if($userid==$sessionUserId){
                //echo"can_edit";
                $this->load->model('homeModel');
                $delete=$this->homeModel->deleteContent($blogid);

                redirect('userProfile');
            }
        }


        public function update(){

            $this->load->library('form_validation');
            $this->form_validation->set_rules('title','Title','required|trim',);
            $this->form_validation->set_rules('content','Content','required');
            $this->form_validation->set_rules('category','catagory','required');


            if($this->form_validation->run()){
               
                $userid= $this->input->post('uid');
                $blogid= $this->input->post('blogid');
                $title= $this->input->post('title');
                $content=$this->input->post('content');
                $catagory=$this->input->post('category');

 
                echo $blogid.' '.$userid.' '.$title.' '.$content.' category='.$catagory;
             
                $this->load->library('session');
               $sessionUserId=$this->session->userdata('userid');

                //echo"userid: ".$userid." session userId : ".$sessionUserId;
                if($userid==$sessionUserId){
                 
                    $update=$this->homeModel->updateContent($blogid,$title,$content,$catagory);
 
                    if($update){
                        //echo $userid."is_updating".$blogid;
                        //echo "catagory:id=".$catagory."content =".$content;
                       redirect('userProfile');
                    }
                    else{
                        echo "can't Update";
                    }
                }   
                else{
                    echo"no-data-found".$sessionUserId." ".$userid;
                }
            } 
            else{
                echo "cannot_run";
            }
        }


        public function saved(){
           $data = $this->session->userdata('userid');
            $userdata['userdata']=$this->userinfoModel->index($data);
            $userdata['userSaveddata']=$this->userinfoModel->getContent($data,'saved');

            $this->load->view('header');
       
            $this->load->view('userProfile',$userdata);
        }
                 

    



}     
     
?>