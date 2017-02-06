<?php
/**
 * ark Admin Panel for Codeigniter 
 * Author: Chirag A. Boghani
 * downloaded from http://devzone.co.in
 *
 */
class Gallerymodel extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    public function get_gallery($type='portfolio')
    {
        $this->db->order_by("d_order", "asc");
        $query = $this->db->get_where('gallery',array('gallery_type'=>$type));
        return $query->result();
    }
    public function get_gallery_by_id($id){
        $query = $this->db->get_where('gallery', array('id'=>$id));
        return $query->row_array();
    }
    public function get_gallery_save($data){
        $id = $data['id'];
        if($data['status']==''){
            $data['status'] = '0';
        }
        if($data['sequence']==''){
             $data['sequence'] = $this->db->count_all('gallery');
        }
        if($id){
            $this->db->where('id', $id);
            $result = $this->db->update('gallery', array('gallery_type' => $data['gallery_type'],'title' => $data['title'],'image' => $data['images'],'title_tag' => $data['title_tag'],'alt_tag' => $data['alt_tag'],'limage' => $data['images'],'ltitle_tag' => $data['title_tag'],'lalt_tag' => $data['alt_tag'],'status' => $data['status'],'d_order' => $data['sequence'],'updated_at'=>date('y-m-d H:m:s')));
            $messge = array('message' => 'Gallery Image Edit SuccessFull','message_type' => 'success');
            $this->session->set_flashdata('item', $messge);
        }else{
            
            $result = $this->db->insert('gallery', array('gallery_type' => $data['gallery_type'],'title' => $data['title'],'image' => $data['images'],'title_tag' => $data['title_tag'],'alt_tag' => $data['alt_tag'],'limage' => $data['images'],'ltitle_tag' => $data['title_tag'],'lalt_tag' => $data['alt_tag'],'status' => $data['status'],'d_order' => $data['sequence'],'created_at'=>date('y-m-d H:m:s')));
            $messge = array('message' => 'Gallery Image Add SuccessFull','message_type' => 'success');
            $this->session->set_flashdata('item', $messge);
        }
        if($result){
            return true;
        }else{
            return false;
        }
    }
}