<div class="section-body">
   <div class="container-fluid">
      <div class="d-flex justify-content-between align-items-center">
         <ul class="nav nav-tabs page-header-tab">
            <!-- <li class="nav-item"><a class="nav-link active" id="Departments-tab" data-toggle="tab" href="#Departments-list">List View</a></li> -->
           <!--  <li class="nav-item"><a class="nav-link" id="Departments-tab" data-toggle="tab" href="#Departments-grid">Grid View</a></li> -->
         </ul>
         <div class="header-action">
             <a href="<?php echo base_url('employer/hrms/events/add'); ?>" class="btn btn-primary float-right"><i class="fa fa-plus mr-2"></i>Add Events</a>
            <a href="<?php echo base_url('employer/hrms/events'); ?>" class="btn btn-primary float-left"><i class="fa fa-plus mr-2"></i>Show Events</a>
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
                    <table class="table table-striped table-vcenter table-hover mb-0" id="event_list">
                      <thead>
                        <tr>
                          <th><?php echo $this->lang->line('sr_no'); ?></th>
                          <th><?php echo $this->lang->line('tb_event_name'); ?></th>
                          <th><?php echo $this->lang->line('tb_start_date'); ?></th>
                          <th><?php echo $this->lang->line('tb_end_date'); ?></th>
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
 
  var postListingUrl =  BASEURL+"hrms/event_list";
  $('#event_list').dataTable({
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
     