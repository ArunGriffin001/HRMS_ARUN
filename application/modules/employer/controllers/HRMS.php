<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class HRMS extends MX_Controller  {
 
    var $data = array(); 

    /** All users login there **/
    public function __construct(){
        parent::__construct();
        $this->isAuthenticated('EmployerLoginDetails',base_url('sign-in'));
        $this->load->model('Department_model');
    } 
     
    /**
    * Sort Description.
    * function name: hrmsUser  
    * Details: Load hrms user view
    * @return: 
    * 
    */
    public function hrmsUser(){
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="HR Dashboard";
        $data['page_heading']="Welcome Soylent Corp!";
        $this->employer_template->load('employer_template','employer/hrms/hr_users', $data); 
    }

    /**
    * Sort Description.
    * function name: hrmsAccounts  
    * Details: Load hrms accounts view
    * @return: 
    * 
    */
    public function hrmsAccounts(){
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="HR Dashboard";
        $data['page_heading']="Welcome Soylent Corp!";
        $this->employer_template->load('employer_template','employer/hrms/hr_accounts', $data); 
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