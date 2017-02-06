<?php
/**
 * ark Admin Panel for Codeigniter 
 * Author: Chirag A. Boghani
 * downloaded from http://devzone.co.in
 *
 */
class Propertiesmodel extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    
    public function get_properties_by_id($id){
        $query = $this->db->get_where('properties', array('id'=>$id));
        return $query->row_array();
    }
    
    public function get_properties_save($data){
        $id = $data['id'];
        if($data['status']==''){
            $data['status'] = '0';
        }
        if($data['sequence']==''){
             $data['sequence'] = $this->db->count_all('properties');
        }
        $array = array(
            'categories_id' => $data['categories_id'],
            'property_type_id' => $data['property_type_id'],
            'properties_name' => $data['properties_name'],
            'properties_image' => $data['properties_image'],
            'image_alt' => $data['image_alt'],
            'image_title' => $data['image_title'],
            'state' => $data['state'],
            'city' => $data['city'],
            'description' => $data['description'],
            'sequence' => $data['sequence'],
            'status' => $data['status'],
            'created_at'=>date('y-m-d H:m:s'),
            'updated_at'=>date('y-m-d H:m:s')
        );
        if($id){
            $this->db->where('id', $id);
            $result = $this->db->update('properties',$array);
            $messge = array('message' => 'Properties Edit SuccessFull','message_type' => 'success');
            $this->session->set_flashdata('item', $messge);
        }else{
            $result = $this->db->insert('properties',$array);
            $messge = array('message' => 'Properties Add SuccessFull','message_type' => 'success');
            $this->session->set_flashdata('item', $messge);
        }
        if($result){
            return true;
        }else{
            return false;
        }
    }
    
    function get_list() {
        $aColumns = array('p.id','c.name','t.pname','p.categories_id','p.property_type_id','p.properties_name','p.properties_image','p.image_alt','p.image_title','p.state','p.city','p.sequence','p.status','p.created_at','p.updated_at');
        $aResultColumns = array('p.id','c.name','t.pname','p.categories_id','p.property_type_id','p.properties_name','p.properties_image','p.image_alt','p.image_title','p.state','p.city','p.sequence','p.status','p.created_at','p.updated_at');
        /* Indexed column (used for fast and accurate table cardinality) */
        $sIndexColumn = "id";
        
        $sTable = "properties p";
        $sjoin = "JOIN categories c on p.categories_id = c.id JOIN property_type t on p.property_type_id = t.id ";
        /* Total data set length */
        $sQuery = "SELECT COUNT('" . $sIndexColumn . "') AS row_count
            FROM $sTable";
        $rResultTotal = $this->db->query($sQuery);
        $aResultTotal = $rResultTotal->row();
        $iTotal = $aResultTotal->row_count;

        /*
         * Paging
         */
        $sLimit = "";
        if (isset($_GET['iDisplayStart']) && $_GET['iDisplayLength'] != '-1') {
            $sLimit = "LIMIT " . $this->db->escape_str($_GET['iDisplayStart']) . ", " .
                    $this->db->escape_str($_GET['iDisplayLength']);
        }

        /*
         * Ordering
         */
        if (isset($_GET['iSortCol_0'])) {
            $sOrder = "ORDER BY  ";
            for ($i = 0; $i < intval($_GET['iSortingCols']); $i++) {
                if ($_GET['bSortable_' . intval($_GET['iSortCol_' . $i])] == "true") {
                    $sOrder .= $aColumns[intval($_GET['iSortCol_' . $i])] . "
                                                        " . $this->db->escape_str($_GET['sSortDir_' . $i]) . ", ";
                }
            }

            $sOrder = substr_replace($sOrder, "", -2);
            if ($sOrder == "ORDER BY") {
                $sOrder = "";
            }
        }

        /*
         * Filtering
         */
        $sWhere = "";
        if (isset($_GET['sSearch']) && $_GET['sSearch'] != "") {
            $sWhere = "WHERE (";
            for ($i = 0; $i < count($aColumns); $i++) {
                if (isset($_GET['bSearchable_' . $i]) && $_GET['bSearchable_' . $i] == "true") {
                    $sWhere .= "" . $aColumns[$i] . " LIKE '%" . $this->db->escape_str($_GET['sSearch']) . "%' OR ";
                }
            }
            $sWhere = substr_replace($sWhere, "", -3);
            $sWhere .= ')';
        }

        /* Individual column filtering */
        for ($i = 0; $i < count($aColumns); $i++) {
            if (isset($_GET['bSearchable_' . $i]) && $_GET['bSearchable_' . $i] == "true" && $_GET['sSearch_' . $i] != '') {
                if ($sWhere == "") {
                    $sWhere = "WHERE ";
                } else {
                    $sWhere .= " AND ";
                }
                $sWhere .= "" . $aColumns[$i] . " LIKE '%" . $this->db->escape_str($_GET['sSearch_' . $i]) . "%' ";
            }
        }
        /*
         * SQL queries
         * Get data to display
         */
        $sQuery = "SELECT SQL_CALC_FOUND_ROWS " . str_replace(" , ", " ", implode(", ", $aResultColumns)) . "
	   FROM   $sTable $sjoin
	   $sWhere
	   $sOrder
	   $sLimit
	";
        //echo $sQuery; exit;
        $rResult = $this->db->query($sQuery);

        /* Data set length after filtering */
        $sQuery = "SELECT FOUND_ROWS() AS length_count";
        $rResultFilterTotal = $this->db->query($sQuery);
        $aResultFilterTotal = $rResultFilterTotal->row();
        $iFilteredTotal = $aResultFilterTotal->length_count;

        /*
         * Output
         */
        $sEcho = $this->input->get_post('sEcho', true);
        $output = array(
            "sEcho" => intval($sEcho),
            "iTotalRecords" => $iTotal,
            "iTotalDisplayRecords" => $iFilteredTotal,
            "aaData" => array()
        );
        $i=1;
        foreach ($rResult->result_array() as $aRow) {
            
            $row = array();
            $active = array(
                '0' => "<a data-toggle='tooltip' data-original-title='Click here to active' href='javascript:;' id='{$aRow['id']}' class='status1 red status_btn'><i class='icon-remove bigger-130'></i></a>",
                '1' => "<a data-toggle='tooltip' data-original-title='Click here to deactive' href='javascript:;' id='{$aRow['id']}' class='status1 green status_btn'><i class='icon-ok bigger-130'></i></a>",
            );
            
            $row['no'] = $i;    
            $row['status'] = $active[$aRow['status']];
            $row['properties_name'] = '<a style="color:#393939;text-decoration: none;" href="javascript:void(0);" onmouseover="abc();" class="screenshot" rel='.base_url("upload/properties/".$aRow['properties_image']).' title='.$aRow['properties_name'].'>'.$aRow['properties_name'].'</a>';
            $row['sequence'] = $aRow['sequence'];
            $row['cname'] = $aRow['name'];
            $row['pname'] = $aRow['pname'];
            $row['operation'] = "<div class='hidden-phone visible-desktop action-buttons' id='{$aRow['id']}'>";
            $row['operation'] .= "<a data-toggle='tooltip' data-original-title='Image List' href='properties/properties_image/{$aRow['id']}' class='green'><i class='icon-picture bigger-130'></i></a>&nbsp;&nbsp;";
            $row['operation'] .=  $row['status']."&nbsp;&nbsp;";
            $row['operation'] .= "<a data-toggle='tooltip' data-original-title='Edit' href='properties/edit_properties/{$aRow['id']}' class='green'><i class='icon-pencil bigger-130'></i></a>&nbsp;&nbsp;";
            $row['operation'] .= "<a data-toggle='tooltip' data-original-title='Remove' href='javascript:;' id='{$aRow['id']}' class='red delete_btn'><i class='icon-trash bigger-130'></i></a>";
            $row['operation'] .= "</div>";
            $output['aaData'][] = $row;
            $i++;    
            //$output['data'][] = $row;
        }
        return $output;
    }
    
    public function get_image_properties_by_id($id){
        $query = $this->db->get_where('properties_image', array('id'=>$id));
        return $query->row_array();
    }
    
    public function get_properties_image_save($data){
        $id = $data['id'];
        if($data['status']==''){
            $data['status'] = '0';
        }
        if($data['sequence']==''){
             $data['sequence'] = $this->db->count_all('properties_image');
        }
        $array = array(
            'properties_id' => $data['properties_id'],
            'title' => $data['title'],
            'image' => $data['image'],
            'sequence' => $data['sequence'],
            'status' => $data['status'],
            'created_at'=>date('y-m-d H:m:s'),
            'updated_at'=>date('y-m-d H:m:s')
        );
        if($id){
            $this->db->where('id', $id);
            $result = $this->db->update('properties_image',$array);
            $messge = array('message' => 'Properties Image Edit SuccessFull','message_type' => 'success');
            $this->session->set_flashdata('item', $messge);
        }else{
            $result = $this->db->insert('properties_image',$array);
            $messge = array('message' => 'Properties Image Add SuccessFull','message_type' => 'success');
            $this->session->set_flashdata('item', $messge);
        }
        if($result){
            return true;
        }else{
            return false;
        }
    }
    function get_image_list($properties_id) {
        $aColumns = array('id','properties_id','title','image','sequence','status','created_at','updated_at');
        $aResultColumns = array('id','properties_id','title','image','sequence','status','created_at','updated_at');
        /* Indexed column (used for fast and accurate table cardinality) */
        $sIndexColumn = "id";
        
        $sTable = "properties_image";
        $sjoin = "";
        /* Total data set length */
        $sQuery = "SELECT COUNT('" . $sIndexColumn . "') AS row_count
            FROM $sTable";
        $rResultTotal = $this->db->query($sQuery);
        $aResultTotal = $rResultTotal->row();
        $iTotal = $aResultTotal->row_count;

        /*
         * Paging
         */
        $sLimit = "";
        if (isset($_GET['iDisplayStart']) && $_GET['iDisplayLength'] != '-1') {
            $sLimit = "LIMIT " . $this->db->escape_str($_GET['iDisplayStart']) . ", " .
                    $this->db->escape_str($_GET['iDisplayLength']);
        }

        /*
         * Ordering
         */
        if (isset($_GET['iSortCol_0'])) {
            $sOrder = "ORDER BY  ";
            for ($i = 0; $i < intval($_GET['iSortingCols']); $i++) {
                if ($_GET['bSortable_' . intval($_GET['iSortCol_' . $i])] == "true") {
                    $sOrder .= $aColumns[intval($_GET['iSortCol_' . $i])] . "
                                                        " . $this->db->escape_str($_GET['sSortDir_' . $i]) . ", ";
                }
            }

            $sOrder = substr_replace($sOrder, "", -2);
            if ($sOrder == "ORDER BY") {
                $sOrder = "";
            }
        }

        /*
         * Filtering
         */
        $sWhere = " where properties_id = '".$properties_id."' ";
        if (isset($_GET['sSearch']) && $_GET['sSearch'] != "") {
            $sWhere = "WHERE (";
            for ($i = 0; $i < count($aColumns); $i++) {
                if (isset($_GET['bSearchable_' . $i]) && $_GET['bSearchable_' . $i] == "true") {
                    $sWhere .= "" . $aColumns[$i] . " LIKE '%" . $this->db->escape_str($_GET['sSearch']) . "%' OR ";
                }
            }
            $sWhere = substr_replace($sWhere, "", -3);
            $sWhere .= ')';
        }

        /* Individual column filtering */
        for ($i = 0; $i < count($aColumns); $i++) {
            if (isset($_GET['bSearchable_' . $i]) && $_GET['bSearchable_' . $i] == "true" && $_GET['sSearch_' . $i] != '') {
                if ($sWhere == "") {
                    $sWhere = "WHERE ";
                } else {
                    $sWhere .= " AND ";
                }
                $sWhere .= "" . $aColumns[$i] . " LIKE '%" . $this->db->escape_str($_GET['sSearch_' . $i]) . "%' ";
            }
        }
        /*
         * SQL queries
         * Get data to display
         */
        $sQuery = "SELECT SQL_CALC_FOUND_ROWS " . str_replace(" , ", " ", implode(", ", $aResultColumns)) . "
	   FROM   $sTable $sjoin
	   $sWhere
	   $sOrder
	   $sLimit
	";
        //echo $sQuery; exit;
        $rResult = $this->db->query($sQuery);

        /* Data set length after filtering */
        $sQuery = "SELECT FOUND_ROWS() AS length_count";
        $rResultFilterTotal = $this->db->query($sQuery);
        $aResultFilterTotal = $rResultFilterTotal->row();
        $iFilteredTotal = $aResultFilterTotal->length_count;

        /*
         * Output
         */
        $sEcho = $this->input->get_post('sEcho', true);
        $output = array(
            "sEcho" => intval($sEcho),
            "iTotalRecords" => $iTotal,
            "iTotalDisplayRecords" => $iFilteredTotal,
            "aaData" => array()
        );
        $i=1;
        foreach ($rResult->result_array() as $aRow) {
            
            $row = array();
            $active = array(
                '0' => "<a data-toggle='tooltip' data-original-title='Click here to active' href='javascript:;' id='{$aRow['id']}' class='status1 red status_btn'><i class='icon-remove bigger-130'></i></a>",
                '1' => "<a data-toggle='tooltip' data-original-title='Click here to deactive' href='javascript:;' id='{$aRow['id']}' class='status1 green status_btn'><i class='icon-ok bigger-130'></i></a>",
            );
            
            $row['no'] = $i;    
            $row['status'] = $active[$aRow['status']];
            $row['title'] = '<a style="color:#393939;text-decoration: none;" href="javascript:void(0);" onmouseover="abc();" class="screenshot" rel='.base_url("upload/properties/".$aRow['image']).' title='.$aRow['title'].'>'.$aRow['title'].'</a>';
            $row['sequence'] = $aRow['sequence'];
            $row['operation'] = "<div class='hidden-phone visible-desktop action-buttons' id='{$aRow['id']}'>";
            $row['operation'] .=  $row['status']."&nbsp;&nbsp;";
            $row['operation'] .= "<a data-toggle='tooltip' data-original-title='Edit' href='".base_url()."admin/properties/edit_properties_image/{$aRow['id']}' class='green'><i class='icon-pencil bigger-130'></i></a>&nbsp;&nbsp;";
            $row['operation'] .= "<a data-toggle='tooltip' data-original-title='Remove' href='javascript:;' id='{$aRow['id']}' class='red delete_btn'><i class='icon-trash bigger-130'></i></a>";
            $row['operation'] .= "</div>";
            $output['aaData'][] = $row;
            $i++;    
        }
        return $output;
    }
}