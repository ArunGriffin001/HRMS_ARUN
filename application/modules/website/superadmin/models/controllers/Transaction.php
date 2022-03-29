<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Transaction extends MX_Controller  {
 
	// var $data = array(); 

	/** All users login there **/
	public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->isAuthenticated('LoginDetails',base_url('superadmin/login'));
        //$this->login_data = $this->session->userdata('LoginDetails');
        $this->load->model('Transaction_model');
    }
	 
	public function index(){
		$data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Transaction";
        $data['page_sub_heading']="Transaction List";
        $this->superadmin_template->load('superadmin_template','superadmin/transaction/list', $data);
	}
    
    /**
    * Sort Description.
    * function name:  transactionAjaxList  
    * Details: show list 
    * @return: true/false
    * 
    */
    public function transactionAjaxList(){
        $start   =  $this->input->get('start'); // get promo code Id
        $length  =  $this->input->get('length'); // get promo code Id
        $draw    =  $this->input->get('draw'); // get promo code Id
        $order   =  $this->input->get('order');
        if(!empty($order)){ 
            if($order[0]['column']==1){
                $column_name='hs_transaction_history.transaction_id';
            }else if($order[0]['column']==2){
                $column_name='hs_users.company_name';
            }else if($order[0]['column']==2){
                $column_name='hs_member_plans.title';
            }else if($order[0]['column']==3){
                $column_name='hs_transaction_history.created_at';
            }else{
                $column_name='hs_transaction_history.id';
            }
        }
        $totalRecord      = $this->Transaction_model->transactionAjaxList(true);
        $getRecordListing = $this->Transaction_model->transactionAjaxList(false,$start,$length, $column_name, $order[0]['dir']);
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
                $recordListing[$i][1]= $recordData->transaction_id;
                $recordListing[$i][2]= $recordData->company_name;
                $recordListing[$i][3]= $recordData->title;
                $recordListing[$i][4] = date('Y-m-d', strtotime($recordData->created_at));;
                 $actionLink = '';
                    
                $view_user_url = base_url(ADMIN_URL).'/transaction/get_view_transaction_data/'.$id;
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

    public function get_view_transaction_data($id)
    {
        $data['id'] = $id;
        $query = "SELECT hs_transaction_history.id, hs_transaction_history.transaction_id, hs_transaction_history.company_id, hs_transaction_history.plan_id, hs_transaction_history.created_at, hs_users.company_name, hs_member_plans.title FROM hs_transaction_history
            INNER JOIN hs_users ON hs_users.id = hs_transaction_history.company_id
            INNER JOIN hs_member_plans ON hs_member_plans.id = hs_transaction_history.plan_id
            WHERE hs_transaction_history.id = $id";
        $res = $this->Mod_Common->customQuery($query);
        $data['results'] = $res[0];
       /* echo '<pre>';
        print_r($data['results']);
        echo'</pre>';
        die;*/
        $data['title'] = 'View Transaction ';
        
        $this->ajax_default->load('ajax_default','superadmin/transaction/show', $data);
    }

	     
}