<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Category extends CI_Controller {
/**
 * ark Admin Panel for Codeigniter 
 * Author: Chirag A. Boghani
 * downloaded from http://devzone.co.in
 *
 */
    public function __construct() {
        parent::__construct();
        $this->load->model('admin/categorymodel');
        if (!$this->session->userdata('is_admin_login')) {
            redirect('admin/home');
        }
    }

    public function index() {
        $data['page'] = 'category';
        
        //$data['category'] = $this->categorymodel->get_list();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/leftside', $data);
        $this->load->view('admin/category', $data);
        $this->load->view('admin/templates/footer', $data);
    }
    function category_list() {
        $results = $this->categorymodel->get_list();
        echo json_encode($results);
    }
    
    
    public function add_category() {
        $data['page'] = 'add_cate';
        
        $data['id'] = '';
        $data['category'] = '';
        
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/leftside', $data);
        $this->load->view('admin/add_category', $data);
        $this->load->view('admin/templates/footer', $data);
    }

     public function edit_category($id) { 
        $data['page'] = 'edit_cate';
        $data['id'] = $id;
        $data['category'] = $this->categorymodel->get_categories_by_id($id);
        
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/leftside', $data);
        $this->load->view('admin/edit_category', $data);
        $this->load->view('admin/templates/footer', $data);
    }
    
    public function update_category() 
    {
        $data['id'] = $this->input->post('id');
        $data['category_name'] = $this->input->post('category_name');
        $data['sequence'] = $this->input->post('sequence');
        $data['status'] = $this->input->post('status');
        $result = $this->categorymodel->get_categories_save($data);
        if($result){
            redirect('admin/category');
        }else{
            $messge = array('message' => 'Category Add/Edit Something Wrong','message_type' => 'error');
            $this->session->set_flashdata('item', $messge);
            if($this->input->post('id')){
                $id= $this->input->post('id');
                redirect('admin/category/edit_category/'.$id);
            }else{
                redirect('admin/category/add_category');
            }
        }
    }
    
    public function delete_user() {
        // Code goes here
        $this->db->where('id', $this->input->post('id'));
        if($this->db->delete('categories')){
            $messge = array('message' => 'Category Delete Successful','message_type' => 'error');
            $this->session->set_flashdata('item', $messge);
            $array = array();
            echo json_encode($array);
        }else{
            $messge = array('message' => 'Category Delete Something Wrong','message_type' => 'error');
            $this->session->set_flashdata('item', $messge);
            $array = array();
            echo json_encode($array);
        } 
    }
    
    public function status_user() {
        // Code goes here
        $id = $this->input->post('id');
        $provide = $this->categorymodel->get_categories_by_id($id);
        
        $status = $provide['status'];
        if($status =='1'){
            $messge = array('message' => 'Category Inactive Successful','message_type' => 'error');
            $this->session->set_flashdata('item', $messge);
            $up_status = '0';
        }else{
            $messge = array('message' => 'Category Active Successful','message_type' => 'success');
            $this->session->set_flashdata('item', $messge);
            $up_status = '1';
        }
        $this->db->where('id', $id);
        if($this->db->update('categories', array('status' => $up_status))){
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