<div class="header_btn">
   <div class="header-action">
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
   <form method="post" action="<?php echo base_url('employer/compliance-management/SettingPfEsiUpdate'); ?>" data-parsley-validate="">
      <div class="row clearfix">
         <div class="card">
            <div class="card-header">
               <h3 class="card-title">PF Contribution(%)</h3>
            </div>
            
               <div class="card-body">
                  <div class="row clearfix">
                     <div class="col-lg-6 col-md-12 col-sm-12">
                        <label for="employee_pf_contribution">Employee PF Contribution *</label>
                        <div class="form-group"><input type="text" name="employee_pf_contribution" value="<?php echo(!empty($res->employee_pf_contribution) ? $res->employee_pf_contribution : ''); ?>" class="form-control" id="employee_pf_contribution" placeholder="Employee PF Contribution" data-parsley-required-message="Please Enter Employee PF Contribution" data-parsley-type="number" step="0.01"  min="0" required=""></div>
                     </div>
                     <div class="col-lg-6 col-md-12 col-sm-12">
                        <label for="employer_pf_contribution">Employer PF Contribution *</label>
                        <div class="form-group"><input type="text" name="employer_pf_contribution" value="<?php echo(!empty($res->employer_pf_contribution) ? $res->employer_pf_contribution : ''); ?>" class="form-control" id="employer_pf_contribution" data-parsley-required-message="Employer PF Contribution" data-parsley-type="number" step="0.01"  min="0" required="" placeholder="Employer PF Contribution"></div>
                     </div>
                   
                  </div>
               </div>
         </div>
      </div>
 
      <div class="row clearfix">
         <div class="card">
            <div class="card-header">
               <h3 class="card-title">EPF Contribution(%)</h3>
            </div>
               <div class="card-body">
                  <div class="row clearfix">
                     <div class="col-lg-6 col-md-12 col-sm-12">
                        <label for="employee_epf_contribution">Employee EPF Contribution *</label>
                        <div class="form-group"><input type="text" name="employee_epf_contribution" value="<?php echo(!empty($res->employee_epf_contribution) ? $res->employee_epf_contribution : ''); ?>" class="form-control" id="employee_epf_contribution" data-parsley-required-message="Please Enter Employee EPF Contribution" data-parsley-type="number" step="0.01"  min="0" required="" placeholder="Employee EPF Contribution"></div>
                     </div>
                     <div class="col-lg-6 col-md-12 col-sm-12">
                        <label for="employer_epf_contribution">Employer EPF Contribution *</label>
                        <div class="form-group"><input type="text" name="employer_epf_contribution" value="<?php echo(!empty($res->employer_epf_contribution) ? $res->employer_epf_contribution : ''); ?>" class="form-control" id="employer_epf_contribution" data-parsley-required-message="Please Enter Employer EPF Contribution" data-parsley-type="number" step="0.01"  min="0" required="" placeholder="Employee EPF Contribution"></div>
                     </div>
                  </div>
               </div>

         </div>
      </div>
      <div class="row clearfix">
         <div class="card">
            <div class="card-header">
               <h3 class="card-title">Employer Pension Contribution(%)</h3>
            </div>
               <div class="card-body">
                  <div class="row clearfix">
                 
                     <div class="col-lg-12 col-md-12 col-sm-12">
                        <label for="employer_pension_contribution">Employer Pension Contribution</label>
                       <div class="form-group"><input type="text" name="employer_pension_contribution" value="<?php echo(!empty($res->employer_pension_contribution) ? $res->employer_pension_contribution : ''); ?>" class="form-control" id="employer_pension_contribution" data-parsley-required-message="Please Enter Employer Pension Contribution" data-parsley-type="number" step="0.01"  min="0" required="" placeholder="Employer Pension Contribution"></div>
                     </div>
                  </div>
               </div>
         </div>
      </div>
            <div class="row clearfix">
         <div class="card">
            <div class="card-header">
               <h3 class="card-title">Admin Charges For Employer(%)</h3>
            </div>
               <div class="card-body">
                  <div class="row clearfix">
                     <div class="col-lg-6 col-md-12 col-sm-12">
                        <label for="pf_admin_charges">PF Admin Charges *</label>
                        <div class="form-group"><input type="text" name="pf_admin_charges" value="<?php echo(!empty($res->pf_admin_charges) ? $res->pf_admin_charges : ''); ?>" class="form-control" id="pf_admin_charges" data-parsley-required-message="Please enter PF Admin Charges" data-parsley-type="number" step="0.01"  min="0" required="" placeholder="PF Admin Charges"></div>
                     </div>
                     <div class="col-lg-6 col-md-12 col-sm-12">
                        <label for="EDLI_charges">EDLI Charges *</label>
                        <div class="form-group"><input type="text" name="EDLI_charges" value="<?php echo(!empty($res->EDLI_charges) ? $res->EDLI_charges : ''); ?>" class="form-control" id="EDLI_charges" data-parsley-required-message="Please Enter EDLI Charges" data-parsley-type="number" step="0.01"  min="0" required="" placeholder="EDLI Charges"></div>
                     </div>
                  </div>
               </div>

         </div>
      </div>
      <div class="row clearfix">
         <div class="card">
            <div class="card-header">
               <h3 class="card-title">ESIC(%)</h3>
            </div>
               <div class="card-body">
                  <div class="row clearfix">
                     <div class="col-lg-6 col-md-6 col-sm-6">
                        <label for="esic_employee_charges">ESIC Employee Charges</label>
                           <div class="form-group">
                              <input type="text" name="esic_employee_charges" value="<?php echo(!empty($res->esic_employee_charges) ? $res->esic_employee_charges : ''); ?>" class="form-control" id="esic_employee_charges" data-parsley-required-message="Please Enter Employee ESIC Charges" data-parsley-type="number" step="0.01"  min="0" required="" placeholder="Please Enter Employee ESIC Charges">
                           </div>
                     </div>
                     <div class="col-lg-6 col-md-6 col-sm-6">
                        <label for="esic_employer_charges">ESIC Employer Charges</label>
                           <div class="form-group">
                              <input type="text" name="esic_employer_charges" value="<?php echo(!empty($res->esic_employer_charges) ? $res->esic_employer_charges : ''); ?>" class="form-control" id="esic_employer_charges" data-parsley-required-message="Please Enter Employer ESIC Charges" data-parsley-type="number" step="0.01"  min="0" required="" placeholder="Please Enter Employer ESIC Charges">
                           </div>
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