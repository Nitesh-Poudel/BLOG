<?php
    class notification extends CI_Controller{
        public function index(){
            echo"hello";
            $userId = $this->input->post('id');
            $this->load->model('notificationModel');
           $updateSeen=$this->notificationModel->updateNotification('userid');
            
        }
    }
?>