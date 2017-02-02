<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Inquiry extends CI_Controller {
/**
 * ark Admin Panel for Codeigniter 
 * Author: Chirag A. Boghani
 * downloaded from http://devzone.co.in
 *
 */
    public function __construct() {
        parent::__construct();
        $this->load->model('admin/inquirymodel');
        if (!$this->session->userdata('is_admin_login')) {
            redirect('admin/home');
        }
    }

    public function index() {
        $data['page'] = 'inquiry';
        $this->session->set_userdata('count_inquiery', '');
        $data['inquiry'] = $this->inquirymodel->get_inquiry();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/leftside', $data);
        $this->load->view('admin/inquiry', $data);
        $this->load->view('admin/templates/footer', $data);
    }
    public function view_inquiry($id) {
        $data['page'] = 'view_inquiry';
        $data['id'] = $id;
        $data['inquiry'] = $this->inquirymodel->get_inquiry_by_id($id);
        
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/leftside', $data);
        $this->load->view('admin/view_inquiry', $data);
        $this->load->view('admin/templates/footer', $data);
    }
    public function delete_inquiry($id) {
        // Code goes here
        $this->db->where('id', $id);
        if($this->db->delete('inquiry')){
            $messge = array('message' => 'Inquiry Delete Successful','message_type' => 'error');
            $this->session->set_flashdata('item', $messge);
            redirect('admin/inquiry');
        }else{
            $messge = array('message' => 'Inquiry Delete Something Wrong','message_type' => 'error');
            $this->session->set_flashdata('item', $messge);
            redirect('admin/inquiry');
        } 
    }
}
/* Location: ./application/controllers/welcome.php */