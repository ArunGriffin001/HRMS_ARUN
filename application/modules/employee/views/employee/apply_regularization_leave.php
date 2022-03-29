<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('template/'); ?>employer/assets/css/jquery-datetimepicker.css">

<div class="header_btn">
   <div class="header-action">
      <a href="<?php echo base_url('employee/employee/attendence'); ?>" class="btn btn-primary float-right"><i class="fa fa-plus mr-2"></i>Back</a>
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

      $this->login_data = $this->session->userdata('EmployeeLogin');
      $this->employee_id = $this->login_data['userId'];
      /*echo'<pre>';
      print_r($punch_info);*/
      $head_info = getDapartmentHead($this->employee_id);
      // echo'</pre>';
      //die;
      $supervisor_id = (!empty($head_info->employee_id) ? $head_info->employee_id : '');
      /*echo'<pre>';
      print_r($punching_info);
      echo'</pre>';*/

      $apply_date = date('m/d/Y', strtotime($punching_info->created_at)).' - '.date('m/d/Y', strtotime($punching_info->created_at));

      $punch_id = encode($punching_info->punching_id);


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
               
               <div class="col-md-6 col-sm-12">
                  <label for="to_date">Date *</label>
                   <div class="form-group"><input type="text" name="fromdate_todate" value="<?php echo $apply_date; ?>" class="form-control" data-parsley-required-message="Please enter  date " readonly placeholder="dates"></div>
                   <input type="hidden" name="punch_id" value="<?php echo $punch_id; ?>" required>
                  <!--  <span>Select the same date twice if you want single leave</span> -->

               </div>
               <div class="col-md-6 col-sm-12">
                  <label for="leave_reason">Reason</label>
                  <div class="form-group">
                     <textarea name="leave_reason" value="" class="form-control" id=""  data-parsley-required-message="Please enter to reason " placeholder="Reason" required></textarea>
                  </div>
               </div>
               <input type="hidden" name="leave_assign_id" value="" class="form-control leave_assign_id" id="leave_assign_val" required="">
               <br/>
               <?php
               if(!empty($supervisor_id)){
               ?>
               <div class="col-12 mt-4">
                  <button type="submit" class="btn btn-primary">Submit</button>
               </div>
               <?php
               }else{
               ?>
               <div class="col-12 mt-4">
                  Sorry you don't assign any manager so please contact your admin.
               </div>
               <?php
               }

               ?>
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

<!-- <script>
$(function() {
  $('input[name="fromdate_todate"]').daterangepicker({
    opens: 'left',
    
  }, function(start, end, label) {
    
  });
});
</script> -->