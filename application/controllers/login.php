<?php
class login extends CI_controller{
   
    public function index(){

        $this->load->library('session');
        $user = $this->session->userdata('userid');
        
        if($user){
            $this->load->view('home');
           
            exit;
        }

        else{
            $this->load->helper('form');
            $this->load->view('login');

          

        }
     
        
    }

    public function Login_validation(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email','Email','required|valid_email');
        $this->form_validation->set_rules('password','Password','required|min_length[8]');

        if($this->form_validation->run()){
            $msg='';
            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));

            if($email=='ntd@gmail.com'&&$password==md5('adminadmin')){
                //
                $this->load->library('session');//loaded_session_library_file
                $this->session->set_userdata('userid', 'admin');
                redirect('adminPannel/admin');
                //$this->load->view('uploadBlog');
            }

            $this->load->model('loginModel'); // Correct model loading
            $user=$this->loginModel->LoginValidate($email, $password);
            if($user){

                //session_creatipn
                $this->load->library('session');//loaded_session_library_file
                $this->session->set_userdata('userid', $user);

			
                redirect('home');
            }
            else {
                $this->load->library('session');
               
                $data['loginFail'] = $this->session->flashdata('loginFail'); // Get flashdata
                $this->load->view('login', $data); 
             }

        } 
        else {
            $this->load->view('login');
        }
    }
    public function logout(){
        $this->load->library('session');
        $this->session->unset_userdata('userid');
        redirect('login');
        exit();
        //echo'logout';
    }
}
?>
