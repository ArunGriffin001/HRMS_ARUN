<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class MyAsset extends MX_Controller  {
 
    var $data = array(); 

    /** All users login there **/
    public function __construct(){
        parent::__construct();
        $this->isAuthenticated('EmployeeLogin',base_url('sign-in'));
        $this->login_data = $this->session->userdata('EmployeeLogin');
        $this->employer_id = $this->login_data['employer_id'];
        $this->employee_id = $this->login_data['userId'];
    } 
     
   

    public function assetDetails($asset_id)
    {
        $assetID = decode($asset_id);
        $query = "SELECT asset.*, emp.full_name, dept.dept_name, asset_type.type_name FROM hs_employer_asset_assign_list as asset
        INNER JOIN hs_employer_department as dept ON dept.dep_id = asset.department_id
        INNER JOIN hs_users_employer as emp ON emp.employee_id = asset.employee_id
        INNER JOIN hs_employer_assets_type as asset_type ON asset_type.id = asset.asset_type_id
        WHERE asset.id = $assetID";
        $asset_assign_list = $this->Mod_Common->customQuery($query);

        $data['ueser_rec']   =  $asset_assign_list[0];
        $this->ajax_default->load('ajax_default','employee/employee/assets/show', $data);
    }



    /**
    * Sort Description.
    * function name: assetTypeList  
    * Details: Load view
    * @return: 
    * 
    */
    public function assetList(){
       
        $data['header_title']="HRMS";
        $data['page_title_top']="Assets list";
        $data['page_heading']="Assets list";
        $data['page_sub_heading']="Assets list";
        $query = "SELECT asset.*, emp.full_name, dept.dept_name, asset_type.type_name FROM hs_employer_asset_assign_list as asset
        INNER JOIN hs_employer_department as dept ON dept.dep_id = asset.department_id
        INNER JOIN hs_users_employer as emp ON emp.employee_id = asset.employee_id
        INNER JOIN hs_employer_assets_type as asset_type ON asset_type.id = asset.asset_type_id
        WHERE asset.employee_id = $this->employee_id AND asset.employer_id = $this->employer_id ORDER BY asset.id DESC";
        $asset_assign_list = $this->Mod_Common->customQuery($query);
        
        $data['asset_assign_list'] = (!empty($asset_assign_list) ? $asset_assign_list : '');
        $this->employer_template->load('employee_template','employee/employee/assets/list', $data); 
    }


}
?>