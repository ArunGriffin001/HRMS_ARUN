<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('template/'); ?>employer/assets/css/jquery-datetimepicker.css">
<link href=
'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css' rel='stylesheet'>
<script src=
"https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" >
</script>

<div class="section-body mt-3">
 
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

   <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center float-right mb-2">
            <div class="header-action">
                <a href="<?php echo base_url('employee/employee/resignation'); ?>" class="btn btn-primary float-right"><i class="fa fa-arrow-left mr-2"></i>Back</a>
            </div>
        </div>
    </div>

      <form method="post" action="<?php echo base_url('employee/employee/resignation/submit'); ?>" data-parsley-validate="" enctype="multipart/form-data">
         
         <div class="card">
            <div class="card-header">
               <h3 class="card-title">ADD RESIGNATION</h3>
            </div>
            <div class="card-body">
               <div class="row clearfix">
                  <div class="col-md-12 col-sm-12">
                     <div class="form-group">
                        <label>Main Reason *</label>
                        <textarea class="form-control leaving_reason" name="main_reason" placeholder="Reason" required></textarea> 
                     </div>
                  </div>
                  <div class="col-md-12 col-sm-12">
                     <div class="form-group">
                        <label>Other Reason *</label>
                        <textarea class="form-control leaving_reason" name="other_reason" placeholder="Reason" required></textarea> 
                     </div>
                  </div>
                  <div class="col-12">
                     <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
               </div>
            </div>
         </div>
      </form>

   </div>
 </div>

