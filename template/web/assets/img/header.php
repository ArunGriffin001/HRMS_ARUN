<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $title; ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.html"> -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('template/'); ?>web/assets/img/favicon.png">
    <!-- Place favicon.png in the root directory -->

    <!-- CSS here -->

    <link rel="stylesheet" href="<?php echo base_url('template/web/assets/css/bootstrap.min.css'); ?> ">
    <link rel="stylesheet" href="<?php echo base_url('template/'); ?>web/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url('template/'); ?>web/assets/css/animate.css">
    <link rel="stylesheet" href="<?php echo base_url('template/'); ?>web/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo base_url('template/'); ?>web/assets/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url('template/'); ?>web/assets/css/flaticon.css">
    <link rel="stylesheet" href="<?php echo base_url('template/'); ?>web/assets/css/font.css">
    <link rel="stylesheet" href="<?php echo base_url('template/'); ?>web/assets/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo base_url('template/'); ?>web/assets/css/metisMenu.css">
    <link rel="stylesheet" href="<?php echo base_url('template/'); ?>web/assets/css/nice-select.css">
    <link rel="stylesheet" href="<?php echo base_url('template/'); ?>web/assets/css/slick.css">
    <link rel="stylesheet" href="<?php echo base_url('template/'); ?>web/assets/css/main.css">
</head>

<body>
    <div id="preloader">
        <div class="preloader">
            <span></span>
            <span></span>
        </div>
    </div>

<header>
    <div class="main-header-area main-header-02 main-header-06 header-06-bg pt-20 pb-10">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-6 col-6">
                    <div class="logo">
                        <a class="logo-img" href="<?php echo base_url('');?>"><img src="<?php echo base_url('template/'); ?>web/assets/img/logo/Griffin-logo-22.png"
                                alt=""></a>
                        <a class="logo-img sticky-logo d-none" href="<?php base_url(); ?>"><img src="<?php echo base_url('template/'); ?>web/assets/img/logo/Griffin-logo-22.png"
                                alt=""></a>
                    </div>
                </div>
                <div class="col-xxl-7 col-xl-7 col-lg-7 d-none d-lg-block">
                    <div class="main-menu main-menu-02 main-menu-06 d-none d-lg-block text-lg-end ml-45">
                        <nav>
                            <ul>
                                <li><a class="active" href="<?php echo base_url(); ?>">Home</a>
                                </li>
                                
                                <li><a href="#">About <i class="far fa-chevron-down"></i></a>
                                    <ul class="submenu">
                                        <li><a href="<?php echo base_url('/about'); ?>">About Organisation</a></li>
                                        <li><a href="<?php echo base_url('blog-strandard'); ?>">Blog</a></li>
                                    </ul>
                                </li>
                                <li>
                                 <a href="#">Products <i class="far fa-chevron-down"></i></a>  
                                    <ul class="submenu submenu-wd">
                                        <div class="row">
                                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-6 col-md-6">
                                                <li>
                                                    <a href="<?php echo base_url('payroll-management'); ?>"><img class="list_icon" src="<?php echo base_url('template/'); ?>web/assets/img/logo/payroll.png"> Payroll Management</a>
                                                    <p>Automate and pay employees on time and stay compliant</p>
                                                </li>
                                                <li><a href="<?php echo base_url('compliance-management'); ?>"><img class="list_icon" src="<?php echo base_url('template/'); ?>web/assets/img/logo/compliance.png"> Compliance Management</a>
                                                    <p>Just run the payroll. Compliance is built-in and automatic!</p>
                                                </li>
                                                <li><a href="<?php echo base_url('employee-management'); ?>"><img class="list_icon" src="<?php echo base_url('template/'); ?>web/assets/img/logo/employee-m.png"> Employee Management</a>
                                                    <p>Employee expense management made easy</p>
                                                </li>
                                                <!-- <li><a href="<?php echo base_url('advance-management'); ?>"><img class="list_icon" src="<?php echo base_url('template/'); ?>web/assets/img/logo/advanced.png"> Advance Management</a>
                                                    <p>Create a great candidate exprience before and after joining</p>
                                                </li> -->
                                            </div>
                                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-6 col-md-6">
                                                <li><a href="<?php echo base_url('recruitment-management'); ?>"><img class="list_icon" src="<?php echo base_url('template/'); ?>web/assets/img/logo/recruitment.png"> Recruitment Management</a>
                                                    <p>All your favourite tools playing well with your HR platform</p>
                                                </li>
                                                <li><a href="<?php echo base_url('performance-management'); ?>"><img class="list_icon" src="<?php echo base_url('template/'); ?>web/assets/img/logo/performance.png"> Performance Management</a>
                                                    <p>Customizable workflow for tracking time and usag</p>
                                                </li>
                                                <li><a href="<?php echo base_url('learning-management'); ?>"><img class="list_icon" src="<?php echo base_url('template/'); ?>web/assets/img/logo/learning.png">Learning & development <br><b style="margin-left:23px;font-weight:200">Management</b></a>
                                                <p style="padding-top:12px">Customizable workflow for tracking time and usag.</p></li>
                                              
                                            </div>
                                        </div>
                                    </ul>
                                </li>
                                <li><a href="<?php echo base_url('pricing'); ?>">Plan</a></li>

                                <li><a href="#">Customer <i class="far fa-chevron-down"></i></a>
                                   <ul class="submenu">
                                    <li><a href="<?php echo base_url('customer-service'); ?>">Customer Experience</a></li>
                                    <!-- <li><a href="<?php echo base_url('testimonial'); ?>">Testimonials</a></li> -->
                                    <li><a href="<?php echo base_url('help-desk'); ?>">Employee Helpdesk
                                    </a></li>
                                    <!-- <li><a href="<?php echo base_url('team-details'); ?>">Team Details</a></li> -->
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-2 col-lg-3 col-md-6 col-6 text-end">
                    <ul class="right-nav right_nav_03 d-flex justify-content-end">
                        <li>
                            <div class="hamburger-menu d-md-block d-lg-none">
                                <a href="javascript:void(0);">
                                    <i class="far fa-bars"></i>
                                </a>
                            </div>
                        </li>
                        <li class="mr-10 d-none d-lg-inline-block">
                            <a href="javasript:void(0)" class="theme_btn theme_btn_bg theme-border-btn border-02">Log In <i class="fas fa-chevron-right"></i></a>
                        </li>
                        <li class="d-none d-xxl-inline-block">
                            <a href="<?php echo base_url('signup'); ?>" class="theme_btn theme_btn_bg">Sign Up<i class="fas fa-chevron-right"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
 <!-- slide-bar start -->
