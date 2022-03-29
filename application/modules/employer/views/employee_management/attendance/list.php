<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
<div class="header_btn">
  <div class="header-action">   
    <a href="<?php echo base_url('employer/emp-management/attendance/add'); ?>" class="btn btn-primary float-right"><i class="fa fa-plus mr-2"></i>Add Attendance</a>
  </div>
  </div>
<!-- <div class="section-body mt-3 attendance-search">
     <div class="container-fluid">
         <div class="row clearfix">
             <div class="col-md-12">
                 <div class="card">
                     <div class="card-body">
                         <div class="row">
                             <div class="col-lg-4 col-md-4 col-sm-6">
                                 <label>Search</label>
                                 <div class="input-group"><input type="text" class="form-control" placeholder="Employee name" /></div>
                             </div>
                             <div class="col-lg-3 col-md-4 col-sm-6">
                                 <label>Select Month</label>
                                 <div class="multiselect_div">
                                     <select class="custom-select">
                                         <option>Select Month</option>
                                         <option>Jan</option>
                                         <option>Feb</option>
                                         <option>Mar</option>
                                         <option>Apr</option>
                                         <option>May</option>
                                         <option>Jun</option>
                                         <option>Jul</option>
                                         <option>Aug</option>
                                         <option>Sep</option>
                                         <option>Oct</option>
                                         <option>Nov</option>
                                         <option>Dec</option>
                                     </select>
                                 </div>
                             </div>
                             <div class="col-lg-3 col-md-4 col-sm-6">
                                 <label>Select Year</label>
                                 <div class="form-group">
                                     <select class="custom-select">
                                         <option>select Year</option>
                                         <option value="1">2015</option>
                                         <option value="1">2016</option>
                                         <option value="1">2017</option>
                                         <option value="1">2018</option>
                                         <option value="1">2019</option>
                                         <option value="1">2020</option>
                                         <option value="1">2021</option>
                                     </select>
                                 </div>
                             </div>
                             <div class="col-lg-2 col-md-4 col-sm-6"><label>&nbsp;</label><a href="javascript:void(0)" class="btn btn-sm btn-primary btn-block">Search</a></div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
</div> -->

<div class="section-body mt-3 attendance-search">
  <form method="post" action="<?php echo base_url('employer/emp-management/attendance'); ?>" data-parsley-validate="">
    <div class="card">
     <div class="card-body">
        <div class="row">
          <div class="col-md-4 col-sm-4">
            <label for="department">Select Department</label>
            <select class="form-control" name="employee_department" id="employee_department" data-parsley-required-message="Please select department name" required="">
                 <option value="">Select department</option>
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
                       <option value="<?php echo encode($dept_val->dep_id); ?>" <?php echo $selected; ?> ><?php echo $dept_val->dept_name; ?></option>
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
           <div class="col-md-4 col-sm-4 mt-2">
              <label></label>
              
             <button type="submit" class="btn btn-sm btn-primary btn-block form-control  mt-2">Submit</button>
           </div>
        </div>
     </div>
    </div>
   </form>
</div>

<div class="section-body mt-3 attendance-table">
     <div class="container-fluid">
         <div class="row clearfix">
             <div class="col-md-12">
                 <div class="row">
                     <div class="col-lg-12">

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

                             <table class="table table-hover table-striped table-vcenter text-nowrap mb-0" id="attendence_tracking">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center"><?php echo $this->lang->line('sr_no'); ?></th>
                                            <th style="text-align:center"><?php echo $this->lang->line('tb_employee_name'); ?></th>
                                            <th style="text-align:center"><?php echo $this->lang->line('tb_department'); ?></th>
                                            <th style="text-align:center"><?php echo $this->lang->line('tb_date'); ?></th>
                                            <th style="text-align:center"><?php echo $this->lang->line('tb_status'); ?></th>
                                           <!--  <th style="text-align:center"><?php echo $this->lang->line('tb_action'); ?></th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        if(!empty($employee_list)){
                                            foreach ($employee_list as $emp_val) {
                                            ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td>
                                                    <div class="font-15"><?php echo $emp_val->first_name.' '.$emp_val->last_name; ?></div>
                                                </td>
                                                <td><?php echo $emp_val->dept_name; ?></td>
                                                <td><?php echo date('Y-m-d',strtotime($emp_val->attendance_date)); ?></td>
                                                <td>
                                                    <select class="btn btn-white btn-sm btn-rounded dropdown-toggle attendence_status" row_id="<?php echo encode($emp_val->attendance_id); ?>" employee_id="<?php echo encode($emp_val->employee_id); ?>" dept_id="<?php echo encode($emp_val->department_id); ?>"  >
                                                        <option value="Present" <?php echo ($emp_val->attendence_status == 'Present' ? 'selected' : ''); ?> > <i class="fa fa-dot-circle-o text-info"></i> Present </option>
                                                        <option value="Half Day" <?php echo ($emp_val->attendence_status == 'Half Day' ? 'selected' : ''); ?> > <i class="fa fa-dot-circle-o text-success"></i> Half Day </option>
                                                        <option value="Absent" <?php echo ($emp_val->attendence_status == 'Absent' ? 'selected' : ''); ?> > <i class="fa fa-dot-circle-o text-danger"></i> Absent </option>
                                                    </select>
                                                </td>
                                            </tr>
                                       <?php
                                            $i++;
                                            }
                                        }
                                       ?>
                                    </tbody>
                                 </table>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
</div>

   

<script type="text/javascript">
    $('#attendence_tracking').dataTable({
    "bPaginate": true,
    "pageLength": 50,
    "bLengthChange": true,
    "bFilter": true,
    "bSort": true,
    "bInfo": true,
    "bAutoWidth": false,
    "processing": true,
    "serverSide": false,
    "stateSave": false,
    /*"order": [[2,"asc"]],*/
    "columnDefs": [ { "targets": 0, "bSortable": true,"orderable": true, "visible": true } ],
          'aoColumnDefs': [{'bSortable': false,'aTargets': [0,-1, 3]}],
      });


    $(document).ready(function(){
        var urls = BASEURL+"emp-management/attendance/attendenceStatus";
        //alert(urls)
        $(".attendence_status").on("change", function(){
        var attendence_status = $(this).val();
        var employee_id = $(this).attr('employee_id');
        var dept_id = $(this).attr('dept_id');
        var attendance_id = $(this).attr('row_id');
          
          swal({
              title: "Are you sure you want to change the status?",
              // text: "Once deleted, you will not be able to recover this imaginary file!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
              if (willDelete) {
                 var formData = {
                      'attendence_status': attendence_status,
                      'employee_id' : employee_id,
                      'department_id': dept_id,
                      'attendance_id' : attendance_id
                  };
                  $.ajax({
                      type: 'POST',
                      url: urls,
                      dataType: 'json',
                      async: false,
                      data: formData,
                      success: function(data) {
                          console.log(data)
                          if(data.isSuccess == true){
                              //refreshPge();   
                          }else if(data.isSuccess == false && data.error == 'error' && data.message != ''){
                            swal(data.message);
                          }else{
                            swal("Server error, please try again !");
                          }
                      },
                  });
              } 
          });
      });
    });
</script>
<script src="<?php echo base_url('template/'); ?>employer/assets/js/jquery.min.js"></script>
<script src="<?php echo base_url('template/'); ?>employer/assets/js/jquery-ui.min.js"></script>
<script type="text/javascript">
  $('#attendence_date').datepicker({
       dateFormat: 'yy-mm-dd',
       autoclose: true,
    });
</script>
        