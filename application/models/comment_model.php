<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Comment_model extends CI_Model
{
    public function get_post_comments($id)
    {
        $query = $this->db->get_where('comments', array('comments.post_id' => $id));
        return $query->result_array();
    }
    public function submit($id)
    {
        $data = array(
            'post_id' => $id,
            'name' => $this->input->post('name'),
            'body' => $this->input->post('body'),
        );
        return $this->db->insert('comments', $data);
    }
}
