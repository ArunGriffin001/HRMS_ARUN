
<link rel="stylesheet" type="text/css" href="<?php echo base_url('template/'); ?>employer/assets/css/jquery-datetimepicker.css">

<div class="header_btn">
   <div class="header-action">
      <a href="<?php echo base_url('employee/employee/attendence'); ?>" class="btn btn-primary float-right"><i class="fa fa-plus mr-2"></i>Back</a>
   </div>
</div>
<?php
$startDate = '';
$endDate = '';
if(!empty($punch_info)){
   $startDate = (!empty($punch_info->punch_in_time) ? date('Y-m-d', strtotime($punch_info->punch_in_time)) : '');
   $endDate = (!empty($punch_info->punch_in_time) ? date('Y-m-d', strtotime($punch_info->punch_in_time)) : '');
   $punch_id = (!empty($punch_info->punching_id) ? $punch_info->punching_id : '');
}
/*echo 'Start date = '.$startDate;
echo '<br>End date = '.$endDate;*/
?>
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
    <div class="col-md-12 col-sm-12">
      <h3 for="">Manaul Log</h3>
    </div>
      <form method="post" action="<?php echo base_url('employee/employee/addregularization'); ?>" data-parsley-validate="">
         <div class="card-body">
            <?php 
            $this->login_data = $this->session->userdata('EmployeeLogin');
            $this->employee_id = $this->login_data['userId'];
            /*echo'<pre>';
            print_r($punch_info);*/
            $head_info = getDapartmentHead($this->employee_id);
            // echo'</pre>';
            //die;
            $supervisor_id = (!empty($head_info->employee_id) ? $head_info->employee_id : '');
            ?>
            <div class="row clearfix">
                         
                <input type="hidden" name="supervisor_id" value="<?php echo encode($supervisor_id); ?>">
               <?php
               if(!empty($punch_info) && !empty($startDate) && !empty($endDate )){
               ?>
                  <input type="hidden" name="punch_id" value="<?php echo encode($punch_id); ?>">
                  <div class="col-md-6 col-sm-6">
                     <label for="from_date">From date</label>
                     <div class="form-group">
                        <input type="text" name="from_date" value="<?php echo $startDate; ?>" class="form-control"  data-parsley-required-message="Please enter from date" readonly placeholder="From date" required>
                     </div>
                  </div>
                  <div class="col-md-6 col-sm-6">
                     <label for="to_date">To Date</label>
                     <div class="form-group">
                        <input type="text" name="to_date" value="<?php echo $endDate; ?>" class="form-control"  data-parsley-required-message="Please enter to date" readonly placeholder="To date" required>
                     </div>
                  </div>
               <?php
               }else{
               ?>
               <div class="col-md-12 col-sm-12">
                  <label for="">Select same date in from date and to date</label>
               </div>
                  <div class="col-md-6 col-sm-6">
                     <label for="from_date">From date</label>
                     <div class="form-group"><input type="text" name="from_date" value="" class="form-control" id="from_date"  data-parsley-required-message="Please enter from date" readonly placeholder="From date" required></div>
                  </div>
                  <div class="col-md-6 col-sm-6">
                     <label for="to_date">To Date</label>
                     <div class="form-group"><input type="text" name="to_date" value="" class="form-control" id="to_date"  data-parsley-required-message="Please enter to date" readonly placeholder="To date" required></div>
                  </div>
               <?php
               }
               ?>
               <div class="col-md-6 col-sm-6">
                  <label for="message">Remarks</label>
                  <select class="form-control" id="" name="remark" data-parsley-required-message="Please select remark" required="">
                     <option value="">Select remark</option>
                     <?php
                     if(!empty($remark)){
                        foreach ($remark as $remark_val) {
                           ?>
                           <option value="<?php echo $remark_val; ?>"><?php echo $remark_val; ?></option>
                           <?php
                        }
                     } 
                     ?>
                  </select>
               </div>
               <div class="col-md-6 col-sm-6">
                  <label for="message">Reason</label>
                  <div class="form-group">
                     <textarea name="message" value="" class="form-control" id=""  data-parsley-required-message="Please enter to reason " placeholder="Reason" required></textarea>
                  </div>
               </div>
              
               <br/>
               <?php
               if(!empty($supervisor_id)){
               ?>
               <div class="col-12 mt-4">
                  <button type="submit" class="btn btn-primary">Submit</button>
               </div>
               <?php
               }else{
               ?>
               <div class="col-12 mt-4">
                  Sorry you don't assign a manager so please contact your admin.
               </div>
               <?php
               }

               ?>
              
            </div>
         </div>
      </form>
   </div>
 </div>
 <script type="text/javascript" src="<?php echo base_url('template/'); ?>employer/assets/js/jquery.datetimepicker.js"></script>
<script type="text/javascript">
   
   $('#from_date').datetimepicker({
      format: 'Y-m-d h:i a',
      timepicker:true,
      maxDate: "-0m",
      formatTime:"h:i a",
      step: 30
   });

   $('#to_date').datetimepicker({
      
      format: 'Y-m-d h:i a',
      timepicker:true,
      formatTime:"h:i a",
      maxDate: "-0m",
      step: 30
   });


</script>

