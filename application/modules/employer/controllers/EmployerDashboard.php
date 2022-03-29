<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class EmployerDashboard extends MX_Controller  {
 
	var $data = array(); 

	/** All users login there **/
	public function __construct(){
		parent::__construct();
        $this->isAuthenticated('EmployerLoginDetails',base_url('sign-in'));
        $this->login_data = $this->session->userdata('EmployerLoginDetails');
        $this->employer_id = $this->login_data['userId'];
	}

	/**
    * Sort Description.
    * function name: hrmsDashboard  
    * Details: Load view
    * @return: 
    * 
    */

    public function hrmsDashboard(){
        $data['header_title']="HRMS";
        $data['page_title_top']="HR Dashboard";
        $data['page_heading']="Welcome";

        $employer_id = $this->login_data['userId'];
        $total_emp = $this->Mod_Common->customQuery("SELECT count(employee_id) as total_emp FROM hs_users_employer WHERE employer_id = $employer_id AND 'role' = '2' ");

        $employer_holiday = $this->Mod_Common->customQuery("SELECT count(id) as employer_holiday FROM hs_employer_holiday WHERE employer_id = $employer_id AND 'role' = '2' ");

        $employer_event = $this->Mod_Common->customQuery("SELECT count(event_id) as employer_event FROM hs_employer_event WHERE employer_id = $employer_id AND 'role' = '2' ");

        $data['total_emp']= $total_emp[0]->total_emp;
        $data['employer_holiday']= $employer_holiday[0]->employer_holiday;
        $data['employer_event']= $employer_event[0]->employer_event;

        $this->employer_template->load('employer_template','employer/dashboard/dashboard', $data); 
    }

    /**
    * Sort Description.
    * function name: hrmsHrActivity  
    * Details: Load view
    * @return: 
    * 
    */
    public function dashboardActivity(){
        $data['header_title']="HRMS";
        $data['page_title_top']="Activities";
        $data['page_heading']="Timeline Activity";
        $this->employer_template->load('employer_template','employer/dashboard/hr_activity', $data); 
    }

    /**
    * Sort Description.
    * function name: dashboardPayroll  
    * Details: Load view
    * @return: 
    * 
    */
    public function dashboardPayroll(){
        $data['header_title']="HRMS";
        $data['page_title_top']="Payroll";
        $data['page_heading']="Payroll";
        $this->employer_template->load('employer_template','employer/dashboard/hr_payroll', $data); 
    }

    /**
    * Sort Description.
    * function name: dashboardReport  
    * Details: Load view
    * @return: 
    * 
    */
    public function dashboardReport(){
        $data['header_title']="HRMS";
        $data['page_title_top']="Report";
        $data['page_heading']="Report";
        $this->employer_template->load('employer_template','employer/dashboard/hr_report', $data); 
    }

    public function getProfile(){

        $data['header_title']="HRMS";
        $data['page_title_top']="Profile";
        $data['page_heading']="Update";
        $employerID = $this->employer_id;
        $custom_que = "SELECT u.id, u.company_name, u.status, u.team_member, emp.employee_id, emp.employer_id, emp.first_name,emp.profile_img, emp.last_name, emp.email_id, emp.password, emp.mobile_no
        FROM hs_users as u
        INNER JOIN hs_users_employer as emp ON emp.employer_id = u.id 
        WHERE emp.employer_id = $employerID AND emp.role = '1'
        ";
        $employer = $this->Mod_Common->customQuery($custom_que);
        $data['employer'] = $employer[0];
       /* echo'<pre>';
        print_r($employer);
        echo'</pre>';
        die;*/
        $this->employer_template->load('employer_template','employer/dashboard/profile', $data);

    }

    public function updateProfile(){
        $this->form_validation->set_rules('first_name', 'First name','trim|required');
        $this->form_validation->set_rules('last_name', 'Last name','trim|required');
        $this->form_validation->set_rules('mobile_no', 'Phone numeber','trim|required|min_length[10]|max_length[12]|numeric|greater_than[0.99]|regex_match[/^[0-9,]+$/]');
        $this->form_validation->set_rules('company_name', 'Company name','trim|required');
        $this->form_validation->set_rules('team_member', 'Company headcount','trim|required|numeric|greater_than[0.99]|regex_match[/^[0-9,]+$/]');


        if ($this->form_validation->run() == FALSE) 
        {
            $errors = $this->transformErrorsToArray(validation_errors());
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'danger');
            redirect(base_url('employer/profile'));
        }
        else
        {
            extract($this->input->post());

            //start the transaction
           
            $updateData = array(
                    'company_name'      => trim($company_name),
                    'team_member'       => trim($team_member),
                    'updated_at'        => date('Y-m-d h:i:s'),
                    );
            $user_id = $this->Mod_Common->updateData(TABLE_USERS, array('id'=>$this->employer_id), $updateData);
          
            if(!empty($user_id)){
                if(!empty(trim($password))){
                    $updateData1 = array(
                    'first_name'        => trim($first_name),
                    'last_name'         => trim($last_name),
                    'password'          => trim(md5($password)),
                    'full_name'         => trim($first_name).' '.trim($last_name),
                    'mobile_no'         => trim($mobile_no),
                    'updated_at'        => date('Y-m-d h:i:s'),
                    );
                }else{
                    $updateData1 = array(
                    'first_name'        => trim($first_name),
                    'last_name'         => trim($last_name),
                    'full_name'         => trim($first_name).' '.trim($last_name),
                    'mobile_no'         => trim($mobile_no),
                    'updated_at'        => date('Y-m-d h:i:s'),
                    );
                }

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
                        $updateData1['profile_img'] = $profile_img;
                    }else{
                        $error_text = "Need file type should be $asset_type";
                        $this->session->set_flashdata('errorclass', 'danger');
                        $this->session->set_flashdata('error_message', $error_text);
                        //$this->template->load('default', 'slider/add_slider', $this->data);
                        redirect(base_url('employer/profile'));
                    }
                }

                $user_id = $this->Mod_Common->updateData('hs_users_employer', array('employee_id'=>decode($employee_id),'employer_id'=>$this->employer_id), $updateData1);
                
                $errors = $this->lang->line('msg_updated_record');
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'success');
                redirect(base_url('employer/profile'));
            }else{
                $errors = 'Sorry, somethig is wrong, please contact to administrator.';
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'danger');
                redirect(base_url('employer/profile'));
            }
        }
    }
   
}