<div class="header_btn">
   <div class="header-action">
      <a href="<?php echo base_url('employer/hrms/holiday/list'); ?>" class="btn btn-primary float-right"><i class="fa fa-plus mr-2"></i>Back</a>
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
      <form method="post" action="<?php echo base_url('employer/hrms/holiday/updateHoliday/').encode($record->id); ?>" data-parsley-validate="">
         <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title" id="exampleModalLabel"><?php echo (!empty($page_sub_heading) ? $page_sub_heading : ''); ?></h5>
           </div>
           <div class="modal-body">
               <div class="row clearfix">
                  <div class="col-md-6 col-sm-6">
                     <div class="form-group">
                        <select class="form-control custom-select" name="day_name" required="">
                           <option value="">Select Day</option>
                           <option value="monday" <?php echo($record->day_name == 'monday' ? 'selected' : ''); ?> >Monday</option>
                           <option value="tuesday" <?php echo($record->day_name == 'tuesday' ? 'selected' : ''); ?> >Tuesday</option>
                           <option value="wednesday" <?php echo($record->day_name == 'wednesday' ? 'selected' : ''); ?> >Wednesday</option>
                           <option value="thursday" <?php echo($record->day_name == 'thursday' ? 'selected' : ''); ?> >Thursday</option>
                           <option value="friday" <?php echo($record->day_name == 'friday' ? 'selected' : ''); ?> >Friday</option>
                           <option value="saturday" <?php echo($record->day_name == 'saturday' ? 'selected' : ''); ?> >Saturday</option>
                           <option value="sunday" <?php echo($record->day_name == 'sunday' ? 'selected' : ''); ?>>Sunday</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6 col-sm-6">
                     <div class="form-group">
                        <input type="text" name="holiday_details" value="<?php echo $record->holiday_details; ?>" class="form-control" placeholder="Description" required="">
                     </div>
                  </div>
                  <div class="col-md-6 col-sm-6">
                     <div class="form-group">
                        <input type="date" name="holiday_date" value="<?php echo date('Y-m-d', strtotime($record->holiday_date)); ?>" data-provide="datepicker" data-date-autoclose="true" class="form-control" placeholder="Date" required="">
                     </div>
                  </div>
              
               </div>
            </div>
            <div class="modal-footer">
               <button type="submit" class="btn btn-primary">Update Holiday</button>
            </div>
         </div>
      </form>
   </div>
 </div>    