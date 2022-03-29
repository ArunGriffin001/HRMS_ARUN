<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends CI_model{
    public function __construct(){
        parent::__construct();
    }

   public function userAjaxlist($isCount=false,$start=0,$stop=0, $column_name='',$order='') {
        if(!empty($column_name) && $column_name=='hs_users.company_name' ){
            $orderby_name = 'hs_users.company_name';
        }else if(!empty($column_name) && $column_name=='hs_users_employer.email_id' ){
            $orderby_name = 'hs_users_employer.email_id';
        }else if(!empty($column_name) && $column_name=='hs_users_employer.mobile_no' ){
            $orderby_name = 'hs_users_employer.mobile_no';
        }else if(!empty($column_name) && $column_name=='hs_users.created_at' ){
            $orderby_name = 'hs_users.created_at';
        }else if(!empty($column_name) && $column_name=='hs_users.status' ){
            $orderby_name = 'hs_users.status';
        }else{
            $orderby_name = 'hs_users.created_at';
        }
        $search = $this->input->get('search');
        $this->db->select('hs_users.id, hs_users.company_name, hs_users.status, hs_users.created_at, hs_users_employer.email_id, hs_users_employer.mobile_no, hs_users_employer.employer_id,hs_users_employer.employee_id');
        $this->db->from(TABLE_USERS);
        $this->db->join(TABLE_USERS_EMPLOYER,'hs_users_employer.employer_id = hs_users.id','inner');
        $this->db->where('hs_users_employer.role', '1');
        if(!empty($orderby_name)){
           $this->db->order_by($orderby_name, $order);
        }

        //--------search text-box value start
        if(!empty($search['value'])){
            $search_info = trim($search['value']);
            $this->db->where('(`hs_users.company_name` LIKE "%'.$this->db->escape_like_str($search_info).'%" OR `hs_users_employer.email_id` LIKE "%'.$this->db->escape_like_str($search_info).'%" OR `hs_users_employer.mobile_no` LIKE "%'.$this->db->escape_like_str($search_info).'%" OR `hs_users.status` LIKE "%'.$this->db->escape_like_str($search_info).'%" OR `hs_users.created_at` LIKE "%'.$this->db->escape_like_str($search_info).'%" )',NUll);
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
?>
