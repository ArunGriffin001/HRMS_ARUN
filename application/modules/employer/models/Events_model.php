<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Events_model extends CI_Model {
    public function __construct(){
        parent::__construct();
        $this->login_data = $this->session->userdata('EmployerLoginDetails');
        $this->employer_id = $this->login_data['userId'];
    }
    public function eventAjaxList($isCount=false,$start=0,$stop=0, $column_name='',$order=''){
        
        if(!empty($column_name) && $column_name=='title' ){
            $orderby_name = 'title';
        }else if(!empty($column_name) && $column_name=='start' ){
            $orderby_name = 'start';
        }else if(!empty($column_name) && $column_name=='status' ){
            $orderby_name = 'status';
        }else{
            $orderby_name = 'event_id';
        }
        $search = $this->input->get('search');
        /*$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");*/
        $this->db->select('*');
        $this->db->from(TABLE_EVENTS);
        $this->db->where('employer_id', $this->employer_id);
        /*$this->db->join('hs_users', 'hs_users.id = hs_employer_enquiry.company_id','inner');*/
        
        if(!empty($orderby_name)){
           $this->db->order_by($orderby_name, $order);
        }

        //--------search text-box value start
        if(!empty($search['value'])){
            $search_info = trim($search['value']);
            $this->db->where('(`title` LIKE "%'.$this->db->escape_like_str($search_info).'%" OR `start` LIKE "%'.$this->db->escape_like_str($search_info).'%" OR `end` LIKE "%'.$this->db->escape_like_str($search_info).'%" OR `status` LIKE "%'.$this->db->escape_like_str($search_info).'%")',NUll);
        }
        //--------search text-box value end
        if($stop!=0) { 
           $this->db->limit($stop,$start);
        }
        $query=$this->db->get(); 
        if($isCount){
             $returnData = $query->num_rows();
        }else{
            $returnData = $query->result();
            $this->session->set_userdata('search_data',$returnData);
        }
        
        return $returnData;
    }
    
    /* Change status */
    function updateDataFromTabel($table = '', $data = array(), $field = '', $id = 0) {
      if (empty($table) || !count($data)) {
        return false;
      } else {
        if (is_array($field)) {
          $this->db->where($field);
        } else {
          $this->db->where($field, $id);

        }
        return $this->db->update($table, $data);
      }
    }   
}