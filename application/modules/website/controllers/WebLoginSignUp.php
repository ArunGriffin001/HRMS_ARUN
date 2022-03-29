<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class WebLoginSignUp extends MX_Controller  {
 
    var $data = array(); 

    /** All users login there **/
    public function __construct(){
        parent::__construct();
    } 
     
    public function login(){
        $data['title']="HRMS | The HR Payroll software";
        $this->ajax_default->load('ajax_default','website/login_new', $data); 
    }

    public function login1(){
        $data['title']="HRMS | The HR Payroll software";
        $this->ajax_default->load('ajax_default','website/login', $data); 
    }

    public function signUp(){
        $data['title']="HRMS | The HR Payroll software";
        $this->ajax_default->load('ajax_default','website/sign_up', $data); 
    }

    public function signUp1(){
        $data['title']="HRMS | The HR Payroll software";
        $this->ajax_default->load('ajax_default','website/sign_up_new', $data); 
    }


    /**
    * Sort Description.
    * function name: addUser  
    * Details: add record as per department type
    * @return: 
    * 
    */
    public function addEmployer(){
        $this->form_validation->set_rules('first_name', 'First name','trim|required');
        $this->form_validation->set_rules('last_name', 'Last name','trim|required');
        $this->form_validation->set_rules('email', 'Email','trim|required|valid_email|is_unique[hs_users_employer.email_id]');
        $this->form_validation->set_rules('phone_number', 'Phone numeber','trim|required|min_length[10]|max_length[12]|numeric|greater_than[0.99]|regex_match[/^[0-9,]+$/]');
        $this->form_validation->set_rules('company_name', 'Company name','trim|required');
         $this->form_validation->set_rules('team_member', 'Company headcount','trim|required|numeric|greater_than[0.99]|regex_match[/^[0-9,]+$/]');

        if ($this->form_validation->run() == FALSE) 
        {
            $errors = $this->transformErrorsToArray(validation_errors());
            /*echo'<pre>';
            print_r($errors);
            echo'</pre>';
            die;*/
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'danger');
            redirect(base_url('signup'));
        }
        else
        {
            extract($this->input->post());
            //$employeedoc = '';
            $profileimg = '';
            $asset_type = MEDIA_PICTURE;
            /*if (!empty($_FILES['profile_img']['name'])) {
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
            }*/

            //start the transaction
            $this->db->trans_begin();
           
            $addedData = array(
                    'company_name'      => trim($company_name),
                    'team_member'       => trim($team_member),
                    'created_at'        => date('Y-m-d h:i:s'),
                    'updated_at'        => date('Y-m-d h:i:s'),
                    );
            $user_id = $this->Mod_Common->insertData(TABLE_USERS, $addedData);
            $res = $this->Mod_Common->rowData('hs_users_employer', array('email_id' => $email));
            if(empty($res)){
                 $addedData1 = array(
                    'employer_id'       => $user_id,
                    'role'              => '1',
                    'first_name'        => trim($first_name),
                    'last_name'         => trim($last_name),
                    'email_id'          => trim($email),
                    'password'          => trim(md5('123456')),
                    'full_name'         => trim($first_name).' '.trim($last_name),
                    'mobile_no'         => trim($phone_number),
                    'status'            => 'Deactive',
                    'created_at'        => date('Y-m-d h:i:s'),
                    'updated_at'        => date('Y-m-d h:i:s'),
                    );
                $insert_id = $this->Mod_Common->insertData('hs_users_employer', $addedData1);
                if($insert_id){
                    $this->db->trans_complete();

                    $this->db->trans_commit();
                    $errors = $this->lang->line('msg_insert_record');
                    $this->session->set_flashdata('error_message', $errors);
                    $this->session->set_flashdata('errorclass', 'success');
                    redirect(base_url('signup-thank-you'));
                    //return TRUE;
                }else{
                    $this->db->trans_rollback();
                    $errors = $this->lang->line('msg_wrong');
                    $this->session->set_flashdata('error_message', $errors);
                    $this->session->set_flashdata('errorclass', 'danger');
                    redirect(base_url('signup'));
                }
            }else{

                $this->db->trans_rollback();

                $errors = 'Sorry, the email already exist, please try another email.';
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'danger');
                redirect(base_url('signup'));
            }
        }
    }

    /**
    * Sort Description.
    * function name: thankYou  
    * Details: load view
    * @return: 
    * 
    */
    public function thankYou(){
        $data['title']="HRMS | The HR Payroll software";
        $this->ajax_default->load('ajax_default','website/thank_you', $data); 
    }

    /* Login Submit */
    public function login_submit(){
        $this->form_validation->set_rules('email', 'Email','trim|required');
        $this->form_validation->set_rules('password', 'Password','trim|required');
        
        if ($this->form_validation->run() == FALSE) 
        {
            $errors = $this->transformErrorsToArray(validation_errors());
            
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'danger');
            redirect(base_url('sign-in'));
        }
        else
        {
            extract($this->input->post());
            $res = rowData(TABLE_USERS_EMPLOYER, array('email_id'=>$email, 'status' => 'Active','password' => md5($password)));

            if(!empty($res)){
                if($res->role == '1'){
                    $user_Data = array(
                    'userId'=>$res->employer_id,
                    'Id'=>$res->employee_id,
                    'roleID'=>$res->role,
                    'user_type' => 'employer',
                    'userUsername'=>$res->full_name,
                    'userEmail' => $res->email_id,
                    );
                /*Set Session*/
                $errors = 'Welcome to employer portal';
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'success');
                $this->session->set_userdata('EmployerLoginDetails', $user_Data );
                 redirect(base_url('employer/dashboard'));
                }else if($res->role == '3'){
                    $check_employer = rowData(TABLE_USERS, array('id'=>$res->employer_id, 'status' => 'Active'));
                    if(empty($check_employer)){
                        $errors = 'Sorry, please contact to your employer support for correct login credentials!';
                        $this->session->set_flashdata('error_message', $errors);
                        $this->session->set_flashdata('errorclass', 'danger');
                        redirect(base_url('sign-in'));
                    }
                    $user_Data = array(
                    'userId'=>$res->employee_id,
                    'employer_id' => $res->employer_id,
                    'roleID'=>$res->role,
                    'user_type' => 'Department Head',
                    'Username'=>$res->full_name,
                    'userEmail' => $res->email_id,
                    );
                    /*Set Session*/
                    $errors = 'Welcome to employer portal';
                    $this->session->set_flashdata('error_message', $errors);
                    $this->session->set_flashdata('errorclass', 'success');
                    $this->session->set_userdata('EmployeeLogin', $user_Data );
                    redirect(base_url('employee/dashboard'));
                }else{
                    $check_employer = rowData(TABLE_USERS, array('id'=>$res->employer_id, 'status' => 'Active'));
                    if(empty($check_employer)){
                        $errors = 'Sorry, please contact to your employer support for correct login credentials!';
                        $this->session->set_flashdata('error_message', $errors);
                        $this->session->set_flashdata('errorclass', 'danger');
                        redirect(base_url('sign-in'));
                    }
                    $user_Data = array(
                    'userId'=>$res->employee_id,
                    'employer_id' => $res->employer_id,
                    'roleID'=>$res->role,
                    'user_type' => 'employee',
                    'Username'=>$res->full_name,
                    'userEmail' => $res->email_id,
                    );
                    /*Set Session*/
                    $errors = 'Welcome to employer portal';
                    $this->session->set_flashdata('error_message', $errors);
                    $this->session->set_flashdata('errorclass', 'success');
                    $this->session->set_userdata('EmployeeLogin', $user_Data );
                    redirect(base_url('employee/dashboard'));
                }
            }else{
                $errors = 'Sorry, Invalid login credentials';
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'danger');
                redirect(base_url('sign-in'));
            }

        }
    }

    public function logout(){
        $this->session->unset_userdata('EmployerLoginDetails');
        redirect(base_url('sign-in'));
    }

    public function EmployeeLogout(){
        $this->session->unset_userdata('EmployeeLogin');
        redirect(base_url('sign-in'));
    }   
}