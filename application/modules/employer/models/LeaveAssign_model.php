<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class LeaveAssign_model extends CI_Model {
    public function __construct(){
        parent::__construct();
        $this->login_data = $this->session->userdata('EmployerLoginDetails');
        $this->employer_id = $this->login_data['userId'];
    }
    public function leaveAssignAjaxList($isCount=false,$start=0,$stop=0, $column_name='',$order=''){
        
        if(!empty($column_name) && $column_name=='hs_users_employer.full_name' ){
            $orderby_name = 'hs_users_employer.full_name';
        }else if(!empty($column_name) && $column_name=='hs_employer_department.dept_name' ){
            $orderby_name = 'hs_employer_department.dept_name';
        }else if(!empty($column_name) && $column_name=='hs_employer_desination.name' ){
            $orderby_name = 'hs_employer_desination.name';
        }else if(!empty($column_name) && $column_name=='hs_employer_leave_type_management.leave_type_name' ){
            $orderby_name = 'hs_employer_leave_type_management.leave_type_name';
        }else{
            $orderby_name = 'hs_employee_leave_assign_history.assign_id';
        }
        $search = $this->input->get('search');
        /*$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");*/
        $this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
        
        $this->db->select('DISTINCT(hs_employee_leave_assign_history.employee_id),  hs_employee_leave_assign_history.assign_id, hs_employee_leave_assign_history.department_id,hs_employee_leave_assign_history.employer_id, hs_employee_leave_assign_history.leave_cat_id, hs_employee_leave_assign_history.leave_assign_val, hs_employee_leave_assign_history.assign_by, hs_employee_leave_assign_history.created_at, hs_employee_leave_assign_history.updated_at, hs_users_employer.full_name, hs_users_employer.employee_department,hs_users_employer.employee_designation,  hs_employer_department.dept_name, hs_employer_desination.name as desination_name, hs_employer_leave_type_management.leave_type_name as leave_cat_name');
        //$this->db->distinct('hs_employee_leave_assign_history.employee_id');
        $this->db->from('hs_employee_leave_assign_history');

        $this->db->join(TABLE_USERS_EMPLOYER, 'hs_users_employer.employee_id = hs_employee_leave_assign_history.employee_id','inner');
        $this->db->join(TABLE_EMPLOYER_DEPARTMENT, 'hs_employer_department.dep_id = hs_users_employer.employee_department','inner');
        $this->db->join(TABLE_EMPLOYER_DESIGNATION, 'hs_employer_desination.id = hs_users_employer.employee_designation','inner');
        $this->db->join(TABLE_LEAVE_TYPE, 'hs_employer_leave_type_management.leave_cat_id = hs_employee_leave_assign_history.leave_cat_id','inner');
        
       $this->db->group_by('hs_employee_leave_assign_history.employee_id');
        $this->db->where(array('hs_employee_leave_assign_history.employer_id'=>$this->employer_id));
       
        

        if(!empty($orderby_name)){
           $this->db->order_by($orderby_name, $order);
        }

        //--------search text-box value start
        if(!empty($search['value'])){
            $search_info = trim($search['value']);
            $this->db->where('(`hs_users_employer.full_name` LIKE "%'.$this->db->escape_like_str($search_info).'%" OR `hs_employer_desination.name` LIKE "%'.$this->db->escape_like_str($search_info).'%" OR `hs_employer_department.dept_name` LIKE "%'.$this->db->escape_like_str($search_info).'%" OR `hs_employer_leave_type_management.leave_type_name` LIKE "%'.$this->db->escape_like_str($search_info).'%" )',NUll);
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