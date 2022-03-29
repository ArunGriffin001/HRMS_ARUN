<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <title>Hrms</title>
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="manifest" href="site.webmanifest" />
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>

        <!-- Parsle css -->
        <link rel="stylesheet" href="http://115.166.142.78/hrms-dev/template/superadmin/assets/css/parsley.css" />
        <!-- Add parsle js -->
        <script type="text/javascript" src="http://115.166.142.78/hrms-dev/template/superadmin/assets/js/parsley.min.js"></script>
        <script type="text/javascript" src="http://115.166.142.78/hrms-dev/template/superadmin/assets/js/parsley.js"></script>
    </head>
    <style>
.tab {
    display: none
}



button:hover {
    opacity: 0.8
}

#prevBtn {
    background-color: #bbbbbb;
    display:none !important;
}

.step {
    height: 15px;
    width: 15px;
    margin: 0 2px;
    background-color: #bbbbbb;
    border: none;
    border-radius: 50%;
    display: inline-block;
    opacity: 0.5;
    display: none;
}

.step.active {
    opacity: 1
}

.step.finish {
    background-color: #0e367c
}

.all-steps {
    text-align: center;
    margin-top: 30px;
    margin-bottom: 30px
}

.sign-up-section {
    position: relative;
    padding: 50px 0px;
}

.auto-container {
    position: static;
    max-width: 1200px;
    padding: 0px 15px;
    margin: 0 auto;
}

.sign-up-form {
    position: relative;
    box-shadow: 0 22px 80px rgb(0 0 0 / 19%);
}

.sign-up-form .form-column {
    position: relative;
}

.sign-up-form .image-column {
    position: relative;
}

.sign-up-form .image-column .image-box {
    position: relative;
}

.sign-up-form .image-column .image {
    position: relative;
    margin-bottom: 0;
}

figure {
    margin: 0 0 1rem;
}

.sign-up-form .image-column .image img {
    width: 100%;
    height: auto;
}

.sign-up-form .form-column .inner-column {
    position: relative;
    margin-left: -30px;
    padding: 35px 70px 40px;
}

.sign-up-form .title-box {
    position: relative;
    margin-bottom: 50px;
}

.sign-up-form .title-box h3 {
    position: relative;
    display: block;
    font-size: 25px;
    line-height: 1.2em;
    color: #12114a;
    font-weight: 700;
}



.sign-up-form .form-group {
    position: relative;
    margin-bottom: 30px;
}

.sign-up-form .form-group input[type="text"], .sign-up-form .form-group input[type="password"], .sign-up-form .form-group input[type="tel"], .sign-up-form .form-group input[type="email"] {
    position: relative;
    display: block;
    width: 100%;
    line-height: 20px;
    padding: 14px 45px;
    height: 50px;
    color: #222222;
    font-size: 14px;
    border-radius: 5px;
    border: 1px solid #cccccc;
    -webkit-transition: all 300ms ease;
    -ms-transition: all 300ms ease;
    -o-transition: all 300ms ease;
    -moz-transition: all 300ms ease;
    transition: all 300ms ease;
}



.sign-up-form .form-group {
    position: relative;
    margin-bottom: 30px;
}

#nextBtn {
    display: block;
    width: 100%;
}

#nextBtn {
    position: relative;
    font-size: 16px;
    color: #ffffff;
    line-height: 20px;
    font-weight: 500;
    padding: 15px 40px 15px;
    background-color: #0e367c;
    border-radius: 8px;
    border: 0;
}

input.invalid {
    background-color: #ff000036 !important;
}

    </style>
    <body>
        <section class="sign-up-section">
            <div class="auto-container">
                <div class="sign-up-form">
                    <div class="row clearfix">
                        <div class="form-column order-12 col-lg-6 col-md-12 col-sm-12">
                            <div class="inner-column">
                                
                                <form id="regForm">
                                 <div class="all-steps" id="all-steps"> <span class="step"></span>  <span class="step"></span>  </div>
                                 <div class="title-box"  id="register">
                                    <h3>Get free trial</h3>
                                </div>
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
                                 <div class="tab">
                                    <div class="form-group">
                                        <input type="text" placeholder="First name..." name="first_name" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" placeholder="Last name..."  name="last_name"  autocomplete="off" required="">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" placeholder="Email..." name="email" autocomplete="off" >
                                    </div>
                                    <div class="form-group">
                                        <input type="text" placeholder="Phone..." name="phone_number"  autocomplete="off" >
                                    </div>
                                       
                                 </div>
                                 <div class="tab">
                                    <div class="form-group">
                                       <input type="text" placeholder="Company name"  name="company_name" >
                                    </div>
                                    <div class="form-group">
                                        <input type="text" placeholder="Company headcount" name="team_member" value="" >
                                    </div>     
                                </div>
                                
                                <div class="thanks-message text-center" id="text-message"> <img src="https://i.imgur.com/O18mJ1K.png" width="100" class="mb-4">
                                    <h3>Thanks for your information!</h3> <span>Your information has been saved! we will contact you shortly!</span>
                                </div>
                                
                                     <div class="form-group btn-box" style="overflow:auto;" id="nextprevious">
                                        <div>
                                             <button type="button"  class="theme-btn btn-style-three" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                                            <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button> </div>
                                    <!-- <button class="theme-btn btn-style-three" type="submit" name="submit-form">Sing In</button> -->
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="image-column col-lg-6 col-sm-12 col-sm-12">
                            <div class="image-box wow fadeIn animated" style="visibility: visible; animation-name: fadeIn;">
                                <figure class="image"><img src="<?php echo base_url('template/'); ?>/web/assets/img/sign-up.jpg" alt="" /></figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
    <script>
        var currentTab = 0;
        document.addEventListener("DOMContentLoaded", function (event) {
            showTab(currentTab);
        });

        function showTab(n) {
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
                document.getElementById("text-message").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == x.length - 1) {
                document.getElementById("nextBtn").innerHTML = "Submit";
            } else {
                document.getElementById("nextBtn").innerHTML = "Next";
            }
            fixStepIndicator(n);
        }

        function nextPrev(n) {
            var x = document.getElementsByClassName("tab");
            if (n == 1 && !validateForm()) return false;
            x[currentTab].style.display = "none";
            currentTab = currentTab + n;
            if (currentTab >= x.length) {
                // document.getElementById("regForm").submit();
                // return false;
                //alert("sdf");
                document.getElementById("nextprevious").style.display = "none";
                document.getElementById("all-steps").style.display = "none";
                document.getElementById("register").style.display = "none";
                document.getElementById("text-message").style.display = "block";
            }
            showTab(currentTab);
        }

        function validateForm() {
            var x,
                y,
                i,
                valid = true;
            x = document.getElementsByClassName("tab");
            y = x[currentTab].getElementsByTagName("input");
            for (i = 0; i < y.length; i++) {
                if (y[i].value == "") {
                    y[i].className += " invalid";
                    valid = false;
                }
            }
            if (valid) {
                document.getElementsByClassName("step")[currentTab].className += " finish";
            }
            return valid;
        }
        function fixStepIndicator(n) {
            var i,
                x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            x[n].className += " active";
        }
    </script>
</html>