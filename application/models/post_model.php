<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Post_model extends CI_Model
{
    public function get_posts($id = FALSE, $limit = FALSE, $offset = FALSE)
    {
        if($limit){
            $this->db->limit($limit, $offset);
        }
        if ($id === FALSE) {
            $this->db->select('`posts`.*,`categories`.*,`posts`.id AS post_id,`categories`.id AS categories_id');
            $this->db->order_by('posts.id', 'DESC');
            $this->db->join('categories', 'categories.id = posts.category_id');
            $query = $this->db->get('posts');
            return $query->result_array();
        }
        $this->db->select('`posts`.*,`categories`.*,`posts`.id AS post_id,`categories`.id AS categories_id,`posts`.user_id AS post_user_id,');
        $this->db->join('categories', 'categories.id = posts.category_id');
        $query = $this->db->get_where('posts', array('posts.id' => $id));
        return $query->row_array();
    }
    public function submit_post($post_image)
    {
        $slug = url_title($this->input->post('title'), 'dash', TRUE);
        $data = array(
            'title' => $this->input->post('title'),
            'slug' => $slug,
            'body' => $this->input->post('body'),
            'category_id' => $this->input->post('category_id'),
            'post_image' => $post_image
        );
        return $this->db->insert('posts', $data);
    }
    public function update_post($id, $post_image)
    {
        $slug = url_title($this->input->post('title'), 'dash', TRUE);
        $data = array(
            'title' => $this->input->post('title'),
            'slug' => $slug,
            'body' => $this->input->post('body'),
            'category_id' => $this->input->post('category_id'),
        );
        if ($post_image) {
            $image_data = array(
                'post_image' => $post_image
            );
            $data['post_image'] = $image_data['post_image'];
        }
        $this->db->where('id', $id);
        $this->db->update('posts', $data);
    }
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('posts');
    }
    public function get_posts_by_category($id)
    {
        $this->db->select('`posts`.*,`categories`.*,`posts`.id AS post_id,`categories`.id AS categories_id');
        $this->db->order_by('posts.id', 'DESC');
        $this->db->join('categories', 'categories.id = posts.category_id');
        $query = $this->db->get_where('posts', array('posts.category_id' => $id));
        // $query = $this->db->get('posts');
        return $query->result_array();
    }
}
