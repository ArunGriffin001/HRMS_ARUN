<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class EmployeePunching extends MX_Controller  {
 
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
    * function name: notificationPage  
    * Details: Load view
    * @return: 
    * 
    */
    public function punchIn(){

        
       $returnData = false;
        //echo json_encode($returnData);
        $punching_status = $this->input->post('punching_status');
      /*  echo '<pre>';
        print_r($punching_status);*/
        
        //var_dump($punching_status);
        $year = date('Y-m-d');
        $query_get_val = "SELECT * FROM hs_employee_punching WHERE `employer_id` = $this->employer_id AND `employee_id` = $this->employee_id AND DATE(`created_at`) = '$year'";
        $today_puch = $this->Mod_Common->customQuery($query_get_val);
        $today_puch = (!empty($today_puch[0]) ? $today_puch[0] : '');

        if($punching_status == '1'){
            if(!empty($today_puch)){ // today record exist the update date

                $updateData = array(
                    'punch_out_time'   => date('Y-m-d H:i:s'),
                    'punch_status'     => $punching_status,
                    'punch_status2'   => 'OUT',
                    'updated_at'      => date('Y-m-d H:i:s'),
                    );
                $update_status = $this->Mod_Common->updateData('hs_employee_punching', array('punching_id'=>$today_puch->punching_id,'employee_id'=>$this->employee_id, 'employer_id' =>$this->employer_id), $updateData);
                /* Insert new row in punching if punching log_id_not exist(first logout click ) */
                $punching_info = $this->session->userdata('punching_data');
                
                 $addedData2 = array(
                'punching_id'     => $today_puch->punching_id,
                'break_in'   => date('Y-m-d H:i:s'),
                'created_at'      => date('Y-m-d H:i:s'),
                'updated_at'      => date('Y-m-d H:i:s'),
                );

                $status2 = $this->Mod_Common->insertData('hs_employee_punching_log', $addedData2);
                $insert_id = $this->db->insert_id();
                /* Set status */
               
                /* End status */
                

            }else{ // First punching today insert record
                $addedData = array(
                    'employee_id'     => $this->employee_id,
                    'employer_id'     => $this->employer_id,
                    'punch_in_time'   => date('Y-m-d H:i:s'),
                    'punch_status'     => $punching_status,
                    'punch_status2'   => 'IN',
                    'created_at'      => date('Y-m-d H:i:s'),
                    'updated_at'      => date('Y-m-d H:i:s'),
                    );
                $status = $this->Mod_Common->insertData('hs_employee_punching', $addedData);
                $insert_id = $this->db->insert_id();

                /* Set status */
                $updateData = array(
                'punch_status'     => $punching_status,
                );
                $update_status = $this->Mod_Common->updateData('hs_employee_punching', array('punching_id'=>$today_puch->punching_id,'employee_id'=>$this->employee_id, 'employer_id' =>$this->employer_id), $updateData);
                /* End status */
            }
            
            $returnData = array('isSuccess' => true, 'status'=>$punching_status);

        }else{

            if(!empty($today_puch)){
                $today_punch_id = $today_puch->punching_id;
                $get_log_id_query = "SELECT log_id, punching_id FROM hs_employee_punching_log WHERE punching_id = $today_punch_id ORDER BY log_id DESC LIMIT 1";
                $log_resID = $this->Mod_Common->customQuery($get_log_id_query);
                $log_res = $log_resID[0];
                $logID = $log_res->log_id;

                
                if(!empty($logID)){
                    $updateData3 = array(
                    'break_out'   => date('Y-m-d H:i:s'),
                    'updated_at'      => date('Y-m-d H:i:s'),
                    );

                    $status3 = $this->Mod_Common->updateData('hs_employee_punching_log', array('log_id'=>$logID,'punching_id'=>$today_puch->punching_id), $updateData3);
                    $updateData = array(
                    /*'punch_out_time'    =>date('Y-m-d H:i:s'),*/
                    'punch_status'     => $punching_status,
                    );
                    if($punching_status == '2'){
                        $updateData['punch_status2'] = 'IN'
                    }else if($punching_status == '1'){
                        $updateData['punch_status2'] = 'OUT'
                    }
                    $update_status = $this->Mod_Common->updateData('hs_employee_punching', array('punching_id'=>$today_puch->punching_id,'employee_id'=>$this->employee_id, 'employer_id' =>$this->employer_id), $updateData);

                    $returnData = array('isSuccess' => true, 'status'=>$punching_status);

                }else{
                    $addedData3 = array(
                    'punching_id'     => $today_puch->punching_id,
                    'break_in'   => date('Y-m-d H:i:s'),
                    'created_at'      => date('Y-m-d H:i:s'),
                    'updated_at'      => date('Y-m-d H:i:s'),
                );

                $status3 = $this->Mod_Common->insertData('hs_employee_punching_log', $addedData3);

                $returnData = array('isSuccess' => true, 'status'=>$punching_status);
                }
                

            }else{
                $addedData = array(
                    'employee_id'     => $this->employee_id,
                    'employer_id'     => $this->employer_id,
                    'punch_in_time'   => date('Y-m-d H:i:s'),
                    'punch_status'    => $punching_status,
                    'punch_status2'   => 'IN',
                    'created_at'      => date('Y-m-d H:i:s'),
                    'updated_at'      => date('Y-m-d H:i:s'),
                    );
                $status = $this->Mod_Common->insertData('hs_employee_punching', $addedData);
                $returnData = array('isSuccess' => true, 'status'=>'2');
            }
            
        }
       /* print_r($this->session->userdata('punching_data', $punchingData));
        echo('/pre>');
        die;*/
        echo json_encode($returnData);
        
        //die;

       /* $data['header_title']   =  "HRMS - Soylent Corp";
        $data['page_title_top'] =    "Team Leave";
        $data['page_heading']   =  "Team Leave";
        $this->employee_template->load('employee_template','employee/my_team/team_leave', $data);*/ 
    }
}
?>