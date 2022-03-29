<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

/* Website front page routing */
$route['signup'] 							= 'website/WebLoginSignUp/signUp';
$route['signup1'] 							= 'website/WebLoginSignUp/signUp1';
$route['addEmployer'] 						= 'website/WebLoginSignUp/addEmployer';
$route['signup-thank-you'] 					= 'website/WebLoginSignUp/thankYou';
$route['sign-in'] 							= 'website/WebLoginSignUp/login';
/*$route['sign-in1'] 							= 'website/WebLoginSignUp/login1';*/
$route['website/login_submit'] 				= 'website/WebLoginSignUp/login_submit';
$route['employer/logout'] 					= 'website/WebLoginSignUp/logout';
$route['employee/logout'] 					= 'website/WebLoginSignUp/EmployeeLogout';

$route['default_controller'] 				= 'website';
//$route['signup'] 							= 'website/signup';
$route['signup_submit'] 					= 'website/signup/signup_submit';
$route['about'] 							= 'website/aboutPage';
$route['blog-strandard'] 					= 'website/blogStrandardPage';
$route['payroll-management'] 				= 'website/payrollManagementPage';
$route['recruitment-management'] 			= 'website/recruitmentManagementPage';
$route['compliance-management'] 			= 'website/complianceManagementPage';
$route['employee-management'] 				= 'website/employeeMmanagementPage';
$route['advance-management'] 				= 'website/advanceManagementPage';
$route['performance-management'] 			= 'website/performanceManagementPage';
$route['learning-management'] 				= 'website/learningManagementPage';
$route['pricing'] 							= 'website/pricingPlanPage';
$route['customer-service'] 					= 'website/customerServicePage';
$route['testimonial'] 						= 'website/testimonialPage';
$route['help-desk'] 						= 'website/helpDeskPage';
$route['team-details'] 						= 'website/teamDetailsPage';
$route['payroll-content'] 					= 'website/payrollContentPage';
$route['services'] 							= 'website/servicesPage';
$route['contact'] 							= 'website/contactPage';
$route['contact-2'] 						= 'website/contact2Page';


/* Login routes */
$route['superadmin'] 					= 'login/login/login';
$route['superadmin/login'] 				= 'login/login/login';
$route['login-submit'] 					= 'login/login/login_submit';
$route['superadmin/logout'] 			= 'superadmin/dashboard/logout';
$route['superadmin/change-password'] 	= 'superadmin/AdminProfile/changePassword';
$route['superadmin/updatepassword'] 	= 'superadmin/AdminProfile/updatePassword';


/* Super admin routing */
$route['superadmin/dashboard'] 				= 'superadmin/dashboard';
$route['superadmin/setting'] 				= 'superadmin/dashboard/settingPage';

/* User Routing */
$route['superadmin/users'] 					= 'superadmin/users/list';
$route['superadmin/users/add'] 				= 'superadmin/users/addUser';
$route['superadmin/addEmployer'] 			= 'superadmin/users/addEmployer';

$route['superadmin/users/edit/(:any)'] 		= 'superadmin/users/editEmployer/$1';
$route['superadmin/users/update/(:any)'] 		= 'superadmin/users/updateEmployer/$1';
$route['superadmin/users/get-view-users-data/(:any)'] = 'superadmin/users/get_view_users_data/$1';
$route['superadmin/users/updateTestimonial/(:any)'] = 'superadmin/users/updateUser/$1';
$route['superadmin/submit_user'] 			= 'superadmin/users/submitUser';
$route['superadmin/user_list'] 				= 'superadmin/users/userAjaxList';

$route['superadmin/users/plan_list'] 		= 'superadmin/users/userPlanList';
$route['superadmin/users/updateStatus'] 	= 'superadmin/users/updateStatus';


$route['superadmin/blog-list'] 				= 'superadmin/blogs';

$route['superadmin/blog-tag/list'] 				= 'superadmin/blogs/tagList';
$route['superadmin/blog-tag/add'] 				= 'superadmin/blogs/addTag';
$route['superadmin/blog-tag/edit/(:any)'] 		= 'superadmin/blogs/editTag/$1';
$route['superadmin/blog-tag/updateTag/(:any)'] 		= 'superadmin/blogs/updateTag/$1';
$route['superadmin/blog/updateStatus'] 		= 'superadmin/blogs/updateStatus';

$route['superadmin/submmit_tag'] 				= 'superadmin/blogs/submmitTag';
$route['superadmin/tag_list'] 					= 'superadmin/blogs/tagAjaxlist';

