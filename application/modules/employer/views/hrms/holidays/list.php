<div class="section-body">
   <div class="container-fluid">
      <div class="d-flex justify-content-between align-items-center">
         <ul class="nav nav-tabs page-header-tab">
            <!-- <li class="nav-item"><a class="nav-link active" id="Departments-tab" data-toggle="tab" href="#Departments-list">List View</a></li> -->
           <!--  <li class="nav-item"><a class="nav-link" id="Departments-tab" data-toggle="tab" href="#Departments-grid">Grid View</a></li> -->
         </ul>
         <div class="header-action">
            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus mr-2"></i>Add Holiday</button>
            <a href="<?php echo base_url('employer/hrms/holiday'); ?>" class="btn btn-primary float-left"><i class="fa fa-plus mr-2"></i>Show Holiday</a>
         </div>
      </div>
   </div>
</div>
<div class="section-body mt-3">
   <div class="container-fluid">
      <div class="tab-content mt-3">
         <div class="tab-pane fade show active" id="Departments-list" role="tabpanel">
            <div class="card">
               <div class="card-header">
                  <h3 class="card-title"><?php echo (!empty($page_sub_heading) ? $page_sub_heading : ''); ?></h3>
                  
               </div>
               <div class="card-body">
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
                  <div class="table-responsive">
                     <table class="table table-striped table-vcenter table-hover mb-0" id="department_list">
                        <thead>
                           <tr>
                              <th><?php echo $this->lang->line('sr_no'); ?></th>
                              <th><?php echo $this->lang->line('tb_day'); ?></th>
                              <th><?php echo $this->lang->line('tb_holiday_date'); ?></th>
                              <th><?php echo $this->lang->line('tb_holiday'); ?></th>
                              <th><?php echo $this->lang->line('tb_added_on'); ?></th>
                              <th><?php echo $this->lang->line('tb_status'); ?></th>
                              <th><?php echo $this->lang->line('tb_action'); ?></th>
                           </tr>
                        </thead>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>        
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form method="post" action="<?php echo base_url('employer/hrms/holiday/add'); ?>" data-parsley-validate="">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Holiday</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="cross-icon" aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body">
            <div class="row clearfix">
               <div class="col-md-6 col-sm-6">
                  <div class="form-group">
                     <select class="form-control custom-select" name="day_name" required="">
                        <option value="">Select Day</option>
                        <option value="monday">Monday</option>
                        <option value="tuesday">Tuesday</option>
                        <option value="wednesday">Wednesday</option>
                        <option value="thursday">Thursday</option>
                        <option value="friday">Friday</option>
                        <option value="saturday">Saturday</option>
                        <option value="sunday">Sunday</option>
                     </select>
                  </div>
               </div>
               <div class="col-md-6 col-sm-6">
                  <div class="form-group">
                     <input type="text" name="holiday_details" value="" class="form-control" placeholder="Description" required="">
                  </div>
               </div>
               <div class="col-md-6 col-sm-6">
                  <div class="form-group">
                     <input type="date" name="holiday_date" value="" data-provide="datepicker" data-date-autoclose="true" class="form-control" placeholder="Date" required="">
                  </div>
               </div>
           
            </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add Holiday</button>
         </div>
      </div>
    </form>
  </div>
</div>
     

<script type="text/javascript">
 
  var postListingUrl =  BASEURL+"hrms/holiday/holidayAjaxList";
  $('#department_list').dataTable({
    "bPaginate": true,
    "pageLength": 50,
    "bLengthChange": true,
    "bFilter": true,
    "bSort": true,
    "bInfo": true,
    "bAutoWidth": false,
    "processing": true,
    "serverSide": true,
    "stateSave": false,
    "ajax": postListingUrl,
    /*"order": [[2,"asc"]],*/
    "columnDefs": [ { "targets": 0, "bSortable": true,"orderable": true, "visible": true } ],
          'aoColumnDefs': [{'bSortable': false,'aTargets': [0,-1, 3]}],
      });
</script>
     