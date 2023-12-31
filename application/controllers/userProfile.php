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
            $this->load->library('session');
            $sessionUserId=$this->session->userdata('userid');

            //echo"userid: ".$userid." session userId : ".$sessionUserId;
            if($userid==$sessionUserId){
                //echo"can_edit";
                $this->load->model('homeModel');
                $delete=$this->homeModel->deleteContent($blogid);

                
                echo$delete;
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
                    $this->load->model('homeModel');
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
                 

    }


      
     
?>