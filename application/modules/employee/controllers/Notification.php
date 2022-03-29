<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Notification extends MX_Controller  {
 
	var $data = array(); 

	/** All users login there **/
	public function __construct(){
		parent::__construct();
        $this->isAuthenticated('EmployeeLogin',base_url('sign-in'));
        $this->login_data = $this->session->userdata('EmployeeLogin');
        $this->employer_id = $this->login_data['employer_id'];
        $this->employee_id = $this->login_data['userId'];
	} 
	 
	/**
    * Sort Description.
    * function name: notificationPage  
    * Details: Load view
    * @return: 
    * 
    */
    public function notificationPage(){

        $data['header_title']="HRMS";
        $data['page_title_top']="Notification";
        $data['page_heading']="Notification";

       // $todayDate = date('Y-m-d');
        $cus_event_query = "SELECT * FROM hs_employer_event WHERE start > NOW() AND employer_id =  $this->employer_id AND `status` = 'Active' ORDER BY event_id DESC LIMIT 3";
        $upcoming_event = $this->Mod_Common->customQuery($cus_event_query);
        $data['upcoming_event'] = (!empty($upcoming_event) ? $upcoming_event : '');
        /*echo '<pre>';
        print_r($data['upcoming_event']);
        echo'</pre>';
        die;*/
        $this->employee_template->load('employee_template','employee/notification/notification', $data); 
    }
}
?>