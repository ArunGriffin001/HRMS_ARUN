<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Timesheet extends MX_Controller  {
 
	var $data = array(); 

	/** All users login there **/
	public function __construct(){
		parent::__construct();
        $this->isAuthenticated('EmployeeLogin',base_url('sign-in'));
	} 
	 
	/**
    * Sort Description.
    * function name: timeShiftTracking  
    * Details: Load view
    * @return: 
    * 
    */
    public function timeShiftTracking(){

        $data['header_title']   =  "HRMS - Soylent Corp";
        $data['page_title_top'] =  "Time Shift Tarcking";
        $data['page_heading']   =  "Time Shift Tarcking";
        $this->employee_template->load('employee_template','employee/timesheet/time_shift_tracking', $data); 
    }

    /**
    * Sort Description.
    * function name: timeShiftTracking  
    * Details: Load view
    * @return: 
    * 
    */
    public function timeSheetTracking(){

        $data['header_title']   =  "HRMS - Soylent Corp";
        $data['page_title_top'] =    "Team Leave";
        $data['page_heading']   =  "Team Leave";
        $this->employee_template->load('employee_template','employee/timesheet/timesheet_tracking', $data); 
    }

}
?>