$route['superadmin/blogs/blog-rss/list'] 		= 'superadmin/blogs/rssList';
$route['superadmin/blogs/blog-rss/add'] 		= 'superadmin/blogs/addRSS';
$route['superadmin/blogs/blog-rss/edit/(:any)'] = 'superadmin/blogs/editRss/$1';
$route['superadmin/blogs/blog-rss/updateRSS/(:any)'] = 'superadmin/blogs/updateRSS/$1';
$route['superadmin/blogs/submmit_rss'] 	= 'superadmin/blogs/submmitRSS';
$route['superadmin/blogs/rss_list'] 	= 'superadmin/blogs/rssAjaxlist';



/* Blog category routing */
$route['superadmin/blog-cat/list'] 				= 'superadmin/blogs/catList';
$route['superadmin/blog-cat/add'] 				= 'superadmin/blogs/addCat';
$route['superadmin/blog-cat/edit/(:any)'] 		= 'superadmin/blogs/editCat/$1';
$route['superadmin/blog-cat/updateCat/(:any)'] 	= 'superadmin/blogs/updateCat/$1';
$route['superadmin/blog/updateStatus'] 			= 'superadmin/blogs/updateStatus';
$route['superadmin/submit_cat'] 				= 'superadmin/blogs/submitCat';
$route['superadmin/cat_list'] 					= 'superadmin/blogs/catAjaxlist';


$route['superadmin/media-parners/list'] 			= 'superadmin/mediaparners/list';
$route['superadmin/media-parners/add'] 				= 'superadmin/mediaparners/add';
$route['superadmin/media-parners/update/(:any)'] 	= 'superadmin/mediaparners/update/$1';
$route['superadmin/media-parners/delete/(:any)'] 	= 'superadmin/mediaparners/delete/$1';


$route['superadmin/team-member/list'] 				= 'superadmin/teammember/list';
$route['superadmin/team-member/add'] 				= 'superadmin/teammember/add';
$route['superadmin/team-member/update/(:any)'] 	= 'superadmin/teammember/update/$1';
$route['superadmin/team-member/delete/(:any)'] 	= 'superadmin/teammember/delete/$1';


/* Blog routing */
$route['superadmin/blog/list'] 				= 'superadmin/blogs/blogList';
$route['superadmin/blog/add'] 				= 'superadmin/blogs/addBlog';
$route['superadmin/blog/edit/(:any)'] 		= 'superadmin/blogs/editBlog/$1';
$route['superadmin/blog/updateBlog/(:any)'] 	= 'superadmin/blogs/updateBlog/$1';
$route['superadmin/blog/updateStatus'] 		= 'superadmin/blogs/updateStatus';
$route['superadmin/submit_blog'] 			= 'superadmin/blogs/submitBlog';
$route['superadmin/blog_list'] 				= 'superadmin/blogs/blogAjaxList';

/* Plan routing */
$route['superadmin/plan/list'] 				= 'superadmin/member_plan/memberPlanList';
$route['superadmin/plan/add'] 				= 'superadmin/member_plan/addPlan';
$route['superadmin/plan/edit/(:any)'] 		= 'superadmin/member_plan/editMemberPlan/$1';
$route['superadmin/plan/updatePlan/(:any)'] = 'superadmin/member_plan/updateMemberPlan/$1';
$route['superadmin/submit_plan'] 			= 'superadmin/member_plan/submitPlan';
$route['superadmin/plan_list'] 				= 'superadmin/member_plan/memberPlanAjaxList';
$route['superadmin/plan/updateStatus'] 		= 'superadmin/member_plan/updateStatus';

/* Testimonial routing */
$route['superadmin/testimonial/list'] 		= 'superadmin/testimonial/testimonialList';
$route['superadmin/testimonial/add'] 		= 'superadmin/testimonial/addTestimonial';
$route['superadmin/testimonial/edit/(:any)'] = 'superadmin/testimonial/editTestimonial/$1';
$route['superadmin/testimonial/updateTestimonial/(:any)'] 	= 'superadmin/testimonial/updateTestimonial/$1';
$route['superadmin/submit_testimonial'] 			= 'superadmin/testimonial/submitTestimonial';
$route['superadmin/testimonial_list'] 		= 'superadmin/testimonial/testimonialAjaxList';
$route['superadmin/testimonial/updateStatus'] = 'superadmin/testimonial/updateStatus';


/* Transaction Routing */
$route['superadmin/transaction'] 			= 'superadmin/transaction';
$route['superadmin/transaction/get-view-transaction-data/(:any)'] = 'superadmin/transaction/get_view_transaction_data/$1';
$route['superadmin/transaction_list'] 		= 'superadmin/transaction/transactionAjaxList';

/* Enquiry Routing */
$route['superadmin/enquiry'] 		= 'superadmin/Employer_enquiry';
$route['superadmin/enquiry/get-view-enquiry-data/(:any)'] = 'superadmin/Employer_enquiry/get_view_enquiry_data/$1';
$route['superadmin/enquiry_list'] 		= 'superadmin/Employer_enquiry/enquiryAjaxList';

