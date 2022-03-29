<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('template/'); ?>employer/assets/css/jquery-datetimepicker.css">

<div class="header_btn">
   <div class="header-action">
      <a href="<?php echo base_url('employee/employee/leave'); ?>" class="btn btn-primary float-right"><i class="fa fa-plus mr-2"></i>Back</a>
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
      <form method="post" action="<?php echo base_url('employee/employee/submit_leave'); ?>" data-parsley-validate="">
         <div class="card-body">
            <div class="row clearfix">
               <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                  <label for="leave_type">Leave Type</label>
                  <select class="form-control " name="leave_cat_type" id="leave_type"  data-parsley-required-message="Please select leave type" required="">
                     <option value="">Select Leave Type</option>
                     <?php
                     if(!empty($get_leave_info)){
                        foreach ($get_leave_info as $leave_val) {
                          ?>
                          <option value="<?php echo encode($leave_val->leave_cat_id); ?>" elementor_id="<?php echo encode($leave_val->assign_id); ?>"><?php echo $leave_val->leave_cat_name; ?></option>
                          <?php
                        }
                     }
                     ?>
                  </select>
                  
               </div>
               <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                  <label for="leave_val">Day</label>
                  <select class="form-control " name="leave_val" id="leave_val"  data-parsley-required-message="Please select days" required="">
                     <?php 
                     $half = 'Half';
                     $full = 'Full';
                     $half = encode($half);
                     $full = encode($full);
                     ?>
                    <option value="">Select day</option>
                    <option value="<?php echo $full; ?>">Full</option>
                    <option value="<?php echo $half; ?>">Half</option>
                  </select>
               </div>              
               <!-- <div class="col-md-6 col-sm-12">
                  <label for="from_date">From Date *</label>
                   <div class="form-group"><input type="text" name="from_date" value="" class="form-control" id="from_date"  data-parsley-required-message="Please enter from date " readonly placeholder="From date" required></div>
               </div>
               <div class="col-md-6 col-sm-12">
                  <label for="to_date">To Date *</label>
                   <div class="form-group"><input type="text" name="to_date" value="" class="form-control" id="to_date"  data-parsley-required-message="Please enter to date " readonly placeholder="To date" required></div>
               </div> -->
               <div class="col-md-6 col-sm-12">
                  <label for="to_date">Date *</label>
                   <div class="form-group"><input type="text" name="fromdate_todate" value="" class="form-control" data-parsley-required-message="Please enter  date " readonly placeholder="dates" required></div>
                   <span>Select the same date twice if you want single leave</span>

               </div>
               <div class="col-md-6 col-sm-12">
                  <label for="leave_reason">Reason</label>
                  <div class="form-group">
                     <textarea name="leave_reason" value="" class="form-control" id=""  data-parsley-required-message="Please enter to reason " placeholder="Reason" required></textarea>
                  </div>
               </div>
               <input type="hidden" name="leave_assign_id" value="" class="form-control leave_assign_id" id="leave_assign_val" required="">
               <br/>
               <div class="col-12 mt-4">
                  <button type="submit" class="btn btn-primary">Submit</button>
               </div>
            </div>
         </div>
      </form>
   </div>
 </div>
 <script type="text/javascript" src="<?php echo base_url('template/'); ?>employer/assets/js/jquery.datetimepicker.js"></script>
<script type="text/javascript">
   $('#from_date').datetimepicker({
      format: 'Y-m-d',
      timepicker:false,
      //minDate: 0,
   });

   $('#to_date').datetimepicker({
      format: 'Y-m-d',
      timepicker:false,
      //minDate: 0,
   });

   $("#leave_type").on("change", function(){
       let elementor_id = $('select[name=leave_cat_type] option:selected').attr('elementor_id');
       $('.leave_assign_id').val(elementor_id);
    });

</script>

<script>
$(function() {
  $('input[name="fromdate_todate"]').daterangepicker({
    opens: 'left',
    
  }, function(start, end, label) {
    /*console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));*/
  });
});
</script>