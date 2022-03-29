<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MX_Controller  {
 
	var $data = array(); 

	/** All users login there **/
	public function __construct(){
		parent::__construct();
          if(!empty($this->session->userdata('LoginDetails')))
               redirect(base_url().'superadmin/dashboard');
           
	} 
	 
	public function login(){
		$data['title']="HRMS | The HR Payroll software";
        $this->login_template->load('login_template','login/login', $data); 
	}

    public function login_submit(){
        $this->form_validation->set_rules('email', 'Email','trim|required');
        $this->form_validation->set_rules('password', 'Password','trim|required');
        
        if ($this->form_validation->run() == FALSE) 
        {
            $errors = $this->transformErrorsToArray(validation_errors());
            
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'danger');
            redirect(base_url('superadmin/login'));
        }
        else
        {
            extract($this->input->post());
            $userData = rowData(TABLE_SUPER_ADMINL, array('email'=>$email, 'password' => md5($password)));
           /* echo"<pre>";
            print_r($this->input->post());
            print_r($userData);
            echo'</pre>';*/
            if(!empty($userData)){
                $user_Data = array(
                    'roleID'=>'1',
                    'userId'=>$userData->id,
                    'user_type' => 'superadmin',
                    'userUsername'=>$userData->name,
                    'userEmail' => $userData->email,
                );

               /* if ($Remember!='') 
                {
                    set_cookie('AdminDetails', $array, 86400);
                }*/

                /*Set Session*/
                $errors = 'Welcome Superadmin portal';
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'success');
                $this->session->set_userdata('LoginDetails', $user_Data );
                 redirect(base_url().ADMIN_URL.'dashboard');
            }else{
                $errors = 'Sorry, Invalide login credentials';
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'danger');
                redirect(base_url().'superadmin/login');
            }
        }
    }
    
}