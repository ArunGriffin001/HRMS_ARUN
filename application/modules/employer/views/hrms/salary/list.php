<div class="section-body">
   <div class="container-fluid">
      <div class="d-flex justify-content-between align-items-center">
         <ul class="nav nav-tabs page-header-tab">
         </ul>
         <div class="header-action">
            <a href="<?php echo base_url('employer/hrms/users/salary/add'); ?>" class="btn btn-primary float-left"><i class="fa fa-plus mr-2"></i>Add Salary</a>
         </div>
      </div>
   </div>
</div>
<?php
$currDate = date('Y-m-d');
$report_file_name = 'salary-list-report-'.$currDate;
?>
<div class="section-body mt-3">
    <div class="container-fluid card ">
       <form method="post" action="<?php echo base_url('employer/hrms/users/salary'); ?>" data-parsley-validate="" class="form-group mt-3 mb-2">
            <div class="row">
               <div class="col-md-4">
                  <div class="form-group">
                     <select class="custom-select form-control" name="employee_dept_id">
                         <option value="">Select department</option>
                         <?php
                           if(!empty($dept_list)){
                             foreach ($dept_list as $key => $dept_val){
                               ?>
                                 <option value="<?php echo $dept_val->dep_id; ?>" <?php echo ($dept_val->dep_id == $select_dept ? 'selected' : ''); ?> > <?php echo $dept_val->dept_name; ?></option>
                           <?php
                              }
                           }
                           ?>
                     </select>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <select class="custom-select form-control" name="month">
                        <option value="">Select month</option>
                        <?php
                        if(!empty($month_list)){
                           foreach ($month_list as $key => $month_val){
                            ?>
                              <option value="<?php echo $month_val; ?>" <?php echo ($month_val == $select_month ? 'selected' : ''); ?> > <?php echo $key; ?></option>
                         <?php
                            }
                        }
                        ?>
                     </select>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <select class="custom-select form-control" name="year">
                         <option value="">select Year</option>
                         <?php
                           if(!empty($year_list)){
                             foreach ($year_list as $key => $year_val){
                               ?>
                                 <option value="<?php echo $year_val->year_name; ?>" <?php echo ($year_val->year_name == $select_year ? 'selected' : ''); ?> > <?php echo $year_val->year_name; ?></option>
                           <?php
                              }
                           }
                           ?>
                     </select>
                  </div>
               </div>
            </div>
            <div class="row">
             <div class="col-md-2">
                <div class="form-group">
                   <input type="submit" name="submit" value="submit" class="btn btn-sm btn-primary btn-block form-control">
                </div>
             </div>
             <div class="col-md-2">
                <div class="form-group">
                   <a href="<?php echo base_url('employer/hrms/users/salary'); ?>" class="btn btn-sm btn-primary btn-block form-control">Clear Filter</a>
                </div>
             </div>
            </div>
        </form>
    </div>
