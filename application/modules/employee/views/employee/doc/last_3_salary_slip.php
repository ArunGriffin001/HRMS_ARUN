<div class="header_btn">
   <div class="header-action">
      <a href="<?php echo base_url('employee/employee/doc-list'); ?>" class="btn btn-primary float-right"><i class="fa fa-plus mr-2"></i>Back</a>
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

      <form method="post" action="<?php echo base_url('employee/employee/upload_last_salary_slip'); ?>" data-parsley-validate="" enctype="multipart/form-data" class="image_doc_upload_last3_salary">
         <div class="card-body">
            <div class="row clearfix">
               <div class="col-lg-12 col-md-12 col-sm-12">
                  <label for="experience_salary_slip"> salary slip 1 *</label>
                  <div class="form-group border border-secondary experience_salary_slip">
                     <?php
                     if(!empty($res->experience_salary_slip)){
                     ?>
                        <input type="file" name="experience_salary_slip" id="" class="dropify" data-height="100" data-allowed-file-extensions="pdf jpg jpeg"  data-default-file="<?php echo base_url();?>uploads/employee/others/<?php echo $res->experience_salary_slip; ?>" data-max-file-size="4M" <?php echo(!empty($res->experience_salary_slip) ? $res->experience_salary_slip : 'required'); ?>>
                     <?php
                     }else{
                     ?>
                        <input type="file" name="experience_salary_slip" id="" class="dropify" data-height="100" data-allowed-file-extensions="pdf jpg jpeg"  data-default-file="" data-max-file-size="4M" required="">
                     <?php
                     }
                     ?>

                  </div>
                  <input type="hidden" name="experience_salary_slip_old" value="<?php echo(!empty($res->experience_salary_slip) ? $res->experience_salary_slip : ''); ?>">
               </div>
               <div class="col-lg-12 col-md-12 col-sm-12">
                  <label for="experience_salary_slip2"> salary slip 2 *</label>
                  <div class="form-group border border-secondary experience_salary_slip2">
                     <?php
                     if(!empty($res->experience_salary_slip2)){
                     ?>
                        <input type="file" name="experience_salary_slip2" id="" class="dropify" data-height="100" data-allowed-file-extensions="pdf jpg jpeg"  data-default-file="<?php echo base_url();?>uploads/employee/others/<?php echo $res->experience_salary_slip2; ?>" data-max-file-size="4M" <?php echo(!empty($res->experience_salary_slip2) ? $res->experience_salary_slip2 : 'required'); ?>>
                     <?php
                     }else{
                     ?>
                        <input type="file" name="experience_salary_slip2"  class="dropify" data-height="100" data-allowed-file-extensions="pdf jpg jpeg"  data-default-file="" data-max-file-size="4M" required="">
                     <?php
                     }
                     ?>

                  </div>
                  <input type="hidden" name="experience_salary_slip2_old" value="<?php echo(!empty($res->experience_salary_slip2) ? $res->experience_salary_slip2 : ''); ?>">
               </div>

                <div class="col-lg-12 col-md-12 col-sm-12">
                  <label for="experience_salary_slip3"> salary slip 3 *</label>
                  <div class="form-group border border-secondary experience_salary_slip3">
                     <?php
                     if(!empty($res->experience_salary_slip3)){
                     ?>
                        <input type="file" name="experience_salary_slip3" id="" class="dropify" data-height="100" data-allowed-file-extensions="pdf jpg jpeg"  data-default-file="<?php echo base_url();?>uploads/employee/others/<?php echo $res->experience_salary_slip3; ?>" data-max-file-size="4M" <?php echo(!empty($res->experience_salary_slip3) ? $res->experience_salary_slip3 : 'required'); ?>>
                     <?php
                     }else{
                     ?>
                        <input type="file" name="experience_salary_slip3" id="experience_salary_slip3" class="dropify" data-height="100" data-allowed-file-extensions="pdf jpg jpeg"  data-default-file="" data-max-file-size="4M" required="">
                     <?php
                     }
                     ?>

                  </div>
                  <input type="hidden" name="experience_salary_slip3_old" value="<?php echo(!empty($res->experience_salary_slip3) ? $res->experience_salary_slip3 : ''); ?>">
               </div>

               <div class="col-12">
                  <button type="submit" class="btn btn-primary">Update</button> 
                  <!-- <?php
                  if(!empty($res->experience_salary_slip)){
                  ?>
                  <a href="<?php echo base_url();?>uploads/employee/others/<?php echo $res->experience_salary_slip; ?>" target="_blank" class="btn btn-info ml-3">Open Doc</a> 
                  <?php
                  }
                  ?> -->
               </div>
            </div>
         </div>
      </form>

   </div>
</div>



     