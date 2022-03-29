
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

      <form method="post" action="<?php echo base_url('employee/employee/upload_bank_statement'); ?>" data-parsley-validate="" enctype="multipart/form-data" class="image_doc_upload_bank_statement">
         <div class="card-body">
            <div class="row clearfix">
               <div class="col-lg-12 col-md-12 col-sm-12">
                  <label for="bank_statement">Bank statement of first months - showing salary received *</label>
                  <div class="form-group border border-secondary bank_statement">
                     <?php
                     if(!empty($res->bank_statement)){
                     ?>
                        <input type="file" name="bank_statement" id="" class="dropify" data-height="100" data-allowed-file-extensions="pdf jpg jpeg"  data-default-file="<?php echo base_url();?>uploads/employee/others/<?php echo $res->bank_statement; ?>" data-max-file-size="4M" <?php echo(!empty($res->bank_statement) ? $res->bank_statement : 'required'); ?>>
                     <?php
                     }else{
                     ?>
                        <input type="file" name="bank_statement" id="" class="dropify" data-height="100" data-allowed-file-extensions="pdf jpg jpeg"  data-default-file="" data-max-file-size="4M" required="">
                     <?php
                     }
                     ?>

                  </div>
                  <input type="hidden" name="bank_statement_old" value="<?php echo(!empty($res->bank_statement) ? $res->bank_statement : ''); ?>">
               </div>
               <div class="col-lg-12 col-md-12 col-sm-12">
                  <label for="bank_statement2">Bank statement of second months - showing salary received *</label>
                  <div class="form-group border border-secondary bank_statement2">
                     <?php
                     if(!empty($res->bank_statement2)){
                     ?>
                        <input type="file" name="bank_statement2" id="" class="dropify" data-height="100" data-allowed-file-extensions="pdf jpg jpeg"  data-default-file="<?php echo base_url();?>uploads/employee/others/<?php echo $res->bank_statement2; ?>" data-max-file-size="4M" <?php echo(!empty($res->bank_statement2) ? $res->bank_statement2 : 'required'); ?>>
                     <?php
                     }else{
                     ?>
                        <input type="file" name="bank_statement2" id="" class="dropify" data-height="100" data-allowed-file-extensions="pdf jpg jpeg"  data-default-file="" data-max-file-size="4M" required="">
                     <?php
                     }
                     ?>

                  </div>
                  <input type="hidden" name="bank_statement2_old" value="<?php echo(!empty($res->bank_statement2) ? $res->bank_statement2 : ''); ?>">
               </div>
               <div class="col-lg-12 col-md-12 col-sm-12">
                  <label for="bank_statement3">Bank statement of thired months - showing salary received *</label>
                  <div class="form-group border border-secondary bank_statement3">
                     <?php
                     if(!empty($res->bank_statement3)){
                     ?>
                        <input type="file" name="bank_statement3" id="" class="dropify" data-height="100" data-allowed-file-extensions="pdf jpg jpeg"  data-default-file="<?php echo base_url();?>uploads/employee/others/<?php echo $res->bank_statement3; ?>" data-max-file-size="4M" <?php echo(!empty($res->bank_statement3) ? $res->bank_statement3 : 'required'); ?>>
                     <?php
                     }else{
                     ?>
                        <input type="file" name="bank_statement3" id="" class="dropify" data-height="100" data-allowed-file-extensions="pdf jpg jpeg"  data-default-file="" data-max-file-size="4M" required="">
                     <?php
                     }
                     ?>

                  </div>
                  <input type="hidden" name="bank_statement3_old" value="<?php echo(!empty($res->bank_statement3) ? $res->bank_statement3 : ''); ?>">
               </div>
               <div class="col-12">
                  <button type="submit" class="btn btn-primary">Update</button> 
                  <!-- <?php
                  if(!empty($res->bank_statement)){
                  ?>
                  <a href="<?php echo base_url();?>uploads/employee/others/<?php echo $res->bank_statement; ?>" target="_blank" class="btn btn-info ml-3">Open Doc</a> 
                  <?php
                  }
                  ?> -->
               </div>
            </div>
         </div>
      </form>

   </div>
</div>



     