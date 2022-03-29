<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Users extends MX_Controller  {
 
    var $data = array(); 

    /** All users login there **/
    public function __construct(){
        parent::__construct();
        $this->load->model('comman/Comman_model');
        $this->load->model('Users_model');
        $this->isAuthenticated('LoginDetails',base_url('superadmin/login'));
    } 
     
    function list(){
        $data['header_title']="HRMS";
        $data['page_title_top']="Employer";
        $data['page_heading']="Employer List";
        $this->superadmin_template->load('superadmin_template','superadmin/users/list', $data);
    }

    /**
    * Sort Description.
    * function name:  userAjaxlist  
    * Details: show record in datatable
    * @return: array
    * 
    */
    public function userAjaxlist(){
        $start   =  $this->input->get('start'); // get promo code Id
        $length  =  $this->input->get('length'); // get promo code Id
        $draw    =  $this->input->get('draw'); // get promo code Id
        $order   =  $this->input->get('order');
        if(!empty($order)){ 
            if($order[0]['column']==1){
                $column_name='hs_users.company_name';
            }else if($order[0]['column']==2){
                $column_name='hs_users_employer.email_id';
            }else if($order[0]['column']==3){
                $column_name='hs_users_employer.mobile_no';
            }else if($order[0]['column']==4){
                $column_name='hs_users.created_at';
            }else if($order[0]['column']==5){
                $column_name='hs_users.status';
            }else{
                $column_name='hs_users.created_at';
            }
        }
        $totalRecord      = $this->Users_model->userAjaxlist(true);
        $getRecordListing = $this->Users_model->userAjaxlist(false,$start,$length, $column_name, $order[0]['dir']);
        $recordListing = array();
        $content='[';
        $i=0;       
        $srNumber=$start; 
        /*echo'<pre>';
        echo $this->db->last_query();
        print_r($getRecordListing);
        echo'</pre>';
        die; */     
        if(!empty($getRecordListing)) {
            $actionContent = '';
            foreach($getRecordListing as $recordData) {
                   
                    $actionContent = ''; // set default empty
                    $content .='[';                    
                    $recordListing[$i][0]= $srNumber+1; 
                    $img = (!empty($recordData->profile_image) ? $recordData->profile_image : 'default_img.jpg');
                    
                    /*$recordListing[$i][1]= '<img src="'.base_url().'uploads/superadmin/users/'.$img.'" width=150>';*/
                    $recordListing[$i][1]= $recordData->company_name;
                   
                    $recordListing[$i][2]= $recordData->email_id;
                    $recordListing[$i][3]= $recordData->mobile_no;
                    $recordListing[$i][4] = dateTime($recordData->created_at);

                    $table = TABLE_USERS;
                    $field = 'status';
                    $field_name = 'id';
                    $urls  =  base_url(ADMIN_URL).'users/updateStatus'; //base_url('admin/users/updateStatus');
                    $actionStatus = '';
                    if($recordData->status == "Deactive"){
                        $status = 'Active';
                        $actionStatus ='<a class="btn btn-danger waves-effect" style="width: 75%;" href="javascript:void(0);" onclick="changestatus('.$recordData->id.', \''.$status.'\', \''.$urls.'\' , \''.$table.'\', \''.$field.'\', \''.$field_name.'\');" title="Deactive">Deactive</a>';

                    }else { 
                        $status = 'Deactive';
                        $actionStatus ='<a class="btn btn-primary waves-effect" style="width: 75%;" href="javascript:void(0);" onclick="changestatus('.$recordData->id.', \''.$status.'\', \''.$urls.'\' , \''.$table.'\', \''.$field.'\', \''.$field_name.'\');" title="Active">Active</a>';
                    }
                    $recordListing[$i][5]= $actionStatus;

                    $actionLink = '';
                    
                    /*$actionLink .= '<a href="javascript:void(0)" title="view" class="btn btn-icon waves-effect waves-light fa-new-grey m-b-5" data-toggle="modal" data-target="#view_users" onclick="view_users('.$recordData->id.')"><i class="fa fa-eye"></i></a>';*/

                    $edit_users_url = base_url(ADMIN_URL).'users/edit/'.encode($recordData->employee_id);
                    $actionLink .= '<a href="'.$edit_users_url.'" title="Edit" class="btn btn-icon waves-effect waves-light fa-new-grey m-b-5"><i class="fa fa-edit"></i></a>';

                    $view_plan_url = base_url(ADMIN_URL).'users/plan_list/';
                    $actionLink .= '|<a href="'.$view_plan_url.'" title="view plan" class="btn btn-icon waves-effect waves-light fa-new-grey m-b-5" ><i class="fa fa-list"></i></a>';

                    $recordListing[$i][6] = $actionLink;
                    $i++;
                    $srNumber++;
                }
          
            $content .= ']';
            $final_data = json_encode($recordListing);
        } else {
            $final_data = '[]';
        }   
                
        echo '{"draw":'.$draw.',"recordsTotal":'.$totalRecord.',"recordsFiltered":'.$totalRecord.',"data":'.$final_data.'}';
    }

    /**********************   ADD User SECTION ************************/
    /**
    * Sort Description.
    * function name: addUser  
    * Details: load add form
    * @return: 
    * 
    */
    public function addUser(){
        /*echo'ssssssssssss';
        die;*/
        $data['header_title']="HRMS";
        $data['page_title_top']="Employer";
        $data['page_heading']="Employer User";
        $this->superadmin_template->load('superadmin_template','superadmin/users/add', $data);
    }


    /**
    * Sort Description.
    * function name: addEmployer  
    * Details: add record as per department type
    * @return: 
    * 
    */
    public function addEmployer(){
        $this->form_validation->set_rules('first_name', 'First name','trim|required');
        $this->form_validation->set_rules('last_name', 'Last name','trim|required');
        $this->form_validation->set_rules('email', 'Email','trim|required|valid_email|is_unique[hs_users_employer.email_id]');
        $this->form_validation->set_rules('phone_number', 'Phone numeber','trim|required|min_length[10]|max_length[12]|numeric|greater_than[0.99]|regex_match[/^[0-9,]+$/]');
        $this->form_validation->set_rules('password', 'Password','trim|required|min_length[6]');
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
            redirect(base_url('superadmin/users/add'));
        }
        else
        {
            extract($this->input->post());

            //start the transaction
            $this->db->trans_begin();
           
            $addedData = array(
                    'company_name'      => trim($company_name),
                    'team_member'       => trim($team_member),
                    'status'            => 'Active',
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
                    'password'          => trim(md5($password)),
                    'full_name'         => trim($first_name).' '.trim($last_name),
                    'mobile_no'         => trim($phone_number),
                    'status'            => 'Active',
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
                    redirect(base_url('superadmin/users'));
                    //return TRUE;
                }else{
                    $this->db->trans_rollback();
                    $errors = $this->lang->line('msg_wrong');
                    $this->session->set_flashdata('error_message', $errors);
                    $this->session->set_flashdata('errorclass', 'danger');
                    redirect(base_url('superadmin/users/add'));
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
    * function name: add  
    * Details: Load view
    * @return: 
    * 
    */
    public function editEmployer($employer_id){
        $data['header_title']="HRMS";
        $data['page_title_top']="Employer";
        $data['page_heading']="Employer";
        $data['page_sub_heading']="Edit";

        $employerID = decode($employer_id);
        $custom_que = "SELECT u.id, u.company_name, u.status, u.team_member, emp.employee_id, emp.employer_id, emp.first_name, emp.last_name, emp.email_id, emp.password, emp.mobile_no
        FROM hs_users as u
        INNER JOIN hs_users_employer as emp ON emp.employer_id = u.id 
        WHERE emp.employee_id = $employerID
        ";
        $employer = $this->Mod_Common->customQuery($custom_que);
       /* echo'<pre>';
        print_r($employer);
        echo'</pre>';
        die;*/
        $data['employer'] = $employer[0];
        $this->employer_template->load('superadmin_template','superadmin/users/edit', $data);
    }

    /**
    * Sort Description.
    * function name: updateEmployer  
    * Details: update record
    * 
    */
    public function updateEmployer($employee_id){
        $this->form_validation->set_rules('first_name', 'First name','trim|required');
        $this->form_validation->set_rules('last_name', 'Last name','trim|required');
        $this->form_validation->set_rules('mobile_no', 'Phone numeber','trim|required|min_length[10]|max_length[12]|numeric|greater_than[0.99]|regex_match[/^[0-9,]+$/]');
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
            redirect(base_url('superadmin/users/edit/'.$employer_id));
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
            $user_id = $this->Mod_Common->updateData(TABLE_USERS, array('id'=>decode($employer_id)), $updateData);
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
                 
                $user_id = $this->Mod_Common->updateData('hs_users_employer', array('employee_id'=>decode($employee_id),'employer_id'=>decode($employer_id)), $updateData1);
                
                $errors = $this->lang->line('msg_updated_record');
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'success');
                redirect(base_url('superadmin/users'));
                //return TRUE;
            }else{
                $errors = 'Sorry, the email already exist, please try another email.';
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'danger');
                redirect(base_url('superadmin/users/edit/'.$employer_id));
            }
        }
    }

    /**
    * Sort Description.
    * function name: addUser  
    * Details: load add form
    * @return: 
    * 
    */
    public function userPlanList(){
        /*echo'ssssssssssss';
        die;*/
        $data['header_title']="HRMS";
        $data['page_title_top']="Member";
        $data['page_heading']="Member Plan List";
        $this->superadmin_template->load('superadmin_template','superadmin/users/user_plan_details/list', $data);
    }


    /**
    * Sort Description.
    * function name:  updateStatus  
    * Details: change user status
    * @return: true/false
    * 
    */

    public function get_view_users_data($user_id)
    {
        $data['user_id'] = $user_id;
        $query = "SELECT hs_users.id, hs_users.company_name, hs_users.status, hs_users.created_at, hs_users_employer.email_id as email, hs_users_employer.mobile_no as phone_number, hs_users_employer.role as Role_id, hs_users_employer.address, hs_users.member_expiry_date FROM hs_users
        INNER JOIN hs_users_employer ON hs_users_employer.employer_id = hs_users.id WHERE hs_users_employer.role = '1'";
        $res = $this->Mod_Common->customQuery($query);
        $data['user_result'] = $res[0];
        $data['title'] = 'View Users Profile';
        $this->ajax_default->load('ajax_default','superadmin/users/show', $data);
    }

    /**
    * Sort Description.
    * function name:  updateStatus  
    * Details: change user status
    * @return: true/false
    * 
    */
    public function updateStatus() {

        $returnData = false;
        $fieldId = $this->input->post('ids');
        $IdField = $this->input->post('idField') ? $this->input->post('idField') : "id";
        $userStatus = $this->input->post('status');
        $table = $this->input->post('table');
        $field = $this->input->post('field');

       /* echo'<pre>';
        print_r($this->input->post());
        echo'</pre>';
        die;*/
        
        if($userStatus == '1'){
            if($IdField == 'id'){
                $userStatus2 = 'Active';
                $updateData = array($field => $userStatus,'userStatus2' => $userStatus2);
            }else{
                
                $updateData = array($field => $userStatus);
            }
            
        }else if($userStatus == '0'){
            if($IdField == 'id'){
                $userStatus2 = 'Deactive';
                $updateData = array($field => $userStatus,'userStatus2' => $userStatus2);
            }else{
                $updateData = array($field => $userStatus);
            }
            
        }else{
            $updateData = array($field => $userStatus);
        }
        if ((!empty($fieldId)) && (!empty($table))) {
            $upWhere = array($IdField => $fieldId);
            $this->Mod_Common->updateDataFromTabel($table, $updateData, $upWhere);

            /* manual code */
            $res2 = $this->Mod_Common->rowData(TABLE_USERS, array('id' => $fieldId));
             
        $res = $this->Mod_Common->rowData(TABLE_USERS_EMPLOYER, array('employer_id' => $res2->id,'role'=>'1'),'employee_id,employer_id,email_id');
      
            if(!empty($res)){

                $email = $res->email_id;
                $this->Mod_Common->updateDataFromTabel(TABLE_USERS_EMPLOYER, $updateData, array('employee_id'=> $res->employee_id,'employer_id'=> $res->employer_id, 'role' => '1'),'');
            }
            /* End code */

            $returnData = array('isSuccess' => true);
        } else {
            $returnData = array('isSuccess' => false);
        }
        echo json_encode($returnData);
    }
}