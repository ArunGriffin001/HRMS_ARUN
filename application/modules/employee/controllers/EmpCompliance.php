<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class EmpCompliance extends MX_Controller  {
 
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
        $data['page_title_top']="Compliance Management";
        $data['page_heading']="Compliance Management";
        $data['page_sub_heading']="Compliance Management List";

        $query = "SELECT hs_employee_salary.*, ue.full_name,ed.dept_name FROM  hs_employee_salary
            INNER JOIN hs_users_employer AS ue ON ue.employee_id = hs_employee_salary.employee_id
            INNER JOIN hs_employer_department AS ed ON ed.dep_id = ue.employee_department
            WHERE hs_employee_salary.employer_id = $this->employer_id AND hs_employee_salary.employee_id = $this->employee_id ";

        $res = $this->Mod_Common->customQuery($query);
        $setting_val = $this->Mod_Common->rowData('hs_employer_PF_ESI_setting'); 
        $cal_list = array();
        if(!empty($res) && !empty($setting_val)){
            foreach ($res as $key => $res_val) {
                $cal_list[$key]['emp_name'] = $res_val->full_name;
                $cal_list[$key]['dept_name'] = $res_val->dept_name;
                $cal_list[$key]['basic_DA_sal'] = $res_val->basic_DA_sal;
                $cal_list[$key]['type'] = 'PF';
                $employee_share = ($res_val->basic_DA_sal * $setting_val->employee_pf_contribution)/100;
                $employee_share = ($employee_share > 0 ? (is_decimal($employee_share) ? number_format($employee_share, 2, '.', '') : $employee_share ) : 0);
                $cal_list[$key]['employee_share'] = round($employee_share);

                $employer_share = ($res_val->basic_DA_sal * $setting_val->employer_pf_contribution)/100;
                $employer_share = ($employer_share > 0 ? (is_decimal($employer_share) ? number_format($employer_share, 2, '.', '') : $employer_share ) : 0);
                $cal_list[$key]['employer_share'] = round($employer_share);

                $employer_pen_contribution = ($res_val->basic_DA_sal * $setting_val->employer_pension_contribution)/100;
                $employer_pen_contribution = ($employer_pen_contribution > 0 ? (is_decimal($employer_pen_contribution) ? number_format($employer_pen_contribution, 2, '.', '') : $employer_pen_contribution ) : 0);
                $cal_list[$key]['employer_pen_contribution'] = round($employer_pen_contribution);

                $admin_pf_charges = ($res_val->basic_DA_sal * $setting_val->pf_admin_charges)/100;
                $admin_pf_charges = ($admin_pf_charges > 0 ? (is_decimal($admin_pf_charges) ? number_format($admin_pf_charges, 2, '.', '') : $admin_pf_charges ) : 0);
                $cal_list[$key]['admin_pf_charges'] = round($admin_pf_charges);

                $admin_EDLI_charges = ($res_val->basic_DA_sal * $setting_val->EDLI_charges)/100;
                $admin_EDLI_charges = ($admin_EDLI_charges > 0 ? (is_decimal($admin_EDLI_charges) ? number_format($admin_EDLI_charges, 2, '.', '') : $admin_EDLI_charges ) : 0);
                $cal_list[$key]['admin_EDLI_charges'] = round($admin_EDLI_charges);

                $cal_list[$key]['paying_date'] = date('Y-m-d', strtotime($res_val->paying_date));
                $cal_list[$key]['sal_ID'] = $res_val->salary_id;
                $cal_list[$key]['paying_month'] = $res_val->paying_month;
                $cal_list[$key]['paying_year'] = $res_val->paying_year;
            }
        }
        $data['cal_list'] =$cal_list;
        $this->employer_template->load('employee_template','employee/employee/compliance-management/list', $data); 
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
        $data['page_title_top']="Pay slist";
        $data['page_heading']="Pay slist";
        $data['page_sub_heading']="Pay slist";
        $conpany_info = $this->Mod_Common->rowData('hs_users', array('id'=>$this->employer_id),'company_name');
        
        $sal_id = decode($pay_sal_id);
        $query = "SELECT hs_employee_salary.*, ue.employee_id, ue.full_name,ue.joining_date,ed.dept_name, ue.employee_type, ue.fund_type, ue.bank_account_number, ue.IFSC_code, ue.bank_name_address,ue.branch_name, ue.country_id, ue.state_id, ue.city_id, emp_des.name as emp_desi_name,ue.UAN_number  FROM  hs_employee_salary
            INNER JOIN hs_users_employer AS ue ON ue.employee_id = hs_employee_salary.employee_id
            INNER JOIN hs_employer_department AS ed ON ed.dep_id = ue.employee_department
            INNER JOIN hs_employer_desination AS emp_des ON emp_des.id = ue.employee_designation
            WHERE ue.employer_id = $this->employer_id AND hs_employee_salary.employee_id = $this->employee_id AND hs_employee_salary.salary_id = $sal_id";


        $res = $this->Mod_Common->customQuery($query);
        $setting_val = $this->Mod_Common->rowData('hs_employer_PF_ESI_setting'); 
        $cal_list = array();
        $res_val = $res[0];
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
            $cal_list['employee_share'] = ($res_val->basic_DA_sal * $setting_val->employee_pf_contribution)/100;
            $cal_list['employer_share'] = ($res_val->basic_DA_sal * $setting_val->employer_pf_contribution)/100;
            $cal_list['employer_pen_contribution'] = ($res_val->basic_DA_sal * $setting_val->employer_pension_contribution)/100;
            $cal_list['admin_pf_charges'] = ($res_val->basic_DA_sal * $setting_val->pf_admin_charges)/100;
            $cal_list['admin_EDLI_charges'] = ($res_val->basic_DA_sal * $setting_val->EDLI_charges)/100;
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

            $cal_list['professional_tax'] = $res_val->professional_tax;
            $cal_list['sal_id'] = $res_val->salary_id;
            $cal_list['emp_id'] = $res_val->employee_id;
            $cal_list['joining_date'] = $res_val->joining_date;
            $cal_list['paying_month'] = $res_val->paying_month;
            $cal_list['paying_year'] = $res_val->paying_year;
        }
        
        $data['cal_list'] = $cal_list;
       /* echo'<pre>';
        echo $this->db->last_query();
        print_r($cal_list);
        echo('</pre>');
        die;*/
        $this->employer_template->load('employee_template','employee/employee/compliance-management/payslip', $data); 
    }

    /**
    * Sort Description.
    * function name: empAnnexureCTC  
    * Details: Load view
    * @return: 
    * 
    */
    public function empAnnexureCTC(){

        $employer_id =$this->employee_id;
        $data['header_title']="HRMS";
        $data['page_title_top']="Annexure";
        $data['page_heading']="Annexure";
        
        
        $res = $this->Mod_Common->rowData('hs_users_employer', array('employee_id'=>$employer_id, 'employer_id'=>$this->employer_id));
        $data['res'] = $res;

        // Employee deduction info
        $setting_val = $this->Mod_Common->rowData('hs_employer_PF_ESI_setting', array('employer_id'=>$this->employer_id));
         $data['res']->esic_employee_charges = $setting_val->esic_employee_charges;

        $data['res']->esic_employer_charges = $setting_val->esic_employer_charges;


        if(!empty($res->voluntary_pf)){
            $employee_share =  ($res->sal_basic_sal_da * $res->voluntary_pf)/100;
            $data['res']->employee_share = round($employee_share);
        }else{
            $employee_share =  ($res->sal_basic_sal_da * $setting_val->employee_pf_contribution)/100;
            $data['res']->employee_share = round($employee_share);
        }

        $employer_share =  ($res->sal_basic_sal_da * $setting_val->employer_pf_contribution)/100;
        $data['res']->employer_share = round($employer_share);


        $employer_pen_contribution =  ($res->sal_basic_sal_da * $setting_val->employer_pension_contribution)/100;
        $data['res']->employer_pen_contribution = round($employer_pen_contribution);


        $pf_admin_charges =  ($res->sal_basic_sal_da * $setting_val->pf_admin_charges)/100;
        $data['res']->admin_pf_charges = round($pf_admin_charges);

        $admin_EDLI_charges =  ($res->sal_basic_sal_da * $setting_val->EDLI_charges)/100;
        $data['res']->admin_EDLI_charges = round($admin_EDLI_charges);
        $data['page_sub_heading']="Employee Name: ".$res->first_name.' '.$res->last_name;
        
        $this->employer_template->load('employee_template','employee/payroll/annexure/list', $data);
    }

}
?>