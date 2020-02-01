<?php
class Pages extends CI_Controller {
    public function view($page = "home") {
        if(!file_exists(APPPATH."views/pages/".$page.".php")){
            show_404();
        }
        $title= ucFirst($page);
        $data['title']= ucFirst($page);
        $this->load->view("layout/header", ['title' => $title]);
        $this->load->view("pages/".$page, $data);
        $this->load->view("layout/footer");
    }
}