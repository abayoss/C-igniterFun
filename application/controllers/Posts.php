<?php

class Posts extends CI_Controller
{
    public function index($offset = 0)
    {
        $this->load->library('pagination');
        // Pagination Config	
        $config['base_url'] = base_url() . 'posts/index/';
        $config['total_rows'] = $this->db->count_all('posts');
        $config['per_page'] = 3;
        $config['uri_segment'] = 3;
        $config['attributes'] = array('class' => 'pagination-link');
        // Init Pagination
        $this->pagination->initialize($config);

        $title = ucFirst("Latest posts");
        $data['title'] = ucFirst($title);
        $data['posts'] = $this->post_model->get_posts(FALSE, $config['per_page'], $offset);
        $data['pagination'] = true;

        $this->load->view("layout/header", ['title' => $title]);
        $this->load->view("posts/index", $data);
        $this->load->view("layout/footer");
    }
    public function submit()
    {
        // Check login
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }
        $data['title'] = ucFirst("submit a post");
        $data['categories'] = $this->category_model->get_categories();
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('body', 'Body', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->load->view("layout/header", ['title' => $data['title']]);
            $this->load->view("posts/submit", $data);
            $this->load->view("layout/footer");
        } else {
            // Upload Image
            $config['upload_path'] = './assets/images/posts';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048';
            $config['max_width'] = '2000';
            $config['max_height'] = '2000';
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload()) {
                $errors = array('error' => $this->upload->display_errors());
                $post_image = 'no_image.webp';
            } else {
                $data = array('upload_data' => $this->upload->data());
                $post_image = $_FILES['userfile']['name'];
            }
            // submit post
            $this->post_model->submit_post($post_image);
            $this->session->set_flashdata('post_created', 'Your post has been created');
            redirect('posts');
        }
    }
    public function viewOne($id = NULL)
    {
        $data['post'] = $this->post_model->get_posts($id);
        $data['comments'] = $this->comment_model->get_post_comments($id);
        if (empty($data['post'])) {
            show_404();
        }
        $this->load->view("layout/header", ['title' => ucFirst($data['post']['title'])]);
        $this->load->view("posts/one", $data);
        $this->load->view("layout/footer");
    }
    public function edit($id = NULL)
    {
        // Check login
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }
        $data['post'] = $this->post_model->get_posts($id);
        if ($this->session->userdata('user_id') != $this->post_model->get_posts($id)['post_user_id']) {
            redirect('posts');
        }
        $data['categories'] = $this->category_model->get_categories();

        if (empty($data['post'])) {
            show_404();
        }
        $this->load->view("layout/header", ['title' => ucFirst('update post')]);
        $this->load->view("posts/edit", $data);
        $this->load->view("layout/footer");
    }
    public function update($id)
    {
        $data['post'] = $this->post_model->get_posts($id);
        $data['categories'] = $this->category_model->get_categories();
        if (empty($data['post'])) {
            show_404();
        }

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('body', 'Body', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view("layout/header", ['title' => ucFirst('update post')]);
            $this->load->view("posts/edit", $data);
            $this->load->view("layout/footer");
        } else {
            // Upload Image
            $config['upload_path'] = './assets/images/posts';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048';
            $config['max_width'] = '2000';
            $config['max_height'] = '2000';
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload()) {
                $errors = array('error' => $this->upload->display_errors());
                var_dump($errors);
            } else {
                $data = array('upload_data' => $this->upload->data());
                $post_image = $_FILES['userfile']['name'];
            }
            $this->post_model->update_post($id, $post_image);
            $this->session->set_flashdata('post_updated', 'Your post has been updated');
            redirect('posts');
        }
    }
    public function delete($id)
    {
        if ($this->session->userdata('user_id') != $this->post_model->get_posts($id)['post_user_id']) {
            redirect('posts');
        }

        $this->post_model->delete($id);
        $this->session->set_flashdata('post_deleted', 'Your post has been deleted');

        redirect('posts');
    }
}
