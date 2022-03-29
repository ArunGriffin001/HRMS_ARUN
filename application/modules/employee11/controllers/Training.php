<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Training extends MX_Controller  {
 
	var $data = array(); 

	/** All users login there **/
	public function __construct(){
		parent::__construct();
        $this->isAuthenticated('EmployeeLogin',base_url('sign-in'));
	} 
	 
	/**
    * Sort Description.
    * function name: traningList  
    * Details: Load view
    * @return: 
    * 
    */
    public function traningList(){

        $data['header_title']   =  "HRMS - Soylent Corp";
        $data['page_title_top'] =  "Time Shift Tarcking";
        $data['page_heading']   =  "Time Shift Tarcking";
        $this->employee_template->load('employee_template','employee/training/traning_list', $data); 
    }

    /**
    * Sort Description.
    * function name: traningList  
    * Details: Load view
    * @return: 
    * 
    */
    public function traningType(){

        $data['header_title']   =  "HRMS - Soylent Corp";
        $data['page_title_top'] =  "Time Shift Tarcking";
        $data['page_heading']   =  "Time Shift Tarcking";
        $this->employee_template->load('employee_template','employee/training/traning_type', $data); 
    }

    /**
    * Sort Description.
    * function name: traningList  
    * Details: Load view
    * @return: 
    * 
    */
    public function trainer(){

        $data['header_title']   =  "HRMS - Soylent Corp";
        $data['page_title_top'] =  "Time Shift Tarcking";
        $data['page_heading']   =  "Time Shift Tarcking";
        $this->employee_template->load('employee_template','employee/training/trainer', $data); 
    }
}
?>