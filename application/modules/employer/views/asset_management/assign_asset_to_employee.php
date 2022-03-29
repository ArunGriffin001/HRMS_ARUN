<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('template/'); ?>employer/assets/css/jquery-datetimepicker.css">
<div class="header_btn">
   <div class="header-action">
      <a href="<?php echo base_url('employer/asset/employee_asset_list'); ?>" class="btn btn-primary float-right"><i class="fa fa-plus mr-2"></i>Back</a>
   </div>
</div>


<div class="section-body">
   <div class="container-fluid">
      <div class="card">
         <div class="card-body">
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
            <form method="post" action="<?php echo base_url('employer/asset/submit_to_employee'); ?>" data-parsley-validate="">
               <div class="row clearfix">
                  <div class="col-md-4">
                     <div class="form-group">
                        <label class="form-label">Asset type</label>
                        <select class="custom-select form-control" name="asset_type_id" data-parsley-required-message="Please select asset type" required="">
                           <option value="">Select type</option>
                           <?php
                           if(!empty($asset_type)){
                              foreach ($asset_type as  $asset_val) {
                           ?>
                              <option value="<?php echo $asset_val->id; ?>"><?php echo $asset_val->type_name; ?> </option>
                           <?php
                              }
                           }
                           ?>
                           </select>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label class="form-label">Employee name</label>
                        <select name="employee_id" class="form-control" data-parsley-required-message="Please select employee" required="" id="employee_id">
                           <option value=""> Select employee</option>
                           <?php
                           if(!empty($employee_list)){
                              foreach ($employee_list as $employee_val) {
                                 $emp_name = $employee_val->full_name;
                                 $emp_id = $employee_val->employee_id;
                              ?>
                              <option value="<?php echo trim($emp_id); ?>"><?php echo $emp_name; ?></option>
                              <?php
                              }
                           }
                           ?>

                        </select>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label class="form-label">Department</label>
                        <input type="text" class="form-control" id="dept_name" name="dept_name" readonly="" value="">
                        <input type="hidden" name="department_id" id="dept_id" value="">
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label class="form-label">Asset details</label>
                        <textarea name="asset_detail" row="5" class="form-control" placeholder="Details" data-parsley-required-message="Please enter details" required=""></textarea>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label class="form-label">Asset no</label>
                        <input type="text" name="asset_no" class="form-control" placeholder="Asset number" data-parsley-required-message="Please enter asset number" required="" >
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label class="form-label">Asset value</label>
                        <input type="number" name="asset_value" class="form-control" placeholder="Asset value" data-parsley-required-message="Please enter asset value" required="" step="0.01" min="1">
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label class="form-label">Assets status</label>
                        <select class="custom-select form-control" name="asset_status" data-parsley-required-message="Please select ststus" required="">
                           <option value="">Select status</option>
                           <option value="Given To Employee">Given To Employee</option>
                           <option value="Return To Employee">Return To Employee</option>
                           <option value="Lost To Employee">Lost To Employee</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label class="form-label">Issue date</label>
                        <input type="text" name="issue_date" id="issue_date" class="form-control" placeholder="YY-MM-DD" data-parsley-required-message="Issue date" required="" readonly="">
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label class="form-label">Valid till</label>
                        <input type="text" name="valid_till_date" id="valid_till_date" class="form-control" placeholder="YY-MM-DD" data-parsley-required-message="Issue date" required="" readonly="">
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label class="form-label">Returned on</label>
                        <input type="text" name="return_on_date" id="return_date" class="form-control" placeholder="YY-MM-DD" data-parsley-required-message="Issue date" readonly="">
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label class="form-label">Remarks</label>
                        <textarea row="5" name="remark" class="form-control" placeholder="Remark" data-parsley-required-message="Please enter remark" required=""></textarea>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label class="form-label">Description</label>
                        <textarea row="5" name="details" class="form-control" placeholder="Description" data-parsley-required-message="Please enter description" required=""></textarea>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                       <button type="submit" name="submit_seet" class="btn btn-primary">Submit</button>
                     </div>
                  </div>
               </div>
            </form>
        </div>         
     </div>
   </div>
 </div>

 <script type="text/javascript" src="<?php echo base_url('template/'); ?>employer/assets/js/jquery.datetimepicker.js"></script>
<script type="text/javascript">
   $('#issue_date').datetimepicker({
      format: 'Y-m-d',
      timepicker:false,
      //minDate: 0,
   });

   $('#valid_till_date').datetimepicker({
      format: 'Y-m-d',
      timepicker:false,
      //minDate: 0,
   });
   $('#return_date').datetimepicker({
      defaultDate: null,
      format: 'Y-m-d',
      timepicker:false,
      //minDate: 0,
   });
   
   $(document).ready(function(){
      $("#employee_id").on("change", function(){
         $.ajax({
             url: "<?php echo base_url('employer/asset/get_department'); ?>",
             type: "POST",
             data: {
                 employee_id:  $(this).val(),
             },
             dataType: "text",
             success: function (jsonStr) 
             {
               var dept_info = $.parseJSON(jsonStr);
               //alert(dept_info.dept_id)
               $('#dept_name').val(dept_info.dept_name);
               $('#dept_id').val(dept_info.dept_id)
                 //$("#get_state_list").html(jsonStr);
             }
         });  
      });

     

   });
</script> 