<link rel="stylesheet" type="text/css" href="<?php echo base_url('template/'); ?>employer/assets/css/jquery-datetimepicker.css">
<div class="header_btn">
   <div class="header-action">
      <a href="<?php echo base_url('employer/hrms/users/salary'); ?>" class="btn btn-primary float-right"><i class="fa fa-plus mr-2"></i>Back</a>
   </div>
</div>


<div class="section-body mt-3">
   <div class="card">
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
      <form method="post" action="<?php echo base_url('employer/hrms/users/salary/AddSalary'); ?>" data-parsley-validate="">
         <div class="card-body">
            <div class="row clearfix">
               <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                  <label for="department">Select Department</label>
                  <select class="form-control " name="employee_dept_id" id="department_id"  data-parsley-required-message="Please select department" required="">
                       <option value="">Select department</option>
                       <?php
                       if(!empty($departments)){
                          foreach ($departments as $dept_val) {
                             ?>
                             <option value="<?php echo encode($dept_val->dep_id); ?>" ><?php echo $dept_val->dept_name; ?></option>
                             <?php
                          }
                       }
                       ?>
                  </select>
               </div>
               <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                  <label>Select Employee</label>
                  <select class="form-control " name="employee_id" id="get_user_list"  data-parsley-required-message="Please select employee" required="">
                       <option value="">Select employee</option>
                  </select>
               </div>

               <div class="col-lg-6 col-md-6 col-sm-12">
                  <label for="basic_DA_sal">Full Basic Salary + DA *</label>
                  <div class="form-group"><input type="text" name="basic_DA_sal" value="" class="form-control" id="basic_DA_sal" placeholder="Full Basic Salary + DA" data-parsley-required-message="Please enter full basic salary + DA" required="" data-parsley-type="number" step="0.01"></div>
               </div>
               <div class="col-lg-6 col-md-6 col-sm-12">
                  <label for="basic_DA_sal">HRA *</label>
                  <div class="form-group"><input type="text" name="HRA" value="" class="form-control" id="hra" placeholder="HRA" data-parsley-required-message="Please enter HRA" required="" data-parsley-type="number" step="0.01"></div>
               </div>
               <div class="col-lg-6 col-md-6 col-sm-12">
                  <label for="Conveyance_sal">Conveyance *</label>
                  <div class="form-group"><input type="text" name="Conveyance_sal" value="" class="form-control" id="Conveyance_sal" placeholder="Conveyance" data-parsley-required-message="Please enter  conveyance" required="" data-parsley-type="number" step="0.01"></div>
               </div>
               <div class="col-lg-6 col-md-6 col-sm-12">
                  <label for="Special_allowance_sal">Other Allowance*</label>
                  <div class="form-group"><input type="text" name="Special_allowance_sal" value="" class="form-control" id="Special_allowance_sal" placeholder="Other Allowance" data-parsley-required-message="Please enter other allowance" required="" data-parsley-type="number" step="0.01"></div>
               </div>



                <div class="col-lg-6 col-md-6 col-sm-12">
                  <label for="personal_pay">Personal Pay</label>
                  <div class="form-group"><input type="text" name="personal_pay" value="" class="form-control" id="personal_pay" placeholder="Personal Pay" data-parsley-required-message="Please enter personal pay"  data-parsley-type="number" step="0.01"></div>
               </div>
               <div class="col-lg-6 col-md-6 col-sm-12">
                  <label for="food_allowance">Food Allowance</label>
                  <div class="form-group"><input type="text" name="food_allowance" value="" class="form-control" id="food_allowance" placeholder="Food Allowance" data-parsley-required-message="Please enter food allowance" data-parsley-type="number" step="0.01"></div>
               </div>
               <div class="col-lg-6 col-md-6 col-sm-12">
                  <label for="medical_allowance">Medical Allowance</label>
                  <div class="form-group"><input type="text" name="medical_allowance" value="" class="form-control" id="medical_allowance" placeholder="Medical Allowance" data-parsley-required-message="Please enter aedical allowance"  data-parsley-type="number" step="0.01"></div>
               </div>
               <div class="col-lg-6 col-md-6 col-sm-12">
                  <label for="telephone_allowance">Telephone Allowance</label>
                  <div class="form-group"><input type="text" name="telephone_allowance" value="" class="form-control" id="telephone_allowance" placeholder="Telephone Allowance" data-parsley-required-message="Please enter telephone allowance"  data-parsley-type="number" step="0.01"></div>
               </div>
              
               <div class="col-lg-6 col-md-6 col-sm-12">
                  <label for="performance_linked_pay">Performance Linked Pay</label>
                  <div class="form-group"><input type="text" name="performance_linked_pay" value="" class="form-control" id="performance_linked_pay" placeholder="Performance Linked Pay" data-parsley-required-message="Please enter performance linked pay"  data-parsley-type="number" step="0.01"></div>
               </div>
               <div class="col-lg-6 col-md-6 col-sm-12">
                  <label for="personal_loan_principal">Personal Loan Amount</label>
                  <div class="form-group"><input type="text" name="personal_loan_principal" value="" class="form-control" id="personal_loan_amount" placeholder="Personal Loan Principal" data-parsley-required-message="Please enter personal loan Principal"  data-parsley-type="number" step="0.01"></div>
               </div>
               <!--  <div class="col-md-12 col-sm-12">
                  <label for="paying_date">Paying Date *</label>
                   <div class="form-group"><input type="text" name="paying_date" value="" class="form-control" id="paying_date"  data-parsley-required-message="Please enter paying date" readonly placeholder="Paying Date" required disabled=""></div>
               </div> -->
               <div class="col-md-4 col-sm-6">
                  <label for="paying_date">For Month *</label>
                  <div class="form-group">
                     <select name="paying_month" class="form-control paying_month" data-parsley-required-message="Please select month" required disabled="">
                        <option value=""> Select month</option>
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <option value="3">March</option>
                        <option value="4">April</option>
                        <option value="5">May</option>
                        <option value="6">June</option>
                        <option value="7">July</option>
                        <option value="8">August</option>
                        <option value="9">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                     </select>
                  </div>
               </div>
               <div class="col-md-4 col-sm-6">
                  <label for="paying_year">For Year *</label>
                  <div class="form-group">
                     <select name="paying_year" class="form-control paying_year" data-parsley-required-message="Please select month" required disabled="">
                        <option value=""> Select Year</option>
                        <option value="2022">2022</option>
                        <option value="2021">2021</option>
                     </select>
                  </div>
               </div>
              
               <div class="col-lg-4 col-md-4 col-sm-6">
                  <label for="current_month_day_worked">Days Worked*<!-- <span> monthdays = <p class="monthly_day666"></p> --></label>
                  <div class="form-group"><input type="text" name="current_month_day_worked" value="" class="form-control" id="current_month_day_worked" placeholder="Days Worked" data-parsley-required-message="Please enter days worked" required="" data-parsley-type="number" step="0.01" min="1" readonly disabled=""></div>
               </div>

               <div class="col-lg-6 col-md-6 col-sm-12">
                  <label for="current_month_LWP">LWP*</label>
                  <div class="form-group"><input type="text" name="current_month_LWP" value="" class="form-control" id="current_month_LWP" placeholder="LWP" data-parsley-required-message="Please enter LWP" required="" data-parsley-type="number" step="0.01" min="0"></div>
               </div>

               <div class="col-lg-6 col-md-6 col-sm-12">
                  <label for="professional_tax">Professional Tax*</label>
                  <div class="form-group"><input type="text" name="professional_tax" value="" class="form-control" id="professional_tax" placeholder="Professional Tax" data-parsley-required-message="Please enter professional tax" required="" data-parsley-type="number" step="0.01"></div>
               </div>
               <div class="col-lg-6 col-md-6 col-sm-12">
                  <label for="personal_loan_Interest">Personal Loan Interest</label>
                  <div class="form-group"><input type="text" name="personal_loan_Interest" value="" class="form-control" id="personal_loan_Interest" placeholder="Personal Loan Interest" data-parsley-required-message="Please enter personal loan interest"  data-parsley-type="number" step="0.01"></div>
               </div>
              
               <div class="col-12">
                  <button type="submit" class="btn btn-primary">Submit</button>
               </div>
            </div>
         </div>
      </form>
   </div>
 </div>
 <script type="text/javascript" src="<?php echo base_url('template/'); ?>employer/assets/js/jquery.datetimepicker.js"></script>
