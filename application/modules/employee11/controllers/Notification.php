<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Notification extends MX_Controller  {
 
	var $data = array(); 

	/** All users login there **/
	public function __construct(){
		parent::__construct();
        $this->isAuthenticated('EmployeeLogin',base_url('sign-in'));
	} 
	 
	/**
    * Sort Description.
    * function name: notificationPage  
    * Details: Load view
    * @return: 
    * 
    */
    public function notificationPage(){

        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Notification";
        $data['page_heading']="Notification";
        $this->employee_template->load('employee_template','employee/notification/notification', $data); 
    }
}
?>