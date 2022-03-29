<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Calender extends MX_Controller  {
 
    var $data = array(); 

    /** All users login there **/
    public function __construct(){
       parent::__construct();
        $this->isAuthenticated('EmployeeLogin',base_url('sign-in'));
        $this->login_data = $this->session->userdata('EmployeeLogin');
        $this->login_data = $this->session->userdata('EmployeeLogin');
        $this->employer_id = $this->login_data['employer_id'];
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
        $data['page_title_top']="Events";
        $data['page_heading']="All Events";
        $this->employer_template->load('employee_template','employee/employee/calender/hr_calender', $data); 
    }

     /**
    * Sort Description.
    * function name: fetch_event  
    * Details: fetch events
    * @return: array 
    * 
    */
    public function fetch_event($id){
        if(!empty($id)){
            $query = "SELECT * FROM hs_employer_event WHERE employer_id = $id AND status = 'Active'";
            $res = $this->Mod_Common->customQuery($query);
           
            $eventArray = array();
            foreach ($res as $key => $res_val) {
                array_push($eventArray, $res_val);
            }
            echo json_encode($eventArray);
            
        }
    }

}
?>