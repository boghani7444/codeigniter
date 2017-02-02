<?php
/**
 * ark Admin Panel for Codeigniter 
 * Author: Chirag A. Boghani
 * downloaded from http://devzone.co.in
 *
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin/loginmodel');
        $this->load->model('admin/inquirymodel');
    }

    public function index() {
        if ($this->session->userdata('is_admin_login')) {
            redirect('admin/dashboard');
        } else {
            $data = '';
            $this->load->view('admin/login', $data);
        }
    }

     public function do_login() {
	
        if ($this->session->userdata('is_admin_login')) {
            $messge = array('message' => 'You have already Login','message_type' => 'error');
            $this->session->set_flashdata('item', $messge);
            redirect('admin/home/dashboard');
        } else { 
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $remember = $this->input->post('remember');

            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if ($this->form_validation->run() == FALSE) {
                $messge = array('message' => 'Please Enter Admin Information','message_type' => 'error');
                $this->session->set_flashdata('item', $messge);
                $this->load->view('admin/login');
            } else { 
                $login_id = $this->loginmodel->login_valid($username,$password);
                //print_r($login_id); exit;
                if ($login_id) {
                    foreach ($login_id->result_array() as $recs => $res) {
                        $user_id = $res['id'];
                        $last_login_time = $res['last_login_time'];
                        $this->session->set_userdata(array(
                            'id' => $res['id'],
                            'username' => $res['username'],
                            'email' => $res['email'],        
                             'last_login_datetime' => $last_login_time,    
                             'ipaddress' => $res['ipaddress'],                        
                            'is_admin_login' => true
                                )
                        );
                    }
                    
                    $count = $this->inquirymodel->get_new_inquiry($last_login_time);
                    
                    $this->session->set_userdata('count_inquiery', $count);
                    
                    $this->db->where('id', $user_id);
                    $this->db->update('users', array('last_login_time' => date('Y-m-d h:i:s'),'ipaddress'=>$ip = $_SERVER['REMOTE_ADDR']));
                    
                    $messge = array('message' => 'Welcome Admin Login Successful','message_type' => 'success');
                    $this->session->set_flashdata('item', $messge);
                    redirect('admin/dashboard');
                } else {  
                    $messge = array('message' => 'Access Denied.Invalid Username/Password','message_type' => 'error');
                    $this->session->set_flashdata('item', $messge);
                    redirect('admin/home');
                }
            }
        }
           }

        
    public function logout() {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('is_admin_login');   
        $this->session->sess_destroy();
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
        redirect('admin/home', 'refresh');
    }

    

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */