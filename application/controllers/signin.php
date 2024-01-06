<?php
    class signin extends CI_controller{

        public function index(){
            

            $this->load->view('signin');
        }

        public function registration_validation(){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('email','Email','required|valid_email|is_unique[users.email]');
            $this->form_validation->set_rules('password','Password','required|min_length[8]');
            $this->form_validation->set_rules('fname','First Name','required|trim|alpha');
            $this->form_validation->set_rules('lname','Last Name','required|trim|alpha');
            $this->form_validation->set_rules('gender','Gender','required');
            
            $this->form_validation->set_rules('password','Password','required|min_length[8]');
            $this->form_validation->set_rules('cpassword','Conform Password','required|min_length[8]');
            
    
            if($this->form_validation->run()){
                $fname=ucwords($this->input->post('fname'));
                $lname=ucwords($this->input->post('lname'));
                $email=$this->input->post('email');
                $password=md5($this->input->post('password'));
                $cpassword=md5($this->input->post('cpassword'));
                $gender=$this->input->post('gender');
    
                //echo $fname.'-'.$lname.'-'.$mail.'-'.$password.'-'.$gender.'-'.$cpassword;
    
                if($cpassword==$password){
                    //echo $fname.'-'.$lname.'-'.$mail.'-'.$password.'-'.$gender.'-'.$cpassword;
                    $this->load->model('registrationModel');
                    if($this->registrationModel->register($fname,$lname,$email,$gender,$password)){
                        //$this->load->view('login');
                        redirect('login');
                    }
                    
                    else{
                        echo"value_passwd_failed";
                    }
                }
    
                else{
                    echo "password_not_matched";
                }
            }	
            else{
                //load_login_page_and_show_message_there
                $this->load->view('signin');
                
            }
    
        }

    }
?>