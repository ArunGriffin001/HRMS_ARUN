<div class="header_btn">
   <div class="header-action">
      <a href="<?php echo base_url('employer/hrms/department'); ?>" class="btn btn-primary float-right"><i class="fa fa-plus mr-2"></i>Back</a>
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
      <form method="post" action="<?php echo base_url('employer/department/update_department_head/').encode($dept_info->dep_id); ?>" data-parsley-validate="">
         <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title" id="exampleModalLabel"><?php echo (!empty($page_sub_heading) ? $page_sub_heading : ''); ?></h5>
           </div>
           <div class="modal-body">
               <div class="row clearfix">
                  <div class="col-md-6 col-sm-6">
                     <div class="form-group">
                      <lable>Department Name</lable>
                      <input type="text"  value="<?php echo(!empty($dept_info->dept_name) ? $dept_info->dept_name : '' ); ?>" class="form-control" readonly >
                     </div>
                  </div>

                  <div class="col-md-6 col-sm-6">
                     <div class="form-group">
                      <lable>Employee List</lable>
                      <select class="form-control employee_id" name="employee_id" id="employee_id" data-parsley-required-message="Please select department head" required="">
                           <option value=""> Select department head</option>
                           <?php
                           if(!empty($emp_list)){
                              foreach ($emp_list as $emp_val) {
                              ?>
                              <option value="<?php echo encode($emp_val->employee_id); ?>" emp_name="<?php echo $emp_val->full_name; ?>" <?php echo ( !empty($current_assign_dept) && $emp_val->employee_id == $current_assign_dept->employee_id ? 'selected' : ''); ?> ><?php echo $emp_val->full_name; ?></option>
                              <?php
                              }
                           }
                           ?>
                        </select>
                     </div>
                  </div>
                  
              
               </div>
            </div>
            <div class="modal-footer">
               <button type="submit" class="btn btn-primary">Update</button>
            </div>
         </div>
      </form>
   </div>
 </div>