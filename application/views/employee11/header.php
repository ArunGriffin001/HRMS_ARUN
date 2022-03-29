<!doctype html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link rel="icon" href="<?php echo base_url('template/'); ?>employee/assets/images/favicon.png"  />
      <title><?php echo (!empty($header_title) ? $header_title : ''); ?></title>
      <link rel="stylesheet" href="<?php echo base_url('template/'); ?>employee/assets/plugins/bootstrap/css/bootstrap.min.css" />

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

      <!-- Datatable css  -->
      <link rel="stylesheet" href="<?php echo base_url('template/'); ?>employer/assets/css/dataTables.min.css" />
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url('template'); ?>/superadmin/assets/js/sweetalert.min.js"></script>
      <script src="<?php echo base_url('template/'); ?>employer/assets/js/jquery.dataTables.min.js" ></script>

      <script type="text/javascript">
        var  BASEURL = "<?php echo base_url(EMPLOYEE_URL); ?>"; 
      </script>
      
   </head>
<style>
#tawkchat-minified-wrapper {
   display: none !important;
}

</style>

<body class="font-montserrat">
   <div class="page-loader-wrapper">
      <div class="loader"></div>
   </div>
   <div id="main_content">
      <div id="header_top" class="header_top">
         <div class="container">
            <div class="hright">
               <div class="dropdown">
                  <a href="javascript:void(0)" class="nav-link user_btn"><img class="avatar" src="<?php echo base_url('template/'); ?>employee/assets/images/user.png" alt="" data-toggle="tooltip" data-placement="right" title="User Menu" /></a>
                  <a href="javascript:void(0)" class="nav-link icon menu_toggle"><i class="fa  fa-align-left"></i></a>
               </div>
            </div>
         </div>
      </div>