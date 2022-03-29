<link rel="stylesheet" type="text/css" href="<?php echo base_url('template/'); ?>employer/assets/css/jquery-datetimepicker.css">
<link href=
'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css' rel='stylesheet'>
<script src=
"https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" >
</script>

<div class="header_btn">
   <div class="header-action">
      <a href="<?php echo base_url('employer/hrms/users'); ?>" class="btn btn-primary float-right"><i class="fa fa-plus mr-2"></i>Back</a>
   </div>
</div>
<div class="section-body mt-3">
 
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
      <form method="post" action="<?php echo base_url('employer/hrms/users/adduser'); ?>" data-parsley-validate="" enctype="multipart/form-data">
         <div class="card">
         <div class="card-header">
            <h3 class="card-title">User Details</h3>
         </div>
            <div class="card-body">
               <div class="row clearfix">
                  <div class="col-lg-6 col-md-6 col-sm-12">
                     <label for="first_name">First Name *</label>
                     <div class="form-group"><input type="text" name="first_name" class="form-control" id="first_name" placeholder="First Name" data-parsley-required-message="Please enter first name" required=""></div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12">
                     <label for="last_name">Last Name *</label>
                     <div class="form-group"><input type="text" name="last_name" class="form-control" id="last_name" placeholder="Last Name" required="" data-parsley-required-message="Please enter last name"></div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12">
                     <label for="fathers_name">Fathers Name</label>
                     <div class="form-group"><input type="text" name="fathers_name" class="form-control" id="fathers_name" placeholder="Fathers Name" data-parsley-required-message="Please enter Fathers name"></div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12">
                     <label for="mothers_name">Mothers Name </label>
                     <div class="form-group"><input type="text" name="mothers_name" class="form-control" id="mothers_name" placeholder="Mothers Name" data-parsley-required-message="Please enter mothers name"></div>
                  </div>
                  <div class="col-md-6 col-sm-12">
                     <label for="email_id">Email ID *</label>
                     <div class="form-group"><input type="email" name="email_id" class="form-control" id="email_id" data-parsley-required-message="Please enter Email" placeholder="Email ID" required=""></div>
                  </div>
                  
                  <div class="col-md-6 col-sm-12">
                     <label for="mobile_no">Mobile Number *</label>
                     <div class="form-group"><input type="text" name="mobile_no" class="form-control" id="mobile_no" placeholder="Mobile Number" data-parsley-type="number" minlength="10" maxlength="12" data-parsley-required-message="Please enter mobile number" required=""></div>
                  </div>
                  
                  <div class="col-md-6 col-sm-12">
                     <label for="dob">Date Of Birth</label>
                     <div class="form-group"><input type="text" name="dob" value="" class="form-control" id="dob"  data-parsley-required-message="Please enter date of birth" placeholder="Date of birth" autocomplete="off" required></div>
                  </div>
                  <div class="col-md-6 col-sm-12">
                     <label for="joining_date">Date Of Joining</label>
                     <div class="form-group"><input type="text" name="joining_date" value="" class="form-control" id="joining_date"  data-parsley-required-message="Please enter date of joining" placeholder="Date Of Joining" required autocomplete="off"></div>
                  </div>
                  <div class="col-md-6 col-sm-12">
                     <div class="form-group">
                        <label for="dob">Employee Type</label>
                         <select class="form-control show-tick" id="employee_type" name="employee_type" required="" data-parsley-required-message="Please select employee type">
                           <option value="">Select type</option>
                           <option value="Permanent">Permanent</option>
                           <option value="Contractual">Contractual</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12">
                     <label for="branch_name">Branch Name</label>
                     <div class="form-group"><input type="text" name="branch_name" class="form-control" id="branch_name" placeholder="Branch Name" data-parsley-required-message="Please enter branch name"></div>
                  </div>
                  <div class="col-md-4 col-sm-4">
                     <label for="joining_date">Level</label>
                     <div class="form-group">
                        <select class="form-control level_name" name="level_name" required="">
                           <option value=""> Select level</option>
                           <?php
                           if(!empty($emp_level_arr)){
                              foreach ($emp_level_arr as $level_val) {
                              ?>
                              <option value="<?php echo $level_val->id ?>"><?php echo $level_val->level_name; ?></option>
                              <?php
                              }
                           }
                           ?>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-4 col-sm-4">
                     <label for="joining_date">Grade</label>
                     <div class="form-group">
                        <select class="form-control grade_name" name="grade_name" required="">
                           <option value=""> Select grade</option>
                            
                        </select>
                     </div>
                  </div>
                  <div class="col-md-4 col-sm-4">
                     <div class="form-group">
                        <label for="employee_designation">Designation *</label>
                        <select class="form-control show-tick" id="employee_designation" name="employee_designation" required="" data-parsley-required-message="Please select designation">
                           <option value="">Select designation</option>
                           <?php
                           if(!empty($desination)){
                              foreach ($desination as $desination_val) {
                              ?>
                              <option value="<?php echo $desination_val->id ?>"><?php echo $desination_val->name; ?></option>
                              <?php
                              }
                           }
                           ?>
                        </select>
                     </div>
                  </div>
             
               </div>
            </div>
         </div>
        
         <div class="card">
            <div class="card-header">
               <!-- <h3 class="card-title">Bank Accounts</h3> -->
            </div>
            <div class="card-body">
               <div class="row clearfix">
               <div class="col-md-4 col-sm-12">
                        <label for="audience_country_list">Country *</label>
                        <div class="form-group">
                           <select class="form-control show-tick" name="country_id" id="get_country_list" required="" data-parsley-required-message="Please select country name">
                              <option value="">Select country</option>
                              <?php
                              if(!empty($country)){
                                 foreach ($country as $country_val) {
                                 ?>
                                 <option value="<?php echo $country_val->id; ?>"><?php echo $country_val->name; ?></option>
                                 <?php
                                 }
                              }
                              ?>
                           </select>
                        </div>
                     </div>
              
               <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                           <label for="audience_state_list">State *</label>
                           <select class="form-control" name="state_id" id="get_state_list" required="" data-parsley-required-message="Please select state name">
                              <option value="">Select state</option> 
                           </select>
                        </div>
                     </div>
                     <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                           <label for="city_list">City *</label>
                           <select class="form-control show-tick" name="city_id" id="city_list" required="" data-parsley-required-message="Please select city name">
                              <option value="">Select city</option>
                           </select>
                        </div>
                     </div>
                    
                     <!-- <div class="col-md-4 col-sm-12">
                        <label for="UAN_number">UAN number</label>
                        <div class="form-group"><input type="text" class="form-control" name="UAN_number" id="UAN_number" placeholder="UAN number"></div>
                     </div> -->
                     <!-- <div class="col-md-4 col-sm-12">
                        <label for="PF_reg_number">PF number</label>
                        <div class="form-group"><input type="text" class="form-control" name="PF_reg_number" id="PF_reg_number" placeholder="PF Number"></div>
                     </div> -->
                
                
               <div class="col-md-4 col-sm-12">
                        <label for="pran_number">PRAN number</label>
                        <div class="form-group"><input type="text" class="form-control" name="pran_number" id="pran_number" placeholder="PRAN Number"></div>
                     </div>

                     <div class="col-md-4 col-sm-12">
                        <label for="pan_number">PAN number</label>
                        <div class="form-group"><input type="text" class="form-control" name="pan_number" id="pan_number" minlength="10" maxlength="10" placeholder="PAN Number" required="" data-parsley-type="alphanum" data-parsley-error-message="Pan number should be 10 character"></div>
                     </div>

                     <div class="col-md-4 col-sm-12">
                        <label for="aadhar_number">Aadhar number</label>
                        <div class="form-group"><input type="number" class="form-control" name="aadhar_number" id="aadhar_number" data-parsley-type="digits" minlength="12" maxlength="12"  placeholder="Aadhar Number" required="" data-parsley-error-message="Aadhar number should be 12 number"></div>
                     </div>

                 </div>
             </div>
         </div>
        
         <div class="card">
            <div class="card-header">
               <h3 class="card-title">Others Information</h3>
            </div>
            <div class="card-body">
               <div class="row clearfix">
                     <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                           <label for="employee_department">Department *</label>
                           <select class="form-control show-tick" id="employee_department" name="employee_department" required="" data-parsley-required-message="Please select department">
                              <option value="">Select department</option>
                              <?php
                              if(!empty($department)){
                                 foreach ($department as $department_val) {
                                 ?>
                                 <option value="<?php echo $department_val->dep_id; ?>"><?php echo $department_val->dept_name; ?></option>
                                 <?php
                                 }
                              }
                              ?>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-6 col-sm-12">
                        <label for="gender">Gender *</label>
                        <div class="form-group" id="gender">
                           <input type="radio" name="gender" value="Male" class="" required="" checked="checked"> Male <input type="radio" name="gender" value="Female" class="" required=""> Female
                        </div>
                     </div>
                     

                      <div class="col-md-6 col-sm-12">
                        <label for="address">Current address</label>
                        <div class="form-group">
                           <textarea name="address" class="form-control" id="address" placeholder="Current address"></textarea>
                        </div>
                     </div>
                  <div class="col-md-6 col-sm-12">
                        <label for="alternate_address">Alternate address</label>
                        <div class="form-group">
                           <textarea name="alternate_address" class="form-control" id="alternate_address" placeholder="Altername address"></textarea>
                        </div>
                     </div>
                     <div class="col-md-6 col-sm-12">
                        <label for="communication_address">Communication address</label>
                        <div class="form-group">
                           <textarea name="communication_address" class="form-control" id="communication_address" placeholder="Communication address"></textarea>
                        </div>
                     </div>

                     <div class="col-md-6 col-sm-12">
                        <label for="communication_address">Working Days</label>
                        <div class="form-group">
                           <select class="form-control" name="working_days" id="working_days" required="" data-parsley-required-message="Please select working days">
                              <option value="">Select working days</option>
                              <option value="5">5 days</option>
                              <option value="6">6 days</option> 
                           </select> 
                        </div>
                     </div>

                     <div class="col-md-6 col-sm-12">
                        <label for="profile_img">Profile Image</label>
                        <div class="form-group">
                            <input type="file" name="profile_img" id="profile_img" class="dropify" data-height="100" data-allowed-file-extensions="png jpg jpeg"  data-default-file="" data-max-file-size="2M">
                        </div>
                     </div>

                      <!-- <div class="col-md-8 col-sm-12">
                        <label for="employee_doc">Doc</label>
                        <div class="form-group">
                           <input type="file" name="employee_doc" id="employee_doc" class="dropify" data-height="100" data-allowed-file-extensions='["doc", "txt","pdf","docx"]'  data-max-file-size="4M">
                        </div>
                     </div> -->
                     <div class="col-md-6 col-sm-12">
                        <label for="password">Password *</label>
                        <div class="form-group"><input type="password" class="form-control" name="password" id="password" placeholder="Password"minlength="6" required="" data-parsley-required-message="Please enter password"></div>
                     </div>
                   
                 </div>
             </div>
         </div>

         <!-- Salary modules -->

         <div class="card">
            <div class="card-header">
               <h3 class="card-title"> Compensation Structure</h3>
            </div>
            <div class="card-body">
               <div class="row clearfix">
                  <div class="col-lg-6 col-md-6 col-sm-12">
                     <label for="sal_basic_sal_da">Full Basic Salary + DA *</label>
                     <div class="form-group"><input type="text" name="sal_basic_sal_da" value="" class="form-control" id="sal_basic_sal_da" placeholder="Full Basic Salary + DA" data-parsley-required-message="Please enter full basic salary + DA" required="" data-parsley-type="number" step="0.01"></div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12">
                     <label for="sal_hra">HRA *</label>
                     <div class="form-group"><input type="text" name="sal_hra" value="" class="form-control" id="sal_hra" placeholder="HRA" data-parsley-required-message="Please enter HRA" required="" data-parsley-type="number" step="0.01"></div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12">
                     <label for="sal_full_conveyance">Conveyance *</label>
                     <div class="form-group"><input type="text" name="sal_full_conveyance" value="" class="form-control" id="sal_full_conveyance" placeholder="Conveyance" data-parsley-required-message="Please enter conveyance" required="" data-parsley-type="number" step="0.01"></div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12">
                     <label for="sal_other_allowance">Other Allowance</label>
                     <div class="form-group"><input type="text" name="sal_other_allowance" value="" class="form-control" id="sal_other_allowance" placeholder="Other Allowance" data-parsley-required-message="Please enter other allowance" data-parsley-type="number" step="0.01"></div>
                  </div>

                   <div class="col-lg-6 col-md-6 col-sm-12">
                     <label for="sal_personal_pay">Personal Pay</label>
                     <div class="form-group"><input type="text" name="sal_personal_pay" value="" class="form-control" id="sal_personal_pay" placeholder="Personal Pay" data-parsley-required-message="Please enter personal pay"  data-parsley-type="number" step="0.01"></div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12">
                     <label for="sal_food_allowance">Food Allowance</label>
                     <div class="form-group"><input type="text" name="sal_food_allowance" value="" class="form-control" id="sal_food_allowance" placeholder="Food Allowance" data-parsley-required-message="Please enter food allowance" data-parsley-type="number" step="0.01"></div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12">
                     <label for="sal_medical_allowance">Medical Allowance</label>
                     <div class="form-group"><input type="text" name="sal_medical_allowance" value="" class="form-control" id="sal_medical_allowance" placeholder="Medical Allowance" data-parsley-required-message="Please enter aedical allowance"  data-parsley-type="number" step="0.01"></div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12">
                     <label for="sal_telephone_allowance">Telephone Allowance</label>
                     <div class="form-group"><input type="text" name="sal_telephone_allowance" value="" class="form-control" id="sal_telephone_allowance" placeholder="Telephone Allowance" data-parsley-required-message="Please enter telephone allowance"  data-parsley-type="number" step="0.01"></div>
                  </div>
                 
                  <div class="col-lg-6 col-md-6 col-sm-12">
                     <label for="sal_performance_link_pay">Performance Linked Pay</label>
                     <div class="form-group"><input type="text" name="sal_performance_link_pay" value="" class="form-control" id="sal_performance_link_pay" placeholder="Performance Linked Pay" data-parsley-required-message="Please enter performance linked pay"  data-parsley-type="number" step="0.01"></div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12">
                     <label for="sal_personal_loan_amt">Personal Loan Amount</label>
                     <div class="form-group"><input type="text" name="sal_personal_loan_amt" value="" class="form-control" id="sal_personal_loan_amt" placeholder="Personal Loan Principal" data-parsley-required-message="Please enter personal loan Principal"  data-parsley-type="number" step="0.01"></div>
                  </div>                 
                  <div class="col-lg-6 col-md-6 col-sm-12">
                     <label for="sal_professional_tax">Professional Tax*</label>
                     <div class="form-group"><input type="text" name="sal_professional_tax" value="" class="form-control" id="sal_professional_tax" placeholder="Professional Tax" data-parsley-required-message="Please enter professional tax" required="" data-parsley-type="number" step="0.01"></div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12">
                     <label for="sal_personal_loan_interest">Personal Loan Interest</label>
                     <div class="form-group"><input type="text" name="sal_personal_loan_interest" value="" class="form-control" id="sal_personal_loan_interest" placeholder="Personal Loan Interest" data-parsley-required-message="Please enter personal loan interest"  data-parsley-type="number" step="0.01"></div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12">
                     <label for="voluntary_pf">Voluntary PF(%)</label>
                     <div class="form-group"><input type="text" name="voluntary_pf" value="" class="form-control" id="voluntary_pf" placeholder="enter Voluntary PF" data-parsley-required-message="Please enter Voluntary PF"  data-parsley-type="number" step="0.01"></div>
                  </div>
               </div>
            </div>
         </div>

         <!--  End module -->
        
        
         <div class="row clearfix mb-5">
            <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary">Add Employee</button>
            </div>
         </div>
         
      </form>

   </div>
 </div>
 <script type="text/javascript">
   $(document).ready(function(){
         $("#get_country_list").on("change", function(){
            $.ajax({
                url: "<?php echo base_url('employer/get_state'); ?>",
                type: "POST",
                data: {
                    cntry:  $(this).val(),
                },
                dataType: "text",
                success: function (jsonStr) 
                {
                  //alert(jsonStr)
                    $("#get_state_list").html(jsonStr);
                }
            });  
      });

     $("#get_state_list").on("change", function(){

         $.ajax({
             url: "<?php echo base_url('employer/get_city'); ?>",
             type: "POST",
             data: {
                 state:  $(this).val(),
             },
             dataType: "text",
             success: function (jsonStr) 
             {
                 $("#city_list").html(jsonStr);
             }
         }); 
     });

     // get grade data as per level changes
     $(".level_name").on("change", function(){
            $.ajax({
                url: "<?php echo base_url('employer/get_level_grade'); ?>",
                type: "POST",
                data: {
                    level_id:  $(this).val(),
                },
                dataType: "text",
                success: function (jsonStr) 
                {
                  //alert(jsonStr)
                    $(".grade_name").html(jsonStr);
                }
            });  
      });

   });
</script> 


<!--  <script type="text/javascript" src="<?php echo base_url('template/'); ?>employer/assets/js/jquery.datetimepicker.js"></script>
<script type="text/javascript">
   $('#dob').datetimepicker({
      format: 'Y-m-d',
      timepicker:false,
   });
</script> -->
<script>
  $(document).ready(function() {
      $(function() {
          $( "#dob" ).datepicker({
            changeYear: true,
            dateFormat: 'yy-mm-dd',
            maxDate: new Date()
          });
          $( "#joining_date" ).datepicker({
            changeYear: true,
            dateFormat: 'yy-mm-dd',
            maxDate: new Date()
          });
      });

  })
</script>
<!-- <script type="text/javascript">
    var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    year = year - 18;
   
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var maxDate = year + '-' + month + '-' + day;
    $('#dob').attr('max', maxDate);

</script> -->
