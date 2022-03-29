<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <title>Hrms</title>
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="manifest" href="site.webmanifest" />
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('template/'); ?>/web/assets/img/favicon.png" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo base_url('template/'); ?>employer/assets/css/parsley.css" />
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
        <style>
.login-section {
    position: relative;
    padding: 50px 0px;
}

.auto-container {
    position: static;
    max-width: 1200px;
    padding: 0px 15px;
    margin: 0 auto;
     display: flex;
}

.login-form {
    position: relative;
    box-shadow: 0 22px 80px rgb(0 0 0 / 19%);
}

.login-form .form-column {
    position: relative;
}

.login-form .form-column .inner-column {
    position: relative;
    margin-right: -15px;
    padding: 100px 70px 130px;
}


.login-form .title-box {
    position: relative;
    margin-bottom: 30px;
}

.login-form .title-box h3 {
    position: relative;
    display: block;
    font-size: 40px;
    line-height: 1.2em;
    color: #0e367c;
    font-weight: 400;
    margin-bottom: 20px;
}

.login-form .title-box .text {
    position: relative;
    display: block;
    font-size: 18px;
    line-height: 24px;
    color: #707070;
    font-weight: 400;
}

.login-form .form-group input[type="text"], .login-form .form-group input[type="password"], .login-form .form-group input[type="tel"], .login-form .form-group input[type="email"] {
    position: relative;
    display: block;
    width: 100%;
    line-height: 23px;
    padding: 20px 45px;
    height: 65px;
    color: #707070;
    font-size: 14px;
    border-radius: 10px;
    border: 1px solid #cccccc;
    -webkit-transition: all 300ms ease;
    -ms-transition: all 300ms ease;
    -o-transition: all 300ms ease;
    -moz-transition: all 300ms ease;
    transition: all 300ms ease;
}

.login-form .check-box {
    position: relative;
    display: block;
    margin-top: 30px;
    margin-bottom: 20px;
}

.login-form .form-group label {
    font-size: 14px;
    color: #707070;
}


.login-form .form-group {
    position: relative;
    margin-bottom: 15px;
}


.login-form .btn-box .theme-btn {
    margin-right: 20px;
    font-weight: 400;
    text-transform: uppercase;
    min-width: 160px;
    text-align: center;
    border-radius: 10px;
}


.btn-style-three {
    position: relative;
    font-size: 16px;
    color: #ffffff;
    line-height: 20px;
    font-weight: 500;
    padding: 15px 40px 15px;
    background-color: #ffc557;
    border-radius: 8px;
    border: 0;
}



element.style {
}
.login-form .btn-box .theme-btn {
    margin-right: 20px;
    font-weight: 400;
    text-transform: uppercase;
    min-width: 160px;
    text-align: center;
    border-radius: 10px;
}

.theme-btn {
    display: inline-block;
    -webkit-transition: all 0.3s ease;
    -moz-transition: all 0.3s ease;
    -ms-transition: all 0.3s ease;
    -o-transition: all 0.3s ease;
    transition: all 0.3s ease;
}

.login-form .btn-box .theme-btn:last-child {
    margin-right: 0;
}
.login-form .btn-box .theme-btn {
    margin-right: 20px;
    font-weight: 400;
    text-transform: uppercase;
    min-width: 160px;
    text-align: center;
    border-radius: 10px;
}

.btn-style-five {
    position: relative;
    font-size: 16px;
    color: #ffffff;
    line-height: 20px;
    font-weight: 500;
    padding: 15px 40px 15px;
    background-color: #0e367c;
}


.login-form .btn-box .theme-btn {
    margin-right: 20px;
    font-weight: 400;
    text-transform: uppercase;
    min-width: 160px;
    text-align: center;
    border-radius: 10px;
}


.login-form .btn-box .theme-btn:last-child {
    margin-right: 0;
}


.login-form .image-column {
    position: relative;
}


.login-form .image-column .image-box {
    position: relative;
    margin-right: -90px;
}

figure {
    margin: 0 0 1rem;
}

.login-form .image-column .image img {
    width: 100%;
    height: auto;
}

img {
    display: inline-block;
    max-width: 100%;
    height: auto;
}


.login-form .image-column .image {
    position: relative;
    margin-bottom: 0;
}

.clearfix::after {
    display: block;
    clear: both;
    content: "";
}


@media only screen and (max-width: 599px){
    .login-form .btn-box .theme-btn, .events-carousel .content-column h2, .banner-section-three .form-box .timer div {
    margin-bottom: 20px;
}
.login-form .form-column .inner-column {
    padding-bottom: 40px;
}
.login-form .btn-box .theme-btn {
    display: block;
    width: 100%;
}
}


@media only screen and (max-width: 1023px){
    .login-form .form-column .inner-column {
    padding: 70px 30px;
}

.login-form .image-column .image-box {
    margin-right: 0;
}
}
</style>
    <body>
        <section class="login-section">
            <div class="auto-container">
                <div class="login-form">
                    <div class="row clearfix">
                        <div class="form-column col-lg-6 col-md-12 col-sm-12">
                            <div class="inner-column">
                                <div class="title-box">
                                    <h3>We are Ngriffinpay</h3>
                                    <div class="text">
                                        Welcome Back, Please login <br />
                                        to your account
                                    </div>
                                </div>

                                 <form action="<?php echo base_url('website/login_submit'); ?>" method="post" data-parsley-validate="" class="login_form" >
                                    <?php
                                     if($this->session->flashdata('errorclass') !='')
                                     {
                                       $error_class = $this->session->flashdata('errorclass');
                                      
                                      echo'<div class="text-left alert alert-'.$error_class.'">';
                                      if(is_array($this->session->flashdata('error_message'))){
                                           foreach ($this->session->flashdata('error_message') as $error_message) {
                                           ?>
                                               <?php echo $error_message.'</br>'; ?>
                                       <?php
                                           }
                                       }else{
                                           echo $this->session->flashdata('error_message');
                                       }
                                       echo '</div>';
                                     }
                                   ?>
                                    <div class="form-group">
                                        <input type="email" placeholder="Email" name="email" required="" />
                                    </div>

                                    <div class="form-group">
                                       <input type="password" placeholder="Password" name="password" required="" />
                                    </div>
                                    <div class="form-group check-box">
                                        <input type="checkbox" name="shipping-option" id="account-option-1" />&nbsp;
                                        <label for="account-option-1">Remember Password</label>
                                    </div>
                                    <div class="form-group btn-box">
                                        <button class="theme-btn btn-style-three" type="submit" name="submit-form">Sign In</button>
                                        <a href="<?php echo base_url('signup'); ?>" class="theme-btn btn-style-five">Sign up</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="image-column col-lg-6 col-sm-12 col-sm-12">
                            <div class="image-box wow fadeIn animated" style="visibility: visible; animation-name: fadeIn;">
                                <figure class="image"><img src="<?php echo base_url('template/'); ?>/web/assets/img/login.jpg" alt="" /></figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>
<script src="<?php echo base_url('template/'); ?>employer/assets/js/parsley.js" ></script>
<script src="<?php echo base_url('template/'); ?>employer/assets/js/parsley.min.js" ></script>
