<!doctype html>
<html  lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Hrms</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <link rel="manifest" href="site.webmanifest">
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('template/'); ?>web/assets/img/favicon.png">
        <link rel="stylesheet" href="<?php echo base_url('template/'); ?>web/assets/css/font.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <!-- Parsle css -->
       <link rel="stylesheet" href="<?php echo base_url(); ?>/template/superadmin/assets/css/parsley.css" />
       <!-- Add parsle js -->
      <script type="text/javascript" src="<?php echo base_url(); ?>/template/superadmin/assets/js/parsley.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url(); ?>/template/superadmin/assets/js/parsley.js"></script>
    
    </head>


    <style>
body {
    background: #eee
}

#regForm {
    background-color: #ffffff;
    margin: 0px auto;
    padding: 40px;
    border-radius: 10px
}

h1 {
    text-align: center
}

input {
    padding: 10px;
    width: 100%;
    font-size: 17px;
    font-family: Raleway;
    border: 1px solid #aaaaaa
}

input.invalid {
    background-color: #ffdddd
}

.tab {
    display: none
}

button {
    background-color: #0e367c;
    color: #ffffff;
    border: none;
    padding: 10px 20px;
    font-size: 17px;
    cursor: pointer
}

button:hover {
    opacity: 0.8
}

#prevBtn {
    background-color: #bbbbbb
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
    display:none;
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

.thanks-message {
    display: none
}

    </style>
    <body>
      <div class="container mt-5">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-6">
                <form id="regForm" method="post" action="<?php echo base_url('addEmployer'); ?>" data-parsley-validate="">
                    <div class="text-center mb-4">
                        <a class="logo-img text" href="<?php echo base_url(); ?>"><img src="<?php echo base_url('template/'); ?>web/assets/img/logo/Griffin-logo-22.png" alt="" width="200"></a>
                    </div>
                    <h1 id="register">Get free trial</h1>

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
                    <div class="all-steps" id="all-steps"> <span class="step"></span> <span class="step"></span>  </div>
                    <div class="tab">
                        <p><input type="text" placeholder="First name..."  name="first_name" required="" autocomplete="off"></p>
                        <p><input type="text" placeholder="Last name..."  name="last_name" required="" autocomplete="off" ></p>
                        <p><input type="email" placeholder="Email..." name="email" required="" autocomplete="off" ></p>
                        <p><input type="text" placeholder="Phone..." name="phone_number" required="" autocomplete="off" ></p>
                    </div>
                    <div class="tab">
                        <p><input placeholder="Company name"  name="company_name" ></p>
                        <p><input placeholder="Company headcount" name="team_member" value="" required=""></p>
                       
                    </div>
                    
               
                    <!-- <div class="thanks-message text-center" id="text-message"> <img src="https://i.imgur.com/O18mJ1K.png" width="100" class="mb-4">
                        <h3>Thanks for your information!</h3> <span>Your information has been saved! we will contact you shortly!</span>
                    </div> -->
                    <div style="overflow:auto;" id="nextprevious">
                        <div style="float:right;"> <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button> <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button> </div>
                    </div>
                    <!-- <div class="mt-4 text-center" id="login-btn">
                       <p>Already have an account?
<a class="font-weight-bold" href="<?php echo base_url('sign-in'); ?>"> Login here </a></p> 
                    </div> -->
                </form>
            </div>

        </div>
    </div>
    </body>
    <script>

var currentTab = 0;
document.addEventListener("DOMContentLoaded", function(event) {


showTab(currentTab);

});

function showTab(n) {
var x = document.getElementsByClassName("tab");
x[n].style.display = "block";
if (n == 0) {
document.getElementById("prevBtn").style.display = "none";
} else {
document.getElementById("prevBtn").style.display = "inline";
}
if (n == (x.length - 1)) {
document.getElementById("nextBtn").innerHTML = "<button class='' style='padding:0px 10px' type='submit'>Submit</button>";
} else {
document.getElementById("nextBtn").innerHTML = "Next";
}
fixStepIndicator(n)
}

function nextPrev(n) {
var x = document.getElementsByClassName("tab");
if (n == 1 && !validateForm()) return false;
x[currentTab].style.display = "none";
currentTab = currentTab + n;
if (currentTab >= x.length) {
 document.getElementById("regForm").submit();
// return false;
//alert("sdf");
document.getElementById("nextprevious").style.display = "none";
document.getElementById("all-steps").style.display = "none";
document.getElementById("register").style.display = "none";
document.getElementById("text-message").style.display = "none";




}
showTab(currentTab);
}

function validateForm() {
var x, y, i, valid = true;
x = document.getElementsByClassName("tab");
y = x[currentTab].getElementsByTagName("input");
for (i = 0; i < y.length; i++) { if (y[i].value=="" ) { y[i].className +=" invalid" ; valid=false; } } if (valid) { document.getElementsByClassName("step")[currentTab].className +=" finish" ; } return valid; } function fixStepIndicator(n) { var i, x=document.getElementsByClassName("step"); for (i=0; i < x.length; i++) { x[i].className=x[i].className.replace(" active", "" ); } x[n].className +=" active" ; }
</script>

</html>

