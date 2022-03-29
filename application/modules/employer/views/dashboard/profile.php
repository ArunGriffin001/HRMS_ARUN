
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
   <form method="post" action="<?php echo base_url('employer/profileupdate/'); ?>" data-parsley-validate="" enctype="multipart/form-data">
      
      <div class="row clearfix">
         <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
               <label for="first_name">First Name</label>
               <input type="text" name="first_name" value="<?php echo(!empty($employer->first_name) ? $employer->first_name : ''); ?>" class="form-control" id="first_name" placeholder="First Name" data-parsley-required-message="Please enter first name" required="" autocomplete="off">
            </div>
         </div>
         <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
               <label for="last_name">Last Name</label>
               <input type="text" name="last_name" value="<?php echo(!empty($employer->last_name) ? $employer->last_name : ''); ?>" class="form-control" id="first_name" placeholder="Last Name" data-parsley-required-message="Please enter first name" required="" autocomplete="off">
            </div>
         </div>
         <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
               <label for="email">Email</label>
               <input type="text" value="<?php echo(!empty($employer->email_id) ? $employer->email_id : ''); ?>" class="form-control" placeholder="Email" id="email" data-parsley-required-message="Please enter email" required="" autocomplete="off" data-parsley-type="email" readonly>
            </div>
         </div>
         <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
               <label for="Company_name">Company name</label>
               <input type="text" name="company_name" value="<?php echo(!empty($employer->company_name) ? $employer->company_name : ''); ?>" class="form-control" id="Company_name" placeholder="Company name" data-parsley-required-message="Please enter company name" required="" autocomplete="off">
            </div>
         </div>
         <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
               <label for="Company_headcount">Company headcount</label>
               <input type="text" name="team_member" value="<?php echo(!empty($employer->team_member) ? $employer->team_member : ''); ?>" class="form-control" id="Company_headcount" placeholder="Company headcount" data-parsley-required-message="Please enter company headcount" required="" autocomplete="off" data-parsley-type="number">
               <input type="hidden" name="employee_id" value="<?php echo encode($employer->employee_id); ?>">
            </div>
         </div>
         <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
               <label for="mobile_no">Phone</label>
               <input type="text" name="mobile_no" value="<?php echo(!empty($employer->mobile_no) ? $employer->mobile_no : ''); ?>" class="form-control" id="mobile_no" placeholder="Phone number" data-parsley-required-message="Please enter phone number" required="" autocomplete="off" data-parsley-type="number" minlength="10" maxlength="12">
              
            </div>
         </div>
         <div class="col-lg-6 col-md-6 col-sm-6">
           <div class="form-group">
               <label for="password">Password</label>
               <input type="text" name="password" class="form-control" id="password" placeholder="Password" data-parsley-required-message="Please enter password" autocomplete="off" minlength="6">
              
           </div>
         </div>
      </div>
      <div class="row">
         <div class="col-md-6 col-sm-6">

                  <label for="profile_img">Profile Image</label>
                  <?php if(!empty($employer->profile_img)){ ?>
                  <div>
                     <img src="<?php echo base_url() ?>/uploads/employer/users/<?php echo $employer->profile_img; ?>" width="120" height="70">

                  </div>
                  <br>
                  <?php } ?>

                  <div class="form-group">
                     <input type="hidden" name="old_img" value="<?php echo (!empty($employer->profile_img) ? $employer->profile_img : ''); ?>">
                    <!--  <input type="file" name="profile_img" id="profile_img" > -->
                     <input type="file" name="profile_img" id="profile_img" class="dropify" data-height="100" data-allowed-file-extensions="png jpg jpeg" data-default-file="" data-max-file-size="2M">

                  </div>
               </div>
         <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="form-group">
               <input type="submit" class="btn btn-primary" required="">
            </div>
         </div>
      </div>

   </form>

</div>

