<div id="left-sidebar" class="sidebar ">
  <h5 class="brand-name">
     Soylent Crop
  </h5>
  <nav id="left-sidebar-nav" class="sidebar-nav">
     <ul class="metismenu">
        <li class="active">
             <a href="<?php echo base_url('employee/dashboard'); ?>"><i class="fa fa-rocket" aria-hidden="true"></i><span>Dashboard</span></a>
        </li>
        <li>
           <a href="javascript:void(0)" class="has-arrow arrow-c"><i class="fa fa-users" aria-hidden="true"></i><span>Employee</span></a>
            <ul>
              <!-- <li><a href="<?php echo base_url('employee/employee/list'); ?>"><i class="fa fa-ellipsis-h" aria-hidden="true"></i><span>Employee List</span></a></li>  -->
              <!-- <li><a href="<?php echo base_url('employee/employee/project-list'); ?>"><i class="fa fa-ellipsis-h" aria-hidden="true"></i><span>Projects</span></a></li> --> 
               <li><a href="<?php echo base_url('employee/employee/attendence'); ?>"><i class="fa fa-ellipsis-h" aria-hidden="true"></i><span>Attendence log</span></a></li> 
               <li><a href="<?php echo base_url('employee/employee/leave'); ?>"><i class="fa fa-ellipsis-h" aria-hidden="true"></i><span>Leave Records</span></a></li>
              <li><a href="<?php echo base_url('employee/employee/holiday'); ?>"><i class="fa fa-ellipsis-h" aria-hidden="true"></i><span>Holidays</span></a></li>
              <li><a href="<?php echo base_url('employee/employee/calender'); ?>"><i class="fa fa-ellipsis-h" aria-hidden="true"></i><span>Calender</span></a></li>
              
              <li><a href="<?php echo base_url('employee/employee/my-profile'); ?>"><i class="fa fa-ellipsis-h" aria-hidden="true"></i><span>My Profile</span></a></li>
              <li><a href="<?php echo base_url('employee/employee/resignation'); ?>"><i class="fa fa-ellipsis-h" aria-hidden="true"></i><span>Resignation</span></a></li>
           </ul> 
        </li>

        <li>
           <a href="<?php echo base_url('employee/notification'); ?>"><i class="fa fa-bell"></i><span>Notification</span></a>
        </li>

        <li>
           <a href="javascript:void(0)" class="has-arrow arrow-c"><i class="fa fa-group" aria-hidden="true"></i><span>My Team</span></a>
           <ul>
              <li><a href="<?php echo base_url('employee/myteam/teamleave'); ?>"><i class="fa fa-ellipsis-h" aria-hidden="true"></i><span>Team leave</span></a></li>
              <!-- <li><a href="team-attendence.html"><span>Team attendance</span></a></li> -->
              <!-- <li><a href="team-report.html"><span>Team Reports</span></a></li>
              <li><a href="javascript:void(0)"><span>Asset Management</span></a></li>
              <li><a href="javascript:void(0)"><span>Team Performance</span></a></li> -->
           </ul>
        </li>
         <li>
           <a href="javascript:void(0)" class="has-arrow arrow-c"><i class="fa fa-credit-card" aria-hidden="true"></i><span>Payroll</span></a>
           <ul>
              <li><a href="<?php echo base_url('employee/payroll/pay-slip'); ?>"><i class="fa fa-ellipsis-h" aria-hidden="true"></i><span>Payslips</span></a></li>
              <li><a href="<?php echo base_url('employee/payroll/manage-tax'); ?>"><i class="fa fa-ellipsis-h" aria-hidden="true"></i><span>Tax Declarations for tax savings</span></a></li>
              <li><a href="<?php echo base_url('employee/payroll/tax-computation'); ?>"><i class="fa fa-ellipsis-h" aria-hidden="true"></i><span> Tax Computations Sheet</span></a></li>
              <li><a href="<?php echo base_url('employee/payroll/compensation-plan'); ?>"><i class="fa fa-ellipsis-h" aria-hidden="true"></i><span>Compensation plan</span></a></li>
              <li><a href="<?php echo base_url('employee/payroll/form-16'); ?>"><i class="fa fa-ellipsis-h" aria-hidden="true"></i><span>Form 16</span></a></li>
              <li><a href="<?php echo base_url('employee/payroll/resignation'); ?>"><i class="fa fa-ellipsis-h" aria-hidden="true"></i><span>Full & Final Settlement</span></a></li>
              <!-- <li><a href="javascript:void(0)"><span>Variable Payout - addition</span></a></li>
              <li><a href="javascript:void(0)"><span> Annual review Payout - Addition</span></a></li>
              <li><a href="javascript:void(0)"><span> Bonus Payout - Addition</span></a></li>
          -->
           </ul>
        </li>
        <li>
           <a href="javascript:void(0)" class="has-arrow arrow-c"><i class="fa fa-clock-o" aria-hidden="true"></i>
              <span>Time Sheet</span></a>
           <ul>
              <li><a href="<?php echo base_url('employee/timesheet/time-shift-tracking'); ?>"><i class="fa fa-ellipsis-h" aria-hidden="true"></i><span>Time Sheet Tracking</span></a></li>
              <li><a href="<?php echo base_url('employee/timesheet/timesheet-tracking'); ?>"><i class="fa fa-ellipsis-h" aria-hidden="true"></i><span>Shift Tracking</span></a></li>
            
           </ul>
        </li>
        <li>
           <a href="javascript:void(0)" class="has-arrow arrow-c"><i class="fa fa-certificate" aria-hidden="true"></i>
              <span>Training</span></a>
           <ul>
              <li><a href="<?php echo base_url('employee/training/traning-list'); ?>"><i class="fa fa-ellipsis-h" aria-hidden="true"></i><span>Training list</span></a></li>
              <li><a href="<?php echo base_url('employee/training/traning-type'); ?>"><i class="fa fa-ellipsis-h" aria-hidden="true"></i><span>Training Type</span></a></li>
              <li><a href="<?php echo base_url('employee/training/trainer'); ?>"><i class="fa fa-ellipsis-h" aria-hidden="true"></i><span>Traniners</span></a></li>
            
           </ul>
        </li>
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
                              <a class="dropdown-item" href="#"><i class="dropdown-icon fa fa-user"></i> Profile</a>
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