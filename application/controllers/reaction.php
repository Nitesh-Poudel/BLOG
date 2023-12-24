<?php
class reaction extends CI_controller{


        //public function index(){}

        public function like(){
            $this->load->library('session');
            $userId= $this->session->userdata('userid');
            $blog=$this->input->post('blogid');

            if($userId){

                $this->load->model('reactionModel');
                $likes=$this->reactionModel->Checklike($blog,$userId);

                if($likes<1){
                    $this->load->model('reactionModel');
                    $like=$this->reactionModel->like($blog,$userId);
                    if($like){
                        redirect(base_url('index.php/home/maincontent?blogid=' . $blog));

                    }
                }
                else{
                    $this->load->model('reactionModel');
                    $unlike=$this->reactionModel->unlike($blog,$userId);
                    if($unlike){
                        redirect(base_url('index.php/home/maincontent?blogid=' . $blog));

                    }
                }
            }
            else{
                redirect('login');
            }
           
        }


        public function comment(){
            $this->load->library('session');
            $blog=$this->input->post('blogid');
            $comment=$this->input->post('comment');
            $userId= $this->session->userdata('userid');
            if($userId){
               
                
            }
            else{
                $this->load->view('login');
            }
        }

}
?>