<script type="text/javascript">
   $('#paying_date').datetimepicker({
      format: 'Y-m-d',
      timepicker:false,
      onSelectDate:function( ct ){
         /* Check select date employee working day */
         var paying_date = $('#paying_date').val();
         /* Ajax request */
            if(paying_date == ''){
               alert('Please select paying date');
            }else{
               var get_emp_id = $('#get_user_list').val();
               $.ajax({
                  url: "<?php echo base_url('employer/hrms/users/salary/total_working_day'); ?>",
                  type: "POST",
                  data: {
                      paying_date: paying_date, emp_id: get_emp_id,
                  },
                  dataType: "json",
                  success: function (result) 
                  {
                     var obj = jQuery.parseJSON(JSON.stringify(result));
                     //var obj = JSON.parse(result);
                     if(obj.working_day == ''){
                        swal('No record available for this month!');
                     }else{
                        $('#current_month_day_worked').val(obj.working_day); 
                     }
                     $('.monthly_day').val(obj.company_working_days);
                     
                  }
               });  
            }
         /* End */


      },
   });

   $(document).ready(function(){
      $(".paying_year").on("change", function(){
         var get_emp_id = $('#get_user_list').val();
         var payingYear = $('.paying_year').val();
         var payingMonth = $('.paying_month').val();
         
         if(get_emp_id === "" ||  payingMonth === "" || payingYear === ""){
            alert('The employee, Paying year and Paying month is require');
         }else{
            $.ajax({
                  url: "<?php echo base_url('employer/hrms/users/salary/total_working_day'); ?>",
                  type: "POST",
                  data: {
                      payingMonth: payingMonth, payingYear:payingYear, emp_id: get_emp_id,
                  },
                  dataType: "json",
                  success: function (result) 
                  {
                     var obj = jQuery.parseJSON(JSON.stringify(result));
                     //var obj = JSON.parse(result);
                     if(obj.working_day == ''){
                        $('#basic_DA_sal, #hra, #Conveyance_sal, #Special_allowance_sal, #personal_pay, #food_allowance, #medical_allowance, #telephone_allowance, #performance_linked_pay, #personal_loan_amount, #paying_date, #current_month_day_worked, #current_month_LWP, #professional_tax, #personal_loan_Interest, .paying_month, .paying_year, #current_month_LWP, #personal_loan_Interest, #professional_tax').val('');
                        swal('No record available for this month!');
                        $('#current_month_day_worked').val('0'); 
                     }else{
                        $('#current_month_day_worked').val(obj.working_day);

                        $('#basic_DA_sal').val(obj.basic_DA_sal);
                        $('#hra').val(obj.hra);
                        $('#Conveyance_sal').val(obj.Conveyance_sal);
                        $('#Special_allowance_sal').val(obj.Special_allowance_sal);
                        $('#personal_pay').val(obj.personal_pay);
                        $('#food_allowance').val(obj.food_allowance);
                        $('#medical_allowance').val(obj.medical_allowance);
                        $('#telephone_allowance').val(obj.telephone_allowance);
                        $('#telephone_allowance').val(obj.sal_telephone_allowance);
                        $('#performance_linked_pay').val(obj.performance_linked_pay);
                        $('#personal_loan_amount').val(obj.personal_loan_amount);
                        $('#professional_tax').val(obj.professional_tax);
                        $('#current_month_LWP').val(obj.current_month_LWP);
                        $('#personal_loan_Interest').val(obj.personal_loan_Interest);

                     }
                     $('.monthly_day').text(obj.company_working_days);
                     
                  }
               });
         }
         
      });

      $(".paying_month").on("change", function(){
         $('.paying_year').val('');
      })
   });

   

   $(document).ready(function(){
      $("#department_id").on("change", function(){
         $.ajax({
            url: "<?php echo base_url('employer/hrms/getDepartmentUsers'); ?>",
            type: "POST",
            data: {
                department_id:  $(this).val(),
            },
            dataType: "text",
            success: function (jsonStr) 
            {
              //alert(jsonStr)
                $("#get_user_list").html(jsonStr);
                $("#paying_date").val('');
                $('#current_month_day_worked').val('');
            }
         });  
      });

      // check ebloyee info
       $("#get_user_list").on("change", function(){
         var empID = $(this).val();
         if(empID == ''){
            $('#paying_date').attr('disabled',true);
            $('#current_month_day_worked').attr('disabled',true);
            $('#paying_date').val('');  
            $('#current_month_day_worked').val('');

            $('.paying_month').attr('disabled',true);
            $('.paying_year').attr('disabled',true);
         }else{
            $('#paying_date').removeAttr('disabled');
            $('#current_month_day_worked').removeAttr('disabled');

            $('.paying_month').removeAttr('disabled');
            $('.paying_year').removeAttr('disabled');
         }
         $("#paying_date").val('');
         $('#current_month_day_worked').val('');

         /* Start work to auto file salary value in the field*/

         $.ajax({
            url: "<?php echo base_url('employer/hrms/users/getEmployeeSalaryData'); ?>",
            type: "POST",
            data: {
                emp_ID:  $(this).val(),
            },
            dataType: "text",
            success: function (jsonStr) 
            {
               $('#basic_DA_sal, #hra, #Conveyance_sal, #Special_allowance_sal, #personal_pay, #food_allowance, #medical_allowance, #telephone_allowance, #performance_linked_pay, #personal_loan_amount, #paying_date, #current_month_day_worked, #current_month_LWP, #professional_tax, #personal_loan_Interest, .paying_month, .paying_year, #current_month_LWP, #personal_loan_Interest, #professional_tax').val('');
              
               var salVal = $.parseJSON(jsonStr);
               $('#basic_DA_sal').val(salVal.sal_basic_sal_da);
               $('#hra').val(salVal.sal_hra);
               $('#Conveyance_sal').val(salVal.sal_full_conveyance);
               $('#Special_allowance_sal').val(salVal.sal_other_allowance);
               $('#personal_pay').val(salVal.sal_personal_pay);
               $('#food_allowance').val(salVal.sal_food_allowance);
               $('#medical_allowance').val(salVal.sal_medical_allowance);
               $('#telephone_allowance').val(salVal.sal_telephone_allowance);
               $('#performance_linked_pay').val(salVal.sal_performance_link_pay);
               $('#professional_tax').val(salVal.sal_professional_tax);
               $('#personal_loan_amount').val(salVal.sal_personal_loan_amt);
               $('#personal_loan_Interest').val(salVal.sal_personal_loan_interest);
              
            }
         }); 

         /* End */

       });
       /* End */

       
       

   });
</script>