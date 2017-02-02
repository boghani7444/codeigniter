<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Gallery extends CI_Controller {
/**
 * ark Admin Panel for Codeigniter 
 * Author: Chirag A. Boghani
 * downloaded from http://devzone.co.in
 *
 */
    public function __construct() {
        parent::__construct();
        $this->load->model('admin/gallerymodel');
        if (!$this->session->userdata('is_admin_login')) {
            redirect('admin/home');
        }
    }

    public function index() {
        $data['page'] = 'gallery';
        $data['gallery_logo'] = $this->gallerymodel->get_gallery('logo');
        $data['gallery_home_slider'] = $this->gallerymodel->get_gallery('home-slider');
        $data['gallery_portfolio'] = $this->gallerymodel->get_gallery('portfolio');
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/leftside', $data);
        $this->load->view('admin/gallery', $data);
        $this->load->view('admin/templates/footer', $data);
    }

    public function add_gallery() {
        $data['page'] = 'add_gal';
        
        $data['id'] = '';
        $data['gallery'] = '';
        
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/leftside', $data);
        $this->load->view('admin/add_gallery', $data);
        $this->load->view('admin/templates/footer', $data);
    }

     public function edit_gallery($id) {
        $data['page'] = 'edit_gal';
        $data['id'] = $id;
        $data['gallery'] = $this->gallerymodel->get_gallery_by_id($id);
        
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/leftside', $data);
        $this->load->view('admin/edit_gallery', $data);
        $this->load->view('admin/templates/footer', $data);
    }
    
    public function update_gallery() 
    {
        $data['id'] = $this->input->post('id');
        $data['gallery_type'] = $this->input->post('gallery_type');
        $data['title'] = $this->input->post('title');
        $data['alt_tag'] = $this->input->post('alt_tag');
        $data['title_tag'] = $this->input->post('title_tag');
        $data['sequence'] = $this->input->post('sequence');
        $data['status'] = $this->input->post('status');
        
        if($this->input->post('id')){ 
            $old_data = $this->gallerymodel->get_gallery_by_id($this->input->post('id'));
        }
        
        $config =  array(
            'upload_path'     => "./upload/".$data['gallery_type'].'/',
            'allowed_types'   => "jpg|png|jpeg",
            'max_size'        => "2048000",  // Can be set to particular file size
            'max_height'      => "",
            'max_width'       => "",
            'file_name'       => time().'-'.$this->input->post('gallery_type'),
            'overwrite'       => TRUE,
            'remove_spaces'   => TRUE
         ); 
        $this->load->library('upload', $config);
        //$this->upload->initialize($config);
        
        if($this->upload->do_upload('image'))
        {
            $upload_data = $this->upload->data();
            if($upload_data['file_name'] != '' && $this->input->post('old_image')!=''){ 
                unlink("./upload/".$data['gallery_type'].'/'.$this->input->post('old_image'));
            }
            $data['images'] = $upload_data['file_name'];
        }else{
            $data['images'] = $this->input->post('old_image');
        }
        
        
        $result = $this->gallerymodel->get_gallery_save($data);
        if($result){
            redirect('admin/gallery');
        }else{
            $messge = array('message' => 'Gallery Image Add/Edit Something Wrong','message_type' => 'error');
            $this->session->set_flashdata('item', $messge);
            if($this->input->post('id')){
                $id= $this->input->post('id');
                redirect('admin/gallery/edit_gallery/'.$id);
            }else{
                redirect('admin/gallery/add_gallery');
            }
        }
    }
    
    public function delete_gallery($id) {
        // Code goes here
        $old_data = $this->gallerymodel->get_gallery_by_id($id);
        if($old_data['image']){
            unlink("./upload/".$old_data['gallery_type'].'/'.$old_data['image']);
        }
        $this->db->where('id', $id);
        if($this->db->delete('gallery')){
            $messge = array('message' => 'Gallery Image Delete Successful','message_type' => 'error');
            $this->session->set_flashdata('item', $messge);
            redirect('admin/gallery');
        }else{
            $messge = array('message' => 'Gallery Image Delete Something Wrong','message_type' => 'error');
            $this->session->set_flashdata('item', $messge);
            redirect('admin/gallery');
        } 
    }
    public function status_gallery($id) {
        // Code goes here
        $provide = $this->gallerymodel->get_gallery_by_id($id);
        
        $status = $provide['status'];
        if($status =='Y'){
            $messge = array('message' => 'Gallery Inactive Successful','message_type' => 'error');
            $this->session->set_flashdata('item', $messge);
            $up_status = 'N';
        }else{
            $messge = array('message' => 'Gallery Active Successful','message_type' => 'success');
            $this->session->set_flashdata('item', $messge);
            $up_status = 'Y';
        }
        
        $this->db->where('id', $id);
        if($this->db->update('gallery', array('status' => $up_status))){
            redirect('admin/gallery');
        }else{
            redirect('admin/gallery');
        } 
    }
    

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */