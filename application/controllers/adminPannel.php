<?php
    class adminPannel extends CI_controller{

            public function index(){
                echo"this_is_admin";
            }
      
            public function admin(){

                $this->load->library('session');
                $user=$this->session->userdata('userid');
                if($user=='admin'){
                    $this->load->view('adminPannel');
                }
                else{
                   //$this->load->view('home');
                   redirect('home');
                }


               

              
               
            }
          
        


            public function validate(){
                $this->load->library('form_validation');
                $this->form_validation->set_rules('newCatagory', 'Catagory', 'required|trim');
            
                if ($this->form_validation->run()) {
                    $catagory = ucwords($this->input->post('newCatagory'));
            
                    $config['upload_path']   = './assect/images/catagoryImg/'; // Specify your folder path
                    $config['allowed_types'] = 'gif|jpg|jpeg|png'; // Specify allowed file types
                    $config['file_name']     = $catagory;
            
                    $this->load->library('upload', $config);
            
                    if (!$this->upload->do_upload('catagoryImg')) {
                        $data['upload_error'] = $this->upload->display_errors();
                        echo 'Unable to upload: ' . $data['upload_error'];
                    } else {
                        $upload_data = $this->upload->data();
                        $imgName = $catagory . $upload_data['file_ext']; // Include file extension in the database name
            
                        $this->load->model('adminModel');
                        $insert = $this->adminModel->addCatagory($catagory, $imgName);
                        if ($insert) {
                            echo "Insertion successful";
                        }
                    }
                } else {
                    $this->load->view('adminPannel');
                }
            }
            
            

        public function addCatagory(){

            $this->load->view('adminPannel.php');
        }

      
    }
?>