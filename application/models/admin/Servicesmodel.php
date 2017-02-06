<?php
/**
 * ark Admin Panel for Codeigniter 
 * Author: Chirag A. Boghani
 * downloaded from http://devzone.co.in
 *
 */
class Servicesmodel extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    public function get_services()
    {
        $this->db->order_by("d_order", "asc");
        $query = $this->db->get_where('services');
        return $query->result();
    }
     public function get_services_by_id($id){
        $query = $this->db->get_where('services', array('id'=>$id));
        return $query->row_array();
    }
    public function get_services_save($data){
        $id = $data['id'];
        if($data['status']==''){
            $data['status'] = '0';
        }
        if($data['d_order']==''){
             $data['d_order'] = $this->db->count_all('services');
        }
        if($id){
            $this->db->where('id', $id);
            $result = $this->db->update('services', array('service_name' => $data['service_name'],'service_link' => $data['service_link'],'page_title' => $data['page_title'],'sort_keyword' => $data['sort_keyword'],'service_icon' => $data['service_icon'],'service_image' => $data['service_image'],'meta_title' => $data['meta_title'],'meta_keyword' => $data['meta_keyword'],'meta_description' => $data['meta_description'],'description' => $data['description'],'d_order' => $data['d_order'],'status' => $data['status'],'updated_at'=>date('y-m-d')));
            $messge = array('message' => 'Service Edit SuccessFull','message_type' => 'success');
            $this->session->set_flashdata('item', $messge);
        }else{
            $result = $this->db->insert('services', array('service_name' => $data['service_name'],'service_link' => $data['service_link'],'page_title' => $data['page_title'],'sort_keyword' => $data['sort_keyword'],'service_icon' => $data['service_icon'],'service_image' => $data['service_image'],'meta_title' => $data['meta_title'],'meta_keyword' => $data['meta_keyword'],'meta_description' => $data['meta_description'],'description' => $data['description'],'d_order' => $data['d_order'],'status' => $data['status'],'created_at'=>date('y-m-d')));
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