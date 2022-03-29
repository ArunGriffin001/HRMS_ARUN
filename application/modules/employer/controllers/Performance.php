<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Performance extends MX_Controller  {
 
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
    public function appraisal(){
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Objective Goals";
        $data['page_heading']="OBJECTIVE STRUCTURES";
        $this->employer_template->load('employer_template','employer/performance/appraisal', $data); 
    }

    /**
    * Sort Description.
    * function name: probationConfirmation  
    * Details: Load view
    * @return: 
    * 
    */
    public function probationConfirmation(){
        $data['header_title']="HRMS";
        $data['page_title_top']="Probation Confirmation";
        $data['page_heading']="Probation Confirmation";
        $this->employer_template->load('employer_template','employer/performance/probation_confirmation', $data); 
    }

    /**
    * Sort Description.
    * function name: performanceGoal  
    * Details: Load view
    * @return: 
    * 
    */
    public function performanceGoal(){
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Mid Year Appraisals";
        $data['page_heading']="Mid Year Appraisals";
        $this->employer_template->load('employer_template','employer/performance/performance_goal', $data); 
    }

    /**
    * Sort Description.
    * function name: performanceReviewFeedback  
    * Details: Load view
    * @return: 
    * 
    */
    public function performanceReviewFeedback(){
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Mid Year Appraisals";
        $data['page_heading']="Employee Basic Information";
        $this->employer_template->load('employer_template','employer/performance/performance_review_feedback', $data); 
    }

    public function getResignation(){
        $data['header_title']="HRMS";
        $data['page_title_top']="Resignation List";
        $data['page_heading']="Resignation List";

        $query = "SELECT hs_resignation.*, hs_users_employer.full_name, hs_employer_department.dept_name, hs_employer_desination.name as desig_name FROM hs_resignation
        INNER JOIN hs_users_employer ON hs_users_employer.employee_id = hs_resignation.employee_id
        INNER JOIN hs_employer_department ON hs_employer_department.dep_id = hs_users_employer.employee_department
          INNER JOIN hs_employer_desination ON hs_employer_desination.id = hs_users_employer.employee_designation
        WHERE hs_resignation.employer_id = $this->employer_id
        ";
        $res = $this->Mod_Common->customQuery($query);
        
        $data['get_data'] = $res;
        $this->employer_template->load('employer_template','employer/performance/resignation_list', $data);
    }

    public function updateResignationStatus() {
       
        $returnData = false;

        $get_status = $this->input->post('get_status');
        $employee_id = $this->input->post('employee_id');
        $employer_id = $this->employer_id;
        $rowID = decode($this->input->post('row_id'));

        $updateData = array('status' => $get_status);
        $upWhere = array('employee_id' => $employee_id, 'employer_id'=>$employer_id,'id'=>$rowID );

        if (!empty($get_status)){
            $this->Mod_Common->updateDataFromTabel('hs_resignation', $updateData, $upWhere);
            $returnData = array('isSuccess' => true);
        }else{
            $returnData = array('isSuccess' => false);
        }
        echo json_encode($returnData);
    }
   
}
?>