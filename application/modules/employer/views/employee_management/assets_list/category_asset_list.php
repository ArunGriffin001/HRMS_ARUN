<div class="section-body">
   <div class="container-fluid">
      <div class="d-flex justify-content-between align-items-center">
         <ul class="nav nav-tabs page-header-tab">
            <!-- <li class="nav-item"><a class="nav-link active" id="Departments-tab" data-toggle="tab" href="#Departments-list">List View</a></li> -->
           <!--  <li class="nav-item"><a class="nav-link" id="Departments-tab" data-toggle="tab" href="#Departments-grid">Grid View</a></li> -->
         </ul>
         <div class="header-action">
           <!--  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fe fe-plus mr-2"></i><?php echo $this->lang->line('btn_add_project'); ?></button> -->
            <a class="btn btn-primary" href="<?php echo base_url('employer/emp-management/assets/add'); ?>"><i class="fe fe-plus mr-2"></i>Add </a>
         </div>
      </div>

      <div class="section-body mt-3">
         <div class="container-fluid">
            <div class="tab-content mt-3">
               <div class="tab-pane fade show active" id="Departments-list" role="tabpanel">
                  <div class="card">
                     <div class="card-header">
                        <h3 class="card-title"><?php echo (!empty($cat_info) ? $cat_info->asset_cat_name : 'Assets'); ?></h3>
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
                           <table class="table table-striped table-vcenter table-hover mb-0" id="asset_cat_list">
                              <thead>
                                 <tr>
                                    <th><?php echo $this->lang->line('sr_no'); ?></th>
                                    <th>Name</th>
                                    <th><?php echo $this->lang->line('tb_added_on'); ?></th>
                                    <th>Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                 if(!empty($res)){
                                    $i=1;
                                    foreach ($res as $cat_val) {
                                    ?>
                                       <tr>
                                          <td><?php echo $i; ?></td>
                                          <td><?php echo $cat_val->asset_cat_name; ?></td>
                                          <td><?php echo dateTime($cat_val->created_at); ?></td>
                                          <td><a href="<?php echo base_url('employer/emp-management/asset/category/asset_list/').encode($cat_val->asset_cat_id);?>" title="project teams" class="btn btn-icon waves-effect waves-light fa-new-grey m-b-5"><i class="fa fa-list"></i></a></td>
                                       </tr>
                                    <?php
                                    $i++;
                                    }
                                 }
                                 ?>
                                 
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
            
            </div>
         </div>
      </div>

   </div>
</div>

<script type="text/javascript">
 
  //var postListingUrl =  BASEURL+"emp-management/project/projecttAjaxList";
  $('#asset_cat_list').dataTable({
    "bPaginate": false,
    "bLengthChange": false,
    "bFilter": false,
    "bSort": false,
    "bInfo": false,
    "bAutoWidth": false,
    "processing": false,
    "serverSide": false,
    "stateSave": false,
   });
</script>

       
<style>
   .card-icon{
font-size: 50px;
   }
</style>