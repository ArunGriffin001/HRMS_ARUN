<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Events extends MX_Controller  {
 
    var $data = array(); 

    /** All users login there **/
    public function __construct(){
        parent::__construct();
        $this->isAuthenticated('EmployerLoginDetails',base_url('sign-in'));
        $this->load->model('Events_model');
        $this->login_data = $this->session->userdata('EmployerLoginDetails');
        $this->employer_id = $this->login_data['userId'];
    }

    /**
    * Sort Description.
    * function name: hrmsEvents  
    * Details: Load hrms events view
    * @return: 
    * 
    */
    public function hrmsEvents(){
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Events";
        $data['page_heading']="All Events";
        $this->employer_template->load('employer_template','employer/hrms/events/hr_events', $data); 
    }

     /**
    * Sort Description.
    * function name: fetch_event  
    * Details: fetch events
    * @return: array 
    * 
    */
    public function fetch_event($id){
        if(!empty($id)){
            $query = "SELECT * FROM hs_employer_event WHERE employer_id = $id AND status = 'Active'";
            $res = $this->Mod_Common->customQuery($query);
           
            $eventArray = array();
            foreach ($res as $key => $res_val) {
                array_push($eventArray, $res_val);
            }
            echo json_encode($eventArray);
            
        }
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
        $data['page_title_top']="Events";
        $data['page_heading']="Events";
        $data['page_sub_heading']="Add Event";
        $this->employer_template->load('employer_template','employer/hrms/events/add', $data); 
    }

    /**
    * Sort Description.
    * function name: eventList  
    * Details: Load view
    * @return: 
    * 
    */
    public function eventList(){
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Events";
        $data['page_heading']="Events";
        $data['page_sub_heading']="Events List";
        $this->employer_template->load('employer_template','employer/hrms/events/list', $data); 
    }

    public function eventAjaxList()
    {
        $start   =  $this->input->get('start'); // get promo code Id
        $length  =  $this->input->get('length'); // get promo code Id
        $draw    =  $this->input->get('draw'); // get promo code Id
        $order   =  $this->input->get('order');
        if(!empty($order)){ 
            if($order[0]['column']==1){
                $column_name='title';
            }else if($order[0]['column']==2){
                $column_name='start';
            }else if($order[0]['column']==3){
                $column_name='end';
            }else if($order[0]['column']==4){
                $column_name='status';
            }else{
                $column_name='event_id';
            }
        }
        $totalRecord      = $this->Events_model->eventAjaxList(true);
        $getRecordListing = $this->Events_model->eventAjaxList(false,$start,$length, $column_name, $order[0]['dir']);
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
                    $recordListing[$i][1]= ucfirst($recordData->title);
                    $recordListing[$i][2]= date('Y-m-d H:i', strtotime($recordData->start));
                    $recordListing[$i][3]= date('Y-m-d H:i', strtotime($recordData->end));
                    $table = TABLE_EVENTS;
                    $field = 'status';
                    $field_name = 'event_id';
                    $urls  =  base_url('employer/hrms/events/updateStatus');
                    $actionStatus = '';
                    if($recordData->status == "Deactive"){
                        $status = 'Active';
                        $actionStatus ='<a class="btn btn-danger waves-effect" style="width: 75%;" href="javascript:void(0);" onclick="changestatus('.$recordData->event_id.', \''.$status.'\', \''.$urls.'\' , \''.$table.'\', \''.$field.'\', \''.$field_name.'\');" title="Deactive">Deactive</a>';

                    }else { 
                        $status = 'Deactive';
                        $actionStatus ='<a class="btn btn-primary waves-effect" style="width: 75%;" href="javascript:void(0);" onclick="changestatus('.$recordData->event_id.', \''.$status.'\', \''.$urls.'\' , \''.$table.'\', \''.$field.'\', \''.$field_name.'\');" title="Active">Active</a>';
                    }
                    $recordListing[$i][4]= $actionStatus;
                    $actionLink = '';
                    
                    $edit_url = base_url('employer/hrms/events/edit/').encode($recordData->event_id);
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
    * function name: addEvent  
    * Details: add holiday record
    * @return: 
    * 
    */
    public function addEvent(){
        $this->form_validation->set_rules('title', 'Name','trim|required');
        $this->form_validation->set_rules('start', 'Start date','trim|required');
        $this->form_validation->set_rules('end', 'End date','trim|required');
        if ($this->form_validation->run() == FALSE) 
        {
            $errors = $this->transformErrorsToArray(validation_errors());
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'danger');
            redirect(base_url('employer/hrms/events/add'));
        }
        else
        {
            extract($this->input->post());
            $start_date = strtotime($start);
            $end_date = strtotime($end);
           /* echo 'start date = '.$start.' End date = '.$end.'<br>';
            echo 'start date = '.$start_date.' End date = '.$end_date;
            die;*/
            if($end_date < $start_date){
                $errors = 'Sorry the start date and time should br greater than End date and time.';
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'danger');
                redirect(base_url('employer/hrms/events/add'));
            }
           /* echo'<pre>';
            print_r($this->input->post());
            echo'</pre>';
            die;*/
            $employer_id = $this->employer_id;
            $addedData = array(
                    'employer_id'   => $employer_id,
                    'title'         => trim($title),
                    'start'         => date('Y-m-d H:i:s', strtotime($start)),
                    'end'           => date('Y-m-d H:i:s', strtotime($end)),
                    'created_at'    => date('Y-m-d h:i:s'),
                    'updated_at'    => date('Y-m-d h:i:s'),
                    );
            $insert_id = $this->Mod_Common->insertData(TABLE_EVENTS, $addedData);
            if($insert_id){
                $errors = 'Record added successfully';
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'success');
                redirect(base_url('employer/hrms/events/list'));
            }else{
                $errors = 'Record not insert something is wrong';
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'danger');
                redirect(base_url('employer/hrms/events/add'));
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
        $data['page_title_top']="Events";
        $data['page_heading']="Events";
        $data['page_sub_heading']="Edit Event";
        $res = $this->Mod_Common->rowData(TABLE_EVENTS, array('event_id'=> decode($id)));
        $data['record'] = $res;
        $this->employer_template->load('employer_template','employer/hrms/events/edit', $data); 
    }

    /**
    * Sort Description.
    * function name: updateHoliday  
    * Details: add holiday record
    * @return: 
    * 
    */
    public function updateEvents($edit_id){
        $this->form_validation->set_rules('title', 'Name','trim|required');
        $this->form_validation->set_rules('start', 'Start date','trim|required');
        $this->form_validation->set_rules('end', 'End date','trim|required');
        $employer_id = $this->employer_id;
        if ($this->form_validation->run() == FALSE) 
        {
            $errors = $this->transformErrorsToArray(validation_errors());
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'danger');
            redirect(base_url('employer/hrms/events/edit/'.$edit_id));
        }
        else
        {
            extract($this->input->post());
            $start_date = strtotime($start);
            $end_date = strtotime($end);

           /* echo 'start time ='. $start.'End time = '.$end;
            die;*/
             if($end_date < $start_date){
                $errors = 'Sorry the start date and time should br greater than End date and time.';
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'danger');
                redirect(base_url('employer/hrms/events/edit/'.$edit_id));
            }
            $updateData = array(
                    'title'         => trim($title),
                    'start'         => date('Y-m-d H:i:s', strtotime($start)),
                    'end'           => date('Y-m-d H:i:s', strtotime($end)),
                    'updated_at'    => date('Y-m-d h:i:s'),
                    );
            $update_id = $this->Mod_Common->updateData(TABLE_EVENTS, array('event_id'=>decode($edit_id), 'employer_id' => $employer_id), $updateData);
                $errors = $this->lang->line('msg_updated_record');
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'success');
                redirect(base_url('employer/hrms/events/list'));
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