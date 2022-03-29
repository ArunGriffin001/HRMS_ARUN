<div class="header_btn">
   <div class="header-action">
      <a href="<?php echo base_url('employer/hrms/users'); ?>" class="btn btn-primary float-right"><i class="fa fa-plus mr-2"></i>Back</a>
   </div>
</div>
<div class="section-body mt-3">
   <div class="container-fluid">
      <div class="tab-content mt-3">
         <div class="tab-pane fade show active" id="Departments-list" role="tabpanel">
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
                  <div class="table-responsive">
                     <h3 class="card-title"><?php echo (!empty($page_sub_heading) ? $page_sub_heading : ''); ?></h3>

                     <table class="table table-bordered table-striped table-vcenter table-hover mb-0" id="anextureList">
                       <thead>
                           <tr>
                              <th class="text-left"><?php echo 'Payroll'; ?></th>
                              <th class="text-left"><?php echo '(Rs. Per month)'; ?></th>
                              <th class="text-left"> <?php echo '(Rs. Per annum)'; ?> </th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              
                              <td class="text-left">Basic+DA</td>
                              <td class="text-left"><?php echo (!empty($res->sal_basic_sal_da) ? $res->sal_basic_sal_da : '0'); ?></td>
                              <td class="text-left"><?php echo $res->sal_basic_sal_da * 12; ?></td>
                           </tr>
                           <tr>
                              
                              <td class="text-left">HRA</td>
                              <td class="text-left"><?php echo (!empty($res->sal_hra) ? $res->sal_hra : '0'); ?></td>
                              <td class="text-left"><?php echo $res->sal_hra * 12; ?></td>
                           </tr>
                           <tr>
                              
                              <td class="text-left">Conveyance</td>
                              <td class="text-left"><?php echo (!empty($res->sal_full_conveyance) ? $res->sal_full_conveyance : '0'); ?></td>
                              <td class="text-left"><?php echo $res->sal_full_conveyance * 12; ?></td>
                           </tr>
                           <tr>
                              
                              <td class="text-left">Other Allowance</td>
                              <td class="text-left"><?php echo (!empty($res->sal_other_allowance) ? $res->sal_other_allowance : '0'); ?></td>
                              <td class="text-left"><?php echo $res->sal_other_allowance * 12; ?></td>
                           </tr>
                           <tr>
                              
                              <td class="text-left">Personal Pay</td>
                              <td class="text-left"><?php echo (!empty($res->sal_personal_pay) ? $res->sal_personal_pay : '0'); ?></td>
                              <td class="text-left"><?php echo $res->sal_personal_pay * 12; ?></td>
                           </tr>
                           <tr>
                              
                              <td class="text-left">Food Allowance</td>
                              <td class="text-left"><?php echo (!empty($res->sal_food_allowance) ? $res->sal_food_allowance : '0'); ?></td>
                              <td class="text-left"><?php echo $res->sal_food_allowance * 12; ?></td>
                           </tr>
                           <tr>
                              
                              <td class="text-left">Medical Allowance</td>
                              <td class="text-left"><?php echo (!empty($res->sal_medical_allowance) ? $res->sal_medical_allowance : '0'); ?></td>
                              <td class="text-left"><?php echo $res->sal_medical_allowance * 12; ?></td>
                           </tr>
                           <tr>
                              
                              <td class="text-left">Telephone Allowance</td>
                              <td class="text-left"><?php echo (!empty($res->sal_telephone_allowance) ? $res->sal_telephone_allowance : '0'); ?></td>
                              <td class="text-left"><?php echo $res->sal_telephone_allowance * 12; ?></td>
                           </tr>
                           <tr>
                              
                              <td class="text-left">Performance Linked Pay</td>
                              <td class="text-left"><?php echo (!empty($res->sal_performance_link_pay) ? $res->sal_performance_link_pay : '0'); ?></td>
                              <td class="text-left"><?php echo $res->sal_performance_link_pay * 12; ?></td>
                           </tr>
                           <tr>
                              
                              <td class="text-left">Personal Loan Amount</td>
                              <td class="text-left"><?php echo (!empty($res->sal_personal_loan_amt) ? $res->sal_personal_loan_amt : '0'); ?></td>
                              <td class="text-left"><?php echo $res->sal_personal_loan_amt * 12; ?></td>
                           </tr>
                           <tr>
                              
                              <td class="text-left font-weight-bold">Total Pay </td>
                              <td class="text-left font-weight-bold">
                                 <?php
                                 $total = $res->sal_basic_sal_da + $res->sal_hra + $res->sal_full_conveyance + $res->sal_other_allowance + $res->sal_personal_pay + $res->sal_food_allowance + $res->sal_medical_allowance + $res->sal_telephone_allowance + $res->sal_performance_link_pay + $res->sal_personal_loan_amt;
                                 echo round($total);
                                 ?>
                                 
                              </td>
                              <td class="text-left font-weight-bold"><?php echo $total * 12; ?></td>
                           </tr>
                           <tr>
                              
                              <td class="text-left"></td>
                              <td class="text-left"></td>
                              <td class="text-left"></td>
                           </tr>

                           <tr>
                             
                              <td class="text-md-left font-weight-bold">Deductions</td>
                              <td class="text-left"></td>
                              <td class="text-left"></td>
                           </tr>
                           <?php
                           $esic1 = 0;
                           $no_pt_pf_esic = 15000;
                           $no_pt_pf_esic2 = 21000;
                           $employee_share = 0;
                           $employer_share = 0;
                           $employer_pen_contribution = 0;
                           $esic_employee_val = 0;
                           $esic_employer_val = 0;

                           /* Professional tex */
                           $sal_professional_tax = 0;
                           if(!empty($total) && $total >= $no_pt_pf_esic){
                              $sal_professional_tax = $res->sal_professional_tax;
                           ?>
                              <tr>
                                 
                                 <td class="text-left">Professional Tax</td>
                                 <td class="text-left"><?php echo (!empty($res->sal_professional_tax) ? $res->sal_professional_tax : '0'); ?></td>
                                 <td class="text-left"><?php echo $res->sal_professional_tax * 12; ?></td>
                              </tr>
                           <?php
                           }
                          /* ESIC calculation */

                           if(!empty($total) && $total >= $esic1 && $total <= $no_pt_pf_esic2){
                              $esic_employee_charges = $res->esic_employee_charges;
                              $esic_employee_val = ($total * $esic_employee_charges)/100;
                              $esic_employee_val = round($esic_employee_val);
                              $esic_employer_charges = $res->esic_employer_charges;
                              $esic_employer_val = ($total * $esic_employer_charges)/100;
                              $esic_employer_val = round($esic_employer_val);
                           ?>
                           <tr>
                              
                              <td class="text-left">Employee ESIC Contribution</td>
                              <td class="text-left"><?php echo (!empty($esic_employee_val) ? $esic_employee_val : '0'); ?></td>
                              <td class="text-left"><?php echo $esic_employee_val * 12; ?></td>
                           </tr>
                           <tr>
                              
                              <td class="text-left">Employer ESIC Contribution</td>
                              <td class="text-left"><?php echo (!empty($esic_employer_val) ? $esic_employer_val : '0'); ?></td>
                              <td class="text-left"><?php echo $esic_employer_val * 12; ?></td>
                           </tr>
                           <?php 
                           }
                           $employee_share = $res->employee_share;
                           $employer_share = $res->employer_share;
                           ?>
                           <tr>
                              
                              <td class="text-left">Employee PF Contribution</td>
                              <td class="text-left"><?php echo (!empty($res->employee_share) ? $res->employee_share : '0'); ?></td>
                              <td class="text-left"><?php echo $res->employee_share * 12; ?></td>
                           </tr>
                           <tr>
                              
                              <td class="text-left">Employer PF Contribution</td>
                              <td class="text-left"><?php echo (!empty($employer_share) ? $employer_share : '0'); ?></td>
                              <td class="text-left"><?php echo $employer_share * 12; ?></td>
                           </tr>
                            <tr>
                              
                              <td class="text-left">Employer Pension Contribution</td>
                              <td class="text-left"><?php echo (!empty($res->employer_pen_contribution) ? $res->employer_pen_contribution : '0'); ?></td>
                              <td class="text-left"><?php echo $res->employer_pen_contribution * 12; ?></td>
                           </tr>
                           <tr>
                              
                              <td class="text-left">Admin PF Charges</td>
                              <td class="text-left"><?php echo (!empty($res->admin_pf_charges) ? $res->admin_pf_charges : '0'); ?></td>
                              <td class="text-left"><?php echo $res->admin_pf_charges * 12; ?></td>
                           </tr>
                           <tr>
                              
                              <td class="text-left">Admin EDLI Charges</td>
                              <td class="text-left"><?php echo (!empty($res->admin_EDLI_charges) ? $res->admin_EDLI_charges : '0'); ?></td>
                              <td class="text-left"><?php echo $res->admin_EDLI_charges * 12; ?></td>
                           </tr>

                           <tr>
                              
                              <td class="text-left font-weight-bold">Total Deductions</td>
                              <td class="text-left font-weight-bold">
                                 <?php
                                 $deduction = $sal_professional_tax + $employer_share + $employee_share + $employer_pen_contribution + $res->admin_pf_charges + $res->admin_EDLI_charges;
                                 echo round($deduction);
                                 ?>
                                 
                              </td>
                              <td class="text-left font-weight-bold"><?php echo $deduction * 12; ?></td>
                           </tr>

                            <tr>
                              
                              <td class="text-left font-weight-bold"></td>
                              <td class="text-left font-weight-bold"></td>
                              <td class="text-left font-weight-bold"></td>
                           </tr>
                           <tr>
                              <td class="text-left font-weight-bold">Total Earnings</td>
                              <td class="text-left font-weight-bold">
                                 <?php
                                 echo round($total-$deduction);
                                 ?>
                                 
                              </td>
                              <td class="text-left font-weight-bold"><?php echo round($total - $deduction) * 12; ?></td>
                           </tr>

                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>        
   
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.7.1/jszip.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.2/pdfmake.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables-buttons/2.0.0/js/dataTables.buttons.min.js"></script>
<!-- <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.bootstrap.js"></script> -->
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.js"></script>
<script type="text/javascript">
    var download_file_name = "annexture";
  $('#anextureList').dataTable({
      // dom: "lBfrtip",
      // buttons: [
      //             {
      //             title:'Annexture Report',
      //              extend: 'excelHtml5',
      //              filename: download_file_name
      //             },
      //          ],
    "bFilter": false,
    "bSort": false,
    "bInfo": false,
   "bPaginate": false,
   "bLengthChange": false,
   "bAutoWidth": false,
   "pageLength": 100,
   "lengthMenu": [100,200,500],
   
   
    // "order": [[8,"desc"]],
   "columnDefs": [ { "targets": [0,1,-1,-2], "bSortable": false } ],
          
      });
</script>
<!-- export button  -->

     