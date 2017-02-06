<?php
/**
 * ark Admin Panel for Codeigniter 
 * Author: Chirag A. Boghani
 * downloaded from http://devzone.co.in
 *
 */
class CommonModel extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    
    public function get_site_details()
    {
        $query = $this->db->get('users');
        return $query->result_array();
    }
    
    public function get_page($slug = FALSE)
    {
        $site_info = $this->db->get_where('site_info', array('page_link' => $slug));
        return $site_info->row_array();
    }
    public function get_all_page()
    {
        $this->db->order_by("sequence", "asc");
        $query = $this->db->get_where('site_info', array('status' => 'Y'));
        return $query->result_array();
    }
    public function get_logo()
    {
        $query = $this->db->get_where('gallery', array('status' => 'Y','gallery_type'=>'logo'));
        return $query->result_array();
    }
    public function get_services()
    {
        $this->db->order_by("d_order", "asc");
        $query = $this->db->get_where('services', array('status' => '1'));
        return $query->result_array();
    }
}