<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class EmpSalary extends MX_Controller  {
 
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
    * function name: getList  
    * Details: Load view
    * @return: 
    * 
    */
    public function getList(){
       
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Employee Salary";
        $data['page_heading']="Employee Salary";
        $data['page_sub_heading']="Employee Salary List";

        extract($this->input->post());
        $query = "SELECT hs_employee_salary.*, ue.full_name,ed.dept_name FROM  hs_employee_salary
            INNER JOIN hs_users_employer AS ue ON ue.employee_id = hs_employee_salary.employee_id
            INNER JOIN hs_employer_department AS ed ON ed.dep_id = ue.employee_department
            WHERE hs_employee_salary.employer_id = $this->employer_id AND hs_employee_salary.employee_id = $this->employee_id";

        $res = $this->Mod_Common->customQuery($query);
        $setting_val = $this->Mod_Common->rowData('hs_employer_PF_ESI_setting'); 
        $data['salary_list'] = $res;
        $data['setting_val'] = $setting_val;
       /* echo'<pre>';
        echo $this->db->last_query();
        print_r($setting_val);
        print_r($res);
        echo('</pre>');
        die;*/
        $this->employee_template->load('employee_template','employee/employee/salary/list', $data); 
    }

}
?>