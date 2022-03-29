<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Users_model extends CI_Model {
    public function __construct(){
        parent::__construct();
        $this->login_data = $this->session->userdata('EmployerLoginDetails');
        $this->employer_id = $this->login_data['userId'];
    }
    public function userAjaxList($isCount=false,$start=0,$stop=0, $column_name='',$order=''){
        
        if(!empty($column_name) && $column_name=='hs_users_employer.first_name' ){
            $orderby_name = 'hs_users_employer.first_name';
        }else if(!empty($column_name) && $column_name=='hs_users_employer.last_name' ){
            $orderby_name = 'hs_users_employer.last_name';
        }else if(!empty($column_name) && $column_name=='hs_users_employer.email_id' ){
            $orderby_name = 'hs_users_employer.email_id';
        }else if(!empty($column_name) && $column_name=='hs_employer_department.dept_name' ){
            $orderby_name = 'hs_employer_department.dept_name';
        }else if(!empty($column_name) && $column_name=='hs_employer_desination.name' ){
            $orderby_name = 'hs_employer_desination.name';
        }else if(!empty($column_name) && $column_name=='hs_users_employer.joining_date' ){
            $orderby_name = 'hs_users_employer.joining_date';
        }else if(!empty($column_name) && $column_name=='hs_users_employer.created_at' ){
            $orderby_name = 'hs_users_employer.created_at';
        }else if(!empty($column_name) && $column_name=='hs_users_employer.status' ){
            $orderby_name = 'hs_users_employer.status';
        }else{
            $orderby_name = 'hs_users_employer.employee_id';
        }
        $search = $this->input->get('search');
        /*$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");*/
        $this->db->select('hs_users_employer.employee_id, hs_users_employer.employer_id, hs_users_employer.first_name, hs_users_employer.last_name, hs_users_employer.email_id, hs_employer_department.dept_name, hs_employer_desination.name as desination_name, hs_users_employer.joining_date, hs_users_employer.created_at, hs_users_employer.profile_img, hs_users_employer.mobile_no, hs_users_employer.status');
        $this->db->from(TABLE_USERS_EMPLOYER);

        $this->db->join(TABLE_EMPLOYER_DEPARTMENT, 'hs_employer_department.dep_id = hs_users_employer.employee_department','inner');
        $this->db->join(TABLE_EMPLOYER_DESIGNATION, 'hs_employer_desination.id = hs_users_employer.employee_designation','inner');
        
        $this->db->where(array('hs_users_employer.employer_id'=>$this->employer_id, 'hs_users_employer.role !='=>'1'));

        if(!empty($this->session->userdata('filter_value'))){

            $filter_value = $this->session->userdata('filter_value');
            //$a1=''; $a3=''; $a2=''; $a4=''; $a5=''; $a6=''; $a7='';
            //$this->db->like('hs_users_employer.first_name', '');
            /*if(!empty($filter_value["employeeId"])){

               $this->db->like('hs_users_employer.employee_id', $filter_value["employeeId"]);
               $a1 = $filter_value["employeeId"];
            }*/
            if(!empty($filter_value["first_name"])){
                $this->db->like('hs_users_employer.first_name', $filter_value["first_name"]);
            }
            if(!empty($filter_value["last_name"])){
                $this->db->like('hs_users_employer.last_name', $filter_value["last_name"]);
                //$a3=$filter_value["last_name"];
            }
            if(!empty($filter_value["dept_name"])){
                $this->db->like('hs_employer_department.dept_name', $filter_value["dept_name"]);
                //$a4=$filter_value["dept_name"];
            }
             /*if(!empty($filter_value["status"])){
                $this->db->like('hs_users_employer.status', $filter_value["status"]);
                $a5=$filter_value["status"];
            }*/
            /*echo $a1.' = '.$a2.' = '.$a3.' = '.$a4.' = '.$a5.' = ';*/

            
        }

        if(!empty($orderby_name)){
           $this->db->order_by($orderby_name, $order);
        }

        //--------search text-box value start
        if(!empty($search['value'])){
            $search_info = trim($search['value']);
            $this->db->where('(`hs_users_employer.first_name` LIKE "%'.$this->db->escape_like_str($search_info).'%" OR `hs_users_employer.last_name` LIKE "%'.$this->db->escape_like_str($search_info).'%" OR `hs_users_employer.email_id` LIKE "%'.$this->db->escape_like_str($search_info).'%" OR `hs_users_employer.mobile_no` LIKE "%'.$this->db->escape_like_str($search_info).'%" OR `hs_employer_department.dept_name` LIKE "%'.$this->db->escape_like_str($search_info).'%" OR `hs_employer_desination.name` LIKE "%'.$this->db->escape_like_str($search_info).'%"  OR `hs_users_employer.joining_date` LIKE "%'.$this->db->escape_like_str($search_info).'%"  OR `hs_users_employer.created_at` LIKE "%'.$this->db->escape_like_str($search_info).'%"  OR `hs_users_employer.status` LIKE "%'.$this->db->escape_like_str($search_info).'%" OR `hs_users_employer.mobile_no` LIKE "%'.$this->db->escape_like_str($search_info).'%" )',NUll);
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