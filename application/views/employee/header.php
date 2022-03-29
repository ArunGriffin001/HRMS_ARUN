<!doctype html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link rel="icon" href="<?php echo base_url('template/'); ?>employee/assets/images/favicon.png"  />
      <title><?php echo (!empty($header_title) ? $header_title : ''); ?></title>
      <!-- <link rel="stylesheet" href="<?php echo base_url('template/'); ?>employee/assets/plugins/bootstrap/css/bootstrap.min.css" />

       <link rel="stylesheet" href="<?php echo base_url('template/'); ?>employee/assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css">

      <link rel="stylesheet" href="<?php echo base_url('template/'); ?>employee/assets/plugins/sweetalert/sweetalert.css">
      <link rel="stylesheet" href="<?php echo base_url('template/'); ?>employee/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">
      <link rel="stylesheet" href="<?php echo base_url('template/'); ?>employee/assets/plugins/dropify/css/dropify.min.css">

      <link rel="stylesheet" href="<?php echo base_url('template/'); ?>employee/assets/plugins/summernote/dist/summernote.css" />
      <link rel="stylesheet" href="<?php echo base_url('template/'); ?>employee/assets/plugins/fullcalendar/fullcalendar.min.css">
      <link rel="stylesheet" href="<?php echo base_url('template/'); ?>employee/assets/plugins/charts-c3/c3.min.css" />
      <link rel="stylesheet" href="<?php echo base_url('template/'); ?>employee/assets/css/main.css" />
      <link rel="stylesheet" href="<?php echo base_url('template/'); ?>employee/assets/css/theme2.css" />
      <link rel="stylesheet" href="<?php echo base_url('template/'); ?>employee/assets/plugins/charts-c3/c3.min.css" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    
      <link rel="stylesheet" href="<?php echo base_url('template/'); ?>employer/assets/css/parsley.css" />
      
      <link rel="stylesheet" href="<?php echo base_url('template/'); ?>employer/assets/css/dataTables.min.css" />
      
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script src="<?php echo base_url('template/'); ?>employer/assets/js/jquery.dataTables.min.js" ></script>
     
      <script src="<?php echo base_url('template/'); ?>employer/assets/bundles/fullcalendar.bundle.js" type="text/javascript"></script>
      <script type="text/javascript" src="<?php echo base_url('template'); ?>/superadmin/assets/js/sweetalert.min.js"></script>
       <script src="<?php echo base_url('template/'); ?>employer/assets/bundles/lib.vendor.bundle.js" type="text/javascript"></script> -->


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

      <script type="text/javascript">
        var  BASEURL = "<?php echo base_url(EMPLOYEE_URL); ?>"; 
      </script>
      
   </head>
<style>
#tawkchat-minified-wrapper {
   display: none !important;
}

</style>
<?php
$this->login_data = $this->session->userdata('EmployeeLogin');
$user_info = getEmployeeInfo($this->login_data['userId'],'hs_users_employer','profile_img');
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
               <div class="dropdown 9999">
                  <img class="avatar" src="<?php echo $user_profile; ?>" alt="" data-toggle="tooltip" data-placement="right" title=""  style="width: 4rem; height: 4rem;" />
                  <a href="javascript:void(0)" class="nav-link icon menu_toggle"><i class="fa  fa-align-left"></i></a>
               </div>
            </div>
         </div>
      </div>