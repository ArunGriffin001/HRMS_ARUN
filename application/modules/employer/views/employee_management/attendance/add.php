<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
<div class="header_btn">
   <div class="header-action">
      <a href="<?php echo base_url('employer/emp-management/attendance'); ?>" class="btn btn-primary float-right"><i class="fa fa-plus mr-2"></i>Back</a>
   </div>
</div>
<div class="section-body mt-3">
   <form method="post" action="<?php echo base_url('employer/emp-management/attendance/add'); ?>">
      <div class="card">
         <div class="card-body">
            <div class="row">
               
               <div class="col-md-4 col-sm-4">
                  <label for="department">Select Department</label>
                  <select class="form-control" name="employee_department">
                     <option>Select department</option>
                     <?php
                     $dept_name = '';
                     $selected = '';
                     if(!empty($departments)){
                        foreach ($departments as $dept_val) {
                           if($current_detp == $dept_val->dep_id){
                              $dept_name = $dept_val->dept_name;
                              $selected = 'selected';
                           }
                           ?>
                           <option value="<?php echo $dept_val->dep_id; ?>" <?php echo $selected; ?> ><?php echo $dept_val->dept_name; ?></option>
                           <?php
                            $selected = '';
                        }
                     }
                     ?>
                  </select>
               </div>
               <div class="col-md-4 col-sm-4">
                  <label>Select Date</label>
                  <div class="input-group">
                     <input type="text" class="form-control attendence_date" name="attendence_date" id="attendence_date" placeholder="Date" required="" autocomplete="off" data-parsley-required-message="Please enter from date" readonly="" value="<?php echo $current_date; ?>">
                  </div>
               </div>
               <div class="col-md-4 col-sm-4">
                  <label></label>
                 <button type="submit" class="btn btn-sm btn-primary btn-block form-control  mt-2">Search</button>
               </div>
            </div>
         </div>
      </div>
   </form>
