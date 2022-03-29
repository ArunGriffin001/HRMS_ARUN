<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class EmployeeManagement extends MX_Controller  {
 
	var $data = array(); 

	/** All users login there **/
	public function __construct(){
		parent::__construct();
        $this->isAuthenticated('EmployerLoginDetails',base_url('sign-in'));
	} 
	 
	/**
    * Sort Description.
    * function name: empMgmtEmpInfoRecord  
    * Details: Load view
    * @return: 
    * 
    */
    public function empMgmtEmpInfoRecord(){
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Employee";
        $data['page_heading']="Welcome Soylent Corp!";
        $this->employer_template->load('employer_template','employer/employee_management/hr_employee', $data); 
    }

    /**
    * Sort Description.
    * function name: empMgmtLeaveTracking  
    * Details: Load view
    * @return: 
    * 
    */
    public function empMgmtLeaveTracking(){
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Leave Tracking";
        $data['page_heading']="Welcome Soylent Corp!";
        $this->employer_template->load('employer_template','employer/employee_management/hr_leave', $data); 
    }

    /**
    * Sort Description.
    * function name: hrmsHoliday  
    * Details: Load hrms holiday view
    * @return: 
    * 
    */
    public function empMgmtAttendance(){
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Attendance";
        $data['page_heading']="Welcome Soylent Corp!";
        $this->employer_template->load('employer_template','employer/employee_management/hr_attendance', $data); 
    }

    /**
    * Sort Description.
    * function name: empMgmtTimesheet  
    * Details: Load view
    * @return: 
    * 
    */
    public function empMgmtTimesheet(){
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Timesheet";
        $data['page_heading']="Welcome Soylent Corp!";
        $this->employer_template->load('employer_template','employer/employee_management/timesheet', $data); 
    }

    /**
    * Sort Description.
    * function name: assetList  
    * Details: Load view
    * @return: 
    * 
    */
    public function assetList(){
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Asset";
        $data['page_heading']="List";
        $this->employer_template->load('employer_template','employer/employee_management/assets_list/list', $data); 
    }
    /**
    * Sort Description.
    * function name: addAsset  
    * Details: Load view
    * @return: 
    * 
    */
    public function addAsset(){
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Asset";
        $data['page_heading']="Add";
        $this->employer_template->load('employer_template','employer/employee_management/assets_list/add', $data); 
    }

}
?>