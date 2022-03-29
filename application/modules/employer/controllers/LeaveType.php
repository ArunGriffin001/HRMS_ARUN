<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class LeaveType extends MX_Controller  {
 
    var $data = array();

    /** All users login there **/
    public function __construct(){
        parent::__construct();
        $this->isAuthenticated('EmployerLoginDetails',base_url('sign-in'));
        $this->login_data = $this->session->userdata('EmployerLoginDetails');
        $this->load->model('LeaveType_model');
    } 


    /**
    * Sort Description.
    * function name: list  
    * Details: Load view
    * @return: 
    * 
    */
    public function list(){
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Leave Type";
        $data['page_heading']="Leave Type";
        $data['page_sub_heading']="Leave Type List";
        $this->employer_template->load('employer_template','employer/employee_management/leave_type/list', $data); 
    }

    public function leaveTypeAjaxList()
    {
       
        $start   =  $this->input->get('start'); // get promo code Id
        $length  =  $this->input->get('length'); // get promo code Id
        $draw    =  $this->input->get('draw'); // get promo code Id
        $order   =  $this->input->get('order');
        if(!empty($order)){ 
            if($order[0]['column']==2){
                $column_name='leave_type_name';
            }else if($order[0]['column']==3){
                $column_name='total_leave';
            }else if($order[0]['column']==4){
                $column_name='status';
            }else if($order[0]['column']==5){
                $column_name='created_at';
            }else{
                $column_name='leave_cat_id';
            }
        }
        $totalRecord      = $this->LeaveType_model->leaveTypeAjaxList(true);
        $getRecordListing = $this->LeaveType_model->leaveTypeAjaxList(false,$start,$length, $column_name, $order[0]['dir']);
        $recordListing = array();
        $content='[';
        $i=0;       
        $srNumber=$start; 
       
      /* echo'<pre>';
       print_r($getRecordListing);
       echo '</pre>';
       die;*/
        if(!empty($getRecordListing)) {
            $actionContent = '';
            foreach($getRecordListing as $recordData) {
                   
                    $actionContent = ''; // set default empty
                    $content .='[';                    
                    $recordListing[$i][0]= $srNumber+1;
                    $recordListing[$i][1]= ucfirst($recordData->leave_type_name);
                    $recordListing[$i][2]= $recordData->total_leave;
                    $recordListing[$i][3] = dateTime($recordData->created_at);
                    $table = TABLE_LEAVE_TYPE;
                    $field = 'status';
                    $field_name = 'leave_cat_id';
                    $urls  =  base_url('employer/emp-management/leave_type/updateStatus');
                    $actionStatus = '';
                    if($recordData->status == "Deactive"){
                        $status = 'Active';
                        $actionStatus ='<a class="btn btn-danger waves-effect" style="width: 75%;" href="javascript:void(0);" onclick="changestatus('.$recordData->leave_cat_id.', \''.$status.'\', \''.$urls.'\' , \''.$table.'\', \''.$field.'\', \''.$field_name.'\');" title="Deactive">Deactive</a>';

                    }else { 
                        $status = 'Deactive';
                        $actionStatus ='<a class="btn btn-primary waves-effect" style="width: 75%;" href="javascript:void(0);" onclick="changestatus('.$recordData->leave_cat_id.', \''.$status.'\', \''.$urls.'\' , \''.$table.'\', \''.$field.'\', \''.$field_name.'\');" title="Active">Active</a>';
                    }
                    $recordListing[$i][4]= $actionStatus;
                    $actionLink = '';
                    
                    $edit_url = base_url('employer/emp-management/leave_type/edit/').encode($recordData->leave_cat_id);
                    $actionLink .= '<a href="'.$edit_url.'" title="Edit" class="btn btn-icon waves-effect waves-light fa-new-grey m-b-5"><i class="fa fa-edit"></i></a>';

                   $recordListing[$i][5] = $actionLink;
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


     /**
    * Sort Description.
    * function name: add  
    * Details: Load view
    * @return: 
    * 
    */
    public function add(){
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Leave Type";
        $data['page_heading']="Leave Type";
        $data['page_sub_heading']="Add";
        $this->employer_template->load('employer_template','employer/employee_management/leave_tracking/add', $data); 
    }

    /**
    * Sort Description.
    * function name: addLeave  
    * Details: add holiday record
    * @return: 
    * 
    */
    public function addLeave(){
        $this->form_validation->set_rules('leave_type_name', 'Name','trim|required');
        $this->form_validation->set_rules('total_leave', 'Total Leave','trim|required|numeric');
        if ($this->form_validation->run() == FALSE) 
        {
            $errors = $this->transformErrorsToArray(validation_errors());
            
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'danger');
            redirect(base_url('employer/emp-management/leave_type/add'));
        }
        else
        {
            extract($this->input->post());
            $login_data = $this->session->userdata('EmployerLoginDetails');
            /*echo'<pre>';
            print_r($this->input->post());
            print_r( $login_data);
            echo'</pre>';
            die;*/
            $addedData = array(
                    'employer_id'     => $login_data['userId'],
                    'leave_type_name' => trim($leave_type_name),
                    'total_leave'     => trim($total_leave),
                    'created_at'      => date('Y-m-d h:i:s'),
                    'updated_at'      => date('Y-m-d h:i:s'),
                    );
            $tag_id = $this->Mod_Common->insertData(TABLE_LEAVE_TYPE, $addedData);
            if($tag_id){
                $errors = 'Record added successfully';
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'success');
                redirect(base_url('employer/emp-management/leave_type/list'));
            }else{
                $errors = 'Record not insert something is wrong';
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'danger');
                redirect(base_url('employer/emp-management/leave_type/add'));
            }
        }
    }

     /**
    * Sort Description.
    * function name: edit  
    * Details: Load view
    * @return: 
    * 
    */
    public function edit($id){
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Leave Type";
        $data['page_heading']="Leave Type";
        $data['page_sub_heading']="Edit Leave";
        $res = $this->Mod_Common->rowData(TABLE_LEAVE_TYPE, array('leave_cat_id'=> decode($id)));
        $data['record'] = $res;
       /* echo"<pre>";
        print_r($res);
        echo'</pre>';
        die;*/
        $this->employer_template->load('employer_template','employer/employee_management/leave_type/edit', $data); 
    }

    /**
    * Sort Description.
    * function name: updateHoliday  
    * Details: add holiday record
    * @return: 
    * 
    */
    public function updateLeaveType($edit_id){
        $this->form_validation->set_rules('leave_type_name', 'Leave Type','trim|required');
        $this->form_validation->set_rules('total_leave', 'Total leave','trim|required|numeric');
        if ($this->form_validation->run() == FALSE) 
        {
            $errors = $this->transformErrorsToArray(validation_errors());
            
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'danger');
            redirect(base_url('employer/emp-management/leave_type/edit/'.$edit_id));
        }
        else
        {
            extract($this->input->post());
            /*echo'<pre>';
            print_r($this->input->post());
            echo'</pre>';
            die;*/
            $updateData = array(
                    'leave_type_name'  => trim($leave_type_name),
                    'total_leave'      => trim($total_leave),
                    'updated_at'       => date('Y-m-d h:i:s'),
                    );
            $update_id = $this->Mod_Common->updateData(TABLE_LEAVE_TYPE, array('leave_cat_id'=>decode($edit_id), 'employer_id' => $this->login_data['userId']), $updateData);
                $errors = $this->lang->line('msg_updated_record');
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'success');
                redirect(base_url('employer/emp-management/leave_type/list'));
        }
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

            $returnData = array('isSuccess' => true);
        } else {
            $returnData = array('isSuccess' => false);
        }
        echo json_encode($returnData);
    }
   
}
?>