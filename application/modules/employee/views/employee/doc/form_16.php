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

      <form method="post" action="<?php echo base_url('employee/employee/upload_form_i6'); ?>" data-parsley-validate="" enctype="multipart/form-data" class="image_doc_upload">
         <div class="card-body">
            <div class="row clearfix">
               <div class="col-lg-12 col-md-12 col-sm-12">
                  <label for="form_16">Form 16</label>
                  <div class="form-group border border-secondary">
                     <?php
                     if(!empty($res->form_16)){
                     ?>
                        <input type="file" name="form_16" id="form_16" class="dropify" data-height="100" data-allowed-file-extensions="pdf"  data-default-file="<?php echo base_url();?>uploads/employee/others/<?php echo $res->form_16; ?>" data-max-file-size="4M" <?php echo(!empty($res->form_16) ? $res->form_16 : 'required'); ?> >
                     <?php
                     }else{
                     ?>
                        <input type="file" name="form_16" id="form_16" class="dropify" data-height="100" data-allowed-file-extensions="pdf"  data-default-file="" data-max-file-size="4M" required="">
                     <?php
                     }
                     ?>

                  </div>
                  <input type="hidden" name="form_16_old" value="<?php echo(!empty($res->form_16) ? $res->form_16 : ''); ?>">
               </div>
               <div class="col-12">
                  <button type="submit" class="btn btn-primary">Update</button> 
                  <!-- <?php
                  if(!empty($res->form_16)){
                  ?>
                  <a href="<?php echo base_url();?>uploads/employee/others/<?php echo $res->form_16; ?>" target="_blank" class="btn btn-info ml-3">Open Doc</a> 
                  <?php
                  }
                  ?> -->
               </div>
            </div>
         </div>
      </form>

   </div>
</div>



     