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

      <form method="post" action="<?php echo base_url('employee/employee/upload_relieving_letter'); ?>" data-parsley-validate="" enctype="multipart/form-data" class="image_doc_upload_relieving">
         <div class="card-body">
            <div class="row clearfix">
               <div class="col-lg-12 col-md-12 col-sm-12">
                  <label for="relieving_letter">Relieving Letter 1 *</label>
                  <div class="form-group border border-secondary relieving_letter">
                     <?php
                     if(!empty($res->relieving_letter)){
                     ?>
                        <input type="file" name="relieving_letter" id="" class="dropify" data-height="100" data-allowed-file-extensions="pdf jpg jpeg"  data-default-file="<?php echo base_url();?>uploads/employee/others/<?php echo $res->relieving_letter; ?>" data-max-file-size="4M" <?php echo(!empty($res->relieving_letter) ? $res->relieving_letter : 'required'); ?>>
                     <?php
                     }else{
                     ?>
                        <input type="file" name="relieving_letter" id="" class="dropify" data-height="100" data-allowed-file-extensions="pdf jpg jpeg"  data-default-file="" data-max-file-size="4M" required="">
                     <?php
                     }
                     ?>

                  </div>
                  <input type="hidden" name="relieving_letter_old" value="<?php echo(!empty($res->relieving_letter) ? $res->relieving_letter : ''); ?>">
               </div>
               <div class="col-lg-12 col-md-12 col-sm-12">
                  <label for="relieving_letter2">Relieving Letter 2 *</label>
                  <div class="form-group border border-secondary relieving_letter2">
                     <?php
                     if(!empty($res->relieving_letter2)){
                     ?>
                        <input type="file" name="relieving_letter2" id="" class="dropify" data-height="100" data-allowed-file-extensions="pdf jpg jpeg"  data-default-file="<?php echo base_url();?>uploads/employee/others/<?php echo $res->relieving_letter2; ?>" data-max-file-size="4M" <?php echo(!empty($res->relieving_letter2) ? $res->relieving_letter2 : 'required'); ?>>
                     <?php
                     }else{
                     ?>
                        <input type="file" name="relieving_letter2" id="" class="dropify" data-height="100" data-allowed-file-extensions="pdf jpg jpeg"  data-default-file="" data-max-file-size="4M" required="">
                     <?php
                     }
                     ?>

                  </div>
                  <input type="hidden" name="relieving_letter2_old" value="<?php echo(!empty($res->relieving_letter2) ? $res->relieving_letter2 : ''); ?>">
               </div>
               <div class="col-lg-12 col-md-12 col-sm-12">
                  <label for="relieving_letter3">Relieving Letter 3 *</label>
                  <div class="form-group border border-secondary relieving_letter3">
                     <?php
                     if(!empty($res->relieving_letter3)){
                     ?>
                        <input type="file" name="relieving_letter3" id="" class="dropify" data-height="100" data-allowed-file-extensions="pdf jpg jpeg"  data-default-file="<?php echo base_url();?>uploads/employee/others/<?php echo $res->relieving_letter3; ?>" data-max-file-size="4M" <?php echo(!empty($res->relieving_letter3) ? $res->relieving_letter3 : 'required'); ?>>
                     <?php
                     }else{
                     ?>
                        <input type="file" name="relieving_letter3" id="" class="dropify" data-height="100" data-allowed-file-extensions="pdf jpg jpeg"  data-default-file="" data-max-file-size="4M" required="">
                     <?php
                     }
                     ?>

                  </div>
                  <input type="hidden" name="relieving_letter3_old" value="<?php echo(!empty($res->relieving_letter3) ? $res->relieving_letter3 : ''); ?>">
               </div>
               <div class="col-12">
                  <button type="submit" class="btn btn-primary">Update</button> 
                  <!-- <?php
                  if(!empty($res->relieving_letter)){
                  ?>
                  <a href="<?php echo base_url();?>uploads/employee/others/<?php echo $res->relieving_letter; ?>" target="_blank" class="btn btn-info ml-3">Open Doc</a> 
                  <?php
                  }
                  ?> -->
               </div>
            </div>
         </div>
      </form>

   </div>
</div>



     