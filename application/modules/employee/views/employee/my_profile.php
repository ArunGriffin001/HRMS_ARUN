<style type="text/css">
    .personal-info li .title {
    width: 40%;
    margin-right: 0px;
}
</style>
<div class="section-body">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="card mb-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-view">
                                <div class="profile-img-wrap">
                                    <div class="profile-img">
                                        <?php
                                        $default = base_url('template/').'employee/assets/images/avatar1.jpg';
                                        $new_url = base_url().'/uploads/employer/users/'.$emp_info->profile_img;
                                        ?>
                                        <a href="#"><img alt="" src="<?php echo (!empty($emp_info->profile_img) ? $new_url : $default); ?>" src="<?php echo base_url('template/'); ?>employee/assets/images/avatar1.jpg" height="120" width="120"></a>
                                    </div>
                                </div>
                                <div class="profile-basic">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="profile-info-left">
                                                <h3 class="user-name m-t-0 mb-0"><?php echo ( !empty($emp_info->first_name) ? $emp_info->first_name.' '.$emp_info->last_name : 'NA'); ?></h3>
                                                <h6 class="text-muted"><?php echo'Dept: '. (!empty($emp_info->dept_name) ? $emp_info->dept_name : 'NA'); ?></h6>
                                                <small class="text-muted">
                                                    <?php
                                                    echo'Desination: '. (!empty($emp_info->emp_desination) ? $emp_info->emp_desination : 'NA');
                                                ?></small>
                                               
                                                <div class=" small staff-id">Employee ID : <?php echo (!empty($emp_info->employee_id) ? $emp_info->employee_id : 'NA'); ?></div>
                                                <!-- <div class="small doj text-muted mt-1">Grade/Band : <?php echo (!empty($emp_info->band_name) ? $emp_info->band_name : 'NA'); ?>
                                                </div> -->
                                               
                                                <div class="small doj text-muted mt-1">Date of Join : <?php echo (!empty($emp_info->joining_date) ? date('Y-m-d',strtotime($emp_info->joining_date)) : 'NA'); ?>
                                                </div>

                                                    <?php 
                                                    $confirmation_date = ( !empty($emp_info->joining_date) ? date('Y-m-d', strtotime("+6 months", strtotime($emp_info->joining_date))) : '');
                                                    ?>
                                                  <div class="small doj text-muted mt-1">Confirmation date : <?php echo (!empty($confirmation_date) ? $confirmation_date : 'NA'); ?></div>
                                                <?php
                                                $dept_head = getDapartmentHead($emp_info->employee_id);
                                                ?>
                                                <div class="small doj text-muted mt-1">Dept. head : <?php echo (!empty($dept_head) ? $dept_head->full_name : 'NA'); ?></div>
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <ul class="personal-info">
                                                <li>
                                                    <div class="title">Phone:</div>
                                                    <div class="text"><?php echo (!empty($emp_info->mobile_no) ? $emp_info->mobile_no : 'NA'); ?></div>
                                                </li>
                                                <li>
                                                    <div class="title">Email:</div>
                                                    <div class="text"><?php echo (!empty($emp_info->email_id) ? $emp_info->email_id : 'NA'); ?></div>
                                                </li>
                                                <li>
                                                    <div class="title">Birthday:</div>
                                                    <div class="text"><?php echo (!empty($emp_info->dob) ? date('Y-m-d',strtotime($emp_info->dob)) : 'NA'); ?></div>
                                                </li>
                                                <li>
                                                    <div class="title">Address:</div>
                                                    <div class="text"><?php echo (!empty($emp_info->address) ? $emp_info->address : 'NA'); ?></div>
                                                </li>
                                                <li>
                                                    <div class="title">Alternate:</div>
                                                    <div class="text"><?php echo (!empty($emp_info->alternate_address) ? $emp_info->alternate_address : 'NA'); ?></div>
                                                </li>
                                                <li>
                                                    <div class="title">Communication:</div>
                                                    <div class="text"><?php echo (!empty($emp_info->communication_address) ? $emp_info->communication_address : 'NA'); ?></div>
                                                </li>
                                                <li>
                                                    <div class="title">Gender:</div>
                                                    <div class="text"><?php echo (!empty($emp_info->gender) ? $emp_info->gender : 'NA'); ?></div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="pro-edit">
                                    <a class="edit-icon" href="<?php echo base_url('employee/my-profile/edit_level_one'); ?>"><i class="fa fa-pencil"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section-body py-4">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-12">
                <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-calendar-tab" data-toggle="pill" href="#pills-calendar" role="tab" aria-controls="pills-calendar" aria-selected="false">Personal Information</a>
                    </li>
                    
                </ul>
            </div>
            <div class="col-lg-10 col-md-12">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="row">
                            <div class="col-md-12 d-flex">
                                <div class="card profile-box flex-fill">
                                    <div class="card-body">
                                        <h3 class="card-title">
                                            Personal Informations <a href="<?php echo base_url('employee/my-profile/edit_level_two'); ?>" class="edit-icon" ><i class="fa fa-pencil"></i></a>
                                        </h3>
                                        <ul class="personal-info">
                                           <!--  <li>
                                                <div class="title">Mobile</div>
                                                <div class="text">9876543210</div>
                                            </li> -->
                                            <li>
                                                <div class="title">Country</div>
                                                <div class="text"><?php echo (!empty($emp_info->country_name) ? $emp_info->country_name : 'NA'); ?></div>
                                            </li>
                                            <li>
                                                <div class="title">State</div>
                                                <div class="text"><?php echo (!empty($emp_info->state_name) ? $emp_info->state_name : 'NA'); ?></div>
                                            </li>
                                            <li>
                                                <div class="title">City</div>
                                                <div class="text"><?php echo (!empty($emp_info->city_name) ? $emp_info->city_name : 'NA'); ?></div>
                                            </li>
                                            <li>
                                                <div class="title">PF reg number</div>
                                                <div class="text"><?php echo (!empty($emp_info->PF_reg_number) ? $emp_info->PF_reg_number : 'NA'); ?></div>
                                            </li>
                                            <li>
                                                <div class="title">UAN Number</div>
                                                <div class="text"><?php echo (!empty($emp_info->UAN_number) ? $emp_info->UAN_number : 'NA'); ?></div>
                                            </li>
                                            <li>
                                                <div class="title">Bank Account</div>
                                                <div class="text"><?php echo (!empty($emp_info->bank_account_number) ? $emp_info->bank_account_number : 'NA'); ?></div>
                                            </li>
                                            <li>
                                                <div class="title">IFSC Code</div>
                                                <div class="text"><?php echo (!empty($emp_info->IFSC_code) ? $emp_info->IFSC_code : 'NA'); ?></div>
                                            </li>
                                            <li>
                                                <div class="title">PRAN Number</div>
                                                <div class="text"><?php echo (!empty($emp_info->pran_number) ? $emp_info->pran_number : 'NA'); ?></div>
                                            </li>
                                            <li>
                                                <div class="title">Pan Number</div>
                                                <div class="text"><?php echo (!empty($emp_info->pan_number) ? $emp_info->pan_number : 'NA'); ?></div>
                                            </li>
                                            <li>
                                                <div class="title">Aadhar Number</div>
                                                <div class="text"><?php echo (!empty($emp_info->aadhar_number) ? $emp_info->aadhar_number : 'NA'); ?></div>
                                            </li>
                                            <li>
                                                <div class="title">PF Join Date</div>
                                                <div class="text"><?php echo (!empty($user_data->PF_Joining_date) ? date('Y-m-d',strtotime($user_data->PF_Joining_date)) : 'NA'); ?></div>
                                            </li>
                                            <li>
                                                <div class="title">Family PF No</div>
                                                <div class="text"><?php echo (!empty($emp_info->Family_pf_no) ? $emp_info->Family_pf_no : 'NA'); ?></div>
                                            </li>
                                            <li>
                                                <div class="title">Member of EPS</div>
                                                <div class="text"><?php echo (!empty($emp_info->is_existing_member_of_eps) ? $emp_info->is_existing_member_of_eps : 'NA'); ?></div>
                                            </li>
                                            <li>
                                                <div class="title">Allow EPF excess</div>
                                                <div class="text"><?php echo (!empty($emp_info->allow_epf_access_contribution) ? $emp_info->allow_epf_access_contribution : 'NA'); ?></div>
                                            </li>
                                            <li>
                                                <div class="title">Allow EPS excess</div>
                                                <div class="text"><?php echo (!empty($emp_info->allow_eps_access_contribution) ? $emp_info->allow_eps_access_contribution : 'NA'); ?></div>
                                            </li>
                                            <li>
                                                <div class="title">ESI No.</div>
                                                <div class="text"><?php echo (!empty($emp_info->ESI_account_number) ? $emp_info->ESI_account_number : 'NA'); ?></div>
                                            </li>
                                            <li>
                                                
                                                 <span class="tag tag-pink">PF KYC Not Done</span>
                                                 
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 d-flex">
                                <div class="card profile-box flex-fill">
                                    <div class="card-body">
                                        <h3 class="card-title">
                                            Emergency Contact <a href="<?php echo base_url('employee/my-profile/edit_level_three'); ?>" class="edit-icon" ><i class="fa fa-pencil"></i></a>
                                        </h3>
                                        <h5 class="section-title">Primary</h5>
                                        <ul class="personal-info">
                                            <li>
                                                <div class="title">Name</div>
                                                <div class="text"><?php echo (!empty($emp_info->fathers_name) ? $emp_info->fathers_name : 'NA'); ?></div>
                                            </li>
                                            <li>
                                                <div class="title">Relationship</div>
                                                <div class="text">Father</div>
                                            </li>
                                            <li>
                                                <div class="title">Phone</div>
                                                <div class="text"><?php echo (!empty($emp_info->emergency_primary_phone_number) ? $emp_info->emergency_primary_phone_number : 'NA'); ?></div>
                                            </li>
                                        </ul>
                                        <hr />
                                        <h5 class="section-title">Secondary</h5>
                                        <ul class="personal-info">
                                            <li>
                                                <div class="title">Name</div>
                                                <div class="text"><?php echo (!empty($emp_info->mothers_name) ? $emp_info->mothers_name : 'NA'); ?></div>
                                            </li>
                                            <li>
                                                <div class="title">Relationship</div>
                                                <div class="text">Mother</div>
                                            </li>
                                            <li>
                                                <div class="title">Phone</div>
                                                <div class="text"><?php echo (!empty($emp_info->emergency_secondary_phone_number) ? $emp_info->emergency_secondary_phone_number : 'NA'); ?></div>
                                            </li>
                                        </ul>
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
