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

      <form method="post" action="<?php echo base_url('employee/employee/upload_aadhaar_card'); ?>" data-parsley-validate="" enctype="multipart/form-data" class="image_doc_upload_aadhar">
         <div class="card-body">
            <div class="row clearfix">
               <div class="col-lg-12 col-md-12 col-sm-12">
                  <label for="aadhaar_card">Aadhaar Card Front/ Social Sercurity Card - International *</label>
                  <div class="form-group border border-secondary aadhaar_card">
                     
                     <?php
                     if(!empty($res->aadhaar_card)){
                     ?>
                        <input type="file" name="aadhaar_card" id="" class="dropify" data-height="100" data-allowed-file-extensions="pdf jpg jpeg"  data-default-file="<?php echo base_url();?>uploads/employee/others/<?php echo $res->aadhaar_card; ?>" data-max-file-size="4M" <?php echo(!empty($res->aadhaar_card) ? $res->aadhaar_card : 'required'); ?>>
                     <?php
                     }else{
                     ?>
                        <input type="file" name="aadhaar_card" id="" class="dropify" data-height="100" data-allowed-file-extensions="pdf jpg jpeg"  data-default-file="" data-max-file-size="4M" required="">
                     <?php
                     }
                     ?>

                  </div>
                  <input type="hidden" name="aadhaar_card_old" value="<?php echo(!empty($res->aadhaar_card) ? $res->aadhaar_card : ''); ?>">
               </div>
               <div class="col-lg-12 col-md-12 col-sm-12">
                  <label for="aadhaar_card2">Aadhaar Card Back/ Social Sercurity Card - International  *</label>
                  <div class="form-group border border-secondary aadhaar_card2">
                     
                     <?php
                     if(!empty($res->aadhaar_card2)){
                     ?>
                        <input type="file" name="aadhaar_card2" id="" class="dropify" data-height="100" data-allowed-file-extensions="pdf jpg jpeg"  data-default-file="<?php echo base_url();?>uploads/employee/others/<?php echo $res->aadhaar_card2; ?>" data-max-file-size="4M" <?php echo(!empty($res->aadhaar_card2) ? $res->aadhaar_card2 : 'required'); ?>>
                     <?php
                     }else{
                     ?>
                        <input type="file" name="aadhaar_card2" id="" class="dropify" data-height="100" data-allowed-file-extensions="pdf jpg jpeg"  data-default-file="" data-max-file-size="4M" required="">
                     <?php
                     }
                     ?>

                  </div>
                  <input type="hidden" name="aadhaar_card_old" value="<?php echo(!empty($res->aadhaar_card2) ? $res->aadhaar_card2 : ''); ?>">
               </div>
               <div class="col-12">
                  <button type="submit" class="btn btn-primary">Update</button>
               </div>
            </div>
         </div>
      </form>

   </div>
</div>



     