</div>
<div class="section-body mt-3">
   <div class="container-fluid">
      <div class="tab-content mt-3">
         <div class="tab-pane fade show active" id="Departments-list" role="tabpanel">
            <div class="card">
               <?php
               $month = array('1'=>'January','2'=>'February','3'=>'March','4'=>'April','5'=>'May','6'=>'June','7'=>'July','8'=>'August','9'=>'September','10'=>'October','11'=>'November','12'=>'December');
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
               <div class="card-body">
                  <div class="table-responsive">
                     <!-- Start -->
                     <table id="getComplienceList" class="table table-striped table-vcenter table-hover mb-0" >
                        <thead>
                           <tr>
                              <th>S.No.</th>
                              <th>Employee</th>
                              <th>Department</th>
                              <th>Full Basic Salary+DA </th>
                              <th>HRA </th>
                              <th>Conveyance</th>
                              <th>Other Allowance</th>

                              <th>Personal Pay</th>
                              <th>Food Allowance</th>
                              <th>Medical Allowance</th>
                              <th>Telephone Allowance</th>
                              <th>Performance Linked Pay</th>
                              <th>Personal Loan Principal</th>
                              <th>Personal Loan Interest</th>
                              <th>Days Worked</th>
                              <th>LWP</th>
                              <th>Professional Tax</th>
                              <th>Date</th>
                              <th>Pay Month</th>
                              <th>Pay Year</th>
                              <th> Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                              if(!empty($salary_list)){
                                  $i = 1;
                                  foreach ($salary_list as $salary_val) {
                                      ?>
                           <tr>
                              <td><?php echo $i; ?></td>
                              <td><?php echo(!empty($salary_val->full_name) ? $salary_val->full_name : ''); ?></td>
                              <td><?php echo(!empty($salary_val->dept_name) ? $salary_val->dept_name : ''); ?></td>
                              <td><?php echo(!empty($salary_val->basic_DA_sal) ? $salary_val->basic_DA_sal : ''); ?></td>
                               <td><?php echo(!empty($salary_val->HRA) ? $salary_val->HRA : ''); ?></td>
                              <td><?php echo(!empty($salary_val->Conveyance_sal) ? $salary_val->Conveyance_sal : ''); ?></td>
                              <td><?php echo(!empty($salary_val->Special_allowance_sal) ? $salary_val->Special_allowance_sal : ''); ?></td>
                              <td><?php echo(!empty($salary_val->personal_pay) ? $salary_val->personal_pay : ''); ?></td>
                              <td><?php echo(!empty($salary_val->food_allowance) ? $salary_val->food_allowance : ''); ?></td>
                              <td><?php echo(!empty($salary_val->medical_allowance) ? $salary_val->medical_allowance : ''); ?></td>
                              <td><?php echo(!empty($salary_val->telephone_allowance) ? $salary_val->telephone_allowance : ''); ?></td>
                              <td><?php echo(!empty($salary_val->performance_linked_pay) ? $salary_val->performance_linked_pay : ''); ?></td>
                              <td><?php echo(!empty($salary_val->personal_loan_principal) ? $salary_val->personal_loan_principal : ''); ?></td>
                              <td><?php echo(!empty($salary_val->personal_loan_Interest) ? $salary_val->personal_loan_Interest : ''); ?></td>
                              <td><?php echo(!empty($salary_val->current_month_day_worked) ? $salary_val->current_month_day_worked : ''); ?></td>
                              <td><?php echo(!empty($salary_val->current_month_LWP) ? $salary_val->current_month_LWP : ''); ?></td>
                              <td><?php echo(!empty($salary_val->professional_tax) ? $salary_val->professional_tax : ''); ?></td>
                              <td><?php echo(!empty($salary_val->paying_date) ? date('Y-m-d', strtotime($salary_val->paying_date)) : ''); ?></td>
                              <td><?php echo(!empty($salary_val->paying_month) ? $month[$salary_val->paying_month] : ''); ?></td>
                              <td><?php echo(!empty($salary_val->paying_year) ? $salary_val->paying_year : ''); ?></td>
                              <td><a href="<?php echo base_url('employer/hrms/users/salary/edit/').encode($salary_val->salary_id); ?>" title="Edit Salary"><i class="fa fa-edit"></i></a></td>
                               
                           </tr>
                           <?php
                              $i++;
                              }
                              
                              }
                              ?>
                           
                        </tbody>
                     </table>
                     <!--  End -->
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script type="text/javascript">
   $(document).ready(function() {
       var download_file_name = "<?php echo $report_file_name; ?>";
      var table = $('#getComplienceList').DataTable({
       dom: 'lBfrtip',
        buttons: [
                  {
                   extend: 'excelHtml5',
                   filename: download_file_name
                  },
                  {
                      extend: 'csv',
                      filename: download_file_name
                  },
                  { 
                     extend: 'pdfHtml5',orientation: 'landscape',pageSize: 'LEGAL',filename: download_file_name
                  }
        ],
    "bPaginate": true,
    "pageLength": 50,
    "bLengthChange": true,
    "bFilter": true,
    "bSort": true,
    "bInfo": true,
    "lengthMenu": [50,100,200,500],
    "scrollX": true,
    "scrollY": "600px",
    "scrollCollapse": true,
    "fixedHeader": true,
    "bAutoWidth": false,
    "processing": false,
    "serverSide": false,
    "stateSave": false,
   
    /*"order": [[2,"asc"]],*/
     "columnDefs": [ { "targets": [0,-1], "bSortable": false } ],
      });
       
   } );
</script>
<style type="text/css">
  thead th {
    border-bottom: 4px solid #D3E6F5;
    padding-bottom: 20px;
}

  .table td {
    padding: .75rem;
    vertical-align: top;
    border-bottom: 1px solid #dee2e6 !important;
    border-top:0 !important
}

 #getComplienceList thead {
   visibility: collapse;
}

.dataTables_wrapper .dataTables_info {
   line-height:60px
}

.dataTables_wrapper .dataTables_paginate {
    padding-top: 1.25em;
}

.dataTables_wrapper .dataTables_paginate .paginate_button.current, .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
    color: #fff !important;
    background:  #133b80 !important;
}

.dataTables_wrapper .dataTables_paginate .paginate_button:active {
    background-color: #ffc557 !important;
}
</style>
<!-- export button  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.7.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.2/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables-buttons/2.0.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.bootstrap.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.js"></script>