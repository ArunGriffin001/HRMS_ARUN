<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class AdminProfile extends MX_Controller  {
 
	var $data = array(); 

	/** All users login there **/
	public function __construct(){
		parent::__construct();
	} 
	 
	public function changePassword(){
		$data['title']="HRMS | The HR Payroll software";
        $data['page_title_top']="Admin";
        $data['page_heading']="Change Password";
        
        $this->superadmin_template->load('superadmin_template','superadmin/profile', $data); 
	}

    public function updatePassword(){
        $this->form_validation->set_rules('old_password', 'Old password','trim|required');
        $this->form_validation->set_rules('new_password', 'New password','trim|required');
        $this->form_validation->set_rules('confirm_password', 'Confirm password', 'required|matches[new_password]');
        
        if ($this->form_validation->run() == FALSE) 
        {
            $errors = $this->transformErrorsToArray(validation_errors());
            
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'danger');
            redirect(base_url('superadmin/change-password'));
        }
        else
        {
            extract($this->input->post());

            $oldData = rowData(TABLE_SUPER_ADMINL, array('password' => md5($old_password)));
            /*echo"<pre>";
            print_r($this->input->post());
            print_r($oldData);
            echo'</pre>';
            die;*/
            if(!empty($oldData)){
                $passData = array(
                    'password'=> md5($new_password),
                    'updated_at' => date('Y-m-d H:i:s'),
                );
                $res = $this->Mod_Common->updateData(TABLE_SUPER_ADMINL, array('id' =>$oldData->id ), $passData);
                /*echo"<pre>";
                echo $this->db->last_query();
                print_r($res);
                echo'</pre>';
                die;*/
                $errors = 'Password updated successfuly';
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'success');
                 redirect(base_url().ADMIN_URL.'change-password');
            }else{
                $errors = 'Sorry, old password not match';
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'danger');
                redirect(base_url().'superadmin/change-password');
            }
        }
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
    public function logout(){
        $this->session->unset_userdata('LoginDetails');
            redirect(base_url('superadmin/login'));
    }
}