<?php
/**
 * ark Admin Panel for Codeigniter 
 * Author: Chirag A. Boghani
 * downloaded from http://devzone.co.in
 *
 */
class Inquirymodel extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    public function get_homeinquiry()
    {
        $this->db->order_by("id", "desc");
        $this->db->limit(10);
        $query = $this->db->get_where('inquiry');
        return $query->result();
    }
    public function get_inquiry()
    {
        $this->db->order_by("id", "desc");
        $query = $this->db->get_where('inquiry');
        return $query->result();
    }
    public function get_inquiry_by_id($id){
        $query = $this->db->get_where('inquiry', array('id'=>$id));
        return $query->row_array();
    }
    
    public function get_new_inquiry($date){
        $this->db->where('created_at > ', $date);      
        $query = $this->db->get('inquiry');
        return $query->num_rows();
    }
    
}