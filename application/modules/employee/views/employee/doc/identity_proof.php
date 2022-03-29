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

      <form method="post" action="<?php echo base_url('employee/employee/upload_identity_proof'); ?>" data-parsley-validate="" enctype="multipart/form-data" class="image_doc_upload_2">
         <div class="card-body">
             <div class="row clearfix">
               <label for="passport_size_photo">Election ID Card/Passport/Driving License/Ration Card (Any Two) *</label>
               <div class="col-lg-6 col-md-6 col-sm-6">
                   <label>Front*</label>
                  <div class="form-group border border-secondary identity_proof_1">
                    
                     <?php
                     if(!empty($res->identity_proof_1)){
                     ?>
                     <input type="file" name="identity_proof_1" id="identity_proof_1" class="dropify" data-height="100" data-allowed-file-extensions="jpg jpeg pdf"  data-default-file="<?php echo base_url();?>uploads/employee/others/<?php echo $res->identity_proof_1; ?>" data-max-file-size="4M" <?php echo(!empty($res->identity_proof_1) ? $res->identity_proof_1 : 'required'); ?>>
                     <?php
                     }else{
                     ?>
                        <input type="file" name="identity_proof_1" id="identity_proof_1" class="dropify" data-height="100" data-allowed-file-extensions="jpg jpeg pdf"  data-default-file="" data-max-file-size="4M" required="">
                     <?php
                     }
                     ?>
                     <input type="hidden" name="identity_proof_1_old" value="<?php echo(!empty($res->identity_proof_1) ? $res->identity_proof_1 : ''); ?>">
                  </div>
               </div>
               <div class="col-lg-6 col-md-6 col-sm-6">
                  <label>Back*</label>
                  <div class="form-group border border-secondary identity_proof_2">

                     <?php
                     if(!empty($res->identity_proof_2)){
                     ?>
                        <input type="file" name="identity_proof_2" id="identity_proof_2" class="dropify " data-height="100" data-allowed-file-extensions="jpg jpeg pdf"  data-default-file="<?php echo base_url();?>uploads/employee/others/<?php echo $res->identity_proof_2; ?>" data-max-file-size="4M" <?php echo(!empty($res->identity_proof_2) ? $res->identity_proof_2 : 'required'); ?>>
                     <?php
                     }else{
                     ?>
                        <input type="file" name="identity_proof_2" id="identity_proof_2" class="dropify" data-height="100" data-allowed-file-extensions="jpg jpeg pdf"  data-default-file="" data-max-file-size="4M" required="">
                     <?php
                     }
                     ?>
                        <input type="hidden" name="identity_proof_2_old" value="<?php echo(!empty($res->identity_proof_2) ? $res->identity_proof_2 : ''); ?>">
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