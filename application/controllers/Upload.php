<?php
    class Upload extends CI_controller{
        public function index(){
           $this->load->model('homeModel');
            $categoriesData = $this->homeModel->getCatagory(); 

            if ($categoriesData) {
                $data['categories'] = $categoriesData;

                $this->load->view('uploadBlog', $data);
                foreach ($categoriesData as $category) {
                     //echo "opton1"." ".$category->catagory."<br>"; // Output each category's name
                     
                }
            }
        }
    }

?>