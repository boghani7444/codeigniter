<?php
/**
 * ark Admin Panel for Codeigniter 
 * Author: Chirag A. Boghani
 * downloaded from http://devzone.co.in
 *
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Settings extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -  
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct() {
        parent::__construct();
        $this->load->model('admin/settingmodel');
         if (!$this->session->userdata('is_admin_login')) {
            redirect('admin/home');
        }
    }

    public function index() {
        $data['page']='setting';
        $data['user_details'] = $this->settingmodel->login_user_details($this->session->userdata('is_admin_login'));
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/leftside', $data);
        $this->load->view('admin/settings', $data);
        $this->load->view('admin/templates/footer', $data);
    }
    public function do_changepassword() 
    {
        $data['id'] = $this->session->userdata('is_admin_login');
        $data['password'] = $this->input->post('password');
        $data['cpassword'] = $this->input->post('cpassword');
        if($data['password'] != $data['cpassword']){
            $messge = array('message' => 'Password And Confirm Password Must be Same','message_type' => 'error');
            $this->session->set_flashdata('item', $messge);
            redirect('admin/settings');
        }else{
            $result = $this->settingmodel->get_password_change($data);
            if($result){
                $messge = array('message' => 'Password Change SuccessFull','message_type' => 'success');
                $this->session->set_flashdata('item', $messge);
                redirect('admin/settings');
            }else{
                $messge = array('message' => 'Password Change Something Wrong','message_type' => 'error');
                $this->session->set_flashdata('item', $messge);
                redirect('admin/settings');
            }
        }
    }
    public function do_setting() 
    { 
        $data['id'] = $this->session->userdata('is_admin_login');
        $data['username'] = $this->input->post('username');
        if($data['username']){
            $this->session->unset_userdata('username');
            $this->session->set_userdata('username',$data['username']);
        }
        $data['email'] = $this->input->post('email');
        $data['website'] = $this->input->post('website');
        $data['phone'] = $this->input->post('phone');
        $data['address'] = $this->input->post('address');
        $data['facebook'] = $this->input->post('facebook');
        $data['twitter'] = $this->input->post('twitter');
        $data['gplus'] = $this->input->post('gplus');
        
        $result = $this->settingmodel->get_settings_save($data);
        if($result){
            $messge = array('message' => 'Profile Settings SuccessFull','message_type' => 'success');
            $this->session->set_flashdata('item', $messge);
            redirect('admin/settings');
        }else{
            $messge = array('message' => 'Profile Settings Something Wrong','message_type' => 'error');
            $this->session->set_flashdata('item', $messge);
            redirect('admin/settings');
        }
    }
    
    public function defultmetatag() 
    { 
        $data['id'] = $this->session->userdata('is_admin_login');
        $data['meta_title'] = $this->input->post('meta_title');
        $data['meta_keyword'] = $this->input->post('meta_keyword');
        $data['meta_description'] = $this->input->post('meta_description');
        
        $result = $this->settingmodel->defult_metatag_save($data);
        if($result){
            $messge = array('message' => 'Defult Meta Tag Save SuccessFull','message_type' => 'success');
            $this->session->set_flashdata('item', $messge);
            redirect('admin/settings');
        }else{
            $messge = array('message' => 'Defult Meta Tag Save Something Wrong','message_type' => 'error');
            $this->session->set_flashdata('item', $messge);
            redirect('admin/settings');
        }
    }
    

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */