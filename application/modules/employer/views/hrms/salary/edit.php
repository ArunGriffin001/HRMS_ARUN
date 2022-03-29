<link rel="stylesheet" type="text/css" href="<?php echo base_url('template/'); ?>employer/assets/css/jquery-datetimepicker.css">
<div class="header_btn">
   <div class="header-action">
      <a href="<?php echo base_url('employer/hrms/users/salary'); ?>" class="btn btn-primary float-right"><i class="fa fa-plus mr-2"></i>Back</a>
   </div>
</div>


<div class="section-body mt-3">
   <div class="card">
   <?php
   $month = array('1'=>'January','2'=>'February','3'=>'March','4'=>'April','5'=>'May','6'=>'June','7'=>'July','8'=>'August','9'=>'September','10'=>'October','11'=>'November','12'=>'December');
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
      <form method="post" action="<?php echo base_url('employer/hrms/users/salary/UpdateSal/').encode($res->salary_id); ?>" data-parsley-validate="">
         <div class="card-body">
            <div class="row clearfix">
               <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                  <label for="department">Select Department </label>
                  <!-- <select class="form-control " name="employee_dept_id" id="department_id"  data-parsley-required-message="Please select department" required="">
                       <option value="">Select department</option>
                       <?php
                       if(!empty($departments)){
                          foreach ($departments as $dept_val) {
                             ?>
                             <option value="<?php echo encode($dept_val->dep_id); ?>" <?php echo($dept_val->dep_id == $res->employee_dept_id ? 'Selected' : ''); ?> ><?php echo $dept_val->dept_name; ?></option>
                             <?php
                          }
                       }
                       ?>
                  </select> -->
                  <input type="text" class="form-control" value="<?php echo (!empty($departments[$dept_key]->dept_name) ? $departments[$dept_key]->dept_name : '') ?>" readonly>
               </div>
               <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                  <label>Select Employee</label>
                 <!--  <select class="form-control " name="employee_id" id="get_user_list"  data-parsley-required-message="Please select employee" required="">
                       <option value="<?php echo (!empty($res->employee_id) ? $res->employee_id : ''); ?>"><?php echo (!empty($res->full_name) ? $res->full_name : ''); ?></option>

                  </select> -->
                  <input type="text" class="form-control" value="<?php echo (!empty($res->full_name) ? $res->full_name : ''); ?>" readonly>
               </div>

               <div class="col-lg-6 col-md-6 col-sm-12">
                  <label for="basic_DA_sal">Full Basic Salary + DA *</label>
                  <div class="form-group"><input type="text" name="basic_DA_sal" value="<?php echo (!empty($res->basic_DA_sal) ? $res->basic_DA_sal : ''); ?>" class="form-control" id="basic_DA_sal" placeholder="Full Basic Salary + DA" data-parsley-required-message="Please enter full basic salary + DA" required="" data-parsley-type="number" step="0.01"></div>
               </div>
               <div class="col-lg-6 col-md-6 col-sm-12">
                  <label for="basic_DA_sal">HRA *</label>
                  <div class="form-group"><input type="text" name="HRA" value="<?php echo (!empty($res->HRA) ? $res->HRA : ''); ?>" class="form-control" id="basic_DA_sal" placeholder="HRA" data-parsley-required-message="Please enter HRA" required="" data-parsley-type="number" step="0.01"></div>
               </div>
               <div class="col-lg-6 col-md-6 col-sm-12">
                  <label for="Conveyance_sal">Conveyance *</label>
                  <div class="form-group"><input type="text" name="Conveyance_sal" value="<?php echo (!empty($res->Conveyance_sal) ? $res->Conveyance_sal : ''); ?>" class="form-control" id="Conveyance_sal" placeholder="Conveyance" data-parsley-required-message="Please enter conveyance" required="" data-parsley-type="number" step="0.01"></div>
               </div>
               <div class="col-lg-6 col-md-6 col-sm-12">
                  <label for="Special_allowance_sal">Other Allowance*</label>
                  <div class="form-group"><input type="text" name="Special_allowance_sal" value="<?php echo (!empty($res->Special_allowance_sal) ? $res->Special_allowance_sal : ''); ?>" class="form-control" id="Special_allowance_sal" placeholder="Other Allowance" data-parsley-required-message="Please enter other allowance" required="" data-parsley-type="number" step="0.01"></div>
               </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                  <label for="personal_pay">Personal Pay</label>
                  <div class="form-group"><input type="text" name="personal_pay" value="<?php echo (!empty($res->personal_pay) ? $res->personal_pay : ''); ?>" class="form-control" id="personal_pay" placeholder="Personal Pay" data-parsley-required-message="Please enter personal pay"  data-parsley-type="number" step="0.01"></div>
               </div>
               <div class="col-lg-6 col-md-6 col-sm-12">
                  <label for="food_allowance">Food Allowance</label>
                  <div class="form-group"><input type="text" name="food_allowance" value="<?php echo (!empty($res->food_allowance) ? $res->food_allowance : ''); ?>" class="form-control" id="food_allowance" placeholder="Food Allowance" data-parsley-required-message="Please enter food allowance" data-parsley-type="number" step="0.01"></div>
               </div>
               <div class="col-lg-6 col-md-6 col-sm-12">
                  <label for="medical_allowance">Medical Allowance</label>
                  <div class="form-group"><input type="text" name="medical_allowance" value="<?php echo (!empty($res->medical_allowance) ? $res->medical_allowance : ''); ?>" class="form-control" id="medical_allowance" placeholder="Medical Allowance" data-parsley-required-message="Please enter aedical allowance"  data-parsley-type="number" step="0.01"></div>
               </div>
               <div class="col-lg-6 col-md-6 col-sm-12">
                  <label for="telephone_allowance">Telephone Allowance</label>
                  <div class="form-group"><input type="text" name="telephone_allowance" value="<?php echo (!empty($res->telephone_allowance) ? $res->telephone_allowance : ''); ?>" class="form-control" id="telephone_allowance" placeholder="Telephone Allowance" data-parsley-required-message="Please enter telephone allowance"  data-parsley-type="number" step="0.01"></div>
               </div>
              
               <div class="col-lg-6 col-md-6 col-sm-12">
                  <label for="performance_linked_pay">Performance Linked Pay</label>
                  <div class="form-group"><input type="text" name="performance_linked_pay" value="<?php echo (!empty($res->performance_linked_pay) ? $res->performance_linked_pay : ''); ?>" class="form-control" id="performance_linked_pay" placeholder="Performance Linked Pay" data-parsley-required-message="Please enter performance linked pay"  data-parsley-type="number" step="0.01"></div>
               </div>
               <div class="col-lg-6 col-md-6 col-sm-12">
                  <label for="personal_loan_principal">Personal Loan Principal</label>
                  <div class="form-group"><input type="text" name="personal_loan_principal" value="<?php echo (!empty($res->personal_loan_principal) ? $res->personal_loan_principal : ''); ?>" class="form-control" id="personal_loan_principal" placeholder="Personal Loan Principal" data-parsley-required-message="Please enter personal loan Principal" data-parsley-type="number" step="0.01"></div>
               </div>

               <!--  <div class="col-md-6 col-sm-12">
                  <label for="paying_date">Paying Date *</label>
                   <div class="form-group"><input type="text" value="<?php echo (!empty($res->paying_date) ? date('Y-m-d', strtotime($res->paying_date)) : ''); ?>" class="form-control" readonly></div>
               </div> -->

                 <div class="col-md-4 col-sm-6">
                   <label for="paying_date">For Month *</label>
                   <div class="form-group"><input type="text" value="<?php echo (!empty($res->paying_month) ? $month[$res->paying_month] : ''); ?>" class="form-control" readonly></div>
               </div>
               <div class="col-md-4 col-sm-6">
                  <label for="paying_date">For Year *</label>
                   <div class="form-group"><input type="text" value="<?php echo (!empty($res->paying_year) ? $res->paying_year : ''); ?>" class="form-control" readonly></div>
               </div>


               <div class="col-lg-4 col-md-4 col-sm-6">
                  <label for="current_month_day_worked">Days Worked*</label>
                  <div class="form-group"><input type="text" name="current_month_day_worked" value="<?php echo (!empty($res->current_month_day_worked) ? $res->current_month_day_worked : ''); ?>" class="form-control" id="current_month_day_worked" placeholder="Days Worked" data-parsley-required-message="Please enter days worked" required="" data-parsley-type="number" step="0.01" min="1" readonly></div>
               </div>

               <div class="col-lg-6 col-md-6 col-sm-12">
                  <label for="current_month_LWP">LWP*</label>
                  <div class="form-group"><input type="text" name="current_month_LWP" value="<?php echo (!empty($res->current_month_LWP) ? $res->current_month_LWP : ''); ?>" class="form-control" id="current_month_LWP" placeholder="LWP" data-parsley-required-message="Please enter LWP" required="" data-parsley-type="number" step="0.01" min="0" readonly></div>
               </div>

               <div class="col-lg-6 col-md-6 col-sm-12">
                  <label for="professional_tax">Professional Tax*</label>
                  <div class="form-group"><input type="text" name="professional_tax" value="<?php echo (!empty($res->professional_tax) ? $res->professional_tax : ''); ?>" class="form-control" id="professional_tax" placeholder="Professional Tax" data-parsley-required-message="Please enter professional tax" required="" data-parsley-type="number" step="0.01"></div>
               </div>
               <div class="col-lg-6 col-md-6 col-sm-12">
                  <label for="personal_loan_Interest">Personal Loan Interest</label>
                  <div class="form-group"><input type="text" name="personal_loan_Interest" value="<?php echo (!empty($res->personal_loan_Interest) ? $res->personal_loan_Interest : ''); ?>" class="form-control" id="personal_loan_Interest" placeholder="Personal Loan Interest" data-parsley-required-message="Please enter personal loan interest" data-parsley-type="number" step="0.01"></div>
               </div>
              
               <div class="col-12">
                  <button type="submit" class="btn btn-primary">Update</button>
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
            }
         });  
      });
   });
</script>