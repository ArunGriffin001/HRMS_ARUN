<link rel="stylesheet" type="text/css" href="<?php echo base_url('template/'); ?>employer/assets/css/jquery-datetimepicker.css">
<div class="header_btn">
   <div class="header-action">
      <h4 class="text-left d-inline">Employee Name: <?php echo (!empty($user_data->first_name) ? ucfirst($user_data->first_name.' '.$user_data->last_name) : ''); ?></h4>
      <a href="<?php echo base_url('employer/hrms/users'); ?>" class="btn btn-primary float-right"><i class="fa fa-plus mr-2"></i>Back</a>
   </div>
</div>

<div class="section-body mt-3">
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
   <form method="post" action="<?php echo base_url('employer/hrms/users/updatePfEsiInfo/').encode($user_data->employee_id); ?>" data-parsley-validate="" enctype="multipart/form-data">
      <div class="row clearfix">
         <div class="card">
            <div class="card-header">
               <h3 class="card-title">Bank Accounts</h3>
            </div>
               <div class="card-body">
                  <div class="row clearfix">
                     <div class="col-lg-6 col-md-12 col-sm-12">
                        <label for="bank_name_address">Bank Name *</label>
                        <div class="form-group"><input type="text" name="bank_name_address" value="<?php echo (!empty($user_data->bank_name_address) ? $user_data->bank_name_address : ''); ?>" class="form-control" id="bank_name_address" data-parsley-required-message="Please enter Bank name" required="" placeholder="Bank Name" autocomplete="off"></div>
                     </div>
                     <div class="col-lg-6 col-md-12 col-sm-12">
                        <label for="bank_account_number">Bank Account Number *</label>
                        <div class="form-group"><input type="text" name="bank_account_number" value="<?php echo (!empty($user_data->bank_account_number) ? $user_data->bank_account_number : ''); ?>" class="form-control" id="bank_account_number" data-parsley-required-message="Please enter Bank account number" required="" placeholder="Bank Account Number" autocomplete="off"></div>
                     </div>
                     <div class="col-lg-6 col-md-12 col-sm-12">
                        <label for="IFSC_code">IFSC Code *</label>
                        <div class="form-group"><input type="text" name="IFSC_code" value="<?php echo (!empty($user_data->IFSC_code) ? $user_data->IFSC_code : ''); ?>" class="form-control" id="IFSC_code"  required="" data-parsley-required-message="Please enter IFSC Code" placeholder="IFSC Code" autocomplete="off"></div>
                     </div>
                   
                  </div>
               </div>
         </div>
      </div>
 
      <div class="row clearfix">
         <div class="card">
            <div class="card-header">
               <h3 class="card-title">PF Accounts</h3>
            </div>
               <div class="card-body">
                  <div class="row clearfix">
                     <div class="col-lg-6 col-md-6 col-sm-12">
                        <label for="UAN_number">UAN Number *</label>
                        <div class="form-group"><input type="text" name="UAN_number" value="<?php echo (!empty($user_data->UAN_number) ? $user_data->UAN_number : ''); ?>" class="form-control" id="UAN_number" data-parsley-required-message="Please enter UAN number" placeholder="UAN number" autocomplete="off"></div>
                     </div>
                     <div class="col-lg-6 col-md-6 col-sm-12">
                        <label for="last_name">PF Number</label>
                        <div class="form-group"><input type="text" name="PF_reg_number" value="<?php echo (!empty($user_data->PF_reg_number) ? $user_data->PF_reg_number : ''); ?>" class="form-control" data-parsley-required-message="Please enter PF number" placeholder="PF Number" autocomplete="off"></div>
                     </div>
                     <div class="col-lg-6 col-md-6 col-sm-12">
                        <label for="PF_Joining_date">PF Join Date</label>
                        <div class="form-group"><input type="text" name="PF_Joining_date" value="<?php echo (!empty($user_data->PF_Joining_date) ? date('Y-m-d',strtotime($user_data->PF_Joining_date)) : ''); ?>" class="form-control" id="PF_Joining_date"  data-parsley-required-message="Please enter PF join date" readonly placeholder="PF Join Date" ></div>
                     </div>
                     <div class="col-lg-6 col-md-6 col-sm-12">
                        <label for="mothers_name">Family PF No </label>
                        <div class="form-group"><input type="text" name="Family_pf_no" value="<?php echo (!empty($user_data->Family_pf_no) ? $user_data->Family_pf_no : ''); ?>" class="form-control" data-parsley-required-message="Please enter family pf no" placeholder="Family PF no" autocomplete="off"></div>
                     </div>
                     <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="form-group">
                           <label class="form-label">Is KYC Done</label>
                           <select class="form-control custom-select" name="PF_KYC_Done">
                              <option value="Yes" <?php echo ($user_data->PF_KYC_Done == "Yes" ? 'selected' : ''); ?> >Yes</option>
                              <option value="No" <?php echo ($user_data->PF_KYC_Done == "No" ? 'selected' : ''); ?> >No</option>
                           </select>
                        </div>
                     </div>
                     <!-- <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="form-group">
                           <label class="form-label">Is existing member of EPS</label>
                           <select class="form-control custom-select" name="is_existing_member_of_eps">
                              <option value="Yes" <?php echo ($user_data->is_existing_member_of_eps == "Yes" ? 'selected' : ''); ?> >Yes</option>
                              <option value="No" <?php echo ($user_data->is_existing_member_of_eps == "No" ? 'selected' : ''); ?> >No</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="form-group">
                           <label class="form-label">Allow EPF excess contribution</label>
                           <select class="form-control custom-select" name="allow_epf_access_contribution">
                              <option value="Yes" <?php echo ($user_data->allow_epf_access_contribution == "Yes" ? 'selected' : ''); ?> >Yes</option>
                              <option value="No" <?php echo ($user_data->allow_epf_access_contribution == "No" ? 'selected' : ''); ?> >No</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="form-group">
                           <label class="form-label">Allow EPS excess contribution</label>
                           <select class="form-control custom-select" name="allow_eps_access_contribution">
                             <option value="No" <?php echo ($user_data->allow_eps_access_contribution == "Yes" ? 'selected' : ''); ?> >Yes</option>
                             <option value="No" <?php echo ($user_data->allow_eps_access_contribution == "No" ? 'selected' : ''); ?> >No</option>
                           </select>
                        </div>
                     </div> -->
                     <!-- <div class="col-lg-4 col-md-4 col-sm-12">
                     <span class="tag tag-pink mb-3">PF KYC Not Done</span>
                     </div> -->
                     
                  </div>
               </div>

         </div>
      </div>
      <div class="row clearfix">
         <div class="card">
            <div class="card-header">
               <h3 class="card-title">ESI Accounts</h3>
            </div>
               <div class="card-body">
                  <div class="row clearfix">
                 
                     <div class="col-lg-12 col-md-12 col-sm-12">
                     <label for="ESI_account_number">ESI No.</label>
                     <div class="form-group"><input type="text" name="ESI_account_number" value="<?php echo (!empty($user_data->ESI_account_number) ? $user_data->ESI_account_number : ''); ?>" class="form-control" id="ESI_account_number"  data-parsley-required-message="Please enter ESI no" autocomplete="off"></div>
                  </div>
                   
                  </div>
               </div>
         </div>
      </div>
     <div class="row clearfix mb-5">
         <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary btn-update">Update</button>
         </div>
      </div>
   </form>
</div>

<style>
.btn.btn-primary.btn-update{
   width:200px
}
.card.update_card{
   padding:12px

}
</style>

<script type="text/javascript" src="<?php echo base_url('template/'); ?>employer/assets/js/jquery.datetimepicker.js"></script>
<script type="text/javascript">
   $('#PF_Joining_date').datetimepicker({
      format: 'Y-m-d',
      timepicker:false,
   });
</script>