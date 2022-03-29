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
                      <label>Name</label>
                      <input type="text" name="leave_type_name" value="" class="form-control" placeholder="Name" required="" autocomplete="off">
                    </div>
                  </div>
                </div>
                <div class="row clearfix">
                  <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                      <label>Total Leave</label>
                      <input type="text" name="total_leave" value="" class="form-control" placeholder="Total Leave" required="" autocomplete="off" data-parsley-type="number">
                    </div>
                  </div>
               </div>
            </div>
            <div class="modal-footer text-left">
               <button type="submit" class="btn btn-primary">Submit</button>
            </div>
         </div>
      </form>
   </div>
 </div>


