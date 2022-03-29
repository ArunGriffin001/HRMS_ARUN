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
                              <th> <?php echo $this->lang->line('tb_action'); ?> </th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td>1</td>
                              <td>Resume</td>
                             <!--  <td><?php echo(!empty($res->created_at) ? date('Y-m-d', strtotime($res->created_at)) : ''); ?></td> -->
                              <td><?php echo(!empty($res->resume_doc ) ? $res->resume_status : 'Pending'); ?></td>
                              <td>
                                  <a href="<?php echo base_url('employee/employee/add_resume'); ?>" class="btn btn-primary"> Update</a>
                              </td>
                           </tr>
                           <tr>
                              <td>2</td>
                              <td>Offer Letter</td>
                              <!-- <td><?php echo(!empty($res->created_at) ? date('Y-m-d', strtotime($res->created_at)) : ''); ?></td> -->
                              <td><?php echo(!empty($res->offer_letter_doc ) ? $res->offer_letter_status : 'Pending'); ?></td>
                              <td>
                                 <a href="<?php echo base_url('employee/employee/offer_letter'); ?>" class="btn btn-primary"> Update</a>
                              </td>
                           </tr>
                           <tr>
                              <td>3</td>
                              <td>Photo</td>
                              <!-- <td><?php echo(!empty($res->created_at) ? date('Y-m-d', strtotime($res->created_at)) : ''); ?></td> -->
                               <td><?php echo(!empty($res->passport_size_photo ) ? $res->passport_size_photo_status : 'Pending'); ?></td>
                              <td>
                                  <a href="<?php echo base_url('employee/employee/passport_photo'); ?>" class="btn btn-primary"> Update</a>
                              </td>
                           </tr>
                           <tr>
                              <td>4</td>
                              <td>Identity Proof</td>
                             <!--  <td><?php echo(!empty($res->created_at) ? date('Y-m-d', strtotime($res->created_at)) : ''); ?></td> -->
                              <td><?php echo(!empty($res->identity_proof_1) && !empty($res->identity_proof_2) ? $res->identity_proof_status : 'Pending'); ?></td>
                              <td>
                                 <a href="<?php echo base_url('employee/employee/identity_proof'); ?>" class="btn btn-primary"> Update</a>
                              </td>
                           </tr>
                           <tr>
                              <td>5</td>
                              <td>Education Certificates</td>
                             <!--  <td><?php echo(!empty($res->created_at) ? date('Y-m-d', strtotime($res->created_at)) : ''); ?></td> -->
                              <td><?php echo(!empty($res->education_certificate_10) && !empty($res->education_certificate_12) ? $res->education_certificate_status : 'Pending'); ?></td>
                              <td>
                                 <a href="<?php echo base_url('employee/employee/education_certificate'); ?>" class="btn btn-primary"> Update</a>
                              </td>
                           </tr>
                           <tr>
                              <td>6</td>
                              <td>Professional Qualification</td>
                             <!--  <td><?php echo(!empty($res->created_at) ? date('Y-m-d', strtotime($res->created_at)) : ''); ?></td> -->
                              <td><?php echo(!empty($res->professional_qualification_diploma) && !empty($res->professional_qualification_graduation) && !empty($res->professional_qualification_post_graduation) ? $res->professional_qualification_status : 'Pending'); ?></td>
                              <td>
                                 <a href="<?php echo base_url('employee/employee/professional_qualification'); ?>" class="btn btn-primary"> Update</a>
                              </td>
                           </tr>
                           <tr>
                              <td>7</td>
                              <td>PAN Card</td>
                              <!-- <td><?php echo(!empty($res->created_at) ? date('Y-m-d', strtotime($res->created_at)) : ''); ?></td> -->
                              <td><?php echo(!empty($res->pan_card ) ? $res->pan_card_status : 'Pending'); ?></td>
                              <td>
                                 <a href="<?php echo base_url('employee/employee/pan_card'); ?>" class="btn btn-primary"> Update</a>
                              </td>
                           </tr>
                           <tr>
                              <td>8</td>
                              <td>Aadhaar Card </td>
                              <!-- <td><?php echo(!empty($res->created_at) ? date('Y-m-d', strtotime($res->created_at)) : ''); ?></td> -->
                              <td><?php echo(!empty($res->aadhaar_card ) ? $res->aadhaar_card_status : 'Pending'); ?></td>
                              <td>
                                 <a href="<?php echo base_url('employee/employee/aadhaar_card'); ?>" class="btn btn-primary"> Update</a>
                              </td>
                           </tr>
                           <tr>
                              <td>9</td>
                              <td>Permanent Address Proof</td>
                              <!-- <td><?php echo(!empty($res->created_at) ? date('Y-m-d', strtotime($res->created_at)) : ''); ?></td> -->
                              <td><?php echo(!empty($res->permanent_address_proof ) ? $res->permanent_address_proof_status : 'Pending'); ?></td>
                              <td>
                                 <a href="<?php echo base_url('employee/employee/permanent_address_proof'); ?>" class="btn btn-primary"> Update</a>
                              </td>
                           </tr>
                           <tr>
                              <td>10</td>
                              <td>Passport (Front & Rear pages)</td>
                             <!--  <td><?php echo(!empty($res->created_at) ? date('Y-m-d', strtotime($res->created_at)) : ''); ?></td> -->
                              <td><?php echo(!empty($res->passport_front) && !empty($res->passport_rear) ? $res->passport_status : 'Pending'); ?></td>
                              <td>
                                 <a href="<?php echo base_url('employee/employee/passport_front_rear'); ?>" class="btn btn-primary"> Update</a>
                              </td>
                           </tr>
                           <tr>
                              <td>11</td>
                              <td>Last 3 salary slip</td>
                            <!--   <td><?php echo(!empty($res->created_at) ? date('Y-m-d', strtotime($res->created_at)) : ''); ?></td> -->
                              <td><?php echo(!empty($res->experience_salary_slip ) ? $res->experience_salary_slip_status : 'Pending'); ?></td>
                              <td>
                                 <a href="<?php echo base_url('employee/employee/last_salary_slip'); ?>" class="btn btn-primary"> Update</a>
                              </td>
                           </tr>
                           <tr>
                           <td>12</td>
                           <td>Bank statement of 3 months</td>
                           <!-- <td><?php echo(!empty($res->created_at) ? date('Y-m-d', strtotime($res->created_at)) : ''); ?></td> -->
                           <td><?php echo(!empty($res->bank_statement ) ? $res->bank_statement_status : 'Pending'); ?></td>
                           <td>
                              <a href="<?php echo base_url('employee/employee/bank_statement'); ?>" class="btn btn-primary"> Update</a>
                           </td>
                        </tr>
                        <tr>
                           <td>13</td>
                           <td>Relieving Letter</td>
                          <!--  <td><?php echo(!empty($res->created_at) ? date('Y-m-d', strtotime($res->created_at)) : ''); ?></td> -->
                           <td><?php echo(!empty($res->relieving_letter ) ? $res->relieving_letter_status : 'Pending'); ?></td>
                           <td>
                              <a href="<?php echo base_url('employee/employee/relieving_letter'); ?>" class="btn btn-primary"> Update</a>
                           </td>
                        </tr>
                        <tr>
                           <td>14</td>
                           <td>Revision Letter</td>
                           <!-- <td><?php echo(!empty($res->created_at) ? date('Y-m-d', strtotime($res->created_at)) : ''); ?></td> -->
                           <td><?php echo(!empty($res->revision_letter ) ? $res->revision_letter_status : 'Pending'); ?></td>
                           <td>
                              <a href="<?php echo base_url('employee/employee/revision_letter'); ?>" class="btn btn-primary"> Update</a>
                           </td>
                        </tr>
                        <tr>
                           <td>15</td>
                           <td>Incentive Proofs</td>
                          <!--  <td><?php echo(!empty($res->created_at) ? date('Y-m-d', strtotime($res->created_at)) : ''); ?></td> -->
                           <td><?php echo(!empty($res->incentive_proof ) ? $res->incentive_proof_status : 'Pending'); ?></td>
                           <td>
                              <a href="<?php echo base_url('employee/employee/incentive_proof'); ?>" class="btn btn-primary"> Update</a>
                           </td>
                        </tr>
                        <tr>
                           <td>16</td>
                           <td>Experience Certificate</td>
                          <!--  <td><?php echo(!empty($res->created_at) ? date('Y-m-d', strtotime($res->created_at)) : ''); ?></td> -->
                           <td><?php echo(!empty($res->experience_certificate ) ? $res->experience_certificate_status : 'Pending'); ?></td>
                           <td>
                              <a href="<?php echo base_url('employee/employee/experience_certificate'); ?>" class="btn btn-primary"> Update</a>
                           </td>
                        </tr>
                        <tr>
                           <td>17</td>
                           <td>Form 16</td>
                          <!--  <td><?php echo(!empty($res->created_at) ? date('Y-m-d', strtotime($res->created_at)) : ''); ?></td> -->
                           <td><?php echo(!empty($res->form_16 ) ? $res->form_16_status : 'Pending'); ?></td>
                           <td>
                              <a href="<?php echo base_url('employee/employee/form_i6'); ?>" class="btn btn-primary"> Update</a>
                           </td>
                        </tr>
                        <tr>
                           <td>18</td>
                           <td>EPF Number/ UAN</td>
                          <!--  <td><?php echo(!empty($res->created_at) ? date('Y-m-d', strtotime($res->created_at)) : ''); ?></td> -->
                           <td><?php echo(!empty($res->EPF_UAN_number ) ? $res->EPF_UAN_number_status : 'Pending'); ?></td>
                           <td>
                              <a href="<?php echo base_url('employee/employee/EPF_UAN'); ?>" class="btn btn-primary"> Update</a>
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
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
   <form method="post" action="<?php echo base_url('employee/employee/upload_doc'); ?>" data-parsley-validate="" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Doc</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="cross-icon" aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body">
            <div class="row clearfix">
               <div class="col-md-12 col-sm-12">
                  <label for="first_name">Title *</label>
                  <div class="form-group">
                     <input type="text" name="doc_title" value="" data-date-autoclose="true" class="form-control" placeholder="Title" required="">
                  </div>
               </div>
               <div class="col-md-12 col-sm-12">
                  <label for="first_name">Add document *</label>
                  <div class="form-group">
                     <input type="file" name="doc_file" id="doc_file" class="dropify" data-height="100" data-allowed-file-extensions="pdf doc docx xls xlsx jpg jpeg png gif"  data-default-file="" data-max-file-size="4M" required="">
                  </div>
               </div>
            </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
         </div>
      </div>
    </form>
  </div>
</div>
     
<style type="text/css">
   .dataTables_filter {
display: none;
}
</style>

<script type="text/javascript">
  $('#department_list').dataTable({
    "bPaginate": false,
    "pageLength": 50,
    "bLengthChange": false,
    "bFilter": false,
    "bSort": false,
    "bInfo": false,
    "bAutoWidth": false,
    "processing": false,
    "serverSide": false,
    "stateSave": false,
   
   
      });
</script>
     