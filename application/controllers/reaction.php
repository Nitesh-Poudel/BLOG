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
            $userId= $this->session->userdata('userid');
            
            if($userId){
              $this->load->library('form_validation') ;
              $this->form_validation->set_rules('comment','Comment','required|alpha_numeric_spaces');
              if($this->form_validation->run()){
                $comment=$this->input->post('comment');
                $this->load->model('reactionModel');
                $cmt=$this->reactionModel('comment');

                
              }

              
           
            }
            else{
                $this->load->view('login');
            }
        }

}
?>