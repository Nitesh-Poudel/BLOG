<?php
    class Upload extends CI_controller{
        public function index(){
           $this->load->model('homeModel');
            $categoriesData = $this->homeModel->getcatagoryForUpload(); 

            if ($categoriesData) {
                $data['categories'] = $categoriesData;

                $this->load->helper('form');
                $this->load->view('uploadBlog', $data);
                foreach ($categoriesData as $category) {
                     //echo "opton1"." ".$category->catagory."<br>"; // Output each category's name
                     
                }
            }
        }



            public function upload(){
              
                $this->load->library('form_validation');
                $this->form_validation->set_rules('title','Title','required|trim',);
                $this->form_validation->set_rules('content','Content','required');
                $this->form_validation->set_rules('catagory','catagory','required');
    
    
                if($this->form_validation->run()){
                    $title=$this->input->post('title');
                    $content=$this->input->post('content');
                       
                    
                        $this->load->helper('paragraph');
                        $cleanedContent=clean_paragraph($content);
    
                    $category=$this->input->post('catagory');
                    //echo$title.' '.$content;
    
                    $this->load->model('HomeModel'); // Loads the HomeModel
                    $this->load->library('session');
                    if($a=$this->HomeModel->uploadBlog($title,$cleanedContent,$category)){
                        redirect('home');
                    } 
    
                }
                else{
                    $this->load->view('uploadBlog');
                   // redirect('home');
                }
          
               // echo"hello_hiii_tata_bye";
            }
    
    
        }
    

?>