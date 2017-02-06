<?php
/**
 * ark Admin Panel for Codeigniter 
 * Author: Chirag A. Boghani
 * downloaded from http://devzone.co.in
 *
 */
class Skillsmodel extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    public function get_skills()
    {
        $this->db->order_by("d_order", "asc");
        $query = $this->db->get_where('skills');
        return $query->result();
    }
     public function get_skills_by_id($id){
        $query = $this->db->get_where('skills', array('id'=>$id));
        return $query->row_array();
    }
    public function get_skills_save($data){
        $id = $data['id'];
        if($data['status']==''){
            $data['status'] = 'N';
        }
        if($data['d_order']==''){
             $data['d_order'] = $this->db->count_all('skills');
        }
        if($id){
            $this->db->where('id', $id);
            $result = $this->db->update('skills', array('title' => $data['title'],'image' => $data['image'],'description' => $data['description'],'d_order' => $data['d_order'],'status' => $data['status'],'updated_at'=>date('y-m-d')));
            $messge = array('message' => 'Service Edit SuccessFull','message_type' => 'success');
            $this->session->set_flashdata('item', $messge);
        }else{
            $result = $this->db->insert('skills', array('title' => $data['title'],'image' => $data['image'],'description' => $data['description'],'d_order' => $data['d_order'],'status' => $data['status'],'created_at'=>date('y-m-d')));
            $messge = array('message' => 'Service Add SuccessFull','message_type' => 'success');
            $this->session->set_flashdata('item', $messge);
        }
        if($result){
            return true;
        }else{
            return false;
        }
    }
}