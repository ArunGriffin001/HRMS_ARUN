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

      <form method="post" action="<?php echo base_url('employee/employee/upload_revision_letter'); ?>" data-parsley-validate="" enctype="multipart/form-data" class="image_doc_upload1111">
         <div class="card-body">
            <div class="row clearfix">
               <div class="col-lg-12 col-md-12 col-sm-12">
                  <label for="revision_letter">Revision Letter if any</label>
                  <div class="form-group border border-secondary">
                     <?php
                     if(!empty($res->revision_letter)){
                     ?>
                        <input type="file" name="revision_letter" id="revision_letter" class="dropify" data-height="100" data-allowed-file-extensions="pdf jpg jpeg"  data-default-file="<?php echo base_url();?>uploads/employee/others/<?php echo $res->revision_letter; ?>" data-max-file-size="4M">
                     <?php
                     }else{
                     ?>
                        <input type="file" name="revision_letter" id="revision_letter" class="dropify" data-height="100" data-allowed-file-extensions="pdf jpg jpeg"  data-default-file="" data-max-file-size="4M">
                     <?php
                     }
                     ?>

                  </div>
                  <input type="hidden" name="revision_letter_old" value="<?php echo(!empty($res->revision_letter) ? $res->revision_letter : ''); ?>">
               </div>
               <div class="col-12">
                  <button type="submit" class="btn btn-primary">Update</button> 
                  <!-- <?php
                  if(!empty($res->revision_letter)){
                  ?>
                  <a href="<?php echo base_url();?>uploads/employee/others/<?php echo $res->revision_letter; ?>" target="_blank" class="btn btn-info ml-3">Open Doc</a> 
                  <?php
                  }
                  ?> -->
               </div>
            </div>
         </div>
      </form>

   </div>
</div>



     