<?php
/**
 * ark Admin Panel for Codeigniter 
 * Author: Chirag A. Boghani
 * downloaded from http://devzone.co.in
 *
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('homemodel');
        $this->load->model('commonmodel');
        $this->load->helper('url_helper');
        $this->load->helper('text');
    }
    function _404(){
        $item = $this->commonmodel->get_site_details();
        foreach($item[0] as $item_key=>$item_value){
            $this->config->set_item($item_key, $item_value);
            $data[$item_key] = $this->config->item($item_key);
        }
        $page='404';
        $data['page_item'] = $this->commonmodel->get_page($page);
        $data['all_page'] = $this->commonmodel->get_all_page();
        $data['logo'] = $this->commonmodel->get_logo();
        $data['services'] = $this->commonmodel->get_services();
        
        $data['slider'] = $this->homemodel->get_slider();
        $data['body_class'] = "";
        $data['portfolio'] = $this->homemodel->get_portfolio();
        $data['home_services'] = $this->homemodel->get_home_services();
        $data['services_details'] = $this->homemodel->get_servicepage();
        $data['about_details'] = $this->homemodel->get_aboutpage();
        
        $this->load->view('templates/header', $data);
        $this->load->view("my404_view");
        $this->load->view('templates/footer', $data);
    }
}
