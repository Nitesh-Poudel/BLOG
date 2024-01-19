<?php
class relation extends CI_Controller{
   
    public function follow(){
       
        $to=$this->input->post('followTo');
        $by=$this->session->userdata('userid');


        $this->load->model('relationModel');
        $follow=$this->relationModel->FollowOrBlock('Follow',$by,$to);

        $this->load->model('notificationModel');
        if($follow=="follow"){
            $this->notificationModel->addNotification($by,$to,"Starts Following you","");
        }
        if($follow=="unfollow"){
            //$this->notificationModel->delNotification($by,'');
        }
       
        redirect(base_url('index.php/userProfile?userid='.$to));
        
    }



    public function block(){
        $to=$this->input->post('blockTo');
        $by=$this->session->userdata('userid');

        $this->load->model('relationModel');
        $peoples=$this->relationModel->showname($by,$to);
        echo$FollowOrBlock=$this->relationModel->FollowOrBlock('Block',$by,$to);
       
        echo $peoples[1]->fname." block ".  $peoples[0]->fname ;
        
    
       
    }

}
?>