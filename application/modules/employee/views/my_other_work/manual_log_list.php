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
                    <table class="table table-striped table-vcenter table-hover mb-0" id="leave_type_list">
                      <thead>
                        <tr>
                          <th><?php echo $this->lang->line('sr_no'); ?></th>
                          <th><?php echo $this->lang->line('tb_employee'); ?></th>
                          <th>From date</th>
                          <th>To date</th>
                          <th>Dept.</th>
                          <th><?php echo $this->lang->line('tb_designation_name'); ?></th>
                          <th>Dept. Head Status</th>
                          <th>Approved By</th>
                          <th>Reason</th>
                        </tr>
                      </thead>
                      <tbody>
                         <?php
                         if(!empty($manual_log_request)){
                            $i = 1;
                            foreach ($manual_log_request as $val){
                              ?>
                              <tr>
                                <td><?php echo $i;?></td>
                                <td><span><?php echo $val->first_name.' '.$val->last_name;?></span></td>
                                <td><span><?php  echo date('Y-m-d h:i A',strtotime($val->from_date)); ?></span></td>
                                <td><span><?php  echo date('Y-m-d h:i A',strtotime($val->to_date)); ?></span></td>
                                <td><span><?php echo $val->dept_name;?></span></td>
                                <td><span><?php echo $val->designation;?></span></td>
                                <td>
                                  <?php
                                  if($val->status == 'Pending' ){
                                  ?>
                                  <select class="btn btn-white btn-sm btn-rounded dropdown-toggle log_status" employee_id="<?php echo $val->employee_id; ?>"  elementID="<?php echo encode($val->id); ?>">
                                      <option value="Pending" <?php echo ($val->status == 'Pending' ? 'selected' : ''); ?> > <i class="fa fa-dot-circle-o text-info"></i> Pending </option>
                                       <option value="Deny" <?php echo ($val->status == 'Deny' ? 'selected' : ''); ?> > <i class="fa fa-dot-circle-o text-success"></i> Deny </option>
                                      <option value="Approved" <?php echo ($val->status == 'Approved' ? 'selected' : ''); ?> > <i class="fa fa-dot-circle-o text-success"></i> Approved </option>
                                      
                                    </select>
                                  <?php

                                  }else{
                                  echo $val->status;
                                }
                                  ?>
                                </td>
                                <?php
                                $userName = (!empty($user_name) && !empty($val->approved_by) && $user_name[$val->approved_by]->employee_id == $val->approved_by ? $user_name[$val->approved_by]->full_name : '');
                                ?>
                                <td><span><?php echo $userName; ?></span></td>
                                 
                                <td><?php echo $val->message; ?></td>
                              </tr>
                               <?php
                               $i++;
                            }
                         }else{
                            echo " <tr><td colspan='9'>Sorry No record found </td></tr>";
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

<div class="modal fade" id="view_leave_record" tabindex="-1" role="dialog" 
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
  
  $('#leave_type_list').dataTable({
    "bPaginate": true,
    "pageLength": 50,
    "bLengthChange": true,
    "bFilter": true,
    "bSort": true,
    "bInfo": true,
    "bAutoWidth": false,
    "processing": true,
    "serverSide": false,
    "stateSave": false,
    /*"order": [[2,"asc"]],*/
     "columnDefs": [ { "targets": [0,1,-1,-2], "bSortable": false } ],
    
      });

  $(document).ready(function(){
        var urls = BASEURL+"manual/headManaulLogApprove";
        $(".log_status").on("change", function(){

            var log_status = $(this).val();
            var employee_id = $(this).attr('employee_id');
            var elementID = $(this).attr('elementID');
            
            swal({
                title: "Are you sure you want to change this?",
                // text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
          .then((willDelete) => {
              if (willDelete) {
                 var formData = {
                      'row_id': elementID,
                      'log_status': log_status,
                      'employee_id' : employee_id
                  };
                  $.ajax({
                      type: 'POST',
                      url: urls,
                      dataType: 'json',
                      async: false,
                      data: formData,
                      success: function(data) {
                          console.log(data)
                          if(data.isSuccess == true){
                              location.reload();   
                          }else if(data.isSuccess == false && data.error == 'error' && data.message != ''){
                            location.reload();
                          }else{
                            swal("Server error, please try again !");
                          }
                      },
                  });
              } 
          });
      });
    });


  function view_leave_record(tracking_id)
    {
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
        xmlhttp.open("GET","<?php echo base_url('employee/mywork/get-view-data');?>/"+tracking_id,true);
        xmlhttp.send();
    }
</script>
     

     <style>
     .btn.btn-sm.btn-primary.btn-block.btn-search{
      padding-top:12px
     }
     .pt-4t{
       padding-top:4px;
     }
     .dataTables_wrapper .dataTables_paginate .paginate_button.current, .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
    color: #ffffff !important;
}
     
     </style>