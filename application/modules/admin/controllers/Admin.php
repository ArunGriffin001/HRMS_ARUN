<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MX_Controller  { 
	var $data = array(); 
	/** All users login there **/
	public function __construct(){
		parent::__construct();
	} 
	 
	public function index(){
		$data['title']="HRMS | The HR Payroll software";
        $this->load->view('index', $data); 
	}

	public function aboutPage(){
		$data['title']="HRMS | The HR Payroll software";
        $this->website_template->load('website_template','website/about', $data); 
	}

	public function blogStrandardPage(){
		$data['title']="HRMS | The HR Payroll software";
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
		$data['title']="HRMS | The HR Payroll software";
        $this->website_template->load('website_template','website/pricing', $data);
    }

    public function customerServicePage(){
		$data['title']="HRMS | The HR Payroll software";
        $this->website_template->load('website_template','website/customer_service', $data);
    }

    public function testimonialPage(){
		$data['title']="HRMS | The HR Payroll software";
        $this->website_template->load('website_template','website/testimonial', $data);
    }

    public function helpDeskPage(){
		$data['title']="HRMS | The HR Payroll software";
        $this->website_template->load('website_template','website/help_desk', $data);
    }

    public function teamDetailsPage(){
		$data['title']="HRMS | The HR Payroll software";
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