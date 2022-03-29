<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('template/'); ?>employer/assets/css/jquery-datetimepicker.css">
<link href=
'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css' rel='stylesheet'>
<script src=
"https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" >
</script>
<?php 
   $step =array();
   $step['one'] = '';
?>

<div class="header_btn">
   <div class="header-action">
      <a href="<?php echo base_url('employer/full-and-final-settlement/list'); ?>" class="btn btn-primary float-right"><i class="fa fa-plus mr-2"></i>Back</a>
   </div>
</div>
<div class="section-body  mt-3">
   <div class="container-fluid">
      <div class="row clearfix">
         <div class="col-12">
            <div class="card">
               <div class="card-body">
                  <section class="signup-step-container">
                     <div class="container">
                        <div class="row d-flex justify-content-center">
                           <div class="col-md-12">
                              <div class="wizard">
                                 <div class="wizard-inner">
                                    <div class="connecting-line"></div>
                                    <ul class="nav nav-tabs" role="tablist">
                                       <li role="presentation" class="active">
                                          <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" aria-expanded="true"><span class="round-tab">1 </span> <i>EMPLOYEE</i></a>
                                       </li>
                                       <li role="presentation" class="disabled">
                                          <a href="#step2" data-toggle="tab" aria-controls="step222" role="tab" aria-expanded="false"><span class="round-tab">2</span> <i>RESIGNATION DETAILS</i></a>
                                       </li>
                                       <li role="presentation" class="disabled">
                                          <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" aria-expanded="false"><span class="round-tab">3</span> <i>NOTICE PAY</i></a>
                                       </li>
                                       <li role="presentation" class="disabled">
                                          <a href="#step4" data-toggle="tab" aria-controls="step4" role="tab"><span class="round-tab">4</span> <i>WORK DAYS</i></a>
                                       </li>
                                       <li role="presentation" class="disabled">
                                          <a href="#step5" data-toggle="tab" aria-controls="step5" role="tab"><span class="round-tab">5</span> <i>LEAVE ENCASHMENT</i></a>
                                       </li>
                                       <li role="presentation" class="disabled">
                                          <a href="#step6" data-toggle="tab" aria-controls="step6" role="tab"><span class="round-tab">6</span> <i>REMARKS</i></a>
                                       </li>
                                    </ul>
                                 </div>
                                 <form role="form" action="index.html" class="login-box">
                                    <div class="tab-content" id="main_form">
                                       <div class="tab-pane active" role="tabpanel" id="step1">
                                          <h4 class="text-center">Step:1 Employee</h4>
                                          <div class="row">
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                   <label>Employee Name *<?php echo $step['one']; ?></label> 
                                                   <select class="form-control custom-select search_emp" name="employer_id">
                                                      <?php 
                                                      if(!empty($employee_list)){
                                                         foreach ($employee_list as $emp_val) {
                                                         ?>
                                                         <option value="<?php echo $emp_val->employee_id; ?>"><?php echo $emp_val->full_name.' (Department: '.$emp_val->dept_name.')'; ?></option>
                                                         <?php
                                                         }

                                                      }
                                                      ?>
                                                   </select>
                                                </div>
                                             </div>
                                          </div>
                                          <ul class="list-inline pull-right">
                                             <li><button type="button" class="default-btn next-step step_1">Continue to next step</button></li>
                                          </ul>
                                       </div>
                                       <div class="tab-pane" role="tabpanel" id="step2">
                                          <h4 class="text-center">Step:2 Regisnation Detail</h4>
                                          <div class="row">
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                   <label>Resignation Submitted On</label> 
                                                   <input class="form-control res_sub_date" type="text" value="" name="res_sub_date" placeholder="Select Date"> 
                                                </div>
                                             </div>
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                   <label>Leaving Date</label> 
                                                   <input class="form-control leaving_date" type="text" name="leaving_date" placeholder="Select Date"> 
                                                </div>
                                             </div>
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                   <label>Leaving Reason *</label>
                                                   <textarea class="form-control leaving_reason" name="leaving_reason" placeholder="Reason"></textarea> 
                                                   <!-- <select name="country" class="form-control" name="leaving_reason">
                                                      <option value="reason1">Reason 1</option>
                                                      <option value="reason2">Reason 2</option>
                                                      <option value="reason1">Norfolk Island</option>
                                                      <option value="KP">North Korea</option>
                                                      <option value="MP">Northern Mariana Islands</option>
                                                      <option value="NO">Norway</option>
                                                   </select> -->
                                                </div>
                                             </div>
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                   <label>Settlement Date.</label> 
                                                   <input class="form-control settlement_date" type="text" name="settlement_date" placeholder="Select Date"> 
                                                </div>
                                             </div>
                                          </div>
                                          <ul class="list-inline pull-right">
                                             <li><button type="button" class="default-btn prev-step back_step_1">Back</button></li>
                                             <!-- <li><button type="button" class="default-btn next-step skip-btn">Skip</button></li> -->
                                             <li><button type="button" class="default-btn next-step step_2">Continue</button></li>
                                          </ul>
                                       </div>
                                       <div class="tab-pane" role="tabpanel" id="step3">
                                          <h4 class="text-center">Step 3:Notice Pay</h4>
                                          <div class="row">
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                   <label>Notice Period</label> 
                                                   <input type="text" class="form-control notice_period" type="notice_period" name="notice_period" placeholder="">
                                                </div>
                                             </div>
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                   <label>No of Days Served *</label> 
                                                   <input class="form-control no_of_day_serve" type="text" name="no_of_day_serve" placeholder=""> 
                                                </div>
                                             </div>
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                   <label>Shortfall in Notice</label> 
                                                   <input class="form-control shortfall_notice" type="text" name="shortfall_notice" placeholder=""> 
                                                </div>
                                             </div>
                                          </div>
                                          <ul class="list-inline pull-right">
                                             <li><button type="button" class="default-btn prev-step back_step_2">Back</button></li>
                                             <!-- <li><button type="button" class="default-btn next-step skip-btn">Skip</button></li> -->
                                             <li><button type="button" class="default-btn next-step step_3">Continue</button></li>
                                          </ul>
                                       </div>
                                       <div class="tab-pane" role="tabpanel" id="step4">
                                          <h4 class="text-center">Step 3: work days</h4>
                                          <div class="row">
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                   <label>Payroll Month</label> 
                                                   <input class="form-control payroll_month" type="number" name="payroll_month" min="0" placeholder="Paroll month"> 
                                                </div>
                                             </div>
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                   <label>Work Days</label> 
                                                   <input class="form-control work_day" type="text" name="work_day" min="0" placeholder="Work days"> 
                                                </div>
                                             </div>
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                   <label>Days Worked</label> 
                                                   <input class="form-control days_work" type="text" name="days_work" placeholder="Days work"> 
                                                </div>
                                             </div>
                                          </div>
                                          <ul class="list-inline pull-right">
                                             <li><button type="button" class="default-btn prev-step back_step_3">Back</button></li>
                                             <!-- <li><button type="button" class="default-btn next-step skip-btn">Skip</button></li> -->
                                             <li><button type="button" class="default-btn next-step step_4">Continue</button></li>
                                          </ul>
                                       </div>
                                       <div class="tab-pane" role="tabpanel" id="step5">
                                          <h4 class="text-center">Step 5: Leave Encashment</h4>
                                          <div class="row">
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                   <label>Leave Type</label> 
                                                   <input class="form-control" type="text" name="name" placeholder=""> 
                                                </div>
                                             </div>
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                   <label>Balance</label> 
                                                   <input class="form-control" type="text" name="name" placeholder=""> 
                                                </div>
                                             </div>
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                   <label>Encashment</label> 
                                                   <input class="form-control" type="text" name="name" placeholder=""> 
                                                </div>
                                             </div>
                                             <!-- <div class="col-md-6">
                                                <div class="form-group">
                                                   <label>Number *</label> 
                                                   <input class="form-control" type="text" name="name" placeholder=""> 
                                                </div>
                                             </div>
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                   <label>Input Number</label> 
                                                   <input class="form-control" type="text" name="name" placeholder=""> 
                                                </div>
                                             </div> -->
                                          </div>
                                          <ul class="list-inline pull-right">
                                             <li><button type="button" class="default-btn prev-step back_step_4">Back</button></li>
                                            <!--  <li><button type="button" class="default-btn next-step skip-btn">Skip</button></li> -->
                                             <li><button type="button" class="default-btn next-step">Continue</button></li>
                                          </ul>
                                       </div>
                                       <div class="tab-pane" role="tabpanel" id="step6">
                                          <h4 class="text-center">Step 6</h4>
                                          <div class="row">
                                             <div class="col-md-12">
                                                <div class="form-group">
                                                   <label>Remarks</label> 
                                                   <textarea class="form-control"rows="5"></textarea>
                                                </div>
                                             </div>
                                          </div>
                                          <ul class="list-inline pull-right">
                                             <li><button type="button" class="default-btn prev-step">Back</button></li>
                                             <li><button type="button" class="default-btn next-step">Finish</button></li>
                                          </ul>
                                       </div>
                                       <div class="clearfix"></div>
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>
                  </section>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script>
   // ------------step-wizard-------------
   $(document).ready(function () {
    $('.nav-tabs > li a[title]').tooltip();
    
    //Wizard
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
   
        var target = $(e.target);
    
        if (target.parent().hasClass('disabled')) {
            return false;
        }
    });
   
    $(".next-step").click(function (e) {
   
        var active = $('.wizard .nav-tabs li.active');
        active.next().removeClass('disabled');
        nextTab(active);
   
    });
    $(".prev-step").click(function (e) {
   
        var active = $('.wizard .nav-tabs li.active');
        prevTab(active);
   
    });

    /* select 2 code  */ 
    $('.search_emp').select2();

   });
   
   function nextTab(elem) {
    $(elem).next().find('a[data-toggle="tab"]').click();
   }
   function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
   }
   
   
   $('.nav-tabs').on('click', 'li', function() {
    $('.nav-tabs li.active').removeClass('active');
    $(this).addClass('active');
   });
   