<aside class="slide-bar">
    <div class="close-mobile-menu">
        <a href="javascript:void(0);"><i class="fas fa-times"></i></a>
    </div>
    <!-- side-mobile-menu start -->
    <nav class="side-mobile-menu">
        <ul id="mobile-menu-active">
            <li>
                <a href="<?php base_url(); ?>">Home</a>
            </li>
            <li class="has-dropdown">
                <a href="#">about</a>
                <ul class="sub-menu">
                  <li><a href="<?php echo base_url('about'); ?>">About Organisation</a></li>
                  <li><a href="<?php echo base_url('blog-strandard'); ?>">Blog</a></li>
                </ul>
            </li>
            <li class="has-dropdown">
                <a href="#">Products</a>
                <ul class="sub-menu">
                    <li><a href="<?php echo base_url('payroll-management'); ?>">Payroll Management</a></li>
                    <li><a href="<?php echo base_url('compliance-management'); ?>">Compliance Management</a></li>
                    <li><a href="<?php echo base_url('employee-management'); ?>">Employee Management</a></li>
                    <li><a href="<?php echo base_url('recruitment-management'); ?>">Recruitment Management</a></li>
                    <li><a href="<?php echo base_url('performance-management'); ?>">Performance Management</a></li>
                    <li><a href="<?php echo base_url('learning-management'); ?>">LMS - Knowledge/Training/Learning Management</a></li>
                    <li><a href="<?php echo base_url('team-details'); ?>">Advance Management</a></li>
                </ul>
            </li>
            <li><a href="<?php echo base_url('pricing'); ?>">Plan</a></li>
            <li class="has-dropdown">
                <a href="#">Customer</a>
                <ul class="submenu">
                    <li><a href="javascript:void(0)">Customer Experience</a></li>
                    <li><a href="javascript:void(0)">Testimonials</a></li>
                    <li><a href="javascript:void(0)">Employee Helpdesk
                    </a></li>
                    <li><a href="javascript:void(0)">Team Details</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <!-- side-mobile-menu end -->
</aside>
<div class="body-overlay"></div>
    <!-- slide-bar end -->