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
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Users";
        $data['page_heading']="Users List";
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
            if($order[0]['column']==2){
                $column_name='company_name';
            }else if($order[0]['column']==3){
                $column_name='email';
            }else if($order[0]['column']==4){
                $column_name='phone_number';
            }else if($order[0]['column']==5){
                $column_name='status';
            }else if($order[0]['column']==6){
                $column_name='created_at';
            }else{
                $column_name='id';
            }
        }
        $totalRecord      = $this->Users_model->userAjaxlist(true);
        $getRecordListing = $this->Users_model->userAjaxlist(false,$start,$length, $column_name, $order[0]['dir']);
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
                    $img = (!empty($recordData->profile_image) ? $recordData->profile_image : 'default_img.jpg');
                    
                    $recordListing[$i][1]= '<img src="'.base_url().'uploads/superadmin/users/'.$img.'" width=150>';
                    $recordListing[$i][2]= $recordData->company_name;
                   
                    $recordListing[$i][3]= $recordData->email;
                    $recordListing[$i][4]= $recordData->phone_number;
                    $recordListing[$i][5] = date('Y-m-d', strtotime($recordData->created_at));

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
                    $recordListing[$i][6]= $actionStatus;

                    $actionLink = '';
                    
                    $actionLink .= '<a href="javascript:void(0)" title="view" class="btn btn-icon waves-effect waves-light fa-new-grey m-b-5" data-toggle="modal" data-target="#view_users" onclick="view_users('.$recordData->id.')"><i class="fa fa-eye"></i></a>';
                    $view_plan_url = base_url(ADMIN_URL).'users/plan_list/';
                    $actionLink .= '<a href="'.$view_plan_url.'" title="view plan" class="btn btn-icon waves-effect waves-light fa-new-grey m-b-5" ><i class="fa fa-list"></i></a>';

                   $recordListing[$i][7] = $actionLink;
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
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Users";
        $data['page_heading']="Add User";
        $this->superadmin_template->load('superadmin_template','superadmin/users/add', $data);
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
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Users";
        $data['page_heading']="User Plan List";
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
		$data['user_result'] = $this->Mod_Common->rowData('users',array('id'=>$user_id),'*');
		$data['title'] = 'View Users Profile';
        /*echo '<pre>';
        print_r($data['user_result']);
        echo'</pre>';
        die;*/
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