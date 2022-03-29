<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	 //Push Android
	if(!function_exists('send_push_notification_android'))
	{
		function send_push_notification_android($to,$title,$type,$message='',$user_id,$redirect_id='',$redirect_type='')
		{
		   $ci     = & get_instance();
		   $apiKey = $ci->config->item('fcm_server_key');

		   $notification = array('title' =>$title , 'text' => $message,'vibrate' => true, 'sound' => "default");

		   $notification_body = array('title' =>$title , 'text' => $message,'user_id'=>$user_id,'redirect_id'=>$redirect_id,'redirect_type'=>$redirect_type);
          
		   $arrayToSend = array('to' => $to, 'content_available' => true, 'data' => $notification_body,'priority'=>'high');

		   $headers = array(
		           'Authorization: key=' . $apiKey,
		           'Content-Type: application/json'
		       );

		   $ch = curl_init();
		   curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
		   curl_setopt($ch, CURLOPT_POST, true);
		   curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		   curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrayToSend));
		   $response = curl_exec($ch);
		   curl_close($ch);
		  // print_r($response);die;
		   return json_decode($response);
		}
	}

	//Push Ios
	if(!function_exists('send_push_notification_ios'))
	{
		function send_push_notification_ios($to,$title,$type,$message='',$user_id,$redirect_id='',$redirect_type='',$badge_count)
		{
		   $message              = $message;
		   $token                = $to;
		   $title                = $title;
		   $notification_setting = '';

		   $ci = & get_instance();

		   $apiKey = $ci->config->item('fcm_server_key');
		   $msg    = array('body' => $message,
		       'title' => $title,
		       'notification_setting' => $notification_setting,
		       'icon' => 'icon',
		       "badge" => $badge_count,
		       "sound" => "default",
		       "click_action" => "FCM_PLUGIN_ACTIVITY",
		       'redirect_id'=>$redirect_id,
		       'redirect_type'=>$redirect_type
		       //'order_id'=>$order_id
		   );

		   $fields = array(
		       'to' => $token,
		       'notification' => $msg,
		       'data' => $msg,
		       'content_available' => true,
		       'priority' => 'high',
		   );

		   $headers = array(
		       'Authorization: key=' . $apiKey,
		       'Content-Type: application/json',
		   );

		   $ch = curl_init();
		   curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
		   curl_setopt($ch, CURLOPT_POST, true);
		   curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		   curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
			$response = curl_exec($ch);
			curl_close($ch);
			// print_r($response);die;
		   return json_decode($response);
		}
	}

	if(!function_exists('send_notification_message'))
	{
		function send_notification_message($notification_to,$notifications_title,$notification_type,$message,$userId,$redirect_id,$redirect_type,$device_type)
		{
			$ci = & get_instance();
			$ci->load->model('Mod_Common');
			if($notification_to!='')
			{
				if($device_type=='android')
				{
					$response = send_push_notification_android($notification_to,$notifications_title,$notification_type,$message,$userId,$redirect_id,$redirect_type);
				}
				else if($device_type=='ios')
				{
					$where = "user_id='".$userId."' and notifications_type IN('Notification','All') ";	
					$notification_count_data = $ci->Mod_Common->customQuery('select count(*) as unread_count from notifications where read_status="0" and '.$where);
					if(count($notification_count_data)>0)
					{
						$badge_count = ($notification_count_data[0]->unread_count)+1;
					}
					else
					{
						$badge_count = 1;
					}

					$response = send_push_notification_ios($notification_to,$notifications_title,$notification_type,$message,$userId,$redirect_id,$redirect_type,$badge_count);
				}

			    //print_r($response);die;
			    if(isset($response->success) && $response->success==1)
			    {
			    	$add_notifications = $ci->Mod_Common->insertData('notifications', array(
												'user_id'=>$userId,
												'notifications_title'=>$notifications_title,
												'notifications_type'=>'Notification',
												'notifications_msg'=>$message,
												'status'=>1,
												'added_date'=>date('Y-m-d H:i:s'), 
												'added_by'=>$userId, 
												'added_ip'=>$_SERVER['REMOTE_ADDR']));
			    	return true;
			    }
			    else
			    {
			    	return false;
			    }	
			}
		}
	}

	// Get table data 
	function getdatafromtable($tbnm, $condition = array(), $data = '*', $limit = '', $offset = '', $orderby = "", $ordertype = "ASC"){
		$CI = get_instance();
		$CI->load->model('Mod_Common');
		$result = $CI->Mod_Common->getdatafromtable($tbnm, $condition, $data, $limit, $offset, $orderby, $ordertype);
		return $result;

	}

	// Get single table data 
	function rowData($tbnm, $condition = array(), $data = '*', $limit = '', $offset = '', $orderby = "", $ordertype = "ASC"){
		$CI = get_instance();
		$CI->load->model('Mod_Common');
		$result = $CI->Mod_Common->rowData($tbnm, $condition, $data, $limit, $offset, $orderby, $ordertype);
		return $result;

	}


	function encryptPassword($password, $key='')
	{
		$CI = get_instance();
		$CI->load->model('Mod_Common');

		$buffer = $password; 
	    
	    // very simple ASCII key and IV
	    if ($key=='') {
	    	$key = $CI->createRandomString(24);
	    }
	    // hex encode the return value
	  	$ciphertext_dec = password_hash($buffer.'$'.$key, PASSWORD_DEFAULT);
	  	$returnData = array(
	  			'cipherText'=>$ciphertext_dec,
	  			'HashKey'=>$key
	  		);
	  	return $returnData;
	}

	function varifyPassword($password, $key, $hash)
	{
		return password_verify($password.'$'.$key, $hash);
	}

	function createRandomString($length)
	{
		$str = 'QWERTYUIOPLKJHGFDSAZXCVBNM!@#$%^&*()_+-=qwertyuioplkjhgfdsazxcvbnm1234567890';
		$shuffledStr = str_shuffle($str);
		return substr($shuffledStr, 0, $length);
	}

	function sendEmail($from, $name, $to, $subject, $body)
	{
		$CI = get_instance();
		$CI->load->model('Mod_Common');
		
		$CI->load->library('email'); // load email library
		//$config = array();

		/*$config['charset'] = 'utf-8';
		$config['wordwrap'] = TRUE;
		$config['mailtype'] = 'html';

		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'smtp.gmail.com';
		$config['smtp_user'] = 'testmail@consagous.com';
		$config['smtp_pass'] = '@consagous@123@';
		$config['smtp_port'] = 587;*/

		//SMTP & mail configuration
		$config = array(
		    'protocol'  => PROTOCOL,
		    'smtp_host' => SMTP_HOST,
		    'smtp_crypto'=> SMTP_CRYPTO,
		    'smtp_port' => SMTP_PORT,
		    'smtp_user' => SMTP_USER,
		    'smtp_pass' => SMTP_PASS,
		    'mailtype'  => 'html',
		    'charset'   => 'utf-8',
		    'wordwrap'  => TRUE
		);


		$CI->email->initialize($config);
		$CI->email->set_mailtype("html");
		$CI->email->set_newline("\r\n");

		

		$CI->email->from($from, $name);
		$CI->email->to($to);
		$CI->email->subject($subject);
		$CI->email->message($body);
		if ($CI->email->send()){
			return true ;
		}else{
			return false ;
		}
	}


	// Get row details
	if (!function_exists('getdetails')) {
		function getdetails($table, $where){
			$CI = get_instance();
			$CI->load->model('Mod_Common');
			$res = $CI->Mod_Common->rowData($table, $where);
			return $res;
		}
	}

	// Get all details
	if (!function_exists('getAllDetails')) {
		function getAllDetails($table, $where){
			$CI = get_instance();
			$CI->load->model('Mod_Common');
			$res = $CI->Mod_Common->selectData($table, $where);
			return $res;
		}
	}

	// Get all details
	if (!function_exists('getUpdate')) {
		function getUpdate($table, $data, $where){
			$CI = get_instance();
			$CI->load->model('Mod_Common');
			$res = $CI->Mod_Common->updateDataFromTabel($table, $data, $where);
			return $res;
		}
	}

	// Get total count
	if (!function_exists('getTotalCount')) {
		function getTotalCount($table, $where){
			$CI = get_instance();
			$CI->load->model('Mod_Common');
			$tot_row = $CI->Mod_Common->countRows($table,$where);
			return $tot_row;
		}
	}



	// Get random_referral_code
	if (!function_exists('random_referral_code')) {
		function random_referral_code($len = 8) 
		{
		    //enforce min length 8
		    if($len < 8)
		        $len = 8;

		    //define character libraries - remove ambiguous characters like iIl|1 0oO
		    $sets = array();
		    $sets[] = 'ABCDEFGHJKLMNPQRSTUVWXYZ';
		    $sets[] = 'abcdefghjkmnpqrstuvwxyz';
		    $sets[] = '123456789';
		    //$sets[]  = '~!@#$%^&*(){}[],./?';

		    $password = '';
		    
		    //append a character from each set - gets first 4 characters
		    foreach ($sets as $set) {
		        $password .= $set[array_rand(str_split($set))];
		    }

		    //use all characters to fill up to $len
		    while(strlen($password) < $len) {
		        //get a random set
		        $randomSet = $sets[array_rand($sets)];
		        
		        //add a random char from the random set
		        $password .= $randomSet[array_rand(str_split($randomSet))]; 
		    }
		    
		    //shuffle the password string before returning!
		    return str_shuffle($password);
		}
	}



	/*******************************************/

	/* Duplicate country */
	if (!function_exists('duplicateCountry')) {
		function duplicateCountry($table, $country_arr){
			$CI = get_instance();
			$CI->load->model('Mod_Common');
			$country_arr = array($country_arr['field'] => $country_arr['country']);
			//$year_field = $emailarr['field'];
		    $year = $CI->Mod_Common->rowData($table, $country_arr);
		    if(!empty($year)){
		    	$message = $CI->lang->line('dup_country');
		    	return $message;
		    }else{
		    	return '';
		    }
		}
	}

	/* Get country Info */
	if (!function_exists('getCountryInfo')) {
		function getCountryInfo($cid){
			$CI = get_instance();
			$CI->load->model('Mod_Common');
			$where = array('country_id' => $cid);
		    $country = $CI->Mod_Common->rowData(TABLE_COUNTRY_MASTER, $where);
		    if(!empty($country)){
		    	return $country;
		    }else{
		    	return array();
		    }
		}
	}

	/* Get Make Info */
	if (!function_exists('getStateInfo')) {
		function getStateInfo($stateid){
			$CI = get_instance();
			$CI->load->model('Mod_Common');
			$where = array('state_id' => $stateid);
		    $state = $CI->Mod_Common->rowData(TABLE_STATES_MASTER, $where);
		    if(!empty($state)){
		    	return $state;
		    }else{
		    	return array();
		    }
		}
	}


	/* check duplicate year, make  */
	if (!function_exists('getCountryState')) {
		function getCountryState($country, $state){
			$CI = get_instance();
			$CI->load->model('Mod_Common');
			$where = array('state_country_id' => $country, 'state_name' => $state);
		    $country = $CI->Mod_Common->rowData(TABLE_STATES_MASTER, $where);
		    if(!empty($country)){
		    	$message = $CI->lang->line('dup_country_state');
		    	return $message;
		    }else{
		    	return '';
		    }
		}
	}

	/* check duplicate year, make, model */
	if (!function_exists('getCountryStateCity')) {
		function getCountryStateCity($country, $state, $city){
			$CI = get_instance();
			$CI->load->model('Mod_Common');
			$where = array('country_id' => $country, 'state_id' => $state, 'city_name' => $city);
		    $year = $CI->Mod_Common->rowData(TABLE_CITIES_MASTER, $where);
		    if(!empty($year)){
		    	$message = $CI->lang->line('dup_country_state_city');
		    	return $message;
		    }else{
		    	return '';
		    }
		}
	}

	/* Duplicate Make */
	if (!function_exists('duplicateState')) {
		function duplicateState($table, $country_arr){
			$CI = get_instance();
			$CI->load->model('Mod_Common');
			$state_arr = array($country_arr['field'] => $country_arr['state']);
			//$year_field = $emailarr['field'];
		    $state = $CI->Mod_Common->rowData($table, $state_arr);
		    if(!empty($state)){
		    	$message = $CI->lang->line('dup_state');
		    	return $message;
		    }else{
		    	return '';
		    }
		}
	}

	/* Duplicate Make */
	if (!function_exists('dateTime')) {
		function dateTime($date_time){
			return date('Y-m-d', strtotime($date_time));
		}
	}

	/* GET 3 char */
	if (!function_exists('EmployerCode')) {
		function EmployerCode($conpany_info, $employee_id){
			$company_code = substr($conpany_info, 0, 3);
			$num_lenth = strlen((string) $employee_id);
            if($num_lenth == 1){
                $employeeId = sprintf("%03d", $employee_id);
            }else if($num_lenth == 2){
                $employeeId = sprintf("%03d", $employee_id);
            }
            else{
                 $employeeId = $employee_id;
            }
			return strtoupper($company_code).'-'.$employeeId;
		}
	}

	/* Duplicate Make */
	if (!function_exists('getDapartmentHead')) {
		function getDapartmentHead($employee_id){
			$CI = get_instance();
			$CI->load->model('Mod_Common');
			$query = "SELECT hs_employer_department_head.employee_id as head_emp_id FROM hs_users_employer
			LEFT JOIN hs_employer_department_head ON hs_employer_department_head.dep_id = hs_users_employer.employee_department
			WHERE hs_users_employer.employee_id = $employee_id
			";
			$res = $CI->Mod_Common->customQuery($query);
			if(!empty($res[0])){
				$head_info = $CI->Mod_Common->rowData('hs_users_employer', array('employee_id'=>$res[0]->head_emp_id),'full_name, employee_id,email_id');
			}else{
				$head_info = array();
			}
			return $head_info;
		}
	}

	/* duplicate ID */
	if (!function_exists('checkDuplicateID')) {
		function checkDuplicateID($id,$field_name, $table_name){
			$CI = get_instance();
			$CI->load->model('Mod_Common');
			$res = $CI->Mod_Common->rowData($table_name,array($field_name=>$id));
			return $res;
		}
	}

	/* duplicate ID */
	if (!function_exists('getEmployeeInfo')) {
		function getEmployeeInfo($employee_id,$table_name, $select_field){
			$CI = get_instance();
			$CI->load->model('Mod_Common');
			$res = $CI->Mod_Common->rowData($table_name,array('employee_id'=>$employee_id), $select_field);
			return $res;
		}
	}

	/* Month formate */
	if (!function_exists('monthInfo')) {
		function monthInfo($date_info){
			return  date('j M, Y', strtotime($date_info));
		}
	}

	/* Get attendence info and monthly working day */
	if (!function_exists('monthlyWorkingDay')) {
		function monthlyWorkingDay($month,$query){
			$CI = get_instance();
			$CI->load->model('Mod_Common');
			$leave_approved_res = $CI->Mod_Common->customQuery($query);
	        $firstDate = date('Y-m-01', strtotime($month));
        	$lastDate = date('Y-m-t', strtotime($month));
        	$monthName = date('m',strtotime($month));
	        $approv_leave = 0;
	        if(!empty($leave_approved_res) ){
	            foreach ($leave_approved_res as $approval_status) {
	            	$fromMonth = date('m', strtotime($approval_status->from_date));
	            	$toMonth = date('m', strtotime($approval_status->to_date));
	                if($fromMonth == $toMonth){
	                	//echo '<br>'.$fromMonth.' == '. $toMonth;
	                	$approv_leave = $approv_leave + $approval_status->no_of_day;
	                }else{
	                	if($fromMonth == $monthName){
	                		$fromDate=date("Y-m-d", strtotime($approval_status->from_date));
	                		$getNoDay = 0;
							$date1 = date_create($fromDate);
							$date2 = date_create($lastDate);
							$diff = date_diff($date1,$date2);
							
							if($approval_status->leave_val == 'Full'){
								$workDiffDay = $diff->d + 1;
								$getNoDay = $workDiffDay;
							}else{
								$workDiffDay = $diff->d + 1;
								$getNoDay = ($workDiffDay/2);
							}
							$approv_leave = $approv_leave + $getNoDay;
	                	}else{
	                		$toDate=date("Y-m-d", strtotime($approval_status->to_date));
	                		$getNoDay = 0;
	                		
							$date1 = date_create($firstDate);
							$date2 = date_create($toDate);
							
							$diff = date_diff($date1,$date2);
							
							if($approval_status->leave_val == 'Full'){
								$workDiffDay = $diff->d + 1;
								$getNoDay = $workDiffDay;
							}else{
								$workDiffDay = $diff->d + 1;
								$getNoDay = ($workDiffDay/2);
							}
							$approv_leave = $approv_leave + $getNoDay;
	                	} 
	                }
		        }
	        }
			return $approv_leave;
		}
	}

	if (!function_exists('total_monthly_sundays')){
		function total_monthly_sundays($month,$year)
		{
			$sundays=0;
			$total_days=cal_days_in_month(CAL_GREGORIAN, $month, $year);
			for($i=1;$i<=$total_days;$i++){
				if(date('N',strtotime($year.'-'.$month.'-'.$i))==7){
					$sundays++;
				}
			}
			return $sundays;
		}
	}
	
	if (!function_exists('is_decimal')){
		function is_decimal($n) {
	    // Note that floor returns a float 
	    return is_numeric($n) && floor($n) != $n;
		}
	}

	