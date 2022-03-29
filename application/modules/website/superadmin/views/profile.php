<div class="section-body">
   <div class="container-fluid">
      <div class="d-flex justify-content-between align-items-center">
         
      </div>
   </div>
</div>
<div class="section-body mt-3">
   <div class="container-fluid">
      <div class="tab-content mt-3">
         <div class="tab-pane fade show active" id="user-list" role="tabpanel">
            <div class="card">
               <div class="card-header">
                  <h3 class="card-title"><?php echo (!empty($page_heading) ? $page_heading : ''); ?></h3>
               </div>
            </div>
         </div>
         <div class="" id="user-add" role="tabpanel">
            <div class="card">
               <div class="card-body">
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

                  <form method="post" enctype="multipart/form-data" action="<?php echo base_url('superadmin/updatepassword'); ?>" data-parsley-validate=""  >
                     <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                           <div class="form-group">
                              <label>Old password</label>
                              <input type="text" name="old_password" class="form-control" placeholder="Old password" required="" data-parsley-required-message="Please enter old password">
                           </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12">
                           <div class="form-group">
                              <label>New password</label>
                              <input type="text" name="new_password" class="form-control" id="newpassword" placeholder="New password" data-parsley-equalto="#confirm_password" data-parsley-minlength="8" required="" data-parsley-required-message="Please enter new password">
                           </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12">
                           <div class="form-group">
                              <label>Confirm Password</label>
                              <input type="text" name="confirm_password" class="form-control" id="confirm_password" placeholder="Confirm password" data-parsley-equalto="#newpassword" data-parsley-minlength="8" required="" data-parsley-required-message="Please confirm new password">
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
            </div>
         </div>
      </div>
   </div>
</div>