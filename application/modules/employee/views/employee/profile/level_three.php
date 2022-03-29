<div class="header_btn">
   <div class="header-action">
      <a href="<?php echo base_url('employee/employee/my-profile'); ?>" class="btn btn-primary float-right">Back</a>
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
      <form method="post" action="<?php echo base_url('employee/my-profile/update_level_three'); ?>" data-parsley-validate="" enctype="multipart/form-data">
         <div class="card-body">
            <div class="row clearfix">
               <div class="col-md-4 col-sm-12">
                  <label for="fathers_name">Father Name *</label>
                  <div class="form-group"><input type="text" class="form-control" name="fathers_name" value="<?php echo (!empty($emp_info->fathers_name) ? $emp_info->fathers_name : ''); ?>" id="fathers_name" placeholder="Father name" required></div>
               </div>
               <div class="col-md-4 col-sm-12">
                  <label for="mobile_no">Mobile Number *</label>
                  <div class="form-group"><input type="text" name="emergency_primary_phone_number" value="<?php echo (!empty($emp_info->emergency_primary_phone_number) ? $emp_info->emergency_primary_phone_number : ''); ?>" class="form-control" id="emergency_primary_phone_number" placeholder="Mobile Number" data-parsley-type="number" minlength="10" maxlength="12" data-parsley-required-message="Please enter mobile number" required=""></div>
               </div>
               <div class="col-md-4 col-sm-12">
                  <label for="mothers_name">Mother name *</label>
                  <div class="form-group"><input type="text" class="form-control" name="mothers_name" value="<?php echo (!empty($emp_info->mothers_name) ? $emp_info->mothers_name : ''); ?>" id="mothers_name" placeholder="Mother name" required></div>
               </div>
               <div class="col-md-4 col-sm-12">
                  <label for="emergency_secondary_phone_number">Mobile Number *</label>
                  <div class="form-group"><input type="text" name="emergency_secondary_phone_number" value="<?php echo (!empty($emp_info->emergency_secondary_phone_number) ? $emp_info->emergency_secondary_phone_number : ''); ?>" class="form-control" id="emergency_secondary_phone_number" placeholder="Mobile Number" data-parsley-type="number" minlength="10" maxlength="12" data-parsley-required-message="Please enter mobile number" required=""></div>
               </div>
               <div class="col-12">
                  <button type="submit" class="btn btn-primary">Update</button>
               </div>
            </div>
         </div>
      </form>
   </div>
 </div>