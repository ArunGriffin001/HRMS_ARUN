<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Employer_enquiry_model extends CI_Model {
    public function __construct(){
        parent::__construct();
    }
    public function enquiryAjaxList($isCount=false,$start=0,$stop=0, $column_name='',$order=''){
        
        if(!empty($column_name) && $column_name=='hs_users.company_name' ){
            $orderby_name = 'hs_users.company_name';
        }else if(!empty($column_name) && $column_name=='hs_employer_enquiry.email' ){
            $orderby_name = 'hs_employer_enquiry.email';
        }else if(!empty($column_name) && $column_name=='hs_employer_enquiry.subject' ){
            $orderby_name = 'hs_employer_enquiry.subject';
        }else if(!empty($column_name) && $column_name=='hs_employer_enquiry.created_at' ){
            $orderby_name = 'hs_employer_enquiry.created_at';
        }else{
            $orderby_name = 'hs_employer_enquiry.id';
        }
        $search = $this->input->get('search');
        /*$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");*/
        $this->db->select('hs_employer_enquiry.id, hs_employer_enquiry.message, hs_users.company_name, hs_employer_enquiry.email, hs_employer_enquiry.subject, hs_employer_enquiry.created_at');
        $this->db->from(TABLE_EMPLOYER_ENQUIRY);

        $this->db->join('hs_users', 'hs_users.id = hs_employer_enquiry.company_id','inner');
        
        if(!empty($orderby_name)){
           $this->db->order_by($orderby_name, $order);
        }

        //--------search text-box value start
        if(!empty($search['value'])){
            $search_info = trim($search['value']);
            $this->db->where('(`hs_users.company_name` LIKE "%'.$this->db->escape_like_str($search_info).'%" OR `hs_employer_enquiry.email` LIKE "%'.$this->db->escape_like_str($search_info).'%" OR `hs_employer_enquiry.created_at` LIKE "%'.$this->db->escape_like_str($search_info).'%" OR `hs_employer_enquiry.subject` LIKE "%'.$this->db->escape_like_str($search_info).'%" )',NUll);
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