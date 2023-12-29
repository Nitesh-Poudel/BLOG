<?php
    class adminPannel extends CI_controller{
      
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


                $config=[
                    'upload_path'
                ]
                $this->load->library('upload',$config);

              
               
            }
          
        


        public function validate(){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('newCatagory','Catagory','required|trim|is_unique[catagory.catagory]');
            if($this->form_validation->run()){
                $catagory=ucwords($this->input->post('newCatagory'));
                
                $this->load->model('adminModel');
                $insert=$this->adminModel->addCatagory($catagory);
                if($insert){
                    echo"Insertion sucessful";
                }
            }
            else{
                $this->load->view('adminPannel');
            }
        }

        public function addCatagory(){

            $this->load->view('adminPannel.php');
        }

      
    }
?>