/* Notification Routing */
$route['superadmin/notification'] 		= 'superadmin/notification';
$route['superadmin/notification/add'] 		= 'superadmin/notification/add';
$route['superadmin/notification/addNotification'] 		= 'superadmin/notification/addNotification';
$route['superadmin/notification/get-view-enquiry-data/(:any)'] = 'superadmin/notification/get_view_notification_data/$1';
$route['superadmin/notification_list'] 	= 'superadmin/notification/notificationAjaxList';

/* Employer Dashboard Routing */
$route['employer/dashboard'] 		= 'employer/EmployerDashboard/hrmsDashboard';
$route['employer/dashboard/activity'] 	= 'employer/EmployerDashboard/dashboardActivity';
$route['employer/dashboard/payroll'] 	= 'employer/EmployerDashboard/dashboardPayroll';
$route['employer/dashboard/report'] 		= 'employer/EmployerDashboard/dashboardReport';
$route['employer/profile'] 				= 'employer/EmployerDashboard/getProfile';
$route['employer/profileupdate'] 				= 'employer/EmployerDashboard/updateProfile';

/* employee users */
$route['employer/hrms/users'] 		= 'employer/EmployerUsers/list';
$route['employer/hrms/users/adduser'] 		= 'employer/EmployerUsers/addUser';
$route['employer/hrms/users/updateStatus'] 		= 'employer/EmployerUsers/updateStatus';
$route['employer/hrms/users/add'] 		= 'employer/EmployerUsers/add';
$route['employer/hrms/users/salary2222'] 		= 'employer/EmployerUsers/employeeSalary';

$route['employer/hrms/getDepartmentUsers'] 		= 'employer/employeeSalary/getDepartmentUsers';

/* get salay value on change employee */
	$route['employer/hrms/users/getEmployeeSalaryData'] 		= 'employer/employeeSalary/getEmployeeSalaryData';

/* End */
$route['employer/hrms/users/salary'] 		= 'employer/employeeSalary/getList';
$route['employer/hrms/users/salary/add'] 		= 'employer/employeeSalary/add';
$route['employer/hrms/users/salary/total_working_day'] 		= 'employer/employeeSalary/totalWorkingDay';
$route['employer/hrms/users/salary/AddSalary'] 	= 'employer/employeeSalary/AddSalary';
$route['employer/hrms/users/salary/edit/(:any)'] = 'employer/employeeSalary/edit/$1';
$route['employer/hrms/users/salary/UpdateSal/(:any)'] = 'employer/employeeSalary/UpdateSalary/$1';

$route['employer/hrms/users/experience_letter'] = 'employer/EmployerUsers/employeeExperienceLetter';
$route['employer/hrms/users/doc-list/(:any)']= 'employer/EmployerUsers/employeeDoc/$1';

$route['employer/hrms/users/doc-list1/(:any)']= 'employer/EmployerUsers/employeeDoc1/$1';

$route['employer/hrms/users/relieving_letter'] = 'employer/EmployerUsers/employeeRelievingLetter';

$route['employer/hrms/users/user_list'] 	= 'employer/EmployerUsers/userAjaxList';

$route['employer/hrms/users/get-view-data/(:any)'] = 'employer/EmployerUsers/get_view_data/$1';
$route['employer/hrms/users/edit/(:any)'] = 'employer/EmployerUsers/edit/$1';
$route['employer/hrms/users/Updateuser/(:any)'] = 'employer/EmployerUsers/UpdateUser/$1';

/* From 16 */
	$route['employer/form_16'] 		= 'employer/EmployerUsers/updateFormSixteen';
	$route['employer/form_16_upload'] 	= 'employer/EmployerUsers/uploadFormSixteen';
/* End */

/* Anexture list */
	$route['employer/hrms/users/annexure-list/(:any)']= 'employer/EmployerUsers/annexureCTC/$1';
/* End*/

/* Tax Declarations for tax savings */
	$route['employer/tax_declarations'] 		= 'employer/EmployerUsers/updateTaxDeclarations';
	$route['employer/form_tax_declarations'] 	= 'employer/EmployerUsers/uploadTaxDeclarations';

/* Tax Computations  for tax savings */
	$route['employer/tax_computation'] 		= 'employer/EmployerUsers/updateTaxComputations';
	$route['employer/form_tax_computations'] 	= 'employer/EmployerUsers/uploadTaxComputations';

/* Update PF and ESI */

$route['employer/hrms/users/editPfEsiInfo/(:any)'] = 'employer/EmployerUsers/editPfEsiInfo/$1';
$route['employer/hrms/users/updatePfEsiInfo/(:any)'] = 'employer/EmployerUsers/updatePfEsiInfo/$1';

