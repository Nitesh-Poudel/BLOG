<?php
    class userProfile extends CI_controller{
        public function index(){
            $data = $this->session->userdata('userid');
          
            $this->load->model('userinfoModel');

            $userdata['userdata']=$this->userinfoModel->index($data);
           
            $userdata['userUplodeddata']=$this->userinfoModel->uploadedcontent($data);
         
            //print_r($userdata);
            $this->load->view('userProfile',$userdata);
        }



        public function edit(){
            //echo"lets_edit";
           $userid= $this->input->post('uid');
           $blogid= $this->input->post('blogid');

          // echo$blogid;exit();
            $this->load->library('session');
            $sessionUserId=$this->session->userdata('userid');

            //echo"userid: ".$userid." session userId : ".$sessionUserId;
            if($userid==$sessionUserId){
                //echo"can_edit";
                $this->load->model('homeModel');
                $data['editable']=$this->homeModel->mainContent($blogid);
                $data['categories']= $this->homeModel->getcatagoryForUpload(); 
                //print_r($editable);

                $this->load->view('uploadBlog',$data);

            }

        }

        public function delete(){
            echo"lets_delete";
        }


      
    }  
?>