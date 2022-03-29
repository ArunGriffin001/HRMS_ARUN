<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Transaction_model extends CI_Model {
    public function __construct(){
        parent::__construct();
        $this->login_data = $this->session->userdata('LoginDetails');
    }
    public function transactionAjaxList($isCount=false,$start=0,$stop=0, $column_name='',$order=''){
        //$employer_id = $this->login_data['userId'];
        
        if(!empty($column_name) && $column_name=='hs_transaction_history.transaction_id' ){
            $orderby_name = 'hs_transaction_history.transaction_id';
        }else if(!empty($column_name) && $column_name=='hs_users.company_name' ){
            $orderby_name = 'hs_users.company_name';
        }else if(!empty($column_name) && $column_name=='hs_member_plans.title' ){
            $orderby_name = 'hs_member_plans.title';
        }else if(!empty($column_name) && $column_name=='hs_transaction_history.created_at' ){
            $orderby_name = 'hs_transaction_history.created_at';
        }else{
            $orderby_name = 'hs_transaction_history.id';
        }
        $search = $this->input->get('search');
        /*$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");*/
        $this->db->select('hs_transaction_history.id, hs_transaction_history.transaction_id, hs_transaction_history.company_id, hs_transaction_history.plan_id, hs_transaction_history.created_at, hs_users.company_name, hs_member_plans.title ');
        $this->db->from(TABLE_TRANSACTION_HISTORY);

        $this->db->join('hs_users', 'hs_users.id = hs_transaction_history.company_id','inner');
        $this->db->join('hs_member_plans', 'hs_member_plans.id = hs_transaction_history.plan_id','inner');
        //$this->db->where('hs_transaction_history.company_id',);
        
        /*$this->db->join('hs_blog_category_option', 'hs_blog_category_option.blog_id = hs_blog_management.id','inner');
        $this->db->join('hs_blog_category', 'hs_blog_category.id = hs_blog_category_option.cat_id','inner');*/

        //$this->db->group_by('hs_blog_management.id'); 
       /* $this->db->where('hs_blog_management.id','hs_blog_tag_option.blog_tag_id');
        $this->db->where('hs_blog_management.id','hs_blog_category_option.blog_id');*/
        if(!empty($orderby_name)){
           $this->db->order_by($orderby_name, $order);
        }

        //--------search text-box value start
        if(!empty($search['value'])){
            $search_info = trim($search['value']);
            $this->db->where('(`hs_users.company_name` LIKE "%'.$this->db->escape_like_str($search_info).'%" OR `hs_member_plans.title` LIKE "%'.$this->db->escape_like_str($search_info).'%" OR `hs_transaction_history.transaction_id` LIKE "%'.$this->db->escape_like_str($search_info).'%" OR `hs_transaction_history.created_at` LIKE "%'.$this->db->escape_like_str($search_info).'%" )',NUll);
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