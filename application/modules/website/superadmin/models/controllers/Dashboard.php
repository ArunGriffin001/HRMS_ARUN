<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MX_Controller  {
 
	var $data = array(); 

	/** All users login there **/
	public function __construct(){
		parent::__construct();
		  //$r=$this->session->userdata('LoginDetails');
		 $this->isAuthenticated('LoginDetails',base_url('superadmin/login'));
		 //$this->login_data = $this->session->userdata('LoginDetails');
	} 
	 
	public function index(){
		$data['header_title']="HRMS - Soylent Corp";
		$data['page_title_top']="Admin Dashboard";

		//$employer_id = $this->login_data['userId'];
        $total_emp = $this->Mod_Common->customQuery("SELECT count(employee_id) as total_emp FROM hs_users_employer");

        $tot_member_plans = $this->Mod_Common->customQuery("SELECT count(id) as tot_member_plan FROM hs_member_plans");

        $tot_trans_history = $this->Mod_Common->customQuery("SELECT count(id) as tot_trans_history FROM hs_transaction_history");

        $tot_media_partner = $this->Mod_Common->customQuery("SELECT count(id) as tot_media_partner FROM hs_media_parners");

        $tot_blog = $this->Mod_Common->customQuery("SELECT count(id) as tot_blog FROM hs_blog_management");

        $tot_testimonial = $this->Mod_Common->customQuery("SELECT count(id) as tot_testimonial FROM hs_testimonial");


        $data['total_emp']= $total_emp[0]->total_emp;
        $data['tot_member_plans']= $tot_member_plans[0]->tot_member_plan;
        $data['tot_media_partner']= $tot_media_partner[0]->tot_media_partner;
        $data['tot_trans_history']= $tot_trans_history[0]->tot_trans_history;
        $data['tot_blog']= $tot_blog[0]->tot_blog;
        $data['tot_testimonial']= $tot_testimonial[0]->tot_testimonial;
        $this->superadmin_template->load('superadmin_template','superadmin/dashboard', $data); 
	}
	public function settingPage(){
		$data['header_title']="HRMS - Soylent Corp";
		$data['page_title_top'] = "Setting";
		$data['page_heading'] = "Update Setting";
		$res = $this->Mod_Common->selectData(TABLE_SETTINGS);
		
		$result = array();
		if(!empty($res)){
			foreach ($res as  $val) {
				$result[$val->meta_key] = $val;
			}
		}
		$data['setting'] = $result;
		
        $this->superadmin_template->load('superadmin_template','superadmin/setting', $data); 
	}

	public function logout(){
        $this->session->unset_userdata('LoginDetails');
        redirect(base_url('superadmin/login'));
    }   
}