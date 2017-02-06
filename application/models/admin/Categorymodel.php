<?php
/**
 * ark Admin Panel for Codeigniter 
 * Author: Chirag A. Boghani
 * downloaded from http://devzone.co.in
 *
 */
class Categorymodel extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    public function get_categories()
    {
        $this->db->order_by("sequence", "asc");
        $query = $this->db->get_where('categories', array('status'=>'1'));
        return $query->result();
    }
    
    public function get_categories_by_id($id){
        $query = $this->db->get_where('categories', array('id'=>$id));
        return $query->row_array();
    }
    
    public function get_categories_save($data){
        $id = $data['id'];
        if($data['status']==''){
            $data['status'] = '0';
        }
        if($data['sequence']==''){
             $data['sequence'] = $this->db->count_all('categories');
        }
        if($id){
            $this->db->where('id', $id);
            $result = $this->db->update('categories', array('name' => $data['category_name'],'sequence' => $data['sequence'],'status' => $data['status'],'datetime'=>date('y-m-d H:m:s')));
            $messge = array('message' => 'Category Edit SuccessFull','message_type' => 'success');
            $this->session->set_flashdata('item', $messge);
        }else{
            $result = $this->db->insert('categories', array('name' => $data['category_name'],'sequence' => $data['sequence'],'status' => $data['status'],'datetime'=>date('y-m-d H:m:s')));
            $messge = array('message' => 'Category Add SuccessFull','message_type' => 'success');
            $this->session->set_flashdata('item', $messge);
        }
        if($result){
            return true;
        }else{
            return false;
        }
    }
    
    function get_list() {
        /* Array of table columns which should be read and sent back to DataTables. Use a space where
         * you want to insert a non-database field (for example a counter or static image)
         */
        
        $aColumns = array('name','sequence','datetime','status');
        $aResultColumns = array('id','name','sequence','datetime','status');
        /* Indexed column (used for fast and accurate table cardinality) */
        $sIndexColumn = "id";
        
        $sTable = "categories";
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
        $sWhere = "";
        if (isset($_GET['sSearch']) && $_GET['sSearch'] != "") {
            $sWhere = "WHERE (";
            for ($i = 0; $i < count($aColumns); $i++) {
                if (isset($_GET['bSearchable_' . $i]) && $_GET['bSearchable_' . $i] == "true") {
                    $sWhere .= "`" . $aColumns[$i] . "` LIKE '%" . $this->db->escape_str($_GET['sSearch']) . "%' OR ";
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
                $sWhere .= "`" . $aColumns[$i] . "` LIKE '%" . $this->db->escape_str($_GET['sSearch_' . $i]) . "%' ";
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

            $row['name'] = $aRow['name'];
            $row['sequence'] = $aRow['sequence'];
            
            $created_date = $aRow['datetime'];
            $row['created_at'] = date('M d',strtotime($created_date));
            $row['operation'] = "<div class='hidden-phone visible-desktop action-buttons' id='{$aRow['id']}'>";
            $row['operation'] .=  $row['status']."&nbsp;&nbsp;";
            $row['operation'] .= "<a data-toggle='tooltip' data-original-title='Edit' href='category/edit_category/{$aRow['id']}' class='green'><i class='icon-pencil bigger-130'></i></a>&nbsp;&nbsp;";
            $row['operation'] .= "<a data-toggle='tooltip' data-original-title='Remove' href='javascript:;' id='{$aRow['id']}' class='red delete_btn'><i class='icon-trash bigger-130'></i></a>";
            $row['operation'] .= "</div>";
            $output['aaData'][] = $row;
            $i++;    
            //$output['data'][] = $row;
        }

        return $output;
    }
}