<div class="header_btn">
   <div class="header-action">
      <a href="<?php echo base_url('employer/hrms/users'); ?>" class="btn btn-primary float-right"><i class="fa fa-plus mr-2"></i>Back</a>
   </div>
</div>
<?php
$currDate = date('Y-m-d');
$report_file_name = 'employee-manual-log-report-list-'.$currDate;
?>
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
                          <th>Approved status</th>
                          <th>Approved by</th>
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
                                <?php 
                                $cname = ($val->status == "Approved") ? "#007bff" : (($val->status == "Pending")  ? "#ff9b44" : "#dc3545");
                                 ?>
                                <td><b style="color: <?php echo $cname; ?>"><?php echo $val->status; ?></b></td>
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

<script type="text/javascript">
$(document).ready(function() {
  var download_file_name = "<?php echo $report_file_name; ?>";
  $('#leave_type_list').dataTable({
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
    "bAutoWidth": false,
    "processing": true,
    "serverSide": false,
    "stateSave": false,
    /*"order": [[2,"asc"]],*/
      "columnDefs": [ { "targets": [0,1,-1], "bSortable": false } ],
    
      });

  } );
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