</div>
<div class="section-body mt-3">
   <form method="post" action="<?php echo base_url('employer/emp-management/attendance/addAttendence'); ?>">
      <div class="card">
         <div class="row clearfix">
            <div class="col-12">
               <?php
                  if($this->session->flashdata('errorclass') !=''){
                    
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
               <div class="table-responsive">
                  <table class="table table-striped">
                     <thead>
                        <tr>
                           <th style="text-align:center">Employee Name</th>
                            <th style="text-align:center">Departmengt</th>
                           <th style="text-align:center">Status</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                        $emp_arr = array();
                        if(!empty($employee_list)){
                           foreach ($employee_list as $key => $emp) {
                              $no = rand(0,100);
                              $emp_arr[] = $emp->employee_id;
                           ?>
                           <tr>
                              <td><?php echo $emp->first_name.' '.$emp->last_name; ?></td>
                              <td><?php echo $dept_name; ?></td>
                              <td>
                                 <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                   <input type="radio" class="btn-check" name="attendence_status_<?php echo $emp->employee_id; ?>" value="Present" id="attendence_status_<?php echo $no+1; ?>"  autocomplete="off" data-parsley-required-message="select check attendence" required checked>
                                   <label class="btn btn-outline-primary" for="attendence_status_<?php echo $no+1; ?>">Present</label>

                                   <input type="radio" class="btn-check" name="attendence_status_<?php echo $emp->employee_id; ?>" value="Half Day" id="attendence_status_<?php echo $no+5; ?>" autocomplete="off" data-parsley-required-message="select check attendence" required>
                                   <label class="btn btn-outline-primary" for="attendence_status_<?php echo $no+5; ?>">Half Day</label>

                                   <input type="radio" class="btn-check" name="attendence_status_<?php echo $emp->employee_id; ?>" value="Absent" id="attendence_status_<?php echo $no+7; ?>" autocomplete="off" data-parsley-required-message="select check attendence" required>
                                   <label class="btn btn-outline-primary" for="attendence_status_<?php echo $no+7; ?>">Absent</label>
                                 </div>
                              </td>
                           </tr>
                           <?php
                           }
                        }else{
                        ?>
                        <tr><td colspan="3"> Record not found!</td></tr>
                        <?php
                        }
                        ?>
                     </tbody>
                  </table>
               </div> 
            </div>
         </div>
      </div>
      <div class="card11">
         <div class="card-body">
            <div class="row">
               <div class="col-md-12 col-sm-12">
                  <div class="box-center">
                     <?php
                     if(count($employee_list) > 0){
                     ?>
                        <input type="hidden" name="emp_data" value="<?php echo encode($emp_arr); ?>">
                        <input type="hidden" name="dept_data" value="<?php echo encode($current_detp); ?>">
                        <input type="hidden" name="attendance_date" value="<?php echo $current_date; ?>" class="attend_date">
                        <button type="submit" class="btn btn-primary box-center">Submit Attendance</button>
                     <?php
                     }
                     ?>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </form>
</div>

<style>

.bd-example>.btn, .bd-example>.btn-group {
    margin: .25rem .125rem;
}

.btn-group, .btn-group-vertical {
    position: relative;
    display: inline-flex;
    vertical-align: middle;
}

.btn-check {
    position: absolute;
    clip: rect(0,0,0,0);
    /*pointer-events: none;*/
}
button, input, optgroup, select, textarea {
    margin: 0;
    font-family: inherit;
    font-size: inherit;
    line-height: inherit;
}
.btn-group>.btn-group:not(:last-child)>.btn, .btn-group>.btn:not(:last-child):not(.dropdown-toggle) {
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
}

.bd-example::after {
    display: block;
    clear: both;
    content: "";
}

.btn-check:active+.btn-outline-primary, .btn-check:checked+.btn-outline-primary, .btn-outline-primary.active, .btn-outline-primary.dropdown-toggle.show, .btn-outline-primary:active {
    color: #fff;
    background-color: #0d6efd;
    border-color: #0d6efd;
}

.btn-group-vertical>.btn, .btn-group>.btn {
    position: relative;
    flex: 1 1 auto;
}


element.style {
}
.btn-group>.btn-group:not(:last-child)>.btn, .btn-group>.btn:not(:last-child):not(.dropdown-toggle) {
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
}
.btn-group-vertical>.btn-check:checked+.btn, .btn-group-vertical>.btn-check:focus+.btn, .btn-group-vertical>.btn.active, .btn-group-vertical>.btn:active, .btn-group-vertical>.btn:focus, .btn-group-vertical>.btn:hover, .btn-group>.btn-check:checked+.btn, .btn-group>.btn-check:focus+.btn, .btn-group>.btn.active, .btn-group>.btn:active, .btn-group>.btn:focus, .btn-group>.btn:hover {
    z-index: 1;
}
.btn-group>.btn-group:not(:first-child), .btn-group>.btn:not(:first-child) {
    margin-left: -1px;
}
.btn-check:active+.btn-outline-primary, .btn-check:checked+.btn-outline-primary, .btn-outline-primary.active, .btn-outline-primary.dropdown-toggle.show, .btn-outline-primary:active {
    color: #fff;
    background-color: #0d6efd;
    border-color: #0d6efd;
}
.btn-group-vertical>.btn, .btn-group>.btn {
    position: relative;
    flex: 1 1 auto;
}
.btn-outline-primary:hover {
    color: #fff;
    background-color: #0d6efd;
    border-color: #0d6efd;
}
.btn:hover {
    color: #212529;
}
.btn-outline-primary {
    color: #0d6efd;
    border-color: #0d6efd;
}


.btn-group>.btn-group:not(:first-child), .btn-group>.btn:not(:first-child) {
    margin-left: -1px;
}

.btn-group-vertical>.btn-check:checked+.btn, .btn-group-vertical>.btn-check:focus+.btn, .btn-group-vertical>.btn.active, .btn-group-vertical>.btn:active, .btn-group-vertical>.btn:focus, .btn-group-vertical>.btn:hover, .btn-group>.btn-check:checked+.btn, .btn-group>.btn-check:focus+.btn, .btn-group>.btn.active, .btn-group>.btn:active, .btn-group>.btn:focus, .btn-group>.btn:hover {
    z-index: 1;
}

.box-center{
   margin: 0 auto;
    display: flex;
    margin-bottom: 30px;
}
</style> 
<script src="<?php echo base_url('template/'); ?>employer/assets/js/jquery.min.js"></script>
<script src="<?php echo base_url('template/'); ?>employer/assets/js/jquery-ui.min.js"></script>
<script type="text/javascript">
   $('#attendence_date').datepicker({
       dateFormat: 'yy-mm-dd',
       autoclose: true,
    }).datepicker("setDate",'now');

   $('#attendence_date').change( function(){
      $('.attend_date').val($(this).val());
      //alert( "Handler for .change() called." );
   });

</script>