<div class="section-body">
   <div class="container-fluid">
      <div class="d-flex justify-content-between align-items-center">
         <ul class="nav nav-tabs page-header-tab">
         </ul>
         <div class="header-action">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fe fe-plus mr-2"></i>Add asset type</button>
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
                     <table class="table table-striped table-vcenter table-hover mb-0" id="asset_type_list">
                        <thead>
                           <tr>
                              <th><?php echo $this->lang->line('sr_no'); ?></th>
                              <th>Name</th>
                              <th><?php echo $this->lang->line('tb_status'); ?></th>
                              <th><?php echo $this->lang->line('tb_action'); ?></th>
                           </tr>
                        </thead>
                        <?php
                        if(!empty($asset_type)){
                           $sno = 1;
                           $table = 'hs_assets_type';
                             $field = 'status';
                             $field_name = 'id';
                             $urls  =  base_url('employer/asset/updateTypeStatus');

                           foreach ($asset_type as $asset_val) {
                           ?>
                           <tr> 
                              <td><?php echo $sno; ?></td>
                              <td><?php echo (!empty($asset_val->type_name) ? $asset_val->type_name : ''); ?></td>
                              <td>
                                 <?php
                                 $actionStatus = '';
                                 if($asset_val->status == "Deactive"){
                                    $status = 'Active';
                                    $actionStatus ='<a class="btn btn-danger waves-effect" style="width: 50% !important;" href="javascript:void(0);" onclick="changestatus('.$asset_val->id.', \''.$status.'\', \''.$urls.'\' , \''.$table.'\', \''.$field.'\', \''.$field_name.'\');" title="Active">Deactive</a>';
                                    echo $actionStatus;
                                 }else{
                                    $status = 'Deactive';
                                    $actionStatus ='<a class="btn btn-primary waves-effect" style="width: 50% !important;" href="javascript:void(0);" onclick="changestatus('.$asset_val->id.', \''.$status.'\', \''.$urls.'\' , \''.$table.'\', \''.$field.'\', \''.$field_name.'\');" title="Active">Active</a>';
                                    echo $actionStatus;
                                 }
                                 ?>
                              </td>
                              <td>
                                 <?php
                                 $edit_slider_url = base_url('employer/asset/type/edit/').encode($asset_val->id);
                                  $actionLink = '<a href="'.$edit_slider_url.'" title="Edit" class="btn btn-icon waves-effect waves-light fa-new-grey m-b-5"><i class="fa fa-edit"></i></a>';
                                  echo $actionLink;
                                 ?>
                              </td>
                           </tr>
                           <?php
                           }
                           $sno++;
                        }
                        ?>
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
      <div class="modal-content">
         <form method="post" action="<?php echo base_url('employer/asset/add_asset_type'); ?>" data-parsley-validate="">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Add Asset type</h5>
            </div>
            <div class="modal-body">
               <div class="row clearfix">
                  <div class="col-md-12">
                     <div class="form-group">
                        <input type="text" class="form-control" name="type_name" placeholder="Type Name" data-parsley-required-message="Please enter type" required="">
                        
                     </div>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <button type="submit" name="save" class="btn btn-primary">Save</button>
            </div>
         </form>

      </div>
   </div>
</div>

<script type="text/javascript">
 
 // var postListingUrl =  BASEURL+"designation/designation_list";
  $('#asset_type_list').dataTable({
    "bPaginate": true,
    "pageLength": 50,
    "bLengthChange": true,
    "bFilter": true,
    "bSort": true,
    "bInfo": true,
    "bAutoWidth": false,
    "processing": false,
    "serverSide": false,
    "stateSave": false,
   
    /*"order": [[2,"asc"]],*/
     "columnDefs": [ { "targets": [0,1,-1], "bSortable": false } ],
      });


</script>
     

<<style type="text/css">

 /* #asset_type_list tbody td:nth-child(2){
       display: block;
    width: 100px;
    border:0;
  }*/

  thead th {
    border-bottom: 4px solid #D3E6F5;
    padding-bottom: 20px;
}

  .table td {
    padding: .75rem;
    vertical-align: top;
    border-bottom: 1px solid #dee2e6 !important;
    border-top:0 !important
}

 /*#asset_type_list thead {
   visibility: collapse;
}*/

.dataTables_wrapper .dataTables_info {
   line-height:60px
}

.dataTables_wrapper .dataTables_paginate {
    padding-top: 1.25em;
}

.dataTables_wrapper .dataTables_paginate .paginate_button.current, .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
    color: #fff !important;
    background:  #133b80 !important;
}

.dataTables_wrapper .dataTables_paginate .paginate_button:active {
    background-color: #ffc557 !important;
}

</style>