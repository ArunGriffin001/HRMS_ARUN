<!doctype html>
<html  lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Hrms</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" type="image/x-icon" href="http://115.166.142.78/hrms-live/template/web/assets/img/favicon.png">
		<link rel="stylesheet" href="<?php echo base_url('template/'); ?>/web/assets/css/font.css">
		 <link rel="stylesheet" href="<?php echo base_url('template/'); ?>employer/assets/plugins/bootstrap/css/bootstrap.min.css" />
        <link rel="manifest" href="site.webmanifest">
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    	<link rel="stylesheet" href="<?php echo base_url('template/'); ?>employer/assets/css/parsley.css" />
    	<script type="text/javascript" src="<?php echo base_url('template/'); ?>/employer/assets/js/jquery.js"></script>
    </head>

    <style>
 

* {
	box-sizing: border-box;
}

body {
	background: #f6f5f7;
	display: flex;
	justify-content: center;
	align-items: center;
	flex-direction: column;
	font-family: "Circular Std Book";
	height: 100vh;
	margin: -20px 0 50px;
}

h1 {
	font-weight: bold;
	margin: 0;
}

h2 {
	text-align: center;
}

p {
	font-size: 18px;
	font-weight: 100;
	line-height: 20px;
	letter-spacing: 0.5px;
	margin: 20px 0 30px;
	font-family: "Circular Std Book";
}

span {
	font-size: 12px;
}

a {
	color: #333;
	font-size: 16px;
	text-decoration: none;
	margin: 15px 0;
	font-family: "Circular Std Book";
}

button, a.signup {
	border-radius: 20px;
	border: 1px solid #0e367c;
	background-color: #0e367c;
	color: #FFFFFF;
	font-size: 14px;
	font-weight: bold;
	padding: 12px 45px;
	letter-spacing: 1px;
	text-transform: uppercase;
	transition: transform 80ms ease-in;
	font-family: "Circular Std Book";
}

button:active, a.signup:active {
	transform: scale(0.95);
}

button:focus, a.signup:focus {
	outline: none;
}

button.ghost, a.ghost {
	background-color: transparent;
	border-color: #FFFFFF;
}

form {
	background-color: #FFFFFF;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	padding: 0 50px;
	height: 100%;
	text-align: center;
}

input {
	background-color: #eee;
	border: none;
	padding: 12px 15px;
	margin: 8px 0;
	width: 100%;
	font-size:16px;
	font-family: "Circular Std Book";
}

.container {
	background-color: #fff;
	border-radius: 10px;
  	box-shadow: 0 14px 28px rgba(0,0,0,0.25), 
			0 10px 10px rgba(0,0,0,0.22);
	position: relative;
	overflow: hidden;
	width: 768px;
	max-width: 100%;
	min-height: 480px;
}

.form-container {
	position: absolute;
	top: 0;
	height: 100%;
	transition: all 0.6s ease-in-out;
}

.sign-in-container {
	left: 0;
	width: 50%;
	z-index: 2;
}

.container.right-panel-active .sign-in-container {
	transform: translateX(100%);
}

.sign-up-container {
	left: 0;
	width: 50%;
	opacity: 0;
	z-index: 1;
}

.container.right-panel-active .sign-up-container {
	transform: translateX(100%);
	opacity: 1;
	z-index: 5;
	animation: show 0.6s;
}

@keyframes show {
	0%, 49.99% {
		opacity: 0;
		z-index: 1;
	}
	
	50%, 100% {
		opacity: 1;
		z-index: 5;
	}
}

.overlay-container {
	position: absolute;
	top: 0;
	left: 50%;
	width: 50%;
	height: 100%;
	overflow: hidden;
	transition: transform 0.6s ease-in-out;
	z-index: 100;
}

.container.right-panel-active .overlay-container{
	transform: translateX(-100%);
}

