<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Payroll extends MX_Controller  {
 
	var $data = array(); 

	/** All users login there **/
	public function __construct(){
		parent::__construct();
        $this->isAuthenticated('EmployeeLogin',base_url('sign-in'));
	} 
	 
	/**
    * Sort Description.
    * function name: paySlip  
    * Details: Load  view
    * @return: 
    * 
    */
    public function paySlip(){

        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Payslip";
        $data['page_heading']="Payslip";
        $this->employee_template->load('employee_template','employee/payroll/payslip', $data); 
    }

     /**
    * Sort Description.
    * function name: taxDeclarations  
    * Details: Load view
    * @return: 
    * 
    */
    public function taxDeclarations(){
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Tax Declarations";
        $data['page_heading']="Tax Declarations";
        $this->employee_template->load('employee_template','employee/payroll/manage_tax', $data); 
    }

    /**
    * Sort Description.
    * function name: taxComputation  
    * Details: Load view
    * @return: 
    * 
    */
    public function taxComputation(){
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Tax Computation";
        $data['page_heading']="Tax Computation";
        $this->employee_template->load('employee_template','employee/payroll/tax_computation', $data); 
    }

    /**
    * Sort Description.
    * function name: compensationPlan  
    * Details: view
    * @return: 
    * 
    */
    public function compensationPlan(){
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Compensation";
        $data['page_heading']="Compensation";
        $this->employee_template->load('employee_template','employee/payroll/compensation_plan', $data); 
    }

    /**
    * Sort Description.
    * function name: calender  
    * Details: Load view
    * @return: 
    * 
    */
    public function form16(){
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Form 16";
        $data['page_heading']="Form 16";
        $this->employee_template->load('employee_template','employee/payroll/form_16', $data); 
    }

    /**
    * Sort Description.
    * function name: resignation  
    * Details: Load view
    * @return: 
    * 
    */
    public function resignation(){
        $data['header_title']   =  "HRMS - Soylent Corp";
        $data['page_title_top'] =   "Resignation";
        $data['page_heading']   =  "Resignation";
        $this->employee_template->load('employee_template','employee/payroll/full_final_settlment', $data); 
    }
}
?>