<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class EmployerUsers extends MX_Controller  {
 
    var $data = array(); 

    /** All users login there **/
    public function __construct(){
        parent::__construct();
        $this->isAuthenticated('EmployerLoginDetails',base_url('sign-in'));
        $this->login_data = $this->session->userdata('EmployerLoginDetails');
        $this->employer_id = $this->login_data['userId'];
        $this->employer_row_id = $this->login_data['Id'];
        $this->load->model('Designation_model');
        $this->load->model('Users_model');
        
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
        $data['page_title_top']="Users";
        $data['page_heading']="Users";
        $data['page_sub_heading']="User List";
        $year = date('Y-m-d');
        $month = date('m');
        $employer_id = $this->login_data['userId'];
        $total_emp = $this->Mod_Common->customQuery("SELECT count(employee_id) as total_emp FROM hs_users_employer WHERE employer_id = $employer_id ");

        $new_employee = $this->Mod_Common->customQuery("SELECT count(employee_id) as new_employee FROM hs_users_employer WHERE MONTH(joining_date) = MONTH(CURRENT_DATE()) AND YEAR(joining_date) = YEAR(CURRENT_DATE()) AND employer_id = $employer_id");

        $male = $this->Mod_Common->customQuery("SELECT count(employee_id) as total_male FROM hs_users_employer WHERE employer_id = $employer_id AND `gender` = 'Male' ");

        $female = $this->Mod_Common->customQuery("SELECT count(employee_id) as total_female FROM hs_users_employer WHERE employer_id = $employer_id AND `gender` = 'Female' ");

        $data['first_name'] = '';
        $data['last_name'] = '';
        $data['dept_name'] = '';
        //$data['status'] = '';
        

        if(!empty($this->input->post()) && (!empty($this->input->post('employeeId')) || !empty($this->input->post('first_name')) || !empty($this->input->post('last_name')) || !empty($this->input->post('dept_name'))) ){
            extract($this->input->post());
           /* $filter_value = array("first_name" => trim($first_name), "last_name" => trim($last_name), "dept_name" => trim($dept_name), "status" => trim($status) );*/
           $filter_value = array("first_name" => trim($first_name), "last_name" => trim($last_name), "dept_name" => trim($dept_name));
            $this ->session->set_userdata('filter_value',$filter_value);
            $data['first_name'] = trim($first_name);
            $data['last_name']  = trim($last_name);
            $data['dept_name']  = trim($dept_name);
            //$data['status'] = trim($status);
        }else{
            $this->session->unset_userdata('filter_value');
        }

        $data['total_emp']= $total_emp[0]->total_emp;
        $data['new_employee']= $new_employee[0]->new_employee;
        $data['total_male']= $male[0]->total_male;
        $data['total_female']= $female[0]->total_female;

       /* echo '<pre>';
        print_r($data['total_emp']);
        print_r($data['new_employee']);
        print_r($data['male']);
        print_r($data['female']);
        echo'</pre>';
        die;*/
        $this->employer_template->load('employer_template','employer/hrms/users/list', $data); 
    }

    public function userAjaxList(){
      
        $start   =  $this->input->get('start'); // get promo code Id
        $length  =  $this->input->get('length'); // get promo code Id
        $draw    =  $this->input->get('draw'); // get promo code Id
        $order   =  $this->input->get('order');
        if(!empty($order)){ 
            if($order[0]['column']==2){
                $column_name='hs_users_employer.first_name';
            }else if($order[0]['column']==3){
                $column_name='hs_users_employer.last_name';
            }else if($order[0]['column']==4){
                $column_name='hs_users_employer.email_id';
            }else if($order[0]['column']==5){
                 $column_name='hs_employer_department.dept_name';
            }else if($order[0]['column']==6){
                $column_name='hs_employer_desination.name';
            }else if($order[0]['column']==7){
                $column_name='hs_users_employer.joining_date';
            }else if($order[0]['column']==8){
                $column_name='hs_users_employer.created_at';
            }else if($order[0]['column']==9){
                $column_name='hs_users_employer.status';
            }else{
                $column_name='hs_users_employer.employee_id';
            }
        }
        
        $totalRecord      = $this->Users_model->userAjaxList(true);
        $getRecordListing = $this->Users_model->userAjaxList(false,$start,$length, $column_name, $order[0]['dir']);
        $recordListing = array();
        $content='[';
        $i=0;       
        $srNumber=$start; 
       
       /* echo '<pre>';
        print_r($getRecordListing);
       //print_r($this ->session->userdata('filter_value'));
        $this->db->last_query();
        echo'</pre>';
        die;*/
        if(!empty($getRecordListing)) {
            $actionContent = '';
            foreach($getRecordListing as $recordData) {
                   
                    $actionContent = ''; // set default empty
                    $content .='[';                    
                    $recordListing[$i][0]= $srNumber+1;
                    $img = 'default_img.jpg';
                    if(!empty($recordData->profile_img)){
                        $img = $recordData->profile_img;
                    }
                    
                    $recordListing[$i][1]= '<img src="'.base_url().'uploads/employer/users/'.$img.'" class="img-circle" width="150" height="70">';
                    $recordListing[$i][2]= $recordData->first_name;
                    $recordListing[$i][3]= $recordData->last_name;
                    $recordListing[$i][4]= $recordData->email_id;
                    $recordListing[$i][5]= $recordData->dept_name;
                    $recordListing[$i][6]= $recordData->desination_name;
                    $recordListing[$i][7]= dateTime($recordData->joining_date);
                    
                    $recordListing[$i][8] = dateTime($recordData->created_at);
                    $table = TABLE_USERS_EMPLOYER;
                    $field = 'status';
                    $field_name = 'employee_id';
                    $urls  =  base_url('employer/hrms/users/updateStatus');
                    $actionStatus = '';
                    if($recordData->status == "Deactive"){
                        $status = 'Active';
                        $actionStatus ='<a class="btn btn-danger waves-effect" style="width: 100%;" href="javascript:void(0);" onclick="changestatus('.$recordData->employee_id.', \''.$status.'\', \''.$urls.'\' , \''.$table.'\', \''.$field.'\', \''.$field_name.'\');" title="Deactive">Deactive</a>';

                    }else { 
                        $status = 'Deactive';
                        $actionStatus ='<a class="btn btn-primary waves-effect" style="width: 100%;" href="javascript:void(0);" onclick="changestatus('.$recordData->employee_id.', \''.$status.'\', \''.$urls.'\' , \''.$table.'\', \''.$field.'\', \''.$field_name.'\');" title="Active">Active</a>';
                    }
                    $recordListing[$i][9]= $actionStatus;
                    $actionLink = '';
                    $emp_id = "'".encode($recordData->employee_id)."'";
                    $actionLink .= '<a href="javascript:void(0)" title="view" class="btn btn-icon waves-effect waves-light fa-new-grey m-b-5" data-toggle="modal" data-target="#view_emp_record" onclick="view_emp_record('.$emp_id.')"><i class="fa fa-eye"></i></a>|';
                    $edit_users_url = base_url('employer/hrms/users/edit/').encode($recordData->employee_id);
                    $actionLink .= '<a href="'.$edit_users_url.'" title="Edit" class="btn btn-icon waves-effect waves-light fa-new-grey m-b-5"><i class="fa fa-edit"></i></a>|';

                    $employee_doc_url = base_url('employer/hrms/users/doc-list/').encode($recordData->employee_id);
                    $actionLink .= '<a href="'.$employee_doc_url.'" title="Employee doc" class="btn btn-icon waves-effect waves-light fa-new-grey m-b-5"><i class="fa fa-list"></i></a>|';

                    $employee_doc_url = base_url('employer/hrms/users/editPfEsiInfo/').encode($recordData->employee_id);
                    $actionLink .= '<a href="'.$employee_doc_url.'" title="Update PF & ESI" class="btn btn-icon waves-effect waves-light fa-new-grey m-b-5"><i class="fa fa-plus"></i></a>|';
                    $employee_doc_url = base_url('employer/hrms/users/attendance-log-list/').encode($recordData->employee_id);
                    $actionLink .= '<a href="'.$employee_doc_url.'" title="Attandence/ Timesheet" class="btn btn-icon waves-effect waves-light fa-new-grey m-b-5"><i class="fa fa-users"></i></a>';
                    $employee_doc_url = base_url('employer/hrms/users/manaul-log-list/').encode($recordData->employee_id);
                    $actionLink .= '|<a href="'.$employee_doc_url.'" title="Attandence manaul log" class="btn btn-icon waves-effect waves-light fa-new-grey m-b-5"><i class="fa fa-clock-o"></i></a>';

                     $annexure_url_list = base_url('employer/hrms/users/annexure-list/').encode($recordData->employee_id);
                    $actionLink .= '|<a href="'.$annexure_url_list.'" title="Annexure" class="btn btn-icon waves-effect waves-light fa-new-grey m-b-5"><i class="fa fa fa-list"></i></a>';
                    

                   $recordListing[$i][10] = $actionLink;
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

    public function get_view_data($employee_id)
    {
        $data['title'] = 'Detailsetails';

        //echo'sssssssssss';
        //die;
        $employeeid = decode($employee_id);
        $employer_id = $this->login_data['userId'];

        $query = "SELECT EU.*, ED.dept_name, EDS.name as desination_name, country.name as country_name, state.name as state_name, city.name as city_name FROM hs_users_employer AS EU
            INNER JOIN hs_employer_department AS ED ON ED.dep_id = EU.employee_department
            INNER JOIN hs_employer_desination AS EDS ON EDS.id = EU.employee_designation
            INNER JOIN hs_countries AS country ON country.id = EU.country_id
            INNER JOIN hs_states AS state ON state.id = EU.state_id
            INNER JOIN hs_cities AS city ON city.id = EU.city_id
            WHERE EU.employer_id = $employer_id AND EU.employee_id = $employeeid";
        
        $ueser_rec = $this->Mod_Common->customQuery($query);
        /*echo '<pre>';
        print_r($ueser_rec);
        echo'</pre>';
        die;*/
        $data['ueser_rec']   =  $ueser_rec[0];
        $this->ajax_default->load('ajax_default','employer/hrms/users/show', $data);
    }


    /*
    * Sort Description.
    * function name: manualLogRequestList  
    * Details: Load view
    * @return: 
    * 
    */
    public function manualLogRequestList(){
        
        $data['header_title']="HRMS";
        $data['page_title_top']="Attendence Manual Log";
        $data['page_heading']="Attendence Manual List";
        $data['page_sub_heading']="Manual Log List";
       
        $get_my_dept_info = $this->Mod_Common->selectData('hs_employer_department_head', array('employer_id'=> $this->employer_id));

       
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
        $query = "SELECT `employee_id`, `role`, `employee_department` FROM `hs_users_employer` WHERE `employee_department` IN($dept_val)";
        $emp_info = $this->Mod_Common->customQuery($query);
        //$emp_info = $this->Mod_Common->getDataWhereIn($tab_name, $select_Fields, $where_field, $dept_val);

        
       
        $data['get_leave_request'] = '';
        if(!empty($emp_info)){
            $all_emp_arr = array();
            foreach ($emp_info as $emp_val) {
                $all_emp_arr[] = $emp_val->employee_id;
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

           /* echo'<pre>';
            print_r($this->login_data);
            echo $this->db->last_query();
            print_r($get_info);

            echo'</pre>';
            die;*/
            $approve_arr = array();
            
            if(!empty($get_info)){
                foreach ($get_info as  $get_val) {
                   $approve_arr[$get_val->approved_by] = (!empty($get_val->approved_by) ? $get_val->approved_by : '');
                }
                $approve_arr = array_filter($approve_arr);
            }
            if(!empty($approve_arr)){
                $user_id = implode(',', $approve_arr);
                $query = "SELECT employee_id, full_name FROM hs_users_employer WHERE employee_id IN($user_id) ";
                $approve_arr['user_rec_arr'] = $this->Mod_Common->customQuery($query);

                if(!empty($approve_arr['user_rec_arr'])){
                    foreach ($approve_arr['user_rec_arr'] as $user_val) {
                        $approve_arr['user_res_val'][$user_val->employee_id] = $user_val;
                    }

                }
            }

            $data['user_name'] = (!empty($approve_arr['user_res_val']) ? $approve_arr['user_res_val'] : '');
           
            $data['manual_log_request'] = $get_info;
        }
        
        $this->employer_template->load('employer_template','employer/hrms/users/manual_log/get_manaul_log_list', $data);
    }



    /*
    * Sort Description.
    * function name: employeeAttendanceLogList  
    * Details: Load view
    * @return: 
    * 
    */
    public function employeeAttendanceLogList($emp_id){
        
        $data['header_title']="HRMS";
        $data['page_title_top']="Attandence Log";
        $data['page_heading']="Attendance List";
        $data['page_sub_heading']="Timesheet/ Attendance List ";
        $employee_id = decode($emp_id);
        $emp_rec = $this->Mod_Common->rowData('hs_users_employer', array('employee_id'=>$employee_id), 'employer_id, full_name');
        $data['employee_info'] = (!empty($emp_rec) ? $emp_rec : '');
        $employerID = $this->employer_id;
        $empID = $employee_id;
        $today = date('Y-m-d');

        /* Lunching Log calculation */
        $punch_all_query = "SELECT punch.punching_id, punch.employee_id, punch.punch_in_time, punch.punch_out_time, punch.created_at as punch_create, punch.manual_log,punch.punch_status2,punch.break_status as punch_break_status, punch_log.log_id, punch_log.punching_id as log_punching_id, punch_log.break_in, punch_log.break_out, punch_log.created_at as punch_log_create_at, punch_log.break_status as punch_log_break_status FROM hs_employee_punching as punch
        LEFT JOIN hs_employee_punching_log as punch_log ON punch_log.punching_id = punch.punching_id
        WHERE punch.employer_id = $employerID AND punch. employee_id = $empID
        AND DATE(punch.created_at) < '$today'
        ";
        $punch_all = $this->Mod_Common->customQuery($punch_all_query);

        /*echo $this->db->last_query();
        die;*/

        $punch = array();
        if(!empty($punch_all)){
            foreach ($punch_all as $punch_val){
                $punch['punching_log'][$punch_val->punching_id][] = $punch_val;
            }
         
            foreach ($punch['punching_log'] as $pkey => $log_val_arr) {
                
                $punch_in = ''; $punch_out = ''; $punchInTime = '';
                $punchOutTime = ''; $punch_diff = ''; $punch_in_hour = ''; $punch_in_min = ''; $punch_in_sec = '';
                $woriking_min = ''; $working_hour = '';

                 /* calculate break time */
               
                foreach ($log_val_arr as $log_val) {
                     $break_in = ''; $break_out = ''; $time1 = ''; $time2 = ''; $timediff = ''; $hour = ''; $min = ''; $second = ''; $break_hour = ''; $break_min = ''; $break_sec = '';
            
                    $punch['log'][$pkey]['punch_in'] = date('g:i A', strtotime($log_val->punch_in_time));
                    $punch['log'][$pkey]['punch_date'] = $log_val->punch_create;
                    $punch['log'][$pkey]['manual_log'] = $log_val->manual_log;
                    if($log_val->punch_out_time != '' && $log_val->punch_status2 == 'OUT'){
                        $punch['log'][$pkey]['punch_out'] = date('g:i A', strtotime($log_val->punch_out_time));
                    }else{
                        $punch['log'][$pkey]['punch_out'] = '';
                        $punch['log'][$pkey]['hours'] = '';
                        $punch['log'][$pkey]['break_time'] = '';
                        $punch['log'][$pkey]['manual_log'] = $log_val->manual_log;
                        break;
                    }

                    if(!empty($log_val->log_punching_id) && $log_val->log_punching_id == $pkey){
                        
                        if(!empty($log_val->break_in)){

                            $break_in = $log_val->break_in;
                            $break_out = $log_val->break_out;

                            if($log_val->break_out == ''){
                                $break_out = $log_val->break_in;
                            }

                            $time1 = new DateTime($break_in);
                            $time2 = new DateTime($break_out);
                            $timediff = $time1->diff($time2);
                            $hour = $timediff->format('%h');
                            $min = $timediff->format('%i');
                            $second = $timediff->format('%s');
                            
                            $break_hour = ((float)$hour + (float)$break_hour);
                            $break_min = ((float)$min + (float)$break_min);
                            $break_sec = ((float)$second + (float)$break_sec);

                        }else{
                            $punch_in_hour = 0;
                            $break_hour = 0;
                            $break_min = 0;
                        }
                        
                        /* Start punching hour calculation */
                        $punch_in = $log_val->punch_in_time;
                        $punch_out = $log_val->punch_out_time;

                        if($punch_out == ''){
                            $punch_out = $punch_in;
                        }

                        $punchInTime = new DateTime($punch_in);
                        $punchOutTime = new DateTime($punch_out);
                        $punch_diff = $punchInTime->diff($punchOutTime);

                        $punch_in_hour = $punch_diff->format('%h');
                        $punch_in_min = $punch_diff->format('%i');
                        $punch_in_sec = $punch_diff->format('%s');

                        $punch_in_hour = $punch_in_hour*60;

                        $break_hour = $break_hour*60;

                        $punch_min = ((float)$punch_in_hour + (float)$punch_in_min);
                        $punch_log_min = ((float)$break_hour + (float)$break_min);
                        $woriking_min = $punch_min - $punch_log_min;
                        $working_hour = floor($woriking_min / 60).':'.($woriking_min -   floor($woriking_min / 60) * 60);
                        $punch['log'][$pkey]['hours'] =$working_hour;
                        $punch['log'][$pkey]['break_time'] =floor($punch_log_min / 60).':'.($punch_log_min -   floor($punch_log_min / 60) * 60);;

                        /* End */

                    }else{
                        $punch['log'][$pkey]['hour'] = '';
                    }
                }
            }
        }else{
            $punch['log'] = '';
        }
        /*echo'<pre>res = ';
        print_r($punch['log']);
        echo'</pre>';
        die;*/
        $data['log'] = $punch['log'];
        

        $this->employer_template->load('employer_template','employer/hrms/users/manual_log/employee_manual_log_list', $data);
    }

    /**
    * Sort Description.
    * function name:  manaulLogApprovalStatus  
    * Details: 
    * @return: true/false
    * 
    */
    public function manaulLogApprovalStatus() {

        $returnData = false;

        $log_status = $this->input->post('log_status');
        $employee_id = $this->input->post('employee_id');
        $rowID = decode($this->input->post('row_id'));
        $employer_id =$this->employer_row_id;
       /* echo $employer_id;
         echo'<br><pre> send array = ';
           print_r($this->input->post());
           echo decode($this->input->post('row_id'));
           echo'</pre>';*/
           
           /*echo 'log_status = '.$log_status.' employee_id = '.$employee_id .' rowID '.$rowID;*/
           //die;
        
        if (!empty($log_status) && !empty($employee_id) && !empty($rowID)){
            
            $updateData = array('status' => $log_status,'approved_by' =>$employer_id);
            $upWhere = array('id'=>$rowID );
            $update_status = $this->Mod_Common->updateDataFromTabel('hs_employee_regularization', $updateData, $upWhere);
            /* Fetch specific record from db */
            $res_manual = $this->Mod_Common->rowData('hs_employee_regularization',array('id'=>$rowID));
          
           if(!empty($res_manual->punch_id) && !empty($res_manual) && $log_status == "Approved"){
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
                $get_puch_res = array();
                if(!empty($res_manual->punch_id)){
                    $get_que = "SELECT * FROM hs_employee_punching WHERE `punching_id` = $res_manual->punch_id";
                    $get_puch_res = $this->Mod_Common->customQuery($get_que);
                }
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

                        $updateData1 = array('punch_out_time' => $cenvertedTime,'manual_log' =>'Approved','punch_status2'=> 'OUT');
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


    /*
    * Sort Description.
    * function name: employeManualLogRequestList  
    * Details: Load view
    * @return: 
    * 
    */
    public function employeManualLogRequestList($emp_id){
        
        $data['header_title']="HRMS";
        $data['page_title_top']="Attendence Manual Log";
        $data['page_heading']="Attendence Manual List";
        $data['page_sub_heading']="Manual Log List";
        $employee_id = decode($emp_id);
        $data['get_leave_request'] = '';

        $query = "SELECT ER.*, EU.first_name, EU.last_name ,EU.employee_department FROM hs_employee_regularization AS ER
        INNER JOIN hs_users_employer AS EU ON EU.employee_id = ER.employee_id 
        WHERE
        ER.employee_id = $employee_id  ORDER BY ER.id DESC
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
        $data['manual_log_request'] = $get_info;
        $this->employer_template->load('employer_template','employer/hrms/users/manual_log/manual_log_list', $data);
    }

    /**
    * Sort Description.
    * function name: employeeDoc  
    * Details: Load view
    * @return: 
    * 
    */
    public function employeeDoc($emp_id){
        $employer_id = decode($emp_id);
        $data['header_title']="HRMS";
        $data['page_title_top']="Employee doc";
        $data['page_heading']="Employee doc";
        $res = $this->Mod_Common->rowData('hs_employee_document', array('employee_id'=>$employer_id, 'employer_id'=>$this->employer_id));
        $data['res'] = $res;
        $data['dir_name'] =  base_url().'/uploads/employee/others/';
        $this->employer_template->load('employer_template','employer/hrms/users/doc/list', $data);
    }

    /**
    * Sort Description.
    * function name: annexureCTC  
    * Details: Load view
    * @return: 
    * 
    */
    public function annexureCTC($emp_id){

        $employer_id = decode($emp_id);
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

        $this->employer_template->load('employer_template','employer/hrms/users/annexure/list', $data);
    }

    /**
    * Sort Description.
    * function name: employeeDoc  
    * Details: Load view
    * @return: 
    * 
    */
    public function employeeDoc1($emp_id){
        $employer_id = decode($emp_id);
        $data['header_title']="HRMS";
        $data['page_title_top']="Employee doc";
        $data['page_heading']="Employee doc";
        $res = $this->Mod_Common->rowData('hs_employee_document', array('employee_id'=>$employer_id, 'employer_id'=>$this->employer_id));
        $data['res'] = $res;
        $data['dir_name'] =  base_url().'/uploads/employee/others/';
        $this->employer_template->load('employer_template','employer/hrms/users/doc/list1', $data);
    }

    public function designationAjaxList()
    {
       
        $start   =  $this->input->get('start'); // get promo code Id
        $length  =  $this->input->get('length'); // get promo code Id
        $draw    =  $this->input->get('draw'); // get promo code Id
        $order   =  $this->input->get('order');
        if(!empty($order)){ 
            if($order[0]['column']==1){
                $column_name='name';
            }else if($order[0]['column']==2){
                $column_name='created_at';
            }else if($order[0]['column']==3){
                $column_name='status';
            }else{
                $column_name='id';
            }
        }
        $totalRecord      = $this->Designation_model->designationAjaxList(true);
        $getRecordListing = $this->Designation_model->designationAjaxList(false,$start,$length, $column_name, $order[0]['dir']);
        $recordListing = array();
        $content='[';
        $i=0;       
        $srNumber=$start; 
       
      /* echo'<pre>';
       print_r($getRecordListing);
       echo '</pre>';
       die;*/
        if(!empty($getRecordListing)) {
            $actionContent = '';
            foreach($getRecordListing as $recordData) {
                   
                    $actionContent = ''; // set default empty
                    $content .='[';                    
                    $recordListing[$i][0]= $srNumber+1;
                    $recordListing[$i][1]= $recordData->name;
                    $recordListing[$i][2] = dateTime($recordData->created_at);
                    $table = TABLE_EMPLOYER_DESIGNATION;
                    $field = 'status';
                    $field_name = 'id';
                    $urls  =  base_url('employer/designation/updateStatus');
                    $actionStatus = '';
                    if($recordData->status == "Deactive"){
                        $status = 'Active';
                        $actionStatus ='<a class="btn btn-danger waves-effect" style="width: 75%;" href="javascript:void(0);" onclick="changestatus('.$recordData->id.', \''.$status.'\', \''.$urls.'\' , \''.$table.'\', \''.$field.'\', \''.$field_name.'\');" title="Deactive">Deactive</a>';

                    }else { 
                        $status = 'Deactive';
                        $actionStatus ='<a class="btn btn-primary waves-effect" style="width: 75%;" href="javascript:void(0);" onclick="changestatus('.$recordData->id.', \''.$status.'\', \''.$urls.'\' , \''.$table.'\', \''.$field.'\', \''.$field_name.'\');" title="Active">Active</a>';
                    }
                    $recordListing[$i][3]= $actionStatus;
                    $actionLink = '';
                    
                    $edit_slider_url = base_url(ADMIN_URL).'designation/edit/'.encode($recordData->id);
                    $actionLink .= '<a href="#" title="Edit" class="btn btn-icon waves-effect waves-light fa-new-grey m-b-5"><i class="fa fa-edit"></i></a>';

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
    * function name: add  
    * Details: Load view
    * @return: 
    * 
    */
    public function add(){
        $data['header_title']="HRMS";
        $data['page_title_top']="Users";
        $data['page_heading']="Users";
        $data['page_sub_heading']="Add User";
        $country = $this->Mod_Common->selectData(TABLE_COUNTRIES);
        $data['country']   =  $country;
        $department = $this->Mod_Common->selectData(TABLE_EMPLOYER_DEPARTMENT, array('employer_id'=>$this->employer_id,'status'=>'Active'));
        $data['department']   =  $department;
        $desination = $this->Mod_Common->selectData(TABLE_EMPLOYER_DESIGNATION, array('employer_id'=>$this->employer_id,'status'=>'Active'));
        $data['desination']   =  $desination;

        /* Get level and grade */
        $emp_level_arr = $this->Mod_Common->selectData('hs_employee_level');
        $data['emp_level_arr']   =  (!empty($emp_level_arr) ? $emp_level_arr : '');
       
        $this->employer_template->load('employer_template','employer/hrms/users/add', $data);
    }

    /**
    * Sort Description.
    * function name: addUser  
    * Details: add record as per department type
    * @return: 
    * 
    */
    public function addUser(){
        $this->form_validation->set_rules('first_name', 'First name','trim|required');
        $this->form_validation->set_rules('last_name', 'Last name','trim|required');
       /* $this->form_validation->set_rules('email_id', 'Email','trim|required|valid_email|is_unique[hs_users_employer.email_id]');*/
        $this->form_validation->set_rules('email_id', 'Email','required|is_unique[hs_users_employer.email_id]',
        array(
                'required'      => 'The %s is required',
                'is_unique'     => 'This %s already exists please try another email'
            )
        );

        $this->form_validation->set_rules('mobile_no', 'Mobile number','trim|required|min_length[10]|max_length[12]');
        $this->form_validation->set_rules('gender', 'Gender','trim|required');
        $this->form_validation->set_rules('country_id', 'Country','trim|required');
        $this->form_validation->set_rules('state_id', 'State','trim|required');
        $this->form_validation->set_rules('city_id', 'City','trim|required');
        $this->form_validation->set_rules('employee_department', 'Department','trim|required');
        $this->form_validation->set_rules('employee_designation', 'Designation','trim|required');
        $this->form_validation->set_rules('dob', 'Date Of Birth','trim|required');
        $this->form_validation->set_rules('joining_date', 'Date of joining','trim|required');
        $this->form_validation->set_rules('level_name', 'Level','trim|required');
        $this->form_validation->set_rules('grade_name', 'Grade','trim|required');
        $this->form_validation->set_rules('working_days', 'Working day','trim|required');
        $this->form_validation->set_rules('password', 'Password','trim|required|min_length[6]');
        // Salary fields
        $this->form_validation->set_rules('sal_basic_sal_da', 'Basic Salary+DA','trim|required');
        $this->form_validation->set_rules('sal_hra', 'HRA','trim|required');
        $this->form_validation->set_rules('sal_full_conveyance', 'Conveyance','trim|required');
        $this->form_validation->set_rules('sal_professional_tax', 'Professional Tax','trim|required');
        $this->form_validation->set_rules('employee_type', 'Employee Type','trim|required');

        if ($this->form_validation->run() == FALSE) 
        {
            $errors = $this->transformErrorsToArray(validation_errors());
            
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'danger');
            redirect(base_url('employer/hrms/users/add'));
        }
        else
        {
            
            /*echo'<pre>';
            print_r($this->input->post());
            echo'</pre>';
            die;*/
            extract($this->input->post());
            //$employeedoc = '';
            $profileimg = '';
            $asset_type = MEDIA_PICTURE;
            if (!empty($_FILES['profile_img']['name'])) {
                $dirPathThumb =  './uploads/employer/users/users_thumb/'; 
                $profile_img = $this->Mod_Common->fileupload_resize('profile_img', 'uploads/employer/users/','Picture',$dirPathThumb,'320','100');

                if(!empty($profile_img)){
                    $profileimg = $profile_img;
                }else{
                    $error_text = "Need file type should be $asset_type";
                    $this->session->set_flashdata('errorclass', 'danger');
                    $this->session->set_flashdata('error_message', $error_text);
                    //$this->template->load('default', 'slider/add_slider', $this->data);
                    redirect(base_url('employer/hrms/users/add'));
                }
            }

            $full_name = trim($first_name).' '.trim($last_name);
            $addedData = array(
                    'employer_id'           => $this->employer_id,
                    'first_name'            => trim($first_name),
                    'last_name'             => trim($last_name),
                    'full_name'             => trim($full_name),
                    'email_id'              => trim($email_id),
                    'mobile_no'             => trim($mobile_no),
                    'gender'                => trim($gender),
                    'dob'                   => trim(date('Y-m-d',strtotime($dob))),
                    'joining_date'   => trim(date('Y-m-d',strtotime($joining_date))),
                    'country_id'            => trim($country_id),
                    'state_id'              => trim($state_id),
                    'city_id'               => trim($city_id),
                    'password'              => trim(md5($password)),
                    'employee_department'   => trim($employee_department),
                    'working_days'          => trim($working_days),
                    'employee_designation'  => trim($employee_designation),
                    'address'               => trim($address),
                    'profile_img'           => trim($profileimg),
                    'employee_type'         => (!empty($employee_type) ? $employee_type : ''),
                    'branch_name'           => (!empty(trim($branch_name)) ? trim($branch_name) : ''),
                    'level_name'            => trim($level_name),
                    'grade_name'            => trim($grade_name),
                    'fathers_name'          => (!empty($fathers_name) ? trim($fathers_name) : ''),
                    'mothers_name'          => (!empty($mothers_name) ? trim($mothers_name) : ''),
                    'alternate_address'     => (!empty($alternate_address) ? trim($alternate_address) : ''),
                    'communication_address' => (!empty($communication_address) ? trim($communication_address) : ''),
                    'pan_number'            => (!empty($pan_number) ? trim($pan_number) : ''),
                    'aadhar_number'         => (!empty($aadhar_number) ? trim($aadhar_number) : ''),
                    'status'                => 'Active',
                    'sal_basic_sal_da'          => (!empty($sal_basic_sal_da) ? trim($sal_basic_sal_da) : ''),
                    'sal_hra'                   => (!empty($sal_hra) ? trim($sal_hra) : ''),
                    'sal_full_conveyance'       => (!empty($sal_full_conveyance) ? trim($sal_full_conveyance) : ''),
                    'sal_other_allowance'       => (!empty($sal_other_allowance) ? trim($sal_other_allowance) : ''),
                    'sal_personal_pay'          => (!empty($sal_personal_pay) ? trim($sal_personal_pay) : ''),
                    'sal_food_allowance'        => (!empty($sal_food_allowance) ? trim($sal_food_allowance) : ''),
                    'sal_medical_allowance'     => (!empty($sal_medical_allowance) ? trim($sal_medical_allowance) : ''),
                    'sal_telephone_allowance'   => (!empty($sal_telephone_allowance) ? trim($sal_telephone_allowance) : ''),
                    'sal_performance_link_pay'  => (!empty($sal_performance_link_pay) ? trim($sal_performance_link_pay) : ''),
                    'sal_personal_loan_amt'     => (!empty($sal_personal_loan_amt) ? trim($sal_personal_loan_amt) : ''),
                    'sal_professional_tax'      => (!empty($sal_professional_tax) ? trim($sal_professional_tax) : ''),
                    'sal_personal_loan_interest'  => (!empty($sal_personal_loan_interest) ? trim($sal_personal_loan_interest) : ''),
                    'voluntary_pf'  => (!empty($voluntary_pf) ? trim($voluntary_pf) : ''),
                    'created_at'    => date('Y-m-d h:i:s'),
                    'updated_at'    => date('Y-m-d h:i:s'),
                    );
            $user_id = $this->Mod_Common->insertData(TABLE_USERS_EMPLOYER, $addedData);

            if($user_id){
                $errors = $this->lang->line('msg_insert_record');
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'success');
                redirect(base_url('employer/hrms/users'));
            }else{
                $errors = $this->lang->line('msg_wrong');
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'danger');
                redirect(base_url('employer/hrms/users/add'));
            }
        }
    }

     /**
    * Sort Description.
    * function name: add  
    * Details: Load view
    * @return: 
    * 
    */
    public function edit($user_id){
        $data['header_title']="HRMS";
        $data['page_title_top']="Users";
        $data['page_heading']="Users";
        $data['page_sub_heading']="Edit User";
        $country = $this->Mod_Common->selectData(TABLE_COUNTRIES);
        $data['country']   =  $country;
        $department = $this->Mod_Common->selectData(TABLE_EMPLOYER_DEPARTMENT, array('employer_id'=>$this->employer_id,'status'=>'Active'));
        $data['department']   =  $department;
        $desination = $this->Mod_Common->selectData(TABLE_EMPLOYER_DESIGNATION,array('employer_id'=>$this->employer_id,'status'=>'Active'));
        $data['desination']   =  $desination;
        $user_data = $this->Mod_Common->rowData(TABLE_USERS_EMPLOYER, array('employee_id' => decode($user_id)));
        $state_data = $this->Mod_Common->rowData(TABLE_STATES, array('id' =>$user_data->state_id ));
        $city_data = $this->Mod_Common->rowData(TABLE_CITIES, array('id' =>$user_data->city_id ));
        $data['state_data']   =  $state_data;
        $data['city_data']   =  $city_data;

        $emp_level_arr = $this->Mod_Common->selectData('hs_employee_level');
        $emp_grade_arr = $this->Mod_Common->selectData('hs_employee_grade',array('level_id'=>$user_data->level_name));
        $data['emp_level_arr']   =  (!empty($emp_level_arr) ? $emp_level_arr : '');
        $data['emp_grade_arr']   =  (!empty($emp_grade_arr) ? $emp_grade_arr : '');
        $data['user_data'] = $user_data;
        $this->employer_template->load('employer_template','employer/hrms/users/edit', $data);
    }

         /**
    * Sort Description.
    * function name: editPfEsiInfo  
    * Details: Load view
    * @return: 
    * 
    */
    public function editPfEsiInfo($user_id){
        $data['header_title']="HRMS";
        $data['page_title_top']="Update User PF & ESI";
        $data['page_heading']="Update User PF & ESI";
        $data['page_sub_heading']="Edit PF & ESI";
        $field = "employee_id,employer_id,first_name,last_name,role,bank_account_number,IFSC_code,bank_name_address,PF_Joining_date,Family_pf_no,is_existing_member_of_eps,allow_epf_access_contribution,allow_eps_access_contribution,ESI_account_number,PF_KYC_Done,PF_reg_number,UAN_number,fund_type";
        $user_data = $this->Mod_Common->rowData(TABLE_USERS_EMPLOYER, array('employee_id' => decode($user_id), 'employer_id'=> $this->employer_id),$field);
       
        /*echo'<pre>';
        print_r($user_data);
        echo'</pre>';
        die;*/
        $data['user_data'] = $user_data;
        $this->employer_template->load('employer_template','employer/hrms/users/update_pf_esi_info', $data);
    }

    /**
    * Sort Description.
    * function name: updatePfEsiInfo  
    * Details: update pfesi
    * @return: 
    * 
    */
    public function updatePfEsiInfo($edit_id){
        $this->form_validation->set_rules('bank_name_address', 'Bank Name','trim|required');
        $this->form_validation->set_rules('bank_account_number', 'Bank Account Number','trim|required');
        $this->form_validation->set_rules('IFSC_code', 'IFSC Code','trim|required');
        if ($this->form_validation->run() == FALSE) 
        {
            $errors = $this->transformErrorsToArray(validation_errors());
            
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'danger');
            redirect(base_url('employer/hrms/users/editPfEsiInfo/'.$edit_id));
        }
        else
        {
            extract($this->input->post());
            
            
            $updateData = array(
                    'bank_name_address'     => trim($bank_name_address),
                    'bank_account_number'     => trim($bank_account_number),
                    'IFSC_code'    => trim($IFSC_code),
                    'UAN_number'    => trim($UAN_number),
                    'PF_reg_number'     => trim($PF_reg_number),
                    'PF_Joining_date'    => trim(date('Y-m-d h:i:s', strtotime($PF_Joining_date))),
                    'Family_pf_no'    => trim($Family_pf_no),
                    // 'is_existing_member_of_eps'     => trim($is_existing_member_of_eps),
                    // 'allow_epf_access_contribution'    => trim($allow_epf_access_contribution),
                    // 'allow_eps_access_contribution'    => trim($allow_eps_access_contribution),
                    'PF_KYC_Done' => trim($PF_KYC_Done),
                    'ESI_account_number'     => trim($ESI_account_number),
                    
                    );
                

                $update_id = $this->Mod_Common->updateData(TABLE_USERS_EMPLOYER, array('employee_id'=>decode($edit_id), 'employer_id' => $this->employer_id), $updateData);
                $errors = $this->lang->line('msg_updated_record');
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'success');
                redirect(base_url('employer/hrms/users/editPfEsiInfo/'.$edit_id));
        }
    }

    /**
    * Sort Description.
    * function name: UpdateUser  
    * Details: add record as per department type
    * @return: 
    * 
    */
    public function UpdateUser($user_id){
        $this->form_validation->set_rules('first_name', 'First name','trim|required');
        $this->form_validation->set_rules('last_name', 'Last name','trim|required');
       
        $this->form_validation->set_rules('mobile_no', 'Mobile number','trim|required|min_length[10]|max_length[12]');
        $this->form_validation->set_rules('gender', 'Gender','trim|required');
        $this->form_validation->set_rules('country_id', 'Country','trim|required');
        $this->form_validation->set_rules('state_id', 'State','trim|required');
        $this->form_validation->set_rules('city_id', 'City','trim|required');
        $this->form_validation->set_rules('employee_department', 'Department','trim|required');
        $this->form_validation->set_rules('employee_designation', 'Designation','trim|required');
        $this->form_validation->set_rules('dob', 'Date of birth','trim|required');
        $this->form_validation->set_rules('joining_date', 'Date Of joining','trim|required');
        $this->form_validation->set_rules('level_name', 'Level','trim|required');
        $this->form_validation->set_rules('grade_name', 'Grade','trim|required');
        $this->form_validation->set_rules('working_days', 'Working day','trim|required');

         // Salary fields
        $this->form_validation->set_rules('sal_basic_sal_da', 'Basic Salary+DA','trim|required');
        $this->form_validation->set_rules('sal_hra', 'HRA','trim|required');
        $this->form_validation->set_rules('sal_full_conveyance', 'Conveyance','trim|required');
        $this->form_validation->set_rules('sal_professional_tax', 'Professional Tax','trim|required');
         $this->form_validation->set_rules('employee_type', 'Employee Type','trim|required');
        

        if ($this->form_validation->run() == FALSE) 
        {
            $errors = $this->transformErrorsToArray(validation_errors());
            
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'danger');
            redirect(base_url('employer/hrms/users/edit/'.$user_id));
        }
        else
        {
            
            /*echo'<pre>';
            print_r($this->input->post());
            echo'</pre>';
            die;*/
            extract($this->input->post());
            //$employeedoc = '';
            $profileimg = '';
            $asset_type = MEDIA_PICTURE;
            if (!empty($_FILES['profile_img']['name'])) {
                $dirPathThumb =  './uploads/employer/users/users_thumb/'; 
                $profile_img = $this->Mod_Common->fileupload_resize('profile_img', 'uploads/employer/users/','Picture',$dirPathThumb,'320','100');

                if(!empty($profile_img)){
                    $profileimg = $profile_img;
                    $path = './uploads/employer/users/users_thumb/'.$old_img;
                    unlink($path);
                    $path2 = './uploads/employer/users/'.$old_img;
                    unlink($path2);
                }else{
                    $error_text = "Need file type should be $asset_type";
                    $this->session->set_flashdata('errorclass', 'danger');
                    $this->session->set_flashdata('error_message', $error_text);
                    //$this->template->load('default', 'slider/add_slider', $this->data);
                    redirect(base_url('employer/hrms/users/edit/'.$user_id));
                }
            }

            $full_name = trim($first_name).' '.trim($last_name);
            $updatedData = array(
                    'first_name'            => trim($first_name),
                    'last_name'             => trim($last_name),
                    'full_name'             => trim($full_name),
                    'dob'                   => trim(date('Y-m-d',strtotime($dob))),
                    'joining_date'   => trim(date('Y-m-d',strtotime($joining_date))),
                    'mobile_no'             => trim($mobile_no),
                    'gender'                => trim($gender),
                    'country_id'            => trim($country_id),
                    'state_id'              => trim($state_id),
                    'employee_type'         => (!empty($employee_type) ? $employee_type : ''),
                    'branch_name'           => (!empty(trim($branch_name)) ? trim($branch_name) : ''),
                    'level_name'             => trim($level_name),
                    'grade_name'             => trim($grade_name),
                    'city_id'               => trim($city_id),
                    'employee_department'   => trim($employee_department),
                    'working_days'          => trim($working_days),
                    'employee_designation'  => trim($employee_designation),
                    'address'               => trim($address),
                    'fathers_name'          => (!empty($fathers_name) ? trim($fathers_name) : ''),
                    'mothers_name'          => (!empty($mothers_name) ? trim($mothers_name) : ''),
                    'alternate_address'     => (!empty($alternate_address) ? trim($alternate_address) : ''),
                    'communication_address' => (!empty($communication_address) ? trim($communication_address) : ''),
                    'pan_number'            => (!empty($pan_number) ? trim($pan_number) : ''),
                    'aadhar_number'         => (!empty($aadhar_number) ? trim($aadhar_number) : ''),
                    'sal_basic_sal_da'          => (!empty($sal_basic_sal_da) ? trim($sal_basic_sal_da) : ''),
                    'sal_hra'                   => (!empty($sal_hra) ? trim($sal_hra) : ''),
                    'sal_full_conveyance'       => (!empty($sal_full_conveyance) ? trim($sal_full_conveyance) : ''),
                    'sal_other_allowance'       => (!empty($sal_other_allowance) ? trim($sal_other_allowance) : ''),
                    'sal_personal_pay'          => (!empty($sal_personal_pay) ? trim($sal_personal_pay) : ''),
                    'sal_food_allowance'        => (!empty($sal_food_allowance) ? trim($sal_food_allowance) : ''),
                    'sal_medical_allowance'     => (!empty($sal_medical_allowance) ? trim($sal_medical_allowance) : ''),
                    'sal_telephone_allowance'   => (!empty($sal_telephone_allowance) ? trim($sal_telephone_allowance) : ''),
                    'sal_performance_link_pay'  => (!empty($sal_performance_link_pay) ? trim($sal_performance_link_pay) : ''),
                    'sal_personal_loan_amt'     => (!empty($sal_personal_loan_amt) ? trim($sal_personal_loan_amt) : ''),
                    'sal_professional_tax'      => (!empty($sal_professional_tax) ? trim($sal_professional_tax) : ''),
                    'sal_personal_loan_interest'  => (!empty($sal_personal_loan_interest) ? trim($sal_personal_loan_interest) : ''),
                    'voluntary_pf'  => (!empty($voluntary_pf) ? trim($voluntary_pf) : ''),
                    'updated_at'    => date('Y-m-d h:i:s'),
                    );
            if(!empty($password)){
                $updatedData['password'] = trim(md5($password));
            }
            if(!empty($profileimg)){
                $updatedData['profile_img'] = trim($profileimg);
            }
            
            
            /*echo'<pre>';
            print_r($updatedData);
            echo'</pre>';
            die;*/
            $user_id = $this->Mod_Common->updateData(TABLE_USERS_EMPLOYER, array('employee_id' => decode($user_id) ), $updatedData);
            
                $errors = $this->lang->line('msg_updated_record');
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'success');
                redirect(base_url('employer/hrms/users'));
            
        }
    }

    /**
    * Sort Description.
    * function name: employeeSalary  
    * Details: Load view
    * @return: 
    * 
    */
    public function employeeSalary(){

        $data['header_title']="HRMS";
        $data['page_title_top']="Salary";
        $data['page_heading']="Employee salary";
        $data['page_sub_heading']="Employee salary";
        $this->employer_template->load('employer_template','employer/hrms/users/employee_salary', $data); 
    }

    /**
    * Sort Description.
    * function name: employeeExperienceLetter  
    * Details: Load view
    * @return: 
    * 
    */
    public function employeeExperienceLetter(){

        $data['header_title']="HRMS";
        $data['page_title_top']="Letter of Experience";
        $data['page_heading']="Letter of Experience";
        $data['page_sub_heading']="Letter of Experience";
        $this->employer_template->load('employer_template','employer/hrms/users/experience_letter', $data); 
    }

    /**
    * Sort Description.
    * function name: employeeRelievingLetter  
    * Details: Load view
    * @return: 
    * 
    */
    public function employeeRelievingLetter(){

        $data['header_title']="HRMS";
        $data['page_title_top']="Letter of Relieving";
        $data['page_heading']="Letter of Relieving";
        $data['page_sub_heading']="Letter of Relieving";
        $this->employer_template->load('employer_template','employer/hrms/users/relieving_letter', $data); 
    }


    public function get_states()
    {

        $cntryID=$_POST['cntry'];
        $this->data['state_data'] = $this->Mod_Common->customQuery("select * from hs_states where country_id='".$cntryID."' order by name");
        $this->db->last_query();
        $state_data = $this->data['state_data'];
        $data ='<option value="">Select State</option>';
        if(count($state_data)>0)
        {
            foreach($state_data as $stateVal)
            {
                $data.='<option value="'.$stateVal->id.'">'.$stateVal->name.'</option>.';
            }
        }
        echo $data;
    }

    public function get_city()
    {
        $stateId=$_POST['state'];
        $this->data['city_data'] = $this->Mod_Common->customQuery("select * from hs_cities where state_id='".$stateId."' order by name");
        $city_data = $this->data['city_data'];
        $data ='<option value="">Select City</option>';
        if(count($city_data)>0)
        {
            foreach($city_data as $cityVal)
            {
                $data.='<option value="'.$cityVal->id.'">'.$cityVal->name.'</option>.';
            }
        }
        echo $data;
    }

    /* fetch level grade */
    public function getLevelGrade()
    {

        $level_id=$_POST['level_id'];
        $this->data['grade_data'] = $this->Mod_Common->customQuery("select * from hs_employee_grade where level_id='".$level_id."' order by id asc");
        $this->db->last_query();
        $grade_data = $this->data['grade_data'];
        $data ='<option value="">Select grade</option>';
        if(count($grade_data)>0)
        {
            foreach($grade_data as $grade_val)
            {
                $data.='<option value="'.$grade_val->id.'">'.$grade_val->grade_name.'</option>.';
            }
        }
        echo $data;
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

    /**
    * Sort Description.
    * function name: updateFormSixteen  
    * Details: Load view
    * @return: 
    * 
    */
    public function updateFormSixteen(){


        $data['header_title']="HRMS";
        $data['page_title_top']="Form 16";
        $data['page_heading']="From 16";
        $data['page_sub_heading']="From 16";

        $data['form_16_info'] = '';
        $get_form_16 = $this->Mod_Common->rowData(TABLE_EMPLOYEE_FORM_PDF, array('employer_id'=>$this->employer_id ));
        if(!empty($get_form_16)){
            $data['form_16_info'] = $get_form_16;
        }

        $this->employer_template->load('employer_template','employer/hrms/form_pdf/form16_edit', $data); 
    }

    /**
    * Sort Description.
    * function name: updateFormSixteen  
    * Details: Load view
    * @return: 
    * 
    */
    public function uploadFormSixteen(){

        $res = $this->Mod_Common->rowData(TABLE_EMPLOYEE_FORM_PDF, array('employer_id'=>$this->employer_id,'doc_type'=>'form_16'), 'id,employer_id,doc_url,status');
        extract($this->input->post());

        if(!empty($_FILES['doc_url']['name'])){
            $path_parts = pathinfo($_FILES["doc_url"]["name"]);
            $extension = $path_parts['extension'];
            
            if($extension != 'pdf'){
                $errors = 'Sorry, only allow pdf file type';
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'success');
                redirect(base_url('employer/form_16'));
            }
        }

             # extra ()
            $docurl = '';
            $asset_type = "DOC";
            if (!empty($_FILES['doc_url']['name'])) {

                $dirPathThumb =  ''; 
                $doc_url = $this->Mod_Common->docFilePpload('doc_url', 'uploads/employer/users/form_16','DOC',$dirPathThumb);

                if(!empty($doc_url)){
                    $docurl = $doc_url;
                    if(!empty($old_pdf)){
                        $file1 = './uploads/employer/users/form_16/'.$old_pdf;
                        unlink($file1);
                        
                    }
                    
                }else{
                    $error_text = "Need file type should be pdf";
                    $this->session->set_flashdata('errorclass', 'danger');
                    $this->session->set_flashdata('error_message', $error_text);
                    //$this->template->load('default', 'slider/add_slider', $this->data);
                    redirect(base_url('employer/form_16'));
                }


                if(!empty($res)){
                    $updateData = array(
                    'doc_url'    => trim($docurl),
                    'updated_at'    => date('Y-m-d h:i:s'),
                    );
                    $user_id = $this->Mod_Common->updateData(TABLE_EMPLOYEE_FORM_PDF, array('id'=>$res->id, 'employer_id' =>$this->employer_id), $updateData);
                }else{
                    $addData = array(
                    'employer_id'   => $this->employer_id,
                    'doc_type'      => 'form_16',
                    'doc_url'    => trim($docurl),
                    'created_at'    => date('Y-m-d h:i:s'),
                    'updated_at'    => date('Y-m-d h:i:s'),
                    );
                    $user_id = $this->Mod_Common->insertData(TABLE_EMPLOYEE_FORM_PDF, $addData);
                }
                
                $errors = $this->lang->line('msg_updated_record');
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'success');
                redirect(base_url('employer/form_16'));
            }else{
                $errors = $this->lang->line('msg_updated_record');
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'success');
                redirect(base_url('employer/form_16'));
            }
    }

    /**
    * Sort Description.
    * function name: updateTaxDeclarations  
    * Details: Load view
    * @return: 
    * 
    */
    public function updateTaxDeclarations(){

        $data['header_title']="HRMS";
        $data['page_title_top']="Tax Declarations";
        $data['page_heading']="Tax Declarations";
        $data['page_sub_heading']="Tax Declarations";

        $data['form_16_info'] = '';
        $get_form_16 = $this->Mod_Common->rowData(TABLE_EMPLOYEE_FORM_PDF, array('employer_id'=>$this->employer_id, 'doc_type'=>'tax_declaration'));
        if(!empty($get_form_16)){
            $data['form_16_info'] = $get_form_16;
        }
        $this->employer_template->load('employer_template','employer/hrms/form_pdf/form_tax_declarations_edit', $data); 
    }

     /**
    * Sort Description.
    * function name: uploadTaxDeclarations  
    * Details: Load view
    * @return: 
    * 
    */
    public function uploadTaxDeclarations(){

        $res = $this->Mod_Common->rowData(TABLE_EMPLOYEE_FORM_PDF, array('employer_id'=>$this->employer_id,'doc_type'=>'tax_declaration'), 'id,employer_id,doc_url,status');
        extract($this->input->post());

        if(!empty($_FILES['doc_url']['name'])){
            $path_parts = pathinfo($_FILES["doc_url"]["name"]);
            $extension = $path_parts['extension'];
            
            if($extension != 'pdf'){
                $errors = 'Sorry, only allow pdf file type';
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'success');
                redirect(base_url('employer/tax_declarations'));
            }
        }

             # extra ()
            $docurl = '';
            $asset_type = "DOC";
            if (!empty($_FILES['doc_url']['name'])) {

                $dirPathThumb =  ''; 
                $doc_url = $this->Mod_Common->docFilePpload('doc_url', 'uploads/employer/users/form_16','DOC',$dirPathThumb);

                if(!empty($doc_url)){
                    $docurl = $doc_url;
                    if(!empty($old_pdf)){
                        $file1 = './uploads/employer/users/form_16/'.$old_pdf;
                        unlink($file1);
                        
                    }
                    
                }else{
                    $error_text = "Need file type should be pdf";
                    $this->session->set_flashdata('errorclass', 'danger');
                    $this->session->set_flashdata('error_message', $error_text);
                    //$this->template->load('default', 'slider/add_slider', $this->data);
                    redirect(base_url('employer/tax_declarations'));
                }


                if(!empty($res)){
                    $updateData = array(
                    'doc_url'    => trim($docurl),
                    'updated_at'    => date('Y-m-d h:i:s'),
                    );
                    $user_id = $this->Mod_Common->updateData(TABLE_EMPLOYEE_FORM_PDF, array('id'=>$res->id, 'employer_id' =>$this->employer_id), $updateData);
                }else{
                    $addData = array(
                    'employer_id'   => $this->employer_id,
                    'doc_type'      => 'tax_declaration',
                    'doc_url'    => trim($docurl),
                    'created_at'    => date('Y-m-d h:i:s'),
                    'updated_at'    => date('Y-m-d h:i:s'),
                    );
                    $user_id = $this->Mod_Common->insertData(TABLE_EMPLOYEE_FORM_PDF, $addData);
                }
                
                $errors = $this->lang->line('msg_updated_record');
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'success');
                redirect(base_url('employer/tax_declarations'));
            }else{
                $errors = $this->lang->line('msg_updated_record');
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'success');
                redirect(base_url('employer/tax_declarations'));
            }
    }

    /**
    * Sort Description.
    * function name: updateTaxComputations  
    * Details: Load view
    * @return: 
    * 
    */
    public function updateTaxComputations(){

        $data['header_title']="HRMS";
        $data['page_title_top']="Tax Computations";
        $data['page_heading']="Tax Computations";
        $data['page_sub_heading']="Tax Computations";

        $data['form_16_info'] = '';
        $get_form_16 = $this->Mod_Common->rowData(TABLE_EMPLOYEE_FORM_PDF, array('employer_id'=>$this->employer_id, 'doc_type'=>'tax_computation'));
        if(!empty($get_form_16)){
            $data['form_16_info'] = $get_form_16;
        }
        $this->employer_template->load('employer_template','employer/hrms/form_pdf/form_tax_computations_edit', $data); 
    }

     /**
    * Sort Description.
    * function name: uploadTaxComputations  
    * Details: Load view
    * @return: 
    * 
    */
    public function uploadTaxComputations(){

        $res = $this->Mod_Common->rowData(TABLE_EMPLOYEE_FORM_PDF, array('employer_id'=>$this->employer_id,'doc_type'=>'tax_computation'), 'id,employer_id,doc_url,status');
        extract($this->input->post());

        if(!empty($_FILES['doc_url']['name'])){
            $path_parts = pathinfo($_FILES["doc_url"]["name"]);
            $extension = $path_parts['extension'];
            
            if($extension != 'pdf'){
                $errors = 'Sorry, only allow pdf file type';
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'success');
                redirect(base_url('employer/tax_computation'));
            }
        }
            $docurl = '';
            $asset_type = "DOC";
            if (!empty($_FILES['doc_url']['name'])) {

                $dirPathThumb =  ''; 
                $doc_url = $this->Mod_Common->docFilePpload('doc_url', 'uploads/employer/users/form_16','DOC',$dirPathThumb);

                if(!empty($doc_url)){
                    $docurl = $doc_url;
                    if(!empty($old_pdf)){
                        $file1 = './uploads/employer/users/form_16/'.$old_pdf;
                        unlink($file1);
                    }
                    
                }else{
                    $error_text = "Need file type should be pdf";
                    $this->session->set_flashdata('errorclass', 'danger');
                    $this->session->set_flashdata('error_message', $error_text);
                    redirect(base_url('employer/tax_computation'));
                }

                if(!empty($res)){
                    $updateData = array(
                    'doc_url'    => trim($docurl),
                    'doc_type'      => 'tax_computation',
                    'updated_at'    => date('Y-m-d h:i:s'),
                    );
                    $user_id = $this->Mod_Common->updateData(TABLE_EMPLOYEE_FORM_PDF, array('id'=>$res->id, 'employer_id' =>$this->employer_id), $updateData);
                }else{
                    $addData = array(
                    'employer_id'   => $this->employer_id,
                    'doc_type'      => 'tax_computation',
                    'doc_url'    => trim($docurl),
                    'created_at'    => date('Y-m-d h:i:s'),
                    'updated_at'    => date('Y-m-d h:i:s'),
                    );
                    $user_id = $this->Mod_Common->insertData(TABLE_EMPLOYEE_FORM_PDF, $addData);
                }
                
                $errors = $this->lang->line('msg_updated_record');
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'success');
                redirect(base_url('employer/tax_computation'));
            }else{
                $errors = $this->lang->line('msg_updated_record');
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'success');
                redirect(base_url('employer/tax_computation'));
            }
    }
   
}
?>