.overlay {
	background: #0e367c;
	background: -webkit-linear-gradient(to right, #0e367c, #0e367c);
	background: linear-gradient(to right, #0e367c, #0e367c);
	background-repeat: no-repeat;
	background-size: cover;
	background-position: 0 0;
	color: #FFFFFF;
	position: relative;
	left: -100%;
	height: 100%;
	width: 200%;
  	transform: translateX(0);
	transition: transform 0.6s ease-in-out;
}

.container.right-panel-active .overlay {
  	transform: translateX(50%);
}

.overlay-panel {
	position: absolute;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	padding: 0 40px;
	text-align: center;
	top: 0;
	height: 100%;
	width: 50%;
	transform: translateX(0);
	transition: transform 0.6s ease-in-out;
}

.overlay-left {
	transform: translateX(-20%);
}

.container.right-panel-active .overlay-left {
	transform: translateX(0);
}

.overlay-right {
	right: 0;
	transform: translateX(0);
}

.container.right-panel-active .overlay-right {
	transform: translateX(20%);
}

.social-container {
	margin: 20px 0;
}

.social-container a {
	border: 1px solid #DDDDDD;
	border-radius: 50%;
	display: inline-flex;
	justify-content: center;
	align-items: center;
	margin: 0 5px;
	height: 40px;
	width: 40px;
}

footer {
    background-color: #222;
    color: #fff;
    font-size: 14px;
    bottom: 0;
    position: fixed;
    left: 0;
    right: 0;
    text-align: center;
    z-index: 999;
}

footer p {
    margin: 10px 0;
}

footer i {
    color: red;
}

footer a {
    color: #3c97bf;
    text-decoration: none;
}

.login_form ul {
	align-items: inherit;
}
    </style>
    <body>

        <div class="container" id="container">
        	
           <!--  <div class="form-container sign-up-container">
                <form action="#">

                    <h1>Create Account</h1>
                    <span>or use your email for registration</span>
                    <input type="text" placeholder="Name" />
                    <input type="email" placeholder="Email" />
                    <input type="password" placeholder="Password" />
                    <button>Sign Up</button>
                </form>
            </div> -->
            <div class="form-container sign-in-container">
            	
                <form action="<?php echo base_url('website/login_submit'); ?>" method="post" data-parsley-validate="" class="login_form" >

                	<div class="text-center mb-4">
		                <a class="logo-img text" href="<?php echo base_url(); ?>"><img src="<?php echo base_url('template/'); ?>/web/assets/img/logo/Griffin-logo-22.png" alt="" width="200" style="margin-bottom:40px"></a>
		            </div>
                    <h1 style="margin-bottom:20px">Sign in</h1>

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
                    <input type="email" placeholder="Email" name="email" required="" />
                    <input type="password" placeholder="Password" name="password" required="" />
                    <a href="#">Forgot your password?</a>
                    <button>Sign In</button>
                </form>
            </div>
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-left">
                        <h1>Welcome Back!</h1>
                        <p>To keep connected with us please login with your personal info</p>
                        <button class="ghost" id="signIn">Sign In</button>
                    </div>
                    <div class="overlay-panel overlay-right">
                        <!-- <h1>Hello, Friend!</h1> -->
                        <!-- <div class="text-center mb-4">
			                <a class="logo-img text" href="<?php echo base_url(); ?>"><img src="http://115.166.142.78/hrms-live/template/web/assets/img/logo/Griffin-logo-22.png" alt="" width="200"></a>
			            </div> -->
                        <p>You don't have an account?Sign up here</p>

                        <!-- <button class="ghost" id="signUp">Sign Up</button> -->
                        <a href="<?php echo base_url('signup'); ?>" class="ghost signup" id="signUp">Sign Up</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<script src="<?php echo base_url('template/'); ?>employer/assets/js/parsley.js" ></script>
<script src="<?php echo base_url('template/'); ?>employer/assets/js/parsley.min.js" ></script>

