<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Property_type extends CI_Controller {
/**
 * ark Admin Panel for Codeigniter 
 * Author: Chirag A. Boghani
 * downloaded from http://devzone.co.in
 *
 */
    public function __construct() {
        parent::__construct();
        $this->load->model('admin/property_typemodel');
        if (!$this->session->userdata('is_admin_login')) {
            redirect('admin/home');
        }
    }

    public function index() {
        $data['page'] = 'property_type';
        $data['page_title'] = 'Property Type';
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/leftside', $data);
        $this->load->view('admin/property_type', $data);
        $this->load->view('admin/templates/footer', $data);
    }
    function property_type_list() {
        $results = $this->property_typemodel->get_list();
        echo json_encode($results);
    }
    
    
    public function add_property_type() {
        $data['page'] = 'add_property_type';
        $data['page_title'] = 'Property Type';
        $data['id'] = '';
        $data['category'] = '';
        
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/leftside', $data);
        $this->load->view('admin/add_property_type', $data);
        $this->load->view('admin/templates/footer', $data);
    }

     public function edit_property_type($id) { 
        $data['page_title'] = 'Property Type';
        $data['page'] = 'edit_property_type';
        $data['id'] = $id;
        $data['category'] = $this->property_typemodel->get_property_type_by_id($id);
        
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/leftside', $data);
        $this->load->view('admin/edit_property_type', $data);
        $this->load->view('admin/templates/footer', $data);
    }
    
    public function update_property_type() 
    {
        $data['id'] = $this->input->post('id');
        $data['pname'] = $this->input->post('pname');
        $data['sequence'] = $this->input->post('sequence');
        $data['status'] = $this->input->post('status');
        $result = $this->property_typemodel->get_property_type_save($data);
        if($result){
            redirect('admin/property_type');
        }else{
            $messge = array('message' => 'Property Type Add/Edit Something Wrong','message_type' => 'error');
            $this->session->set_flashdata('item', $messge);
            if($this->input->post('id')){
                $id= $this->input->post('id');
                redirect('admin/property_type/edit_property_type/'.$id);
            }else{
                redirect('admin/property_type/add_property_type');
            }
        }
    }
    
     public function delete_user() {
        // Code goes here
        $this->db->where('id', $this->input->post('id'));
        if($this->db->delete('property_type')){
            $messge = array('message' => 'Property Type Delete Successful','message_type' => 'error');
            $this->session->set_flashdata('item', $messge);
            $array = array();
            echo json_encode($array);
        }else{
            $messge = array('message' => 'Property Type Delete Something Wrong','message_type' => 'error');
            $this->session->set_flashdata('item', $messge);
            $array = array();
            echo json_encode($array);
        } 
    }
    
    public function status_user() {
        // Code goes here
        $id = $this->input->post('id');
        $provide = $this->property_typemodel->get_property_type_by_id($id);
        
        $status = $provide['status'];
        if($status =='1'){
            $messge = array('message' => 'Property Type Inactive Successful','message_type' => 'error');
            $this->session->set_flashdata('item', $messge);
            $up_status = '0';
        }else{
            $messge = array('message' => 'Property Type Active Successful','message_type' => 'success');
            $this->session->set_flashdata('item', $messge);
            $up_status = '1';
        }
        $this->db->where('id', $id);
        if($this->db->update('property_type', array('status' => $up_status))){
            $array = array();
            $array['id'] = $id;
            $array['status'] = $up_status;
            echo json_encode($array);
            exit;
        }else{
            $array = array();
            $array['id'] = $id;
            $array['status'] = $up_status;
            echo json_encode($array);
            exit;
        } 
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */