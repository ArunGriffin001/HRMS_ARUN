<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class AssetManagement extends MX_Controller  {
 
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
    * function name: assetTypeList  
    * Details: Load view
    * @return: 
    * 
    */
    public function assetTypeList(){
       
        $data['header_title']="HRMS";
        $data['page_title_top']="Assets type list";
        $data['page_heading']="Assets type list";
        $data['page_sub_heading']="Assets type list";
        $type_list = $this->Mod_Common->selectData('hs_employer_assets_type', '','*', 'id', 'desc');
        $data['asset_type'] = $type_list;
        $this->employer_template->load('employer_template','employer/asset_management/type/list', $data); 
    }

        /**
    * Sort Description.
    * function name: addLeave  
    * Details: add holiday record
    * @return: 
    * 
    */
    public function addAssetType(){
        $this->form_validation->set_rules('type_name', 'Type name','trim|required');
        
        if ($this->form_validation->run() == FALSE) 
        {
            $errors = $this->transformErrorsToArray(validation_errors());
            
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'danger');
            redirect(base_url('employer/asset/type_list'));
        }
        else
        {
            extract($this->input->post());
            
            $addedData = array(
                    'employer_id'     => $this->employer_id,
                    'type_name'       => trim($type_name),
                    'created_at'      => date('Y-m-d h:i:s'),
                    'updated_at'      => date('Y-m-d h:i:s'),
                    );
            $insert_status = $this->Mod_Common->insertData('hs_employer_assets_type', $addedData);
            if($insert_status){
                $errors = 'Record added successfully';
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'success');
                redirect(base_url('employer/asset/type_list'));
            }else{
                $errors = 'Record not insert something is wrong';
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'danger');
                redirect(base_url('employer/asset/type_list'));
            }
        }
    }

     /**
    * Sort Description.
    * function name: list  
    * Details: Load view
    * @return: 
    * 
    */
    public function edit($id){
        $data['header_title']="HRMS";
        $data['page_title_top']="Asset type";
        $data['page_heading']="Asset type";
        $data['page_sub_heading']="Edit type";
        $res = $this->Mod_Common->rowData('hs_employer_assets_type', array('id'=> decode($id)));
        $data['asset_type'] = $res;
        $this->employer_template->load('employer_template','employer/asset_management/type/edit', $data); 
    }

    /**
    * Sort Description.
    * function name: updateDepartment  
    * Details: update department record
    * @return: 
    * 
    */
    public function updateAssetType($edit_id){
        $this->form_validation->set_rules('type_name', 'Type name','trim|required');
       
        if ($this->form_validation->run() == FALSE) 
        {
            $errors = $this->transformErrorsToArray(validation_errors());
            
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'danger');
            redirect(base_url('employer/asset/type/edit/'.$edit_id));
        }
        else
        {
            extract($this->input->post());
            /*echo'<pre>';
            print_r($this->input->post());
            echo'</pre>';
            die;*/
            $employer_id = $this->login_data['userId'];
            $updateData = array(
                    'type_name'          => trim($type_name),
                    'updated_at'    => date('Y-m-d h:i:s'),
                    );
            $update_id = $this->Mod_Common->updateData('hs_employer_assets_type', array('id'=>decode($edit_id), 'employer_id' => $this->employer_id), $updateData);
                $errors = $this->lang->line('msg_updated_record');
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'success');
                redirect(base_url('employer/asset/type_list'));
        }
    }

   /**
    * Sort Description.
    * function name:  updateStatus  
    * Details: change user status
    * @return: true/false
    * 
    */
    public function updateTypeStatus() {

        $returnData = false;
        $fieldId = $this->input->post('ids');
        $IdField = $this->input->post('idField') ? $this->input->post('idField') : "id";
        $userStatus = $this->input->post('status');
        $table = $this->input->post('table');
        $field = $this->input->post('field');
        /*echo'<pre>';
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

            $returnData = array('isSuccess' => true);
        } else {
            $returnData = array('isSuccess' => false);
        }
        /*echo $this->db->last_query();
        print_r($returnData);
        die;*/
        echo json_encode($returnData);

    }


    /**
    * Sort Description.
    * function name: assignAssetEmployee  
    * Details: Load view
    * @return: 
    * 
    */
    public function assignAssetEmployee(){
       
        $data['header_title']="HRMS";
        $data['page_title_top']="Assign asset";
        $data['page_heading']="Assign asset";
        $data['page_sub_heading']="Assign asset";

        $employee_list = $this->Mod_Common->selectData('hs_users_employer', array('employer_id'=> $this->employer_id,'role !='=>'1' ,'status'=>'Active'),'employee_id, employer_id, employee_department, full_name, email_id','first_name', 'asc');
        $data['employee_list'] = ( !empty($employee_list) ? $employee_list : '');
        $type_list = $this->Mod_Common->selectData('hs_employer_assets_type', array('status'=>'Active'));
        $data['asset_type'] = $type_list;
        $this->employer_template->load('employer_template','employer/asset_management/assign_asset_to_employee', $data); 
    }

     /**
    * Sort Description.
    * function name: assetTypeList  
    * Details: Load view
    * @return: 
    * 
    */
    public function submitAssetEmployee(){
       
        $this->form_validation->set_rules('asset_type_id', 'Type name','trim|required');
        $this->form_validation->set_rules('employee_id', 'Employee name','trim|required');
        $this->form_validation->set_rules('department_id', 'Department name','trim|required');
        $this->form_validation->set_rules('asset_detail', 'Details name','trim|required');
        $this->form_validation->set_rules('asset_no', 'Aseet number','trim|required');
        $this->form_validation->set_rules('asset_value', 'Asset value','trim|required');
        $this->form_validation->set_rules('asset_status', 'Asset status','trim|required');
        $this->form_validation->set_rules('issue_date', 'Issue date','trim|required');
        $this->form_validation->set_rules('valid_till_date', 'Valid till','trim|required');
        $this->form_validation->set_rules('remark', 'Remark','trim|required');
        $this->form_validation->set_rules('details', 'Details','trim|required');
       
        if ($this->form_validation->run() == FALSE) 
        {
            $errors = $this->transformErrorsToArray(validation_errors());
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'danger');
            redirect(base_url('employer/asset/assign_to_employee/'));
        }
        else{
            extract($this->input->post());
            $addData = array(
                    'employer_id'       => trim($this->employer_id),
                    'employee_id'       => trim($employee_id),
                    'asset_type_id'     => trim($asset_type_id),
                    'department_id'     => trim($department_id),
                    'asset_detail'      => trim($asset_detail),
                    'asset_no'          => trim($asset_no),
                    'asset_value'       => trim($asset_value),
                    'asset_status'      => trim($asset_status),
                    'issue_date'        => (!empty($issue_date) ? date('Y-m-d H:i:s', strtotime($issue_date)) : NULL),
                    'valid_till_date'   => (!empty($valid_till_date) ? date('Y-m-d H:i:s', strtotime($valid_till_date)) : NULL),
                    'return_on_date'    => (!empty($return_on_date) ? date('Y-m-d H:i:s', strtotime($return_on_date)) : NULL),
                    'remark'     => (!empty($remark) ? $remark : ''),
                    'details'     => (!empty($details) ? $details : ''),
                    'created_at'        => date('Y-m-d h:i:s'),
                    'updated_at'        => date('Y-m-d h:i:s'),
                    );
            $insert_id = $this->Mod_Common->insertData('hs_employer_asset_assign_list', $addData);
            if($insert_id){
                $errors = $this->lang->line('msg_insert_record');
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'success');
                redirect(base_url('employer/asset/employee_asset_list'));
            }else{
                $errors = $this->lang->line('msg_not_insert');
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'success');
                redirect(base_url('employer/asset/employee_asset_list'));
            }
        }   
    }

    /**
    * Sort Description.
    * function name: updateAssignAsset  
    * Details: update record
    * @return: 
    * 
    */
    public function updateAssignAsset($edit_id){

        $this->form_validation->set_rules('asset_type_id', 'Type name','trim|required');
        $this->form_validation->set_rules('employee_id', 'Employee name','trim|required');
        $this->form_validation->set_rules('department_id', 'Department name','trim|required');
        $this->form_validation->set_rules('asset_detail', 'Details name','trim|required');
        $this->form_validation->set_rules('asset_no', 'Aseet number','trim|required');
        $this->form_validation->set_rules('asset_value', 'Asset value','trim|required');
        $this->form_validation->set_rules('asset_status', 'Asset status','trim|required');
        $this->form_validation->set_rules('issue_date', 'Issue date','trim|required');
        $this->form_validation->set_rules('valid_till_date', 'Valid till','trim|required');
        $this->form_validation->set_rules('remark', 'Remark','trim|required');
        $this->form_validation->set_rules('details', 'Details','trim|required');
       
        if ($this->form_validation->run() == FALSE) 
        {
            $errors = $this->transformErrorsToArray(validation_errors());
            
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'danger');
            redirect(base_url('employer/asset/assign_list/edit/'.$edit_id));
        }
        else
        {
            extract($this->input->post());
            /*echo'<pre>';
            print_r($this->input->post());
            echo'</pre>';
            die;*/
            extract($this->input->post());
            $updateData = array(
                    'employee_id'       => trim($employee_id),
                    'asset_type_id'     => trim($asset_type_id),
                    'department_id'     => trim($department_id),
                    'asset_detail'      => trim($asset_detail),
                    'asset_no'          => trim($asset_no),
                    'asset_value'       => trim($asset_value),
                    'asset_status'      => trim($asset_status),
                    'issue_date'        => (!empty($issue_date) ? date('Y-m-d H:i:s', strtotime($issue_date)) : NULL),
                    'valid_till_date'   => (!empty($valid_till_date) ? date('Y-m-d H:i:s', strtotime($valid_till_date)) : NULL),
                    'return_on_date'    => (!empty($return_on_date) ? date('Y-m-d H:i:s', strtotime($return_on_date)) : NULL),
                    'remark'     => (!empty($remark) ? $remark : ''),
                    'details'     => (!empty($details) ? $details : ''),
                    'updated_at'        => date('Y-m-d h:i:s'),
                    );

            $update_id = $this->Mod_Common->updateData('hs_employer_asset_assign_list', array('id'=>decode($edit_id), 'employer_id' => $this->employer_id), $updateData);
                $errors = $this->lang->line('msg_updated_record');
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'success');
                redirect(base_url('employer/asset/employee_asset_list'));
        }
    }


    public function get_view_data($asset_id)
    {

        $assetID = decode($asset_id);
        $query = "SELECT asset.*, emp.full_name, dept.dept_name, asset_type.type_name FROM hs_employer_asset_assign_list as asset
        INNER JOIN hs_employer_department as dept ON dept.dep_id = asset.department_id
        INNER JOIN hs_users_employer as emp ON emp.employee_id = asset.employee_id
        INNER JOIN hs_employer_assets_type as asset_type ON asset_type.id = asset.asset_type_id
        WHERE asset.id = $assetID";
        $asset_assign_list = $this->Mod_Common->customQuery($query);

        $data['ueser_rec']   =  $asset_assign_list[0];
        $this->ajax_default->load('ajax_default','employer/asset_management/show', $data);
    }


    public function getDepartmentInfo()
    {

        $employee_id = $_POST['employee_id'];
        $dept_query = "SELECT emp.employee_department as emp_dept_id, emp.employee_id ,dept.dept_name, dept.dep_id as dept_id FROM hs_users_employer as emp
        INNER JOIN hs_employer_department as dept ON dept.dep_id = emp.employee_department
        WHERE emp.employee_id = $employee_id
        ";
        $dept_info = $this->Mod_Common->customQuery($dept_query);
       /* echo $this->db->last_query();
        echo'<pre>';
        print_r($dept_info);
        echo'</pre>';
        die;*/

        $dept_info = array('dept_id'=>$dept_info[0]->dept_id,'dept_name'=>$dept_info[0]->dept_name);
        
        echo json_encode($dept_info);
    }

    /**
    * Sort Description.
    * function name: assetTypeList  
    * Details: Load view
    * @return: 
    * 
    */
    public function employeeAssetList(){
       
        $data['header_title']="HRMS";
        $data['page_title_top']="Employee assets list";
        $data['page_heading']="Employee assets list";
        $data['page_sub_heading']="Employee assets list";
        $query = "SELECT asset.*, emp.full_name, dept.dept_name, asset_type.type_name FROM hs_employer_asset_assign_list as asset
        INNER JOIN hs_employer_department as dept ON dept.dep_id = asset.department_id
        INNER JOIN hs_users_employer as emp ON emp.employee_id = asset.employee_id
        INNER JOIN hs_employer_assets_type as asset_type ON asset_type.id = asset.asset_type_id
        WHERE asset.employer_id = $this->employer_id ORDER BY asset.id DESC";
        $asset_assign_list = $this->Mod_Common->customQuery($query);
        
        $data['asset_assign_list'] = (!empty($asset_assign_list) ? $asset_assign_list : '');
        $this->employer_template->load('employer_template','employer/asset_management/employee_asset_list', $data); 
    }

    /**
    * Sort Description.
    * function name: assignAssetEmployee  
    * Details: Load view
    * @return: 
    * 
    */
    public function editAssignAsset($asset_assign_id){
       
        $data['header_title']="HRMS";
        $data['page_title_top']="Edit assign asset";
        $data['page_heading']="Edit assign asset";
        $data['page_sub_heading']="Edit assign asset";
        $asset_id = decode($asset_assign_id);

        $query = "SELECT asset.*, dept.dept_name FROM hs_employer_asset_assign_list as asset
        INNER JOIN hs_employer_department as dept ON dept.dep_id = asset.department_id
        WHERE asset.id = $asset_id LIMIT 1";
        $assign_list = $this->Mod_Common->customQuery($query);

        $data['asset_info'] = (!empty($assign_list) ? $assign_list[0] : '');
        $employee_list = $this->Mod_Common->selectData('hs_users_employer', array('employer_id'=> $this->employer_id,'role !='=>'1' ,'status'=>'Active'),'employee_id, employer_id, employee_department, full_name, email_id','first_name', 'asc');
        $data['employee_list'] = ( !empty($employee_list) ? $employee_list : '');
        $type_list = $this->Mod_Common->selectData('hs_employer_assets_type', array('status'=>'Active'));
        $data['asset_type'] = $type_list;
        $this->employer_template->load('employer_template','employer/asset_management/edit_assign_asset', $data); 
    }

    /**
    * Sort Description.
    * function name: appraisal  
    * Details: Load view
    * @return: 
    * 
    */
    /*public function assetCategoryList(){
       
        $data['header_title']="HRMS";
        $data['page_title_top']="Assets";
        $data['page_heading']="Assets";
        $data['page_sub_heading']="Assets";
        $res = array();
        $res = $this->Mod_Common->selectData('hs_employer_assets_type', array('status'=>'Active'));
        $data['res'] = $res;
        $this->employer_template->load('employer_template','employer/employee_management/assets_list/asset_cat_list', $data); 
    }*/

    /*public function categoryAssetList($cat_id){
       
        $data['header_title']="HRMS";
        $data['page_title_top']="Category Asset List";
        $data['page_heading']="Category Asset List";
        $data['page_sub_heading']="Category Asset List";
        $catID = decode($cat_id);
        $res = array();
        $cat_info = $this->Mod_Common->rowData('hs_employer_assets_category', array('status'=>'Active', 'asset_cat_id'=>$catID));
        $data['cat_info'] = $cat_info; 
        $res = $this->Mod_Common->selectData('hs_employer_assets_list', array('employer_id' => $this->employer_id, 'asset_cat_id'=>$catID, 'status'=>'Active'));
        $data['res'] = $res;
        $this->employer_template->load('employer_template','employer/employee_management/assets_list/category_asset_list', $data); 
    }*/

}
?>