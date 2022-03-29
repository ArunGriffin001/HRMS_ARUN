<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Blogcat extends MX_Controller  {
 
	var $data = array(); 

	/** All users login there **/
	public function __construct(){
		parent::__construct();
	} 
	 
	public function index(){
		$data['title']="HRMS | The HR Payroll software";
        echo "I am blog category";
        die;
	}
    public function test(){
        $data['title']="HRMS | The HR Payroll software";
        echo "I am blog2 category";
        die;
    }

	     
}