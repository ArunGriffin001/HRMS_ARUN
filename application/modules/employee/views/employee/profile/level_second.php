<div class="header_btn">
   <div class="header-action">
      <a href="<?php echo base_url('employee/employee/my-profile'); ?>" class="btn btn-primary float-right"></i>Back</a>
   </div>
</div>
<div class="section-body mt-3">
   <div class="card">
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
      <form method="post" action="<?php echo base_url('employee/my-profile/update_level_two'); ?>" data-parsley-validate="" enctype="multipart/form-data">
         <div class="card-body">
            <div class="row clearfix">
               <div class="col-md-4 col-sm-12">
                  <label for="audience_country_list">Country *</label>
                  <div class="form-group">
                     <select class="form-control show-tick" name="country_id" id="get_country_list" required="" data-parsley-required-message="Please select country name">
                        <option value="">Select country</option>
                        <?php
                        if(!empty($country)){
                           foreach ($country as $country_val) {
                           ?>
                           <option value="<?php echo $country_val->id; ?>" <?php echo ($country_val->id == $emp_info->country_id ? 'selected' : ''); ?> ><?php echo $country_val->name; ?></option>
                           <?php
                           }
                        }
                        ?>
                     </select>
                  </div>
               </div>
               <div class="col-md-4 col-sm-12">
                  <div class="form-group">
                     <label for="audience_state_list">State *</label>
                     <select class="form-control" name="state_id" id="get_state_list" required="" data-parsley-required-message="Please select state name">
                        <option value="<?php echo (!empty($state_data) ? $state_data->id : ''); ?>"><?php echo (!empty($state_data) ? $state_data->name : ''); ?></option> 
                     </select>
                  </div>
               </div>
               <div class="col-md-4 col-sm-12">
                  <div class="form-group">
                     <label for="city_list">City *</label>
                     <select class="form-control show-tick" name="city_id" id="city_list" required="" data-parsley-required-message="Please select city name">
                         <option value="<?php echo (!empty($city_data) ? $city_data->id : ''); ?>"><?php echo (!empty($city_data) ? $city_data->name : ''); ?></option> 
                     </select>
                  </div>
               </div>
               <div class="col-md-4 col-sm-12">
                  <label for="UAN_number">UAN number</label>
                  <div class="form-group"><input type="text" class="form-control" name="UAN_number" value="<?php echo (!empty($emp_info->UAN_number) ? $emp_info->UAN_number : ''); ?>" id="UAN_number" placeholder="UAN number"></div>
               </div>
               <div class="col-md-4 col-sm-12">
                  <label for="PF_reg_number">PF number</label>
                  <div class="form-group"><input type="text" class="form-control" name="PF_reg_number" value="<?php echo (!empty($emp_info->PF_reg_number) ? $emp_info->PF_reg_number : ''); ?>" id="PF_reg_number" placeholder="PF Number" ></div>
               </div>
               <div class="col-md-4 col-sm-12">
                  <label for="pran_number">PRAN number</label>
                  <div class="form-group"><input type="text" class="form-control" name="pran_number" value="<?php echo (!empty($emp_info->pran_number) ? $emp_info->pran_number : ''); ?>" id="pran_number" placeholder="PRAN Number"></div>
               </div>

               <div class="col-md-4 col-sm-12">
                  <label for="pan_number">PAN number</label>
                  <div class="form-group"><input type="text" class="form-control" name="pan_number" value="<?php echo (!empty($emp_info->pan_number) ? $emp_info->pan_number : ''); ?>" id="pan_number" placeholder="PAN Number" required></div>
               </div>

               <div class="col-md-4 col-sm-12">
                  <label for="aadhar_number">Aadhar number</label>
                  <div class="form-group"><input type="text" class="form-control" name="aadhar_number" value="<?php echo (!empty($emp_info->aadhar_number) ? $emp_info->aadhar_number : ''); ?>" id="aadhar_number" placeholder="Aadhar Number" required></div>
               </div>

               <div class="col-md-4 col-sm-12">
                  <label for="aadhar_number">Bank Account number</label>
                  <div class="form-group"><input type="text" class="form-control"  value="<?php echo (!empty($emp_info->bank_account_number) ? $emp_info->bank_account_number : ''); ?>" id="bank_account_number" placeholder="Bank Number" readonly></div>
               </div>

               <div class="col-12">
                  <button type="submit" class="btn btn-primary">Update</button>
               </div>
            </div>
         </div>
      </form>
   </div>
 </div>

 <script type="text/javascript">
   $(document).ready(function(){
         $("#get_country_list").on("change", function(){
            $.ajax({
                url: "<?php echo base_url('employer/get_state'); ?>",
                type: "POST",
                data: {
                    cntry:  $(this).val(),
                },
                dataType: "text",
                success: function (jsonStr) 
                {
                  //alert(jsonStr)
                    $("#get_state_list").html(jsonStr);
                }
            });  
      });

     $("#get_state_list").on("change", function(){

         $.ajax({
             url: "<?php echo base_url('employer/get_city'); ?>",
             type: "POST",
             data: {
                 state:  $(this).val(),
             },
             dataType: "text",
             success: function (jsonStr) 
             {
                 $("#city_list").html(jsonStr);
             }
         }); 
     });

   });
</script>  