/* End pf ESI */

/* Addendece log */
$route['employer/hrms/users/manaul-log-list/(:any)']= 'employer/EmployerUsers/employeManualLogRequestList/$1';
$route['employer/hrms/users/attendance-log-list/(:any)']= 'employer/EmployerUsers/employeeAttendanceLogList/$1';

$route['employer/hrms/users/manualLogRequestList']= 'employer/EmployerUsers/manualLogRequestList/';
$route['employer/hrms/users/headManaulLogApprove'] = 'employer/EmployerUsers/manaulLogApprovalStatus';
/* End */

$route['employer/get_state'] 		= 'employer/EmployerUsers/get_states';
$route['employer/get_city'] 		= 'employer/EmployerUsers/get_city';

$route['employer/get_level_grade'] 	= 'employer/EmployerUsers/getLevelGrade';

$route['employer/hrms/department'] 	= 'employer/HRMSDepartment/hrmsDepartments';
$route['employer/department/add'] 	= 'employer/HRMSDepartment/add';
$route['employer/department/updateStatus'] 		= 'employer/HRMSDepartment/updateStatus';
$route['employer/department/department_list'] 	= 'employer/HRMSDepartment/departmentAjaxList';
$route['employer/department/edit/(:any)'] 		= 'employer/HRMSDepartment/edit/$1';

$route['employer/department/assign_department_head/(:any)'] 		= 'employer/HRMSDepartment/assignDepartmentHead/$1';
$route['employer/department/update_department_head/(:any)'] 		= 'employer/HRMSDepartment/updateDepartmentHead/$1';

$route['employer/department/removehead'] 		= 'employer/HRMSDepartment/RemoveHead';

$route['employer/department/updateDepartment/(:any)'] 		= 'employer/HRMSDepartment/updateDepartment/$1';

$route['employer/hrms/designation'] 	= 'employer/HRMSDesignation/list';
$route['employer/designation/add'] 		= 'employer/HRMSDesignation/add';
$route['employer/designation/updateStatus'] 		= 'employer/HRMSDesignation/updateStatus';
$route['employer/designation/designation_list'] 	= 'employer/HRMSDesignation/designationAjaxList';

$route['employer/designation/edit/(:any)'] 		= 'employer/HRMSDesignation/edit/$1';
$route['employer/designation/updateDesignation/(:any)'] = 'employer/HRMSDesignation/updateDesignation/$1';

$route['employer/hrms/holiday'] 	= 'employer/Holidays/hrmsHoliday';
$route['employer/hrms/events'] 		= 'employer/Events/hrmsEvents';
$route['employer/hrms/events/add'] 		= 'employer/Events/add';
$route['employer/hrms/events/add_event'] 		= 'employer/Events/addEvent';
$route['employer/hrms/events/updateStatus'] = 'employer/Events/updateStatus';
$route['employer/hrms/events/list'] 		= 'employer/Events/eventList';

$route['employer/hrms/event_list'] 	= 'employer/Events/eventAjaxList';

$route['employer/hrms/fetch_event/(:any)'] = 'employer/Events/fetch_event/$1';
$route['employer/hrms/events/edit/(:any)'] = 'employer/Events/edit/$1';
$route['employer/hrms/events/updateEvents/(:any)'] = 'employer/Events/updateEvents/$1';

$route['employer/hrms/accounts'] 	= 'employer/HRMS/hrmsAccounts';

$route['employer/hrms/holiday/list'] 	= 'employer/Holidays/list';
$route['employer/hrms/holiday/holidayAjaxList'] = 'employer/Holidays/holidayAjaxList';

$route['employer/hrms/holiday/updateStatus'] = 'employer/Holidays/updateStatus';
$route['employer/hrms/holiday/add'] = 'employer/Holidays/addHoliday';
$route['employer/hrms/holiday/edit/(:any)'] = 'employer/Holidays/edit/$1';
$route['employer/hrms/holiday/updateHoliday/(:any)'] = 'employer/Holidays/updateHoliday/$1';


/* Payslip */
$route['employer/hrms/payroll/payslip'] 		= 'employer/Payslip/payslipPage';
/* End */

$route['employer/emp-management/employee'] = 'employer/EmployeeManagement/empMgmtEmpInfoRecord';
$route['employer/emp-management/leave'] 	= 'employer/EmployeeManagement/empMgmtLeaveTracking';

/* Full & final settlement */
$route['employer/full-and-final-settlement/list'] 	= 'employer/FullFinalSettlement/list';
$route['employer/full-and-final-settlement/add'] 	= 'employer/FullFinalSettlement/add';
$route['employer/full-and-final-settlement/add2'] 	= 'employer/FullFinalSettlement/addForm';

