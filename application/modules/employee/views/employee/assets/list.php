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
                     <table class="table table-striped table-vcenter table-hover mb-0" id="asset_list">
                        <thead>
                           <tr>
                              <th><?php echo $this->lang->line('sr_no'); ?></th>
                              <th>Employee Name</th>
                              <th>Type</th>
                              <th>Dept.</th>
                              <th><?php echo $this->lang->line('tb_status'); ?></th>
                              <th><?php echo $this->lang->line('tb_action'); ?></th>
                           </tr>
                        </thead>
                        <?php
                        if(!empty($asset_assign_list)){
                           $sno = 1;
                           $table = 'hs_employer_asset_assign_list';
                             $field = 'status';
                             $field_name = 'id';
                             $urls  =  base_url('employer/asset/updateTypeStatus');

                           foreach ($asset_assign_list as $asset_val) {
                           ?>
                           <tr> 
                              <td><?php echo $sno; ?></td>
                              <td><?php echo (!empty($asset_val->full_name) ? $asset_val->full_name : ''); ?></td>
                              <td><?php echo (!empty($asset_val->type_name) ? $asset_val->type_name : ''); ?></td>
                              <td><?php echo (!empty($asset_val->dept_name) ? $asset_val->dept_name : ''); ?></td>
                              <td><?php echo $asset_val->status; ?></td>
                              <td>
                                 <?php
                                 $assetID = "'".encode($asset_val->id)."'";
                                 $actionLink = '<a href="javascript:void(0)" title="view" class="btn btn-icon waves-effect waves-light fa-new-grey m-b-5" data-toggle="modal" data-target="#view_asset_record" onclick="view_asset_record('.$assetID.')"><i class="fa fa-eye"></i></a>';
                                    echo $actionLink;
                                 ?>
                              </td>
                           </tr>
                           <?php
                           $sno++;
                           }
                           
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

<div class="modal fade" id="view_asset_record" tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
               <h4 class="modal-title text-center" id="myModalLabel">
                    View Details
                </h4>
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
            </div>
            <!-- Modal Body -->
            <div class="modal-body" id="view_users_div">
                <!-- innserhtml -->
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
 
 // var postListingUrl =  BASEURL+"designation/designation_list";
  $('#asset_list').dataTable({
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
     "columnDefs": [ { "targets": [0,-1], "bSortable": false } ],
      });

      function view_asset_record(tracking_id){
        var xmlhttp;
        if (window.XMLHttpRequest)
        {
            xmlhttp=new XMLHttpRequest();
        }
        else
        {
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("view_users_div").innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","<?php echo base_url('employee/asset/show');?>/"+tracking_id,true);
        xmlhttp.send();
    }

</script>
     

<style type="text/css">

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