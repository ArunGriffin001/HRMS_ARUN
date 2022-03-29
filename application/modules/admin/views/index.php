<!doctype html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link rel="icon" href="favicon.ico" type="image/x-icon" />
      <title>HRMS - Soylent Corp</title>
      <link rel="stylesheet" href="<?php echo base_url('template/admin')?>/assets/plugins/bootstrap/css/bootstrap.min.css" />
      <link rel="stylesheet" href="<?php echo base_url('template/admin')?>/assets/plugins/charts-c3/c3.min.css" />
      <link rel="stylesheet" href="<?php echo base_url('template/admin')?>/assets/css/main.css" />
      <link rel="stylesheet" href="<?php echo base_url('template/admin')?>/assets/css/theme2.css" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css">
   </head>
   <body class="font-montserrat">
      <div class="page-loader-wrapper">
         <div class="loader"></div>
      </div>
      <div id="main_content">
         <div id="header_top" class="header_top">
            <div class="container">
              
               <div class="hright">
                  <div class="dropdown">
                    
                     <a href="javascript:void(0)" class="nav-link user_btn"><img class="avatar" src="<?php echo base_url('template/admin')?>/assets/images/user.png" alt="" data-toggle="tooltip" data-placement="right" title="User Menu" /></a>
                     <a href="javascript:void(0)" class="nav-link icon menu_toggle"><i class="fa  fa-align-left"></i></a>
                  </div>
               </div>
            </div>
         </div>
        
        
         <div class="user_div">
            <h5 class="brand-name mb-4"><a href="javascript:void(0)" class="user_btn"><i class="icon-logout"></i></a></h5>
            <div class="card">
               <div class="card-body">
                  <div class="media">
                     <img class="avatar avatar-xl mr-3" src="<?php echo base_url('template/admin')?>/assets/images/sm/avatar1.jpg" alt="avatar">
                     <div class="media-body">
                        <h5 class="m-0">Soylent Corp</h5>
                        <p class="text-muted mb-0">HR</p>
                        <ul class="social-links list-inline mb-0 mt-2">
                           <li class="list-inline-item"><a href="javascript:void(0)" title="" data-toggle="tooltip" data-original-title="Facebook"><i class="fa fa-facebook"></i></a></li>
                           <li class="list-inline-item"><a href="javascript:void(0)" title="" data-toggle="tooltip" data-original-title="Twitter"><i class="fa fa-twitter"></i></a></li>
                           <li class="list-inline-item"><a href="javascript:void(0)" title="" data-toggle="tooltip" data-original-title="1234567890"><i class="fa fa-phone"></i></a></li>
                           <li class="list-inline-item"><a href="javascript:void(0)" title="" data-toggle="tooltip" data-original-title="@skypename"><i class="fa fa-skype"></i></a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <div class="card">
              
               <div class="card-body">
                  <div class="text-center">
                     <div class="row">
                        <div class="col-6 pb-3">
                           <label class="mb-0">Balance</label>
                           <h4 class="font-30 font-weight-bold">$545</h4>
                        </div>
                        <div class="col-6 pb-3">
                           <label class="mb-0">Growth</label>
                           <h4 class="font-30 font-weight-bold">27%</h4>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="d-block">Total Income<span class="float-right">77%</span></label>
                     <div class="progress progress-xs">
                        <div class="progress-bar bg-blue" role="progressbar" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100" style="width: 77%;"></div>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="d-block">Total Expenses <span class="float-right">50%</span></label>
                     <div class="progress progress-xs">
                        <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"></div>
                     </div>
                  </div>
                  <div class="form-group mb-0">
                     <label class="d-block">Gross Profit <span class="float-right">23%</span></label>
                     <div class="progress progress-xs">
                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="23" aria-valuemin="0" aria-valuemax="100" style="width: 23%;"></div>
                     </div>
                  </div>
               </div>
            </div>
         
         
         </div>
         <div id="left-sidebar" class="sidebar ">
            <h5 class="brand-name">Soylent Corp <a href="javascript:void(0)" class="menu_option float-right"><i class="icon-grid font-16" data-toggle="tooltip" data-placement="left" title="Grid & List Toggle"></i></a></h5>
            <nav id="left-sidebar-nav" class="sidebar-nav">

                <ul class="metismenu">
                  <li class="active">
                     <a href="javascript:void(0)" class="has-arrow arrow-c"><i class="icon-rocket"></i><span>HRMS</span></a>
                     <ul>
                        <li ><a href="index.html"><span>Dashboard</span></a></li>
                        <li><a href="hr-users.html"><span>Users</span></a></li>
                        <li><a href="hr-departments.html"><span>Departments</span></a></li>
                        <li><a href="hr-holidays.html"><span>Holidays</span></a></li>
                        <li><a href="hr-events.html"><span>Events</span></a></li>
                        <li><a href="hr-accounts.html"><span>Accounts</span></a></li>
                       
                     </ul>
                  </li>
                  <li>
                     <a href="javascript:void(0)" class="has-arrow arrow-c"><i class="icon-cup"></i><span>Employee Management</span></a>
                     <ul>
                        <li><a href="hr-employee.html">Employee Information Records</a></li>
                        <!-- <li><a href="project-list.html">Employee Documents</a></li> -->
                        <li><a href="hr-leave.html">Leave Tracking</a></li>
                        <li><a href="hr-attendance.html">Attendance </a></li>
                        <li><a href="timesheet.html">Time Sheet Tracking</a></li>
                        <!-- <li><a href="project-todo.html">Shift Tracking</a></li>
                       <li><a href="#">Asset Management</a></li> -->
                     </ul>
                  </li>

                 

                   <li>
                     <a href="javascript:void(0)" class="has-arrow arrow-c"><i class="icon-cup"></i><span>Performance 

