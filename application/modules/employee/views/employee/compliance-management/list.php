<style type="text/css">

  /*#getComplienceList tbody td:nth-child(2){
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

 #getComplienceList thead {
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

.img-circle{
    height: 80px;
    width: 80px;
    border-radius: 100px;}

</style>
<?php $month = array('1'=>'January','2'=>'February','3'=>'March','4'=>'April','5'=>'May','6'=>'June','7'=>'July','8'=>'August','9'=>'September','10'=>'October','11'=>'November','12'=>'December'); ?>
<div class="section-body mt-3">
   <div class="container-fluid">
      <div class="tab-content mt-3">
         <div class="tab-pane fade show active" id="Departments-list" role="tabpanel">
            <div class="card">
               <div class="card-body">
                  <div class="table-responsive">
                     <!-- Start -->
                     <table id="getComplienceList" class="table table-striped table-vcenter table-hover mb-0" >
                        <thead>
                           <tr>
                              <th>S.No.</th>
                              <th>Basic+DA</th>
                              <th>Fund Type</th>
                              <th>Employee Share</th>
                              <th>Employer Share</th>
                              <th>Employer Pension Share</th>
                              <th>Admin PF Charge</th>
                              <th>Admin EDLI Charge</th>
                              <th>Date</th>
                              <th>Paying Month</th>
                              <th>Paying Year</th>
                              <th>Pay Slip</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                              if(!empty($cal_list)){
                                 foreach ($cal_list as $key => $cal_val) {
                                    $sal_id = $cal_val['sal_ID'];
                                  ?>
                                    <tr>
                                       <td><?php echo $key+1; ?></td>
                                       <td><?php echo(!empty($cal_val['basic_DA_sal']) ? $cal_val['basic_DA_sal'] : ''); ?></td>
                                       <td><?php echo(!empty($cal_val['type']) ? $cal_val['type'] : ''); ?></td>
                                       <td><?php echo(!empty($cal_val['employee_share']) ? $cal_val['employee_share'] : ''); ?></td>
                                       <td><?php echo(!empty($cal_val['employer_share']) ? $cal_val['employer_share'] : ''); ?></td>
                                       <td><?php echo(!empty($cal_val['employer_pen_contribution']) ? $cal_val['employer_pen_contribution'] : '');
                                          ?></td>
                                       <td><?php echo(!empty($cal_val['admin_pf_charges']) ? $cal_val['admin_pf_charges'] : '');
                                          ?></td>
                                       <td><?php echo(!empty($cal_val['admin_EDLI_charges']) ? $cal_val['admin_EDLI_charges'] : '');
                                          ?></td>
                                       <td><?php echo(!empty($cal_val['paying_date']) ? $cal_val['paying_date'] : '');?></td>
                                       <td><?php echo(!empty($cal_val['paying_month']) ? $month[$cal_val['paying_month']] : '');?></td>
                                       <td><?php echo(!empty($cal_val['paying_year']) ? $cal_val['paying_year'] : '');?></td>
                                       <td class="seven_sec"><a href="<?php echo base_url('employee/employee/compliance/').encode($sal_id); ?>" class="btn btn-primary" >Show</a></td>

                                    </tr>
                                 <?php
                                 }
                              }
                              ?>
                        </tbody>
                     </table>
                     <!--  End -->
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php
$currDate = date('Y-m-d');
$report_file_name = 'My-Pay-slist-report-'.$currDate;
?>
<script type="text/javascript">
   $(document).ready(function() {
      var download_file_name = "<?php echo $report_file_name; ?>";
      var table = $('#getComplienceList').dataTable({
            dom: "lBfrtip",
            buttons: [
                        { 
                           extend: 'pdfHtml5',orientation: 'landscape',pageSize: 'LEGAL',filename: download_file_name
                        }
                     ],
          "bPaginate": true,
          "bLengthChange": true,
          "bFilter": true,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false,
          "pageLength": 50,
          "lengthMenu": [50,100,200,500],
          "scrollX": true,
          "scrollY": "600px",
          "scrollCollapse": true,
          "fixedHeader": true,
          "order": [[9,"desc"]],
          "columnDefs": [ { "targets": [0,-1], "bSortable": false } ],
      });
   } );
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.2/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables-buttons/2.0.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.bootstrap.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.js"></script>