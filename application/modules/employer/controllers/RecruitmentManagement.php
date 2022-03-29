<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class RecruitmentManagement extends MX_Controller  {
 
	var $data = array(); 

	/** All users login there **/
	public function __construct(){
		parent::__construct();
        $this->isAuthenticated('EmployerLoginDetails',base_url('sign-in'));
	} 
	 
	/**
    * Sort Description.
    * function name: getList  
    * Details: Load view
    * @return: 
    * 
    */
    public function getList(){
       
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Recruitment Management";
        $data['page_heading']="Recruitment Management";
         $data['page_sub_heading']="Recruitment User List";
        $this->employer_template->load('employer_template','employer/recruitment_management/list', $data); 
    }

    /**
    * Sort Description.
    * function name: getList  
    * Details: Load view
    * @return: 
    * 
    */
    public function newUser(){
       
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Recruitment Management";
        $data['page_heading']="Recruitment Management";
         $data['page_sub_heading']="Recruitment User";
        $this->employer_template->load('employer_template','employer/recruitment_management/add_new_user', $data); 
    }

    /**
    * Sort Description.
    * function name: getList  
    * Details: Load view
    * @return: 
    * 
    */
    public function processLevelOne(){
       
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Recruitment Management";
        $data['page_heading']="Recruitment Management";
         $data['page_sub_heading']="Recruitment User";
        $this->employer_template->load('employer_template','employer/recruitment_management/level_one', $data); 
    }

    /**
    * Sort Description.
    * function name: getList  
    * Details: Load view
    * @return: 
    * 
    */
    public function processLevelTwo(){
       
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Recruitment Management";
        $data['page_heading']="Recruitment Management";
         $data['page_sub_heading']="Recruitment User";
        $this->employer_template->load('employer_template','employer/recruitment_management/level_two', $data); 
    }

    /**
    * Sort Description.
    * function name: getList  
    * Details: Load view
    * @return: 
    * 
    */
    public function processLevelThree(){
       
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Recruitment Management";
        $data['page_heading']="Recruitment Management";
         $data['page_sub_heading']="Recruitment User";
        $this->employer_template->load('employer_template','employer/recruitment_management/level_three', $data); 
    }

    /**
    * Sort Description.
    * function name: getList  
    * Details: Load view
    * @return: 
    * 
    */
    public function processLevelFour(){
       
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Recruitment Management";
        $data['page_heading']="Recruitment Management";
         $data['page_sub_heading']="Recruitment User";
        $this->employer_template->load('employer_template','employer/recruitment_management/level_four', $data); 
    }

    /**
    * Sort Description.
    * function name: getList  
    * Details: Load view
    * @return: 
    * 
    */
    public function processLevelFive(){
       
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Recruitment Management";
        $data['page_heading']="Recruitment Management";
         $data['page_sub_heading']="Recruitment User";
        $this->employer_template->load('employer_template','employer/recruitment_management/level_five', $data); 
    }

    /**
    * Sort Description.
    * function name: getList  
    * Details: Load view
    * @return: 
    * 
    */
    public function processLevelSix(){
       
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Recruitment Management";
        $data['page_heading']="Recruitment Management";
         $data['page_sub_heading']="Recruitment User";
        $this->employer_template->load('employer_template','employer/recruitment_management/level_six', $data); 
    }

    /* Compansation Structure */
    /**
    * Sort Description.
    * function name: compensationList  
    * Details: Load view
    * @return: 
    * 
    */
    public function compensationList(){
       
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Compensation";
        $data['page_heading']="Compensation";
         $data['page_sub_heading']="Compensation List";
        $this->employer_template->load('employer_template','employer/recruitment_management/compensation/list', $data);
    }

    /* Compansation Structure */
    /**
    * Sort Description.
    * function name: compensationList  
    * Details: Load view
    * @return: 
    * 
    */
    public function compensationDetails(){
       
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Compensation";
        $data['page_heading']="Compensation";
         $data['page_sub_heading']="compensation Details";
        $this->employer_template->load('employer_template','employer/recruitment_management/compensation/details', $data); 
    }


}
?>