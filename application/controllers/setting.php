<?php
    class setting extends CI_Controller{
        public function changePassword(){
           
            $this->load->view('changePassword');
        }

        public function validateChangePassword(){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('oldPassword', 'Old Password', 'required');
            $this->form_validation->set_rules('newPassword', 'New Password', 'required');
            $this->form_validation->set_rules('confirmPassword', 'Confirm Password', 'required|matches[newPassword]');

            if($this->form_validation->run()){
               
                $oldpassword = md5($this->input->post('oldPassword'));
                $newPassword = md5($this->input->post('newPassword'));
                $confirmPassword = md5($this->input->post('confirmPassword'));

                if($this->session->userdata('userid')){
                    $userid=$this->session->userdata('userid');

                    $this->load->model('changeInfoModel');
                    $update=$this->changeInfoModel->updatePassword($oldpassword,$newPassword,$userid);
                    if($update){
                        echo '<script>alert("Password updated successfully!");</script>';
                        $this->load->view('login');
       
                    }

                }
                else{
                    redirect('setting');
                }

            }
            else{
                $this->load->view('changePassword');
               
            }
            
        }
    }
?>