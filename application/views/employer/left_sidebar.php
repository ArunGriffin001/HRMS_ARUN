<div id="left-sidebar" class="sidebar ">
   <?php
   $this->login_data = $this->session->userdata('EmployerLoginDetails');
   $company_info = rowData( TABLE_USERS , array('id'=>$this->login_data['userId']),'company_name');
   ?>
  <h5 class="brand-name"><?php echo(!empty($company_info->company_name) ? $company_info->company_name : 'Admin'); ?> <a href="javascript:void(0)" class="menu_option float-right"><i class="icon-grid font-16" data-toggle="tooltip" data-placement="left" title="Grid & List Toggle"></i></a></h5>
  <nav id="left-sidebar-nav" class="sidebar-nav">
    <ul class="metismenu">
        <li class="active">
           <a href="javascript:void(0)" class="has-arrow arrow-c" aria-expanded="true"><i class="icon-rocket"></i><span>HRMS</span></a>
           <ul>
              <li ><a href="<?php echo base_url('employer/dashboard'); ?>"><span>Dashboard</span></a></li>
              <li><a href="<?php echo base_url('employer/hrms/users'); ?>"><span>Employee List</span></a></li>
              <li><a href="<?php echo base_url('employer/hrms/holiday'); ?>"><span>Holidays</span></a></li>
              <li><a href="<?php echo base_url('employer/hrms/events'); ?>"><span>Events</span></a></li>
              <li>
                 <a href="<?php echo base_url('employer/hrms/users/salary'); ?>">Salary</a>
              </li>
               <li>
                 <a href="<?php echo base_url('employer/hrms/users/manualLogRequestList'); ?>">Regularization Report</a>
              </li>
              <!-- <li><a href="<?php echo base_url('employer/hrms/accounts'); ?>"><span>Accounts</span></a></li> -->
             
           </ul>
        </li>
        <li>
           <a href="javascript:void(0)" class="has-arrow arrow-c"><i class="icon-cup"></i><span>Employee Management</span></a>
           <ul>
              <!-- <li><a href="<?php echo base_url('employer/emp-management/employee'); ?>">Employee Information Records</a></li> -->
              <!-- <li><a href="project-list.html">Employee Documents</a></li> -->
              <!-- <li><a href="<?php echo base_url('employer/emp-management/leave'); ?>">Leave Tracking</a></li> -->
              <li><a href="<?php echo base_url('employer/emp-management/leave_type/list'); ?>">Leave Type</a></li>
               <li><a href="<?php echo base_url('employer/emp-management/leave_assign_record/list'); ?>">Leave Assigning</a></li>
              <li><a href="<?php echo base_url('employer/emp-management/leave_tracking/list'); ?>">Leave Tracking</a></li>
             <!--  <li><a href="<?php echo base_url('employer/emp-management/attendance'); ?>">Attendance </a></li> -->
             <!--  <li><a href="#">Attendance </a></li> -->
              <!-- <li><a href="<?php echo base_url('employer/emp-management/project'); ?>">Projects</a></li> -->
              <!-- <li><a href="#">Time Sheet Tracking</a></li> -->
              <!-- <li><a href="<?php echo base_url('employer/emp-management/timesheet'); ?>">Time Sheet Tracking</a></li> -->
               <!-- <li><a href="<?php echo base_url('employer/hrms/users/salary'); ?>">Salary</a></li> -->
               
           </ul>
        </li>

      <li>
           <a href="javascript:void(0)" class="has-arrow arrow-c"><i class="icon-cup"></i><span>Compliance Management</span></a>
           <ul>
              <li><a href="<?php echo base_url('employer/compliance-management/list'); ?>">Pay Slips</a></li>
              <li><a href="<?php echo base_url('employer/compliance-management/SettingPfEsi'); ?>">Common PF AND ESI Setting</a></li>
           </ul>
        </li>

        <li>
           <a href="javascript:void(0)" class="has-arrow arrow-c"><i class="icon-cup"></i><span>Recruitment Management</span></a>
           <ul>
               <li><a href="<?php echo base_url('employer/recruitment-management/compensation/details'); ?>">Compensation structure</a></li>
               <li><a href="#">Offer /Appointment Roll-outs</a></li>
           </ul>
        </li>

       

         <li>
           <a href="javascript:void(0)" class="has-arrow arrow-c"><i class="icon-map"></i><span>Performance </span></a>
           <ul>
              <li><a href="<?php echo base_url('employer/performance/appraisal'); ?>">Objectives/Goals Setting Structure</a></li>
              <li><a href="<?php echo base_url('employer/performance/performance-goal'); ?>">Mid Year Appraisals</a></li>
              <li><a href="<?php echo base_url('employer/performance/probation-confirmation'); ?>">Probation Confirmation</a></li>
              <li><a href="<?php echo base_url('employer/performance/performance-review-feedback'); ?>">Annual Performance Appraisals & Feedback</a></li>
              <li><a href="<?php echo base_url('employer/performance/resignation'); ?>">Resignation</a></li>
             
           </ul>
        </li>

         <li>
           <a href="javascript:void(0)" class="has-arrow arrow-c"><i class="icon-briefcase"></i><span>Learning Management</span></a>
           <ul>
              <li><a href="<?php echo base_url('employer/learning-management/probation-confirmation'); ?>">Soft Skill Training Need Analysis</a></li>
              <li><a href="<?php echo base_url('employer/learning-management/performance-goal'); ?>">Technical Skill Training Need Analysis</a></li>
              <li><a href="<?php echo base_url('employer/learning-management/performance-review-feedback'); ?>">Employee Training Assignment</a></li>
           </ul>
         </li>

          <li>
           <a href="javascript:void(0)" class="has-arrow arrow-c"><i class="icon-briefcase"></i><span>Payroll Management</span></a>
           <ul>
              <li><a href="<?php echo base_url('employer/compliance-management/pay'); ?>">Payslips</a></li>
              <li><a href="<?php echo base_url('employer/tax_declarations') ?>">Tax Declarations for tax savings</a></li>
              <li><a href="<?php echo base_url('employer/tax_computation') ?>">Tax Computations</a></li>
              <!-- <li><a href="#">Compensation plan</a></li> -->
              <li><a href="<?php echo base_url('employer/form_16') ?>">Form 16</a></li>
              <li><a href="<?php echo base_url('employer/full-and-final-settlement/list'); ?>">Full & Final Settlement</a></li>
           </ul>
         </li>

         <li> 
           <a href="javascript:void(0)" class="has-arrow arrow-c"><i class="fa fa-cog"></i><span>Setting</span></a>
           <ul>
              <li><a href="<?php echo base_url('employer/hrms/department'); ?>"><span>Departments</span></a></li>
              <li><a href="<?php echo base_url('employer/hrms/designation'); ?>"><span>Designation</span></a></li>
              <li>
                  <a href="javascript:void(0)" class="has-arrow arrow-c"><i class="fa fa-laptop"></i>Asset Management</a>
                   <ul> 
                       <li><a href="<?php echo base_url('employer/asset/type_list'); ?>">Asset Type</a></li>
                       <li><a href="<?php echo base_url('employer/asset/employee_asset_list'); ?>">Asset List</a></li>
                    </ul>
              </li>
           </ul>
         </li>

          <!-- <li>
            <a href="<?php echo base_url('employer/full-and-final-settlement/list'); ?>" class=""><i class="icon-briefcase"></i><span>Full & Final Settlement</span></a>
         </li>
         <li>
            <a href="<?php echo base_url('employer/emp-management/assets/list'); ?>" class=""><i class="icon-briefcase"></i><span>Assets Management</span></a>
         </li> -->
        <!-- 
         -->
     </ul>
  </nav>
</div>
<div class="page">
  <div id="page_top" class="section-body top_dark">
    <div class="container-fluid">
      <div class="page-header">
         <div class="left">
            <h1 class="page-title"><?php echo (!empty($page_heading) ? $page_heading : ''); ?></h1> 
         </div>
         <div class="right">
            <div class="notification d-flex">
               <div class="dropdown d-flex">
                  <a class="nav-link icon d-none d-md-flex btn btn-default btn-icon ml-1" data-toggle="dropdown"><i class="fa fa-user"></i></a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                     <a class="dropdown-item" href="<?php echo base_url('employer/profile'); ?>"><i class="dropdown-icon fe fe-user"></i> Profile</a>
                     
                     <a class="dropdown-item" href="<?php echo base_url('employer/logout'); ?>"><i class="dropdown-icon fe fe-log-out"></i> Sign out</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
    </div>
  </div>