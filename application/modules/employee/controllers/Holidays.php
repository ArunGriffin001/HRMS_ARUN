<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Holidays extends MX_Controller  {
 
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
    * function name: hrmsHoliday  
    * Details: Load hrms holiday view
    * @return: 
    * 
    */
    public function hrmsHoliday(){
       /* echo'<pre>';
        print_r($this->login_data);
        echo'</pre>';
        die;*/
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Holidays";
        $data['page_heading']="Holidays";
        $year = date('Y');
        $employer_id = $this->employer_id;
        if(!empty($this->input->post('employer_val'))){
            extract($this->input->post());
            //$employer_id = decode($employer_val);
            $year = $holiday_date;
            $year = $holiday_date;
            $custom_query = "SELECT * FROM hs_employer_holiday WHERE YEAR(holiday_date) = $year AND employer_id = $employer_id ORDER BY id DESC";
        }else{
            $employer_id = $this->employer_id;
            $custom_query = "SELECT * FROM hs_employer_holiday WHERE YEAR(holiday_date) = $year AND employer_id = $employer_id ORDER BY id DESC";
        }
        $res = $this->Mod_Common->customQuery($custom_query);
        $data['page_heading']="Holidays";
        $data['year']   =  $year;
        $employer_id = $this->employer_id;
        $year_list = $this->Mod_Common->customQuery("SELECT DISTINCT(YEAR(holiday_date)) as years FROM hs_employer_holiday WHERE employer_id = $employer_id ORDER BY YEAR(holiday_date) DESC");
        $data['year_list'] = $year_list;
        $data['holiday'] = $res;
        $data['employerID'] = $this->employer_id;

       
        $this->employer_template->load('employee_template','employee/employee/holidays/hr_holidays', $data); 
    }

}
?>