/* Employer leave type management routing */
$route['employer/emp-management/leave_type/list'] 	= 'employer/LeaveType/list';
$route['employer/emp-management/leave_type/leaveTypeAjaxList'] = 'employer/LeaveType/leaveTypeAjaxList';

$route['employer/emp-management/leave_type/updateStatus'] = 'employer/LeaveType/updateStatus';
$route['employer/emp-management/leave_type/add'] = 'employer/LeaveType/add';
$route['employer/emp-management/leave_type/addLeave'] = 'employer/LeaveType/addLeave';
$route['employer/emp-management/leave_type/edit/(:any)'] = 'employer/LeaveType/edit/$1';
$route['employer/emp-management/leave_type/updateLeaveType/(:any)'] = 'employer/LeaveType/updateLeaveType/$1';

$route['employer/emp-management/leave_tracking/list'] 	= 'employer/LeaveTracking/list';

$route['employer/emp-management/leave_tracking/leaveStatus'] = 'employer/LeaveTracking/leaveStatus';
$route['employer/emp-management/leave_tracking/get-view-data/(:any)'] = 'employer/LeaveTracking/get_view_data/$1';

$route['employer/emp-management/leave_tracking/edit/(:any)'] 	= 'employer/LeaveTracking/edit/$1';
$route['employer/emp-management/leave_tracking/update_emp_leave/(:any)'] 	= 'employer/LeaveTracking/updateEmployeeLeave/$1';

$route['employer/emp-management/leave_assign_record/list'] 	= 'employer/LeaveTracking/leaveAssignList';
$route['employer/emp-management/leave_assign_record/add'] 	= 'employer/LeaveTracking/addLeaveAssign';
$route['employer/emp-management/leave_assign_record/addRecord'] 	= 'employer/LeaveTracking/submitLeaveAssign';

$route['employer/emp-management/leave_assign_record/leave_assign_list'] 	= 'employer/LeaveTracking/leaveAssignAjaxList';

$route['employer/emp-management/leave_assign_record/assign_leave/(:any)'] 	= 'employer/LeaveTracking/getEmployeeleaveAssign/$1';

/* End */

$route['employer/emp-management/attendance'] 		= 'employer/Attendance/list';
$route['employer/emp-management/attendance/add'] 		= 'employer/Attendance/add';
$route['employer/emp-management/attendance/addAttendence'] 		= 'employer/Attendance/addEmpAttendence';
$route['employer/emp-management/attendance/attendenceStatus'] = 'employer/Attendance/attendenceStatus';

$route['employer/emp-management/asset/cat_list'] = 'employer/AssetManagement/assetCategoryList';
$route['employer/emp-management/asset/category/asset_list/(:any)'] = 'employer/AssetManagement/categoryAssetList/$1';

$route['employer/asset/type_list'] = 'employer/AssetManagement/assetTypeList';
$route['employer/asset/add_asset_type'] = 'employer/AssetManagement/addAssetType';
$route['employer/asset/updateTypeStatus'] 		= 'employer/AssetManagement/updateTypeStatus';
$route['employer/asset/type/edit/(:any)'] 		= 'employer/AssetManagement/edit/$1';
$route['employer/asset/type/update_asset/(:any)'] 		= 'employer/AssetManagement/updateAssetType/$1';
$route['employer/asset/assign_to_employee'] 		= 'employer/AssetManagement/assignAssetEmployee';
$route['employer/asset/submit_to_employee'] 		= 'employer/AssetManagement/submitAssetEmployee';
$route['employer/asset/employee_asset_list'] 		= 'employer/AssetManagement/employeeAssetList';
$route['employer/asset/assign_list/edit/(:any)'] 		= 'employer/AssetManagement/editAssignAsset/$1';
$route['employer/asset/assign_list/update_asset/(:any)'] 		= 'employer/AssetManagement/updateAssignAsset/$1';
$route['employer/asset/assign_list/get-view-data/(:any)'] = 'employer/AssetManagement/get_view_data/$1';

$route['employer/asset/get_department'] 		= 'employer/AssetManagement/getDepartmentInfo';

/* Compliance Management */

$route['employer/compliance-management/list'] = 'employer/ComplianceManagement/getList';
$route['employer/compliance-management/list/(:any)'] = 'employer/ComplianceManagement/payList/$1';
$route['employer/compliance-management/SettingPfEsi'] = 'employer/ComplianceManagement/SettingPfEsi';
$route['employer/compliance-management/SettingPfEsiUpdate'] = 'employer/ComplianceManagement/SettingPfEsiUpdate';
/* End */

