<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Services extends CI_Controller {
/**
 * ark Admin Panel for Codeigniter 
 * Author: Chirag A. Boghani
 * downloaded from http://devzone.co.in
 *
 */
    public function __construct() {
        parent::__construct();
        $this->load->model('admin/servicesmodel');
        if (!$this->session->userdata('is_admin_login')) {
            redirect('admin/home');
        }
    }

    public function index() {
        $data['page'] = 'services';
        
        $data['services'] = $this->servicesmodel->get_services();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/leftside', $data);
        $this->load->view('admin/services', $data);
        $this->load->view('admin/templates/footer', $data);
    }

    public function add_services() {
        $data['page'] = 'add_services';
        $data['id'] = '';
        $data['services'] = '';
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/leftside', $data);
        $this->load->view('admin/add_services', $data);
        $this->load->view('admin/templates/footer', $data);
    }

     public function edit_services($id) {
        $data['page'] = 'edit_services';
        $data['id'] = $id;
        $data['services'] = $this->servicesmodel->get_services_by_id($id);
        
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/leftside', $data);
        $this->load->view('admin/edit_services', $data);
        $this->load->view('admin/templates/footer', $data);
    }
    public function update_services() 
    {
        $data['id'] = $this->input->post('id');
        $data['service_name'] = $this->input->post('service_name');
        $data['service_link'] = $this->input->post('service_link');
        $data['page_title'] = $this->input->post('page_title');
        $data['sort_keyword'] = $this->input->post('sort_keyword');
        $data['meta_title'] = $this->input->post('meta_title');
        $data['meta_keyword'] = $this->input->post('meta_keyword');
        $data['meta_description'] = $this->input->post('meta_description');
        $data['description'] = $this->input->post('description');
        $data['d_order'] = $this->input->post('d_order');
        $data['status'] = $this->input->post('status');
        
        if($this->input->post('id')){ 
            $old_data = $this->servicesmodel->get_services_by_id($this->input->post('id'));
        }
        $this->load->library('upload');
       
        $imagename = time().'-service-icon';
        $this->upload->initialize(array(
            'upload_path'     => "./upload/services/icon",
            'allowed_types'   => "jpg|png|jpeg",
            'max_size'        => "2048000",  // Can be set to particular file size
            'max_height'      => "",
            'max_width'       => "",
            'file_name'       => $imagename,
            'overwrite'       => TRUE,
            'remove_spaces'   => TRUE
        ));
        if($this->upload->do_upload('service_icon'))
        {
            $upload_data = $this->upload->data();
            if($upload_data['file_name'] != ''){
                unlink("./upload/services/icon/".$old_data['service_icon']);
            }
            $data['service_icon'] = $upload_data['file_name'];
        }else{
            $data['service_icon'] = $this->input->post('old_icon');
        }
        $imagename2 = time().'-service-image';
        
        $this->upload->initialize(array(
            'upload_path'     => "./upload/services/images",
            'allowed_types'   => "jpg|png|jpeg",
            'max_size'        => "2048000",  // Can be set to particular file size
            'max_height'      => "",
            'max_width'       => "",
            'file_name'       => $imagename2,
            'overwrite'       => TRUE,
            'remove_spaces'   => TRUE
        ));
        if($this->upload->do_upload('service_image'))
        {
            $upload_data2 = $this->upload->data();
            if($upload_data2['file_name'] != ''){
                unlink("./upload/services/images/".$old_data['service_image']);
            }
            $data['service_image'] = $upload_data2['file_name'];
        }else{
            $data['service_image'] = $this->input->post('old_image');
        }
        //print_r($data); exit;
        $result = $this->servicesmodel->get_services_save($data);
        if($result){
            redirect('admin/services');
        }else{
            $messge = array('message' => 'Services Add/Edit Something Wrong','message_type' => 'error');
            $this->session->set_flashdata('item', $messge);
            if($this->input->post('id')){
                $id= $this->input->post('id');
                redirect('admin/services/edit_services/'.$id);
            }else{
                redirect('admin/services/add_services');
            }
        }
    }
    
     public function delete_services($id) {
        // Code goes here
        $old_data = $this->servicesmodel->get_services_by_id($id);
        if($old_data['service_image']){
            unlink("./upload/services/images/".$old_data['service_image']);
            unlink("./upload/services/icon/".$old_data['service_icon']);
        }
        $this->db->where('id', $id);
        if($this->db->delete('services')){
            $messge = array('message' => 'Services Delete Successful','message_type' => 'error');
            $this->session->set_flashdata('item', $messge);
            redirect('admin/services');
        }else{
            $messge = array('message' => 'Services Delete Something Wrong','message_type' => 'error');
            $this->session->set_flashdata('item', $messge);
            redirect('admin/services');
        } 
    }
    
    public function status_services($id) {
        // Code goes here
        $provide = $this->servicesmodel->get_services_by_id($id);
        
        $status = $provide['status'];
        if($status =='1'){
            $messge = array('message' => 'Services Inactive Successful','message_type' => 'error');
            $this->session->set_flashdata('item', $messge);
            $up_status = '0';
        }else{
            $messge = array('message' => 'Services Active Successful','message_type' => 'success');
            $this->session->set_flashdata('item', $messge);
            $up_status = '1';
        }
        $this->db->where('id', $id);
        if($this->db->update('services', array('status' => $up_status))){
            redirect('admin/services');
        }else{
            redirect('admin/services');
        } 
    }
}
/* Location: ./application/controllers/welcome.php */