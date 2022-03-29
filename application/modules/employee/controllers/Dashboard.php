<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MX_Controller  {
 
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
    * function name: dashboard  
    * Details: Load  view
    * @return: 
    * 
    */
    public function dashboard(){
       
        $data['header_title']="HRMS";
        $data['page_title_top']="Employee Dashboard";
        $data['page_heading']="Employee Dashboard";

        $year_name = date('Y');
        $todayDate = date('Y-m-d');

        //$eventDate = date('Y-m-d H:i:s');
        
        $custom_query = "SELECT * FROM hs_employer_holiday WHERE YEAR(holiday_date) = $year_name AND employer_id =  $this->employer_id AND `status` = 'Active' AND DATE(holiday_date) > '$todayDate' ORDER BY holiday_date ASC LIMIT 3";
        $holiday_rec = $this->Mod_Common->customQuery($custom_query);
       
        $cus_event_query = "SELECT * FROM hs_employer_event WHERE start > NOW() AND employer_id =  $this->employer_id AND `status` = 'Active' ORDER BY event_id DESC LIMIT 3";
        $upcoming_event = $this->Mod_Common->customQuery($cus_event_query);
        $data['upcoming_event'] = (!empty($upcoming_event) ? $upcoming_event : '');
        /*echo '<pre>';
        echo $this->db->last_query();
        print_r($upcoming_event);
        echo'<pre>';
        die;*/
        $data['holiday_info'] = (!empty($holiday_rec) ? $holiday_rec : '');


        $user_res = $this->Mod_Common->rowData('hs_users_employer', array('employee_id'=>$this->employee_id, 'employer_id'=>$this->employer_id), 'full_name, employee_id, employer_id, dob, joining_date');
       $data['user_info'] = (!empty($user_res) ? $user_res : '');

        /* Get Leave Record */
        $year_name = date('Y');
        $employerID = $this->employer_id;
        $empID = $this->employee_id;
        $get_leave_info = $this->Mod_Common->customQuery("SELECT ah.assign_id, ah.employee_id, ah.department_id, ah.employer_id, ah.leave_cat_id, ah.leave_assign_val, ah.assign_by, ah.created_at, ah.updated_at, leave_type.leave_type_name as leave_cat_name FROM hs_employee_leave_assign_history as ah
        INNER JOIN hs_employer_leave_type_management as leave_type ON leave_type.leave_cat_id = ah.leave_cat_id
        WHERE ah.employer_id = $employerID AND ah.employee_id = $empID AND YEAR(ah.created_at) = $year_name AND leave_type.status = 'Active'");
        $data['leave_record'] = $get_leave_info;

        /* End Leave Record */

        /* Start holiday */
        $custom_query_holiday = "SELECT * FROM hs_employer_holiday WHERE YEAR(holiday_date) = $year_name AND employer_id = $employerID ORDER BY id DESC";
        $holiday_res = $this->Mod_Common->customQuery($custom_query_holiday);
        $data['holiday_res'] = $holiday_res;
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

           /* echo '<br/> break hour log = '.$break_hour;
            echo '<br/> break min log = '.$break_min;
            echo '<br/> break sec log = '.$break_sec;*/

            $punch_in = $punch_today[0]->punch_in_time;
            $punch_out = $punch_today[0]->punch_out_time;

            if($punch_today[0]->punch_out_time == ''){
                $punch_out = $punch_today[0]->punch_in_time;
            }

            $punch_in_time = new DateTime($punch_in);
            $punch_out_time = new DateTime($punch_out);
            $punch_diff = $punch_in_time->diff($punch_out_time);

            $punch_in_hour1 = $punch_diff->format('%h');
            $punch_in_min = $punch_diff->format('%i');
            $punch_in_sec = $punch_diff->format('%s');
            $punch_in_hour = $punch_in_hour1*60;
            $break_hour = $break_hour*60;
            //$punch_in_min = $punch_in_min;

           /* echo '<br/> punch_in_hour = '.$punch_in_hour;
            echo '<br/> punch_in_min = '.$punch_in_min;
            echo '<br/> $punch_in_sec = '.$punch_in_sec;*/

            $punch_min = $punch_in_hour+$punch_in_min;
            $punch_log_min = $break_hour+$break_min;



            /* echo '<br/> punch min = '.$punch_min;
            echo '<br/> punch log min = '.$punch_log_min;*/
           if($punch_min >= $punch_log_min){
                $woriking_min = $punch_min - $punch_log_min;
           }else{
                $woriking_min = $punch_min;
           }
            

            $working_hour = floor($woriking_min / 60).':'.($woriking_min -   floor($woriking_min / 60) * 60);

            $data['hours'] = $working_hour;
            $data['break_time'] = floor($punch_log_min / 60).':'.($punch_log_min -   floor($punch_log_min / 60) * 60);;

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
            }else{
                $data['hours'] = 0;
                $data['break_time'] = 0;
            }
            
        }
        //die;
        /* End */
        /*echo'<pre>';
        print_r($data);
        echo'<pre>';*/
        //die;

        $this->employee_template->load('employee_template','employee/dashboard/dashboard', $data); 
    }

    /**
    * Sort Description.
    * function name: hrmsDepartment  
    * Details: Load hrms department view
    * @return: 
    * 
    */
    public function hrmsDepartment(){
        $data['header_title']="HRMS";
        $data['page_title_top']="HR Dashboard";
        $data['page_heading']="Welcome";
        $this->employer_template->load('employer_template','employer/hrms/hr_departments', $data); 
    }

    /**
    * Sort Description.
    * function name: hrmsHoliday  
    * Details: Load hrms holiday view
    * @return: 
    * 
    */
    public function hrmsHoliday(){
        $data['header_title']="HRMS";
        $data['page_title_top']="HR Dashboard";
        $data['page_heading']="Welcome";
        $this->employer_template->load('employer_template','employer/hrms/hr_holidays', $data); 
    }

    /**
    * Sort Description.
    * function name: hrmsEvents  
    * Details: Load hrms events view
    * @return: 
    * 
    */
    public function hrmsEvents(){
        $data['header_title']="HRMS";
        $data['page_title_top']="HR Dashboard";
        $data['page_heading']="Welcome";
        $this->employer_template->load('employer_template','employer/hrms/hr_events', $data); 
    }

    /**
    * Sort Description.
    * function name: hrmsAccounts  
    * Details: Load hrms accounts view
    * @return: 
    * 
    */
    public function hrmsAccounts(){
        $data['header_title']="HRMS";
        $data['page_title_top']="HR Dashboard";
        $data['page_heading']="Welcome";
        $this->employer_template->load('employer_template','employer/hrms/hr_accounts', $data); 
    }
   
}
?>