/* Payroll Management */
$route['employer/compliance-management/pay'] = 'employer/ComplianceManagement/getEmpPayList';

/* Requiruitment */

$route['employer/recruitment-management/list'] 		= 'employer/RecruitmentManagement/getList';
$route['employer/recruitment-management/add_user'] 		= 'employer/RecruitmentManagement/newUser';
$route['employer/recruitment-management/user/add_level_one'] = 'employer/RecruitmentManagement/processLevelOne';
$route['employer/recruitment-management/user/add_level_two'] 		= 'employer/RecruitmentManagement/processLevelTwo';
$route['employer/recruitment-management/user/add_level_three'] 		= 'employer/RecruitmentManagement/processLevelThree';
$route['employer/recruitment-management/user/add_level_four'] 		= 'employer/RecruitmentManagement/processLevelFour';
$route['employer/recruitment-management/user/add_level_five'] 		= 'employer/RecruitmentManagement/processLevelFive';
$route['employer/recruitment-management/user/add_level_six'] 		= 'employer/RecruitmentManagement/processLevelSix';

$route['employer/recruitment-management/compensation/list'] 		= 'employer/RecruitmentManagement/compensationList';
$route['employer/recruitment-management/compensation/details'] 		= 'employer/RecruitmentManagement/compensationDetails';

/* end */

$route['employer/emp-management/timesheet'] 	= 'employer/EmployeeManagement/empMgmtTimesheet';

$route['employer/performance/appraisal'] = 'employer/Performance/appraisal';
$route['employer/performance/probation-confirmation'] 	= 'employer/Performance/probationConfirmation';
$route['employer/performance/performance-goal'] 		= 'employer/Performance/performanceGoal';
$route['employer/performance/performance-review-feedback'] 	= 'employer/Performance/performanceReviewFeedback';
$route['employer/performance/resignation'] 	= 'employer/Performance/getResignation';
$route['employer/performance/resignation/status'] 	= 'employer/Performance/updateResignationStatus';


$route['employer/learning-management/probation-confirmation'] 	= 'employer/LearningManagement/softSkillTraining';
$route['employer/learning-management/performance-goal'] 		= 'employer/LearningManagement/technicalSkill';
$route['employer/learning-management/performance-review-feedback'] 	= 'employer/LearningManagement/trainigAssignment';

$route['employer/emp-management/project'] 		= 'employer/EmployerProject/list';
$route['employer/emp-management/project/add'] 		= 'employer/EmployerProject/add';
$route['employer/emp-management/project/addProject'] 		= 'employer/EmployerProject/addProject';
$route['employer/emp-management/project/projecttAjaxList'] 	= 'employer/EmployerProject/projectAjaxList';

/* Assets management */
$route['employer/emp-management/assets/list'] 		= 'employer/EmployeeManagement/assetList';
$route['employer/emp-management/assets/add'] 		= 'employer/EmployeeManagement/addAsset';

$route['employer/emp-management/project/updateStatus'] 		= 'employer/EmployerProject/updateStatus';
$route['employer/emp-management/project/updateProjectTeamStatus'] 		= 'employer/EmployerProject/updateProjectTeamStatus';

$route['employer/getDepartmentUsers'] 		= 'employer/EmployerProject/getDepartmentUsers';

$route['employer/emp-management/project/edit/(:any)'] 		= 'employer/EmployerProject/edit/$1';
$route['employer/emp-management/project/updateProject/(:any)'] 		= 'employer/EmployerProject/updateProject/$1';

$route['employer/emp-management/project/team-list/(:any)'] 		= 'employer/EmployerProject/teamList/$1';
$route['employer/emp-management/project/projectTeamAjaxList/(:any)'] 	= 'employer/EmployerProject/projectTeamAjaxList/$1';
$route['employer/emp-management/project/addTeamInProject/(:any)'] 	= 'employer/EmployerProject/addTeamInProject/$1';

/* End employer routing */

/* Employee Routing */
$route['employee/dashboard'] 			= 'employee/Dashboard/dashboard';
$route['employee/employee/list'] 		= 'employee/Employee/employeeList';
$route['employee/employee/attendence'] 	= 'employee/Employee/attendence';
$route['employee/employee/my-manaul-log'] 	= 'employee/Employee/manualLogRequestList';

/*$route['employee/employee/leave'] 		= 'employee/Employee/leave';*/
$route['employee/employee/salary'] 		= 'employee/EmpSalary/getList';
$route['employee/employee/compliance'] 		= 'employee/EmpCompliance/getList';
$route['employee/employee/annexure'] 		= 'employee/EmpCompliance/empAnnexureCTC';
$route['employee/employee/compliance/(:any)'] = 'employee/EmpCompliance/payList/$1';

//$route['employee/employee/calender'] 	= 'employee/Employee/calender';

