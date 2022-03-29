<div class="header_btn">
   <div class="header-action">
      <a href="<?php echo base_url('employer/compliance-management/list'); ?>" class="btn btn-primary float-right"><i class="fa fa-plus mr-2"></i>Back</a>
   </div>
</div>
<?php $month = array('1'=>'January','2'=>'February','3'=>'March','4'=>'April','5'=>'May','6'=>'June','7'=>'July','8'=>'August','9'=>'September','10'=>'October','11'=>'November','12'=>'December'); ?>
<div class="section-body mt-3">
				<div class="container-fluid">
					<div class="tab-content mt-3">
						<div class="tab-pane fade show active" id="Payroll-Payslip" role="tabpanel">
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col-sm-12">
											<div class="border-top">
											<div class="media mb-4">
													<div class="media-body">
														<div class="border_over_box">
															<div class="row">
																<div class="col-md-4"> <img src="<?php echo base_url(); ?>/template/employer/assets/images/Griffin-logo-22.png"> </div>
																<div class="col-md-8">
																	<!-- <h4 class="payslip-title">Ngriffinpay private limited</h4> -->
																	<p class="payslip-title">Payslip for the month of <?php echo (!empty($cal_list['paying_month'] && $cal_list['paying_year']) ? $month[$cal_list['paying_month']].'-'.$cal_list['paying_year'] : ''); ?></p>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<table class="table" id="pay_list">
															<tbody>
																<tr>
																	<td><strong class="text-left">Employee Name </strong></td>
																	<td><span class="text-left"> <?php echo(!empty($cal_list['emp_name']) ? $cal_list['emp_name'] : 'NA'); ?></span></td>
																</tr>
																<tr>
																	<td><strong class="text-left">Bank Account Number</strong></td>
																	<td><span class="text-left"><?php echo(!empty($cal_list['bank_account_number']) ? $cal_list['bank_account_number'] : 'NA'); ?></span></td>
																</tr>
																<tr>
																	<td><strong class="text-left">Designation</strong></td>
																	<td class="text-left"><?php echo(!empty($cal_list['emp_desi_name']) ? $cal_list['emp_desi_name'] : 'NA'); ?></td>
																</tr>
																<tr>
																	<td><strong class="text-left">Date of Joining </strong></td>
																	<td><span class="text-left"><?php echo(!empty($cal_list['joining_date']) ? date('Y-m-d',strtotime($cal_list['joining_date'])) : 'NA'); ?></span></td>
																</tr>
																<tr>
																	<td><strong class="text-left">Department</strong></td>
																	<td><span class="text-left"><?php echo(!empty($cal_list['dept_name']) ? $cal_list['dept_name'] : 'NA'); ?></span></td>
																</tr>
																<tr>
																	<td><strong class="text-left">Branch</strong></td>
																	<td><span class="text-left"><?php echo(!empty($cal_list['branch_name']) ? $cal_list['branch_name'] : 'NA'); ?></span></td>
																</tr>
																<tr>
																	<td><strong class="text-left">Days Worked</strong></td>
																	<td><span class="text-left"><?php echo(!empty($cal_list['current_month_day_worked']) ? $cal_list['current_month_day_worked'] : 'NA'); ?></span></td>
																</tr>
                                                <tr>
                                                   <td><strong class="text-left">Country</strong></td>
                                                   <?php
                                                   if(!empty($cal_list['country_id'])){
                                                      $country = rowData('hs_countries', array('id'=>$cal_list['country_id']), 'name');
                                                   }

                                                   ?>
                                                   <td><span class="text-left"><?php echo(!empty($country) ? $country->name : 'NA'); ?></span></td>
                                                </tr>
                                                <tr>
                                                   <?php
                                                   if(!empty($cal_list['city_id'])){
                                                      $city = rowData('hs_cities', array('id'=>$cal_list['city_id']), 'name');
                                                   }
                                                   ?>
                                                   <td><strong class="text-left">City</strong></td>
                                                   <td><span class="text-left"><?php echo(!empty($city) ? $city->name : 'NA'); ?></span></td>
                                                </tr>
															</tbody>
														</table>
													</div>
													<div class="col-md-6">
														<table class="table">
															<tbody>
																<tr>
																	<td><strong class="text-left">EMPLOYEE CODE </strong></td>
																	<td><span class="text-left"><?php echo(!empty($cal_list['company_code']) ? $cal_list['company_code'] : 'NA'); ?></span></td>
																</tr>
																<tr>
																	<td><strong class="text-left">Bank IFSC</strong></td>
																	<td><span class="text-left"><?php echo(!empty($cal_list['IFSC_code']) ? $cal_list['IFSC_code'] : 'NA'); ?></span></td>
																</tr>
																<tr>
																	<td><strong class="text-left">Employee Type </strong></td>
																	<td><span class="text-left"><?php echo(!empty($cal_list['employee_type']) ? $cal_list['employee_type'] : 'NA'); ?></span></td>
																</tr>
																
																<tr>
																	<td><strong class="text-left">UAN</strong></td>
																	<td><span class="text-left"><?php echo(!empty($cal_list['UAN_number']) ? $cal_list['UAN_number'] : 'NA'); ?></span></td>
																</tr>
                                                <tr>
                                                   <td><strong class="text-left">LWP</strong></td>
                                                   <td><span class="text-left"><?php echo(!empty($cal_list['current_month_LWP']) ? $cal_list['current_month_LWP'] : '0'); ?></span></td>
                                                </tr>
																
                                                <tr>
                                                   <?php
                                                   if(!empty($cal_list['state_id'])){
                                                      $state = rowData('hs_states', array('id'=>$cal_list['state_id']), 'name');
                                                   }
                                                   
                                                   ?>
                                                   <td><strong class="text-left">State</strong></td>
                                                   <td><span class="text-left"><?php echo(!empty($state) ? $state->name : 'NA'); ?></span></td>
                                                </tr>
                                                <tr>
                                                   <td><strong class="text-left">Payslip ID</strong></td>
                                                   <td><span class="text-left"><?php echo(!empty($cal_list['sal_id']) ? $cal_list['sal_id'] : 'NA'); ?></span></td>
                                                </tr>
                                                
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
										<div class="col-sm-12">
											<div class="border-top">
												<div class="row">
													<div class="col-md-6 border-right">
														<h4 class="m-b-10 side-heading"><strong>Earnings</strong></h4>
														<table class="table">
															<tbody>
																<tr>
																	<td><strong class="text-left">Particulars</strong></td>
																	<td><span class="text-left"><strong>Amount</strong></span></td>
																</tr>
																<?php
																if(!empty($cal_list['basic_DA_sal'])){
																?>
																<tr>
																	<td><span class="text-left">Basic Salary</span></td>
																	<td><span class="text-left"><?php echo(!empty($cal_list['basic_DA_sal']) ? $cal_list['basic_DA_sal'] : 'NA'); ?></span></td>
																</tr>
																<?php
																}
																?>
																<?php
																if(!empty($cal_list['HRA'])){
																?>
																<tr>
																	<td><span class="text-left">House Rent Allowance </span></td>
																	<td><span class="text-left"><?php echo(!empty($cal_list['HRA']) ? $cal_list['HRA'] : 'NA'); ?></span></td>
																</tr>
																<?php
																}
																?>
																<?php
																if(!empty($cal_list['Conveyance_sal'])){
																?>
																<tr>
																	<td><span class="text-left">Conveyance Allowance </span></td>
																	<td class="text-left"><?php echo(!empty($cal_list['Conveyance_sal']) ? $cal_list['Conveyance_sal'] : 'NA'); ?></td>
																</tr>
																<?php
																}
																?>
																<?php
																if(!empty($cal_list['Special_allowance_sal'])){
																?>
																<tr>
																	<td><span class="text-left">Other Allowance </span></td>
																	<td><span class="text-left"><?php echo(!empty($cal_list['Special_allowance_sal']) ? $cal_list['Special_allowance_sal'] : 'NA'); ?></span></td>
																</tr>
																<?php
																}
																?>
																<?php
																if(!empty($cal_list['personal_pay'])){
																?>
																<tr>
																	<td><span class="text-left">Personal Pay</span></td>
																	<td><span class="text-left"><?php echo(!empty($cal_list['personal_pay']) ? $cal_list['personal_pay'] : 'NA'); ?></span></td>
																</tr>
																<?php
																}
																?>
																<?php
																if(!empty($cal_list['food_allowance'])){
																?>
																<tr>
																	<td><span class="text-left">Food Allowance</span></td>
																	<td><span class="text-left"><?php echo(!empty($cal_list['food_allowance']) ? $cal_list['food_allowance'] : 'NA'); ?></span></td>
																</tr>
																<?php
																}
																?>
																<?php
																if(!empty($cal_list['medical_allowance'])){
																?>
																<tr>
																	<td><span class="text-left">Medical Allowance </span></td>
																	<td><span class="text-left"><?php echo(!empty($cal_list['medical_allowance']) ? $cal_list['medical_allowance'] : 'NA'); ?></span></td>
																</tr>
																<?php
																}
																?>
																<?php
																if(!empty($cal_list['telephone_allowance'])){
																?>
																<tr>
																	<td><span class="text-left">Telephone Allowance </span></td>
																	<td><span class="text-left"><?php echo(!empty($cal_list['telephone_allowance']) ? $cal_list['telephone_allowance'] : 'NA'); ?></span></td>
																</tr>
																<?php
																}
																?>
																<?php
																if(!empty($cal_list['performance_linked_pay'])){
																?>
																<tr>
																	<td><span class="text-left">Performance Linked Pay</span></td>
																	<td><span class="text-left"><?php echo(!empty($cal_list['performance_linked_pay']) ? $cal_list['performance_linked_pay'] : 'NA'); ?></span></td>
																</tr>
																<?php
																}
																?>
																<?php
                                                    $earning = $cal_list['basic_DA_sal'] + $cal_list['HRA'] +  $cal_list['Special_allowance_sal'] + $cal_list['Conveyance_sal'] + $cal_list['personal_pay'] + $cal_list['food_allowance'] + $cal_list['medical_allowance'] + $cal_list['telephone_allowance'] + $cal_list['performance_linked_pay'];
                                          		?>
															</tbody>
														</table>
													</div>
													<div class="col-md-6">
														<h4 class="m-b-10 side-heading"><strong>Deductions</strong></h4>
														<table class="table" id="department_list">
															<tbody>
																<tr>
																	<td><strong class="text-left">Particulars</strong></td>
																	<td><strong class="text-left">Amount</strong></td>
																</tr>

																
																<tr>
                                                   <td><span class="text-left">Professional Tax </strong></td>
                                                   <td>
                                                      <span class="text-left">
                                                         <?php 
                                                         echo (!empty($cal_list['professional_tax']) ? round($cal_list['professional_tax']) : 'NA'); 
                                                         
                                                         ?>
                                                         </span>
                                                      </td>
                                                </tr>
                                                
                                                <!-- code added 13-01-2022 -->
                                               
                                                <tr>
                                                   <td><span class="text-left">Employer PF Contribution </strong></td>
                                                   <td>
                                                      <span class="text-left">
                                                         <?php 
                                                         echo (!empty($cal_list['employer_share']) ? $cal_list['employer_share'] : 'NA'); 
                                                         ?>
                                                         </span>
                                                      </td>
                                                </tr>
                                                
                                                
                                                <tr>
                                                   <td><span class="text-left">Employee PF Contribution </strong></td>
                                                   <td>
                                                      <span class="text-left">
                                                         <?php 
                                                         echo (!empty($cal_list['employee_share']) ? $cal_list['employee_share'] : 'NA'); 
                                                         ?>
                                                         </span>
                                                      </td>
                                                </tr>
                                                <tr>
                                                   <td><span class="text-left">Employer Pension Contribution </strong></td>
                                                   <td>
                                                      <span class="text-left">
                                                         <?php 
                                                         echo (!empty($cal_list['employer_pen_contribution']) ? $cal_list['employer_pen_contribution'] : 'NA'); 
                                                         ?>
                                                         </span>
                                                      </td>
                                                </tr>
                                                
                                                
                                                <tr>
                                                   <td><span class="text-left">Admin PF Charges </strong></td>
                                                   <td>
                                                      <span class="text-left">
                                                         <?php 
                                                         echo (!empty($cal_list['admin_pf_charges']) ? $cal_list['admin_pf_charges'] :'NA'); 
                                                         ?>
                                                         </span>
                                                      </td>
                                                </tr>
                                                <tr>
                                                   <td><span class="text-left">Admin EDLI Charges </strong></td>
                                                   <td>
                                                      <span class="text-left">
                                                         <?php 
                                                         echo (!empty($cal_list['admin_EDLI_charges']) ? $cal_list['admin_EDLI_charges'] : 'NA'); 
                                                         ?>
                                                         </span>
                                                      </td>
                                                </tr>
                                                
                                                <!-- End  -->
                                               
                                                <tr>
                                                   <td><span class="text-left">Personal Loan Principal</span></td>
                                                   <td><span class="text-left"><?php echo(!empty($cal_list['personal_loan_principal']) ? round($cal_list['personal_loan_principal']) : 'NA'); ?></span></td>
                                                </tr>
                                                
                                                
                                                <tr>
                                                   <td><span class="text-left">Personal Loan Interest</span></td>
                                                   <td><span class="text-left"><?php echo(!empty($cal_list['personal_loan_Interest']) ? round($cal_list['personal_loan_Interest']) : 'NA'); ?></span></td>
                                                </tr>
															</tbody>
														</table>
													</div>
												</div>
											</div>
											<div class="border-top">
												<div class="row">
													<div class="col-md-6 border-right">
														<table class="table">
															<tbody>
																<tr>
																	<td><strong class="text-left">Total Earnings</strong></td>
																	<td><span class="text-left" style="margin-left:-20px"><?php echo $earning; ?></span></td>
																</tr>
															</tbody>
														</table>
													</div>
													<div class="col-md-6 ">
														<table class="table">
															<tbody>
																<tr>
																	<td><strong class="text-left">Total Deductions</strong></td>
																	<td><span style="margin-right:20px" class="text-left"><?php 
                                          $deduction =  $cal_list['employer_share'] + $cal_list['employee_share'] + $cal_list['employer_pen_contribution'] + $cal_list['professional_tax'] + $cal_list['admin_pf_charges'] + $cal_list['admin_EDLI_charges']+ $cal_list['personal_loan_principal']+ $cal_list['personal_loan_Interest'];
                                          echo round($deduction);
                                           ?></span></td>
																</tr>
															</tbody>
														</table>
													</div>
												</div>
											</div>
											<div class="border-top">
												<div class="row">
													<div class="col-md-12">
														<p><strong class="pl5">Net Salary : <?php echo round($earning - $deduction); ?></strong></p>
														
													</div>
												</div>
											</div>
											<div class="border-top">
												<div class="row">
													<div class="col-md-12">
														<h4 class="m-b-10 side-heading"><strong>Other Details</strong></h4>
														<table class="table">
															<tbody>
																<tr>
																	<td><strong class="text-left">Particulars</strong></td>
																	<td><span class="text-left"><strong>Entitlement</strong></span></td>
																	<td><strong class="text-left">Balance</strong></td>
																	<td><span class="text-left"><strong>Balance as of</strong></span></td>
																</tr>
																<tr>
																	<td><span class="text-left">LOAN TO EMPLOYEE - PERSONAL LOAN </span></td>
																	<td><span class="text-left">NA</span></td>
																	<td><span class="text-left">NA </span></td>
																	<td><span class="text-left">NA</span></td>
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
						</div>
					</div>
				</div>
			</div>

