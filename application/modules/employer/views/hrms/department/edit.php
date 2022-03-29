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
      <form method="post" action="<?php echo base_url('employer/department/updateDepartment/').encode($record->dep_id); ?>" data-parsley-validate="">
         <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title" id="exampleModalLabel"><?php echo (!empty($page_sub_heading) ? $page_sub_heading : ''); ?></h5>
           </div>
           <div class="modal-body">
               <div class="row clearfix">
                  <div class="col-md-6 col-sm-6">
                     <div class="form-group">
                      <lable>Department Name</lable>
                      <input type="text" name="dept_name" value="<?php echo(!empty($record->dept_name) ? $record->dept_name : '' ); ?>" class="form-control" placeholder="Department Name" data-parsley-required-message="Please enter the department name" required="">
                     </div>
                  </div>
                  
                  <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                      <lable>No of Employee</lable>
                      <input type="text" name="no_of_employee" value="<?php echo(!empty($record->no_of_employee) ? $record->no_of_employee : '' ); ?>" class="form-control" placeholder="No of Employee" required="" data-parsley-type="number" min="1" data-parsley-required-message="Please enter the total number of employee" >
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
 <script type="text/javascript">
     $(".dept_head_id").on("change", function(){
      let emp_name = $('select[name=dept_head_id] option:selected').attr('emp_name');
      $('.dept_head_name').val(emp_name);
      
   });
 </script>  