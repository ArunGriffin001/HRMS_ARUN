<!doctype html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link rel="icon" href="favicon.ico" type="image/x-icon" />
      <title><?php echo (!empty($header_title) ? $header_title : ''); ?></title>
      <link rel="stylesheet" href="<?php echo base_url('template/'); ?>superadmin/assets/plugins/bootstrap/css/bootstrap.min.css" />
      <link rel="stylesheet" href="<?php echo base_url('template/'); ?>superadmin/assets/plugins/charts-c3/c3.min.css" />
      <link rel="stylesheet" href="<?php echo base_url('template/'); ?>superadmin/assets/css/main.css" />
      <link rel="stylesheet" href="<?php echo base_url('template/'); ?>superadmin/assets/css/theme2.css" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css">

      <!-- Parsle css -->
       <link rel="stylesheet" href="<?php echo base_url('template/'); ?>superadmin/assets/css/parsley.css" />

       <!-- datatable css -->
       <link rel="stylesheet" href="<?php echo base_url('template/'); ?>superadmin/assets/css/jquery.dataTables.min.css" />

              <!-- dropify css -->
       <link rel="stylesheet" href="<?php echo base_url('template/'); ?>superadmin/assets/css/dropify.min.css" />
       <!-- Add js by developer -->

      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

      <!-- Add parsle js -->
      <script type="text/javascript" src="<?php echo base_url('template/'); ?>superadmin/assets/js/parsley.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url('template/'); ?>superadmin/assets/js/parsley.js"></script>

      <script type="text/javascript" src="<?php echo base_url('template/'); ?>superadmin/assets/js/jquery.dataTables.min.js"></script>

      <script type="text/javascript" src="<?php echo base_url('template/'); ?>superadmin/assets/js/sweetalert.min.js"></script>
      <!-- dropify js -->
      <script type="text/javascript" src="<?php echo base_url('template/'); ?>superadmin/assets/js/dropify.min.js"></script>

      <!-- ck editor  -->
      <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
      
      <script type="text/javascript" src="<?php echo base_url('template/'); ?>superadmin/assets/js/custom.js"></script>

   </head>
   <script type="text/javascript">
        var  BASEURL = "<?php echo base_url(ADMIN_URL); ?>"; 
        $(document).ready(function() {
            
        });
    </script>
   <body class="font-montserrat">
      <div class="page-loader-wrapper">
         <div class="loader"></div>
      </div>
      <div id="main_content">
         <div id="header_top" class="header_top">
            <div class="container">
              
               <div class="hright">
                  <div class="dropdown">
                    
                     <!-- <a href="javascript:void(0)" class="nav-link user_btn"><img class="avatar" src="<?php echo base_url('template/'); ?>superadmin/assets/images/user.png" alt="" data-toggle="tooltip" data-placement="right" title="User Menu" /></a> -->
                     <a href="javascript:void(0)" class="nav-link icon menu_toggle"><i class="fa  fa-align-left"></i></a>
                  </div>
               </div>
            </div>
         </div>
       <!--  <div class="user_div">
            <h5 class="brand-name mb-4"><a href="javascript:void(0)" class="user_btn"><i class="icon-logout"></i></a></h5>
            <div class="card">
               <div class="card-body">
                  <div class="media">
                     <img class="avatar avatar-xl mr-3" src="<?php echo base_url('template/'); ?>superadmin/assets/images/sm/avatar1.jpg" alt="avatar">
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
         </div> -->
         <div class="page">
            <div id="page_top" class="section-body top_dark">
               <div class="container-fluid">
                  <div class="page-header">
                     <div class="left">
                        
                        <h1 class="page-title"><?php echo (!empty($page_title_top) ? $page_title_top : ''); ?></h1>
                        
                     </div>
                     <div class="right">
                       
                        <div class="notification d-flex">
                           <!-- <div class="dropdown d-flex">
                              <a class="nav-link icon d-none d-md-flex btn btn-default btn-icon ml-1" data-toggle="dropdown"><i class="fa fa-envelope"></i><span class="badge badge-success nav-unread"></span></a>
                              <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                 <ul class="right_chat list-unstyled w250 p-0">
                                    <li class="online">
                                       <a href="javascript:void(0);">
                                          <div class="media">
                                             <img class="media-object " src="<?php echo base_url('template/'); ?>superadmin/assets/images/xs/avatar4.jpg" alt="">
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
                                             <img class="media-object " src="<?php echo base_url('template/'); ?>superadmin/assets/images/xs/avatar5.jpg" alt="">
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
                                             <img class="media-object " src="<?php echo base_url('template/'); ?>superadmin/assets/images/xs/avatar2.jpg" alt="">
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
                                             <img class="media-object " src="<?php echo base_url('template/'); ?>superadmin/assets/images/xs/avatar3.jpg" alt="">
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
                           </div> -->
                          <!--  <div class="dropdown d-flex">
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
                           </div> -->
                           <div class="dropdown d-flex">
                              <a class="nav-link icon d-none d-md-flex btn btn-default btn-icon ml-1" data-toggle="dropdown"><i class="fa fa-user"></i></a>
                              <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                               <!--   <a class="dropdown-item" href="page-profile.html"><i class="dropdown-icon fe fe-user"></i> Profile</a>
                                 <a class="dropdown-item" href="app-setting.html"><i class="dropdown-icon fe fe-settings"></i> Settings</a>
                                 <a class="dropdown-item" href="javascript:void(0)"><span class="float-right"><span class="badge badge-primary">6</span></span><i class="dropdown-icon fe fe-mail"></i> Inbox</a>
                                 <a class="dropdown-item" href="javascript:void(0)"><i class="dropdown-icon fe fe-send"></i> Message</a>
                                 <div class="dropdown-divider"></div>
                                 <a class="dropdown-item" href="javascript:void(0)"><i class="dropdown-icon fe fe-help-circle"></i> Need help?</a> -->
                                 <a class="dropdown-item" href="<?php echo base_url('superadmin/change-password'); ?>"><i class="dropdown-icon fe fe-help-circle"></i>Change Password</a>
                                 <a class="dropdown-item" href="<?php echo base_url('superadmin/logout'); ?>"><i class="dropdown-icon fe fe-log-out"></i> Sign out</a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>