<!-- <script type="text/javascript">
  $('#pay_list').dataTable({
    "bPaginate": true,
    "pageLength": 50,
    "bLengthChange": false,
    "bFilter": false,
    "bSort": false,
    "bInfo": false,
    "bAutoWidth": false,
    "processing": false,
    "serverSide": false,
    "stateSave": true,
    "dom": 'lBfrtip',
   "buttons": [
            {
                extend: 'collection',
                text: 'Export',
                buttons: [
                    'copy',
                    'excel',
                    'csv',
                    'pdf',
                    'print'
                ]
            }
        ]
   
   
      });
</script> -->

<style>
.border_over_box {
	padding: 10px 10px;
	border: 1px solid black;
}

.border-top {
	border: 1px solid black;
}

.payslip-title {
	padding-top: 55px;
	margin-bottom: 0px;
	color: black;
	font-weight: 600;
	font-size: 16px;
   text-align: center;
    margin: 0 auto;
    display: flex;
}

.table td,
.table th {
	border-color: #fff !important;
}

.text-left {
	float: left;
	line-height: 20px;
    margin: -8px;
}

.border-right {
	border-right: 1px solid black !important;
}

.side-heading{
   font-size: 18px;
    padding-left: 5px;
    padding-top: 12px;
}

.pl5{
padding-left: 5px;
}

</style>