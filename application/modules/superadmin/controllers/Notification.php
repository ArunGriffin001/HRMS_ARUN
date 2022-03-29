<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Notification extends MX_Controller  {
 
     var $data = array(); 

	/** All users login there **/
	public function __construct()
    {
        parent::__construct();
        //Do your magic here
         $this->isAuthenticated('LoginDetails',base_url('superadmin/login'));
        $this->load->model('Notification_model');
    }
	 
	public function index(){
		$data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Notification";
        $data['page_heading']="Notification List";
        $this->superadmin_template->load('superadmin_template','superadmin/notification/list', $data);
	}
    
    /**
    * Sort Description.
    * function name:  enquiryAjaxList
    * Details: show list 
    * @return: true/false
    * 
    */
    public function notificationAjaxList(){
        $start   =  $this->input->get('start'); // get promo code Id
        $length  =  $this->input->get('length'); // get promo code Id
        $draw    =  $this->input->get('draw'); // get promo code Id
        $order   =  $this->input->get('order');
        if(!empty($order)){ 
            if($order[0]['column']==1){
                $column_name='subject';
            }else if($order[0]['column']==2){
                $column_name='created_at';
            }else{
                $column_name='id';
            }
        }
        $totalRecord      = $this->Notification_model->notificationAjaxList(true);
        $getRecordListing = $this->Notification_model->notificationAjaxList(false,$start,$length, $column_name, $order[0]['dir']);
        $recordListing = array();
        $content='[';
        $i=0;       
        $srNumber=$start; 
       
        if(!empty($getRecordListing)) {
            $actionContent = '';
            foreach($getRecordListing as $recordData) {
               $id = $recordData->id;
                $actionContent = ''; // set default empty
                $content .='[';                    
                $recordListing[$i][0]= $srNumber+1;
                $recordListing[$i][1]= $recordData->subject;
                $recordListing[$i][2] = dateTime($recordData->created_at);
                 $actionLink = '';
                    
                //$view_user_url = base_url(ADMIN_URL).'/enquiry/get-view-enquiry-data/'.$id;
                $actionLink .= '<a href="javascript:void(0)" title="view" class="btn btn-icon waves-effect waves-light fa-new-grey m-b-5" data-toggle="modal" data-target="#view_transaction_history" onclick="view_transaction_history('.$id.')"><i class="fa fa-eye"></i></a>';
                $recordListing[$i][3] = $actionLink;
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


    public function add(){
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Notification";
        $data['page_heading']="Add Notification";
        $this->superadmin_template->load('superadmin_template','superadmin/notification/add', $data);
    }

    /**
    * Sort Description.
    * function name: hrmsDepartmentAdd  
    * Details: add record as per department type
    * @return: 
    * 
    */
    public function addNotification(){
        $this->form_validation->set_rules('subject', 'Subject name','trim|required');

        if ($this->form_validation->run() == FALSE) 
        {
            $errors = $this->transformErrorsToArray(validation_errors());
            
            $this->session->set_flashdata('error_message', $errors);
            $this->session->set_flashdata('errorclass', 'danger');
            redirect(base_url('superadmin/notification/add'));
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
                    'subject'          => trim($subject),
                    'description'          => trim($editor1),
                    'created_at'    => date('Y-m-d h:i:s'),
                    'updated_at'    => date('Y-m-d h:i:s'),
                    );
            $tag_id = $this->Mod_Common->insertData(TABLE_NOTIFICATION, $addedData);
            if($tag_id){
                $errors = $this->lang->line('msg_insert_record');
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'success');
                redirect(base_url('superadmin/notification'));
            }else{
                $errors = $this->lang->line('msg_wrong');
                $this->session->set_flashdata('error_message', $errors);
                $this->session->set_flashdata('errorclass', 'danger');
                redirect(base_url('superadmin/notification/add'));
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

    public function get_view_notification_data($id)
    {
        $data['id'] = $id;
        $res = $this->Mod_Common->rowData(TABLE_NOTIFICATION,array('id'=>$id));
        $data['results'] = $res;
       /* echo '<pre>';
        print_r($data['results']);
        echo'</pre>';
        die;*/
        $data['title'] = 'View Notification ';
        
        $this->ajax_default->load('ajax_default','superadmin/notification/show', $data);
    }

	     
}