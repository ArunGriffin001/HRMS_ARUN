<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class OtherWork extends MX_Controller  {
 
    var $data = array(); 

    /** All users login there **/
    public function __construct(){
       parent::__construct();
        $this->isAuthenticated('EmployeeLogin',base_url('sign-in'));
        $this->login_data = $this->session->userdata('EmployeeLogin');
        $this->employer_id = $this->login_data['employer_id'];
        $this->employee_id = $this->login_data['userId'];
        if($this->login_data['roleID'] != '3'){
            redirect(base_url());
        }
    }

    /**
    * Sort Description.
    * function name: hrmsEvents  
    * Details: Load hrms events view
    * @return: 
    * 
    */
    public function leaveRequestList(){
        $data['header_title']="HRMS";
        $data['page_title_top']="Employee Leave Request";
        $data['page_heading']="Employee Leave Request";

        $get_my_dept_info = $this->Mod_Common->selectData('hs_employer_department_head', array('employee_id'=> $this->employee_id));
        $dept_arr = array();
        if(!empty($get_my_dept_info)){
            foreach ($get_my_dept_info as $dept_val) {
               $dept_arr[] =  $dept_val->dep_id;
            }
        }
        
        $dept_val = implode(',', $dept_arr);
        $tab_name = 'hs_users_employer';
        $select_Fields = 'employee_id, role, employee_department';
        $where_field = 'employee_department';
        $emp_info = $this->Mod_Common->getDataWhereIn($tab_name, $select_Fields, $where_field, $dept_val);
        $data['get_leave_request'] = '';
        if(!empty($emp_info)){
            $all_emp_arr = array();
            foreach ($emp_info as $emp_val) {
                $all_emp_arr[] = $emp_val['employee_id'];
            }
            $allEmpID = implode(',', $all_emp_arr);

            $query = "SELECT LT.*, EU.full_name,EU.employee_department,EU.role, ED.dept_name, EDS.name as designation, ELTM.leave_type_name FROM hs_employee_leave_tracking AS LT
            INNER JOIN hs_users_employer AS EU ON EU.employee_id = LT.employee_id 
            INNER JOIN hs_employer_leave_type_management AS ELTM ON ELTM.leave_cat_id = LT.leave_cat_type
            INNER JOIN hs_employer_department AS ED ON ED.dep_id = EU.employee_department
            INNER JOIN hs_employer_desination AS EDS ON EDS.id = EU.employee_designation
            WHERE
            LT.employer_id = $this->employer_id 
            AND LT.employee_id IN($allEmpID)
            ";
            $get_info = $this->Mod_Common->customQuery($query);
            $data['get_leave_request'] = $get_info;
        }
        
        $this->employer_template->load('employee_template','employee/my_other_work/get_employee_apply_list', $data);
    }

    /**
    * Sort Description.
    * function name: get_view_data  
    * Details: fetch events
    * @return: array 
    * 
    */

    public function getViewData($tracking_id)
    {
        $data['title'] = 'Leave tracking details';

        $employer_id = $this->employer_id;

        $query = "SELECT LT.*, EU.first_name, EU.last_name, ED.dept_name, EDS.name as designation, ELTM.leave_type_name FROM hs_employee_leave_tracking AS LT
            INNER JOIN hs_users_employer AS EU ON EU.employee_id = LT.employee_id 
            INNER JOIN hs_employer_leave_type_management AS ELTM ON ELTM.leave_cat_id = LT.leave_cat_type
            INNER JOIN hs_employer_department AS ED ON ED.dep_id = EU.employee_department
            INNER JOIN hs_employer_desination AS EDS ON EDS.id = EU.employee_designation
            WHERE
            LT.employer_id = $employer_id AND
            LT.leave_tracking_id = $tracking_id ";
        $leave_tracking = $this->Mod_Common->customQuery($query);
        $data['leave_tracking']   =  $leave_tracking[0];
        
        
        $this->ajax_default->load('ajax_default','employee/my_other_work/show', $data);
    }

    /**
    * Sort Description.
    * function name:  updateStatus  
    * Details: change user status
    * @return: true/false
    * 
    */
    public function leaveApprovalStatus() {

        $returnData = false;

        $leave_status = $this->input->post('leave_status');
        $employee_id = $this->input->post('employee_id');
        $rowID = decode($this->input->post('row_id'));
        $employer_id = $this->employer_id;
         /*echo'<pre>';
           print_r($this->input->post());
           echo'</pre>';
           die;*/
        
        if (!empty($leave_status) && !empty($employee_id) && !empty($rowID)){
            $updateData = array('supervisor_approved_status' => $leave_status,'supervisor_approved_by_id' =>$this->employee_id);
            $upWhere = array('employee_id' => $employee_id, 'employer_id'=>$employer_id,'leave_tracking_id'=>$rowID );
            $update_status = $this->Mod_Common->updateDataFromTabel(TABLE_LEAVE_TRACKING, $updateData, $upWhere);

            $res = $this->Mod_Common->rowData(TABLE_LEAVE_TRACKING,array('leave_tracking_id'=>$rowID));
           /* echo'<pre>';
            print_r($res);
            echo'</pre>';
            die;*/

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
                   

                /* End */
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
                        $returnData = array('isSuccess' => true);
                    }

                }

            }
            if($update_status){
                $returnData = array('isSuccess' => true);
            }
           
        }else{
            $returnData = array('isSuccess' => false);
        }
        echo json_encode($returnData);
    }

    /**
    * Sort Description.
    * function name: manualLogRequestList  
    * Details: Load manaul log request list
    * @return: 
    * 
    */
    public function manualLogRequestList(){
        $data['header_title']="HRMS";
        $data['page_title_top']="Attendence Manual Log";
        $data['page_heading']="Attendence Manual List";

        $get_my_dept_info = $this->Mod_Common->selectData('hs_employer_department_head', array('employee_id'=> $this->employee_id));
        $dept_arr = array();
        if(!empty($get_my_dept_info)){
            foreach ($get_my_dept_info as $dept_val) {
               $dept_arr[] =  $dept_val->dep_id;
            }
        }
        
        $dept_val = implode(',', $dept_arr);
        $tab_name = 'hs_users_employer';
        $select_Fields = 'employee_id, role, employee_department';
        $where_field = 'employee_department';
        $emp_info = $this->Mod_Common->getDataWhereIn($tab_name, $select_Fields, $where_field, $dept_val);
       
        $data['get_leave_request'] = '';
        if(!empty($emp_info)){
            $all_emp_arr = array();
            foreach ($emp_info as $emp_val) {
                $all_emp_arr[] = $emp_val['employee_id'];
            }
            $allEmpID = implode(',', $all_emp_arr);

            $query = "SELECT ER.*, EU.first_name, EU.last_name ,EU.employee_department,EU.role, ED.dept_name, EDS.name as designation FROM hs_employee_regularization AS ER
            INNER JOIN hs_users_employer AS EU ON EU.employee_id = ER.employee_id 
            INNER JOIN hs_employer_department AS ED ON ED.dep_id = EU.employee_department
            INNER JOIN hs_employer_desination AS EDS ON EDS.id = EU.employee_designation
            WHERE
            ER.employer_id = $this->employer_id 
            AND ER.employee_id IN($allEmpID) ORDER BY ER.id DESC
            ";
            $get_info = $this->Mod_Common->customQuery($query);
            $approve_arr = array();
            
            if(!empty($get_info)){
                foreach ($get_info as  $get_val) {
                   $approve_arr[$get_val->approved_by] = (!empty($get_val->approved_by) ? $get_val->approved_by : '');
                }
                $approve_arr = array_filter($approve_arr);
            }
            if(!empty($approve_arr)){
                $user_id = implode(',', $approve_arr);
                $query = "SELECT employee_id, full_name FROM hs_users_employer WHERE employee_id IN($user_id)";
                $approve_arr['user_rec_arr'] = $this->Mod_Common->customQuery($query);

                if(!empty($approve_arr['user_rec_arr'])){
                    foreach ($approve_arr['user_rec_arr'] as $user_val) {
                        $approve_arr['user_res_val'][$user_val->employee_id] = $user_val;
                    }

                }
            }

            $data['user_name'] = (!empty($approve_arr['user_res_val']) ? $approve_arr['user_res_val'] : '');
           /* echo'<pre>';
            print_r($data['user_name']);
            echo'</pre>';
            die;*/
            $data['manual_log_request'] = $get_info;
        }
        
        $this->employer_template->load('employee_template','employee/my_other_work/manual_log_list', $data);
    }

    /**
    * Sort Description.
    * function name:  updateStatus  
    * Details: change user status
    * @return: true/false
    * 
    */
    public function manaulLogApprovalStatus() {

        $returnData = false;

        $log_status = $this->input->post('log_status');
        $employee_id = $this->input->post('employee_id');
        $rowID = decode($this->input->post('row_id'));
        $employer_id = $this->employer_id;
         /*echo'<pre> send array = ';
           print_r($this->input->post());
           echo'</pre>';
           die;*/
           /*echo 'log_status = '.$log_status.' employee_id = '.$employee_id .' rowID '.$rowID;*/
           //die;
        
        if (!empty($log_status) && !empty($employee_id) && !empty($rowID)){
            
            $updateData = array('status' => $log_status,'approved_by' =>$this->employee_id);
            $upWhere = array('employee_id' => $employee_id, 'employer_id'=>$employer_id,'id'=>$rowID );
            $update_status = $this->Mod_Common->updateDataFromTabel('hs_employee_regularization', $updateData, $upWhere);
            /* Fetch specific record from db */
            $res_manual = $this->Mod_Common->rowData('hs_employee_regularization',array('id'=>$rowID));
            
           /* echo'<pre> manual = ';
           print_r($res_manual);
           echo'</pre>';*/

           // && $log_status == "Approved"
           if(!empty($res_manual) && $log_status == "Approved"){
                $fromTime = date('H:i:s', strtotime($res_manual->from_date));
                $toTime = date('H:i:s', strtotime($res_manual->to_date));

                $time1 = new DateTime($fromTime);
                $time2 = new DateTime($toTime);
                $interval = $time1->diff($time2);
                $addhour = $interval->format('%H');
                $addmin = $interval->format('%i');
                $addsec = $interval->format('%s');
            //$startTime = date("Y-m-d H:i:s");

            //echo 
            
            // fetch record from db date wise
                $fromDate = date('Y-m-d', strtotime($res_manual->from_date));
                $get_que = "SELECT * FROM hs_employee_punching WHERE DATE(punch_in_time) = '$fromDate' AND `employer_id` = $employer_id AND `employee_id` = $employee_id ";

                $get_puch_res = $this->Mod_Common->customQuery($get_que);
                if(!empty($get_puch_res)){ // if record get then update hours
                    $punch_res = $get_puch_res[0];
                   
                    // check if misspunch out
                    if($punch_res->punch_out_time != ''){
                        $cenvertedTime = date('Y-m-d H:i:s',strtotime('+'.$addhour.' hour +' .$addmin.' minutes',strtotime($punch_res->punch_out_time)));
                        $updateData1 = array('punch_out_time' => $cenvertedTime,'manual_log' =>'Approved','punch_status2'=> 'OUT');
                        $upWhere1 = array('punching_id' =>$punch_res->punching_id);
                        $update_status1 = $this->Mod_Common->updateDataFromTabel('hs_employee_punching', $updateData1, $upWhere1);
                        $returnData = array('isSuccess' => true);

                    }else{
                        $cenvertedTime = date('Y-m-d H:i:s',strtotime('+'.$addhour.' hour +' .$addmin.' minutes',strtotime($res_manual->from_date)));

                        $updateData1 = array('punch_out_time' => $cenvertedTime,'manual_log' =>'Approved','punch_status2'=>'OUT');
                        $upWhere1 = array('punching_id' =>$punch_res->punching_id);
                        $update_status1 = $this->Mod_Common->updateDataFromTabel('hs_employee_punching', $updateData1, $upWhere1);

                        /* for manage break insert record in punch log db  */
                        $this->Mod_Common->deleteData('hs_employee_punching_log', array('punching_id'=>$punch_res->punching_id ));
                        $addedData = array(
                        'punching_id'=> $punch_res->punching_id,
                        'break_in'   => trim($cenvertedTime),
                        'break_out'   => NULL,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                        );
                        $status = $this->Mod_Common->insertData('hs_employee_punching_log', $addedData);
                        $returnData = array('isSuccess' => true);
                    }
                    
                }else{ // if record not found the insert new record
                
                    $addedData = array(
                        'employee_id'=> trim($res_manual->employee_id),
                        'employer_id'   => trim($res_manual->employer_id),
                        'punch_in_time' => date('Y-m-d H:i:s', strtotime($res_manual->from_date)),
                        'punch_out_time' => date('Y-m-d H:i:s', strtotime($res_manual->to_date)),
                        'punch_status'=> '1',
                        'punch_status2'=> 'OUT',
                        'manual_log'=> 'Approved',
                        'created_at'=> date('Y-m-d H:i:s', strtotime($res_manual->from_date)),
                        'updated_at'=> date('Y-m-d H:i:s', strtotime($res_manual->from_date)),
                        );
                   
                    $insert_status = $this->Mod_Common->insertData('hs_employee_punching', $addedData);
                    $last_insert_id = $insert_id = $this->db->insert_id();
                    
                    /* for manage break insert record in punch log db  */
                    if($insert_status && !empty($last_insert_id)){
                        $addedData = array(
                        'punching_id'=> $last_insert_id,
                        'break_in'   => date('Y-m-d H:i:s', strtotime($res_manual->to_date)),
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                        );
                        $status = $this->Mod_Common->insertData('hs_employee_punching_log', $addedData);

                    }
                    
                    $returnData = array('isSuccess' => true);
            }

           }else{
            $returnData = array('isSuccess' => true);
           }
        }else{
            $returnData = array('isSuccess' => false);
        }
        echo json_encode($returnData);
    }

}
?>