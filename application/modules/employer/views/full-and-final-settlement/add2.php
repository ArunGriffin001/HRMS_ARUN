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
      <form method="post" action="<?php echo base_url('employer/hrms/users/adduser'); ?>" data-parsley-validate="" enctype="multipart/form-data">
         <div class="card">
            <div class="card-header">
               <!-- <h3 class="card-title">User Details</h3> -->
            </div>
            <div class="card-body">
               <div class="row clearfix">
                  <div class="col-lg-6 col-md-6 col-sm-12">
                     <label for="first_name">Employee Name *</label>
                     <div class="form-group">
                        <select class="form-control custom-select search_emp" name="employer_id">
                           <option value=""> Select Employee</option>
                           <?php 
                           if(!empty($employee_list)){
                              foreach ($employee_list as $emp_val) {
                              ?>
                              <option value="<?php echo $emp_val->employee_id; ?>"><?php echo $emp_val->full_name.' (Department: '.$emp_val->dept_name.')'; ?></option>
                              <?php
                              }
                           }
                           ?>
                        </select>
                     </div>
                  </div>
               </div>
            </div>
         </div>
        
         <div class="card">
            <div class="card-header">
               <h3 class="card-title">RESIGNATION DETAILS</h3>
            </div>
            <div class="card-body">
               <div class="row clearfix">
                  <div class="col-md-6 col-sm-12">
                     <label>Resignation Submitted On</label>
                     <div class="form-group">
                        <input class="form-control res_sub_date" type="text" value="" name="res_sub_date" placeholder="Select Date"> 
                     </div>
                  </div>
              
                  <div class="col-md-6 col-sm-12">
                     <div class="form-group">
                        <label>Leaving Date</label>
                         <input class="form-control leaving_date" type="text" name="leaving_date" placeholder="Select Date">
                     </div>
                  </div>
                  <div class="col-md-6 col-sm-12">
                     <div class="form-group">
                        <label>Leaving Reason *</label>
                        <textarea class="form-control leaving_reason" name="leaving_reason" placeholder="Reason"></textarea> 
                     </div>
                  </div>
                  <div class="col-md-6 col-sm-12">
                     <div class="form-group">
                        <label>Settlement Date.</label>
                        <input class="form-control settlement_date" type="text" name="settlement_date" placeholder="Select Date">  
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="card">
            <div class="card-header">
               <h3 class="card-title">NOTICE PAY</h3>
            </div>
            <div class="card-body">
               <div class="row clearfix">
                  <div class="col-md-6 col-sm-12">
                     <label>Notice Period</label>
                     <div class="form-group">
                        <input type="text" class="form-control notice_period" type="notice_period" name="notice_period" placeholder="">
                     </div>
                  </div>
              
                  <div class="col-md-6 col-sm-12">
                     <div class="form-group">
                        <label>No of Days Served *</label>
                        <input class="form-control no_of_day_serve" type="text" name="no_of_day_serve" placeholder="">
                     </div>
                  </div>
                  <div class="col-md-6 col-sm-12">
                     <div class="form-group">
                        <label>Shortfall in Notice</label>
                        <input class="form-control shortfall_notice" type="text" name="shortfall_notice" placeholder=""> 
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <div class="card">
            <div class="card-header">
               <h3 class="card-title">WORK DAYS</h3>
            </div>
            <div class="card-body">
               <div class="row clearfix">
                  <div class="col-md-6 col-sm-12">
                     <label>Payroll Month</label>
                     <div class="form-group">
                        <input class="form-control payroll_month" type="number" name="payroll_month" min="0" placeholder="Paroll month">
                     </div>
                  </div>
              
                  <div class="col-md-6 col-sm-12">
                     <div class="form-group">
                        <label>Work Days</label>
                        <input class="form-control work_day" type="text" name="work_day" min="0" placeholder="Work days">
                     </div>
                  </div>
                  <div class="col-md-6 col-sm-12">
                     <div class="form-group">
                        <label>Days Worked</label>
                        <input class="form-control days_work" type="text" name="days_work" placeholder="Days work"> 
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="card">
            <div class="card-header">
               <h3 class="card-title">LEAVE ENCASHMENT</h3>
            </div>
            <div class="card-body">
               <div class="row clearfix">
                  <div class="col-md-6 col-sm-12">
                     <label>Leave Type</label>
                     <div class="form-group">
                        <input class="form-control" type="text" name="name" placeholder="">
                     </div>
                  </div>
              
                  <div class="col-md-6 col-sm-12">
                     <div class="form-group">
                        <label>Balance</label>
                        <input class="form-control" type="text" name="name" placeholder="">
                     </div>
                  </div>
                  <div class="col-md-6 col-sm-12">
                     <div class="form-group">
                        <label>Encashment</label>
                        <input class="form-control" type="text" name="name" placeholder=""> 
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="card">
            <div class="card-header">
               <h3 class="card-title">REMARKS</h3>
            </div>
            <div class="card-body">
               <div class="row clearfix">
                  <div class="col-md-6 col-sm-12">
                     <label>Remarks</label>
                     <div class="form-group">
                        <textarea class="form-control"rows="5"></textarea>
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <div class="row clearfix mb-5">
            <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
         </div>
         
      </form>

   </div>
 </div>
 <script type="text/javascript">
   $(document).ready(function(){
         $("#get_country_list").on("change", function(){
            $.ajax({
                url: "<?php echo base_url('employer/get_state'); ?>",
                type: "POST",
                data: {
                    cntry:  $(this).val(),
                },
                dataType: "text",
                success: function (jsonStr) 
                {
                  //alert(jsonStr)
                    $("#get_state_list").html(jsonStr);
                }
            });  
      });

     $("#get_state_list").on("change", function(){

         $.ajax({
             url: "<?php echo base_url('employer/get_city'); ?>",
             type: "POST",
             data: {
                 state:  $(this).val(),
             },
             dataType: "text",
             success: function (jsonStr) 
             {
                 $("#city_list").html(jsonStr);
             }
         }); 
     });

     // get grade data as per level changes
     $(".level_name").on("change", function(){
            $.ajax({
                url: "<?php echo base_url('employer/get_level_grade'); ?>",
                type: "POST",
                data: {
                    level_id:  $(this).val(),
                },
                dataType: "text",
                success: function (jsonStr) 
                {
                  //alert(jsonStr)
                    $(".grade_name").html(jsonStr);
                }
            });  
      });

   });
</script> 


<!--  <script type="text/javascript" src="<?php echo base_url('template/'); ?>employer/assets/js/jquery.datetimepicker.js"></script>
<script type="text/javascript">
   $('#dob').datetimepicker({
      format: 'Y-m-d',
      timepicker:false,
   });
</script> -->
<script>
  $(document).ready(function() {
      $(function() {
          $( ".res_sub_date" ).datepicker({
         changeYear: true,
         dateFormat: 'yy-mm-dd',
         maxDate: new Date()
       });
       $( ".leaving_date" ).datepicker({
         changeYear: true,
         dateFormat: 'yy-mm-dd',
         maxDate: new Date()
       });
       $( ".settlement_date" ).datepicker({
         changeYear: true,
         dateFormat: 'yy-mm-dd',
         maxDate: new Date()
       });
      });

  })
</script>
