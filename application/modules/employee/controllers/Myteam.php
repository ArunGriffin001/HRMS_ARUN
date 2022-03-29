<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Myteam extends MX_Controller  {
 
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
    public function teamLeave(){

        $data['header_title']   =  "HRMS - Soylent Corp";
        $data['page_title_top'] =    "Team Leave";
        $data['page_heading']   =  "Team Leave";
        $this->employee_template->load('employee_template','employee/my_team/team_leave', $data); 
    }
}
?>