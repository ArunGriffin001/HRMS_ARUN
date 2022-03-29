<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Employer_enquiry extends MX_Controller  {
 
	// var $data = array(); 

	/** All users login there **/
	public function __construct()
    {
        parent::__construct();
        //Do your magic here
         $this->isAuthenticated('LoginDetails',base_url('superadmin/login'));
        $this->load->model('Employer_enquiry_model');
    }
	 
	public function index(){
		$data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Enquiry";
        $data['page_heading']="Enquiry List";
        $this->superadmin_template->load('superadmin_template','superadmin/enquiry/list', $data);
	}
    
    /**
    * Sort Description.
    * function name:  enquiryAjaxList
    * Details: show list 
    * @return: true/false
    * 
    */
    public function enquiryAjaxList(){
        $start   =  $this->input->get('start'); // get promo code Id
        $length  =  $this->input->get('length'); // get promo code Id
        $draw    =  $this->input->get('draw'); // get promo code Id
        $order   =  $this->input->get('order');
        if(!empty($order)){ 
            if($order[0]['column']==1){
                $column_name='hs_users.company_name';
            }else if($order[0]['column']==2){
                $column_name='hs_employer_enquiry.email';
            }else if($order[0]['column']==3){
                $column_name='hs_employer_enquiry.subject';
            }else if($order[0]['column']==4){
                $column_name='hs_employer_enquiry.created_at';
            }else{
                $column_name='hs_employer_enquiry.id';
            }
        }
        $totalRecord      = $this->Employer_enquiry_model->enquiryAjaxList(true);
        $getRecordListing = $this->Employer_enquiry_model->enquiryAjaxList(false,$start,$length, $column_name, $order[0]['dir']);
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
                $recordListing[$i][1]= $recordData->company_name;
                $recordListing[$i][2]= $recordData->email;
                $recordListing[$i][3]= $recordData->subject;
                $recordListing[$i][4] = dateTime($recordData->created_at);
                 $actionLink = '';
                    
                $view_user_url = base_url(ADMIN_URL).'/enquiry/get-view-enquiry-data/'.$id;
                $actionLink .= '<a href="'.$view_user_url.'" title="view" class="btn btn-icon waves-effect waves-light fa-new-grey m-b-5" data-toggle="modal" data-target="#view_transaction_history" onclick="view_transaction_history('.$id.')"><i class="fa fa-eye"></i></a>';
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
    * function name:  updateStatus  
    * Details: change user status
    * @return: true/false
    * 
    */

    public function get_view_enquiry_data($id)
    {
        $data['id'] = $id;
        $query = "SELECT hs_employer_enquiry.id, hs_users.company_name, hs_employer_enquiry.email, hs_employer_enquiry.subject, hs_employer_enquiry.created_at, hs_employer_enquiry.message
            FROM hs_employer_enquiry
            INNER JOIN hs_users ON hs_users.id = hs_employer_enquiry.company_id
            WHERE hs_employer_enquiry.id = $id";
        $res = $this->Mod_Common->customQuery($query);
        $data['results'] = $res[0];
       /* echo '<pre>';
        print_r($data['results']);
        echo'</pre>';
        die;*/
        $data['title'] = 'View Enquiry ';
        
        $this->ajax_default->load('ajax_default','superadmin/enquiry/show', $data);
    }

	     
}