<div class="section-body">
   <div class="container-fluid">
      <div class="d-flex justify-content-between align-items-center">
         <ul class="nav nav-tabs page-header-tab">
            <!-- <li class="nav-item"><a class="nav-link active" id="Departments-tab" data-toggle="tab" href="#Departments-list">List View</a></li> -->
           <!--  <li class="nav-item"><a class="nav-link" id="Departments-tab" data-toggle="tab" href="#Departments-grid">Grid View</a></li> -->
         </ul>
         <div class="header-action">
           <a class="btn btn-primary" href="<?php echo base_url(); ?>employer/emp-management/leave_type/add"><i class="fe fe-plus mr-2"></i>Add leave Type</a>
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
                  <h3 class="card-title"><?php echo $page_heading; ?></h3>
                  
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
                              <th>Name</th>
                              <th>Leave amount</th>
                              <th><?php echo $this->lang->line('tb_create_on'); ?></th>
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

<script type="text/javascript">
 
  var postListingUrl =  BASEURL+"emp-management/leave_type/leaveTypeAjaxList";
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
     

<style>
.dataTables_wrapper .dataTables_paginate .paginate_button.current, .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
    color: #fff !important;
    background:  #133b80 !important;
}
</style>
