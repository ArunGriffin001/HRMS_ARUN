<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
<div class="header_btn">
   <div class="header-action">
      <a href="<?php echo base_url('employer/emp-management/leave_tracking/list'); ?>" class="btn btn-primary float-right"><i class="fa fa-plus mr-2"></i>Back</a>
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
      <form method="post" action="<?php echo base_url('employer/emp-management/leave_tracking/update_emp_leave/'.encode($record->leave_tracking_id)); ?>" data-parsley-validate="">
         <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title" id="exampleModalLabel"><?php echo (!empty($page_sub_heading) ? $page_sub_heading : ''); ?></h5>
           </div>
           <div class="modal-body">
               <div class="row clearfix">
                  <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                      <label>Name</label>
                      <input type="text" value="<?php echo $record->first_name.' '.$record->last_name; ?>" class="form-control" required="" autocomplete="off" readonly>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                      <label>Leave Type</label>
                      <select class="form-control" name="leave_type">
                        <?php
                        if(!empty($leave_type)){
                          foreach ($leave_type as $leave_type_val) {
                            ?>
                            <option value="<?php echo $leave_type_val->leave_cat_id; ?>" <?php echo ($leave_type_val->leave_cat_id == $record->leave_type ?'selected' : ''); ?> ><?php echo $leave_type_val->leave_type_name; ?></option>
                            <?php
                          }
                         }
                         ?>
                      </select>
                    </div>
                  </div>
                </div>
               
               <div class="row clearfix">
                 <?php
                  $from_date = date('Y-m-d', strtotime($record->from_date));
                  $to_date = date('Y-m-d', strtotime($record->to_date));
                ?>
                  <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                      <label>From Date</label>
                      <input type="text" name="from_date" value="<?php echo $from_date; ?>" id="from_date" class="form-control" placeholder="From date" required="" autocomplete="off" data-parsley-required-message="Please enter from date">
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                      <label>To Date</label>
                        <input type="text" name="to_date" value="<?php echo $to_date; ?>" id="todate_date" class="form-control" placeholder="To date" required="" autocomplete="off" data-parsley-required-message="Please enter to date">
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                      <label>Leave Day</label>
                     <select class="form-control" name="leave_val" data-parsley-required-message="Please select leave day">
                      <option value="half day" <?php echo($record->leave_reason == 'half day' ? 'selected' : ''); ?> >Half Day</option>
                      <option value="full day" <?php echo($record->leave_reason == 'full day' ? 'selected' : ''); ?> >Full Day</option>
                     </select>
                    </div>
                  </div>
                </div>
                <div class="row clearfix">
                  <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                      <label>Reason</label>
                      <textarea name="leave_reason" class="form-control" data-parsley-required-message="Please enter reason" required=""><?php echo$record->leave_reason;  ?></textarea>
                    </div>
                  </div>
                </div>
            </div>
            <div class="modal-footer text-left">
               <button type="submit" class="btn btn-primary">Update</button>
            </div>
         </div>
      </form>
   </div>
 </div>
 <!-- <script type="text/javascript" src="<?php echo base_url('template/'); ?>employer/assets/js/jquery.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script> -->
 <script src="<?php echo base_url('template/'); ?>employer/assets/js/jquery.min.js"></script>
  <script src="<?php echo base_url('template/'); ?>employer/assets/js/jquery-ui.min.js"></script>
 <script type="text/javascript">
   $('#from_date').datepicker({
       dateFormat: 'yy-mm-dd',
       autoclose: true,
    });
   $('#todate_date').datepicker({
       dateFormat: 'yy-mm-dd',
       autoclose: true,
          
    });
  </script>


