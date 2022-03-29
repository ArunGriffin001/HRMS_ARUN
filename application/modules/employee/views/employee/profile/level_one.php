<link rel="stylesheet" type="text/css" href="<?php echo base_url('template/'); ?>employer/assets/css/jquery-datetimepicker.css">
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
      <form method="post" action="<?php echo base_url('employee/my-profile/update_level_one'); ?>" data-parsley-validate="" enctype="multipart/form-data">
         <div class="card-body">
            <div class="row clearfix">
               <div class="col-lg-4 col-md-6 col-sm-12">
                  <label for="first_name">First Name *</label>
                  <div class="form-group"><input type="text" name="first_name" value="<?php echo (!empty($emp_info->first_name) ? $emp_info->first_name : ''); ?>" class="form-control" id="first_name" placeholder="First Name" data-parsley-required-message="Please enter first name" required=""></div>
               </div>
               <div class="col-lg-4 col-md-6 col-sm-12">
                  <label for="last_name">Last Name *</label>
                  <div class="form-group"><input type="text" name="last_name" value="<?php echo (!empty($emp_info->last_name) ? $emp_info->last_name : ''); ?>" class="form-control" id="last_name" placeholder="Last Name" required="" data-parsley-required-message="Please enter last name"></div>
               </div>
               <div class="col-lg-4 col-md-6 col-sm-12">
                  <label for="dob">Date Of Birth</label>
                  <div class="form-group"><input type="text" name="dob" value="<?php echo (!empty($emp_info->dob) ? date('Y-m-d',strtotime($emp_info->dob)) : ''); ?>" class="form-control" id="dob"  data-parsley-required-message="Please enter date of birth" readonly placeholder="Date of birth" required></div>
               </div>
              
               <div class="col-md-4 col-sm-12">
                  <label for="email_id">Email ID *</label>
                  <div class="form-group"><input type="email" name="email_id" value="<?php echo (!empty($emp_info->email_id) ? $emp_info->email_id : ''); ?>" class="form-control" id="email_id" data-parsley-required-message="Please enter Email" placeholder="Email ID" readonly></div>
               </div>
               
               <div class="col-md-4 col-sm-12">
                  <label for="mobile_no">Mobile Number *</label>
                  <div class="form-group"><input type="text" name="mobile_no" value="<?php echo (!empty($emp_info->mobile_no) ? $emp_info->mobile_no : ''); ?>" class="form-control" id="mobile_no" placeholder="Mobile Number" data-parsley-type="number" minlength="10" maxlength="12" data-parsley-required-message="Please enter mobile number" required=""></div>
               </div>
               <div class="col-md-4 col-sm-12">
                  <label for="gender">Gender *</label>
                  <div class="form-group" id="gender">
                     <input type="radio" name="gender" value="Male" <?php echo (!empty($emp_info->gender == "Male") ? 'checked' : ''); ?> class="" required="" checked="checked"> Male <input type="radio" name="gender" value="Female" <?php echo (!empty($emp_info->gender == "Female") ? 'checked' : ''); ?> class="" required=""> Female
                  </div>
               </div>

                <div class="col-md-4 col-sm-12">
                  <label for="address">Current address</label>
                  <div class="form-group">
                     <textarea name="address" class="form-control" id="address" placeholder="Current address"><?php echo (!empty($emp_info->address) ? $emp_info->address : ''); ?></textarea>
                  </div>
               </div>
               <div class="col-md-4 col-sm-12">
                  <label for="alternate_address">Alternate address</label>
                  <div class="form-group">
                     <textarea name="alternate_address" class="form-control" id="alternate_address" placeholder="Altername address"><?php echo (!empty($emp_info->alternate_address) ? $emp_info->alternate_address : ''); ?></textarea>
                  </div>
               </div>
               <div class="col-md-4 col-sm-12">
                  <label for="communication_address">Communication address</label>
                  <div class="form-group">
                     <textarea name="communication_address" class="form-control" id="communication_address" placeholder="Communication address"><?php echo (!empty($emp_info->communication_address) ? $emp_info->communication_address : ''); ?></textarea>
                  </div>
               </div>

               <div class="col-md-8 col-sm-12">
                  <label for="profile_img">Profile Image</label>
                  <?php if(!empty($emp_info->profile_img)){ ?>
                  <div>
                     <img src="<?php echo base_url() ?>/uploads/employer/users/<?php echo $emp_info->profile_img; ?>" width="120" height="70">

                  </div>
                  <br>
                  <?php } ?>

                  <div class="form-group">
                     <input type="hidden" name="old_img" value="<?php echo (!empty($emp_info->profile_img) ? $emp_info->profile_img : ''); ?>">
                    <!--  <input type="file" name="profile_img" id="profile_img" > -->
                     <input type="file" name="profile_img" id="profile_img" class="dropify" data-height="100" data-allowed-file-extensions="png jpg jpeg" data-default-file="" data-max-file-size="2M">

                  </div>
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
   $('#dob').datetimepicker({
      format: 'Y-m-d',
      timepicker:false,
   });
</script>