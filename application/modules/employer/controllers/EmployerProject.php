<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class EmployerProject extends MX_Controller  {
 
    var $data = array(); 

    /** All users login there **/
    public function __construct(){
        parent::__construct();
        $this->isAuthenticated('EmployerLoginDetails',base_url('sign-in'));
        $this->login_data = $this->session->userdata('EmployerLoginDetails');
        $this->employer_id = $this->login_data['userId'];
        $this->load->model('EmployerProject_model');
        $this->load->model('ProjectTeam_model');
    } 

    /**
    * Sort Description.
    * function name: hrmsDepartment  
    * Details: Load hrms department view
    * @return: 
    * 
    */
    public function list(){
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Project";
        $data['page_heading']="Project List";

        $this->employer_template->load('employer_template','employer/employee_management/project/list', $data); 
    }

    public function projectAjaxList()
    {
        $start   =  $this->input->get('start'); // get promo code Id
        $length  =  $this->input->get('length'); // get promo code Id
        $draw    =  $this->input->get('draw'); // get promo code Id
        $order   =  $this->input->get('order');
        if(!empty($order)){ 
            if($order[0]['column']==1){
                $column_name='hs_employer_project.project_name';
            }else if($order[0]['column']==2){
                $column_name='hs_employer_project.created_at';
            }else if($order[0]['column']==3){
                $column_name='hs_employer_project.status';
            }else{
                $column_name='hs_employer_project.project_id';
            }
        }
        $totalRecord      = $this->EmployerProject_model->projectAjaxList(true);
        $getRecordListing = $this->EmployerProject_model->projectAjaxList(false,$start,$length, $column_name, $order[0]['dir']);
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
                    $recordListing[$i][1]= $recordData->project_name;
                    $recordListing[$i][2] = dateTime($recordData->created_at);
                    $table = TABLE_EMPLOYER_PROJECT;
                    $field = 'status';
                    $field_name = 'project_id';
                    $urls  =  base_url('employer/emp-management/project/updateStatus');
                    $actionStatus = '';
                    if($recordData->status == "Deactive"){
                        $status = 'Active';
                        $actionStatus ='<a class="btn btn-danger waves-effect" style="width: 75%;" href="javascript:void(0);" onclick="changestatus('.$recordData->project_id.', \''.$status.'\', \''.$urls.'\' , \''.$table.'\', \''.$field.'\', \''.$field_name.'\');" title="Deactive">Deactive</a>';

                    }else { 
                        $status = 'Deactive';
                        $actionStatus ='<a class="btn btn-primary waves-effect" style="width: 75%;" href="javascript:void(0);" onclick="changestatus('.$recordData->project_id.', \''.$status.'\', \''.$urls.'\' , \''.$table.'\', \''.$field.'\', \''.$field_name.'\');" title="Active">Active</a>';
                    }
                    $recordListing[$i][3]= $actionStatus;
                    $actionLink = '';
                    
                    $edit_url = base_url('employer/emp-management/project/edit/').encode($recordData->project_id);
                    $actionLink .= '<a href="'.$edit_url.'" title="Edit" class="btn btn-icon waves-effect waves-light fa-new-grey m-b-5"><i class="fa fa-edit"></i></a>';

                     $edit_url = base_url('employer/emp-management/project/team-list/').encode($recordData->project_id);
                     $actionLink .= '<a href="'.$edit_url.'" title="project teams" class="btn btn-icon waves-effect waves-light fa-new-grey m-b-5"><i class="fa fa-list"></i></a>';

                   $recordListing[$i][4] = $actionLink;
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
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Project";
        $data['page_heading']="Add Project";
        /*$tech_arr = $this->Mod_Common->selectData(TABLE_PROJECT_TECHNOLOGY, array('employer_id' => $this->employer_id,'status'=>'Active'));
        $data['tech_arr'] = $tech_arr;*/
        $this->employer_template->load('employer_template','employer/employee_management/project/add', $data); 
    }

    /**
    * Sort Description.
    * function name: addProject  
    * Details: update department record
    * @return: 
    * 
    */
    public function addProject(){
        $this->form_validation->set_rules('project_name', 'Project name','trim|required');
       // $this->form_validation->set_rules('technology_name', 'Technology','trim|required');
      /*  $this->form_validation->set_rules('description', 'description','trim|required');*/
        if ($this->form_validation->run() == FALSE) 
        {
            $errors = $this->transformErrorsToArray(validation_errors());
            
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'danger');
            redirect(base_url('employer/emp-management/project/add'));
        }
        else
        {
            extract($this->input->post());
            $addData = array(
                    'employer_id'       => trim($this->employer_id),
                    'project_name'      => trim($project_name),
                    /*'technology_name'   => trim($technology_name),*/
                    'description'       => trim($description),
                    'created_at'        => date('Y-m-d h:i:s'),
                    'updated_at'        => date('Y-m-d h:i:s'),
                    );
            $insert_id = $this->Mod_Common->insertData(TABLE_EMPLOYER_PROJECT, $addData);
            if($insert_id){
                $errors = $this->lang->line('msg_insert_record');
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'success');
                redirect(base_url('employer/emp-management/project'));
            }else{
                $errors = $this->lang->line('msg_not_insert');
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'success');
                redirect(base_url('employer/emp-management/project/add'));
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
        $data['page_title_top']="Project";
        $data['page_heading']="Edit Project";
        $data['page_sub_heading']="Edit Project";
       /* $tech_arr = $this->Mod_Common->selectData(TABLE_PROJECT_TECHNOLOGY, array('employer_id' => $this->employer_id,'status'=>'Active'));
        $data['tech_arr'] = $tech_arr;*/

        $res = $this->Mod_Common->rowData(TABLE_EMPLOYER_PROJECT, array('project_id'=> decode($id)));
        $data['record'] = $res;

       /* echo'<pre>';
        print_r($res);
        echo'</pre>';
        die;*/
        $this->employer_template->load('employer_template','employer/employee_management/project/edit', $data); 
    }

    /**
    * Sort Description.
    * function name: updateProject  
    * Details: update project record
    * @return: 
    * 
    */
    public function updateProject($edit_id){

        $this->form_validation->set_rules('project_name', 'Project name','trim|required');
       /* $this->form_validation->set_rules('technology_name', 'Technology','trim|required');*/
        $this->form_validation->set_rules('description', 'description','trim|required');
        if ($this->form_validation->run() == FALSE) 
        {
            $errors = $this->transformErrorsToArray(validation_errors());
            
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'danger');
            redirect(base_url('employer/emp-management/project/edit/'.$edit_id));
        }
        else
        {
            extract($this->input->post());
            $addData = array(
                    'project_name'      => trim($project_name),
                    /*'technology_name'   => trim($technology_name),*/
                    'description'       => trim($description),
                    'updated_at'        => date('Y-m-d h:i:s'),
                    );
            $update_id = $this->Mod_Common->updateData(TABLE_EMPLOYER_PROJECT, array('project_id' => decode($edit_id),'employer_id'=>$this->employer_id), $addData);
           
                $errors = $this->lang->line('msg_updated_record');
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'success');
                redirect(base_url('employer/emp-management/project'));
            
                
        }
    }


    /**
    * Sort Description.
    * function name: teamList  
    * Details: Load view
    * @return: 
    * 
    */
    public function teamList($project_id){
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Project Teams";
        $data['page_heading']="Project Teams";
        $data['page_sub_heading']="Project Team List";
       
        $data['project_id'] = $project_id;

        $department_list = $this->Mod_Common->selectData(TABLE_EMPLOYER_DEPARTMENT, array('status'=>'Active','employer_id'=>$this->employer_id));
        if(!empty($department_list)){
            $dept_id = $department_list[0]->dep_id;
            $employee_list = $this->Mod_Common->selectData(TABLE_USERS_EMPLOYER, array('status'=>'Active','employer_id'=>$this->employer_id,'employee_department'=>$dept_id),'employee_id,first_name,last_name');
        }

        $data['departments'] = $department_list;
        $data['employee_list'] = $employee_list;
        $data['dept_id'] = $dept_id;

      /*  echo'<pre>';
        print_r($department_list);
        print_r($employee_list);
        echo'</pre>';

        die;*/
        $this->employer_template->load('employer_template','employer/employee_management/project/project_team_list', $data); 
    }

    /**
    * Sort Description.
    * function name: getDepartmentUsers  
    * Details: Load view
    * @return: 
    * 
    */
    public function getDepartmentUsers()
    {

        $departmentId= decode($_POST['department_id']);
        $employee_data = $this->Mod_Common->customQuery("select * from  hs_users_employer where employee_department='".$departmentId."' AND status = 'Active' order by employee_id DESC");
       /* echo'<pre>';
        echo $this->db->last_query();
        print_r($employee_data);
        echo'</pre>';
        die;*/
        //$state_data = $this->data['state_data'];
        $data ='<option value="">Select employee</option>';
        if(count($employee_data) > 0)
        {
            foreach($employee_data as $empVal)
            {
                $data.='<option value="'.$empVal->employee_id.'">'.$empVal->first_name.' '.$empVal->last_name.'</option>.';
            }
        }
        echo $data;
    }


     /**
    * Sort Description.
    * function name: addProject  
    * Details: update department record
    * @return: 
    * 
    */
    public function addTeamInProject($project_id){
        $this->form_validation->set_rules('employee_department', 'Department name','trim|required');
        $this->form_validation->set_rules('employee_id', 'Employee name','trim|required');
      /*  $this->form_validation->set_rules('description', 'description','trim|required');*/
        if ($this->form_validation->run() == FALSE){
            $errors = $this->transformErrorsToArray(validation_errors());
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'danger');
            redirect(base_url('employer/emp-management/project/team-list/'.$project_id));
        }
        else
        {
            extract($this->input->post());
            /*echo'<pre>';
            print_r($this->input->post());
            echo'</pre>';
            die;*/

            $res = $this->Mod_Common->rowData(TABLE_EMPLOYER_PROJECT_TEAM, array('employer_id' => $this->employer_id,'project_id' =>decode($project_id),'employee_id' =>$employee_id, 'department_id'=>decode($employee_department)));
            if(!empty($res)){
                $errors = $this->lang->line('msg_duplicate_project_team');
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'danger');
                redirect(base_url('employer/emp-management/project/team-list/'.$project_id));
            }


            $addData = array(
                    'employer_id'       => trim($this->employer_id),
                    'project_id'        => decode($project_id),
                    'employee_id'       => trim($employee_id),
                    'department_id'     => decode($employee_department),
                    'created_at'        => date('Y-m-d h:i:s'),
                    'updated_at'        => date('Y-m-d h:i:s'),
                    );
            $insert_id = $this->Mod_Common->insertData(TABLE_EMPLOYER_PROJECT_TEAM, $addData);
            if($insert_id){
                $errors = $this->lang->line('msg_insert_record');
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'success');
                redirect(base_url('employer/emp-management/project/team-list/'.$project_id));
            }else{
                $errors = $this->lang->line('msg_not_insert');
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'success');
               redirect(base_url('employer/emp-management/project/team-list/'.$project_id));
            }
                
        }
    }


    /**
    * Sort Description.
    * function name: projectTeamAjaxList  
    * Details: update project record
    * @return: 
    * 
    */
    public function projectTeamAjaxList($project_id){
        $start   =  $this->input->get('start'); // get promo code Id
        $length  =  $this->input->get('length'); // get promo code Id
        $draw    =  $this->input->get('draw'); // get promo code Id
        $order   =  $this->input->get('order');
        if(!empty($order)){ 
            if($order[0]['column']==1){
                $column_name='hs_employer_project.project_name';
            }else if($order[0]['column']==2){
                $column_name='hs_users_employer.full_name';
            }else if($order[0]['column']==3){
                $column_name='hs_employer_department.dept_name';
            }else if($order[0]['column']==4){
                $column_name='hs_employer_project_team.created_at';
            }else if($order[0]['column']==5){
                $column_name='hs_employer_project_team.status';
            }else{
                $column_name='hs_employer_project_team.project_team_id';
            }
        }
       
        $this->session->set_userdata('get_project_id', decode($project_id));
        $totalRecord      = $this->ProjectTeam_model->projectTeamAjaxList(true);
        $getRecordListing = $this->ProjectTeam_model->projectTeamAjaxList(false,$start,$length, $column_name, $order[0]['dir']);
        $recordListing = array();
        $content='[';
        $i=0;       
        $srNumber=$start; 
       
      /* echo'<pre>';
       echo $this->db->last_query();
       print_r($getRecordListing);
       echo '</pre>';
       die;*/
        if(!empty($getRecordListing)) {
            $actionContent = '';
            foreach($getRecordListing as $recordData) {
                   
                    $actionContent = ''; // set default empty
                    $content .='[';                    
                    $recordListing[$i][0]= $srNumber+1;
                    $recordListing[$i][1]= $recordData->project_name;
                    $recordListing[$i][2]= $recordData->full_name;
                    $recordListing[$i][3]= $recordData->dept_name;
                    $recordListing[$i][4] = dateTime($recordData->created_at);
                    $table = TABLE_EMPLOYER_PROJECT_TEAM;
                    $field = 'status';
                    $field_name = 'project_team_id';
                    $urls  =  base_url('employer/emp-management/project/updateProjectTeamStatus');
                    $actionStatus = '';
                    if($recordData->status == "Deactive"){
                        $status = 'Active';
                        $actionStatus ='<a class="btn btn-danger waves-effect" style="width: 75%;" href="javascript:void(0);" onclick="changestatus('.$recordData->project_team_id.', \''.$status.'\', \''.$urls.'\' , \''.$table.'\', \''.$field.'\', \''.$field_name.'\');" title="Deactive">Deactive</a>';

                    }else { 
                        $status = 'Deactive';
                        $actionStatus ='<a class="btn btn-primary waves-effect" style="width: 75%;" href="javascript:void(0);" onclick="changestatus('.$recordData->project_team_id.', \''.$status.'\', \''.$urls.'\' , \''.$table.'\', \''.$field.'\', \''.$field_name.'\');" title="Active">Active</a>';
                    }
                    $recordListing[$i][5]= $actionStatus;
                    $actionLink = '';
                    
                   /* $edit_url = base_url('employer/emp-management/project/edit/').encode($recordData->project_id);
                    $actionLink .= '<a href="'.$edit_url.'" title="Edit" class="btn btn-icon waves-effect waves-light fa-new-grey m-b-5"><i class="fa fa-edit"></i></a>';

                     $edit_url = base_url('employer/emp-management/project/team_list/').encode($recordData->project_id);
                     $actionLink .= '<a href="'.$edit_url.'" title="project teams" class="btn btn-icon waves-effect waves-light fa-new-grey m-b-5"><i class="fa fa-list"></i></a>';

                   $recordListing[$i][6] = $actionLink;*/
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

    /**
    * Sort Description.
    * function name:  updateProjectTeamStatus  
    * Details: change user status
    * @return: true/false
    * 
    */
    public function updateProjectTeamStatus() {

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