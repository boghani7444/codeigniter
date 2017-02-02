<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Properties extends CI_Controller {
/**
 * ark Admin Panel for Codeigniter 
 * Author: Chirag A. Boghani
 * downloaded from http://devzone.co.in
 *
 */
    public function __construct() {
        parent::__construct();
        $this->load->model('admin/propertiesmodel');
        $this->load->model('admin/categorymodel');
        $this->load->model('admin/citystatemodel');
        $this->load->model('admin/property_typemodel');
        if (!$this->session->userdata('is_admin_login')) {
            redirect('admin/home');
        }
    }

    public function index() {
        $data['page'] = 'properties';
        
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/leftside', $data);
        $this->load->view('admin/properties', $data);
        $this->load->view('admin/templates/footer', $data);
    }
    public function properties_image($id) {
        $data['page'] = 'properties';
        $data['properties_id'] = $id;
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/leftside', $data);
        $this->load->view('admin/properties_image', $data);
        $this->load->view('admin/templates/footer', $data);
    }
    public function add_properties_image($id) {
        $data['page'] = 'add_properties';
        
        $data['id'] = '';
        $data['properties_id'] = $id;
        $data['image'] = '';
       
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/leftside', $data);
        $this->load->view('admin/add_properties_image', $data);
        $this->load->view('admin/templates/footer', $data);
    }

     public function edit_properties_image($id) { 
        $data['page'] = 'edit_properties';
        $data['id'] = $id;
        $data['image'] = $this->propertiesmodel->get_image_properties_by_id($id);
        
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/leftside', $data);
        $this->load->view('admin/edit_properties_image', $data);
        $this->load->view('admin/templates/footer', $data);
    }
    
    function image_list($properties_id) {
        $results = $this->propertiesmodel->get_image_list($properties_id);
        echo json_encode($results);
    }
    
    public function update_properties_image() 
    {
        $data['id'] = $this->input->post('id');
        $data['properties_id'] = $this->input->post('properties_id');
        $data['title'] = $this->input->post('title');
        $data['sequence'] = $this->input->post('sequence');
        $data['status'] = $this->input->post('status');
        
        if($this->input->post('id')){ 
            $old_data = $this->propertiesmodel->get_image_properties_by_id($this->input->post('id'));
        }
        
        $config =  array(
            'upload_path'     => "./upload/properties/",
            'allowed_types'   => "jpg|png|jpeg",
            'max_size'        => "2048000",  // Can be set to particular file size
            'max_height'      => "",
            'max_width'       => "",
            'file_name'       => $this->input->post('properties_id').'-'.time().'-properties',
            'overwrite'       => TRUE,
            'remove_spaces'   => TRUE
         ); 
        $this->load->library('upload', $config);
        //$this->upload->initialize($config);
        
        if($this->upload->do_upload('image'))
        {
            $upload_data = $this->upload->data();
            if($upload_data['file_name'] != ''){ 
                unlink("./upload/properties/".$old_data['image']);
            }
            $data['image'] = $upload_data['file_name'];
        }else{
            $data['image'] = $this->input->post('old_image');
        }
        $result = $this->propertiesmodel->get_properties_image_save($data);
        
        if($result){
            redirect('admin/properties/properties_image/'.$this->input->post('properties_id'));
        }else{
            $messge = array('message' => 'Properties Image Add/Edit Something Wrong','message_type' => 'error');
            $this->session->set_flashdata('item', $messge);
            if($this->input->post('id')){
                $id= $this->input->post('id');
                redirect('admin/properties/edit_properties_image/'.$id);
            }else{
                redirect('admin/properties/add_properties_image/'.$this->input->post('properties_id'));
            }
        }
    }
    
    public function delete_image() {
        // Code goes here
        $id = $this->input->post('id');
        $provide = $this->propertiesmodel->get_image_properties_by_id($id);
        unlink("./upload/properties/".$provide['image']);
        
        $this->db->where('id', $this->input->post('id'));
        if($this->db->delete('properties_image')){
            $messge = array('message' => 'Properties Image Delete Successful','message_type' => 'error');
            $this->session->set_flashdata('item', $messge);
            $array = array();
            echo json_encode($array);
        }else{
            $messge = array('message' => 'Properties Image Delete Something Wrong','message_type' => 'error');
            $this->session->set_flashdata('item', $messge);
            $array = array();
            echo json_encode($array);
        } 
    }
    
    public function status_image() {
        // Code goes here
        $id = $this->input->post('id');
        $provide = $this->propertiesmodel->get_image_properties_by_id($id);
        
        $status = $provide['status'];
        if($status =='1'){
            $messge = array('message' => 'Properties Image Inactive Successful','message_type' => 'error');
            $this->session->set_flashdata('item', $messge);
            $up_status = '0';
        }else{
            $messge = array('message' => 'Properties Image Active Successful','message_type' => 'success');
            $this->session->set_flashdata('item', $messge);
            $up_status = '1';
        }
        $this->db->where('id', $id);
        if($this->db->update('properties_image', array('status' => $up_status))){
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
    
    function properties_list() {
        $results = $this->propertiesmodel->get_list();
        echo json_encode($results);
    }
    public function view_city(){
        $id = $this->input->post('id'); 
        $result = $this->citystatemodel->get_city($id);
        $array = '<option value=""> --- Select City --- </option>';
        foreach($result as $city){
            $array .= '<option value="'.$city->id.'">'.$city->city.'</option>';
        }
        header('Content-Type: application/json');
        $jsonWrite = json_encode(array('city'=>$array)); //encode that search data
        print $jsonWrite;
    }
    
    public function add_properties() {
        $data['page'] = 'add_properties';
        
        $data['id'] = '';
        $data['properties'] = '';
        $data['category'] = $this->categorymodel->get_categories();
        $data['property'] = $this->property_typemodel->get_property_type();
        $data['state'] = $this->citystatemodel->get_state();
        
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/leftside', $data);
        $this->load->view('admin/add_properties', $data);
        $this->load->view('admin/templates/footer', $data);
    }

     public function edit_properties($id) { 
        $data['page'] = 'edit_properties';
        $data['id'] = $id;
        $data['properties'] = $this->propertiesmodel->get_properties_by_id($id);
        $data['category'] = $this->categorymodel->get_categories();
        $data['property'] = $this->property_typemodel->get_property_type();
        $data['state'] = $this->citystatemodel->get_state();
        $data['city'] = $this->citystatemodel->get_city($data['properties']['state']);
        
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/leftside', $data);
        $this->load->view('admin/edit_properties', $data);
        $this->load->view('admin/templates/footer', $data);
    }
    
    public function update_properties() 
    {
        $data['id'] = $this->input->post('id');
        $data['categories_id'] = $this->input->post('categories_id');
        $data['property_type_id'] = $this->input->post('property_type_id');
        $data['properties_name'] = $this->input->post('properties_name');
        $data['state'] = $this->input->post('state');
        $data['city'] = $this->input->post('city');
        $data['description'] = $this->input->post('description');
        $data['image_alt'] = $this->input->post('image_alt');
        $data['image_title'] = $this->input->post('image_title');
        
        $data['sequence'] = $this->input->post('sequence');
        $data['status'] = $this->input->post('status');
        
        if($this->input->post('id')){ 
            $old_data = $this->propertiesmodel->get_properties_by_id($this->input->post('id'));
        }
        
        $config =  array(
            'upload_path'     => "./upload/properties/",
            'allowed_types'   => "jpg|png|jpeg",
            'max_size'        => "2048000",  // Can be set to particular file size
            'max_height'      => "",
            'max_width'       => "",
            'file_name'       => time().'-properties',
            'overwrite'       => TRUE,
            'remove_spaces'   => TRUE
         ); 
        $this->load->library('upload', $config);
        //$this->upload->initialize($config);
        
        if($this->upload->do_upload('properties_image'))
        {
            $upload_data = $this->upload->data();
            if($upload_data['file_name'] != ''){ 
                unlink("./upload/properties/".$old_data['properties_image']);
            }
            $data['properties_image'] = $upload_data['file_name'];
        }else{
            $data['properties_image'] = $this->input->post('old_image');
        }
        
        $result = $this->propertiesmodel->get_properties_save($data);
        
        
        if($result){
            redirect('admin/properties');
        }else{
            $messge = array('message' => 'Properties Add/Edit Something Wrong','message_type' => 'error');
            $this->session->set_flashdata('item', $messge);
            if($this->input->post('id')){
                $id= $this->input->post('id');
                redirect('admin/properties/edit_properties/'.$id);
            }else{
                redirect('admin/properties/add_properties');
            }
        }
    }
    
    public function delete_user() {
        // Code goes here
        $this->db->where('id', $this->input->post('id'));
        if($this->db->delete('properties')){
            $messge = array('message' => 'Properties Delete Successful','message_type' => 'error');
            $this->session->set_flashdata('item', $messge);
            $array = array();
            echo json_encode($array);
        }else{
            $messge = array('message' => 'Properties Delete Something Wrong','message_type' => 'error');
            $this->session->set_flashdata('item', $messge);
            $array = array();
            echo json_encode($array);
        } 
    }
    
    public function status_user() {
        // Code goes here
        $id = $this->input->post('id');
        $provide = $this->propertiesmodel->get_properties_by_id($id);
        
        $status = $provide['status'];
        if($status =='1'){
            $messge = array('message' => 'Properties Inactive Successful','message_type' => 'error');
            $this->session->set_flashdata('item', $messge);
            $up_status = '0';
        }else{
            $messge = array('message' => 'Properties Active Successful','message_type' => 'success');
            $this->session->set_flashdata('item', $messge);
            $up_status = '1';
        }
        $this->db->where('id', $id);
        if($this->db->update('properties', array('status' => $up_status))){
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