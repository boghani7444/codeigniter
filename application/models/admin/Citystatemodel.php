<?php
/**
 * ark Admin Panel for Codeigniter 
 * Author: Chirag A. Boghani
 * downloaded from http://devzone.co.in
 *
 */
class Citystatemodel extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    public function get_city($id)
    {
        $this->db->order_by("city", "asc");
        $query = $this->db->get_where('city', array('stateid'=>$id));
        return $query->result();
    }
    public function get_state()
    {
        $this->db->order_by("statename", "asc");
        $query = $this->db->get_where('state');
        return $query->result();
    }    
}