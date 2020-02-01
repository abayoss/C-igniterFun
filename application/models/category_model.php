<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Category_model extends CI_Model
{
    public function get_categories()
    {
        $this->db->order_by('name');
        $query = $this->db->get('categories');
        return $query->result_array();
    }
    public function submit_category()
    {
        $data = array(
            'name' => $this->input->post('name'),
        );
        return $this->db->insert('categories', $data);
    }
}