</script>
<style>
   i {
   margin-right: 10px;
   }
   /*------------------------*/
   input:focus,
   button:focus,
   .form-control:focus{
   outline: none;
   box-shadow: none;
   }
   .form-control:disabled, .form-control[readonly]{
   background-color: #fff;
   }
   /*----------step-wizard------------*/
   .d-flex{
   display: flex;
   }
   .justify-content-center{
   justify-content: center;
   }
   .align-items-center{
   align-items: center;
   }
   /*---------signup-step-------------*/
   .bg-color{
   background-color: #333;
   }
   .signup-step-container{
   padding: 150px 0px;
   padding-bottom: 60px;
   }
   .wizard .nav-tabs {
   position: relative;
   margin-bottom: 0;
   border-bottom-color: transparent;
   }
   .wizard > div.wizard-inner {
   position: relative;
   margin-bottom: 50px;
   text-align: center;
   }
   .connecting-line {
   height: 2px;
   background: #e0e0e0;
   position: absolute;
   width: 75%;
   margin: 0 auto;
   left: 0;
   right: 0;
   top: 15px;
   z-index: 1;
   }
   .wizard .nav-tabs > li.active > a, .wizard .nav-tabs > li.active > a:hover, .wizard .nav-tabs > li.active > a:focus {
   color: #555555;
   cursor: default;
   border: 0;
   border-bottom-color: transparent;
   }
   span.round-tab {
   width: 30px;
   height: 30px;
   line-height: 30px;
   display: inline-block;
   border-radius: 50%;
   background: #fff;
   z-index: 2;
   position: absolute;
   left: 0;
   text-align: center;
   font-size: 16px;
   color: #0e214b;
   font-weight: 500;
   border: 1px solid #ddd;
   }
   span.round-tab i{
   color:#555555;
   }
   .wizard li.active span.round-tab {
   background: #0e367c;
   color: #fff;
   border-color: #0e367c;
   }
   .wizard li.active span.round-tab i{
   color: #5bc0de;
   }
   .wizard .nav-tabs > li.active > a i{
   color: #0e367c;
   }
   .wizard .nav-tabs > li {
   width: 15%;
   }
   .wizard li:after {
   content: " ";
   position: absolute;
   left: 46%;
   opacity: 0;
   margin: 0 auto;
   bottom: 0px;
   border: 5px solid transparent;
   border-bottom-color: red;
   transition: 0.1s ease-in-out;
   }
   .wizard .nav-tabs > li a {
   width: 30px;
   height: 30px;
   margin: 20px auto;
   border-radius: 100%;
   padding: 0;
   background-color: transparent;
   position: relative;
   top: 0;
   /*pointer-events: none;
   cursor: default;*/
   }
   .wizard .nav-tabs > li a i{
   position: absolute;
   top: -15px;
   font-style: normal;
   font-weight: 400;
   white-space: nowrap;
   left: 50%;
   transform: translate(-50%, -50%);
   font-size: 12px;
   font-weight: 700;
   color: #000;
   }
   .wizard .nav-tabs > li a:hover {
   background: transparent;
   }
   .wizard .tab-pane {
   position: relative;
   padding-top: 20px;
   }
   .wizard h3 {
   margin-top: 0;
   }
   .prev-step,
   .next-step{
   font-size: 13px;
   padding: 8px 24px;
   border: none;
   border-radius: 4px;
   margin-top: 30px;
   }
   .next-step{
   background-color: #0e367c;
   color:#fff
   }
   .skip-btn{
   background-color: #cec12d;
   }
   .step-head{
   font-size: 20px;
   text-align: center;
   font-weight: 500;
   margin-bottom: 20px;
   }
   .term-check{
   font-size: 14px;
   font-weight: 400;
   }
   .custom-file {
   position: relative;
   display: inline-block;
   width: 100%;
   height: 40px;
   margin-bottom: 0;
   }
   .custom-file-input {
   position: relative;
   z-index: 2;
   width: 100%;
   height: 40px;
   margin: 0;
   opacity: 0;
   }
   .custom-file-label {
   position: absolute;
   top: 0;
   right: 0;
   left: 0;
   z-index: 1;
   height: 40px;
   padding: .375rem .75rem;
   font-weight: 400;
   line-height: 2;
   color: #495057;
   background-color: #fff;
   border: 1px solid #ced4da;
   border-radius: .25rem;
   }
   .custom-file-label::after {
   position: absolute;
   top: 0;
   right: 0;
   bottom: 0;
   z-index: 3;
   display: block;
   height: 38px;
   padding: .375rem .75rem;
   line-height: 2;
   color: #495057;
   content: "Browse";
   background-color: #e9ecef;
   border-left: inherit;
   border-radius: 0 .25rem .25rem 0;
   }
   .footer-link{
   margin-top: 30px;
   }
   .all-info-container{
   }
   .list-content{
   margin-bottom: 10px;
   }
   .list-content a{
   padding: 10px 15px;
   width: 100%;
   display: inline-block;
   background-color: #f5f5f5;
   position: relative;
   color: #565656;
   font-weight: 400;
   border-radius: 4px;
   }
   .list-content a[aria-expanded="true"] i{
   transform: rotate(180deg);
   }
   .list-content a i{
   text-align: right;
   position: absolute;
   top: 15px;
   right: 10px;
   transition: 0.5s;
   }
   .form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control {
   background-color: #fdfdfd;
   }
   .list-box{
   padding: 10px;
   }
   .signup-logo-header .logo_area{
   width: 200px;
   }
   .signup-logo-header .nav > li{
   padding: 0;
   }
   .signup-logo-header .header-flex{
   display: flex;
   justify-content: center;
   align-items: center;
   }
   .list-inline li{
   display: inline-block;
   }
   .pull-right{
   float: right;
   }
   /*-----------custom-checkbox-----------*/
   /*----------Custom-Checkbox---------*/
   input[type="checkbox"]{
   position: relative;
   display: inline-block;
   margin-right: 5px;
   }
   input[type="checkbox"]::before,
   input[type="checkbox"]::after {
   position: absolute;
   content: "";
   display: inline-block;   
   }
   input[type="checkbox"]::before{
   height: 16px;
   width: 16px;
   border: 1px solid #999;
   left: 0px;
   top: 0px;
   background-color: #fff;
   border-radius: 2px;
   }
   input[type="checkbox"]::after{
   height: 5px;
   width: 9px;
   left: 4px;
   top: 4px;
   }
   input[type="checkbox"]:checked::after{
   content: "";
   border-left: 1px solid #fff;
   border-bottom: 1px solid #fff;
   transform: rotate(-45deg);
   }
   input[type="checkbox"]:checked::before{
   background-color: #18ba60;
   border-color: #18ba60;
   }
   @media (max-width: 767px){
   .sign-content h3{
   font-size: 40px;
   }
   .wizard .nav-tabs > li a i{
   display: none;
   }
   .signup-logo-header .navbar-toggle{
   margin: 0;
   margin-top: 8px;
   }
   .signup-logo-header .logo_area{
   margin-top: 0;
   }
   .signup-logo-header .header-flex{
   display: block;
   }
   }
