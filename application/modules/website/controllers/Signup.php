<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Signup extends MX_Controller  {
 
	var $data = array(); 

	/** All users login there **/
	public function __construct(){
		parent::__construct();
	} 
	 
	public function index(){
		$data['title']="HRMS | The HR Payroll software";
        $this->login_template->load('login_template','website/signup', $data); 
	}

    public function signup_submit(){
       /* echo'<pre>';
                print_r($this->input->post());
                echo'</pre>';
                die;*/
        $this->form_validation->set_rules('first_name', 'First name','trim|required');
        $this->form_validation->set_rules('last_name', 'Last name','trim|required');
        $this->form_validation->set_rules('email', 'Email','trim|required|valid_email|is_unique[users.email]', array(
                'required'      => 'Please enter valis %s.',
                'is_unique'     => 'This %s already exists.'
        ));
        $this->form_validation->set_rules('phone_number', 'Phone number','trim|required');
        $this->form_validation->set_rules('company_name', 'Company name','trim|required');
        $this->form_validation->set_rules('head_count', 'Company headcount','trim|required');
        
        if ($this->form_validation->run() == FALSE) 
        {
            $errors = $this->transformErrorsToArray(validation_errors());
            
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'danger');
            redirect(base_url('signup'));
        } 
        else
        {
            extract($this->input->post());
                
                
                $add_date       = date('Y-m-d h:i:s');
                $addedData      = array(
                    'first_name'             => $first_name,
                    'last_name'       => $last_name,
                    'email'          => $email,
                    'phone_number'    => $phone_number,
                    'company_name'     => $company_name,
                    'head_count'        => $head_count,
                    'created_at'        => $add_date,
                    'updated_at'        => $add_date,
                );
            
            $user_id = $this->Mod_Common->insertData(TABLE_USERS, $addedData);
            if($user_id){
                $errors = 'Thank you, signup successfully';
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'success');
                redirect(base_url('signup'));
            }else{
                $errors = 'Record not insert something is wrong';
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'danger');
                redirect(base_url('signup'));
            }
        }
    }
}