<div class="section-body">
   <div class="container-fluid">
      <div class="d-flex justify-content-between align-items-center">
         <ul class="nav nav-tabs page-header-tab">
            <!-- <li class="nav-item"><a class="nav-link active" id="Departments-tab" data-toggle="tab" href="#Departments-list">List View</a></li> -->
           <!--  <li class="nav-item"><a class="nav-link" id="Departments-tab" data-toggle="tab" href="#Departments-grid">Grid View</a></li> -->
         </ul>
         <div class="header-action text-right">
            <a class="btn btn-primary" href="<?php echo base_url('employer/emp-management/project'); ?>"><i class="fe fe-plus mr-2"></i>Add Task </a>
         </div>
      </div>
   </div>
</div>
<div class="section-body mt-3 attendance-search">
  <form method="post" action="<?php echo base_url('employee/project'); ?>" data-parsley-validate="">
      <div class="card">
         <div class="card-body">
            <div class="row">
               <div class="col-md-4 col-sm-4">
                  <label for="department"> Project</label>
                  <select class="form-control" name="projectId" id="projectId"  data-parsley-required-message="Please select department" required="">
                     <option value="">Select Project</option>
                       <?php
                       if(!empty($project_list)){
                          foreach ($project_list as $project_val) {
                             ?>
                             <option value="<?php echo encode($project_val->project_id); ?>" <?php echo ($project_val->project_id == $slected_project_id ? 'selected' : ''); ?> ><?php echo $project_val->project_name; ?></option>
                             <?php
                          }
                       }
                       ?>
                  </select>
               </div>
               <div class="col-md-4 col-sm-4 mt-2">
                  <label></label>
                  <button type="submit" class="btn btn-sm btn-primary btn-block form-control  mt-2">Search</button>
               </div>
            </div>
         </div>
      </div>
   </form>
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
                     <table class="table table-striped table-vcenter table-hover mb-0" id="project_list">
                        <thead>
                           <tr>
                              <th><?php echo $this->lang->line('sr_no'); ?></th>
                              <th><?php echo $this->lang->line('tb_project_name'); ?></th>
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
   var project_id = "<?php echo encode($slected_project_id); ?>";
   alert(project_id)
   var postListingUrl =  BASEURL+"project/projectAjaxList/"+project_id;
   //alert(postListingUrl);
   $('#project_list').dataTable({
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
     