</span></a>
                     <ul>
                        <li><a href="appraisal.html">Objectives/Goals Setting Structure</a></li>
                        <li><a href="probation-confirmation.html">Probation Confirmation</a></li>
                        <li><a href="performance-goal.html">Mid Year Appraisals</a></li>
                        <li><a href="performance-review-feedback.html">Annual Performance Appraisals & Feedback</a></li>
                       
                     </ul>
                  </li>

                   <li>
                     <a href="javascript:void(0)" class="has-arrow arrow-c"><i class="icon-cup"></i><span>Learning Management</span></a>
                     <ul>
                        <!-- <li><a href="project-index.html">New Onboard Orientation / Induction</a></li> -->
                        <li><a href="soft-skill-training.html">Soft Skill Training Need Analysis</a></li>
                        <li><a href="technical-skill.html">Technical Skill Training Need Analysis</a></li>
                        <li><a href="trainig-assignment.html">Employee Training Assignment</a></li>
                        <!-- <li><a href="project-todo.html">Employee Training Hours Tracking</a></li>
                        -->
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
                        <h1 class="page-title">HR Dashboard</h1>
                        
                     </div>
                     <div class="right">
                       
                        <div class="notification d-flex">
                           <div class="dropdown d-flex">
                              <a class="nav-link icon d-none d-md-flex btn btn-default btn-icon ml-1" data-toggle="dropdown"><i class="fa fa-envelope"></i><span class="badge badge-success nav-unread"></span></a>
                              <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                 <ul class="right_chat list-unstyled w250 p-0">
                                    <li class="online">
                                       <a href="javascript:void(0);">
                                          <div class="media">
                                             <img class="media-object " src="<?php echo base_url('template/admin')?>/assets/images/xs/avatar4.jpg" alt="">
                                             <div class="media-body">
                                                <span class="name">Donald Gardner</span>
                                                <span class="message">Designer, Blogger</span>
                                                <span class="badge badge-outline status"></span>
                                             </div>
                                          </div>
                                       </a>
                                    </li>
                                    <li class="online">
                                       <a href="javascript:void(0);">
                                          <div class="media">
                                             <img class="media-object " src="<?php echo base_url('template/admin')?>/assets/images/xs/avatar5.jpg" alt="">
                                             <div class="media-body">
                                                <span class="name">Wendy Keen</span>
                                                <span class="message">Java Developer</span>
                                                <span class="badge badge-outline status"></span>
                                             </div>
                                          </div>
                                       </a>
                                    </li>
                                    <li class="offline">
                                       <a href="javascript:void(0);">
                                          <div class="media">
                                             <img class="media-object " src="<?php echo base_url('template/admin')?>/assets/images/xs/avatar2.jpg" alt="">
                                             <div class="media-body">
                                                <span class="name">Matt Rosales</span>
                                                <span class="message">CEO, Epic Theme</span>
                                                <span class="badge badge-outline status"></span>
                                             </div>
                                          </div>
                                       </a>
                                    </li>
                                    <li class="online">
                                       <a href="javascript:void(0);">
                                          <div class="media">
                                             <img class="media-object " src="<?php echo base_url('template/admin')?>/assets/images/xs/avatar3.jpg" alt="">
                                             <div class="media-body">
                                                <span class="name">Phillip Smith</span>
                                                <span class="message">Writter, Mag Editor</span>
                                                <span class="badge badge-outline status"></span>
                                             </div>
                                          </div>
                                       </a>
                                    </li>
                                 </ul>
                                 <div class="dropdown-divider"></div>
                                 <a href="javascript:void(0)" class="dropdown-item text-center text-muted-dark readall">Mark all as read</a>
                              </div>
                           </div>
                           <div class="dropdown d-flex">
                              <a class="nav-link icon d-none d-md-flex btn btn-default btn-icon ml-1" data-toggle="dropdown"><i class="fa fa-bell"></i><span class="badge badge-primary nav-unread"></span></a>
                              <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                 <ul class="list-unstyled feeds_widget">
                                    <li>
                                       <div class="feeds-left"><i class="fa fa-check"></i></div>
                                       <div class="feeds-body">
                                          <h4 class="title text-danger">Issue Fixed <small class="float-right text-muted">11:05</small></h4>
                                          <small>WE have fix all Design bug with Responsive</small>
                                       </div>
                                    </li>
                                    <li>
                                       <div class="feeds-left"><i class="fa fa-user"></i></div>
                                       <div class="feeds-body">
                                          <h4 class="title">New User <small class="float-right text-muted">10:45</small></h4>
                                          <small>I feel great! Thanks team</small>
                                       </div>
                                    </li>
                                    <li>
                                       <div class="feeds-left"><i class="fa fa-thumbs-o-up"></i></div>
                                       <div class="feeds-body">
                                          <h4 class="title">7 New Feedback <small class="float-right text-muted">Today</small></h4>
                                          <small>It will give a smart finishing to your site</small>
                                       </div>
                                    </li>
                                    <li>
                                       <div class="feeds-left"><i class="fa fa-question-circle"></i></div>
                                       <div class="feeds-body">
                                          <h4 class="title text-warning">Server Warning <small class="float-right text-muted">10:50</small></h4>
                                          <small>Your connection is not private</small>
                                       </div>
                                    </li>
                                    <li>
                                       <div class="feeds-left"><i class="fa fa-shopping-cart"></i></div>
                                       <div class="feeds-body">
                                          <h4 class="title">7 New Orders <small class="float-right text-muted">11:35</small></h4>
                                          <small>You received a new oder from Tina.</small>
                                       </div>
                                    </li>
                                 </ul>
                                 <div class="dropdown-divider"></div>
                                 <a href="javascript:void(0)" class="dropdown-item text-center text-muted-dark readall">Mark all as read</a>
                              </div>
                           </div>
                           <div class="dropdown d-flex">
                              <a class="nav-link icon d-none d-md-flex btn btn-default btn-icon ml-1" data-toggle="dropdown"><i class="fa fa-user"></i></a>
                              <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                 <a class="dropdown-item" href="page-profile.html"><i class="dropdown-icon fe fe-user"></i> Profile</a>
                                 <a class="dropdown-item" href="app-setting.html"><i class="dropdown-icon fe fe-settings"></i> Settings</a>
                                 <a class="dropdown-item" href="javascript:void(0)"><span class="float-right"><span class="badge badge-primary">6</span></span><i class="dropdown-icon fe fe-mail"></i> Inbox</a>
                                 <a class="dropdown-item" href="javascript:void(0)"><i class="dropdown-icon fe fe-send"></i> Message</a>
                                 <div class="dropdown-divider"></div>
                                 <a class="dropdown-item" href="javascript:void(0)"><i class="dropdown-icon fe fe-help-circle"></i> Need help?</a>
                                 <a class="dropdown-item" href="login.html"><i class="dropdown-icon fe fe-log-out"></i> Sign out</a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="section-body mt-3">
               <div class="container-fluid">
                  <div class="row clearfix">
                     <div class="col-lg-12">
                        <div class="mb-4">
                           <h4>Welcome Soylent Corp!</h4>
                          
                        </div>
                     </div>
                  </div>
                  <div class="row clearfix">
                     <div class="col-6 col-md-4 col-xl-2">
                        <div class="card">
                           <div class="card-body ribbon">
                              <div class="ribbon-box green">5</div>
                              <a href="hr-users.html" class="my_sort_cut text-muted">
                              <i class="icon-users"></i>
                              <span>Users</span>
                              </a>
                           </div>
                        </div>
                     </div>
                     <div class="col-6 col-md-4 col-xl-2">
                        <div class="card">
                           <div class="card-body">
                              <a href="hr-holidays.html" class="my_sort_cut text-muted">
                              <i class="icon-like"></i>
                              <span>Holidays</span>
                              </a>
                           </div>
                        </div>
                     </div>
                     <div class="col-6 col-md-4 col-xl-2">
                        <div class="card">
                           <div class="card-body ribbon">
                              <div class="ribbon-box orange">8</div>
                              <a href="hr-events.html" class="my_sort_cut text-muted">
                              <i class="icon-calendar"></i>
                              <span>Events</span>
                              </a>
                           </div>
                        </div>
                     </div>
                     <div class="col-6 col-md-4 col-xl-2">
                        <div class="card">
                           <div class="card-body">
                              <a href="hr-payroll.html" class="my_sort_cut text-muted">
                              <i class="icon-credit-card"></i>
                              <span>Payroll</span>
                              </a>
                           </div>
                        </div>
                     </div>
                     <div class="col-6 col-md-4 col-xl-2">
                        <div class="card">
                           <div class="card-body">
                              <a href="hr-accounts.html" class="my_sort_cut text-muted">
                              <i class="icon-calculator"></i>
                              <span>Accounts</span>
                              </a>
                           </div>
                        </div>
                     </div>
                     <div class="col-6 col-md-4 col-xl-2">
                        <div class="card">
                           <div class="card-body">
                              <a href="hr-report.html" class="my_sort_cut text-muted">
                              <i class="icon-pie-chart"></i>
                              <span>Report</span>
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="section-body">
               <div class="container-fluid">
                  <div class="row clearfix row-deck">
                     <div class="col-xl-6 col-lg-12 col-md-12">
                        <div class="card">
                           <div class="card-header">
                              <h3 class="card-title">Salary Statistics</h3>
                              <div class="card-options">
                                 <label class="custom-switch m-0">
                                 <input type="checkbox" value="1" class="custom-switch-input" checked="">
                                 <span class="custom-switch-indicator"></span>
                                 </label>
                              </div>
                           </div>
                           <div class="card-body">
                              <div id="chart-bar" style="height: 350px"></div>
                           </div>
                           <div class="card-footer">
                              <div class="d-flex justify-content-between align-items-center">
                                 <a href="javascript:void(0)" class="btn btn-info btn-sm w200 mr-3">Generate Report</a>
                                 <small>Measure How Fast You’re Growing Monthly Recurring Revenue. <a href="#">Learn More</a></small>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-3 col-lg-6 col-md-6">
                        <div class="card">
                           <div class="card-header">
                              <h3 class="card-title">Revenue</h3>
                           </div>
                           <div class="card-body text-center">
                              <div class="mt-4">
                                 <input type="text" class="knob" value="82" data-width="147" data-height="147" data-thickness="0.07" data-bgColor="#3f454a" data-fgColor="#e8769f">
                              </div>
                              <h3 class="mb-0 mt-3 font300"><span class="counter">1,24,301</span> <span class="text-green font-15">+3.7%</span></h3>
                              <small>Lorem Ipsum is simply dummy text <br> <a href="#">Read more</a> </small>
                              <div class="mt-4">
                                 <span class="chart_3">2,5,8,3,6,9,4,5,6,3</span>
                              </div>
                           </div>
                           <div class="card-footer">
                              <a href="javascript:void(0)" class="btn btn-block btn-success btn-sm">Send Report</a>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-3 col-lg-6 col-md-6">
                        <div class="card">
                           <div class="card-header">
                              <h3 class="card-title">My Balance</h3>
                           </div>
                           <div class="card-body">
                              <span>Balance</span>
                              <h4>$<span class="counter">20,508</span></h4>
                              <div id="apexspark1" class="mb-4"></div>
                              <div class="form-group">
                                 <label class="d-block">Bank of America <span class="float-right">$<span class="counter">15,025</span></span></label>
                                 <div class="progress progress-xs">
                                    <div class="progress-bar bg-azure" role="progressbar" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100" style="width: 77%;"></div>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label class="d-block">RBC Bank <span class="float-right">$<span class="counter">1,843</span></span></label>
                                 <div class="progress progress-xs">
                                    <div class="progress-bar bg-green" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"></div>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label class="d-block">Frost Bank <span class="float-right">$<span class="counter">3,641</span></span></label>
                                 <div class="progress progress-xs">
                                    <div class="progress-bar bg-blue" role="progressbar" aria-valuenow="23" aria-valuemin="0" aria-valuemax="100" style="width: 23%;"></div>
                                 </div>
                              </div>
                           </div>
                           <div class="card-footer">
                              <a href="javascript:void(0)" class="btn btn-block btn-info btn-sm">View More</a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row clearfix row-deck">
                     <div class="col-xl-3 col-lg-6 col-md-6">
                        <div class="card">
                           <div class="card-header">
                              <h3 class="card-title">Employee Structure</h3>
                           </div>
                           <div class="card-body text-center">
                              <div id="chart-bar-stacked" style="height: 280px"></div>
                              <div class="row clearfix">
                                 <div class="col-6">
                                    <h6 class="mb-0">50</h6>
                                    <small class="text-muted">Male</small>
                                 </div>
                                 <div class="col-6">
                                    <h6 class="mb-0">17</h6>
                                    <small class="text-muted">Female</small>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-3 col-lg-6 col-md-6">
                        <div class="card">
                           <div class="card-header">
                              <h3 class="card-title">Employee Satisfaction</h3>
                           </div>
                           <div class="card-body text-center">
                              <div id="chart-area-spline-sracked" style="height: 280px"></div>
                              <div class="row clearfix">
                                 <div class="col-6">
                                    <h6 class="mb-0">195</h6>
                                    <small class="text-muted">Last Month</small>
                                 </div>
                                 <div class="col-6">
                                    <h6 class="mb-0">163</h6>
                                    <small class="text-muted">This Month</small>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-3 col-lg-6 col-md-6">
                        <div class="card">
                           <div class="card-header">
                              <h3 class="card-title">Performance</h3>
                           </div>
                           <div class="card-body">
                              
                              <ul class="list-group mt-3 mb-0">
                                 <li class="list-group-item">
                                    <div class="clearfix">
                                       <div class="float-left"><strong>35%</strong></div>
                                       <div class="float-right"><small class="text-muted">Design Team</small></div>
                                    </div>
                                    <div class="progress progress-xs">
                                       <div class="progress-bar bg-azure" role="progressbar" style="width: 35%" aria-valuenow="42" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                 </li>
                                 <li class="list-group-item">
                                    <div class="clearfix">
                                       <div class="float-left"><strong>25%</strong></div>
                                       <div class="float-right"><small class="text-muted">Developer Team</small></div>
                                    </div>
                                    <div class="progress progress-xs">
                                       <div class="progress-bar bg-green" role="progressbar" style="width: 25%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                 </li>
                                 <li class="list-group-item">
                                    <div class="clearfix">
                                       <div class="float-left"><strong>15%</strong></div>
                                       <div class="float-right"><small class="text-muted">Marketing</small></div>
                                    </div>
                                    <div class="progress progress-xs">
                                       <div class="progress-bar bg-orange" role="progressbar" style="width: 15%" aria-valuenow="36" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                 </li>
                                 <li class="list-group-item">
                                    <div class="clearfix">
                                       <div class="float-left"><strong>20%</strong></div>
                                       <div class="float-right"><small class="text-muted">Management</small></div>
                                    </div>
                                    <div class="progress progress-xs">
                                       <div class="progress-bar bg-indigo" role="progressbar" style="width: 20%" aria-valuenow="6" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                 </li>
                                 <li class="list-group-item">
                                    <div class="clearfix">
                                       <div class="float-left"><strong>11%</strong></div>
                                       <div class="float-right"><small class="text-muted">Other</small></div>
                                    </div>
                                    <div class="progress progress-xs">
                                       <div class="progress-bar bg-pink" role="progressbar" style="width: 11%" aria-valuenow="6" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-3 col-lg-6 col-md-6">
                        <div class="card">
                           <div class="card-header">
                              <h3 class="card-title">Growth</h3>
                           </div>
                           <div class="card-body text-center">
                              <div id="GROWTH" style="height: 240px"></div>
                           </div>
                           <div class="card-footer text-center">
                              <div class="row clearfix">
                                 <div class="col-6">
                                    <h6 class="mb-0">$3,095</h6>
                                    <small class="text-muted">Last Year</small>
                                 </div>
                                 <div class="col-6">
                                    <h6 class="mb-0">$2,763</h6>
                                    <small class="text-muted">This Year</small>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row clearfix">
                     <div class="col-12 col-sm-12">
                        <div class="card">
                           <div class="card-header">
                              <h3 class="card-title">Project Summary</h3>
                           </div>
                           <div class="card-body">
                              <div class="table-responsive">
                                 <table class="table table-hover table-striped text-nowrap table-vcenter mb-0">
                                    <thead>
                                       <tr>
                                          <th>#</th>
                                          <th>Client Name</th>
                                          <th>Team</th>
                                          <th>Project</th>
                                          <th>Project Cost</th>
                                          <th>Payment</th>
                                          <th>Status</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <tr>
                                          <td>#AD1245</td>
                                          <td>Sean Black</td>
                                          <td>
                                             <ul class="list-unstyled team-info sm margin-0 w150">
                                                <li><img src="<?php echo base_url('template/admin')?>/assets/images/xs/avatar1.jpg" alt="Avatar"></li>
                                                <li><img src="<?php echo base_url('template/admin')?>/assets/images/xs/avatar2.jpg" alt="Avatar"></li>
                                                <li><img src="<?php echo base_url('template/admin')?>/assets/images/xs/avatar3.jpg" alt="Avatar"></li>
                                                <li><img src="<?php echo base_url('template/admin')?>/assets/images/xs/avatar4.jpg" alt="Avatar"></li>
                                                <li class="ml-2"><span>2+</span></li>
                                             </ul>
                                          </td>
                                          <td>Angular Admin</td>
                                          <td>$14,500</td>
                                          <td>Done</td>
                                          <td><span class="tag tag-success">Delivered</span></td>
                                       </tr>
                                       <tr>
                                          <td>#DF1937</td>
                                          <td>Sean Black</td>
                                          <td>
                                             <ul class="list-unstyled team-info sm margin-0 w150">
                                                <li><img src="<?php echo base_url('template/admin')?>/assets/images/xs/avatar1.jpg" alt="Avatar"></li>
                                                <li><img src="<?php echo base_url('template/admin')?>/assets/images/xs/avatar2.jpg" alt="Avatar"></li>
                                                <li><img src="<?php echo base_url('template/admin')?>/assets/images/xs/avatar3.jpg" alt="Avatar"></li>
                                                <li><img src="<?php echo base_url('template/admin')?>/assets/images/xs/avatar4.jpg" alt="Avatar"></li>
                                                <li class="ml-2"><span>2+</span></li>
                                             </ul>
                                          </td>
                                          <td>Angular Admin</td>
                                          <td>$14,500</td>
                                          <td>Pending</td>
                                          <td><span class="tag tag-success">Delivered</span></td>
                                       </tr>
                                       <tr>
                                          <td>#YU8585</td>
                                          <td>Merri Diamond</td>
                                          <td>
                                             <ul class="list-unstyled team-info sm margin-0 w150">
                                                <li><img src="<?php echo base_url('template/admin')?>/assets/images/xs/avatar1.jpg" alt="Avatar"></li>
                                                <li><img src="<?php echo base_url('template/admin')?>/assets/images/xs/avatar2.jpg" alt="Avatar"></li>
                                             </ul>
                                          </td>
                                          <td>One page html Admin</td>
                                          <td>$500</td>
                                          <td>Done</td>
                                          <td><span class="tag tag-orange">Submit</span></td>
                                       </tr>
                                       <tr>
                                          <td>#AD1245</td>
                                          <td>Sean Black</td>
                                          <td>
                                             <ul class="list-unstyled team-info sm margin-0 w150">
                                                <li><img src="<?php echo base_url('template/admin')?>/assets/images/xs/avatar1.jpg" alt="Avatar"></li>
                                                <li><img src="<?php echo base_url('template/admin')?>/assets/images/xs/avatar2.jpg" alt="Avatar"></li>
                                                <li><img src="<?php echo base_url('template/admin')?>/assets/images/xs/avatar3.jpg" alt="Avatar"></li>
                                                <li><img src="<?php echo base_url('template/admin')?>/assets/images/xs/avatar4.jpg" alt="Avatar"></li>
                                             </ul>
                                          </td>
                                          <td>Wordpress One page</td>
                                          <td>$1,500</td>
                                          <td>Done</td>
                                          <td><span class="tag tag-success">Delivered</span></td>
                                       </tr>
                                       <tr>
                                          <td>#GH8596</td>
                                          <td>Allen Collins</td>
                                          <td>
                                             <ul class="list-unstyled team-info sm margin-0 w150">
                                                <li><img src="<?php echo base_url('template/admin')?>/assets/images/xs/avatar1.jpg" alt="Avatar"></li>
                                                <li><img src="<?php echo base_url('template/admin')?>/assets/images/xs/avatar2.jpg" alt="Avatar"></li>
                                                <li><img src="<?php echo base_url('template/admin')?>/assets/images/xs/avatar3.jpg" alt="Avatar"></li>
                                                <li><img src="<?php echo base_url('template/admin')?>/assets/images/xs/avatar4.jpg" alt="Avatar"></li>
                                                <li class="ml-2"><span>2+</span></li>
                                             </ul>
                                          </td>
                                          <td>VueJs Application</td>
                                          <td>$9,500</td>
                                          <td>Done</td>
                                          <td><span class="tag tag-success">Delivered</span></td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="section-body">
               <footer class="footer">
                  <div class="container-fluid">
                     <div class="row">
                        <div class="col-md-6 col-sm-12">
                           Copyright © 2021. All Right Reserved.
                        </div>
    
                     </div>
                  </div>
               </footer>
            </div>
         </div>
      </div>
      <script src="<?php echo base_url('template/admin')?>/assets/bundles/lib.vendor.bundle.js" type="a316c684ac11c7a0d3cd8f14-text/javascript"></script>
      <script src="<?php echo base_url('template/admin')?>/assets/bundles/apexcharts.bundle.js" type="a316c684ac11c7a0d3cd8f14-text/javascript"></script>
      <script src="<?php echo base_url('template/admin')?>/assets/bundles/counterup.bundle.js" type="a316c684ac11c7a0d3cd8f14-text/javascript"></script>
      <script src="<?php echo base_url('template/admin')?>/assets/bundles/knobjs.bundle.js" type="a316c684ac11c7a0d3cd8f14-text/javascript"></script>
      <script src="<?php echo base_url('template/admin')?>/assets/bundles/c3.bundle.js" type="a316c684ac11c7a0d3cd8f14-text/javascript"></script>
      <script src="<?php echo base_url('template/admin')?>/assets/js/core.js" type="a316c684ac11c7a0d3cd8f14-text/javascript"></script>
      <script src="assets/js/page/index.js" type="a316c684ac11c7a0d3cd8f14-text/javascript"></script>
      <script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js" data-cf-settings="a316c684ac11c7a0d3cd8f14-|49" defer=""></script>
   </body>
</html>