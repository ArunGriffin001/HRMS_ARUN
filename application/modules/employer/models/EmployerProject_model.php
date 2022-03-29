<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class EmployerProject_model extends CI_Model {
    public function __construct(){
        parent::__construct();
        $this->login_data = $this->session->userdata('EmployerLoginDetails');
        $this->employer_id = $this->login_data['userId'];
    }
    public function projectAjaxList($isCount=false,$start=0,$stop=0, $column_name='',$order=''){
        
        // if(!empty($column_name) && $column_name=='hs_employer_project.project_name' ){
        //     $orderby_name = 'hs_employer_project.project_name';
        // }else if(!empty($column_name) && $column_name=='hs_project_technology.tech_name' ){
        //     $orderby_name = 'hs_project_technology.tech_name';
        // }else if(!empty($column_name) && $column_name=='hs_employer_project.created_at' ){
        //     $orderby_name = 'hs_employer_project.created_at';
        // }else if(!empty($column_name) && $column_name=='hs_employer_project.status' ){
        //     $orderby_name = 'hs_employer_project.status';
        // }else{
        //     $orderby_name = 'hs_employer_project.project_id';
        // }
        // $search = $this->input->get('search');
        // /*$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");*/
        // $this->db->select('hs_employer_project.project_id,hs_employer_project.project_name, hs_employer_project.description,hs_employer_project.technology_name,hs_employer_project.status, hs_employer_project.created_at, hs_project_technology.tech_name, hs_project_technology.tech_id ');
        // $this->db->from('hs_employer_project');
        // $this->db->join('hs_project_technology', 'hs_project_technology.tech_id = hs_employer_project.technology_name','inner');
        // $this->db->where(array('hs_employer_project.employer_id' => $this->employer_id));
        
        // if(!empty($orderby_name)){
        //    $this->db->order_by($orderby_name, $order);
        // }

        // //--------search text-box value start
        // if(!empty($search['value'])){
        //     $search_info = trim($search['value']);
        //     $this->db->where('(`hs_employer_project.project_name` LIKE "%'.$this->db->escape_like_str($search_info).'%" OR `hs_project_technology.tech_name` LIKE "%'.$this->db->escape_like_str($search_info).'%" OR `hs_employer_project.status` LIKE "%'.$this->db->escape_like_str($search_info).'%" OR `hs_employer_project.created_at` LIKE "%'.$this->db->escape_like_str($search_info).'%")',NUll);
        // }

        if(!empty($column_name) && $column_name=='hs_employer_project.project_name' ){
            $orderby_name = 'hs_employer_project.project_name';
        }else if(!empty($column_name) && $column_name=='hs_employer_project.created_at' ){
            $orderby_name = 'hs_employer_project.created_at';
        }else if(!empty($column_name) && $column_name=='hs_employer_project.status' ){
            $orderby_name = 'hs_employer_project.status';
        }else{
            $orderby_name = 'hs_employer_project.project_id';
        }
        $search = $this->input->get('search');
        /*$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");*/
        $this->db->select('hs_employer_project.project_id,hs_employer_project.project_name, hs_employer_project.description,hs_employer_project.technology_name,hs_employer_project.status, hs_employer_project.created_at');
        $this->db->from('hs_employer_project');
        $this->db->where(array('hs_employer_project.employer_id' => $this->employer_id));
        
        if(!empty($orderby_name)){
           $this->db->order_by($orderby_name, $order);
        }

        //--------search text-box value start
        if(!empty($search['value'])){
            $search_info = trim($search['value']);
            $this->db->where('(`hs_employer_project.project_name` LIKE "%'.$this->db->escape_like_str($search_info).'%" OR `hs_employer_project.status` LIKE "%'.$this->db->escape_like_str($search_info).'%" OR `hs_employer_project.created_at` LIKE "%'.$this->db->escape_like_str($search_info).'%")',NUll);
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