<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class HRMSDesignation extends MX_Controller  {
 
    var $data = array(); 

    /** All users login there **/
    public function __construct(){
        parent::__construct();
        $this->isAuthenticated('EmployerLoginDetails',base_url('sign-in'));
        $this->login_data = $this->session->userdata('EmployerLoginDetails');
        $this->load->model('Designation_model');
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
        $data['page_title_top']="Designation";
        $data['page_heading']="Designation";
        $data['page_sub_heading']="Designation List";
        $this->employer_template->load('employer_template','employer/hrms/designation/hr_designation', $data); 
    }

     public function designationAjaxList()
    {
       
        $start   =  $this->input->get('start'); // get promo code Id
        $length  =  $this->input->get('length'); // get promo code Id
        $draw    =  $this->input->get('draw'); // get promo code Id
        $order   =  $this->input->get('order');
        if(!empty($order)){ 
            if($order[0]['column']==1){
                $column_name='name';
            }else if($order[0]['column']==2){
                $column_name='created_at';
            }else if($order[0]['column']==3){
                $column_name='status';
            }else{
                $column_name='id';
            }
        }
        $totalRecord      = $this->Designation_model->designationAjaxList(true);
        $getRecordListing = $this->Designation_model->designationAjaxList(false,$start,$length, $column_name, $order[0]['dir']);
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
                    $recordListing[$i][1]= $recordData->name;
                    $recordListing[$i][2] = dateTime($recordData->created_at);
                    $table = TABLE_EMPLOYER_DESIGNATION;
                    $field = 'status';
                    $field_name = 'id';
                    $urls  =  base_url('employer/designation/updateStatus');
                    $actionStatus = '';
                    if($recordData->status == "Deactive"){
                        $status = 'Active';
                        $actionStatus ='<a class="btn btn-danger waves-effect" style="width: 75%;" href="javascript:void(0);" onclick="changestatus('.$recordData->id.', \''.$status.'\', \''.$urls.'\' , \''.$table.'\', \''.$field.'\', \''.$field_name.'\');" title="Deactive">Deactive</a>';

                    }else { 
                        $status = 'Deactive';
                        $actionStatus ='<a class="btn btn-primary waves-effect" style="width: 75%;" href="javascript:void(0);" onclick="changestatus('.$recordData->id.', \''.$status.'\', \''.$urls.'\' , \''.$table.'\', \''.$field.'\', \''.$field_name.'\');" title="Active">Active</a>';
                    }
                    $recordListing[$i][3]= $actionStatus;
                    $actionLink = '';
                    
                    $edit_slider_url = base_url('employer/designation/edit/').encode($recordData->id);
                    $actionLink .= '<a href="'.$edit_slider_url.'" title="Edit" class="btn btn-icon waves-effect waves-light fa-new-grey m-b-5"><i class="fa fa-edit"></i></a>';

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
        $this->form_validation->set_rules('name', 'Designation name','trim|required');

        if ($this->form_validation->run() == FALSE) 
        {
            $errors = $this->transformErrorsToArray(validation_errors());
            
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'danger');
            redirect(base_url('employer/hrms/designation'));
        }
        else
        {
            extract($this->input->post());
           /* echo'<pre>';
            print_r($this->input->post());
            echo'</pre>';
            die;*/
            $employer_id = $this->login_data['userId'];
            $addedData = array(
                    'employer_id'   => $employer_id,
                    'name'          => trim($name),
                    'created_at'    => date('Y-m-d h:i:s'),
                    'updated_at'    => date('Y-m-d h:i:s'),
                    );
            $tag_id = $this->Mod_Common->insertData(TABLE_EMPLOYER_DESIGNATION, $addedData);
            if($tag_id){
                $errors = 'Record added successfully';
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'success');
                redirect(base_url('employer/hrms/designation'));
            }else{
                $errors = 'Record not insert something is wrong';
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'danger');
                redirect(base_url('employer/hrms/designation'));
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
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Designation";
        $data['page_heading']="Designation";
        $data['page_sub_heading']="Edit Designation";
        $res = $this->Mod_Common->rowData(TABLE_EMPLOYER_DESIGNATION, array('id'=> decode($id)));
        $data['record'] = $res;
        $this->employer_template->load('employer_template','employer/hrms/designation/edit', $data); 
    }

    /**
    * Sort Description.
    * function name: updateDepartment  
    * Details: update department record
    * @return: 
    * 
    */
    public function updateDesignation($edit_id){
        $this->form_validation->set_rules('name', 'Designation name','trim|required');
       
        if ($this->form_validation->run() == FALSE) 
        {
            $errors = $this->transformErrorsToArray(validation_errors());
            
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'danger');
            redirect(base_url('employer/hrms/designation/edit/'.$edit_id));
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
                    'name'          => trim($name),
                    'updated_at'    => date('Y-m-d h:i:s'),
                    );
            $update_id = $this->Mod_Common->updateData(TABLE_EMPLOYER_DESIGNATION, array('id'=>decode($edit_id), 'employer_id' => $employer_id), $updateData);
                $errors = $this->lang->line('msg_updated_record');
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'success');
                redirect(base_url('employer/hrms/designation'));
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