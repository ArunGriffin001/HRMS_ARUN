<link rel="stylesheet" href="<?php echo base_url(); ?>/template/employer/assets/css/dataTables.min.css" />
 
<div class="section-body mt-3">
   <div class="container-fluid">
      <div class="tab-content mt-3">
         <div class="tab-pane fade show active" id="Departments-list" role="tabpanel">
            <div class="card">
               <?php $month = array('1'=>'January','2'=>'February','3'=>'March','4'=>'April','5'=>'May','6'=>'June','7'=>'July','8'=>'August','9'=>'September','10'=>'October','11'=>'November','12'=>'December'); ?>
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
               <div class="card-body">
                  <div class="table-responsive">
                     <!-- Start -->
                     <table id="getComplienceList" class="table table-striped table-vcenter table-hover mb-0" >
                        <thead>
                           <tr>
                              <th>S.No.</th>
                              <th>Full Basic Salary+DA </th>
                              <th>Conveyance</th>
                              <th>Other Allowance</th>
                              <th>Personal Pay</th>
                              <th>Food Allowance</th>
                              <th>Medical Allowance</th>
                              <th>Telephone Allowance</th>
                              <th>Performance Linked Pay</th>
                              <th>Employee Share</th>
                              <th>Employer Share</th>
                              <th>Employer Pension Contribution</th>
                              <th>Admin PF Charges</th>
                              <th>Admin EDLI Charges</th>
                              <th>Professional Tax</th>
                              <th>Days Worked</th>
                              <th>LWP</th>
                              <th>Earning</th>
                              <th>Deduction</th>
                              <th>Netpay</th>
                              <th>Date </th>
                              <th>Paying Month</th>
                              <th>Paying Year</th>
                             
                              
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
                              <td><?php echo(!empty($salary_val->basic_DA_sal) ? $salary_val->basic_DA_sal : 'NA'); ?></td>
                              <td><?php echo(!empty($salary_val->Conveyance_sal) ? $salary_val->Conveyance_sal : 'NA'); ?></td>
                              <td><?php echo(!empty($salary_val->Special_allowance_sal) ? $salary_val->Special_allowance_sal : 'NA'); ?></td>

                              <td><?php echo(!empty($salary_val->personal_pay) ? $salary_val->personal_pay : 'NA'); ?></td>
                              <td><?php echo(!empty($salary_val->food_allowance) ? $salary_val->food_allowance : 'NA'); ?></td>
                              <td><?php echo(!empty($salary_val->medical_allowance) ? $salary_val->medical_allowance : 'NA'); ?></td>
                              <td><?php echo(!empty($salary_val->telephone_allowance) ? $salary_val->telephone_allowance : 'NA'); ?></td>
                               <td><?php echo(!empty($salary_val->performance_linked_pay) ? $salary_val->performance_linked_pay : 'NA'); ?></td>

                              <td><?php
                              $employee_share =  ($salary_val->basic_DA_sal * $setting_val->employee_pf_contribution)/100;

                              $employee_share = ($employee_share > 0 ? (is_decimal($employee_share) ? number_format($employee_share, 2, '.', '') : $employee_share ) : 0);

                              echo(!empty($employee_share) ? round($employee_share) : 'NA'); ?></td>
                              <td><?php
                              $employer_share =  ($salary_val->basic_DA_sal * $setting_val->employer_pf_contribution)/100;
                              $employer_share = ($employer_share > 0 ? (is_decimal($employer_share) ? number_format($employer_share, 2, '.', '') : $employer_share ) : 0);
                               echo(!empty($employer_share) ? round($employer_share) : 'NA'); ?></td>

                              <td><?php 

                              $employer_pen_contribution =  ($salary_val->basic_DA_sal * $setting_val->employer_pension_contribution)/100;
                              $employer_pen_contribution = ($employer_pen_contribution > 0 ? (is_decimal($employer_pen_contribution) ? number_format($employer_pen_contribution, 2, '.', '') : $employer_pen_contribution ) : 0);
                              echo(!empty($employer_pen_contribution) ? round($employer_pen_contribution) : 'NA'); ?></td>
                              <td><?php

                               $admin_pf_charges =  ($salary_val->basic_DA_sal * $setting_val->pf_admin_charges)/100;
                               $admin_pf_charges = ($admin_pf_charges > 0 ? (is_decimal($admin_pf_charges) ? number_format($admin_pf_charges, 2, '.', '') : $admin_pf_charges ) : 0);
                              echo(!empty( $admin_pf_charges) ?  round($admin_pf_charges) : 'NA'); ?></td>

                              <td><?php
                              $admin_EDLI_charges =  ($salary_val->basic_DA_sal * $setting_val->EDLI_charges)/100;
                              $admin_EDLI_charges = ($admin_EDLI_charges > 0 ? (is_decimal($admin_EDLI_charges) ? number_format($admin_EDLI_charges, 2, '.', '') : $admin_EDLI_charges ) : 0);
                               echo(!empty($admin_EDLI_charges) ? round($admin_EDLI_charges) : 'NA'); ?></td>

                              <td><?php echo(!empty($salary_val->professional_tax) ? round($salary_val->professional_tax) : 'NA'); ?></td>
                              <td><?php echo(!empty($salary_val->current_month_day_worked) ? round($salary_val->current_month_day_worked) : 'NA'); ?></td>
                              <td><?php echo(!empty($salary_val->current_month_LWP) ? round($salary_val->current_month_LWP) : 'NA'); ?></td>

                              <td><?php $earning = $salary_val->basic_DA_sal + $salary_val->Conveyance_sal + $salary_val->Special_allowance_sal + $salary_val->personal_pay +  $salary_val->food_allowance + $salary_val->medical_allowance + $salary_val->telephone_allowance +$salary_val->performance_linked_pay + $employer_pen_contribution + $employer_share;
                               echo round($earning);  ?></td>
                              <td><?php $deduction =  $employee_share + $admin_pf_charges + $admin_EDLI_charges + $salary_val->professional_tax;
                              echo round($deduction);  ?></td>
                              <td><?php echo $earning - $deduction; ?></td>
                              <td><?php echo(!empty($salary_val->paying_date) ? date('Y-m-d', strtotime($salary_val->paying_date)) : 'NA'); ?></td>
                              <td><?php echo(!empty($salary_val->paying_month) ? $month[$salary_val->paying_month] : 'NA'); ?></td>
                              <td><?php echo(!empty($salary_val->paying_year) ? $salary_val->paying_year : 'NA'); ?></td>
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
 
 // var postListingUrl =  BASEURL+"designation/designation_list";
  $('#getComplienceList').dataTable({
    "bPaginate": true,
    "pageLength": 50,
    "bLengthChange": true,
    "bFilter": true,
    "bSort": true,
    "bInfo": true,
    "bAutoWidth": false,
    "processing": false,
    "serverSide": false,
    "stateSave": false,
   
    /*"order": [[2,"asc"]],*/
     "columnDefs": [ { "targets": [0,-1], "bSortable": false } ],
      });

</script>
     

<style type="text/css">

 /* #getComplienceList tbody td:nth-child(2){
       display: block;
    width: 100px;
    border:0;
  }*/

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

 /*#getComplienceList thead {
   visibility: collapse;
}*/

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