<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class LearningManagement extends MX_Controller  {
 
	var $data = array(); 

	/** All users login there **/
	public function __construct(){
		parent::__construct();
        $this->isAuthenticated('EmployerLoginDetails',base_url('sign-in'));
	} 
	 
	/**
    * Sort Description.
    * function name: softSkillTraining  
    * Details: Load view
    * @return: 
    * 
    */
    public function softSkillTraining(){
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Soft Skill Training";
        $data['page_heading']="Soft Skill Training";
        $this->employer_template->load('employer_template','employer/learning_management/soft_skill_training', $data); 
    }

    /**
    * Sort Description.
    * function name: technicalSkill  
    * Details: Load view
    * @return: 
    * 
    */
    public function technicalSkill(){
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Technical Skill Training";
        $data['page_heading']="Technical Skill Training";
        $this->employer_template->load('employer_template','employer/learning_management/technical_skill', $data); 
    }

    /**
    * Sort Description.
    * function name: trainigAssignment  
    * Details: Load view
    * @return: 
    * 
    */
    public function trainigAssignment(){
        $data['header_title']="HRMS - Soylent Corp";
        $data['page_title_top']="Employee Training Assignment";
        $data['page_heading']="Employee Training Assignment";
        $this->employer_template->load('employer_template','employer/learning_management/trainig_assignment', $data); 
    }
}
?>