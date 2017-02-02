<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Page_data extends CI_Controller {
/**
 * ark Admin Panel for Codeigniter 
 * Author: Chirag A. Boghani
 * downloaded from http://devzone.co.in
 *
 */
    public function __construct() {
        parent::__construct();
        $this->load->model('admin/site_infomodel');
        if (!$this->session->userdata('is_admin_login')) {
            redirect('admin/home');
        }
    }

    public function index() {
        $data['page'] = 'page_data';
        
        $data['site_info'] = $this->site_infomodel->get_site_info();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/leftside', $data);
        $this->load->view('admin/site_info', $data);
        $this->load->view('admin/templates/footer', $data);
    }

    public function add_page_data() {
        $data['page'] = 'add_page_data';
        $data['id'] = '';
        $data['page_data'] = '';
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/leftside', $data);
        $this->load->view('admin/add_page_data', $data);
        $this->load->view('admin/templates/footer', $data);
    }

     public function edit_page_data($id) {
        $data['page'] = 'edit_page_data';
        $data['id'] = $id;
        $data['page_data'] = $this->site_infomodel->get_site_info_by_id($id);
        
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/leftside', $data);
        $this->load->view('admin/edit_page_data', $data);
        $this->load->view('admin/templates/footer', $data);
    }
    public function update_page_data() 
    {
        $data['id'] = $this->input->post('id');
        $data['title'] = $this->input->post('title');
        $data['page_link'] = $this->input->post('page_link');
        $data['page_title'] = $this->input->post('page_title');
        $data['sort_keyword'] = $this->input->post('sort_keyword');
        $data['meta_title'] = $this->input->post('meta_title');
        $data['meta_keyword'] = $this->input->post('meta_keyword');
        $data['meta_description'] = $this->input->post('meta_description');
        $data['sort_description'] = $this->input->post('sort_description');
        $data['description'] = $this->input->post('description');
        $data['sequence'] = $this->input->post('sequence');
        $data['status'] = $this->input->post('status');
        $result = $this->site_infomodel->get_site_info_save($data);
        if($result){
            redirect('admin/page_data');
        }else{
            $messge = array('message' => 'Menu & Page Text Add/Edit Something Wrong','message_type' => 'error');
            $this->session->set_flashdata('item', $messge);
            if($this->input->post('id')){
                $id= $this->input->post('id');
                redirect('admin/page_data/edit_page_data/'.$id);
            }else{
                redirect('admin/page_data/add_page_data');
            }
        }
    }
    
     public function delete_page_data($id) {
        // Code goes here
        $this->db->where('id', $id);
        if($this->db->delete('site_info')){
            $messge = array('message' => 'Menu & Page Text Delete Successful','message_type' => 'error');
            $this->session->set_flashdata('item', $messge);
            redirect('admin/page_data');
        }else{
            $messge = array('message' => 'Menu & Page Text Delete Something Wrong','message_type' => 'error');
            $this->session->set_flashdata('item', $messge);
            redirect('admin/page_data');
        } 
    }
    
    public function status_page_data($id) {
        // Code goes here
        $provide = $this->site_infomodel->get_site_info_by_id($id);
        
        $status = $provide['status'];
        if($status =='Y'){
            $messge = array('message' => 'Menu & Page Text Inactive Successful','message_type' => 'error');
            $this->session->set_flashdata('item', $messge);
            $up_status = 'N';
        }else{
            $messge = array('message' => 'Menu & Page Text Active Successful','message_type' => 'success');
            $this->session->set_flashdata('item', $messge);
            $up_status = 'Y';
        }
        $this->db->where('id', $id);
        if($this->db->update('site_info', array('status' => $up_status))){
            redirect('admin/page_data');
        }else{
            redirect('admin/page_data');
        } 
    }
}
/* Location: ./application/controllers/welcome.php */