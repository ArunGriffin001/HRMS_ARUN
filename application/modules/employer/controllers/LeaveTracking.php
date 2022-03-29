<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class LeaveTracking extends MX_Controller  {
 
    var $data = array(); 

    /** All users login there **/
    public function __construct(){
        parent::__construct();
        $this->isAuthenticated('EmployerLoginDetails',base_url('sign-in'));
        $this->login_data = $this->session->userdata('EmployerLoginDetails');
        $this->employer_id = $this->login_data['userId'];
        $this->load->model('LeaveTracking_model');
        $this->load->model('LeaveAssign_model');
        
    } 


    /**
    * Sort Description.
    * function name: list  
    * Details: Load view
    * @return: 
    * 
    */
    public function list(){
        $data['header_title']="HRMS";
        $data['page_title_top']="Leave Tracking";
        $data['page_heading']="Leave Tracking";
        $data['page_sub_heading']="Leave Tracking List";

        $employer_id = $this->employer_id;

        $pending = 0;
        $decline = 0;
        $approved = 0;
        $res = $this->Mod_Common->customQuery("SELECT *  FROM hs_employee_leave_tracking WHERE employer_id = $employer_id");
        if(!empty($res)){
            $total_req = count($res);
            foreach ($res as $key => $res_val) {
                if($res_val->status == 'Pending'){
                    $pending = $pending + 1;
                }else if($res_val->status == 'Approved'){
                    $approved = $approved + 1;
                }else{
                    $decline = $decline + 1;
                }
            }
        }
        /*echo'<pre>';
        print_r($total_req);
        print_r($pending);
        print_r($approved);
        print_r($decline);
        echo'</pre>';
        die;*/
        $data['total_req'] = (!empty($total_req) ? $total_req : '');
        $data['pending']   = $pending;
        $data['approved']  = $approved;
        $data['decline']   = $decline;
        

        $year_list = $this->Mod_Common->customQuery("SELECT DISTINCT(YEAR(from_date)) as years FROM hs_employee_leave_tracking WHERE employer_id = $employer_id ORDER BY YEAR(from_date) DESC");
        $year = date('Y');
        $month = date('m');

        
        $data['year_list'] = $year_list;

        $month_list = array('01' => 'Jan', '02' => 'Feb', '03' => 'Mar', '04' => 'Apr', '05' => 'May', '06' => 'Jun', '07' => 'Jul', '08' => 'Aug', '09' => 'Sep', '10' => 'Oct', '11' => 'Nov', '12' => 'Dec');

        $data['month_list'] = $month_list;


         if(!empty($this->input->post('from_year')) && !empty($this->input->post('from_month')) ){

            extract($this->input->post());

            $year = $from_year;
            $month = $from_month;

            $query = "SELECT LT.*, EU.first_name, EU.last_name, ED.dept_name, EDS.name as designation, ELTM.leave_type_name FROM hs_employee_leave_tracking AS LT
            INNER JOIN hs_users_employer AS EU ON EU.employee_id = LT.employee_id 
            INNER JOIN hs_employer_leave_type_management AS ELTM ON ELTM.leave_cat_id = LT.leave_cat_type
            INNER JOIN hs_employer_department AS ED ON ED.dep_id = EU.employee_department
            INNER JOIN hs_employer_desination AS EDS ON EDS.id = EU.employee_designation
            WHERE
            LT.employer_id = $employer_id AND
            YEAR(LT.from_date) = $from_year AND 
            MONTH(LT.from_date) = $from_month ORDER BY LT.leave_tracking_id DESC";

        }else{
            $query = "SELECT LT.*, EU.first_name, EU.last_name, ED.dept_name, EDS.name as designation, ELTM.leave_type_name FROM hs_employee_leave_tracking AS LT
            INNER JOIN hs_users_employer AS EU ON EU.employee_id = LT.employee_id 
            INNER JOIN hs_employer_leave_type_management AS ELTM ON ELTM.leave_cat_id = LT.leave_cat_type
            INNER JOIN hs_employer_department AS ED ON ED.dep_id = EU.employee_department
            INNER JOIN hs_employer_desination AS EDS ON EDS.id = EU.employee_designation
            WHERE
            LT.employer_id = $employer_id AND
            YEAR(LT.from_date) = $year AND 
            MONTH(LT.from_date) = $month ORDER BY LT.leave_tracking_id DESC";
        }

        $data['year']   =  $year;
        $data['month']   =  $month;

        $leave_tracking_list = $this->Mod_Common->customQuery($query);
        $data['leave_tracking']   =  $leave_tracking_list;
        
        //die;

        $this->employer_template->load('employer_template','employer/employee_management/leave_tracking/leave_tracking_list', $data); 
    }

     /**
    * Sort Description.
    * function name: list  
    * Details: Load view
    * @return: 
    * 
    */
    public function edit($id){
        $employee_id = decode($id);
        $employer_id = $this->login_data['userId'];
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Leave Tracking";
        $data['page_heading']="Leave Tracking";
        $data['page_sub_heading']="Edit leave";
        $query = "SELECT LT.*, EU.first_name, EU.last_name,ELTM.leave_type_name FROM hs_employee_leave_tracking AS LT
            INNER JOIN hs_users_employer AS EU ON EU.employee_id = LT.employee_id 
            INNER JOIN hs_employer_leave_type_management AS ELTM ON ELTM.leave_cat_id = LT.leave_type
            WHERE
            LT.employee_id = $employee_id";
        $res = $this->Mod_Common->customQuery($query);
        $data['record'] = $res[0];
        $leave_type = $this->Mod_Common->selectData(TABLE_LEAVE_TYPE,array('status' =>'Active', 'employer_id'=>$employer_id));
        $data['leave_type'] = $leave_type;
        $this->employer_template->load('employer_template','employer/employee_management/leave_tracking/edit', $data);
    }

    /**
    * Sort Description.
    * function name: updateEmployeeLeave  
    * Details: update 
    * @return: 
    * 
    */
    public function updateEmployeeLeave($edit_id){
        /*echo decode($edit_id);
        die;*/
        $employer_id = $this->login_data['userId'];
        $this->form_validation->set_rules('leave_type', 'Leave Type','trim|required');
        $this->form_validation->set_rules('from_date', 'From Date','trim|required');
        $this->form_validation->set_rules('to_date', 'To Date','trim|required');
        $this->form_validation->set_rules('leave_val', 'Leave Type','trim|required');
        $this->form_validation->set_rules('leave_reason', 'Reason','trim|required');
        if ($this->form_validation->run() == FALSE) 
        {
            $errors = $this->transformErrorsToArray(validation_errors());
            
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'danger');
            redirect(base_url('employer/emp-management/leave_tracking/edit/'.$edit_id));
        }
        else
        {
            extract($this->input->post());
            /*echo'<pre>';
            print_r($this->input->post());
            echo'</pre>';
            die;*/
            if(strtotime($to_date) < strtotime($from_date) ){
                $errors = 'To date always greater than from date';
            
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'danger');
                 redirect(base_url('employer/emp-management/leave_tracking/edit/'.$edit_id));
            }
            $updateData = array(
                    'leave_type'        => trim($leave_type),
                    'from_date'         => date('Y-m-d', strtotime($from_date)),
                    'to_date'           => date('Y-m-d', strtotime($to_date)),
                    'leave_val'         => trim($leave_val),
                    'leave_reason'      => trim($leave_reason),
                    'updated_at'        => date('Y-m-d h:i:s'),

                    );
            $update_id = $this->Mod_Common->updateData(TABLE_LEAVE_TRACKING, array('employee_id'=>decode($edit_id), 'employer_id' => $employer_id), $updateData);
                $errors = $this->lang->line('msg_updated_record');
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'success');
                redirect(base_url('employer/emp-management/leave_tracking/list'));
        }
    }

     public function get_view_data($tracking_id)
    {
        $data['title'] = 'Leave tracking details';

        $employer_id = $this->login_data['userId'];

        $query = "SELECT LT.*, EU.first_name, EU.last_name, ED.dept_name, EDS.name as designation, ELTM.leave_type_name FROM hs_employee_leave_tracking AS LT
            INNER JOIN hs_users_employer AS EU ON EU.employee_id = LT.employee_id 
            INNER JOIN hs_employer_leave_type_management AS ELTM ON ELTM.leave_cat_id = LT.leave_cat_type
            INNER JOIN hs_employer_department AS ED ON ED.dep_id = EU.employee_department
            INNER JOIN hs_employer_desination AS EDS ON EDS.id = EU.employee_designation
            WHERE
            LT.employer_id = $employer_id AND
            LT.leave_tracking_id = $tracking_id ";

        //$data['user_result'] = $this->Mod_Common->rowData('users',array('id'=>$tracking_id),'*');
        $leave_tracking = $this->Mod_Common->customQuery($query);
        $data['leave_tracking']   =  $leave_tracking[0];
        
        /*echo '<pre>';
        print_r($data['user_result']);
        echo'</pre>';
        die;*/
        $this->ajax_default->load('ajax_default','employer/employee_management/leave_tracking/show', $data);
    }

    /**
    * Sort Description.
    * function name:  updateStatus  
    * Details: change user status
    * @return: true/false
    * 
    */
     public function sendEmail($leaveData){
        print_r($leaveData);
        /* Send email to employee */
        if(!empty($leaveData['empInfo'])){
            $data['title'] = 'Leave Approval Status';
            $data['leave_record'] = 'Leave Approval Status';
            $data['userInfo'] = $leaveData['empInfo'];
            $email_res = $this->ajax_default->load('ajax_default','employer/email_template/common_email', $data);
            $subject = 'Subscription Plan Information';
                
            $headers = "From: " . strip_tags('mukeshv.syscraft@gmail.com') . "\r\n";
            $headers .= "Reply-To: ". strip_tags('mukeshv.syscraft@gmail.com') . "\r\n";
          
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
            $sent_status = mail('mukesh.varma@syscraftonline.com', $subject, $email_res,$headers);
            /*if($sent_status){
                echo'Email sent';
            }else{
                echo'Not sent email';
            }*/
            if(mail('mukesh.varma@syscraftonline.com', $subject, 'test',$headers)){
                echo'Email sent';
            }else{
                echo'Not sent email';
            }
        }
       

       /* $email_res = $this->load->view('membership_email_template', $update_array, true);
                $subject = 'Subscription Plan Information';
                $user_info = $this->session->userdata('user_info');
                $headers = "From: " . strip_tags($user_info['name']) . "\r\n";
    $headers .= "Reply-To: ". strip_tags($user_info['email']) . "\r\n";
   $headers .= "CC: tyler@atsadvisornetwork.com\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
                 mail('guy@orangecapitalmanagement.com', $subject, $email_res,$headers);*/
       
    }

    public function leaveStatus() {

        $returnData = false;

        $leave_status = $this->input->post('leave_status');
        $employee_id = $this->input->post('employee_id');
        $employer_id = $this->login_data['userId'];
        $rowID = decode($this->input->post('row_id'));

        /*$res = $this->Mod_Common->rowData(TABLE_LEAVE_TRACKING,array('leave_tracking_id'=>$rowID));
        
        echo'<pre>';
        print_r($assign_info);
        echo'<pre>';
        die;*/

        $updateData = array('employer_approved_status' => $leave_status);
        $upWhere = array('employee_id' => $employee_id, 'employer_id'=>$employer_id,'leave_tracking_id'=>$rowID );
        if (!empty($leave_status)){
            $this->Mod_Common->updateDataFromTabel(TABLE_LEAVE_TRACKING, $updateData, $upWhere);
            $returnData = array('isSuccess' => true);
        }else{
            $returnData = array('isSuccess' => false);
        }
       /* echo'<pre>';
        $empHeadInfo = getDapartmentHead($employee_id);
        $employer_info = getEmployeeInfo($employer_id,'hs_users_employer','employee_id, full_name, email_id');
        $empInfo = getEmployeeInfo($employee_id,'hs_users_employer','employee_id, full_name, email_id');
        $employeeDataEmail['empInfo'] = (!empty($empInfo->email_id) ? $empInfo : '');
        $employeeDataEmail['empHeadInfo'] = (!empty($empHeadInfo->email_id) ? $empHeadInfo : '');
        $employeeDataEmail['employer_info'] = (!empty($employer_info->email_id) ? $employer_info : '');
        $this->sendEmail($employeeDataEmail);
        echo'</pre>';
        die;*/

       

        $res = $this->Mod_Common->rowData(TABLE_LEAVE_TRACKING,array('leave_tracking_id'=>$rowID));
        if(!empty($res) && $res->employer_approved_status == "Approved" && $res->supervisor_approved_status == "Approved"){
            $upWhere1 = array('employee_id' => $employee_id, 'employer_id'=>$employer_id,'leave_tracking_id'=>$rowID );
            $updateData1 = array('status' => 'Approved');
            $this->Mod_Common->updateDataFromTabel(TABLE_LEAVE_TRACKING, $updateData1, $upWhere1);


            /* Update log status */
                    if(!empty($res->miss_punch_leave == 'Yes' && !empty($res->punching_id))){

                        /* Get punching info */
                          $punch_info = $this->Mod_Common->rowData(' hs_employee_punching', array('punching_id'=>$res->punching_id));
                          if($res->leave_val == 'Half'){
                                $cenvertedTime = date('Y-m-d H:i:s',strtotime('+5 hour',strtotime($punch_info->punch_in_time)));
                          }else{
                                $cenvertedTime = date('Y-m-d H:i:s',strtotime('+9 hour',strtotime($punch_info->punch_in_time)));
                          }
                          
                        /* Update punchin info*/
                        $updateData1 = array('punch_out_time' => $cenvertedTime,'manual_log' =>'Approved','punch_status2'=>'OUT');
                        $upWhere1 = array('punching_id' =>$res->punching_id);
                        $update_status1 = $this->Mod_Common->updateDataFromTabel('hs_employee_punching', $updateData1, $upWhere1);

                        /* Update punching log */
                        $this->Mod_Common->deleteData('hs_employee_punching_log', array('punching_id'=>$res->punching_id ));
                        $addedData = array(
                        'punching_id'=> $res->punching_id,
                        'break_in'   => trim($cenvertedTime),
                        'break_out'   => NULL,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                        );
                        $status = $this->Mod_Common->insertData('hs_employee_punching_log', $addedData); 
                    }

           /* $assign_info = $this->Mod_Common->rowData('hs_employee_leave_tracking', array('leave_tracking_id'=>$rowID),'leave_assign_history_id');*/
           
            if(!empty($res->leave_assign_history_id)){
                
                $query = "SELECT LT.leave_assign_history_id, AT.leave_assign_val FROM hs_employee_leave_tracking as LT
                INNER JOIN hs_employee_leave_assign_history AS AT ON AT.assign_id = LT.leave_assign_history_id
                WHERE AT.assign_id = $res->leave_assign_history_id";
                $assign_info = $this->Mod_Common->customQuery($query);

                if($assign_info){
                    $assign_info = $assign_info[0];
                    $upWhere2 = array('employer_id'=>$employer_id,'assign_id'=>$assign_info->leave_assign_history_id );
                    $val = $assign_info->leave_assign_val - $res->no_of_day;
                    $updateData2 = array('leave_assign_val' => $val);
                    $this->Mod_Common->updateDataFromTabel('hs_employee_leave_assign_history', $updateData2, $upWhere2);
                }

            }
        }
       
        echo json_encode($returnData);
    }

    /**
    * Sort Description.
    * function name:  updateStatus  
    * Details: change user status
    * @return: true/false
    * 
    */
    public function updateStatus() {

        $returnData = false;
        $fieldId = $this->input->post('ids');
        $IdField = $this->input->post('idField') ? $this->input->post('idField') : "id";
        $userStatus = $this->input->post('status');
        $table = $this->input->post('table');
        $field = $this->input->post('field');
        
        if($userStatus == '1'){
            if($IdField == 'id'){
                $userStatus2 = 'Active';
                $updateData = array($field => $userStatus,'userStatus2' => $userStatus2);
            }else{
                
                $updateData = array($field => $userStatus);
            }
            
        }else if($userStatus == '0'){
            if($IdField == 'id'){
                $userStatus2 = 'Deactive';
                $updateData = array($field => $userStatus,'userStatus2' => $userStatus2);
            }else{
                $updateData = array($field => $userStatus);
            }
            
        }else{
            $updateData = array($field => $userStatus);
        }
        if ((!empty($fieldId)) && (!empty($table))) {
            $upWhere = array($IdField => $fieldId);
            $this->Mod_Common->updateDataFromTabel($table, $updateData, $upWhere);

            $returnData = array('isSuccess' => true);
        } else {
            $returnData = array('isSuccess' => false);
        }
        echo json_encode($returnData);
    }

    /* Leave Assign List */
     public function leaveAssignList(){
        $data['header_title']   =   "HRMS";
        $data['page_title_top'] =    "Leave";
        $data['page_heading']   =   "Leave Assign List";
        $data['page_sub_heading']   =   "Leave Assign List";
        $this->employer_template->load('employer_template','employer/employee_management/leave_tracking/leave_assign_list', $data);
    }

    public function addLeaveAssign(){

        $data['header_title']   =   "HRMS";
        $data['page_title_top'] =   "Leave";
        $data['page_heading']   =   "Leave Assign";
        $data['page_sub_heading']   =  "Assign Leave";
        $department_list = $this->Mod_Common->selectData(TABLE_EMPLOYER_DEPARTMENT, array('status'=>'Active','employer_id'=>$this->employer_id));
        $data['departments'] = $department_list;
        /* Leave category*/
        $leave_cat_list = $this->Mod_Common->selectData(TABLE_LEAVE_TYPE, array('status'=>'Active','employer_id'=>$this->employer_id));
        $data['leave_cat_list'] = $leave_cat_list;
        /* end*/
        $this->employer_template->load('employer_template','employer/employee_management/leave_tracking/leave_assign_to_employee', $data);
    }

    public function leaveAssignAjaxList(){
      
        $start   =  $this->input->get('start'); // get promo code Id
        $length  =  $this->input->get('length'); // get promo code Id
        $draw    =  $this->input->get('draw'); // get promo code Id
        $order   =  $this->input->get('order');
        if(!empty($order)){ 
            if($order[0]['column']==2){
                $column_name='hs_users_employer.full_name';
            }else if($order[0]['column']==3){
                $column_name='hs_employer_department.dept_name';
            }else if($order[0]['column']==4){
                $column_name='hs_employer_desination.name';
            }else if($order[0]['column']==5){
                $column_name='hs_employer_leave_type_management.leave_type_name';
            }else{
                $column_name='hs_employee_leave_assign_history.assign_id';
            }
        }
       
        $totalRecord      = $this->LeaveAssign_model->leaveAssignAjaxList(true);
        $getRecordListing = $this->LeaveAssign_model->leaveAssignAjaxList(false,$start,$length, $column_name, $order[0]['dir']);
        $recordListing = array();
        $content='[';
        $i=0;       
        $srNumber=$start; 
     /*   echo'ddddddddddddddd  =  '. $this->db->last_query();
        die;*/
       
       /*echo'<pre>';
       print_r($getRecordListing);
       echo '</pre>';
       die;*/
        //echo '<pre>';
       // print_r($this ->session->userdata('filter_value'));
        // $this->db->last_query();
        // echo'</pre>';
        // die;
        if(!empty($getRecordListing)) {
            $actionContent = '';
            foreach($getRecordListing as $recordData) {
                   
                    $actionContent = ''; // set default empty
                    $content .='[';                    
                    $recordListing[$i][0]= $srNumber+1;
                    $recordListing[$i][1]= $recordData->full_name;
                    $recordListing[$i][2]= $recordData->dept_name;
                    $recordListing[$i][3]= $recordData->desination_name;
                    $actionLink = '';
                    $emp_id = "'".encode($recordData->employee_id)."'";
                    $employee_doc_url = base_url('employer/emp-management/leave_assign_record/assign_leave/').encode($recordData->employee_id);
                    $actionLink .= '<a href="'.$employee_doc_url.'" title="Assign leave" class="btn btn-icon waves-effect waves-light fa-new-grey m-b-5"><i class="fa fa-list"></i></a>';
                   $recordListing[$i][4] = $actionLink;
                    $i++;
                    $srNumber++;
                }
          
            $content .= ']';
            $final_data = json_encode($recordListing);
        } else {
            $final_data = '[]';
        }   
                
        echo '{"draw":'.$draw.',"recordsTotal":'.$totalRecord.',"recordsFiltered":'.$totalRecord.',"data":'.$final_data.'}';
    }

    /**
    * Sort Description.
    * function name:  submitLeaveAssign  
    * Details: change user status
    * @return: true/false
    * 
    */
    public function submitLeaveAssign() {

        $this->form_validation->set_rules('department_id', 'Department name','trim|required');
        $this->form_validation->set_rules('employee_id', 'Employee name','trim|required');
        $this->form_validation->set_rules('leave_cat_id', 'Leave category','trim|required');
        $this->form_validation->set_rules('leave_assign_val', 'Leave value','trim|required');

        if ($this->form_validation->run() == FALSE) 
        {
            $errors = $this->transformErrorsToArray(validation_errors());
            
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'danger');
            redirect(base_url('employer/emp-management/leave_assign_record/add'));
        }
        else
        {
            extract($this->input->post());
            $dept_id = decode($department_id);
            $empID = decode($employee_id);
            $leaveCatID = decode($leave_cat_id);
            $year_name = date('Y');
            $query = "SELECT * FROM hs_employee_leave_assign_history WHERE `employee_id` = $empID AND `department_id` = $dept_id AND `leave_cat_id` = $leaveCatID AND YEAR(created_at) = $year_name LIMIT 1";
            $dup_res = $this->Mod_Common->customQuery($query); 

           if(!empty($dup_res)){
                $errors = "Sorry, you already assign same leave category for this year for the same employee, please try another leave category for the same employee!";
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'danger');
                redirect(base_url('employer/emp-management/leave_assign_record/add'));
           }
            $addData = array(
                    'employee_id'       => trim($empID),
                    'department_id'     => trim($dept_id),
                    'employer_id'       => trim($this->employer_id),
                    'leave_cat_id'      => trim($leaveCatID),
                    'leave_assign_val'   => trim($leave_assign_val),
                    'assign_by'       => trim($this->employer_id),
                    'created_at'        => date('Y-m-d h:i:s'),
                    'updated_at'        => date('Y-m-d h:i:s'),
                    );

           
            $emp_info = rowData('hs_users_employer', array('employer_id'=>$this->employer_id , 'employee_id'=>$empID),'employee_id,employer_id,leave_balance');
            if(!empty($emp_info)){
                $add_val = $emp_info->leave_balance + $leave_assign_val;
                 $updateData = array(
                    'leave_balance' => trim($add_val),
                    );

                $update_id = $this->Mod_Common->updateData('hs_users_employer', array('employer_id' => trim($this->employer_id),'employee_id'=>trim($empID)), $updateData);
               
            }

            $insert_id = $this->Mod_Common->insertData('hs_employee_leave_assign_history', $addData);

            if($insert_id){
                $errors = $this->lang->line('msg_insert_record');
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'success');
                redirect(base_url('employer/emp-management/leave_assign_record/list'));
            }else{
                $errors = $this->lang->line('msg_not_insert');
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'success');
                redirect(base_url('employer/emp-management/leave_assign_record/add'));
            }
                
        }
    
    }

    public function getEmployeeleaveAssign($emp_id){

        $data['header_title']   =   "HRMS";
        $data['page_title_top'] =   "Leave";
        $data['page_heading']   =   "Assign Leave Details";
        $data['page_sub_heading']   = "Assign Leave Details";
        
        /* Leave category*/
        $employerID = $this->employer_id;
        $empID = decode($emp_id);
        $emp_info = rowData('hs_users_employer', array('employer_id'=>$employerID , 'employee_id'=>$empID),'full_name');
        $query = "SELECT hs_employee_leave_assign_history.*, hs_employer_leave_type_management.leave_type_name,hs_employer_leave_type_management.status as leave_type_status FROM hs_employee_leave_assign_history
        INNER JOIN hs_employer_leave_type_management ON hs_employer_leave_type_management.leave_cat_id = hs_employee_leave_assign_history.leave_cat_id
        WHERE hs_employee_leave_assign_history.employer_id = $employerID AND hs_employee_leave_assign_history.employee_id = $empID";
        $res = $this->Mod_Common->customQuery($query);
        $data['res'] = $res;
        $data['emp_info'] = $emp_info;
        
        /* end */
        $this->employer_template->load('employer_template','employer/employee_management/leave_tracking/get_employee_leave_list', $data);

    }

    /* End */

   
}
?>