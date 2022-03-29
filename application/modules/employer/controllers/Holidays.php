<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Holidays extends MX_Controller  {
 
    var $data = array(); 

    /** All users login there **/
    public function __construct(){
        parent::__construct();
        $this->isAuthenticated('EmployerLoginDetails',base_url('sign-in'));
        $this->login_data = $this->session->userdata('EmployerLoginDetails');
        $this->load->model('Holidays_model');
        $this->login_data = $this->session->userdata('EmployerLoginDetails');
        $this->employer_id = $this->login_data['userId'];
    } 

    /**
    * Sort Description.
    * function name: hrmsHoliday  
    * Details: Load hrms holiday view
    * @return: 
    * 
    */
    public function hrmsHoliday(){
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Holidays";
        $data['page_heading']="Holidays";
        $year = date('Y');
        $employer_id = $this->login_data['userId'];
        if(!empty($this->input->post('employer_val'))){
            extract($this->input->post());
            //$employer_id = decode($employer_val);
            $year = $holiday_date;
            $year = $holiday_date;
            $custom_query = "SELECT * FROM hs_employer_holiday WHERE YEAR(holiday_date) = $year AND employer_id = $employer_id ORDER BY id DESC";
        }else{
            $employer_id = $this->employer_id;
            $custom_query = "SELECT * FROM hs_employer_holiday WHERE YEAR(holiday_date) = $year AND employer_id = $employer_id ORDER BY id DESC";
        }
        $res = $this->Mod_Common->customQuery($custom_query);
        $data['page_heading']="Holidays";
        $data['year']   =  $year;
        $employer_id = $this->employer_id;
        $year_list = $this->Mod_Common->customQuery("SELECT DISTINCT(YEAR(holiday_date)) as years FROM hs_employer_holiday WHERE employer_id = $employer_id ORDER BY YEAR(holiday_date) DESC");
        $data['year_list'] = $year_list;
        $data['holiday'] = $res;
        $data['employerID'] = $this->employer_id;

       
        $this->employer_template->load('employer_template','employer/hrms/holidays/hr_holidays', $data); 
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
        $data['page_title_top']="Holidays";
        $data['page_heading']="Holidays";
        $data['page_sub_heading']="Holiday List";
        $this->employer_template->load('employer_template','employer/hrms/holidays/list', $data); 
    }

    public function holidayAjaxList()
    {
       
        $start   =  $this->input->get('start'); // get promo code Id
        $length  =  $this->input->get('length'); // get promo code Id
        $draw    =  $this->input->get('draw'); // get promo code Id
        $order   =  $this->input->get('order');
        if(!empty($order)){ 
            if($order[0]['column']==1){
                $column_name='day_name';
            }else if($order[0]['column']==2){
                $column_name='holiday_date';
            }else if($order[0]['column']==3){
                $column_name='holiday_details';
            }else if($order[0]['column']==4){
                $column_name='status';
            }else if($order[0]['column']==5){
                $column_name='created_at';
            }else{
                $column_name='dep_id';
            }
        }
        $totalRecord      = $this->Holidays_model->holidayAjaxList(true);
        $getRecordListing = $this->Holidays_model->holidayAjaxList(false,$start,$length, $column_name, $order[0]['dir']);
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
                    $recordListing[$i][1]= ucfirst($recordData->day_name);
                    $recordListing[$i][2]= date('Y-m-d', strtotime($recordData->holiday_date));
                    $recordListing[$i][3]= $recordData->holiday_details;
                    $recordListing[$i][4] = dateTime($recordData->created_at);
                    $table = TABLE_HOLIDAY;
                    $field = 'status';
                    $field_name = 'id';
                    $urls  =  base_url('employer/hrms/holiday/updateStatus');
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
                    
                    $edit_url = base_url('employer/hrms/holiday/edit/').encode($recordData->id);
                    $actionLink .= '<a href="'.$edit_url.'" title="Edit" class="btn btn-icon waves-effect waves-light fa-new-grey m-b-5"><i class="fa fa-edit"></i></a>';

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
    * function name: addHoliday  
    * Details: add holiday record
    * @return: 
    * 
    */
    public function addHoliday(){
        $this->form_validation->set_rules('day_name', 'Day name','trim|required');
        $this->form_validation->set_rules('holiday_details', 'Description','trim|required');
        $this->form_validation->set_rules('holiday_date', 'Date','trim|required');
        if ($this->form_validation->run() == FALSE) 
        {
            $errors = $this->transformErrorsToArray(validation_errors());
            
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'danger');
            redirect(base_url('employer/hrms/holiday/list'));
        }
        else
        {
            extract($this->input->post());
           /* echo'<pre>';
            print_r($this->input->post());
            echo'</pre>';
            die;*/
            $addedData = array(
                    'employer_id'     => $this->employer_id,
                    'day_name'        => trim($day_name),
                    'holiday_details' => trim($holiday_details),
                    'holiday_date'    => date('Y-m-d h:i:s', strtotime($holiday_date)),
                    'created_at'      => date('Y-m-d h:i:s'),
                    'updated_at'      => date('Y-m-d h:i:s'),
                    );
            $tag_id = $this->Mod_Common->insertData(TABLE_HOLIDAY, $addedData);
            if($tag_id){
                $errors = 'Record added successfully';
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'success');
                redirect(base_url('employer/hrms/holiday/list'));
            }else{
                $errors = 'Record not insert something is wrong';
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'danger');
                redirect(base_url('employer/hrms/holiday/list'));
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
        $data['page_title_top']="Holidays";
        $data['page_heading']="Holidays";
        $data['page_sub_heading']="Edit Holiday";
        $res = $this->Mod_Common->rowData(TABLE_HOLIDAY, array('id'=> decode($id)));
        $data['record'] = $res;
        $this->employer_template->load('employer_template','employer/hrms/holidays/edit', $data); 
    }

    /**
    * Sort Description.
    * function name: updateHoliday  
    * Details: add holiday record
    * @return: 
    * 
    */
    public function updateHoliday($edit_id){
        $this->form_validation->set_rules('day_name', 'Day name','trim|required');
        $this->form_validation->set_rules('holiday_details', 'Description','trim|required');
        $this->form_validation->set_rules('holiday_date', 'Date','trim|required');
        if ($this->form_validation->run() == FALSE) 
        {
            $errors = $this->transformErrorsToArray(validation_errors());
            
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'danger');
            redirect(base_url('employer/hrms/holiday/edit/'.$edit_id));
        }
        else
        {
            extract($this->input->post());
            /*echo'<pre>';
            print_r($this->input->post());
            echo'</pre>';
            die;*/
            $updateData = array(
                    'day_name'        => trim($day_name),
                    'holiday_details' => trim($holiday_details),
                    'holiday_date'    => date('Y-m-d h:i:s', strtotime($holiday_date)),
                    'updated_at'      => date('Y-m-d h:i:s'),
                    );
            $update_id = $this->Mod_Common->updateData(TABLE_HOLIDAY, array('id'=>decode($edit_id), 'employer_id' => $this->employer_id), $updateData);
                $errors = $this->lang->line('msg_updated_record');
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'success');
                redirect(base_url('employer/hrms/holiday/list'));
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