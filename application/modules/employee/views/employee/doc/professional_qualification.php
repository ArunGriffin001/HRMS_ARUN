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

      <form method="post" action="<?php echo base_url('employee/employee/upload_professional_qualification'); ?>" data-parsley-validate="" enctype="multipart/form-data" class="image_doc_upload_3">
         <div class="card-body">
             <div class="row clearfix">
               
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <label for="passport_size_photo">Post Graduation Mark Sheet/ Certificate (Any one) *</label>
                  <div class="form-group border border-secondary identity_proof_3">
                     <?php
                     if(!empty($res->professional_qualification_post_graduation)){
                     ?>
                     <input type="file" name="professional_qualification_post_graduation" id="professional_qualification_post_graduation" class="dropify" data-height="100" data-allowed-file-extensions="jpg pdf jpeg"  data-default-file="<?php echo base_url();?>uploads/employee/others/<?php echo $res->professional_qualification_post_graduation; ?>" data-max-file-size="4M" <?php echo(!empty($res->professional_qualification_post_graduation) ? $res->professional_qualification_post_graduation : 'required'); ?>>
                     <?php
                     }else{
                     ?>
                        <input type="file" name="professional_qualification_post_graduation" id="professional_qualification_post_graduation" class="dropify" data-height="100" data-allowed-file-extensions="jpg pdf jpeg"  data-default-file="" data-max-file-size="4M" required="">
                     <?php
                     }
                     ?>
                     <input type="hidden" name="professional_qualification_post_graduation_old" value="<?php echo(!empty($res->professional_qualification_post_graduation) ? $res->professional_qualification_post_graduation : ''); ?>">
                  </div>
               </div>

               <div class="col-lg-6 col-md-6 col-sm-6">
                  <label for="passport_size_photo">Graduation Mark Sheet/ Certificate (Any one) *</label>
                  <div class="form-group border border-secondary identity_proof_2">
                     <?php
                     if(!empty($res->professional_qualification_graduation)){
                     ?>
                        <input type="file" name="professional_qualification_graduation" id="professional_qualification_graduation" class="dropify " data-height="100" data-allowed-file-extensions="jpg pdf jpeg"  data-default-file="<?php echo base_url();?>uploads/employee/others/<?php echo $res->professional_qualification_graduation; ?>" data-max-file-size="4M" <?php echo(!empty($res->professional_qualification_graduation) ? $res->professional_qualification_graduation : 'required'); ?>>
                     <?php
                     }else{
                     ?>
                        <input type="file" name="professional_qualification_graduation" id="professional_qualification_graduation" class="dropify" data-height="100" data-allowed-file-extensions="jpg pdf jpeg" data-default-file="" data-max-file-size="4M" required="">
                     <?php
                     }
                     ?>
                        <input type="hidden" name="professional_qualification_graduation_old" value="<?php echo(!empty($res->professional_qualification_graduation) ? $res->professional_qualification_graduation : ''); ?>">
                  </div>
               </div>

               <div class="col-lg-6 col-md-6 col-sm-6">
                  <label for="passport_size_photo">Diploma Mark Sheet/ Certificate (Any one) *</label>
                  <div class="form-group border border-secondary identity_proof_1">
                     <?php
                     if(!empty($res->professional_qualification_diploma)){
                     ?>
                     <input type="file" name="professional_qualification_diploma" id="professional_qualification_diploma" class="dropify" data-height="100" data-allowed-file-extensions="jpg pdf jpeg"  data-default-file="<?php echo base_url();?>uploads/employee/others/<?php echo $res->professional_qualification_diploma; ?>" data-max-file-size="4M" <?php echo(!empty($res->professional_qualification_diploma) ? $res->professional_qualification_diploma : 'required'); ?>>
                     <?php
                     }else{
                     ?>
                        <input type="file" name="professional_qualification_diploma" id="professional_qualification_diploma" class="dropify" data-height="100" data-allowed-file-extensions="jpg pdf jpeg"  data-default-file="" data-max-file-size="4M" required="">
                     <?php
                     }
                     ?>
                     <input type="hidden" name="professional_qualification_diploma_old" value="<?php echo(!empty($res->professional_qualification_diploma) ? $res->professional_qualification_diploma : ''); ?>">
                  </div>
               </div>
               <div class="col-lg-6 col-md-6 col-sm-6">
                  <label for="passport_size_photo">Any Other Diploma/Degree/PG/Certificate </label>
                  <div class="form-group border border-secondary identity_proof_4">
                     <?php
                     if(!empty($res->professional_qualification_any_other)){
                     ?>
                        <input type="file" name="professional_qualification_any_other" id="professional_qualification_any_other" class="dropify " data-height="100" data-allowed-file-extensions="jpg pdf jpeg"  data-default-file="<?php echo base_url();?>uploads/employee/others/<?php echo $res->professional_qualification_any_other; ?>" data-max-file-size="4M" >
                     <?php
                     }else{
                     ?>
                        <input type="file" name="professional_qualification_any_other" id="professional_qualification_any_other" class="dropify" data-height="100" data-allowed-file-extensions="jpg pdf jpeg"  data-default-file="" data-max-file-size="4M">
                     <?php
                     }
                     ?>
                        <input type="hidden" name="professional_qualification_any_other_old" value="<?php echo(!empty($res->professional_qualification_any_other) ? $res->professional_qualification_any_other : ''); ?>" class="other_certificate">
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