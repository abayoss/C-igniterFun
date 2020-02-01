<?php

class Comments extends CI_Controller
{
    public function submit($id)
    {
        $this->form_validation->set_rules('name', 'Category Name', 'required');
        $this->form_validation->set_rules('body', 'Comment', 'required');
        if ($this->form_validation->run() === FALSE) {
            redirect('posts/'.$id);
        } else {
            $this->comment_model->submit($id);
            redirect('posts/'.$id);
        }
    }
}
