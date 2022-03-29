<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class LeaveRecord extends MX_Controller  {
 
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
    * function name: leave  
    * Details: view
    * @return: 
    * 
    */
    public function leave(){
        $data['header_title']="HRMS";
        $data['page_title_top']="Leave Records";
        $data['page_heading']="Leave Records";
        $year_name = date('Y');
        $employerID = $this->employer_id;
        $empID = $this->employee_id;
        $get_leave_info = $this->Mod_Common->customQuery("SELECT ah.assign_id, ah.employee_id, ah.department_id, ah.employer_id, ah.leave_cat_id, ah.leave_assign_val, ah.assign_by, ah.created_at, ah.updated_at, leave_type.leave_type_name as leave_cat_name FROM hs_employee_leave_assign_history as ah
        INNER JOIN hs_employer_leave_type_management as leave_type ON leave_type.leave_cat_id = ah.leave_cat_id
        WHERE ah.employer_id = $employerID AND ah.employee_id = $empID AND YEAR(ah.created_at) = $year_name AND leave_type.status = 'Active'");
        $data['get_leave_info'] = $get_leave_info;

        $get_apply_leave_info = $this->Mod_Common->customQuery("SELECT emp_LT.leave_tracking_id, emp_LT.employer_id, emp_LT.employee_id, emp_LT.supervisor_id, emp_LT.supervisor_approved_by_id, emp_LT.leave_assign_history_id, emp_LT.leave_cat_type, emp_LT.leave_val, emp_LT.from_date, emp_LT.to_date, emp_LT.from_date, emp_LT.to_date, emp_LT.no_of_day, emp_LT.leave_reason, emp_LT.employer_approved_status, emp_LT.supervisor_approved_status, emp_LT.status, emp_LT.created_at, emp_LT.updated_at, leave_type.leave_type_name as leave_cat_name FROM hs_employee_leave_tracking as emp_LT
        INNER JOIN hs_employer_leave_type_management as leave_type ON leave_type.leave_cat_id = emp_LT.leave_cat_type
        WHERE emp_LT.employer_id = $employerID AND emp_LT.employee_id = $empID");
        $data['get_apply_leave_info'] = $get_apply_leave_info;

        $this->employee_template->load('employee_template','employee/employee/leave/leave', $data); 
    }

    /**
    * Sort Description.
    * function name: applyLeave  
    * Details: view
    * @return: 
    * 
    */
    public function applyLeave(){
        $data['header_title']="HRMS";
        $data['page_title_top']="Apply Leave";
        $data['page_heading']="Apply Leave";
        $year_name = date('Y');
        $employerID = $this->employer_id;
        $empID = $this->employee_id;

        $get_leave_info = $this->Mod_Common->customQuery("SELECT ah.assign_id, ah.employee_id, ah.department_id, ah.employer_id, ah.leave_cat_id, ah.leave_assign_val, ah.assign_by, ah.created_at, ah.updated_at, leave_type.leave_type_name as leave_cat_name FROM hs_employee_leave_assign_history as ah
        INNER JOIN hs_employer_leave_type_management as leave_type ON leave_type.leave_cat_id = ah.leave_cat_id
        WHERE ah.employer_id = $employerID AND ah.employee_id = $empID AND YEAR(ah.created_at) = $year_name AND leave_type.status = 'Active'");
        $data['get_leave_info'] = $get_leave_info;

        /*echo'<pre>';
        print_r($get_leave_info);
        echo'</pre>';
        die;*/

        $this->employee_template->load('employee_template','employee/employee/leave/apply_leave', $data); 
    }

    /**
    * Sort Description.
    * function name: submityLeave  
    * Details: 
    * @return: 
    * 
    */
    public function submityLeave(){
        $this->form_validation->set_rules('leave_cat_type', 'Leave Type','trim|required');
        $this->form_validation->set_rules('leave_val', 'Days','trim|required');
        /*$this->form_validation->set_rules('from_date', 'From Date','trim|required');
        $this->form_validation->set_rules('to_date', 'To Date','trim|required');*/
         $this->form_validation->set_rules('fromdate_todate', 'Date','trim|required');
        $this->form_validation->set_rules('leave_reason', 'Reason','trim|required');
        $this->form_validation->set_rules('leave_assign_id', 'leave assign value','trim|required');
        extract($this->input->post());
        $employerID = $this->employer_id;
        $empID = $this->employee_id;
       /* echo '<pre>';
        print_r($this->input->post());
        echo'</pre>';*/
       
        $date_arr = explode("-", $fromdate_todate);
        $fromDate = date('Y-m-d', strtotime($date_arr[0]));
        $toDate = date('Y-m-d', strtotime($date_arr[1]));
        $check_duplicate = "SELECT * FROM `hs_employee_leave_tracking` WHERE employer_id = $employerID AND employee_id = $empID AND (from_date BETWEEN '$fromDate' AND '$toDate' AND (employer_approved_status != 'Declined' OR supervisor_approved_status !='Declined')) ";
        $duplicate_res = $this->Mod_Common->customQuery($check_duplicate);
          
          /*echo '<pre>';
          print_r($duplicate_res);
        print_r($this->input->post());
        echo'</pre>';*/
         
        if(!empty($duplicate_res)){
            $errors = 'Leave record of this date already available, please choose another date OR check your applied leave records';
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'danger');
            if(!empty($this->input->post('punch_id'))){
                redirect(base_url('employee/employee/apply_leave_regularization/').encode($punching_info->punching_id));
            }else{
                redirect(base_url('employee/employee/apply_leave'));
            }
        }
       
        if(!empty($this->input->post('punch_id'))){
            $punchid = decode($this->input->post('punch_id'));
            $punching_info = $this->Mod_Common->rowData('hs_employee_punching', array('punching_id' => $punchid));
        }

        if($this->form_validation->run() == FALSE) 
        {
            $errors = $this->transformErrorsToArray(validation_errors());
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'danger');
            if(!empty($this->input->post('punch_id'))){
                redirect(base_url('employee/employee/apply_leave_regularization/').encode($punching_info->punching_id));
            }else{
                redirect(base_url('employee/employee/apply_leave'));
            }
        }
        else
        {

        $this->form_validation->set_rules('leave_val', 'Total Leave','trim|required|numeric');
       /* echo'<pre>';
        print_r($this->input->post());
        $punchid = '';
        echo'</pre>';
        die;*/

            
           /* $fromDate = strtotime($from_date);
            $toDate = strtotime($to_date);*/
           /* echo 'date44444444 = '.$fromdate_todate;*/
          
            
            
            /*echo date('Y-m-d', strtotime($fromDate));*/

           /* if($fromDate > $toDate){
                $errors = 'Sorry, To date can not be less then from date';
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'danger');
                redirect(base_url('employee/employee/apply_leave'));
            }*/

            // Calculating the difference in timestamps

            //date('Y-m-d', strtotime($from_date)),
            $diff = strtotime($fromDate) - strtotime($toDate);
            
            // 1 day = 24 hours
            // 24 * 60 * 60 = 86400 seconds
            $applied_days =  abs(round($diff / 86400));
            $applied_days = $applied_days + 1;

            $leaveVal = decode($leave_val);

            if($leaveVal == 'Half'){
                $applied_days = $applied_days/2;
            }

            $year_name = date('Y');
           
            $leave_cat_id = decode($leave_cat_type);
            $cat_leave_info = $this->Mod_Common->customQuery("SELECT * FROM hs_employee_leave_assign_history 
            WHERE employer_id = $employerID AND employee_id = $empID AND leave_cat_id = $leave_cat_id AND YEAR(created_at) = $year_name LIMIT 1");
            $catleaveinfo =  $cat_leave_info[0];
            
            

            /* echo $catleaveinfo->leave_assign_val .'= '. $applied_days;
             var_dump((float)$catleaveinfo->leave_assign_val);
             var_dump((float)$applied_days);
             die;*/
            // die;
            if(!empty($catleaveinfo) && (float)$catleaveinfo->leave_assign_val < (float)$applied_days){
                $errors = 'Insufficient selected leave type balance please check your account.';
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'danger');
                if(!empty($this->input->post('punch_id'))){
                    redirect(base_url('employee/employee/apply_leave_regularization/').encode($punching_info->punching_id));
                }else{
                    redirect(base_url('employee/employee/apply_leave'));
                }
            }

            
            $cust_query = "SELECT em.employee_id, em.employer_id, em.employee_department, em.full_name as employee_name, dph.employee_id as dept_head_id FROM hs_users_employer as em
            INNER JOIN hs_employer_department_head as dph ON dph.dep_id = em.employee_department
            WHERE em.employee_id = $empID AND em.employer_id = $employerID
            ";

            $res = $this->Mod_Common->customQuery($cust_query);
            
            if(empty($res[0]->dept_head_id)){
                $errors = "Sorry, you don't have any head of department Please contact to your company support";
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'danger');
                if(!empty($this->input->post('punch_id'))){
                    redirect(base_url('employee/employee/apply_leave_regularization/').encode($punching_info->punching_id));
                }else{
                    redirect(base_url('employee/employee/apply_leave'));
                }
            }

           
            $deptHeadId = $res[0]->dept_head_id;
            $leaveAssignHistoryId = decode($leave_assign_id);

            $addedData = array(
                    'employer_id'       => $employerID,
                    'employee_id'       => $empID,
                    'supervisor_id'     => trim($deptHeadId),
                    'leave_assign_history_id' => trim($leaveAssignHistoryId),
                    'leave_cat_type'    => $leave_cat_id,
                    'leave_val'         => $leaveVal,
                    'from_date'      => date('Y-m-d', strtotime($fromDate)),
                    'to_date'      => date('Y-m-d', strtotime($toDate)),
                    'no_of_day' => $applied_days,
                    'leave_reason'  => trim($leave_reason),
                    'employer_approved_status' => 'Pending',
                    'supervisor_approved_status' => 'Pending',
                    'created_at'      => date('Y-m-d h:i:s'),
                    'updated_at'      => date('Y-m-d h:i:s'),
                    );

            if(!empty($this->input->post('punch_id')))
            {
                $addedData['miss_punch_leave'] = 'Yes';
                $addedData['punching_id'] = decode($this->input->post('punch_id'));

                $punchID = decode($this->input->post('punch_id'));
                $updateData1 = array('manual_log' =>'Pending');
                $upWhere1 = array('punching_id' =>$punchID);
                $update_status1 = $this->Mod_Common->updateDataFromTabel('hs_employee_punching', $updateData1, $upWhere1);
            }

           /* echo'<pre>';
            print_r($addedData);
            echo'</pre>';
            die;*/
            $tag_id = $this->Mod_Common->insertData(TABLE_LEAVE_TRACKING, $addedData);
            if(!empty($this->input->post('punch_id'))){
                $punch_id = decode($this->input->post('punch_id'));
                $updateData1 = array('manual_log' =>'Pending');
                        $upWhere1 = array('punching_id' =>$punch_id);
                        $update_status1 = $this->Mod_Common->updateDataFromTabel('hs_employee_punching', $updateData1, $upWhere1);
            }
            if($tag_id){
                $errors = 'Record added successfully';
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'success');
                if(!empty($this->input->post('punch_id'))){
                    redirect(base_url('employee/employee/apply_leave_regularization/').encode($punching_info->punching_id));
                }else{
                    redirect(base_url('employee/employee/leave'));
                }
            }else{
                $errors = 'Record not insert something is wrong';
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'danger');
                if(!empty($this->input->post('punch_id'))){
                    redirect(base_url('employee/employee/apply_leave_regularization/').encode($punching_info->punching_id));
                }else{
                    redirect(base_url('employee/employee/apply_leave'));
                }
            }
        }
    }
}
?>