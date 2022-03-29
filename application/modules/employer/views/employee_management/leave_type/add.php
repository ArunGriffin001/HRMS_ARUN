<div class="header_btn">
   <div class="header-action">
      <a href="<?php echo base_url('employer/emp-management/leave_type/list'); ?>" class="btn btn-primary float-right"><i class="fa fa-plus mr-2"></i>Back</a>
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
      <form method="post" action="<?php echo base_url('employer/emp-management/leave_type/addLeave'); ?>" data-parsley-validate="">
         <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title" id="exampleModalLabel"><?php echo (!empty($page_sub_heading) ? $page_sub_heading : ''); ?></h5>
           </div>
           <div class="modal-body">
               <div class="row clearfix">
                  <div class="col-md-6 col-sm-6">
                     <div class="form-group">
                      <lable>Leave type name</lable>
                      <input type="text" name="leave_type_name" value="<?php echo(!empty($record->leave_type_name) ? $record->leave_type_name : '' ); ?>" class="form-control" placeholder="Leave type name" data-parsley-required-message="Please enter the leave type name" required="">
                     </div>
                  </div>
                  <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                      <lable>Leave amount</lable>
                      <input type="text" name="total_leave" value="<?php echo(!empty($record->total_leave) ? $record->total_leave : '' ); ?>" class="form-control" placeholder="Leave amount" required="" data-parsley-type="number" min="1" data-parsley-required-message="Please enter leave amount" >
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