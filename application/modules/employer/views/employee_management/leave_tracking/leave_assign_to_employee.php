<link rel="stylesheet" type="text/css" href="<?php echo base_url('template/'); ?>employer/assets/css/jquery-datetimepicker.css">
<div class="header_btn">
   <div class="header-action">
      <a href="<?php echo base_url('employer/emp-management/leave_assign_record/list'); ?>" class="btn btn-primary float-right"><i class="fa fa-plus mr-2"></i>Back</a>
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
      <form method="post" action="<?php echo base_url('employer/LeaveTracking/submitLeaveAssign'); ?>" data-parsley-validate="">
         <div class="card-header">
            <h3 class="card-title"><?php echo(!empty($page_sub_heading) ? $page_sub_heading : ''); ?></h3>
         </div>
         <div class="card-body">
            <div class="row clearfix">
               <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                  <label for="department_id">Select Department</label>
                  <select class="form-control " name="department_id" id="department_id"  data-parsley-required-message="Please select department" required="">
                       <option value="">Select department</option>
                       <?php
                       if(!empty($departments)){
                          foreach ($departments as $dept_val) {
                             ?>
                             <option value="<?php echo encode($dept_val->dep_id); ?>" ><?php echo $dept_val->dept_name; ?></option>
                             <?php
                          }
                       }
                       ?>
                  </select>
               </div>
               <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                  <label>Select Employee</label>
                  <select class="form-control " name="employee_id" id="get_user_list"  data-parsley-required-message="Please select employee" required="">
                       <option value="">Select employee</option>
                  </select>
               </div>

               <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                  <label for="leave_cat_id">Leave Category</label>
                  <select class="form-control leave_cat_id" name="leave_cat_id" id="leave_cat_id"  data-parsley-required-message="Please select leave category" required="">
                       <option value="">Select leave category</option>
                       <?php
                       if(!empty($leave_cat_list)){
                          foreach ($leave_cat_list as $leave_cat_val) {
                             ?>
                             <option value="<?php echo encode($leave_cat_val->leave_cat_id); ?>" amt="<?php echo $leave_cat_val->total_leave; ?>"><?php echo $leave_cat_val->leave_type_name; ?></option>
                             <?php
                          }
                       }
                       ?>
                  </select>
               </div>
               <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                  <label for="leave_assign_val">Leave value</label>
                  <input type="number" name="leave_assign_val" value="" class="form-control leave_assign_val" id="leave_assign_val" placeholder="Leave value" step="0.01" required="" min="1" max="" readonly>
                 
               </div>
              
               <div class="col-12">
                  <button type="submit" class="btn btn-primary">Submit</button>
               </div>
            </div>
         </div>
      </form>
   </div>
 </div>
 
<script type="text/javascript">
   
   $(document).ready(function(){
      $("#department_id").on("change", function(){
         $.ajax({
            url: "<?php echo base_url('employer/hrms/getDepartmentUsers'); ?>",
            type: "POST",
            data: {
                department_id:  $(this).val(),
            },
            dataType: "text",
            success: function (jsonStr) 
            {
              //alert(jsonStr)
                $("#get_user_list").html(jsonStr);
            }
         });  
      });

      $("#leave_cat_id").on("change", function(){
         let leave_amt = $('select[name=leave_cat_id] option:selected').attr('amt');
         $('.leave_assign_val').val(leave_amt);
         $(".leave_assign_val").attr("max",leave_amt);
      });
   });
</script>