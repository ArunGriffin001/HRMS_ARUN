<div class="section-body mt-3">
    <?php
    $currDate = date('Y-m-d');
    $report_file_name = 'manual-log-report-list'.$currDate;
    /*$sender = 'mukeshv.syscraft@gmail.com';
    $recipient = 'mukesh.varma@syscraftonline.com';

    $subject = "php mail test";
    $message = "php test message";
    $headers = 'From:' . $sender;

    if (mail($recipient, $subject, $message, $headers))
    {
        echo "Message accepted";
    }
    else
    {
        echo "Error: Message not accepted";
    }*/
    ?>

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
                    $this->login_data = $this->session->userdata('EmployerLoginDetails');
                   /* echo'employer id = '.$this->login_data['userId'];
                    echo'<pre>';
                    print_r($this->login_data);
                    echo'</pre>';*/
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
$(document).ready(function() {
  var download_file_name = "<?php echo $report_file_name; ?>";
  $('#leave_type_list').DataTable({
    
    "bPaginate": true,
    "pageLength": 50,
    "bLengthChange": true,
    "bFilter": true,
    "bSort": true,
    "bInfo": true,
    "lengthMenu": [50,100,200,500],
    "scrollX": true,
    "scrollY": "600px",
    "scrollCollapse": true,
    "fixedHeader": true,
    "bAutoWidth": false,
    "processing": true,
    "serverSide": false,
    "stateSave": false,
    /*"order": [[2,"asc"]],*/
     "columnDefs": [ { "targets": [0,1,-1,-2], "bSortable": false } ],
     dom: 'lBfrtip',
    buttons: [
              {
               extend: 'excelHtml5',
               filename: download_file_name
              },
              {
                  extend: 'csv',
                  filename: download_file_name
              },
              { 
                 extend: 'pdfHtml5',orientation: 'landscape',pageSize: 'LEGAL',filename: download_file_name
              }
    ],
    
      });
       
   } );
</script>
<script type="text/javascript">
  
  $(document).ready(function(){
        var urls = BASEURL+"hrms/users/headManaulLogApprove";
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

 #leave_type_list thead {
   visibility: collapse;
}

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
<!-- export button  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.7.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.2/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables-buttons/2.0.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.bootstrap.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.js"></script>