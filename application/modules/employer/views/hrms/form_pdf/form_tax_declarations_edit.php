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
      <form method="post" action="<?php echo base_url('employer/form_tax_declarations'); ?>" data-parsley-validate="" enctype="multipart/form-data">
         <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title" id="exampleModalLabel"><?php echo (!empty($page_sub_heading) ? $page_sub_heading : ''); ?></h5>
           </div>
           <div class="modal-body">
               <div class="row clearfix">
                    <div class="col-md-12 col-sm-12">
                     <div class="form-group">
                      <lable class="mb-2">Update tax declarations</lable>
                      <br>
                     
                      <input type="hidden" name="old_pdf" value="<?php echo (!empty($form_16_info->doc_url) ? $form_16_info->doc_url : ''); ?>">

                      <?php
                          if(!empty($form_16_info->doc_url)){
                          ?>
                         <input type="file" name="doc_url" class="dropify" data-height="200"  data-allowed-file-extensions="pdf" class="form-control" data-default-file="<?php echo base_url();?>uploads/employer/users/form_16/<?php echo $form_16_info->doc_url; ?>"  <?php echo (!empty($form_16_info->doc_url) ? $form_16_info->doc_url : 'required');?> >
                          <?php
                          }else{
                          ?>
                          <input type="file" name="doc_url" class="dropify" data-height="100"  data-allowed-file-extensions="pdf" class="form-control" data-default-file="" data-max-file-size="2M" required>
                          <?php
                          }
                          ?>
                     </div>
                    </div>
                    <?php 
                    if(!empty($form_16_info->doc_url)){

                    ?>
                    <br>
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                        <lable class="mb-2">Uploaded file link: </lable>
                        
                            <a class="btn btn-primary" href="<?php echo base_url();?>uploads/employer/users/form_16/<?php echo $form_16_info->doc_url; ?>">See  file</a>
                        
                        </div>
                    </div>
                    <?php } ?>

               </div>
            </div>
            
            <div class="modal-footer">
               <button type="submit" class="btn btn-primary">Update</button>
            </div>
         </div>
      </form>
   </div>
 </div>
 
   <script type="text/javascript">
        $(document).ready(function(){
            $('.dropify').dropify();
        });
    </script>
<style type="text/css">
    button.dropify-clear {
    display: none !important;
}
</style>
  