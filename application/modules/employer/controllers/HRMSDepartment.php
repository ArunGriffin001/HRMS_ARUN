<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class HRMSDepartment extends MX_Controller  {
 
    var $data = array(); 

    /** All users login there **/
    public function __construct(){
        parent::__construct();
        $this->isAuthenticated('EmployerLoginDetails',base_url('sign-in'));
        $this->login_data = $this->session->userdata('EmployerLoginDetails');
        $this->employer_id = $this->login_data['userId'];
        $this->load->model('Department_model');
    } 

    /**
    * Sort Description.
    * function name: hrmsDepartment  
    * Details: Load hrms department view
    * @return: 
    * 
    */
    public function hrmsDepartments(){
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Departments";
        $res =  array();
        $data['page_heading']="Departments List";
        /*$res = $this->Mod_Common->selectData('hs_users_employer',array('employer_id'=> $this->employer_id, 'role'=>'2','status'=> 'Active'),'employee_id, employer_id, full_name');*/
        $data['emp_list'] = $res;

        $this->employer_template->load('employer_template','employer/hrms/department/hr_departments', $data); 
    }

     public function departmentAjaxList()
    {
       
        $start   =  $this->input->get('start'); // get promo code Id
        $length  =  $this->input->get('length'); // get promo code Id
        $draw    =  $this->input->get('draw'); // get promo code Id
        $order   =  $this->input->get('order');
        if(!empty($order)){ 
            if($order[0]['column']==1){
                $column_name='hs_employer_department.dept_name';
            }else if($order[0]['column']==2){
                $column_name='hs_users_employer.full_name';
            }else if($order[0]['column']==3){
                $column_name='hs_employer_department.no_of_employee';
            }else if($order[0]['column']==4){
                $column_name='hs_employer_department.status';
            }else if($order[0]['column']==5){
                $column_name='hs_employer_department.created_at';
            }else{
                $column_name='hs_employer_department.dep_id';
            }
        }
        $totalRecord      = $this->Department_model->departmentAjaxList(true);
        $getRecordListing = $this->Department_model->departmentAjaxList(false,$start,$length, $column_name, $order[0]['dir']);
        $recordListing = array();
        $content='[';
        $i=0;       
        $srNumber=$start; 
       
       /*echo'<pre>';
       print_r($getRecordListing);
       echo '</pre>';
       die;*/
        if(!empty($getRecordListing)) {
            $actionContent = '';
            foreach($getRecordListing as $recordData) {
                   
                    $actionContent = ''; // set default empty
                    $content .='[';                    
                    $recordListing[$i][0]= $srNumber+1;
                    $recordListing[$i][1]= $recordData->dept_name;
                    $recordListing[$i][2]= (!empty($recordData->full_name) ? $recordData->full_name : '');
                    $recordListing[$i][3]= $recordData->no_of_employee;
                    $recordListing[$i][4] = dateTime($recordData->created_at);
                    $table = TABLE_EMPLOYER_DEPARTMENT;
                    $field = 'status';
                    $field_name = 'dep_id';
                    $urls  =  base_url('employer/department/updateStatus');
                    $actionStatus = '';
                    if($recordData->status == "Deactive"){
                        $status = 'Active';
                        $actionStatus ='<a class="btn btn-danger waves-effect" style="width: 75%;" href="javascript:void(0);" onclick="changestatus('.$recordData->dep_id.', \''.$status.'\', \''.$urls.'\' , \''.$table.'\', \''.$field.'\', \''.$field_name.'\');" title="Deactive">Deactive</a>';

                    }else { 
                        $status = 'Deactive';
                        $actionStatus ='<a class="btn btn-primary waves-effect" style="width: 75%;" href="javascript:void(0);" onclick="changestatus('.$recordData->dep_id.', \''.$status.'\', \''.$urls.'\' , \''.$table.'\', \''.$field.'\', \''.$field_name.'\');" title="Active">Active</a>';
                    }
                    $recordListing[$i][5]= $actionStatus;
                    $actionLink = '';
                    
                    $edit_slider_url = base_url('employer/department/edit/').encode($recordData->dep_id);
                    $actionLink .= '<a href="'.$edit_slider_url.'" title="Edit" class="btn btn-icon waves-effect waves-light fa-new-grey m-b-5"><i class="fa fa-edit"></i></a>';

                    $remove_dept_head = base_url('employer/department/ddddd/').encode($recordData->assign_head_id);

                    if(!empty($recordData->assign_head_id)){
                        $table = 'hs_employer_department_head';
                        $field = '';
                        $status = "";
                        $field_name = 'id';
                        $urls  =  base_url('employer/department/removehead');
                        
                        $actionLink .='|<a title="Unassign Head" class="btn btn-icon btn-sm waves-effect waves-light fa-new-grey m-b-5 Assign_head" href="javascript:void(0);" onclick="OtherStatus('.$recordData->assign_head_id.', \''.$status.'\', \''.$urls.'\' , \''.$table.'\', \''.$field.'\', \''.$field_name.'\');"><i class="fa fa-minus"></i></a>';
                    }else{
                        $assign_head_url = base_url('employer/department/assign_department_head/').encode($recordData->dep_id); 
                        $actionLink .='|<a title="Assign Head" class="btn btn-icon btn-sm waves-effect waves-light fa-new-grey m-b-5 Assign_head" href="'.$assign_head_url.'" ><i class="fa fa-plus"></i></a>';
                    }
                    

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

    /**
    * Sort Description.
    * function name: hrmsDepartmentAdd  
    * Details: add record as per department type
    * @return: 
    * 
    */
    public function add(){
        $this->form_validation->set_rules('dept_name', 'Department name','trim|required');
        $this->form_validation->set_rules('no_of_employee', 'No of employee','trim|required');
        if ($this->form_validation->run() == FALSE) 
        {
            $errors = $this->transformErrorsToArray(validation_errors());
            
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'danger');
            redirect(base_url('employer/hrms/department'));
        }
        else
        {
            extract($this->input->post());
           /* echo'<pre>';
            print_r($this->input->post());
            echo'</pre>';
            die;*/
            $deptHeadId = decode($dept_head_id);
            $employer_id = $this->login_data['userId'];
            $addedData = array(
                    'employer_id'       => $employer_id,
                    'dept_name'         => trim($dept_name),
                    'no_of_employee'    => trim($no_of_employee),
                    'created_at'    => date('Y-m-d h:i:s'),
                    'updated_at'    => date('Y-m-d h:i:s'),
                    );
            $tag_id = $this->Mod_Common->insertData(TABLE_EMPLOYER_DEPARTMENT, $addedData);
            if($tag_id){
                $errors = 'Record added successfully';
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'success');
                redirect(base_url('employer/hrms/department'));
            }else{
                $errors = 'Record not insert something is wrong';
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'danger');
                redirect(base_url('employer/hrms/department'));
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
        $data['page_title_top']="Departments";
        $data['page_heading']="Departments";
        $data['page_sub_heading']="Edit Department";

       /* $res = $this->Mod_Common->selectData('hs_users_employer',array('employer_id'=> $this->employer_id, 'role'=>'2','status'=> 'Active'),'employee_id, employer_id, full_name');
        $data['emp_list'] = $res;*/

        $res = $this->Mod_Common->rowData(TABLE_EMPLOYER_DEPARTMENT, array('dep_id'=> decode($id)));
        $data['record'] = $res;
        $this->employer_template->load('employer_template','employer/hrms/department/edit', $data); 
    }

    /**
    * Sort Description.
    * function name: assignDepartmentHead  
    * Details: Load view
    * @return: 
    * 
    */
    public function assignDepartmentHead($id){
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Assign Department Head";
        $data['page_heading']="Assign Department Head";
        $data['page_sub_heading']="Assign Department Head";

        $res = $this->Mod_Common->selectData('hs_users_employer',array('employer_id'=> $this->employer_id, 'role !='=>'1','status'=> 'Active'),'employee_id, employer_id, full_name');
        $data['emp_list'] = $res;

        $dept_info = $this->Mod_Common->rowData(TABLE_EMPLOYER_DEPARTMENT, array('dep_id'=> decode($id)));
       /* echo'<pre>';
        print_r($res);
        echo'</pre>';
        die;*/
        $assign_dept_info = $this->Mod_Common->rowData('hs_employer_department_head', array('dep_id'=> decode($id),'employer_id' => $this->employer_id));
        $data['dept_info'] = $dept_info;
        $data['current_assign_dept'] = $assign_dept_info;
        $this->employer_template->load('employer_template','employer/hrms/department/update_department_head', $data); 
    }

    /**
    * Sort Description.
    * function name: assignDepartmentHead  
    * Details: Load view
    * @return: 
    * 
    */
    public function updateDepartmentHead($dept_id){
        
        $this->form_validation->set_rules('employee_id', 'Departments head','trim|required');

        if ($this->form_validation->run() == FALSE) 
        {
            $errors = $this->transformErrorsToArray(validation_errors());
            
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'danger');
            redirect(base_url('employer/department/assign_department_head/'.$dept_id));
        }
        else
        {
            extract($this->input->post());
            
            $empID = decode($employee_id);

            $duplicate_entry = $this->Mod_Common->rowData('hs_employer_department_head', array('dep_id != '=> decode($dept_id),'employee_id' => $empID,'employer_id'=>$this->employer_id));

           /* echo'<pre>';
            print_r($duplicate_entry);
            echo $this->db->last_query();
            echo'</pre>';
            die;*/

            if(!empty($duplicate_entry)){
                $errors = 'Sorry, This employee is already alloted to other department so please remove first from current and related employee department head and do this!';
                    $this->session->set_flashdata('error_message', $errors);
                    $this->session->set_flashdata('errorclass', 'danger');
                    redirect(base_url('employer/department/assign_department_head/'.$dept_id));
            }

            $assign_dept_info = $this->Mod_Common->selectData('hs_employer_department_head', array('dep_id'=> decode($dept_id),'employer_id' => $this->employer_id));
            /*echo'<pre>';
            print_r($assign_dept_info);
            echo $this->db->last_query();
            echo'</pre>';
            die;*/
            if(empty($assign_dept_info)){
                $addedData = array(
                    'dep_id'       => decode($dept_id),
                    'employee_id'  => trim($empID),
                    'employer_id'  => trim($this->employer_id),
                    'created_at'   => date('Y-m-d h:i:s'),
                    'updated_at'   => date('Y-m-d h:i:s'),
                );
                $insertID = $this->Mod_Common->insertData('hs_employer_department_head', $addedData);
                if($insertID){

                    $updateData1 = array('role' => '3');
                    $update_id = $this->Mod_Common->updateData('hs_users_employer', array('employer_id' => trim($this->employer_id),'employee_id'=>trim($empID)), $updateData1);

                    $errors = $this->lang->line('msg_updated_record');
                    $this->session->set_flashdata('error_message', $errors);
                    $this->session->set_flashdata('errorclass', 'success');
                    redirect(base_url('employer/department/assign_department_head/'.$dept_id));
                }else{
                    $errors = 'Sorry, something is going wrong.';
                    $this->session->set_flashdata('error_message', $errors);
                    $this->session->set_flashdata('errorclass', 'danger');
                    redirect(base_url('employer/department/assign_department_head/'.$dept_id));
                }
            }else{

                if(count($assign_dept_info) > 1){
                    $errors = 'This department is already allotted to other employee if you want to do this please Unassign employee from department list do this';
                    $this->session->set_flashdata('error_message', $errors);
                    $this->session->set_flashdata('errorclass', 'danger');
                }else{
                    if($assign_dept_info[0]->employee_id !== $empID){
                        $errors = 'This department is already allotted to other employee if you want to do this please Unassign employee from department list do this';
                        $this->session->set_flashdata('error_message', $errors);
                        $this->session->set_flashdata('errorclass', 'danger');
                    }else{
                        $errors = 'updated';
                        $this->session->set_flashdata('error_message', $errors);
                        $this->session->set_flashdata('errorclass', 'success');
                    }
                }

                
                redirect(base_url('employer/department/assign_department_head/'.$dept_id));

            }

        }
        
    }


    /**
    * Sort Description.
    * function name: updateDepartment  
    * Details: update department record
    * @return: 
    * 
    */
    public function updateDepartment($edit_id){
        $this->form_validation->set_rules('dept_name', 'Department name','trim|required');
        $this->form_validation->set_rules('no_of_employee', 'No of employee','trim|required');
        if ($this->form_validation->run() == FALSE) 
        {
            $errors = $this->transformErrorsToArray(validation_errors());
            
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'danger');
            redirect(base_url('employer/hrms/department/edit/'.$edit_id));
        }
        else
        {
            extract($this->input->post());
            /*echo'<pre>';
            print_r($this->input->post());
            echo'</pre>';
            die;*/
            $deptHeadId = decode($dept_head_id);
            $employer_id = $this->login_data['userId'];
            $updateData = array(
                    'dept_name'         => trim($dept_name),
                    'no_of_employee'    => trim($no_of_employee),
                    'updated_at'    => date('Y-m-d h:i:s'),
                    );
            $update_id = $this->Mod_Common->updateData(TABLE_EMPLOYER_DEPARTMENT, array('dep_id'=>decode($edit_id), 'employer_id' => $employer_id), $updateData);
            /* Added query by developer 21-07-2021 */

                $errors = $this->lang->line('msg_updated_record');
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'success');
                redirect(base_url('employer/hrms/department'));
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
    function RemoveHead(){
         $returnData = false;
         extract($this->input->post());
         if(!empty($table) && !empty($idField) && !empty($ids)){
            $get_dept_info = $this->Mod_Common->rowData($table, array($idField=>$ids));
            $response = $this->Mod_Common->deleteData($table, array($idField=>$ids));
            if($response){
                $updateData1 = array('role' => '2');
                $update_id = $this->Mod_Common->updateData('hs_users_employer', array('employer_id' => $get_dept_info->employer_id,'employee_id'=>$get_dept_info->employee_id), $updateData1);
                $returnData = array('isSuccess' => true);
            }else{
                $returnData = array('isSuccess' => false);
            }
         }else{
            $returnData = array('isSuccess' => false);
         }
         echo json_encode($returnData);
    }
   
}
?>