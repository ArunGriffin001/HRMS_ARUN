<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class ComplianceManagement extends MX_Controller  {
 
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
        $data['page_title_top']="Compliance Management";
        $data['page_heading']="Compliance Management";
        $data['page_sub_heading']="Compliance Management List";


        //$year_list = array();
        $month_list = array('January'=>'1', 'February'=>'2', 'March'=>'3', 'April'=>'4','May'=>'5','June'=>'6','July'=>'7','August'=>'8','September'=>'9','October'=>'10','November'=>'11', 'December'=>'12');

        $year_list = $this->Mod_Common->customQuery("SELECT DISTINCT(YEAR(paying_date)) as year_name FROM hs_employee_salary WHERE employer_id = $this->employer_id ORDER BY YEAR(paying_date) DESC");

        $data['month_list'] = $month_list;
        $data['year_list'] = $year_list;
        $month_name = '';
        $year_name = '';
        extract($this->input->post());
        if(!empty($this->input->post('month')) && !empty($this->input->post('year'))){
            
            $month_name = (!empty($month) ? trim($month) : "''");
            $year_name = (!empty($year) ? trim($year) : "''");
            $query = "SELECT hs_employee_salary.*, ue.full_name,ed.dept_name FROM  hs_employee_salary
            INNER JOIN hs_users_employer AS ue ON ue.employee_id = hs_employee_salary.employee_id
            INNER JOIN hs_employer_department AS ed ON ed.dep_id = ue.employee_department
            WHERE ue.employer_id = $this->employer_id AND MONTH(hs_employee_salary.paying_date) = $month_name AND YEAR(hs_employee_salary.paying_date) = $year_name";
        }else if (!empty($this->input->post('month')) && empty($this->input->post('year'))) {

            $month_name = (!empty($month) ? trim($month) : "''");
            $year_name = (!empty($year) ? trim($year) : "''");
            $query = "SELECT hs_employee_salary.*, ue.full_name,ed.dept_name FROM  hs_employee_salary
            INNER JOIN hs_users_employer AS ue ON ue.employee_id = hs_employee_salary.employee_id
            INNER JOIN hs_employer_department AS ed ON ed.dep_id = ue.employee_department
            WHERE ue.employer_id = $this->employer_id AND MONTH(hs_employee_salary.paying_date) = $month_name ";
        }else if (empty($this->input->post('month')) && !empty($this->input->post('year'))) {

            $month_name = (!empty($month) ? trim($month) : "''");
            $year_name = (!empty($year) ? trim($year) : "''");
             $query = "SELECT hs_employee_salary.*, ue.full_name,ed.dept_name FROM  hs_employee_salary
            INNER JOIN hs_users_employer AS ue ON ue.employee_id = hs_employee_salary.employee_id
            INNER JOIN hs_employer_department AS ed ON ed.dep_id = ue.employee_department
            WHERE ue.employer_id = $this->employer_id AND YEAR(hs_employee_salary.paying_date) = $year_name";
        }else{
            $month_name = "''";
            $year_name = date('Y');
            $query = "SELECT hs_employee_salary.*, ue.full_name,ed.dept_name FROM  hs_employee_salary
            INNER JOIN hs_users_employer AS ue ON ue.employee_id = hs_employee_salary.employee_id
            INNER JOIN hs_employer_department AS ed ON ed.dep_id = ue.employee_department
            WHERE ue.employer_id = $this->employer_id AND YEAR(hs_employee_salary.paying_date) = $year_name";
        }

        $res = $this->Mod_Common->customQuery($query);
        $setting_val = $this->Mod_Common->rowData('hs_employer_PF_ESI_setting'); 
        $cal_list = array();
        if(!empty($res) && !empty($setting_val)){
            foreach ($res as $key => $res_val) {
                $cal_list[$key]['emp_name'] = $res_val->full_name;
                $cal_list[$key]['dept_name'] = $res_val->dept_name;
                $cal_list[$key]['basic_DA_sal'] = $res_val->basic_DA_sal;
                $cal_list[$key]['HRA'] = $res_val->HRA;
                $cal_list[$key]['type'] = 'PF';

                $employee_share = ($res_val->basic_DA_sal * $setting_val->employee_pf_contribution)/100;

                $cal_list[$key]['employee_share'] = round($employee_share);

                $employer_share = ($res_val->basic_DA_sal * $setting_val->employer_pf_contribution)/100;
                $cal_list[$key]['employer_share'] = round($employer_share);

                $employer_pen_contribution = ($res_val->basic_DA_sal * $setting_val->employer_pension_contribution)/100;
                $cal_list[$key]['employer_pen_contribution'] = round($employer_pen_contribution);

                $admin_pf_charges = ($res_val->basic_DA_sal * $setting_val->pf_admin_charges)/100;
                $cal_list[$key]['admin_pf_charges'] = round($admin_pf_charges);

                $admin_EDLI_charges = ($res_val->basic_DA_sal * $setting_val->EDLI_charges)/100;
                $cal_list[$key]['admin_EDLI_charges'] = round($admin_EDLI_charges);

                $cal_list[$key]['paying_date'] = date('Y-m-d', strtotime($res_val->paying_date));
                $cal_list[$key]['paying_month'] = $res_val->paying_month;
                $cal_list[$key]['paying_year'] = $res_val->paying_year;
                $cal_list[$key]['sal_ID'] = $res_val->salary_id;
            }
        }

        $data['select_month'] = trim($month_name);
        $data['select_year'] = trim($year_name);
        $data['cal_list'] =$cal_list;
        
        /*echo'<pre>';
        print_r($res);
        echo'</pre>';
        die;*/

        $this->employer_template->load('employer_template','employer/compliance_management/list', $data); 
    }

    /**
    * Sort Description.
    * function name: getEmpPayList  
    * Details: Load view
    * @return: 
    * 
    */
    public function getEmpPayList(){
       
        $data['header_title']="HRMS ";
        $data['page_title_top']="Pay";
        $data['page_heading']="Pay";
        $data['page_sub_heading']="Pay List";


        //$year_list = array();
        $month_list = array('January'=>'1', 'February'=>'2', 'March'=>'3', 'April'=>'4','May'=>'5','June'=>'6','July'=>'7','August'=>'8','September'=>'9','October'=>'10','November'=>'11', 'December'=>'12');

        $year_list = $this->Mod_Common->customQuery("SELECT DISTINCT(YEAR(paying_date)) as year_name FROM hs_employee_salary WHERE employer_id = $this->employer_id ORDER BY YEAR(paying_date) DESC");

        $data['month_list'] = $month_list;
        $data['year_list'] = $year_list;
        $month_name = '';
        $year_name = '';
        extract($this->input->post());
        if(!empty($this->input->post('month')) && !empty($this->input->post('year'))){
            
            $month_name = (!empty($month) ? trim($month) : "''");
            $year_name = (!empty($year) ? trim($year) : "''");
            $query = "SELECT hs_employee_salary.*, ue.full_name,ed.dept_name FROM  hs_employee_salary
            INNER JOIN hs_users_employer AS ue ON ue.employee_id = hs_employee_salary.employee_id
            INNER JOIN hs_employer_department AS ed ON ed.dep_id = ue.employee_department
            WHERE ue.employer_id = $this->employer_id AND MONTH(hs_employee_salary.paying_date) = $month_name AND YEAR(hs_employee_salary.paying_date) = $year_name";
        }else if (!empty($this->input->post('month')) && empty($this->input->post('year'))) {

            $month_name = (!empty($month) ? trim($month) : "''");
            $year_name = (!empty($year) ? trim($year) : "''");
            $query = "SELECT hs_employee_salary.*, ue.full_name,ed.dept_name FROM  hs_employee_salary
            INNER JOIN hs_users_employer AS ue ON ue.employee_id = hs_employee_salary.employee_id
            INNER JOIN hs_employer_department AS ed ON ed.dep_id = ue.employee_department
            WHERE ue.employer_id = $this->employer_id AND MONTH(hs_employee_salary.paying_date) = $month_name ";
        }else if (empty($this->input->post('month')) && !empty($this->input->post('year'))) {

            $month_name = (!empty($month) ? trim($month) : "''");
            $year_name = (!empty($year) ? trim($year) : "''");
             $query = "SELECT hs_employee_salary.*, ue.full_name,ed.dept_name FROM  hs_employee_salary
            INNER JOIN hs_users_employer AS ue ON ue.employee_id = hs_employee_salary.employee_id
            INNER JOIN hs_employer_department AS ed ON ed.dep_id = ue.employee_department
            WHERE ue.employer_id = $this->employer_id AND YEAR(hs_employee_salary.paying_date) = $year_name";
        }else{
            $month_name = "''";
            $year_name = date('Y');
            $query = "SELECT hs_employee_salary.*, ue.full_name,ed.dept_name FROM  hs_employee_salary
            INNER JOIN hs_users_employer AS ue ON ue.employee_id = hs_employee_salary.employee_id
            INNER JOIN hs_employer_department AS ed ON ed.dep_id = ue.employee_department
            WHERE ue.employer_id = $this->employer_id AND YEAR(hs_employee_salary.paying_date) = $year_name";
        }

        $res = $this->Mod_Common->customQuery($query);
        $setting_val = $this->Mod_Common->rowData('hs_employer_PF_ESI_setting'); 
        $cal_list = array();
        if(!empty($res) && !empty($setting_val)){
            foreach ($res as $key => $res_val) {
                $cal_list[$key]['emp_name'] = $res_val->full_name;
                $cal_list[$key]['dept_name'] = $res_val->dept_name;
                $cal_list[$key]['basic_DA_sal'] = $res_val->basic_DA_sal;
                $cal_list[$key]['HRA'] = $res_val->HRA;
                $cal_list[$key]['type'] = 'PF';
                $cal_list[$key]['employee_share'] = ($res_val->basic_DA_sal * $setting_val->employee_pf_contribution)/100;
                $cal_list[$key]['employer_share'] = ($res_val->basic_DA_sal * $setting_val->employer_pf_contribution)/100;
                $cal_list[$key]['employer_pen_contribution'] = ($res_val->basic_DA_sal * $setting_val->employer_pension_contribution)/100;
                $cal_list[$key]['admin_pf_charges'] = ($res_val->basic_DA_sal * $setting_val->pf_admin_charges)/100;
                $cal_list[$key]['admin_EDLI_charges'] = ($res_val->basic_DA_sal * $setting_val->EDLI_charges)/100;
                $cal_list[$key]['paying_date'] = date('Y-m-d', strtotime($res_val->paying_date));
                $cal_list[$key]['sal_ID'] = $res_val->salary_id;
            }
        }

        $data['select_month'] = trim($month_name);
        $data['select_year'] = trim($year_name);
        $data['cal_list'] =$cal_list;
        
        /*echo'<pre>';
        print_r($res);
        echo'</pre>';
        die;*/

        $this->employer_template->load('employer_template','employer/compliance_management/list', $data); 
    }


    /**
    * Sort Description.
    * function name: getList  
    * Details: Load view
    * @return: 
    * 
    */
    public function payList($pay_sal_id){
       
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Pay slip";
        $data['page_heading']="Pay slip";
        $data['page_sub_heading']="Pay slip";
        $conpany_info = $this->Mod_Common->rowData('hs_users', array('id'=>$this->employer_id),'company_name');
        

        //$year_list = array();
        $sal_id = decode($pay_sal_id);
        $query = "SELECT hs_employee_salary.*, ue.employee_id, ue.full_name,ue.joining_date,ed.dept_name, ue.employee_type, ue.fund_type, ue.bank_account_number, ue.IFSC_code, ue.bank_name_address,ue.branch_name, ue.country_id, ue.state_id, ue.city_id, emp_des.name as emp_desi_name,ue.UAN_number  FROM  hs_employee_salary
            INNER JOIN hs_users_employer AS ue ON ue.employee_id = hs_employee_salary.employee_id
            INNER JOIN hs_employer_department AS ed ON ed.dep_id = ue.employee_department
            INNER JOIN hs_employer_desination AS emp_des ON emp_des.id = ue.employee_designation
            WHERE ue.employer_id = $this->employer_id AND hs_employee_salary.salary_id = $sal_id";
        $res = $this->Mod_Common->customQuery($query);
        $setting_val = $this->Mod_Common->rowData('hs_employer_PF_ESI_setting'); 
        $cal_list = array();
        $res_val = $res[0];
        /*echo'<pre>';
        print_r($res_val);
        echo'</pre>';
        die;*/

        if(!empty($res) && !empty($setting_val)){
                $company_code = 'ABC';
                if(!empty($conpany_info) && !empty($res_val->employee_id)){
                   $company_code = EmployerCode($conpany_info->company_name, $res_val->employee_id);
                }

                $cal_list['emp_name'] = $res_val->full_name;
                $cal_list['dept_name'] = $res_val->dept_name;
                $cal_list['emp_desi_name'] = $res_val->emp_desi_name;
                $cal_list['employee_id'] = $res_val->employee_id;
                $cal_list['company_code'] = $company_code;
                $cal_list['UAN_number'] = $res_val->UAN_number;
                $cal_list['basic_DA_sal'] = $res_val->basic_DA_sal;
                $cal_list['HRA'] = $res_val->HRA;
                $cal_list['country_id'] = $res_val->country_id;
                $cal_list['state_id'] = $res_val->state_id;
                $cal_list['city_id'] = $res_val->city_id;
                $cal_list['bank_account_number'] = $res_val->bank_account_number;
                $cal_list['IFSC_code'] = $res_val->IFSC_code;
                $cal_list['bank_name_address'] = $res_val->bank_name_address;
                $cal_list['branch_name'] = $res_val->branch_name;
                $cal_list['employee_type'] = $res_val->employee_type;
                $cal_list['type'] = $res_val->fund_type;

                $employee_share = ($res_val->basic_DA_sal * $setting_val->employee_pf_contribution)/100;
                $cal_list['employee_share'] = round($employee_share);

                $employer_share = ($res_val->basic_DA_sal * $setting_val->employer_pf_contribution)/100;

                $cal_list['employer_share'] = round($employer_share);

                $employer_pen_contribution = ($res_val->basic_DA_sal * $setting_val->employer_pension_contribution)/100;
                $cal_list['employer_pen_contribution'] = round($employer_pen_contribution);

                $admin_pf_charges = ($res_val->basic_DA_sal * $setting_val->pf_admin_charges)/100;
                $cal_list['admin_pf_charges'] = round($admin_pf_charges);

                $admin_EDLI_charges = ($res_val->basic_DA_sal * $setting_val->EDLI_charges)/100;
                $cal_list['admin_EDLI_charges'] = round($admin_EDLI_charges);

                $cal_list['paying_date'] = date('Y-m-d', strtotime($res_val->paying_date));

                $cal_list['Conveyance_sal'] = $res_val->Conveyance_sal;
                $cal_list['Special_allowance_sal'] = $res_val->Special_allowance_sal;

                $cal_list['current_month_day_worked'] = $res_val->current_month_day_worked;
                $cal_list['current_month_LWP'] = $res_val->current_month_LWP;
                $cal_list['personal_pay'] = $res_val->personal_pay;
                $cal_list['food_allowance'] = $res_val->food_allowance;
                $cal_list['medical_allowance'] = $res_val->medical_allowance;
                $cal_list['telephone_allowance'] = $res_val->telephone_allowance;
                $cal_list['performance_linked_pay'] = $res_val->performance_linked_pay;
                $cal_list['personal_loan_principal'] = $res_val->personal_loan_principal;
                $cal_list['personal_loan_Interest'] = $res_val->personal_loan_Interest;

                $cal_list['professional_tax'] = $res_val->professional_tax;
                $cal_list['sal_id'] = $res_val->salary_id;
                $cal_list['emp_id'] = $res_val->employee_id;
                $cal_list['joining_date'] = $res_val->joining_date;
                $cal_list['paying_year'] = $res_val->paying_year;
                $cal_list['paying_month'] = $res_val->paying_month;
        }
        
        $data['cal_list'] = $cal_list;
        // echo'<pre>';
        // echo $this->db->last_query();
        // print_r($data['cal_list']);
        // echo('</pre>');
        // die;
        $this->employer_template->load('employer_template','employer/compliance_management/payslip', $data); 
    }

    /**
    * Sort Description.
    * function name: SettingPfEsi  
    * Details: Load view
    * @return: 
    * 
    */
    public function SettingPfEsi(){
        $data['header_title']="HRMS";
        $data['page_title_top']="PF & ESI Calculation Setting";
        $data['page_heading']="PF & ESI Calculation Setting";
         $data['page_sub_heading']="PF & ESI Calculation Setting";
         
        $res = $this->Mod_Common->rowData('hs_employer_PF_ESI_setting', array('employer_id' => $this->employer_id));
        // echo $this->db->last_query();
        // die;
       
        $data['res'] = (!empty($res) ? $res : '');
        $this->employer_template->load('employer_template','employer/compliance_management/setting_pf_esi', $data); 
    }

     /**
    * Sort Description.
    * function name: UpdateSettingPfEsi  
    * Details: Load view
    * @return: 
    * 
    */
    public function UpdateSettingPfEsi(){
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Setting";
        $data['page_heading']="Setting";
        $data['page_sub_heading']="Setting";

        $this->employer_template->load('employer_template','employer/compliance_management/setting_PF_Esi', $data); 
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
        $this->form_validation->set_rules('esic_employee_charges', 'ESIC Employee Charges','trim|required');
        $this->form_validation->set_rules('esic_employer_charges', 'ESIC Employer Charges','trim|required');
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
                    'esic_employer_charges'         => trim($esic_employer_charges),
                    'esic_employee_charges'         => trim($esic_employee_charges),
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
                    'esic_employer_charges'         => trim($esic_employer_charges),
                    'esic_employee_charges'         => trim($esic_employee_charges),
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

}
?>