<?php

class Categories extends CI_Controller
{
    public function by_category($id)
    {
        $data['posts'] = $this->post_model->get_posts_by_category($id);
        $data['title'] = ucFirst($data['posts'][0]['name']);

        $this->load->view("layout/header", ['title' => $data['title']]);
        $this->load->view("posts/index", $data);
        $this->load->view("layout/footer");
    }
    public function submit()
    {
        // Check login
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }
        $this->form_validation->set_rules('name', 'Category Name', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->load->view("layout/header", ['title' => 'New Category']);
            $this->load->view("categories/submit");
            $this->load->view("layout/footer");
        } else {
            // submit Category
            $this->category_model->submit_category();
            $this->session->set_flashdata('category_created', 'The category has been created');

            redirect('posts');
        }
    }
}
