<div id="left-sidebar" class="sidebar ">
   <?php
   $this->login_data = $this->session->userdata('EmployeeLogin');
   
   //die;
   $company_info = rowData( TABLE_USERS , array('id'=>$this->login_data['employer_id']),'company_name');
   $user_info = getEmployeeInfo($this->login_data['userId'],'hs_users_employer','profile_img');
/*
   $user_profile = (!empty($user_info->profile_img) ? base_url().'/uploads/employer/users/'.$user_info->profile_img : base_url().'uploads/employer/users/default_img.jpg');
   echo $user_profile;*/
   ?>
  <h5 class="brand-name">
     <?php echo(!empty($company_info->company_name) ? $company_info->company_name : 'Employee Board'); ?>
  </h5>
  <nav id="left-sidebar-nav" class="sidebar-nav">
     <ul class="metismenu">
        <li class="active">
             <a href="<?php echo base_url('employee/dashboard'); ?>"><i class="fa fa-rocket" aria-hidden="true"></i><span>Dashboard</span></a>
        </li>
        <li>
           <a href="javascript:void(0)" class="has-arrow arrow-c"><i class="fa fa-users" aria-hidden="true"></i><span>Employee</span></a>
            <ul>
              <!-- <li><a href="<?php echo base_url('employee/employee/list'); ?>"><span>Employee List</span></a></li>  -->
              <!-- <li><a href="<?php echo base_url('employee/employee/project-list'); ?>"><span>Projects</span></a></li> --> 
               <li><a href="<?php echo base_url('employee/employee/attendence'); ?>"><span>Attendence log</span></a></li> 
               <li><a href="<?php echo base_url('employee/employee/leave'); ?>"><span>Leave Records</span></a></li>
               <!-- <li><a href="<?php echo base_url('employee/employee/calender'); ?>"><span>Calender</span></a></li> -->
              
              <li><a href="<?php echo base_url('employee/employee/salary'); ?>"><span>Salary</span></a></li>
              <li><a href="<?php echo base_url('employee/employee/compliance'); ?>"><span>Compliance</span></a></li>
           </ul> 
        </li>
        <li>
           <a href="<?php echo base_url('employee/employee/doc-list'); ?>"><i class="fa fa-bell"></i><span>Document</span></a>
        </li>
        <li>
           <a href="<?php echo base_url('employee/notification'); ?>"><i class="fa fa-bell"></i><span>Notification</span></a>
        </li>

        <!-- <li>
           <a href="javascript:void(0)" class="has-arrow arrow-c"><i class="fa fa-group" aria-hidden="true"></i><span>My Team</span></a>
           <ul>
              <li><a href="<?php echo base_url('employee/myteam/teamleave'); ?>"><span>Team leave</span></a></li>
           </ul>
        </li> -->
      
         <li>
           <a href="javascript:void(0)" class="has-arrow arrow-c"><i class="fa fa-credit-card" aria-hidden="true"></i><span>Payroll</span></a>
           <ul>
            
            <li><a href="<?php echo base_url('employee/employee/compliance'); ?>"><span>Payslips</span></a></li>
            <li><a href="<?php echo base_url('employee/employee/annexure'); ?>"><span>Annexure</span></a></li>
            <li><a href="<?php echo base_url('employee/payroll/tax-declarations-form'); ?>">
               <span>Tax Declarations for tax savings</span></a>
            </li>
            <li><a href="<?php echo base_url('employee/payroll/tax-computations-form'); ?>"><span> Tax Computations</span></a></li>
            
              <!-- <li><a href="<?php echo base_url('employee/payroll/pay-slip'); ?>"><span>Payslips</span></a></li>
              <li><a href="<?php echo base_url('employee/payroll/manage-tax'); ?>"><span>Tax Declarations for tax savings</span></a></li>
              <li><a href="<?php echo base_url('employee/payroll/tax-computation'); ?>"><span> Tax Computations Sheet</span></a></li>
              <li><a href="<?php echo base_url('employee/payroll/compensation-plan'); ?>"><span>Compensation plan</span></a></li> -->
              <li><a href="<?php echo base_url('employee/payroll/form-16'); ?>"><span>Form 16</span></a></li>
              <li><a href="<?php echo base_url('employee/payroll/resignation'); ?>"><span>Full & Final Settlement</span></a></li>
              <!-- <li><a href="javascript:void(0)"><span>Variable Payout - addition</span></a></li>
              <li><a href="javascript:void(0)"><span> Annual review Payout - Addition</span></a></li>
              <li><a href="javascript:void(0)"><span> Bonus Payout - Addition</span></a></li>
          -->
           </ul>
        </li>
       <!--  <li>
           <a href="javascript:void(0)" class="has-arrow arrow-c"><i class="fa fa-clock-o" aria-hidden="true"></i>
              <span>Time Sheet</span></a>
           <ul>
              <li><a href="<?php echo base_url('employee/timesheet/time-shift-tracking'); ?>"><span>Time Sheet Tracking</span></a></li>
              <li><a href="<?php echo base_url('employee/timesheet/timesheet-tracking'); ?>"><span>Shift Tracking</span></a></li>
            
           </ul>
        </li> -->
        
        <li>
           <a href="javascript:void(0)" class="has-arrow arrow-c"><i class="fa fa-list-alt" aria-hidden="true"></i>
              <span>Others</span></a>
           <ul>
               <li><a href="<?php echo base_url('employee/employee/my-profile'); ?>"><span>My Profile</span></a></li>
               <li><a href="<?php echo base_url('employee/employee/resignation'); ?>"><span>Resignation</span></a></li>
               <li><a href="<?php echo base_url('employee/employee/holiday'); ?>"><span>Holidays</span></a></li>
               <li><a href="<?php echo base_url('employee/employee/all-events'); ?>"><span>All Events</span></a></li>
               <li><a href="<?php echo base_url('employee/asset/list'); ?>"><span>Assets</span></a></li>
               
            
           </ul>
        </li>
        <?php
          if(!empty($this->login_data['roleID'] == '3')){
            ?>
            <li>
               <a href="<?php echo base_url('employee/mywork/request_leave'); ?>"><i class="fa fa-users"></i><span>Leave Request List</span></a>
            </li>
            <li>
           <a href="<?php echo base_url('employee/manual/log-request'); ?>"><i class="fa fa-bell"></i><span>Attendance Manual Log</span></a>
        </li>
            <?php
          }
        ?>
        <!-- <li>
           <a href="javascript:void(0)" class="has-arrow arrow-c"><i class="fa fa-certificate" aria-hidden="true"></i>
              <span>Training</span></a>
           <ul>
              <li><a href="<?php echo base_url('employee/training/traning-list'); ?>"><span>Training list</span></a></li>
              <li><a href="<?php echo base_url('employee/training/traning-type'); ?>"><span>Training Type</span></a></li>
              <li><a href="<?php echo base_url('employee/training/trainer'); ?>"><span>Traniners</span></a></li>
            
           </ul>
        </li> -->
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
                              <a class="dropdown-item" href="<?php echo base_url('employee/employee/my-profile'); ?>"><i class="dropdown-icon fa fa-user"></i> Profile</a>
                             <!--  <a class="dropdown-item" href="app-setting.html"><i class="dropdown-icon fa fa-cog"></i> Settings</a> -->

                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="<?php echo base_url('employee/logout'); ?>"><i class="dropdown-icon fa fa-sign-out"></i> Sign out</a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>