$route['employee/employee/leave'] 		= 'employee/LeaveRecord/leave';

$route['employee/employee/apply_leave'] = 'employee/LeaveRecord/applyLeave';
$route['employee/employee/submit_leave'] = 'employee/LeaveRecord/submityLeave';



$route['employee/employee/calender'] 		= 'employee/Calender/hrmsEvents';
/*$route['employee/employee/holiday'] 	= 'employee/Employee/holiday';*/
/* new 17-06-21*/
$route['employee/employee/holiday'] 	= 'employee/Holidays/hrmsHoliday';
$route['employee/employee/all-events'] 	= 'employee/EmployeeEvents/hrmsEvents';
$route['employee/employee/fetch_event/(:any)'] = 'employee/EmployeeEvents/fetch_event/$1';
/* Punching data */
$route['employee/employeepunching/punchIn'] 	= 'employee/EmployeePunching/punchIn';

$route['employee/employeepunching/break-in-out'] 	= 'employee/EmployeePunching/breakInOut';

/* End */

/* Profile management */
$route['employee/employee/my-profile'] 	= 'employee/Employee/myProfile';
$route['employee/my-profile/edit_level_one'] 	= 'employee/Employee/profileLevelOne';
$route['employee/my-profile/update_level_one'] 	= 'employee/Employee/UpdateUserProfileLevelOne';

$route['employee/my-profile/edit_level_two'] 	= 'employee/Employee/profileLevelTwo';
$route['employee/my-profile/update_level_two'] 	= 'employee/Employee/UpdateUserProfileLevelTwo';

$route['employee/my-profile/edit_level_three'] 	= 'employee/Employee/profileLevelThree';
$route['employee/my-profile/update_level_three'] 	= 'employee/Employee/UpdateUserProfileLevelThree';

/* Employee document*/
//$route['employee/employee/doc-list']= 'employee/Employee/employeeDoc';
$route['employee/employee/upload_doc']= 'employee/Employee/uploadEmployeeDoc';
$route['employee/employee/doc-list']= 'employee/EmployeeDocument/docList';

$route['employee/employee/doc-list1']= 'employee/EmployeeDocument/docList1';

$route['employee/employee/add_resume']= 'employee/EmployeeDocument/resumeDoc';
$route['employee/employee/upload_resume_doc']= 'employee/EmployeeDocument/uploadresumeDoc';

$route['employee/employee/offer_letter']= 'employee/EmployeeDocument/offerLetterDoc';
$route['employee/employee/upload_offer_letter_doc']= 'employee/EmployeeDocument/uploadOfferLetterDoc';

$route['employee/employee/passport_photo']= 'employee/EmployeeDocument/passPortSizePhoto';
$route['employee/employee/upload_passport_photo']= 'employee/EmployeeDocument/uploadPassPortSizePhoto';

$route['employee/employee/identity_proof']= 'employee/EmployeeDocument/identityProof';
$route['employee/employee/upload_identity_proof']= 'employee/EmployeeDocument/uploadIdentityProof';

$route['employee/employee/education_certificate']= 'employee/EmployeeDocument/educationCertificate';
$route['employee/employee/upload_education_certificate']= 'employee/EmployeeDocument/uploadEducationCertificate';

$route['employee/employee/professional_qualification']= 'employee/EmployeeDocument/professionalQualification';
$route['employee/employee/upload_professional_qualification']= 'employee/EmployeeDocument/uploadProfessionalQualification';

$route['employee/employee/pan_card']= 'employee/EmployeeDocument/penCardDoc';
$route['employee/employee/upload_pan_card']= 'employee/EmployeeDocument/uploadPenCardDoc';

$route['employee/employee/aadhaar_card']= 'employee/EmployeeDocument/aadhaarCardDoc';
$route['employee/employee/upload_aadhaar_card']= 'employee/EmployeeDocument/uploadAadhaarCard';

$route['employee/employee/permanent_address_proof']= 'employee/EmployeeDocument/permanentAddress';
$route['employee/employee/upload_permanent_address_proof']= 'employee/EmployeeDocument/uploadPermanentAddress';

$route['employee/employee/passport_front_rear']= 'employee/EmployeeDocument/passportFrontRear';
$route['employee/employee/upload_passport_front_rear']= 'employee/EmployeeDocument/uploadPassportFrontRear';

$route['employee/employee/offer_letter'] = 'employee/EmployeeDocument/offerLetterDoc';
$route['employee/employee/upload_offer_letter_doc'] = 'employee/EmployeeDocument/uploadOfferLetterDoc';

$route['employee/employee/last_salary_slip'] = 'employee/EmployeeDocument/lastSalarySlip';
$route['employee/employee/upload_last_salary_slip'] = 'employee/EmployeeDocument/uploadLastSalarySlip';

