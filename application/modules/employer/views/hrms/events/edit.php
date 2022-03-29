<link rel="stylesheet" type="text/css" href="<?php echo base_url('template/'); ?>employer/assets/css/jquery-datetimepicker.css">
<div class="header_btn">
   <div class="header-action">
      <a href="<?php echo base_url('employer/hrms/events/list'); ?>" class="btn btn-primary float-right"><i class="fa fa-plus mr-2"></i>Back</a>
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
      <form method="post" action="<?php echo base_url('employer/hrms/events/updateEvents/').encode($record->event_id); ?>" data-parsley-validate="">
         <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title" id="exampleModalLabel"><?php echo (!empty($page_sub_heading) ? $page_sub_heading : ''); ?></h5>
           </div>
           <div class="modal-body">
               <div class="row clearfix">
                  <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                      <label>Name</label>
                      <input type="text" name="title" value="<?php echo $record->title; ?>" class="form-control" placeholder="Name" required="" autocomplete="off" data-parsley-required-message="Please enter name">
                    </div>
                  </div>
                </div>
                <?php
                  $start_date = date('Y-m-d h:i A', strtotime($record->start));
                  $end_date = date('Y-m-d h:i A', strtotime($record->end));
                ?>
                <div class="row clearfix">
                  <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                      <label>Start Date</label>
                      <input type="text" name="start" value="<?php echo $start_date; ?>" id="start_date" class="form-control" placeholder="Start date" required="" autocomplete="off" data-parsley-required-message="Please enter start date">
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                      <label>End Date</label>
                        <input type="text" name="end" value="<?php echo $end_date; ?>" id="end_date" class="form-control" placeholder="End date" required="" autocomplete="off" data-parsley-required-message="Please enter end date">
                    </div>
                  </div>
               </div>
            </div>
            <div class="modal-footer text-left">
               <button type="submit" class="btn btn-primary">Submit</button>
            </div>
         </div>
      </form>
   </div>
 </div>
 <script type="text/javascript" src="<?php echo base_url('template/'); ?>employer/assets/js/jquery.js"></script>
 <script type="text/javascript" src="<?php echo base_url('template/'); ?>employer/assets/js/jquery.datetimepicker.js"></script>
 <script type="text/javascript">
   $('#start_date').datetimepicker({
        format: 'Y-m-d h:i a',
        formatTime:"h:i a",
        step:10,
    });
   $('#end_date').datetimepicker({
        format: 'Y-m-d h:i a',
        formatTime:"h:i a",
        step:10,    
    });
 </script>

