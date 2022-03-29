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

      <form method="post" action="<?php echo base_url('employee/employee/upload_passport_front_rear'); ?>" data-parsley-validate="" enctype="multipart/form-data" class="image_doc_upload_2">
         <div class="card-body">
             <div class="row clearfix">
               <div class="col-lg-12 col-md-12 col-sm-12">
                  <label for="passport_size_photo">Passport(Front & Rear pages) *</label>
               </div>
               <div class="col-lg-6 col-md-6 col-sm-6">
                  <div class="form-group border border-secondary identity_proof_1">
                     <?php
                     if(!empty($res->passport_front)){
                     ?>
                     <input type="file" name="passport_front" id="passport_front" class="dropify" data-height="100" data-allowed-file-extensions="pdf jpg jpeg"  data-default-file="<?php echo base_url();?>uploads/employee/others/<?php echo $res->passport_front; ?>" data-max-file-size="4M" <?php echo(!empty($res->passport_front) ? $res->passport_front : 'required'); ?>>
                     <?php
                     }else{
                     ?>
                        <input type="file" name="passport_front" id="passport_front" class="dropify" data-height="100" data-allowed-file-extensions="pdf jpg jpeg"  data-default-file="" data-max-file-size="4M" required="">
                     <?php
                     }
                     ?>
                     <input type="hidden" name="passport_front_old" value="<?php echo(!empty($res->passport_front) ? $res->passport_front : ''); ?>">
                  </div>
               </div>
               <div class="col-lg-6 col-md-6 col-sm-6">
                  <div class="form-group border border-secondary identity_proof_2">
                     <?php
                     if(!empty($res->passport_rear)){
                     ?>
                        <input type="file" name="passport_rear" id="passport_rear" class="dropify " data-height="100" data-allowed-file-extensions="pdf jpg jpeg"  data-default-file="<?php echo base_url();?>uploads/employee/others/<?php echo $res->passport_rear; ?>" data-max-file-size="4M" <?php echo(!empty($res->passport_rear) ? $res->passport_rear : 'required'); ?>>
                     <?php
                     }else{
                     ?>
                        <input type="file" name="passport_rear" id="passport_rear" class="dropify" data-height="100" data-allowed-file-extensions="pdf jpg jpeg"  data-default-file="" data-max-file-size="4M" required="">
                     <?php
                     }
                     ?>
                        <input type="hidden" name="passport_rear_old" value="<?php echo(!empty($res->passport_rear) ? $res->passport_rear : ''); ?>">
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