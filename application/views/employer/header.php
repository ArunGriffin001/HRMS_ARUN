<!doctype html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link rel="icon" href="favicon.ico" type="image/x-icon" />
      <title><?php echo (!empty($header_title) ? $header_title : ''); ?></title>
      <link rel="stylesheet" href="<?php echo base_url('template/'); ?>employer/assets/plugins/bootstrap/css/bootstrap.min.css" />
      <link rel="stylesheet" href="<?php echo base_url('template/'); ?>employer/assets/plugins/fullcalendar/fullcalendar.min.css">
      <link rel="stylesheet" href="<?php echo base_url('template/'); ?>employer/assets/plugins/charts-c3/c3.min.css" />
      <link rel="stylesheet" href="<?php echo base_url('template/'); ?>employer/assets/css/attendance.css" />
      <link rel="stylesheet" href="<?php echo base_url('template/'); ?>employer/assets/css/main.css" />
      <link rel="stylesheet" href="<?php echo base_url('template/'); ?>employer/assets/css/theme2.css" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css">

      <!-- Parsley css -->
      <link rel="stylesheet" href="<?php echo base_url('template/'); ?>employer/assets/css/parsley.css" />

      <!-- Datatable css  -->
      <link rel="stylesheet" href="<?php echo base_url('template/'); ?>employer/assets/css/dataTables.min.css" />
      <link rel="stylesheet" href="<?php echo base_url('template/'); ?>superadmin/assets/css/dropify.min.css" />

      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

         <script src="<?php echo base_url('template/'); ?>employer/assets/bundles/lib.vendor.bundle.js" type="text/javascript"></script>
      
      <script type="text/javascript" src="<?php echo base_url('template/'); ?>superadmin/assets/js/sweetalert.min.js"></script>
      <script src="<?php echo base_url('template/'); ?>employer/assets/js/jquery.dataTables.min.js" ></script>
     
      <!-- ck editor  -->
      <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
      
      <script type="text/javascript" src="<?php echo base_url('template/'); ?>superadmin/assets/js/custom.js"></script>

   </head>
   <script type="text/javascript">
        var  BASEURL = "<?php echo base_url(EMPLOYER_URL); ?>"; 
        $(document).ready(function() {
   });
    </script>
    <?php
$this->login_data = $this->session->userdata('EmployerLoginDetails');
$this->employer_row_id = $this->login_data['Id'];
$user_info = getEmployeeInfo($this->employer_row_id,'hs_users_employer','profile_img');
$user_profile = (!empty($user_info->profile_img) ? base_url().'/uploads/employer/users/'.$user_info->profile_img : base_url().'uploads/employer/users/default_img.jpg');
?>
   <body class="font-montserrat">
      <div class="page-loader-wrapper">
         <div class="loader"></div>
      </div>
      <div id="main_content">
         <div id="header_top" class="header_top">
            <div class="container">
              
               <div class="hright">
                  <!-- <div class="dropdown">
                    
                     <a href="javascript:void(0)" class="nav-link user_btn"><img class="avatar" src="<?php echo base_url('template/'); ?>employer/assets/images/user.png" alt="" data-toggle="tooltip" data-placement="right" title="User Menu" /></a>
                     <a href="javascript:void(0)" class="nav-link icon menu_toggle"><i class="fa  fa-align-left"></i></a>
                  </div> -->
                  <div class="dropdown">
                    
                     <img class="avatar" src="<?php echo $user_profile; ?>" alt="" data-toggle="tooltip" data-placement="right" title="" style="width: 4rem; height: 4rem;" />
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
                     <img class="avatar avatar-xl mr-3" src="<?php echo base_url('template/'); ?>employer/assets/images/sm/avatar1.jpg" alt="avatar">
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