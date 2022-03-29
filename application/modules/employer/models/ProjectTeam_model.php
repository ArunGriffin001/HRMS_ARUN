<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class ProjectTeam_model extends CI_Model {
    public function __construct(){
        parent::__construct();
        $this->login_data = $this->session->userdata('EmployerLoginDetails');
        $this->employer_id = $this->login_data['userId'];
    }
    public function projectTeamAjaxList($isCount=false,$start=0,$stop=0, $column_name='',$order=''){
        
        $get_project_id = $this->session->userdata('get_project_id');
        if(!empty($column_name) && $column_name=='hs_employer_project.project_name' ){
            $orderby_name = 'hs_employer_project.project_name';
        }else if(!empty($column_name) && $column_name=='hs_users_employer.full_name' ){
            $orderby_name = 'hs_users_employer.full_name';
        }else if(!empty($column_name) && $column_name=='hs_employer_department.dept_name' ){
            $orderby_name = 'hs_employer_department.dept_name';
        }else if(!empty($column_name) && $column_name=='hs_employer_project_team.created_at'){
            $orderby_name = 'hs_employer_project_team.created_at';
        }else if(!empty($column_name) && $column_name=='hs_employer_project_team.status'){
            $orderby_name = 'hs_employer_project_team.status';
        }else{
            $orderby_name = 'hs_employer_project_team.project_team_id';
        }
        $search = $this->input->get('search');
        /*$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");*/
        $this->db->select('hs_employer_project_team.project_team_id, hs_employer_project.project_id, hs_employer_project.project_name, hs_users_employer.full_name, hs_employer_department.dept_name, hs_employer_project_team.created_at,hs_employer_project_team.status');
        $this->db->from('hs_employer_project_team');
        $this->db->join('hs_users_employer', 'hs_users_employer.employee_id = hs_employer_project_team.employee_id','inner');
        $this->db->join('hs_employer_project', 'hs_employer_project.project_id = hs_employer_project_team.project_id','inner');
        $this->db->join('hs_employer_department', 'hs_employer_department.dep_id = hs_employer_project_team.department_id','inner');

        $this->db->where(array('hs_employer_project.project_id' => $get_project_id));
        
        if(!empty($orderby_name)){
           $this->db->order_by($orderby_name, $order);
        }

        //--------search text-box value start
        if(!empty($search['value'])){
            $search_info = trim($search['value']);
            $this->db->where('(`hs_employer_project.project_name` LIKE "%'.$this->db->escape_like_str($search_info).'%" OR `hs_users_employer.full_name` LIKE "%'.$this->db->escape_like_str($search_info).'%" OR `hs_employer_department.dept_name` LIKE "%'.$this->db->escape_like_str($search_info).'%" OR `hs_employer_department.dept_name` LIKE "%'.$this->db->escape_like_str($search_info).'%" OR `hs_employer_project_team.status` LIKE "%'.$this->db->escape_like_str($search_info).'%" OR `hs_employer_project_team.created_at` LIKE "%'.$this->db->escape_like_str($search_info).'%")',NUll);
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