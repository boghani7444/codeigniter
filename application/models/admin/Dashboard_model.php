<?php
/**
 * ark Admin Panel for Codeigniter 
 * Author: Chirag A. Boghani
 * downloaded from http://devzone.co.in
 *
 */
class Dashboard_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    public function get_page($slug = FALSE)
    {
        $site_info = $this->db->get_where('site_info', array('page_link' => $slug));
        return $site_info->row_array();
    }
    
    public function get_categories()
    {
        $this->db->order_by("sequence", "asc");
        $query = $this->db->get_where('categories', array('status' => '1','parent_id'=>'0'));
        $return = array();
        foreach ($query->result() as $category)
        {
            $return[$category->id] = $category;
            $return[$category->id]->subs = $this->get_sub_categories($category->id); // Get the categories sub categories
        }

        return $return;
    }


    public function get_sub_categories($category_id)
    {
        $this->db->where('parent_id', $category_id);
        $query = $this->db->get('categories');
        return $query->result();
    }
    public function get_all_page()
    {
        $query = $this->db->get('site_info');
        return $query->result_array();
    }
    
    public function get_slider()
    {
        $this->db->order_by("d_order", "asc");
        $query = $this->db->get_where('gallery', array('status' => 'Y','gallery_type'=>'home_silder'));
        return $query->result_array();
    }
    public function get_portfolio()
    {
        $this->db->order_by("d_order", "asc");
        $query = $this->db->get_where('gallery', array('status' => 'Y','gallery_type'=>'portfolio'));
        return $query->result_array();
    }
}