<?php
/**
 * ark Admin Panel for Codeigniter 
 * Author: Chirag A. Boghani
 * downloaded from http://devzone.co.in
 *
 */
class Loginmodel extends CI_Model {

    public function login_valid($username,$password){
        $query = $this->db->get_where('users', array('username' => $username,'password'=>$password));
        if($query->num_rows()){
            return $query;
        }else{
            return FALSE;
        }
    }
    public function login_user($id){
        $query = $this->db->get_where('users', array('id' => $id));
        return $query->row();
        
    }
}