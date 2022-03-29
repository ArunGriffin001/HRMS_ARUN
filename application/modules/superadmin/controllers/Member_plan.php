<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Member_plan extends MX_Controller  {
 
    var $data = array(); 

    /** All users login there **/
    public function __construct(){
        parent::__construct();
        $this->isAuthenticated('LoginDetails',base_url('superadmin/login'));
        $this->load->model('Member_plan_model');
    }

    public function index(){
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Member plan";
        $this->superadmin_template->load('superadmin_template','superadmin/member_plan/list', $data);
    }

    /**********************   ADD BLOG SECTION ************************/
    /**
    * Sort Description.
    * function name: addPlan  
    * Details: load add form
    * @return: 
    * 
    */
    public function addPlan(){
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Member Plan";
        $data['page_heading']="Add Plan";
        $this->superadmin_template->load('superadmin_template','superadmin/member_plan/add', $data);
    }

    /**
    * Sort Description.
    * function name:  submitBlog  
    * Details: store record in DB
    * @return: id
    * 
    */
    public function submitPlan(){
        
        $this->form_validation->set_rules('title', 'Title','trim|required');
        $this->form_validation->set_rules('tag_line', 'Tag line','trim|required');
        $this->form_validation->set_rules('monthly_amount', 'Monthly amount','trim|required');
        $this->form_validation->set_rules('yearly_amount', 'Yearly amount','trim|required');
        $this->form_validation->set_rules('is_popular', 'Popular','trim|required');
        
        if ($this->form_validation->run() == FALSE) 
        {
            $errors = $this->transformErrorsToArray(validation_errors());
           
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'danger');
            redirect(base_url('superadmin/plan/add'));
        }
        else
        {
            extract($this->input->post());
              /*  echo'<pre>';
                print_r($check_blog);
                echo'</pre>';
                die;*/
                
                $add_date       = date('Y-m-d h:i:s');
                $addedData      = array(
                    'title'             => $title,
                    'description'       => $editor1,
                    'tag_line'          => $tag_line,
                    'monthly_amount'    => $monthly_amount,
                    'yearly_amount'     => $yearly_amount,
                    'is_popular'        => $is_popular,
                    'created_at'        => $add_date,
                    'updated_at'        => $add_date,
                );
            
            $plan_id = $this->Mod_Common->insertData(TABLE_MEMBER_PLAN, $addedData);
            if($plan_id){
                $errors = 'Plan added successfully';
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'success');
                redirect(base_url('superadmin/plan/add'));
            }else{
                $errors = 'Record not insert something is wrong';
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'danger');
                redirect(base_url('superadmin/plan/add'));
            }
        }
    }

    /**
    * Sort Description.
    * function name:  tagList  
    * Details: load tag list page
    * @return: array
    * 
    */
    public function memberPlanList(){
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Member Plan";
        $data['page_sub_heading']="Member Plan List";
        $this->superadmin_template->load('superadmin_template','superadmin/member_plan/list', $data);
    }

    /**
    * Sort Description.
    * function name:  blogAjaxList  
    * Details: show record in datatable
    * @return: array
    * 
    */
    public function memberPlanAjaxList(){
        $start   =  $this->input->get('start'); // get promo code Id
        $length  =  $this->input->get('length'); // get promo code Id
        $draw    =  $this->input->get('draw'); // get promo code Id
        $order   =  $this->input->get('order');
        if(!empty($order)){ 
            if($order[0]['column']==1){
                $column_name='title';
            }else if($order[0]['column']==2){
                $column_name='tag_line';
            }else if($order[0]['column']==3){
                $column_name='monthly_amount';
            }else if($order[0]['column']==4){
                $column_name='yearly_amount';
            }else if($order[0]['column']==5){
                $column_name='is_popular';
            }else if($order[0]['column']==6){
                $column_name='status';
            }else if($order[0]['column']==7){
                $column_name='created_at';
            }else{
                $column_name='id';
            }
        }
        $totalRecord      = $this->Member_plan_model->memberPlanAjaxList(true);
        $getRecordListing = $this->Member_plan_model->memberPlanAjaxList(false,$start,$length, $column_name, $order[0]['dir']);
        $recordListing = array();
        $content='[';
        $i=0;       
        $srNumber=$start; 
        /*echo'<pre>';
        print_r($getRecordListing);
        echo'</pre>';
        die; */     
        if(!empty($getRecordListing)) {
            $actionContent = '';
            foreach($getRecordListing as $recordData) {
                   
                    $actionContent = ''; // set default empty
                    $content .='[';                    
                    $recordListing[$i][0]= $srNumber+1;
                    $recordListing[$i][1]= $recordData->title;
                    $recordListing[$i][2]= $recordData->tag_line;
                    $recordListing[$i][3]= $recordData->monthly_amount;
                    $recordListing[$i][4]= $recordData->yearly_amount;
                    $recordListing[$i][5]= $recordData->is_popular;
                    $recordListing[$i][6] = dateTime($recordData->created_at);
                    $table = TABLE_MEMBER_PLAN;
                    $field = 'status';
                    $field_name = 'id';
                    $urls  =  base_url(ADMIN_URL).'plan/updateStatus'; //base_url('admin/users/updateStatus');
                    $actionStatus = '';
                    if($recordData->status == "Deactive"){
                        $status = 'Active';
                        $actionStatus ='<a class="btn btn-danger waves-effect" style="width: 75%;" href="javascript:void(0);" onclick="changestatus('.$recordData->id.', \''.$status.'\', \''.$urls.'\' , \''.$table.'\', \''.$field.'\', \''.$field_name.'\');" title="Deactive">Deactive</a>';

                    }else { 
                        $status = 'Deactive';
                        $actionStatus ='<a class="btn btn-primary waves-effect" style="width: 75%;" href="javascript:void(0);" onclick="changestatus('.$recordData->id.', \''.$status.'\', \''.$urls.'\' , \''.$table.'\', \''.$field.'\', \''.$field_name.'\');" title="Active">Active</a>';
                    }
                    $recordListing[$i][7]= $actionStatus;
                    $actionLink = '';
                    
                    $edit_slider_url = base_url(ADMIN_URL).'plan/edit/'.encode($recordData->id);
                    $actionLink .= '<a href="'.$edit_slider_url.'" title="Edit" class="btn btn-icon waves-effect waves-light fa-new-grey m-b-5"><i class="fa fa-edit"></i></a>';

                   $recordListing[$i][8] = $actionLink;
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
    * function name:  editBlog  
    * Details: edit tag value
    * @return: true/false
    * 
    */
    public function editMemberPlan($id) {
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Member Plan";
        $data['page_heading']="Edit Plan";
        $record = rowData(TABLE_MEMBER_PLAN, array('id'=>decode($id)));
        
        $data['record'] = $record;
        /*
        echo'<pre>';
        print_r($record);
        echo'</pre>';
        die;*/
        $this->superadmin_template->load('superadmin_template','superadmin/member_plan/edit', $data);
    }

       /**
    * Sort Description.
    * function name:  updateBlog  
    * Details: update blog value
    * @return: true/false
    * 
    */
    public function updateMemberPlan($id){

        $this->form_validation->set_rules('title', 'Title','trim|required');
        $this->form_validation->set_rules('tag_line', 'Tag line','trim|required');
        $this->form_validation->set_rules('monthly_amount', 'Monthly amount','trim|required');
        $this->form_validation->set_rules('yearly_amount', 'Yearly amount','trim|required');
        $this->form_validation->set_rules('is_popular', 'Popular','trim|required');
        
        if ($this->form_validation->run() == FALSE) 
        {
            $errors = $this->transformErrorsToArray(validation_errors());
            
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'danger');
            redirect(base_url(ADMIN_URL).'plan/edit/'.$id);
        }
        else
        {
            extract($this->input->post());
            //echo $slug; die;
            $updatedData = array(
                    'title'         => $title,
                    'updated_at'    => date('Y-m-d h:i:s'),
            );
            $add_date       = date('Y-m-d h:i:s');
            $updatedData      = array(
                'title'             => $title,
                'description'       => $editor1,
                'tag_line'          => $tag_line,
                'monthly_amount'    => $monthly_amount,
                'yearly_amount'     => $yearly_amount,
                'is_popular'        => $is_popular,
                'updated_at'        => $add_date,
            );
            $plan_id = $this->Mod_Common->updateData(TABLE_MEMBER_PLAN,array('id'=>decode($id)), $updatedData);
            if($plan_id){
                $errors = 'Plan updated successfully';
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'success');
                redirect(base_url(ADMIN_URL).'plan/list/');
            }else{
                $errors = 'Record not update something is wrong';
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'danger');
                redirect(base_url(ADMIN_URL).'plan/edit/'.$id);
            }
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