</style>
<script type="text/javascript">
   /* Step 1 section  */
   $('.step_1').click(function(){
      var emp_ID = $('.search_emp').val();
      localStorage.setItem("setp_1", emp_ID);
      
   })
   $('.back_step_1').click(function(){
        $('.search_emp option[value=' + localStorage.getItem("setp_1") + ']').attr('selected',true);
   })
  
   /* Step 2 section*/
   $('.step_2').click(function(){
      var res_sub_date = $('.res_sub_date').val();
      var leaving_date = $('.leaving_date').val();
      var leaving_reason = $('.leaving_reason').val();
      var settlement_date = $('.settlement_date').val();
      localStorage.setItem("setp_2_res_sub_date", res_sub_date);
      localStorage.setItem("setp_2_leaving_date", leaving_date);
      localStorage.setItem("setp_2_leaving_reason", leaving_reason);
      localStorage.setItem("setp_2_settlement_date", settlement_date);
   })
  
   $('.back_step_2').click(function(){
        $('.res_sub_date').val(localStorage.getItem("setp_2_res_sub_date"));
        $('.leaving_date').val(localStorage.getItem("setp_2_leaving_date"));
        $('.leaving_reason').val(localStorage.getItem("setp_2_leaving_reason"));
        $('.settlement_date').val(localStorage.getItem("setp_2_settlement_date"));
   })

   /* Step 3 section*/
   $('.step_3').click(function(){
      var notice_period = $('.notice_period').val();
      var no_of_day_serve = $('.no_of_day_serve').val();
      var shortfall_notice = $('.shortfall_notice').val();
     
      localStorage.setItem("setp_3_notice_period", notice_period);
      localStorage.setItem("setp_3_no_of_day_serve", no_of_day_serve);
      localStorage.setItem("setp_3_shortfall_notice", shortfall_notice);

   })
  
   $('.back_step_3').click(function(){
        $('.notice_period').val(localStorage.getItem("setp_3_notice_period"));
        $('.no_of_day_serve').val(localStorage.getItem("setp_3_no_of_day_serve"));
        $('.shortfall_notice').val(localStorage.getItem("setp_3_shortfall_notice"));
       
   })

   /* Step 4 section*/
   $('.step_4').click(function(){
      var payroll_month = $('.payroll_month').val();
      var work_day = $('.work_day').val();
      var days_work = $('.days_work').val();
     
      localStorage.setItem("setp_4_payroll_month", payroll_month);
      localStorage.setItem("setp_4_work_day", work_day);
      localStorage.setItem("setp_4_days_work", days_work);

   })
  
   $('.back_step_4').click(function(){
        $('.payroll_month').val(localStorage.getItem("setp_4_payroll_month"));
        $('.work_day').val(localStorage.getItem("setp_4_work_day"));
        $('.days_work').val(localStorage.getItem("setp_4_days_work"));
       
   })

   $(function() {
       $( ".res_sub_date" ).datepicker({
         changeYear: true,
         dateFormat: 'yy-mm-dd',
         maxDate: new Date()
       });
       $( ".leaving_date" ).datepicker({
         changeYear: true,
         dateFormat: 'yy-mm-dd',
         maxDate: new Date()
       });
       $( ".settlement_date" ).datepicker({
         changeYear: true,
         dateFormat: 'yy-mm-dd',
         maxDate: new Date()
       });
   });


</script>