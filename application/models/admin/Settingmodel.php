<?php
/**
 * ark Admin Panel for Codeigniter 
 * Author: Chirag A. Boghani
 * downloaded from http://devzone.co.in
 *
 */
class Settingmodel extends CI_Model {
    public function login_user_details($id){
        $query = $this->db->get_where('users', array('id' => $id));
        return $query->row_array();
    }
    public function get_password_change($data){
        $this->db->where('id', $data['id']);
        $result = $this->db->update('users', array('password' => $data['password']));
        if($result){
            return true;
        }else{
            return false;
        }
    }
    public function get_settings_save($data){
        $this->db->where('id', $data['id']);
        $result = $this->db->update('users', array('username'=> $data['username'],'email' => $data['email'],'website' => $data['website'],'address' => $data['address'],'phone_no' => $data['phone'],'facebook'=>$data['facebook'],'twitter'=>$data['twitter'],'google'=>$data['gplus']));
        if($result){
            return true;
        }else{
            return false;
        }
    }
    public function defult_metatag_save($data){
        $this->db->where('id', $data['id']);
        $result = $this->db->update('users', array('meta_title' => $data['meta_title'],'meta_keyword' => $data['meta_keyword'],'meta_description' => $data['meta_description']));
        if($result){
            return true;
        }else{
            return false;
        }
    }
}