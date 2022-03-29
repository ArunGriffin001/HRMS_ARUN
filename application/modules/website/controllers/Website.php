<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Website extends MX_Controller  {
 
	var $data = array(); 

	/** All users login there **/
	public function __construct(){
		parent::__construct();
         $this->load->model('comman/Comman_model');
	} 
	 
	public function index(){
		$data['title']="HRMS | The HR Payroll software";
        $data["media_parners"]=$this->Comman_model->get_all_record("media_parners");
        $this->website_template->load('website_template','website/index', $data); 
	}

	public function aboutPage(){
		$data['title']="HRMS | The HR Payroll software";
        $this->website_template->load('website_template','website/about', $data); 
	}

	public function blogStrandardPage(){
		$data['title']="HRMS | The HR Payroll software";
        $blog_res = $this->Mod_Common->selectDataOrderBy(TABLE_BLOG, array('status' => 'Active'), 'id', 'desc');
        $blog_cats = $this->Mod_Common->selectDataOrderBy(TABLE_BLOG_CATEGORY, array('status' => 'Active'), 'id', 'desc');
        $blog_tags = $this->Mod_Common->selectDataOrderBy(TABLE_BLOG_TAG, array('status' => 'Active'), 'id', 'desc');

        $data['blog_data'] = $blog_res;
        $data['blog_cats'] = $blog_cats;
        $data['blog_tags'] = $blog_tags;
        /*echo'<pre>';
        print_r($data['blog_cats']);
        print_r($data['blog_tags']);
        echo'</pre>';
        die;*/
        $this->website_template->load('website_template','website/blog_strandard', $data); 
	}

	public function payrollManagementPage(){
		$data['title']="HRMS | The HR Payroll software";
        $this->website_template->load('website_template','website/payroll_management', $data);
    }

    public function recruitmentManagementPage(){
		$data['title']="HRMS | The HR Payroll software";
        $this->website_template->load('website_template','website/recruitment_management', $data);
    }

    public function complianceManagementPage(){
		$data['title']="HRMS | The HR Payroll software";
        $this->website_template->load('website_template','website/compliance_management', $data);
    }

    public function employeeMmanagementPage(){
		$data['title']="HRMS | The HR Payroll software";
        $this->website_template->load('website_template','website/employee_management', $data);
    }

    public function advanceManagementPage(){
		$data['title']="HRMS | The HR Payroll software";
        $this->website_template->load('website_template','website/advance_management', $data);
    }

    public function performanceManagementPage(){
		$data['title']="HRMS | The HR Payroll software";
        $this->website_template->load('website_template','website/performance_management', $data);
    }

    public function learningManagementPage(){
		$data['title']="HRMS | The HR Payroll software";
        $this->website_template->load('website_template','website/learning_management', $data);
    }

    public function pricingPlanPage(){
		$data['title'] = "HRMS | The HR Payroll software";
        $res = $this->Mod_Common->selectData(TABLE_MEMBER_PLAN, array('status' => 'Active'));
        $data['plan_data'] = $res;
        /*echo'<pre>';
        print_r($data['plan_data']);
        echo'</pre>';
        die;*/
        $this->website_template->load('website_template','website/pricing', $data);
    }

    public function customerServicePage(){
		$data['title']="HRMS | The HR Payroll software";
        $res = $this->Mod_Common->selectData(TABLE_TESTIMONIAL);
        $data['record'] = array();
        if(!empty($res)){
            $data['record'] = $res;
        }
        $this->website_template->load('website_template','website/customer_service', $data);
    }

    public function testimonialPage(){
		$data['title']="HRMS | The HR Payroll software";
        $res = $this->Mod_Common->selectData(TABLE_TESTIMONIAL);
        $data['record'] = array();
        if(!empty($res)){
            $data['record'] = $res;
        }
        /*echo'<pre>';
        print_r($res);
        echo'</pre>';
        die;*/
        $this->website_template->load('website_template','website/testimonial', $data);
    }

    public function helpDeskPage(){
		$data['title']="HRMS | The HR Payroll software";
        $this->website_template->load('website_template','website/help_desk', $data);
    }

    public function teamDetailsPage(){
		$data['title']="HRMS | The HR Payroll software";
        $data["team_member"]=$this->Comman_model->get_all_record("team_member");
        $this->website_template->load('website_template','website/team_details', $data);
    }

    public function payrollContentPage(){
		$data['title']="HRMS | The HR Payroll software";
        $this->website_template->load('website_template','website/payroll_content', $data);
    }

    public function servicesPage(){
		$data['title']="HRMS | The HR Payroll software";
        $this->website_template->load('website_template','website/services', $data);
    }

    public function contactPage(){
		$data['title']="HRMS | The HR Payroll software";
        $this->website_template->load('website_template','website/contact', $data);
    }
    public function contact2Page(){
		$data['title']="HRMS | The HR Payroll software";
        $this->website_template->load('website_template','website/contact_2', $data);
    }
	     
}