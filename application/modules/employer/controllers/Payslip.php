<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Payslip extends MX_Controller  {
 
	var $data = array(); 

	/** All users login there **/
	public function __construct(){
		parent::__construct();
        $this->isAuthenticated('EmployerLoginDetails',base_url('sign-in'));
	} 
	 
	/**
    * Sort Description.
    * function name: appraisal  
    * Details: Load view
    * @return: 
    * 
    */
    public function payslipPage(){
       
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Payslip";
        $data['page_heading']="Payslip";
         $data['page_sub_heading']="Payslip";
        $this->employer_template->load('employer_template','employer/payroll/payslip/payslip', $data); 
    }

}
?>