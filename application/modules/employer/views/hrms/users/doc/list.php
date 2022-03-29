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
               <div class="card-header">
                  <h3 class="card-title"><?php echo (!empty($page_sub_heading) ? $page_sub_heading : ''); ?></h3>
                  
               </div>
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
                     <table class="table table-striped table-vcenter table-hover mb-0" id="department_list">
                       <thead>
                           <tr>
                              <th><?php echo $this->lang->line('sr_no'); ?></th>
                              <th>Doc Type</th>
                             <!--  <th><?php echo $this->lang->line('tb_added_on'); ?></th> -->
                              <th><?php echo $this->lang->line('tb_status'); ?></th>
                              <th> Doc Link </th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td>1</td>
                              <td>Resume</td>
                             <!--  <td><?php echo(!empty($res->created_at) ? date('Y-m-d', strtotime($res->created_at)) : ''); ?></td> -->
                              <td><?php echo(!empty($res->resume_doc ) ? $res->resume_status : 'Pending'); ?></td>
                              <td>
                                 <?php
                                 if(!empty($res->resume_doc)){
                                 ?>
                                 <a href="<?php echo base_url('uploads/employee/others/').$res->resume_doc; ?>" class="btn btn-link"> Open Doc </a>
                                 <?php
                                 }
                                 ?>
                              </td>
                           </tr>
                           <tr>
                              <td>2</td>
                              <td>Offer Letter</td>
                              <!-- <td><?php echo(!empty($res->created_at) ? date('Y-m-d', strtotime($res->created_at)) : ''); ?></td> -->
                              <td><?php echo(!empty($res->offer_letter_doc ) ? $res->offer_letter_status : 'Pending'); ?></td>
                              <td>
                                 <?php
                                 if(!empty($res->offer_letter_doc)){
                                 ?>
                                 <a href="<?php echo base_url('uploads/employee/others/').$res->offer_letter_doc; ?>" class="btn btn-link"> Open Doc1 </a>
                                 <?php
                                 }
                                 ?>
                                 <?php
                                 if(!empty($res->offer_letter_doc2)){
                                 ?>
                                 |<a href="<?php echo base_url('uploads/employee/others/').$res->offer_letter_doc2; ?>" class="btn btn-link"> Open Doc2 </a>
                                 <?php
                                 }
                                 ?>
                                 <?php
                                 if(!empty($res->offer_letter_doc3)){
                                 ?>
                                 |<a href="<?php echo base_url('uploads/employee/others/').$res->offer_letter_doc3; ?>" class="btn btn-link"> Open Doc3 </a>
                                 <?php
                                 }
                                 ?>
                              </td>
                           </tr>
                           <tr>
                              <td>3</td>
                              <td>Photo</td>
                              <!-- <td><?php echo(!empty($res->created_at) ? date('Y-m-d', strtotime($res->created_at)) : ''); ?></td> -->
                               <td><?php echo(!empty($res->passport_size_photo ) ? $res->passport_size_photo_status : 'Pending'); ?></td>
                              <td>
                                 <?php
                                 if(!empty($res->passport_size_photo)){
                                 ?>
                                 <a href="<?php echo base_url('uploads/employee/others/').$res->passport_size_photo; ?>" class="btn btn-link"> Open Doc </a>
                                 <?php
                                 }
                                 ?>
                              </td>
                           </tr>
                           <tr>
                              <td>4</td>
                              <td>Identity Proof</td>
                             <!--  <td><?php echo(!empty($res->created_at) ? date('Y-m-d', strtotime($res->created_at)) : ''); ?></td> -->
                              <td><?php echo(!empty($res->identity_proof_1) && !empty($res->identity_proof_2) ? $res->identity_proof_status : 'Pending'); ?></td>
                              <td>
                                 <?php
                                 if(!empty($res->identity_proof_1) && !empty($res->identity_proof_2)){
                                 ?>
                                 <a href="<?php echo base_url('uploads/employee/others/').$res->identity_proof_1; ?>" class="btn btn-link"> Open Doc1 </a>|<a href="<?php echo base_url('uploads/employee/others/').$res->identity_proof_2; ?>" class="btn btn-link"> Open Doc2 </a>
                                 <?php
                                 }
                                 ?>
                              </td>
                           </tr>
                           <tr>
                              <td>5</td>
                              <td>Education Certificates</td>
                             <!--  <td><?php echo(!empty($res->created_at) ? date('Y-m-d', strtotime($res->created_at)) : ''); ?></td> -->
                              <td><?php echo(!empty($res->education_certificate_10) && !empty($res->education_certificate_12) ? $res->education_certificate_status : 'Pending'); ?></td>
                              <td>
                                 <?php
                                 if(!empty($res->education_certificate_10) && !empty($res->education_certificate_12)){
                                 ?>
                                 <a href="<?php echo base_url('uploads/employee/others/').$res->education_certificate_10; ?>" class="btn btn-link"> Open Doc1 </a>|<a href="<?php echo base_url('uploads/employee/others/').$res->education_certificate_12; ?>" class="btn btn-link"> Open Doc2 </a>
                                 <?php
                                 }
                                 ?>
                              </td>
                           </tr>
                           <tr>
                              <td>6</td>
                              <td>Professional Qualification</td>
                             <!--  <td><?php echo(!empty($res->created_at) ? date('Y-m-d', strtotime($res->created_at)) : ''); ?></td> -->
                              <td><?php echo(!empty($res->professional_qualification_diploma) && !empty($res->professional_qualification_graduation) && !empty($res->professional_qualification_post_graduation) ? $res->professional_qualification_status : 'Pending'); ?></td>
                              <td>
                                <?php
                                 if(!empty($res->professional_qualification_diploma) && !empty($res->professional_qualification_graduation) && !empty($res->professional_qualification_post_graduation)){
                                 ?>
                                 <a href="<?php echo base_url('uploads/employee/others/').$res->professional_qualification_diploma; ?>" class="btn btn-link"> Open Doc1 </a>|<a href="<?php echo base_url('uploads/employee/others/').$res->professional_qualification_graduation; ?>" class="btn btn-link"> Open Doc2 </a>|<a href="<?php echo base_url('uploads/employee/others/').$res->professional_qualification_post_graduation; ?>" class="btn btn-link"> Open Doc3 </a>
                                 <?php
                                 }
                                 if(!empty($res->professional_qualification_any_other)){
                                 ?>
                                 |<a href="<?php echo base_url('uploads/employee/others/').$res->professional_qualification_any_other; ?>" class="btn btn-link"> Open Doc4 </a>
                                 <?php
                                 }
                                 ?>
                              </td>
                           </tr>
                           <tr>
                              <td>7</td>
                              <td>PAN Card</td>
                              <!-- <td><?php echo(!empty($res->created_at) ? date('Y-m-d', strtotime($res->created_at)) : ''); ?></td> -->
                              <td><?php echo(!empty($res->pan_card ) ? $res->pan_card_status : 'Pending'); ?></td>
                              <td>
                                 <?php
                                 if(!empty($res->pan_card)){
                                 ?>
                                 <a href="<?php echo base_url('uploads/employee/others/').$res->pan_card; ?>" class="btn btn-link"> Open Doc </a>
                                 <?php
                                 }
                                 ?>
                              </td>
                           </tr>
                           <tr>
                              <td>8</td>
                              <td>Aadhaar Card </td>
                              <!-- <td><?php echo(!empty($res->created_at) ? date('Y-m-d', strtotime($res->created_at)) : ''); ?></td> -->
                              <td><?php echo(!empty($res->aadhaar_card ) ? $res->aadhaar_card_status : 'Pending'); ?></td>
                              <td>
                                <?php
                                 if(!empty($res->aadhaar_card)){
                                 ?>
                                 <a href="<?php echo base_url('uploads/employee/others/').$res->aadhaar_card; ?>" class="btn btn-link"> Open Doc1 </a>
                                 <?php
                                 }
                                 ?>
                                 <?php
                                 if(!empty($res->aadhaar_card2)){
                                 ?>
                                 |<a href="<?php echo base_url('uploads/employee/others/').$res->aadhaar_card2; ?>" class="btn btn-link"> Open Doc2 </a>
                                 <?php
                                 }
                                 ?>

                              </td>
                           </tr>
                           <tr>
                              <td>9</td>
                              <td>Permanent Address Proof</td>
                              <!-- <td><?php echo(!empty($res->created_at) ? date('Y-m-d', strtotime($res->created_at)) : ''); ?></td> -->
                              <td><?php echo(!empty($res->permanent_address_proof ) ? $res->permanent_address_proof_status : 'Pending'); ?></td>
                              <td>
                                 <?php
                                 if(!empty($res->permanent_address_proof)){
                                 ?>
                                 <a href="<?php echo base_url('uploads/employee/others/').$res->permanent_address_proof; ?>" class="btn btn-link"> Open Doc </a>
                                 <?php
                                 }
                                 ?>
                              </td>
                           </tr>
                           <tr>
                              <td>10</td>
                              <td>Passport (Front & Rear pages)</td>
                             <!--  <td><?php echo(!empty($res->created_at) ? date('Y-m-d', strtotime($res->created_at)) : ''); ?></td> -->
                              <td><?php echo(!empty($res->passport_front) && !empty($res->passport_rear) ? $res->passport_status : 'Pending'); ?></td>
                              <td>
                                 <?php
                                 if(!empty($res->passport_front) && !empty($res->passport_rear)){
                                 ?>
                                 <a href="<?php echo base_url('uploads/employee/others/').$res->passport_front; ?>" class="btn btn-link"> Open Doc1 </a>|<a href="<?php echo base_url('uploads/employee/others/').$res->passport_rear; ?>" class="btn btn-link"> Open Doc2 </a>
                                 <?php
                                 }
                                 ?>
                              </td>
                           </tr>
                           <tr>
                              <td>11</td>
                              <td>Last 3 salary slip</td>
                            <!--   <td><?php echo(!empty($res->created_at) ? date('Y-m-d', strtotime($res->created_at)) : ''); ?></td> -->
                              <td><?php echo(!empty($res->experience_salary_slip ) ? $res->experience_salary_slip_status : 'Pending'); ?></td>
                              <td>
                                 <?php
                                 if(!empty($res->experience_salary_slip)){
                                 ?>
                                 <a href="<?php echo base_url('uploads/employee/others/').$res->experience_salary_slip; ?>" class="btn btn-link"> Open Doc1 </a>
                                 <?php
                                 }
                                 if(!empty($res->experience_salary_slip2)){
                                 ?>
                                 <a href="<?php echo base_url('uploads/employee/others/').$res->experience_salary_slip2; ?>" class="btn btn-link"> Open Doc2 </a>
                                 <?php
                                 }
                                 if(!empty($res->experience_salary_slip3)){
                                 ?>
                                 <a href="<?php echo base_url('uploads/employee/others/').$res->experience_salary_slip3; ?>" class="btn btn-link"> Open Doc3 </a>
                                 <?php
                                 }
                                 ?>
                              </td>
                           </tr>
                           <tr>
                           <td>12</td>
                           <td>Bank statement of 3 months</td>
                           <!-- <td><?php echo(!empty($res->created_at) ? date('Y-m-d', strtotime($res->created_at)) : ''); ?></td> -->
                           <td><?php echo(!empty($res->bank_statement ) ? $res->bank_statement_status : 'Pending'); ?></td>
                           <td>
                              <?php
                              if(!empty($res->bank_statement)){
                              ?>
                              <a href="<?php echo base_url('uploads/employee/others/').$res->bank_statement; ?>" class="btn btn-link"> Open Doc1 </a>
                              <?php
                              }
                              if(!empty($res->bank_statement2)){
                              ?>
                              |<a href="<?php echo base_url('uploads/employee/others/').$res->bank_statement2; ?>" class="btn btn-link"> Open Doc2 </a>
                              <?php
                              }
                              if(!empty($res->bank_statement3)){
                              ?>
                              |<a href="<?php echo base_url('uploads/employee/others/').$res->bank_statement3; ?>" class="btn btn-link"> Open Doc3 </a>
                              <?php
                              }
                              ?>
                           </td>
                        </tr>
                        <tr>
                           <td>13</td>
                           <td>Relieving Letter</td>
                          <!--  <td><?php echo(!empty($res->created_at) ? date('Y-m-d', strtotime($res->created_at)) : ''); ?></td> -->
                           <td><?php echo(!empty($res->relieving_letter ) ? $res->relieving_letter_status : 'Pending'); ?></td>
                           <td>
                              <?php
                              if(!empty($res->relieving_letter)){
                              ?>
                              <a href="<?php echo base_url('uploads/employee/others/').$res->relieving_letter; ?>" class="btn btn-link"> Open Doc1 </a>
                              <?php
                              }
                              ?>
                              <?php
                              if(!empty($res->relieving_letter2)){
                              ?>
                              |<a href="<?php echo base_url('uploads/employee/others/').$res->relieving_letter2; ?>" class="btn btn-link"> Open Doc2 </a>
                              <?php
                              }
                              ?>
                              <?php
                              if(!empty($res->relieving_letter3)){
                              ?>
                              |<a href="<?php echo base_url('uploads/employee/others/').$res->relieving_letter3; ?>" class="btn btn-link"> Open Doc3 </a>
                              <?php
                              }
                              ?>
                           </td>
                        </tr>
                        <tr>
                           <td>14</td>
                           <td>Revision Letter</td>
                           <!-- <td><?php echo(!empty($res->created_at) ? date('Y-m-d', strtotime($res->created_at)) : ''); ?></td> -->
                           <td><?php echo(!empty($res->revision_letter ) ? $res->revision_letter_status : 'Pending'); ?></td>
                           <td>
                              <?php
                              if(!empty($res->revision_letter)){
                              ?>
                              <a href="<?php echo base_url('uploads/employee/others/').$res->revision_letter; ?>" class="btn btn-link"> Open Doc </a>
                              <?php
                              }
                              ?>
                           </td>
                        </tr>
                        <tr>
                           <td>15</td>
                           <td>Incentive Proofs</td>
                          <!--  <td><?php echo(!empty($res->created_at) ? date('Y-m-d', strtotime($res->created_at)) : ''); ?></td> -->
                           <td><?php echo(!empty($res->incentive_proof ) ? $res->incentive_proof_status : 'Pending'); ?></td>
                           <td>
                              <?php
                              if(!empty($res->incentive_proof)){
                              ?>
                              <a href="<?php echo base_url('uploads/employee/others/').$res->incentive_proof; ?>" class="btn btn-link"> Open Doc </a>
                              <?php
                              }
                              ?>
                           </td>
                        </tr>
                        <tr>
                           <td>16</td>
                           <td>Experience Certificate</td>
                          <!--  <td><?php echo(!empty($res->created_at) ? date('Y-m-d', strtotime($res->created_at)) : ''); ?></td> -->
                           <td><?php echo(!empty($res->experience_certificate ) ? $res->experience_certificate_status : 'Pending'); ?></td>
                           <td>
                              <?php
                              if(!empty($res->experience_certificate)){
                              ?>
                              <a href="<?php echo base_url('uploads/employee/others/').$res->experience_certificate; ?>" class="btn btn-link"> Open Doc </a>
                              <?php
                              }
                              ?>
                           </td>
                        </tr>
                        <tr>
                           <td>17</td>
                           <td>Form 16</td>
                          <!--  <td><?php echo(!empty($res->created_at) ? date('Y-m-d', strtotime($res->created_at)) : ''); ?></td> -->
                           <td><?php echo(!empty($res->form_16 ) ? $res->form_16_status : 'Pending'); ?></td>
                           <td>
                              <?php
                              if(!empty($res->form_16)){
                              ?>
                              <a href="<?php echo base_url('uploads/employee/others/').$res->form_16; ?>" class="btn btn-link"> Open Doc </a>
                              <?php
                              }
                              ?>
                           </td>
                        </tr>
                        <tr>
                           <td>18</td>
                           <td>EPF Number/ UAN</td>
                          <!--  <td><?php echo(!empty($res->created_at) ? date('Y-m-d', strtotime($res->created_at)) : ''); ?></td> -->
                           <td><?php echo(!empty($res->EPF_UAN_number ) ? $res->EPF_UAN_number_status : 'Pending'); ?></td>
                           <td>
                              <?php
                              if(!empty($res->EPF_UAN_number)){
                              ?>
                              <a href="<?php echo base_url('uploads/employee/others/').$res->EPF_UAN_number; ?>" class="btn btn-link"> Open Doc </a>
                              <?php
                              }
                              ?>
                           </td>
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
     
<!-- <style type="text/css">
   .dataTables_filter {
display: none;
}
</style> -->
<script type="text/javascript">
  $('#department_list').dataTable({
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
</script>
     