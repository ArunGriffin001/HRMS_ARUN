<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class EmployeeSalary extends MX_Controller  {
 
	var $data = array(); 

	/** All users login there **/
	public function __construct(){
		parent::__construct();
        $this->isAuthenticated('EmployerLoginDetails',base_url('sign-in'));
        $this->login_data = $this->session->userdata('EmployerLoginDetails');
        $this->employer_id = $this->login_data['userId'];
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

        //$year_list = array();

        $dept_list = $this->Mod_Common->selectData(TABLE_EMPLOYER_DEPARTMENT,array('status'=>'Active', 'employer_id'=> $this->employer_id));
       /* echo'<pre>';
        print_r($dept_list);
        echo'</pre>';
        die;*/
        $data['dept_list'] = array();
        if(!empty($dept_list)){
            $data['dept_list'] = $dept_list;
        }

        $month_list = array('January'=>'1', 'February'=>'2', 'March'=>'3', 'April'=>'4','May'=>'5','June'=>'6','July'=>'7','August'=>'8','September'=>'9','October'=>'10','November'=>'11', 'December'=>'12');

        $year_list = $this->Mod_Common->customQuery("SELECT DISTINCT(YEAR(paying_date)) as year_name FROM hs_employee_salary WHERE employer_id = $this->employer_id ORDER BY YEAR(paying_date) DESC");


        $data['month_list'] = $month_list;
        $data['year_list'] = $year_list;
        $month_name = '';
        $year_name = '';
        $select_dept = '';
        extract($this->input->post());
        if(!empty($this->input->post('month')) && !empty($this->input->post('year')) && empty($this->input->post('employee_dept_id'))){
            
            $month_name = (!empty($month) ? trim($month) : "''");
            $year_name = (!empty($year) ? trim($year) : "''");
            $query = "SELECT hs_employee_salary.*, ue.full_name,ed.dept_name FROM  hs_employee_salary
            INNER JOIN hs_users_employer AS ue ON ue.employee_id = hs_employee_salary.employee_id
            INNER JOIN hs_employer_department AS ed ON ed.dep_id = ue.employee_department
            WHERE ue.employer_id = $this->employer_id AND MONTH(hs_employee_salary.paying_date) = $month_name AND YEAR(hs_employee_salary.paying_date) = $year_name";
        }else if (!empty($this->input->post('month')) && empty($this->input->post('year'))  && empty($this->input->post('employee_dept_id'))) {

            $month_name = (!empty($month) ? trim($month) : "''");
            $year_name = (!empty($year) ? trim($year) : "''");
            $query = "SELECT hs_employee_salary.*, ue.full_name,ed.dept_name FROM  hs_employee_salary
            INNER JOIN hs_users_employer AS ue ON ue.employee_id = hs_employee_salary.employee_id
            INNER JOIN hs_employer_department AS ed ON ed.dep_id = ue.employee_department
            WHERE ue.employer_id = $this->employer_id AND MONTH(hs_employee_salary.paying_date) = $month_name ";
        }else if (empty($this->input->post('month')) && !empty($this->input->post('year'))  && empty($this->input->post('employee_dept_id'))) {

            $month_name = (!empty($month) ? trim($month) : "''");
            $year_name = (!empty($year) ? trim($year) : "''");
            $query = "SELECT hs_employee_salary.*, ue.full_name,ed.dept_name FROM  hs_employee_salary
            INNER JOIN hs_users_employer AS ue ON ue.employee_id = hs_employee_salary.employee_id
            INNER JOIN hs_employer_department AS ed ON ed.dep_id = ue.employee_department
            WHERE ue.employer_id = $this->employer_id AND YEAR(hs_employee_salary.paying_date) = $year_name";
        }else if (!empty($this->input->post('month')) && !empty($this->input->post('year')) && !empty($this->input->post('employee_dept_id'))) {

            $month_name = (!empty($month) ? trim($month) : "''");
            $year_name = (!empty($year) ? trim($year) : "''");
            $select_dept = (!empty($employee_dept_id) ? trim($employee_dept_id) : "''");
            $query = "SELECT hs_employee_salary.*, ue.full_name,ed.dept_name FROM  hs_employee_salary
            INNER JOIN hs_users_employer AS ue ON ue.employee_id = hs_employee_salary.employee_id
            INNER JOIN hs_employer_department AS ed ON ed.dep_id = ue.employee_department
            WHERE ue.employer_id = $this->employer_id AND hs_employee_salary.employee_dept_id = $employee_dept_id AND MONTH(hs_employee_salary.paying_date) = $month_name AND YEAR(hs_employee_salary.paying_date) = $year_name";
        }else if (empty($this->input->post('month')) && !empty($this->input->post('year')) && !empty($this->input->post('employee_dept_id'))) {
            $month_name = (!empty($month) ? trim($month) : "''");
            $year_name = (!empty($year) ? trim($year) : "''");
            $select_dept = (!empty($employee_dept_id) ? trim($employee_dept_id) : "''");
            $query = "SELECT hs_employee_salary.*, ue.full_name,ed.dept_name FROM  hs_employee_salary
            INNER JOIN hs_users_employer AS ue ON ue.employee_id = hs_employee_salary.employee_id
            INNER JOIN hs_employer_department AS ed ON ed.dep_id = ue.employee_department
            WHERE ue.employer_id = $this->employer_id AND hs_employee_salary.employee_dept_id = $employee_dept_id AND YEAR(hs_employee_salary.paying_date) = $year_name";
        }else if (!empty($this->input->post('month')) && empty($this->input->post('year')) && !empty($this->input->post('employee_dept_id'))) {

            $month_name = (!empty($month) ? trim($month) : "''");
            $year_name = (!empty($year) ? trim($year) : "''");
            $select_dept = (!empty($employee_dept_id) ? trim($employee_dept_id) : "''");
            $query = "SELECT hs_employee_salary.*, ue.full_name,ed.dept_name FROM  hs_employee_salary
            INNER JOIN hs_users_employer AS ue ON ue.employee_id = hs_employee_salary.employee_id
            INNER JOIN hs_employer_department AS ed ON ed.dep_id = ue.employee_department
            WHERE ue.employer_id = $this->employer_id AND hs_employee_salary.employee_dept_id = $employee_dept_id AND MONTH(hs_employee_salary.paying_date) = $month_name";
        }else if (empty($this->input->post('month')) && empty($this->input->post('year')) && !empty($this->input->post('employee_dept_id'))) {

            $month_name = (!empty($month) ? trim($month) : "''");
            $year_name = (!empty($year) ? trim($year) : "''");
            $select_dept = (!empty($employee_dept_id) ? trim($employee_dept_id) : "''");
            $query = "SELECT hs_employee_salary.*, ue.full_name,ed.dept_name FROM  hs_employee_salary
            INNER JOIN hs_users_employer AS ue ON ue.employee_id = hs_employee_salary.employee_id
            INNER JOIN hs_employer_department AS ed ON ed.dep_id = ue.employee_department
            WHERE ue.employer_id = $this->employer_id AND hs_employee_salary.employee_dept_id = $employee_dept_id";
        }else{
            $month_name = "''";
            $year_name = date('Y');
            $query = "SELECT hs_employee_salary.*, ue.full_name,ed.dept_name FROM  hs_employee_salary
            INNER JOIN hs_users_employer AS ue ON ue.employee_id = hs_employee_salary.employee_id
            INNER JOIN hs_employer_department AS ed ON ed.dep_id = ue.employee_department
            WHERE ue.employer_id = $this->employer_id AND YEAR(hs_employee_salary.paying_date) = $year_name";
        }
       
        $data['select_month'] = trim($month_name);
        $data['select_year'] = trim($year_name);
        $data['select_dept'] = trim($select_dept);
         
        $res = $this->Mod_Common->customQuery($query);
        $data['salary_list'] = $res;
        /*echo'<pre>';
        echo $this->db->last_query();
        print_r($res);
        print_r($month_list);
        print_r($year_list);
        echo('</pre>');
        die;*/

        $this->employer_template->load('employer_template','employer/hrms/salary/list', $data); 
    }

    /**
    * Sort Description.
    * function name: getDepartmentUsers  
    * Details: Load view
    * @return: 
    * 
    */
    public function getDepartmentUsers()
    {

        $departmentId= decode($_POST['department_id']);
        $employee_data = $this->Mod_Common->customQuery("select * from  hs_users_employer where employee_department='".$departmentId."' AND employer_id='".$this->employer_id."' AND status = 'Active' order by employee_id DESC");
        $data ='<option value="">Select employee</option>';
        if(count($employee_data) > 0)
        {
            foreach($employee_data as $empVal)
            {
                $data.='<option value="'.encode($empVal->employee_id).'">'.$empVal->first_name.' '.$empVal->last_name.'</option>.';
            }
        }
        echo $data;
    }

    /**
    * Sort Description.
    * function name: add  
    * Details: Load view
    * @return: 
    * 
    */
    public function add(){
       
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Employee Salary";
        $data['page_heading']="Add Salary";
         $data['page_sub_heading']="Add Employee Salary";
         $department_list = $this->Mod_Common->selectData(TABLE_EMPLOYER_DEPARTMENT, array('status'=>'Active','employer_id'=>$this->employer_id));
        if(!empty($department_list)){
            $dept_id = $department_list[0]->dep_id;
            $employee_list = $this->Mod_Common->selectData(TABLE_USERS_EMPLOYER, array('status'=>'Active','employer_id'=>$this->employer_id,'employee_department'=>$dept_id),'employee_id,first_name,last_name');
        }

        $data['departments'] = $department_list;
        $data['employee_list'] = $employee_list;
        $data['dept_id'] = $dept_id;
        $this->employer_template->load('employer_template','employer/hrms/salary/add', $data); 
    }

    /**
    * Sort Description.
    * function name: edit  
    * Details: Load view
    * @return: 
    * 
    */
    public function edit($salary_id){
        
        /*echo'<pre>';
        print_r($salary_id);
        echo'</pre>';
        die;*/
        $salaryId = decode($salary_id);
        $data['header_title']="HRMS";
        $data['page_title_top']="Employee Salary";
        $data['page_heading']="Edit Salary";
        $data['page_sub_heading']="Edit Employee Salary";
        $department_list = $this->Mod_Common->selectData(TABLE_EMPLOYER_DEPARTMENT, array('status'=>'Active','employer_id'=>$this->employer_id));
        if(!empty($department_list)){

            $query = "SELECT hs_employee_salary.*, hs_users_employer.full_name FROM hs_employee_salary, hs_users_employer
            WHERE hs_employee_salary.employer_id = $this->employer_id AND hs_users_employer.employee_id = hs_employee_salary.employee_id AND hs_employee_salary.salary_id = $salaryId
            ";
            $res = $this->Mod_Common->customQuery($query);
            $data['res'] = (!empty($res) ? $res[0] : '');
        }else{
            redirect(base_url('employer/hrms/users/salary'));
        }

        $data['departments'] = (!empty ($department_list) ? $department_list : '');
        $data['dept_key'] = '';
        if(!empty($department_list) && !empty($res)){
            $dept_key = array_search($res[0]->employee_dept_id, array_column($department_list, 'dep_id'));
            $data['dept_key'] =  $dept_key;
        }

        /*echo '<pre>';
        print_r($res);
        var_dump($data['dept_key']);
        print_r($data['departments']);
        echo'</pre>';
        die;*/
        
        $this->employer_template->load('employer_template','employer/hrms/salary/edit', $data); 
    }

    /**
    * Sort Description.
    * function name: updateDepartment  
    * Details: update department record
    * @return: 
    * 
    */
    public function AddSalary(){
        $this->form_validation->set_rules('employee_dept_id', 'Department name','trim|required');
        $this->form_validation->set_rules('employee_id', 'Employee name','trim|required');
        $this->form_validation->set_rules('basic_DA_sal', 'Full Basic Salary + DA','trim|required');
        $this->form_validation->set_rules('HRA', 'HRA','trim|required');
        $this->form_validation->set_rules('Conveyance_sal', 'Conveyance','trim|required');
        $this->form_validation->set_rules('Special_allowance_sal', 'Special Allowance','trim|required');
        $this->form_validation->set_rules('professional_tax', 'Professional Tax','trim|required');
        $this->form_validation->set_rules('current_month_day_worked', 'Days work','trim|required');
        $this->form_validation->set_rules('current_month_LWP', 'LWP','trim|required');
        //$this->form_validation->set_rules('paying_date', 'Paying Date','trim|required');
        $this->form_validation->set_rules('paying_month', 'Paying Month','trim|required');
        $this->form_validation->set_rules('paying_year', 'Paying Year','trim|required');

        if ($this->form_validation->run() == FALSE) 
        {
            $errors = $this->transformErrorsToArray(validation_errors());
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'danger');
            redirect(base_url('employer/hrms/users/salary/add'));
        }
        else
        {
            extract($this->input->post());
            $employeeId = decode($employee_id);
            $employeeDeptId = decode($employee_dept_id);
            /*$month = date('m', strtotime($paying_date));
            $year = date('Y', strtotime($paying_date));*/
            
            //$query = "SELECT * FROM  hs_employee_salary WHERE employee_id = $employeeId AND employer_id = $this->employer_id AND MONTH(paying_date) = $month AND YEAR(paying_date) = $year";
             $query = "SELECT * FROM  hs_employee_salary WHERE employee_id = $employeeId AND employer_id = $this->employer_id AND paying_month = $paying_month AND paying_year = $paying_year";
            $res = $this->Mod_Common->customQuery($query);
           

            if(empty($res)){
                $insertData = array(
                    'employee_id'                   => $employeeId,
                    'employer_id'                   => $this->employer_id,
                    'employee_dept_id'              => trim($employeeDeptId),
                    'basic_DA_sal'                  => trim($basic_DA_sal),
                    'HRA'                           => trim($HRA),
                    'Conveyance_sal'                => trim($Conveyance_sal),
                    'Special_allowance_sal'         => trim($Special_allowance_sal),
                    'current_month_day_worked'      => trim($current_month_day_worked),
                    'current_month_LWP'         => trim($current_month_LWP),
                    'personal_pay'         => trim($personal_pay),
                    'food_allowance'         => trim($food_allowance),
                    'medical_allowance'         => trim($medical_allowance),
                    'telephone_allowance'         => trim($telephone_allowance),
                    'performance_linked_pay'         => trim($performance_linked_pay),
                    'personal_loan_principal'         => trim($personal_loan_principal),
                    'personal_loan_Interest'         => trim($personal_loan_Interest),
                    'professional_tax'              => trim($professional_tax),
                    'paying_date'                   => trim(date('Y-m-d')),
                    'paying_month'                  => trim($paying_month),
                    'paying_year'                   => trim($paying_year),
                    'created_at'                    => date('Y-m-d h:i:s'),
                    'updated_at'                    => date('Y-m-d h:i:s'),
                    );
                $insert_id = $this->Mod_Common->insertData('hs_employee_salary', $insertData);
                if($insert_id){
                    $errors = $this->lang->line('msg_insert_record');
                    $this->session->set_flashdata('error_message', $errors);
                    $this->session->set_flashdata('errorclass', 'success');
                    redirect(base_url('employer/hrms/users/salary'));
                }else{
                    $errors = 'Sorry, please contact to admin!';
                    $this->session->set_flashdata('error_message', $errors);
                    $this->session->set_flashdata('errorclass', 'danger');
                    redirect(base_url('employer/hrms/users/salary/add'));

                }
            }else{
                $errors = "Salary for the selected month has been already created kindly check list";
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'danger');
                redirect(base_url('employer/hrms/users/salary/add'));
            }
                
                
        }
    }

    /**
    * Sort Description.
    * function name: updateDepartment  
    * Details: update department record
    * @return: 
    * 
    */
    public function UpdateSalary($salary_id){
       
        $this->form_validation->set_rules('basic_DA_sal', 'Full Basic Salary + DA','trim|required');
        $this->form_validation->set_rules('HRA', 'HRA','trim|required');
        $this->form_validation->set_rules('Conveyance_sal', 'Conveyance','trim|required');
        $this->form_validation->set_rules('Special_allowance_sal', 'Special Allowance','trim|required');
        $this->form_validation->set_rules('professional_tax', 'Professional Tax','trim|required');
        $this->form_validation->set_rules('current_month_day_worked', 'Days work','trim|required');
        $this->form_validation->set_rules('current_month_LWP', 'LWP','trim|required');

        if ($this->form_validation->run() == FALSE) 
        {
            $errors = $this->transformErrorsToArray(validation_errors());
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'danger');
            redirect(base_url('employer/hrms/users/salary/add'));
        }
        else
        {
            extract($this->input->post());

            // if(empty($res)){
                $UpdateData = array(
                    
                    'basic_DA_sal'                  => trim($basic_DA_sal),
                    'HRA'                           => trim($HRA),
                    'Conveyance_sal'                => trim($Conveyance_sal),
                    'Special_allowance_sal'         => trim($Special_allowance_sal),
                    'current_month_day_worked'      => trim($current_month_day_worked),
                    'current_month_LWP'         => trim($current_month_LWP),
                    'personal_pay'         => trim($personal_pay),
                    'food_allowance'         => trim($food_allowance),
                    'medical_allowance'         => trim($medical_allowance),
                    'telephone_allowance'         => trim($telephone_allowance),
                    'performance_linked_pay'         => trim($performance_linked_pay),
                    'personal_loan_principal'         => trim($personal_loan_principal),
                    'personal_loan_Interest'         => trim($personal_loan_Interest),
                    'professional_tax'              => trim($professional_tax),
                    'updated_at'                    => date('Y-m-d h:i:s'),
                    );

               $this->Mod_Common->updateData('hs_employee_salary', array('salary_id' => decode($salary_id)), $UpdateData);
               
                    $errors = $this->lang->line('msg_updated_record');
                    $this->session->set_flashdata('error_message', $errors);
                    $this->session->set_flashdata('errorclass', 'success');
                    redirect(base_url('employer/hrms/users/salary'));
                  
        }
    }

    /**
    * Sort Description.
    * function name: updateDepartment  
    * Details: update department record
    * @return: 
    * 
    */
    public function SettingPfEsiUpdate(){
        $this->form_validation->set_rules('employee_pf_contribution', 'Employee PF Contribution','trim|required');
        $this->form_validation->set_rules('employer_pf_contribution', 'Employer PF Contribution','trim|required');
        $this->form_validation->set_rules('employee_epf_contribution', 'Employee EPF Contribution','trim|required');
        $this->form_validation->set_rules('employer_epf_contribution', 'Employer EPF Contribution','trim|required');
        $this->form_validation->set_rules('employer_pension_contribution', 'Employer Pension Contribution','trim|required');
        $this->form_validation->set_rules('pf_admin_charges', 'PF Admin Charges','trim|required');
        $this->form_validation->set_rules('EDLI_charges', 'EDLI Charges','trim|required');
        if ($this->form_validation->run() == FALSE) 
        {
            $errors = $this->transformErrorsToArray(validation_errors());
            
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'danger');
            redirect(base_url('employer/compliance-management/SettingPfEsi'));
        }
        else
        {
            extract($this->input->post());
            
            $res = $this->Mod_Common->rowData('hs_employer_PF_ESI_setting', array('employer_id' => $this->employer_id));

            /*echo'<pre>';
            print_r($this->input->post());
            echo $this->db->last_query();
            print_r($res);
            echo'</pre>';
            die;*/

            if(empty($res)){
                $insertData = array(
                    'employer_id'                   => $this->employer_id,
                    'employee_pf_contribution'      => trim($employee_pf_contribution),
                    'employer_pf_contribution'      => trim($employer_pf_contribution),
                    'employee_epf_contribution'     => trim($employee_epf_contribution),
                    'employer_epf_contribution'     => trim($employer_epf_contribution),
                    'employer_pension_contribution' => trim($employer_pension_contribution),
                    'pf_admin_charges'              => trim($pf_admin_charges),
                    'EDLI_charges'                  => trim($EDLI_charges),
                    'created_at'                    => date('Y-m-d h:i:s'),
                    'updated_at'                    => date('Y-m-d h:i:s'),
                    );
                $insert_id = $this->Mod_Common->insertData('hs_employer_PF_ESI_setting', $insertData);
            }else{
                $updateData = array(
                    'employee_pf_contribution'      => trim($employee_pf_contribution),
                    'employer_pf_contribution'      => trim($employer_pf_contribution),
                    'employee_epf_contribution'     => trim($employee_epf_contribution),
                    'employer_epf_contribution'     => trim($employer_epf_contribution),
                    'employer_pension_contribution' => trim($employer_pension_contribution),
                    'pf_admin_charges'              => trim($pf_admin_charges),
                    'EDLI_charges'                  => trim($EDLI_charges),
                    'created_at'                    => date('Y-m-d h:i:s'),
                    'updated_at'                    => date('Y-m-d h:i:s'),
                    );
                $update_id = $this->Mod_Common->updateData('hs_employer_PF_ESI_setting', array('employer_id' => $this->employer_id), $updateData);
            }
                $errors = $this->lang->line('msg_updated_record');
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'success');
                redirect(base_url('employer/compliance-management/SettingPfEsi'));
        }
    }

    /* Get employee working days */

    public function totalWorkingDay(){

        extract($_POST);
        // $year = date('Y', strtotime($paying_date));
        // $month = date('m',strtotime($paying_date));

        $year = $payingYear;
        $month = $payingMonth;
        $paying_date = $payingYear.'-'.$payingMonth.'-01';
       
        $this->employer_id = $this->login_data['userId'];
        $empID = decode($emp_id);
        $query = "SELECT * FROM hs_employee_punching WHERE employer_id = $this->employer_id AND employee_id = '$empID' AND YEAR(punch_in_time) ='$year' AND MONTH(punch_in_time) = '$month' AND manual_log !='Pending' AND punch_status2 = 'OUT' ";
        $working_res = $this->Mod_Common->customQuery($query);
        $count_attendence = 0;
        if(!empty($working_res)){
            $count_attendence = count($working_res);
        }
        

      $leave_approved_que = "SELECT * FROM hs_employee_leave_tracking WHERE employer_id = $this->employer_id AND employee_id = '$empID' AND (YEAR(from_date) ='$year' AND MONTH(from_date) = '$month' OR YEAR(to_date) ='$year' AND MONTH(to_date) = '$month') AND employer_approved_status ='Approved' AND supervisor_approved_status = 'Approved' AND miss_punch_leave = 'No'";
     
      $approv_leave =  monthlyWorkingDay($paying_date,$leave_approved_que);

     //$this->Mod_Common->customQuery($leave_approved_que);

        $holiday_query = "SELECT * FROM hs_employer_holiday WHERE employer_id = $this->employer_id AND YEAR(holiday_date) ='$year' AND MONTH(holiday_date) = '$month' AND status = 'Active'";
        $holiday_query_res = $this->Mod_Common->customQuery($holiday_query);
        $no_holiday = 0;

        if(!empty($holiday_query_res)){
            $no_holiday = count($holiday_query_res);
        }
        

        $totalWorking = array();

        /* Company working days */
        $tot_month_day = cal_days_in_month(CAL_GREGORIAN,$month,$year);
        $total_sunday = total_monthly_sundays($month,$year);

        $total_working = $no_holiday + $count_attendence + $approv_leave + $total_sunday;

       // $company_working_days = $tot_month_day - $total_sunday;
        $company_working_days = $tot_month_day;

        $totalWorking['company_working_days'] = $company_working_days; 
        $totalWorking['total_monthly_days'] = $tot_month_day;
        $totalWorking['monthly_sunday'] = $total_sunday;

       // $totalWorking['company_working_days'] = $company_working_days; 

    /* Get employee salary information and payin calculation */
        $emp_sal_info = $res = getEmployeeInfo($empID,'hs_users_employer','*');
        
        // Basic salary calculation 
        $basic_DA_sal = (!empty($emp_sal_info->sal_basic_sal_da) ? ($emp_sal_info->sal_basic_sal_da/$company_working_days ) * $total_working : 0);
       
        $basic_DA_sal = ($basic_DA_sal > 0 ? (is_decimal($basic_DA_sal) ? number_format($basic_DA_sal, 2, '.', '') : $basic_DA_sal ) : 0);

        $totalWorking['basic_DA_sal'] = round($basic_DA_sal);

        // HRA salary calculation 
        $hra = (!empty($emp_sal_info->sal_hra) ? ($emp_sal_info->sal_hra/$company_working_days ) * $total_working : 0);
        $hra = ($hra > 0 ? (is_decimal($hra) ? number_format($hra, 2, '.', '') : $hra ) : 0);
        $totalWorking['hra'] = round($hra);

        // Full Conveyance sal salary calculation 
        $Conveyance_sal = (!empty($emp_sal_info->sal_full_conveyance) ? ($emp_sal_info->sal_full_conveyance/$company_working_days ) * $total_working : 0);
       
        $Conveyance_sal = ($Conveyance_sal > 0 ? (is_decimal($Conveyance_sal) ? number_format($Conveyance_sal, 2, '.', '') : $Conveyance_sal ) : 0);

        $totalWorking['Conveyance_sal'] = round($Conveyance_sal);

        // other allowance salary calculation 
        $Special_allowance_sal = (!empty($emp_sal_info->sal_other_allowance) ? ($emp_sal_info->sal_other_allowance/$company_working_days ) * $total_working : 0);
       
        $Special_allowance_sal = ($Special_allowance_sal > 0 ? (is_decimal($Special_allowance_sal) ? number_format($Special_allowance_sal, 2, '.', '') : $Conveyance_sal ) : 0);

        $totalWorking['Special_allowance_sal'] = round($Special_allowance_sal);

        // Personal Pay salary calculation 
        $personal_pay = (!empty($emp_sal_info->sal_personal_pay) ? ($emp_sal_info->sal_personal_pay/$company_working_days ) * $total_working : 0);
       
        $personal_pay = ($personal_pay > 0 ? (is_decimal($personal_pay) ? number_format($personal_pay, 2, '.', '') : $personal_pay ) : 0);

        $totalWorking['personal_pay'] = round($personal_pay);

         // Food allowance salary calculation 
        $food_allowance = (!empty($emp_sal_info->sal_food_allowance) ? ($emp_sal_info->sal_food_allowance/$company_working_days ) * $total_working : 0);
       
        $food_allowance = ($food_allowance > 0 ? (is_decimal($food_allowance) ? number_format($food_allowance, 2, '.', '') : $food_allowance ) : 0);
        $totalWorking['food_allowance'] = round($food_allowance);

        // Medical Allowance salary calculation 
        $medical_allowance = (!empty($emp_sal_info->sal_medical_allowance) ? ($emp_sal_info->sal_medical_allowance/$company_working_days ) * $total_working : 0);
       
        $medical_allowance = ($medical_allowance > 0 ? (is_decimal($medical_allowance) ? number_format($medical_allowance, 2, '.', '') : $medical_allowance ) : 0);
        $totalWorking['medical_allowance'] = round($medical_allowance);

        // Telephone Allowance salary calculation 
        $telephone_allowance = (!empty($emp_sal_info->sal_telephone_allowance) ? ($emp_sal_info->sal_telephone_allowance/$company_working_days ) * $total_working : 0);
       
        $telephone_allowance = ($telephone_allowance > 0 ? (is_decimal($telephone_allowance) ? number_format($telephone_allowance, 2, '.', '') : $telephone_allowance ) : 0);

        $totalWorking['telephone_allowance'] = round($telephone_allowance);

        // Performance Linked Pay salary calculation 
        $performance_linked_pay = (!empty($emp_sal_info->sal_performance_link_pay) ? ($emp_sal_info->sal_performance_link_pay/$company_working_days ) * $total_working : 0);
       
        $performance_linked_pay = ($performance_linked_pay > 0 ? (is_decimal($performance_linked_pay) ? number_format($performance_linked_pay, 2, '.', '') : $performance_linked_pay ) : 0);
        $totalWorking['performance_linked_pay'] = round($performance_linked_pay);

        // Personal Loan Amount salary calculation 
        $personal_loan_amount = ($emp_sal_info->sal_personal_loan_amt > 0 ? (is_decimal($emp_sal_info->sal_personal_loan_amt) ? number_format($emp_sal_info->sal_personal_loan_amt, 2, '.', '') : $emp_sal_info->sal_personal_loan_amt ) : 0);
        $totalWorking['personal_loan_amount'] = round($personal_loan_amount);

         // Professional Tax salary calculation 
        $professional_tax = ($emp_sal_info->sal_professional_tax > 0 ? (is_decimal($emp_sal_info->sal_professional_tax) ? number_format($emp_sal_info->sal_professional_tax, 2, '.', '') : $emp_sal_info->sal_professional_tax ) : 0);
        $totalWorking['professional_tax'] = round($professional_tax);
       
       // LWP calculation  
        $absent_days = $company_working_days - $total_working;

        $current_month_LWP = ($absent_days > 0 ? (is_decimal($absent_days) ? number_format($absent_days, 2, '.', '') : $absent_days ) : 0);
        $totalWorking['current_month_LWP'] = round($current_month_LWP);

        // Personal Loan Interest calculation 
       
        $personal_loan_Interest = ($emp_sal_info->sal_personal_loan_interest > 0 ? (is_decimal($emp_sal_info->sal_personal_loan_interest) ? number_format($emp_sal_info->sal_personal_loan_interest, 2, '.', '') : $emp_sal_info->sal_personal_loan_interest ) : 0);
        $totalWorking['personal_loan_Interest'] = round($personal_loan_Interest);
       
    /* End code */
        if(!empty($total_working) && $total_working > 0){
            $totalWorking['working_day'] = $total_working;
            $totalWorking['is_found'] = 'yes';
        }else{
            $totalWorking['working_day'] = '';
            $totalWorking['is_found'] = 'no';
        }

        // echo'<pre>';
        // echo $empID;
        // print_r($emp_sal_info);
        // print_r($totalWorking);
        // echo '</pre>';
        // die;
        echo json_encode($totalWorking);
    }

     /* get employee salary corresponding to employee id*/
     public function getEmployeeSalaryData($emp_ID = ''){
        extract($this->input->post());
        if(!empty($emp_ID)){
            $empID = decode($emp_ID);
            $res = getEmployeeInfo($empID,'hs_users_employer','*');
            // echo'<pre>';
            // print_r($res );
            // echo '</pre>';
            // die;
            echo json_encode($res);

        }else{
            echo'Record not found';
        }
        
     }

}
?>