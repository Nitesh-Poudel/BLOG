<?php
class reaction extends CI_controller{


        public function index(){
           
        }

        public function like(){
            $this->load->library('session');
            $userId= $this->session->userdata('userid');
            $blog=$this->input->post('blogid');
            $author=$this->input->post('author');


            if($userId){

                $this->load->model('reactionModel');
                $likes=$this->reactionModel->Checklike($blog,$userId);

                if($likes<1){
                    $this->load->model('reactionModel');
                    $like=$this->reactionModel->like($blog,$userId);
                    if($like){
                        $notify=$this->notify($userId,$author,"likes on",$blog);
                        if($notify){
                            redirect(base_url('index.php/home/maincontent?blogid=' . $blog));
                        }
                    }
                }
                else{
                    $this->load->model('reactionModel');
                    $unlike=$this->reactionModel->unlike($blog,$userId);
                    if($unlike){

                       $notify=$this->notify($userId,$author,"likes on",$blog,"delnotification");
                        if($notify){
                            redirect(base_url('index.php/home/maincontent?blogid=' . $blog));
                        }
                    }
                }
            }
            else{
                redirect('login');
            }
           
        }

    


        public function comment(){
            $this->load->library('session');
            $userId= $this->session->userdata('userid');
            $blog=$this->input->post('blogid');
            $author=$this->input->post('author');
          echo"tHIS_IS_USER_VARIABLE".$user=$this->input->post('user')."<br>";
            
            if(1==1){
              $this->load->library('form_validation') ;
              $this->form_validation->set_rules('comment','Comment','required|alpha_numeric_spaces');
              if($this->form_validation->run()){
                $comment=$this->input->post('comment');
               
                
                if($comment!=''&&$blog!=''&&$user!=''){
                    echo "IT_IS_SAme_user=".$user."<br>Blog=".$blog."<br>comment=".$comment;
                
                    $this->load->model('reactionModel');
                    $cmt=$this->reactionModel->comment($blog,$this->input->post('user'),$comment);

                    if($cmt){
                        $notify=$this->notify($userId,$author,"Comment on",$blog);
                        if($notify){
                            redirect(base_url('index.php/home/maincontent?blogid=' . $blog));
                       }                      
                    }
                
                }
            

              }
              else{
                echo"can't_validate";
              }

              
           
            }
            else{
                //$this->load->view('login');
                redirect('home');
            }
        }


        public function notify($notificationBy,$notificationTo,$notification,$notificationOn,$topass='addnotification'){
            $By=$notificationBy;
            $To=$notificationTo;
            $notification=$notification;
            $On=$notificationOn;

            $topass=$topass;

            $this->load->model('notificationModel');
               
            if($topass=="addnotification"){
                     $notify=$this->notificationModel->addnotification($By,$To,$notification,$On);
            }

            else{
                $notify=$this->notificationModel->delNotification($By,$On);
           

            }

          
          
           return $notify;
        }

 
    

}
?>