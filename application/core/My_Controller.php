<?php
// application/core/MY_Controller.php
class MY_Controller extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->loadNotifications();
        $this->showNotification();
    }

    private function loadNotifications() {
        $this->load->library('session');
        $userId = $this->session->userdata('userid');

        $this->load->model('notificationModel');
        $data['numNotification'] = $this->notificationModel->countNotification($userId);
        $this->load->vars($data);
    }

    private function showNotification(){
        $this->load->library('session');
            $userId= $this->session->userdata('userid');
            $this->load->model('notificationModel');
            $data['notifications']=$this->notificationModel->showNotification(1);
            $this->load->vars($data);
            //$this->load->view('uploadBlog');

    }

}
?>