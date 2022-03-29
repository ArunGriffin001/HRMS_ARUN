<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class FullFinalSettlement extends MX_Controller  {
 
	var $data = array(); 

	/** All users login there **/
	public function __construct(){
		parent::__construct();
        $this->isAuthenticated('EmployerLoginDetails',base_url('sign-in'));
        $this->login_data = $this->session->userdata('EmployerLoginDetails');
        $this->employer_id = $this->login_data['userId'];
        $this->employer_row_id = $this->login_data['Id'];
        
	} 
	 
	/**
    * Sort Description.
    * function name: appraisal  
    * Details: Load view
    * @return: 
    * 
    */
    public function list(){
       
        $data['header_title']="HRMS";
        $data['page_title_top']="List";
        $data['page_heading']="List";
         $data['page_sub_heading']="List";
        $this->employer_template->load('employer_template','employer/full-and-final-settlement/list', $data); 
    }
    /**
    * Sort Description.
    * function name: add  
    * Details: Load view
    * @return: 
    * 
    */
    public function add(){
        
        $emp_list = $this->Mod_Common->selectData('hs_users_employer',array('employer_id'=>$this->employer_id),'employee_id,employer_id,full_name');
         $this->db->select('hs_users_employer.employee_id, hs_users_employer.employer_id, hs_users_employer.full_name, hs_employer_department.dept_name');
        $this->db->from(TABLE_USERS_EMPLOYER);
        $this->db->join(TABLE_EMPLOYER_DEPARTMENT, 'hs_employer_department.dep_id = hs_users_employer.employee_department','inner');
        $this->db->where(array('hs_users_employer.employer_id'=>$this->employer_id, 'hs_users_employer.role !='=>'1'));
        $query=$this->db->get();
        $returnData = $query->result();

        // echo'<pre>';
        // print_r($returnData);
        // echo'</pre>';
        // die;

        $data['header_title']="HRMS";
        $data['page_title_top']="add";
        $data['page_heading']="add";
        $data['page_sub_heading']="add";
        $data['employee_list']= !empty($returnData) ? $returnData : '';
        $this->employer_template->load('employer_template','employer/full-and-final-settlement/add2', $data); 
    }

     public function addForm(){
        
        $emp_list = $this->Mod_Common->selectData('hs_users_employer',array('employer_id'=>$this->employer_id),'employee_id,employer_id,full_name');
         $this->db->select('hs_users_employer.employee_id, hs_users_employer.employer_id, hs_users_employer.full_name, hs_employer_department.dept_name');
        $this->db->from(TABLE_USERS_EMPLOYER);
        $this->db->join(TABLE_EMPLOYER_DEPARTMENT, 'hs_employer_department.dep_id = hs_users_employer.employee_department','inner');
        $this->db->where(array('hs_users_employer.employer_id'=>$this->employer_id, 'hs_users_employer.role !='=>'1'));
        $query=$this->db->get();
        $returnData = $query->result();

        // echo'<pre>';
        // print_r($returnData);
        // echo'</pre>';
        // die;

        $data['header_title']="HRMS";
        $data['page_title_top']="Full and Final Settlement";
        $data['page_heading']="add";
        $data['page_sub_heading']="add";
        $data['employee_list']= !empty($returnData) ? $returnData : '';
        $this->employer_template->load('employer_template','employer/full-and-final-settlement/add2', $data); 
    }

}
?>