<?php
public function updateMemberPlan(){

		// echo "hello";
		$return_arr = array();
		$login_user_id = $this->session->userdata('login_user_id');
		if($login_user_id){
			$update_array = array('membership_plan'=>$this->input->post('plan_val'));
			$res = $update = $this->common_model->update_entry('ats_user',$update_array,array('user_id'=>$login_user_id));
			if($res){
				$return_arr = array('success'=>'ok', 'message'=>'Plan updated successfully!');

				$email_res = $this->load->view('membership_email_template', $update_array, true);
				$subject = 'Subscription Plan Information';
 				$user_info = $this->session->userdata('user_info');
				$headers = "From: " . strip_tags($user_info['name']) . "\r\n";
	$headers .= "Reply-To: ". strip_tags($user_info['email']) . "\r\n";
   $headers .= "CC: tyler@atsadvisornetwork.com\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
				 mail('guy@orangecapitalmanagement.com', $subject, $email_res,$headers);
				/*echo'<pre>';
				print_r($email_res);

				echo'</pre>';
				die;*/

			}else{
				$return_arr = array('success'=>'error', 'message'=>'Plan not updateded');
			}
		}else{
			$return_arr = array('success'=>'error', 'message'=>'User not found');
		}
		echo json_encode($return_arr);
	
	}
	?>
	