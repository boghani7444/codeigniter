<?php
/**
 * ark Admin Panel for Codeigniter 
 * Author: Chirag A. Boghani
 * downloaded from http://devzone.co.in
 *
 */
class Site_infomodel extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    public function get_site_info()
    {
        $this->db->order_by("sequence", "asc");
        $query = $this->db->get_where('site_info');
        return $query->result();
    }
     public function get_site_info_by_id($id){
        $query = $this->db->get_where('site_info', array('id'=>$id));
        return $query->row_array();
    }
    public function get_site_info_save($data){
        $id = $data['id'];
        if($data['status']==''){
            $data['status'] = '0';
        }
        if($data['sequence']==''){
             $data['sequence'] = $this->db->count_all('site_info');
        }
        if($id){
            $this->db->where('id', $id);
            $result = $this->db->update('site_info', array('title' => $data['title'],'page_link' => $data['page_link'],'page_title' => $data['page_title'],'sort_keyword' => $data['sort_keyword'],'meta_title' => $data['meta_title'],'meta_keyword' => $data['meta_keyword'],'meta_description' => $data['meta_description'],'sort_description' => $data['sort_description'],'description' => $data['description'],'sequence' => $data['sequence'],'status' => $data['status'],'datetime'=>date('y-m-d H:m:s')));
            $messge = array('message' => 'Menu & Page Text Edit SuccessFull','message_type' => 'success');
            $this->session->set_flashdata('item', $messge);
        }else{
            $result = $this->db->insert('site_info', array('title' => $data['title'],'page_link' => $data['page_link'],'page_title' => $data['page_title'],'sort_keyword' => $data['sort_keyword'],'meta_title' => $data['meta_title'],'meta_keyword' => $data['meta_keyword'],'meta_description' => $data['meta_description'],'sort_description' => $data['sort_description'],'description' => $data['description'],'sequence' => $data['sequence'],'status' => $data['status'],'datetime'=>date('y-m-d H:m:s')));
            $messge = array('message' => 'Menu & Page Text Add SuccessFull','message_type' => 'success');
            $this->session->set_flashdata('item', $messge);
        }
        if($result){
            return true;
        }else{
            return false;
        }
    }
}