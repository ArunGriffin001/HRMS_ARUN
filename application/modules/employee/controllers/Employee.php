<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Employee extends MX_Controller  {
 
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
    * function name: employeeList  
    * Details: Load  view
    * @return: 
    * 
    */
    public function employeeList(){

        $data['header_title']="HRMS";
        $data['page_title_top']="Employee";
        $data['page_heading']="Employee List";
        $this->employee_template->load('employee_template','employee/employee/employee_list', $data); 
    }

     /**
    * Sort Description.
    * function name: projectList  
    * Details: Load view
    * @return: 
    * 
    */
    public function projectList(){
        $data['header_title']="HRMS";
        $data['page_title_top']="Attendance";
        $data['page_heading']="Attendance";
        $this->employee_template->load('employee_template','employee/employee/project_list', $data); 
    }

    /**
    * Sort Description.
    * function name: attendence  
    * Details: Load view
    * @return: 
    * 
    */
    public function attendence(){
        $data['header_title']="HRMS";
        $data['page_title_top']="Attendance";
        $data['page_heading']="Attendance";

        $employerID = $this->employer_id;
        $empID = $this->employee_id;

        $today = date('Y-m-d');
        $punch_today_query = "SELECT * FROM hs_employee_punching WHERE  employer_id = $employerID AND employee_id =  $empID AND DATE(created_at) = '$today' ";

        $punch_today = $this->Mod_Common->customQuery($punch_today_query);

        $data['punch_today'] = (!empty($punch_today[0]) ? $punch_today[0] : '');

        $data['punch_log'] = '';
        if(!empty($punch_today)){
            $punching_id = $punch_today[0]->punching_id;
            $punch_log = "SELECT * FROM hs_employee_punching_log WHERE  punching_id = $punching_id AND DATE(created_at) = '$today' ";

            $punch_log = $this->Mod_Common->customQuery($punch_log);
        }

        $data['punch_log'] = (!empty($punch_log) ? $punch_log : '');
        /*echo'<pre>';
        print_r($data['punch_log']);
        echo'</pre>';
        die;*/
        $hour = '0';
        $min = '0';
        $second = '0';

        if(!empty($punch_log) && !empty($punch_today)){
            $break_hour = 0; $break_min = 0; $break_sec = 0;
            $punch_in = 0; $punch_out = 0; $punch_in_hour = 0;
            $punch_in_min = 0; $punch_in_sec = 0;
            foreach ($punch_log as $punch_val) {
               /* $time1 = ''; $time2 = ''; $hour = ''; $min = ''; $second = '';*/
                $break_in = $punch_val->break_in;
                $break_out = $punch_val->break_out;

                if($punch_val->break_out == ''){
                    $break_out = $punch_val->break_in;
                }

                $time1 = new DateTime($break_in);
                $time2 = new DateTime($break_out);
                $timediff = $time1->diff($time2);
                $hour = $timediff->format('%h');
                $min = $timediff->format('%i');
                $second = $timediff->format('%s');
                
                $break_hour = $hour + $break_hour;
                $break_min = $min + $break_min;
                $break_sec = $second + $break_sec;
                
            }

            $punch_in = $punch_today[0]->punch_in_time;
            $punch_out = $punch_today[0]->punch_out_time;

            if($punch_today[0]->punch_out_time == ''){
                $punch_out = $punch_today[0]->punch_in_time;
            }

            $punch_in_time = new DateTime($punch_in);
            $punch_out_time = new DateTime($punch_out);
            $punch_diff = $punch_in_time->diff($punch_out_time);

            $punch_in_hour = $punch_diff->format('%h');
            $punch_in_min = $punch_diff->format('%i');
            $punch_in_sec = $punch_diff->format('%s');
            $punch_in_hour = $punch_in_hour*60;

            $break_hour = $break_hour*60;
            //$punch_in_min = $punch_in_min;

            $punch_min = $punch_in_hour+$punch_in_min;
            $punch_log_min = $break_hour+$break_min;
            $woriking_min = $punch_min - $punch_log_min;
            $working_hour = floor($woriking_min / 60).':'.($woriking_min -   floor($woriking_min / 60) * 60);
            $data['hours'] = $working_hour;
            $data['break_time'] = floor($punch_log_min / 60).':'.($punch_log_min -   floor($punch_log_min / 60) * 60);

        }else{
            if(!empty($punch_today[0])){
                $punch_in = $punch_today[0]->punch_in_time;
                $punch_out = $punch_today[0]->punch_out_time;

                if($punch_today[0]->punch_out_time == ''){
                    $punch_out = $punch_today[0]->punch_in_time;
                }

                $punch_in_time = new DateTime($punch_in);
                $punch_out_time = new DateTime($punch_out);
                $punch_diff = $punch_in_time->diff($punch_out_time);

                $punch_in_hour = $punch_diff->format('%h');
                $punch_in_min = $punch_diff->format('%i');
                $punch_in_sec = $punch_diff->format('%s');

                $punch_in_hour = $punch_in_hour * 60;
                $woriking_min = $punch_in_hour + $punch_in_min;
                $working_hour = floor($woriking_min / 60).':'.($woriking_min -   floor($woriking_min / 60) * 60);
                $data['hours'] = $working_hour;
                $data['break_time'] = 0;
                $data['break_sec_to_min'] = 0;
            }else{
                $data['hours'] = 0;
                $data['break_time'] = 0;
                $data['break_sec_to_min'] = 0;
            } 
        }

        /* Lunching Log calculation */
        $punch_all_query = "SELECT punch.punching_id, punch.employee_id, punch.punch_in_time, punch.punch_out_time, punch.created_at as punch_create, punch.manual_log,punch.punch_status2,punch.break_status as punch_break_status, punch_log.log_id, punch_log.punching_id as log_punching_id, punch_log.break_in, punch_log.break_out, punch_log.created_at as punch_log_create_at, punch_log.break_status as punch_log_break_status  FROM hs_employee_punching as punch
        LEFT JOIN hs_employee_punching_log as punch_log ON punch_log.punching_id = punch.punching_id
        WHERE punch.employer_id = $employerID AND punch. employee_id = $empID
        AND DATE(punch.created_at) < '$today' ORDER BY punch.punch_in_time DESC
        ";
        $punch_all = $this->Mod_Common->customQuery($punch_all_query);
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
                    $break_in = ''; $break_out = ''; $time1 = ''; $time2 = ''; $timediff = ''; $hour = ''; $min = ''; $second = ''; $break_hour = ''; $break_min = ''; $break_sec = ''; $secondto_min = 0;
            
                    $punch['log'][$pkey]['punch_in'] = date('g:i A', strtotime($log_val->punch_in_time));
                    $punch['log'][$pkey]['punch_status2'] = $log_val->punch_status2;
                    $punch['log'][$pkey]['punch_log_break_status'] = $log_val->punch_log_break_status;
                    $punch['log'][$pkey]['punch_date'] = $log_val->punch_create;
                    $punch['log'][$pkey]['manual_log'] = $log_val->manual_log;
                    if($log_val->punch_out_time != '' && $log_val->punch_status2 == 'OUT'){
                        $punch['log'][$pkey]['punch_out'] = date('g:i A', strtotime($log_val->punch_out_time));
                    }else{
                        $punch['log'][$pkey]['punch_out'] = '';
                        $punch['log'][$pkey]['hours'] = '';
                        $punch['log'][$pkey]['break_time'] = '';
                         $punch['log'][$pkey]['break_sec_to_min'] = '';
                        $punch['log'][$pkey]['manual_log'] = $log_val->manual_log;
                        //break;
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
                            $break_sec = (int)$second + (int)$break_sec;
                            //echo 'second = '.$break_sec;

                        }else{
                            $punch_in_hour = 0;
                            $break_hour = 0;
                            $break_min = 0;
                            $break_sec = 0;
                            $secondto_min = 0;
                        }
                        
                        /* Start punching hour calculation */
                        $punch_in = $log_val->punch_in_time;
                        $punch_out = $log_val->punch_out_time;

                        if($punch_out == '' ){
                            $punch_out = $punch_in;
                        }

                        $punchInTime = new DateTime($punch_in);
                        $punchOutTime = new DateTime($punch_out);
                        $punch_diff = $punchInTime->diff($punchOutTime);

                        $punch_in_hour = ((float)$punch_diff->format('%h'));
                        $punch_in_min = ((float)$punch_diff->format('%i'));
                        $punch_in_sec = ((float)$punch_diff->format('%s'));

                        $punch_in_hour = $punch_in_hour*60;

                        $break_hour = $break_hour*60;

                        $punch_min = ((float)$punch_in_hour + (float)$punch_in_min);
                        $punch_log_min = ((float)$break_hour + (float)$break_min);
                        $woriking_min = $punch_min - $punch_log_min;
                        $working_hour = $woriking_min - $punch_log_min;
                        $working_hour = floor($woriking_min / 60).':'.($woriking_min -   floor($woriking_min / 60) * 60);
                        $punch['log'][$pkey]['hours'] =$working_hour;
                        $punch['log'][$pkey]['break_time'] =floor($punch_log_min / 60).':'.($punch_log_min -   floor($punch_log_min / 60) * 60);

                        $secondto_min = (int)$secondto_min + (int)$break_sec;

                        $punch['log'][$pkey]['break_sec_to_min'] = $secondto_min;

                        /* End */

                    }else{
                        $punch['log'][$pkey]['hour'] = '';
                    }
                }
            }
             arsort($punch['log']);
        }else{
            $punch['log'] = '';
        }

        $data['log'] = $punch['log'];
        /* End */

        $this->employee_template->load('employee_template','employee/employee/attendence', $data); 
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
        $this->employee_template->load('employee_template','employee/employee/leave', $data); 
    }

    /**
    * Sort Description.
    * function name: calender  
    * Details: Load view
    * @return: 
    * 
    */
    public function calender(){
        $data['header_title']="HRMS";
        $data['page_title_top']="Calendar";
        $data['page_heading']="Calendar";
        $this->employee_template->load('employee_template','employee/employee/calender', $data); 
    }

    /**
    * Sort Description.
    * function name: holiday  
    * Details: Load view
    * @return: 
    * 
    */
    public function holiday(){
        $data['header_title']   =  "HRMS";
        $data['page_title_top'] =   "Holidays";
        $data['page_heading']   =  "Holidays";
        $this->employee_template->load('employee_template','employee/employee/hr_holidays', $data); 
    }

    /**
    * Sort Description.
    * function name: myProfile  
    * Details: Load view
    * @return: 
    * 
    */
    public function myProfile(){
        $data['header_title']="HRMS";
        $data['page_title_top']="My Profile";
        $data['page_heading']="My Profile";
        $query = "SELECT eu.*, e_dept.dept_name, e_desi.name as emp_desination, country.name as country_name, state.name as state_name, city.name as city_name FROM hs_users_employer as eu
        INNER JOIN hs_employer_department AS e_dept
        ON e_dept.dep_id = eu.employee_department
        INNER JOIN hs_employer_desination AS e_desi
        ON e_desi.id = eu.employee_designation
        LEFT JOIN hs_countries as country
        ON country.id = eu.country_id
        LEFT JOIN hs_states as state
        ON state.id = eu.state_id
        LEFT JOIN hs_cities as city
        ON city.id = eu.city_id
        WHERE eu.employee_id = $this->employee_id AND eu.employer_id = $this->employer_id LIMIT 1";
        $res = $this->Mod_Common->customQuery($query);
        /*echo'<pre>';
        print_r($this->login_data);
        echo $this->db->last_query();
        print_r($res);
        echo'</pre>';
        die;*/
        $data['emp_info'] = $res[0];
        $this->employee_template->load('employee_template','employee/employee/my_profile', $data);
    }

    /**
    * Sort Description.
    * function name: profileLevelOne  
    * Details: Load view
    * @return: 
    * 
    */
    public function profileLevelOne(){

       
       $query = "SELECT eu.*, e_dept.dept_name, e_desi.name as emp_desination, country.name as country_name, state.name as state_name, city.name as city_name FROM hs_users_employer as eu
        INNER JOIN hs_employer_department AS e_dept
        ON e_dept.dep_id = eu.employee_department
        INNER JOIN hs_employer_desination AS e_desi
        ON e_desi.id = eu.employee_designation
        LEFT JOIN hs_countries as country
        ON country.id = eu.country_id
        LEFT JOIN hs_states as state
        ON state.id = eu.state_id
        LEFT JOIN hs_cities as city
        ON city.id = eu.city_id
        WHERE eu.employee_id = $this->employee_id AND eu.employer_id = $this->employer_id LIMIT 1";
        $res = $this->Mod_Common->customQuery($query);
       
        $data['emp_info'] = $res[0];
        $data['header_title']="HRMS";
        $data['page_title_top']="My Profile";
        $data['page_heading']="Profile Info";
        $this->employee_template->load('employee_template','employee/employee/profile/level_one', $data);
    }

    /**
    * Sort Description.
    * function name: UpdateUserProfileLevelOne  
    * Details: add record as per department type
    * @return: 
    * 
    */
    public function UpdateUserProfileLevelOne(){
        $this->form_validation->set_rules('first_name', 'First name','trim|required');
        $this->form_validation->set_rules('last_name', 'Last name','trim|required');
       
        $this->form_validation->set_rules('mobile_no', 'Mobile number','trim|required|min_length[10]|max_length[12]');
        $this->form_validation->set_rules('gender', 'Gender','trim|required');
        $this->form_validation->set_rules('dob', 'Date of birth','trim|required');

        if ($this->form_validation->run() == FALSE) 
        {
            $errors = $this->transformErrorsToArray(validation_errors());
            
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'danger');
            redirect(base_url('employee/my-profile/edit_level_one/'));
        }
        else
        {
            
            /*echo'<pre>';
            print_r($this->input->post());
            echo'</pre>';
            die;*/
            extract($this->input->post());
            //$employeedoc = '';
            $full_name = trim($first_name).''.trim($last_name);

            $profileimg = '';
            $asset_type = MEDIA_PICTURE;
            if (!empty($_FILES['profile_img']['name'])) {
                $dirPathThumb =  './uploads/employer/users/users_thumb/'; 
                $profile_img = $this->Mod_Common->fileupload_resize('profile_img', 'uploads/employer/users/','Picture',$dirPathThumb,'320','100');

                if(!empty($profile_img)){
                    $profileimg = $profile_img;
                    $path = './uploads/employee/thumb/'.$old_img;
                     $path2 = './uploads/employee/'.$old_img;
                    if(!empty($old_img)){
                        unlink($path);
                        unlink($path2);
                    }
                    
                }else{
                    $error_text = "Need file type should be $asset_type";
                    $this->session->set_flashdata('errorclass', 'danger');
                    $this->session->set_flashdata('error_message', $error_text);
                    //$this->template->load('default', 'slider/add_slider', $this->data);
                    redirect(base_url(''));
                }

                 $updatedData = array(
                    'first_name'            => trim($first_name),
                    'last_name'             => trim($last_name),
                    'full_name'             => trim($full_name),
                    'mobile_no'             => trim($mobile_no),
                    'dob'                   => trim(date('Y-m-d',strtotime($dob))),
                    'address'               => trim($address),
                    'alternate_address'     => trim($alternate_address),
                    'communication_address' => trim($communication_address),
                    'gender'                => trim($gender),
                    'profile_img'           => trim($profileimg),
                    );
            }else{
                 $updatedData = array(
                    'first_name'            => trim($first_name),
                    'last_name'             => trim($last_name),
                    'full_name'             => trim($full_name),
                    'mobile_no'             => trim($mobile_no),
                    'dob'                   => trim(date('Y-m-d',strtotime($dob))),
                    'address'               => trim($address),
                    'alternate_address'     => trim($alternate_address),
                    'communication_address' => trim($communication_address),
                    'gender'                => trim($gender),
                    );
            }

           /* echo'<pre>';
            echo $this->employee_id;
            echo'<br>'. $this->employer_id;
            print_r($this->input->post());
            print_r($updatedData);
            echo'</pre>';
            die;*/
            $user_id = $this->Mod_Common->updateData(TABLE_USERS_EMPLOYER, array('employee_id' => $this->employee_id, 'employer_id' => $this->employer_id ), $updatedData);

                $errors = $this->lang->line('msg_updated_record');
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'success');
                redirect(base_url('employee/my-profile/edit_level_one'));
            
        }
    }

    /**
    * Sort Description.
    * function name: profileLevelOne  
    * Details: Load view
    * @return: 
    * 
    */
    public function profileLevelTwo(){

       
       $query = "SELECT eu.*, e_dept.dept_name, e_desi.name as emp_desination, country.name as country_name, state.name as state_name, city.name as city_name FROM hs_users_employer as eu
        INNER JOIN hs_employer_department AS e_dept
        ON e_dept.dep_id = eu.employee_department
        INNER JOIN hs_employer_desination AS e_desi
        ON e_desi.id = eu.employee_designation
        LEFT JOIN hs_countries as country
        ON country.id = eu.country_id
        LEFT JOIN hs_states as state
        ON state.id = eu.state_id
        LEFT JOIN hs_cities as city
        ON city.id = eu.city_id
        WHERE eu.employee_id = $this->employee_id AND eu.employer_id = $this->employer_id LIMIT 1";
        $res = $this->Mod_Common->customQuery($query);

        $country_res = $this->Mod_Common->customQuery("SELECT * FROM hs_countries");
        
        $data['country'] = $country_res;
        $stateData = $this->Mod_Common->rowData('hs_states', array('id'=>$res[0]->state_id));
        $cityData = $this->Mod_Common->rowData(' hs_cities', array('id'=>$res[0]->city_id));
        $data['state_data'] = $stateData;
        $data['city_data'] = $cityData;
       /* echo'<pre>';
        print_r($stateData);
        print_r($cityData);
        echo'</pre>';
        die;*/
        $data['emp_info'] = $res[0];
        $data['header_title']="HRMS";
        $data['page_title_top']="My Profile";
        $data['page_heading']="Personal Informations";
        $this->employee_template->load('employee_template','employee/employee/profile/level_second', $data);
    }

    /**
    * Sort Description.
    * function name: UpdateUserProfileLevelOne  
    * Details: add record as per department type
    * @return: 
    * 
    */
    public function UpdateUserProfileLevelTwo(){
        $this->form_validation->set_rules('country_id', 'Country name','trim|required');
        $this->form_validation->set_rules('state_id', 'State name','trim|required');
        $this->form_validation->set_rules('city_id', 'City name','trim|required');
        $this->form_validation->set_rules('pan_number', 'PAN number','trim|required');
        $this->form_validation->set_rules('aadhar_number', 'Aadhar nnumber','trim|required');

        if ($this->form_validation->run() == FALSE) 
        {
            $errors = $this->transformErrorsToArray(validation_errors());
            
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'danger');
            redirect(base_url('employee/my-profile/edit_level_two'));
        }
        else
        {
            
            /*echo'<pre>';
            print_r($this->input->post());
            echo'</pre>';
            die;*/
            extract($this->input->post());
            //$employeedoc = '';
             $updatedData = array(
                'country_id'            => trim($country_id),
                'state_id'              => trim($state_id),
                'city_id'               => trim($city_id),
                'pan_number'            => trim($pan_number),
                'aadhar_number'         => trim($aadhar_number),
                'UAN_number'     => trim($UAN_number),
                'PF_reg_number' => trim($PF_reg_number),
                'pran_number'                => trim($pran_number),
                );
            /*echo'<pre>';
            print_r($this->input->post());
             print_r($updatedData);
            echo'</pre>';
            die;*/

            $user_id = $this->Mod_Common->updateData(TABLE_USERS_EMPLOYER, array('employee_id' => $this->employee_id, 'employer_id' => $this->employer_id ), $updatedData);

                $errors = $this->lang->line('msg_updated_record');
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'success');
                redirect(base_url('employee/my-profile/edit_level_two'));
        }
    }

    /**
    * Sort Description.
    * function name: profileLevelOne  
    * Details: Load view
    * @return: 
    * 
    */
    public function profileLevelThree(){

       
       $query = "SELECT eu.*, e_dept.dept_name, e_desi.name as emp_desination, country.name as country_name, state.name as state_name, city.name as city_name FROM hs_users_employer as eu
        INNER JOIN hs_employer_department AS e_dept
        ON e_dept.dep_id = eu.employee_department
        INNER JOIN hs_employer_desination AS e_desi
        ON e_desi.id = eu.employee_designation
        LEFT JOIN hs_countries as country
        ON country.id = eu.country_id
        LEFT JOIN hs_states as state
        ON state.id = eu.state_id
        LEFT JOIN hs_cities as city
        ON city.id = eu.city_id
        WHERE eu.employee_id = $this->employee_id AND eu.employer_id = $this->employer_id LIMIT 1";
        $res = $this->Mod_Common->customQuery($query);
       /* echo'<pre>';
        print_r($stateData);
        print_r($cityData);
        echo'</pre>';
        die;*/
        $data['emp_info'] = $res[0];
        $data['header_title']="HRMS";
        $data['page_title_top']="My Profile";
        $data['page_heading']="Emergency Contact";
        $this->employee_template->load('employee_template','employee/employee/profile/level_three', $data);
    }

    /**
    * Sort Description.
    * function name: UpdateUserProfileLevelOne  
    * Details: add record as per department type
    * @return: 
    * 
    */
    public function UpdateUserProfileLevelThree(){
        $this->form_validation->set_rules('fathers_name', 'Fathers name','trim|required');
        $this->form_validation->set_rules('emergency_primary_phone_number', 'Father mobile number','trim|required');
        $this->form_validation->set_rules('mothers_name', 'Mothers name','trim|required');
        $this->form_validation->set_rules('emergency_secondary_phone_number', 'Mother mobile number','trim|required');

        if ($this->form_validation->run() == FALSE) 
        {
            $errors = $this->transformErrorsToArray(validation_errors());
            
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'danger');
            redirect(base_url('employee/my-profile/edit_level_three'));
        }
        else
        {
            
            /*echo'<pre>';
            print_r($this->input->post());
            echo'</pre>';
            die;*/
            extract($this->input->post());
            //$employeedoc = '';
             $updatedData = array(
                'fathers_name'            => trim($fathers_name),
                'emergency_primary_phone_number' => trim($emergency_primary_phone_number),
                'mothers_name'               => trim($mothers_name),
                'emergency_secondary_phone_number'  => trim($emergency_secondary_phone_number),
                );
            /*echo'<pre>';
            print_r($this->input->post());
             print_r($updatedData);
            echo'</pre>';
            die;*/

            $user_id = $this->Mod_Common->updateData(TABLE_USERS_EMPLOYER, array('employee_id' => $this->employee_id, 'employer_id' => $this->employer_id ), $updatedData);

                $errors = $this->lang->line('msg_updated_record');
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'success');
                redirect(base_url('employee/my-profile/edit_level_three'));
        }
    }



    /**
    * Sort Description.
    * function name: profileLevelOne  
    * Details: Load view
    * @return: 
    * 
    */
    public function employeeDoc(){

        $data['header_title']="HRMS";
        $data['page_title_top']="Employee doc";
        $data['page_heading']="Employee doc";
        $res = $this->Mod_Common->customQuery("SELECT * FROM hs_employee_document WHERE employee_id = $this->employee_id AND employer_id = $this->employer_id");
        /*echo"<pre>";
        print_r($res);
        echo'</pre>';
        die;*/
        $data['res'] = $res;
        $data['dir_name'] =  base_url().'/uploads/employee/others/';
        $this->employee_template->load('employee_template','employee/employee/doc/list', $data);
    }

        /**
    * Sort Description.
    * function name: uploadEmployeeDoc  
    * Details: add record as per department type
    * @return: 
    * 
    */
    public function uploadEmployeeDoc(){
        $this->form_validation->set_rules('doc_title', 'Title','trim|required');

        if ($this->form_validation->run() == FALSE) 
        {
            $errors = $this->transformErrorsToArray(validation_errors());
            
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'danger');
            redirect(base_url('employee/employee/doc-list'));
        }
        else
        {
            
           
            extract($this->input->post());
            //$employeedoc = '';
            $docurl = '';
            $asset_type = "DOC";
            if (!empty($_FILES['doc_file']['name'])) {
                $dirPathThumb =  ''; 
                $doc_url = $this->Mod_Common->docFilePpload('doc_file', 'uploads/employee/others','DOC',$dirPathThumb);

                if(!empty($doc_url)){
                    $docurl = $doc_url;
                    
                }else{
                    $error_text = "Need file type should be pdf|doc|docx|xls|xlsx|jpg|jpeg|png|gif";
                    $this->session->set_flashdata('errorclass', 'danger');
                    $this->session->set_flashdata('error_message', $error_text);
                    //$this->template->load('default', 'slider/add_slider', $this->data);
                    redirect(base_url('employee/employee/doc-list'));
                }

                 $addData = array(
                    'employee_id'            => $this->employee_id,
                    'employer_id'             => $this->employer_id,
                    'doc_type'             => 3,
                    'doc_title'             => trim($doc_title),
                    'doc_url'               => trim($docurl),
                    'created_at'    => date('Y-m-d h:i:s'),
                    'updated_at'    => date('Y-m-d h:i:s'),
                    );
                $user_id = $this->Mod_Common->insertData('hs_employee_document', $addData);

                $errors = $this->lang->line('msg_updated_record');
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'success');
                redirect(base_url('employee/employee/doc-list'));
            }else{
                $errors = "Something is wrong, please try again";
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'denger');
                redirect(base_url('employee/employee/doc-list'));
            }

           /* echo'<pre>';
            echo $this->employee_id;
            echo'<br>'. $this->employer_id;
            print_r($this->input->post());
            print_r($updatedData);
            echo'</pre>';
            die;*/
           
            
        }
    }


    /**
    * Sort Description.
    * function name: resignation  
    * Details: Load view
    * @return: 
    * 
    */
    public function resignation(){
        $data['header_title']="HRMS";
        $data['page_title_top']="Resignation";
        $data['page_heading'] = "Resignation";

        $data['get_data'] = $this->Mod_Common->selectData('hs_resignation', array('employer_id'=>$this->employer_id,'employee_id'=>$this->employee_id));
        $this->employee_template->load('employee_template','employee/employee/resignation', $data); 
    }

    public function add_resignation(){
        $data['header_title']="HRMS";
        $data['page_title_top']="Resignation";
        $data['page_heading']="Resignation";
        $this->employee_template->load('employee_template','employee/payroll/add_resignation', $data); 
    }

    public function submitResignation(){

         $this->form_validation->set_rules('main_reason', 'Main reason','trim|required');
        $this->form_validation->set_rules('other_reason', 'Other reason date','trim|required');
        extract($this->input->post());
        if ($this->form_validation->run() == FALSE) 
        {
            $errors = $this->transformErrorsToArray(validation_errors());
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'danger');
            $redirect_url = base_url('employee/employee/resignation/add');
            redirect($redirect_url);
        }else{
              
            $addedData = array('employee_id'=>$this->employee_id,'employer_id'=>$this->employer_id,'main_reason'=>$main_reason,'other_reason'=>$other_reason);

            $insert_id = $this->Mod_Common->insertData('hs_resignation', $addedData);

            if($insert_id){
                $errors = $this->lang->line('msg_insert_record');
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'success');
                redirect(base_url('employee/employee/resignation'));
            }else{
                $errors = $this->lang->line('msg_wrong');
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'danger');
                redirect(base_url('employee/employee/resignation/add'));
            }
        }
    }

    /**
    * Sort Description.
    * function name: applyLeaveRegularization  
    * Details: view
    * @return: 
    * 
    */
    public function applyLeaveRegularization($punch_id){

        $punchID = decode($punch_id);
        $punching_info = $this->Mod_Common->rowData('hs_employee_punching', array('punching_id' => $punchID));
        $data['punching_info'] = '';
        if(!empty($punching_info)){
            $data['punching_info'] = $punching_info;
        }

        $data['header_title']="HRMS";
        $data['page_title_top']="Apply Regularization Leave";
        $data['page_heading']="Apply Regularization Leave";
        $year_name = date('Y');
        $employerID = $this->employer_id;
        $empID = $this->employee_id;
        $get_leave_info = $this->Mod_Common->customQuery("SELECT ah.assign_id, ah.employee_id, ah.department_id, ah.employer_id, ah.leave_cat_id, ah.leave_assign_val, ah.assign_by, ah.created_at, ah.updated_at, leave_type.leave_type_name as leave_cat_name FROM hs_employee_leave_assign_history as ah
        INNER JOIN hs_employer_leave_type_management as leave_type ON leave_type.leave_cat_id = ah.leave_cat_id
        WHERE ah.employer_id = $employerID AND ah.employee_id = $empID AND YEAR(ah.created_at) = $year_name AND leave_type.status = 'Active'");
        $data['get_leave_info'] = $get_leave_info;

       /* echo'<pre>';
        print_r($get_leave_info);
        echo'</pre>';
        die;*/

        $this->employee_template->load('employee_template','employee/employee/apply_regularization_leave', $data); 
    }

    /**
    * Sort Description.
    * function name: regularization  
    * Details: Load view
    * @return: 
    * 
    */
    public function regularization($punchID = ''){

        $data['punch_info'] = '';
        $punchId = decode($punchID);
        $punch_info = $this->Mod_Common->rowData('hs_employee_punching', array('punching_id'=> $punchId));
        if(!empty($punch_info)){
            $data['punch_info'] = $punch_info;
        }

        $data['remark'] = array('Present','Regularised','Regularization Applied','Leave Applied','Leave','Weekly Off','Declared Holiday','Birthday Leave','Maternity Leave','Paternity leave');

        $data['header_title']="HRMS";
        $data['page_title_top']="Regularization";
        $data['page_heading']="Regularization";
       
        $this->employee_template->load('employee_template','employee/employee/regularization_log', $data); 
    }

    /**
    * Sort Description.
    * function name: regularization  
    * Details: Load view
    * @return: 
    * 
    */
    public function addRegularization(){

        $this->form_validation->set_rules('message', 'Reason','trim|required');
        $this->form_validation->set_rules('from_date', 'From date','trim|required');
        $this->form_validation->set_rules('to_date', 'To date','trim|required');
        $this->form_validation->set_rules('remark', 'Remark','trim|required');
        extract($this->input->post());
        if ($this->form_validation->run() == FALSE) 
        {
            $errors = $this->transformErrorsToArray(validation_errors());
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'danger');
            $redirect_url = base_url('employee/employee/regularization');
            if(!empty($punch_id)){
                $redirect_url = base_url('employee/employee/regularization/').$punch_id;
            }
            redirect($redirect_url);
        }
        else
        {

            $from_date_time =  strtotime($from_date);
            $to_date_time = strtotime($to_date);
            $today = strtotime(date('Y-m-d'));
           /* $checkFromDate = date('Y-m-d', $from_date_time);
            $checkToDate = date('Y-m-d', $to_date_time);*/
            $redirect_url = base_url('employee/employee/regularization');
            
            if($from_date_time > $to_date_time && empty($punch_id)){
                $errors = 'To date and time is should be always greater than from date.';
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'danger');
                redirect($redirect_url);
            }

            if($from_date_time >= $today  && empty($punch_id)){
                $errors = 'From date should be less than from current date.';
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'danger');
                redirect($redirect_url);
            }
            if($to_date_time  >= $today  && empty($punch_id)){
                $errors = 'To date should be less than from current date.';
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'danger');
                redirect($redirect_url);
            }

            /*echo $from_date_time .' >= '. $today .' && '. $to_date_time .' >= '. $today;
            die;*/
            if(!empty($punch_id)){
                $fromDate = date('Y-m-d 09:30:00', strtotime($from_date));
                $toDate = date('Y-m-d 18:35:00', strtotime($to_date));
            }else{
                $fromDate = date('Y-m-d H:i:s', strtotime($from_date));
                $toDate = date('Y-m-d H:i:s', strtotime($to_date));
            }
            
            /*echo '<br><pre>';
            print_r($this->input->post());
            echo'</pre>';
            die;*/
            //$punch_date = decode($punch_in_time);
            

            $addedData = array(
                    'employee_id'   => $this->employee_id,
                    'employer_id'   => $this->employer_id,
                    'supervisor_id' => trim(decode($supervisor_id)),
                    'from_date'     => $fromDate,
                    'to_date'       => $toDate,
                    'remark'        =>$remark,
                    'message'     => trim($message),
                    'status'     => 'Pending',
                    'created_at'     => date('Y-m-d H:i:s'),
                    'updated_at'    => date('Y-m-d H:i:s'),
                    );
            if(!empty($punch_id)){
                $punchID = decode($punch_id);
                $addedData['punch_id'] = $punchID;

                $updateData1 = array('manual_log' =>'Pending');
                $upWhere1 = array('punching_id' =>$punchID);
                $update_status1 = $this->Mod_Common->updateDataFromTabel('hs_employee_punching', $updateData1, $upWhere1);
            }
            $status = $this->Mod_Common->insertData('hs_employee_regularization', $addedData);



            if($status){
                $errors = 'Your request has beeen sent successfully to your manager/admin, thanks!';
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'success');
                
                if(!empty($punch_id)){
                    $redirect_url = base_url('employee/employee/my-manaul-log');
                }
                redirect($redirect_url);

            }else{
                $errors = 'Sorry, some thing is wrong, please contact to your admin.';
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'danger');
                if(!empty($punch_id)){
                    $redirect_url = base_url('employee/employee/my-manaul-log');
                }
                redirect($redirect_url);
            }
       
        }
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
       
        $data['get_leave_request'] = '';

        $query = "SELECT ER.*, EU.first_name, EU.last_name ,EU.employee_department FROM hs_employee_regularization AS ER
        INNER JOIN hs_users_employer AS EU ON EU.employee_id = ER.employee_id 
        WHERE
        ER.employee_id = $this->employee_id ORDER BY ER.id DESC
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
        $this->employer_template->load('employee_template','employee/manual_log/manual_log_list', $data);
    }

   
}
?>