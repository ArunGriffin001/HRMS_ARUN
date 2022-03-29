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
  
  $('#leave_type_list').dataTable({
    "bPaginate": true,
    "pageLength": 10,
    "bLengthChange": true,
    "bFilter": true,
    "bSort": true,
    "bInfo": true,
    "bAutoWidth": false,
    "processing": true,
    "serverSide": false,
    "stateSave": false,
    /*"order": [[2,"asc"]],*/
      "columnDefs": [ { "targets": [0,1,-1], "bSortable": false } ],
    
      });


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