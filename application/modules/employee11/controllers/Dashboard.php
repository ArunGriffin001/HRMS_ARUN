<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MX_Controller  {
 
	var $data = array(); 

	/** All users login there **/
	public function __construct(){
		parent::__construct();
        $this->isAuthenticated('EmployeeLogin',base_url('sign-in'));
	} 
	 
	/**
    * Sort Description.
    * function name: dashboard  
    * Details: Load  view
    * @return: 
    * 
    */
    public function dashboard(){
       
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Employee Dashboard";
        $data['page_heading']="Employee Dashboard";
        $this->employee_template->load('employee_template','employee/dashboard/dashboard', $data); 
    }

    /**
    * Sort Description.
    * function name: hrmsDepartment  
    * Details: Load hrms department view
    * @return: 
    * 
    */
    public function hrmsDepartment(){
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="HR Dashboard";
        $data['page_heading']="Welcome Soylent Corp!";
        $this->employer_template->load('employer_template','employer/hrms/hr_departments', $data); 
    }

    /**
    * Sort Description.
    * function name: hrmsHoliday  
    * Details: Load hrms holiday view
    * @return: 
    * 
    */
    public function hrmsHoliday(){
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="HR Dashboard";
        $data['page_heading']="Welcome Soylent Corp!";
        $this->employer_template->load('employer_template','employer/hrms/hr_holidays', $data); 
    }

    /**
    * Sort Description.
    * function name: hrmsEvents  
    * Details: Load hrms events view
    * @return: 
    * 
    */
    public function hrmsEvents(){
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="HR Dashboard";
        $data['page_heading']="Welcome Soylent Corp!";
        $this->employer_template->load('employer_template','employer/hrms/hr_events', $data); 
    }

    /**
    * Sort Description.
    * function name: hrmsAccounts  
    * Details: Load hrms accounts view
    * @return: 
    * 
    */
    public function hrmsAccounts(){
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="HR Dashboard";
        $data['page_heading']="Welcome Soylent Corp!";
        $this->employer_template->load('employer_template','employer/hrms/hr_accounts', $data); 
    }
   
}
?>