$route['employee/employee/bank_statement'] = 'employee/EmployeeDocument/bankStatement';
$route['employee/employee/upload_bank_statement'] = 'employee/EmployeeDocument/uploadBankStatement';
$route['employee/employee/relieving_letter'] = 'employee/EmployeeDocument/relievingLetter';
$route['employee/employee/upload_relieving_letter'] = 'employee/EmployeeDocument/uploadRelievingLetter';

$route['employee/employee/revision_letter'] = 'employee/EmployeeDocument/revisionLetter';
$route['employee/employee/upload_revision_letter'] = 'employee/EmployeeDocument/uploadRevisionLetter';

$route['employee/employee/incentive_proof'] = 'employee/EmployeeDocument/incentiveProof';
$route['employee/employee/upload_incentive_proof'] = 'employee/EmployeeDocument/uploadIncentiveProof';

$route['employee/employee/experience_certificate'] = 'employee/EmployeeDocument/experienceCertificate';
$route['employee/employee/upload_experience_certificate'] = 'employee/EmployeeDocument/uploadExperienceCertificate';

$route['employee/employee/form_i6'] = 'employee/EmployeeDocument/form16';
$route['employee/employee/upload_form_i6'] = 'employee/EmployeeDocument/uploadform16';

$route['employee/employee/EPF_UAN'] = 'employee/EmployeeDocument/epfUanNumber';
$route['employee/employee/upload_EPF_UAN'] = 'employee/EmployeeDocument/uploadEpfUanNumber';

/* End*/

$route['employee/employee/project-list']= 'employee/Employee/projectList';
$route['employee/employee/resignation'] 	= 'employee/Employee/resignation';
$route['employee/employee/resignation/add'] 	= 'employee/Employee/add_resignation';
$route['employee/employee/resignation/submit'] 	= 'employee/Employee/submitResignation';


$route['employee/employee/regularization'] 	= 'employee/Employee/regularization';

$route['employee/employee/addregularization'] 	= 'employee/Employee/addRegularization';


$route['employee/employee/apply_leave_regularization/(:any)'] 	= 'employee/Employee/applyLeaveRegularization/$1';


$route['employee/notification'] 		= 'employee/Notification/notificationPage';

$route['employee/myteam/teamleave'] 	= 'employee/Myteam/teamLeave';

$route['employee/payroll/pay-slip'] 	= 'employee/Payroll/paySlip';
$route['employee/payroll/manage-tax'] 	= 'employee/Payroll/taxDeclarations';
$route['employee/payroll/tax-computation'] 	= 'employee/Payroll/taxComputation';
$route['employee/payroll/compensation-plan'] = 'employee/Payroll/compensationPlan';
$route['employee/payroll/form-16'] 		= 'employee/Payroll/form16';
$route['employee/payroll/resignation'] 	= 'employee/Payroll/resignation';

/* tex declaration */
$route['employee/payroll/tax-declarations-form'] 		= 'employee/Payroll/taxDeclarationsform';
/* tex computations */
$route['employee/payroll/tax-computations-form'] 		= 'employee/Payroll/taxComputationsform';

$route['employee/timesheet/time-shift-tracking'] 	= 'employee/Timesheet/timeShiftTracking';
$route['employee/timesheet/timesheet-tracking'] 	= 'employee/Timesheet/timeSheetTracking';

$route['employee/training/traning-list'] 	= 'employee/Training/traningList';
$route['employee/training/traning-type'] 	= 'employee/Training/traningType';
$route['employee/training/trainer'] 	= 'employee/Training/trainer';
$route['employee/project'] 	= 'employee/EmployeeProject/list';
$route['employee/project/projectAjaxList/(:any)'] 	= 'employee/EmployeeProject/projectAjaxList/$1';

/* Employee assets*/
$route['employee/asset/list'] 		= 'employee/MyAsset/assetList';
$route['employee/asset/show/(:any)'] = 'employee/MyAsset/assetDetails/$1';
/* End */

/* Other Work*/
$route['employee/mywork/request_leave'] 	= 'employee/OtherWork/leaveRequestList';

/* Manaul log info */
$route['employee/manual/log-request'] 	= 'employee/OtherWork/manualLogRequestList';

$route['employee/manual/headManaulLogApprove'] = 'employee/OtherWork/manaulLogApprovalStatus';
/* End */
$route['employee/mywork/get-view-data/(:any)'] = 'employee/OtherWork/getViewData/$1';
$route['employee/mywork/headLeaveApprove'] = 'employee/OtherWork/leaveApprovalStatus';


/* End employee routing */

$route['404_override'] 	= '';
$route['translate_uri_dashes'] = FALSE;
