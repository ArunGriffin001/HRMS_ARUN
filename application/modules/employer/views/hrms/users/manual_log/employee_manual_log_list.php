<div class="section-body mt-3">
  <div class="container-fluid">
    <div class="header_btn11">
      <div class="row">
        <div class="col-md-6">
          <label>Employee Name: </label>  <span class="text-capitalize"><?php echo(!empty($employee_info->full_name) ? $employee_info->full_name : '');  ?></span>
          
        </div>
        <div class="col-md-6">
          <div class="header-action">
            <a href="<?php echo base_url('employer/hrms/users'); ?>" class="btn btn-primary float-right"><i class="fa fa-plus mr-2"></i>Back</a>
          </div>
        </div>
      </div>
     
    </div>
  </div>
</div>
<?php
$currDate = date('Y-m-d');
$report_file_name = 'employee-time-sheet-report-list-'.$currDate;
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
                    <table class="table table-striped custom-table mb-0 punch_log " id="employee_manual_log_list">
                        <thead>
                            <tr>
                                <th>S. No</th>
                                <th>Date</th>
                                <th>Punch In</th>
                                <th>Punch Out</th>
                                <th>Hours</th>
                                <th> Break Time</th>
                                <th>MANUAL LOG</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            if(!empty($log)){
                                $sno = 1;
                                foreach ($log as $pkey => $log_val) {
                                    $punch_date = (!empty($log_val['punch_date']) ? date('j M Y', strtotime($log_val['punch_date'])) : '' );
                                     $punchIn = (!empty($log_val['punch_in']) ? $log_val['punch_in'] : '' );
                                    $punchOut = (!empty($log_val['punch_out']) ? $log_val['punch_out'] : 'Missed punch-out' );
                                    $hour = (!empty($log_val['hours']) ? $log_val['hours'] : '0' );
                                    $break_time = (!empty($log_val['break_time']) ? $log_val['break_time'] : '0' );
                                    $manual_log = ($log_val['manual_log'] =='Yes' ? $log_val['manual_log'] : '');  
                                    ?>
                                    <tr>
                                        <td><?php echo $sno; ?></td>
                                        <td><?php echo $punch_date; ?></td>
                                        <td><?php echo $punchIn; ?></td>
                                        <td><?php echo $punchOut; ?></td>
                                        <td><?php echo $hour; ?></td>
                                        <td><?php echo $break_time; ?></td>
                                        <td><?php echo $manual_log; ?></td>
                                        
                                    </tr>
                                    <?php
                                $sno++;
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

<script type="text/javascript">
$(document).ready(function() {
  var download_file_name = "<?php echo $report_file_name; ?>";
  $('#employee_manual_log_list').DataTable({
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
    "processing": true,
    "serverSide": false,
    "stateSave": false,
    /*"order": [[2,"asc"]],*/
      "columnDefs": [ { "targets": [0,1,-1], "bSortable": false } ],
    
      });

});
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

    #employee_manual_log_list thead {
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