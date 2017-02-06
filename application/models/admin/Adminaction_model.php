<?php
/**
 * ark Admin Panel for Codeigniter 
 * Author: Chirag A. Boghani
 * downloaded from http://devzone.co.in
 *
 */
class Adminaction_model extends CI_Model {

    public function table_data_status($id,$table){
        $query = $this->db->get_where($table, array('id' => $id));
        $provide_data = $query->row('status');
        
        if($provide_data == '1'){
            $title = '0';
        }elseif($provide_data == '0'){
            $title = '1';
        }elseif($provide_data == 'Y'){
            $title = 'N';
        }else{
            $title = 'Y';
        }
        
        $this->db->where('id', $id);
        $this->db->update($table, array('status' => $title));
        return $title;
        
    }
    public function table_data_delete($id,$table){
        $this->db->where('id', $id);
        if($this->db->delete($table)){
            return true;
        }else{
            return false;
        }
    }
}