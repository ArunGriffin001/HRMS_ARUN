<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Employee extends MX_Controller  {
 
	var $data = array(); 

	/** All users login there **/
	public function __construct(){
		parent::__construct();
        $this->isAuthenticated('EmployeeLogin',base_url('sign-in'));
	} 
	 
	/**
    * Sort Description.
    * function name: employeeList  
    * Details: Load  view
    * @return: 
    * 
    */
    public function employeeList(){

        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Employee";
        $data['page_heading']="Employee List";
        $this->employee_template->load('employee_template','employee/employee/employee_list', $data); 
    }

     /**
    * Sort Description.
    * function name: projectList  
    * Details: Load view
    * @return: 
    * 
    */
    public function projectList(){
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Attendance";
        $data['page_heading']="Attendance";
        $this->employee_template->load('employee_template','employee/employee/project_list', $data); 
    }

    /**
    * Sort Description.
    * function name: attendence  
    * Details: Load view
    * @return: 
    * 
    */
    public function attendence(){
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Attendance";
        $data['page_heading']="Attendance";
        $this->employee_template->load('employee_template','employee/employee/attendence', $data); 
    }

    /**
    * Sort Description.
    * function name: leave  
    * Details: view
    * @return: 
    * 
    */
    public function leave(){
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Leave";
        $data['page_heading']="Leave";
        $this->employee_template->load('employee_template','employee/employee/leave', $data); 
    }

    /**
    * Sort Description.
    * function name: calender  
    * Details: Load view
    * @return: 
    * 
    */
    public function calender(){
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Calender";
        $data['page_heading']="Calender";
        $this->employee_template->load('employee_template','employee/employee/calender', $data); 
    }

    /**
    * Sort Description.
    * function name: holiday  
    * Details: Load view
    * @return: 
    * 
    */
    public function holiday(){
        $data['header_title']   =  "HRMS - Soylent Corp";
        $data['page_title_top'] =   "Holidays";
        $data['page_heading']   =  "Holidays";
        $this->employee_template->load('employee_template','employee/employee/hr_holidays', $data); 
    }

    /**
    * Sort Description.
    * function name: myProfile  
    * Details: Load view
    * @return: 
    * 
    */
    public function myProfile(){
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="My Profile";
        $data['page_heading']="My Profile";
        $this->employee_template->load('employee_template','employee/employee/my_profile', $data); 
    }

    /**
    * Sort Description.
    * function name: resignation  
    * Details: Load view
    * @return: 
    * 
    */
    public function resignation(){
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Resignation";
        $data['page_heading']="Resignation";
        $this->employee_template->load('employee_template','employee/employee/resignation', $data); 
    }
   
}
?>