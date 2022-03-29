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

      <form method="post" action="<?php echo base_url('employee/employee/upload_offer_letter_doc'); ?>" data-parsley-validate="" enctype="multipart/form-data" class="image_doc_upload_offer_page">
         <div class="card-body">
            <div class="row clearfix">
               <div class="col-lg-12 col-md-12 col-sm-12">
                  <label for="first_name">Offer Letter Acceptance 1 *</label>
                  <div class="form-group border border-secondary offer_letter_doc">
                     
                     <?php
                     if(!empty($res->offer_letter_doc)){
                     ?>
                        <input type="file" name="offer_letter_doc" id="" class="dropify" data-height="100" data-allowed-file-extensions="pdf jpg jpeg"  data-default-file="<?php echo base_url();?>uploads/employee/others/<?php echo $res->offer_letter_doc; ?>" data-max-file-size="4M" <?php echo(!empty($res->offer_letter_doc) ? $res->offer_letter_doc : 'required'); ?>>
                     <?php
                     }else{
                     ?>
                        <input type="file" name="offer_letter_doc" id="" class="dropify" data-height="100" data-allowed-file-extensions="pdf jpg jpeg"  data-default-file="" data-max-file-size="4M" required="">
                     <?php
                     }
                     ?>

                  </div>
                  <input type="hidden" name="offer_letter_doc_old" value="<?php echo(!empty($res->offer_letter_doc) ? $res->offer_letter_doc : ''); ?>">
               </div>
               <div class="col-lg-12 col-md-12 col-sm-12">
                  <label for="first_name">Offer Letter Acceptance 2 *</label>
                  <div class="form-group border border-secondary offer_letter_doc2">
                     
                     <?php
                     if(!empty($res->offer_letter_doc2)){
                     ?>
                        <input type="file" name="offer_letter_doc2" id="" class="dropify" data-height="100" data-allowed-file-extensions="pdf jpg jpeg"  data-default-file="<?php echo base_url();?>uploads/employee/others/<?php echo $res->offer_letter_doc; ?>" data-max-file-size="4M" <?php echo(!empty($res->offer_letter_doc2) ? $res->offer_letter_doc2 : 'required'); ?>>
                     <?php
                     }else{
                     ?>
                        <input type="file" name="offer_letter_doc2" id="" class="dropify" data-height="100" data-allowed-file-extensions="pdf jpg jpeg"  data-default-file="" data-max-file-size="4M" required="">
                     <?php
                     }
                     ?>

                  </div>
                  <input type="hidden" name="offer_letter_doc2_old" value="<?php echo(!empty($res->offer_letter_doc2) ? $res->offer_letter_doc2 : ''); ?>">
               </div>
               <div class="col-lg-12 col-md-12 col-sm-12">
                  <label for="first_name">Offer Letter Acceptance 3 *</label>
                  <div class="form-group border border-secondary offer_letter_doc3">
                     
                     <?php
                     if(!empty($res->offer_letter_doc3)){
                     ?>
                        <input type="file" name="offer_letter_doc3" id="" class="dropify" data-height="100" data-allowed-file-extensions="pdf jpg jpeg"  data-default-file="<?php echo base_url();?>uploads/employee/others/<?php echo $res->offer_letter_doc3; ?>" data-max-file-size="4M" <?php echo(!empty($res->offer_letter_doc3) ? $res->offer_letter_doc3 : 'required'); ?>>
                     <?php
                     }else{
                     ?>
                        <input type="file" name="offer_letter_doc3" id="" class="dropify" data-height="100" data-allowed-file-extensions="pdf jpg jpeg"  data-default-file="" data-max-file-size="4M" required="">
                     <?php
                     }
                     ?>
                  </div>
                  <input type="hidden" name="offer_letter_doc3_old" value="<?php echo(!empty($res->offer_letter_doc3) ? $res->offer_letter_doc3 : ''); ?>">
               </div>
               <div class="col-12">
                  <button type="submit" class="btn btn-primary">Update</button>
               </div>
            </div>
         </div>
      </form>
   </div>
</div>





     