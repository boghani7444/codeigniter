<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Skills extends CI_Controller {
/**
 * ark Admin Panel for Codeigniter 
 * Author: Chirag A. Boghani
 * downloaded from http://devzone.co.in
 *
 */
    public function __construct() {
        parent::__construct();
        $this->load->model('admin/skillsmodel');
        $this->load->helper('text');
        if (!$this->session->userdata('is_admin_login')) {
            redirect('admin/home');
        }
    }

    public function index() {
        $data['page'] = 'skills';
        
        $data['skills'] = $this->skillsmodel->get_skills();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/leftside', $data);
        $this->load->view('admin/skills', $data);
        $this->load->view('admin/templates/footer', $data);
    }

    public function add_skills() {
        $data['page'] = 'add_skills';
        $data['id'] = '';
        $data['skills'] = '';
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/leftside', $data);
        $this->load->view('admin/add_skills', $data);
        $this->load->view('admin/templates/footer', $data);
    }

     public function edit_skills($id) {
        $data['page'] = 'edit_skills';
        $data['id'] = $id;
        $data['skills'] = $this->skillsmodel->get_skills_by_id($id);
        
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/leftside', $data);
        $this->load->view('admin/edit_skills', $data);
        $this->load->view('admin/templates/footer', $data);
    }
    public function update_skills() 
    {
        $data['id'] = $this->input->post('id');
        $data['title'] = $this->input->post('title');
        $data['description'] = $this->input->post('description');
        $data['d_order'] = $this->input->post('d_order');
        $data['status'] = $this->input->post('status');
        
        if($this->input->post('id')){ 
            $old_data = $this->skillsmodel->get_skills_by_id($this->input->post('id'));
        }
        $this->load->library('upload');
       
        $imagename = time().'-skill';
        $this->upload->initialize(array(
            'upload_path'     => "./upload/skills",
            'allowed_types'   => "jpg|png|jpeg",
            'max_size'        => "2048000",  // Can be set to particular file size
            'max_height'      => "",
            'max_width'       => "",
            'file_name'       => $imagename,
            'overwrite'       => TRUE,
            'remove_spaces'   => TRUE
        ));
        if($this->upload->do_upload('image'))
        {
            $upload_data = $this->upload->data();
            if($upload_data['file_name'] != ''){
                unlink("./upload/skills/".$old_data['image']);
            }
            $data['image'] = $upload_data['file_name'];
        }else{
            $data['image'] = $this->input->post('old_image');
        }
        $result = $this->skillsmodel->get_skills_save($data);
        if($result){
            redirect('admin/skills');
        }else{
            $messge = array('message' => 'Skills Add/Edit Something Wrong','message_type' => 'error');
            $this->session->set_flashdata('item', $messge);
            if($this->input->post('id')){
                $id= $this->input->post('id');
                redirect('admin/skills/edit_skills/'.$id);
            }else{
                redirect('admin/skills/add_skills');
            }
        }
    }
    
     public function delete_skills($id) {
        // Code goes here
        $old_data = $this->skillsmodel->get_skills_by_id($id);
        if($old_data['image']){
            unlink("./upload/skills/".$old_data['image']);
        }
        $this->db->where('id', $id);
        if($this->db->delete('skills')){
            $messge = array('message' => 'Skills Delete Successful','message_type' => 'error');
            $this->session->set_flashdata('item', $messge);
            redirect('admin/skills');
        }else{
            $messge = array('message' => 'Skills Delete Something Wrong','message_type' => 'error');
            $this->session->set_flashdata('item', $messge);
            redirect('admin/skills');
        } 
    }
    
    public function status_skills($id) {
        // Code goes here
        $provide = $this->skillsmodel->get_skills_by_id($id);
        
        $status = $provide['status'];
        if($status =='Y'){
            $messge = array('message' => 'Skills Inactive Successful','message_type' => 'error');
            $this->session->set_flashdata('item', $messge);
            $up_status = 'N';
        }else{
            $messge = array('message' => 'Skills Active Successful','message_type' => 'success');
            $this->session->set_flashdata('item', $messge);
            $up_status = 'Y';
        }
        $this->db->where('id', $id);
        if($this->db->update('skills', array('status' => $up_status))){
            redirect('admin/skills');
        }else{
            redirect('admin/skills');
        } 
    }
}
/* Location: ./application/controllers/welcome.php */