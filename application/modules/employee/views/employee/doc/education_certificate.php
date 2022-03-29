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

      <form method="post" action="<?php echo base_url('employee/employee/upload_education_certificate'); ?>" data-parsley-validate="" enctype="multipart/form-data" class="image_doc_upload_2">
         <div class="card-body">
             <div class="row clearfix">
               
               <div class="col-lg-6 col-md-6 col-sm-6">
                  <label for="passport_size_photo">10th Mark Sheet/10th Certificate (Any one) *</label>
                  <div class="form-group border border-secondary identity_proof_1">
                     <?php
                     if(!empty($res->education_certificate_10)){
                     ?>
                     <input type="file" name="education_certificate_10" id="education_certificate_10" class="dropify" data-height="100" data-allowed-file-extensions="jpg pdf jpeg"  data-default-file="<?php echo base_url();?>uploads/employee/others/<?php echo $res->education_certificate_10; ?>" data-max-file-size="4M" <?php echo(!empty($res->education_certificate_10) ? $res->education_certificate_10 : 'required'); ?>>
                     <?php
                     }else{
                     ?>
                        <input type="file" name="education_certificate_10" id="education_certificate_10" class="dropify" data-height="100" data-allowed-file-extensions="jpg pdf jpeg"  data-default-file="" data-max-file-size="4M" required="">
                     <?php
                     }
                     ?>
                     <input type="hidden" name="education_certificate_10_old" value="<?php echo(!empty($res->education_certificate_10) ? $res->education_certificate_10 : ''); ?>">
                  </div>
               </div>

               <div class="col-lg-6 col-md-6 col-sm-6">
                  <label for="passport_size_photo">12th Mark Sheet/12th Certificate (Any one) *</label>
                  <div class="form-group border border-secondary identity_proof_2">
                     <?php
                     if(!empty($res->education_certificate_12)){
                     ?>
                        <input type="file" name="education_certificate_12" id="education_certificate_12" class="dropify " data-height="100" data-allowed-file-extensions="jpg pdf jpeg"  data-default-file="<?php echo base_url();?>uploads/employee/others/<?php echo $res->education_certificate_12; ?>" data-max-file-size="4M" <?php echo(!empty($res->education_certificate_12) ? $res->education_certificate_12 : 'required'); ?>>
                     <?php
                     }else{
                     ?>
                        <input type="file" name="education_certificate_12" id="education_certificate_12" class="dropify" data-height="100" data-allowed-file-extensions="jpg pdf jpeg"  data-default-file="" data-max-file-size="4M" required="">
                     <?php
                     }
                     ?>
                        <input type="hidden" name="education_certificate_12_old" value="<?php echo(!empty($res->education_certificate_12) ? $res->education_certificate_12 : ''); ?>">
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