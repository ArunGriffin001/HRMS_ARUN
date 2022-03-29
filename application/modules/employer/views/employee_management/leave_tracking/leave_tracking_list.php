<!-- <div class="row">
    <div class="col-md-3">
        <div class="stats-info">
            <h6>Total Leave</h6>
            <h4><?php echo $total_req; ?></h4>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stats-info">
            <h6>Approved Leave</h6>
            <h4><?php echo $approved; ?></h4>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stats-info">
            <h6>Pending Leaves</h6>
            <h4><?php echo $pending; ?></h4>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stats-info">
            <h6>Decline Leave</h6>
            <h4><?php echo $decline; ?></h4>
        </div>
    </div>
</div> -->
<!-- /Leave Statistics -->
<?php

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

$currDate = date('Y-m-d');
$report_file_name = 'leave-tracking-report-list-'.$currDate;
?>
<div class="mt-3 attendance-search" style="margin-top: 0; margin-bottom: 30px;">
    <div class="">
      <form method="post" action="<?php echo base_url('employer/emp-management/leave_tracking/list'); ?>" data-parsley-validate="" class="form-group">
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row"> 
                            <!-- <div class="col-lg-4 col-md-4 col-sm-6">
                                <label>Search</label>
                                <div class="input-group"><input type="text" class="form-control" placeholder="Employee name" /></div>
                            </div> -->
                            <div class="col-lg-4 col-md-6 col-sm-6">
                              <label>Select Month</label>
                              <div class="multiselect_div">
                                <select class="form-control" name="from_month" required="">
                                  <option value="">Select month</option>
                                   <?php
                                   if(!empty($month_list)){
                                    foreach ($month_list as $key => $month_val){
                                      ?>
                                      <option value="<?php echo $key; ?>" <?php echo ($key == $month ? 'selected' : ''); ?> > <?php echo $month_val; ?></option>
                                      <?php
                                    }
                                   }
                                   ?>
                                </select>
                              </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <label>Select Year</label>
                                <div class="form-group">
                                  <select class="form-control" name="from_year" required="">
                                    <option value="">Select year</option>
                                       <?php
                                       if(!empty($year_list)){
                                        foreach ($year_list as $key => $year_val){
                                          ?>
                                          <option value="<?php echo $year_val->years; ?>" <?php echo ($year_val->years == $year ? 'selected' : ''); ?> > <?php echo $year_val->years; ?></option>
                                          <?php
                                        }
                                       }
                                       ?>
                                  </select>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-6">
                              <label></label>
                              <div class="pt-4t">
                                 <button type="submit" class="btn btn-sm btn-primary btn-block btn-search"><label>&nbsp;</label>Search</button>
                              </div>
                             
                             <!--  <label>&nbsp;</label><a href="javascript:void(0)" class="btn btn-sm btn-primary btn-block">Search</a></div> -->
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </form>
    </div>
</div>
<?php
       /* echo'<pre>';
        echo $this->db->last_query();
        print_r($leave_tracking);
        echo'</pre>';*/
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
                          <th><?php echo $this->lang->line('tb_leave_type'); ?></th>
                          <th><?php echo $this->lang->line('tb_from'); ?></th>
                          <th><?php echo $this->lang->line('tb_to'); ?></th>
                          <th><?php echo $this->lang->line('tb_departments'); ?></th>
                          <th><?php echo $this->lang->line('tb_designation_name'); ?></th>
                          <th>Department Head Status</th>
                          <th>Admin HR Status</th>
                          <th><?php echo $this->lang->line('tb_action'); ?></th>
                        </tr>
                      </thead>
                      <tbody>
                         <?php
                         if(!empty($leave_tracking)){
                            $i = 1;
                            foreach ($leave_tracking as $val){
                              ?>
                              <tr>
                                <td><?php echo $i;?></td>
                                <td><span><?php echo $val->first_name.' '.$val->last_name;?></span></td>
                                <td><span><?php echo $val->leave_type_name; ?></span></td>
                                <td><span><?php  echo date('Y-m-d',strtotime($val->from_date)); ?></span></td>
                                <td><span><?php  echo date('Y-m-d',strtotime($val->to_date)); ?></span></td>
                                <td><span><?php echo $val->dept_name;?></span></td>
                                <td><span><?php echo $val->designation;?></span></td>
                                <td><span><?php echo $val->supervisor_approved_status;?></span></td>

                                <td>
                                  <?php
                                  if($val->employer_approved_status == 'Pending'){
                                  ?>
                                  <select class="btn btn-white btn-sm btn-rounded dropdown-toggle leave_status" employee_id="<?php echo $val->employee_id; ?>" elementID="<?php echo encode($val->leave_tracking_id); ?>">
                                      <option value="Pending" <?php echo ($val->employer_approved_status == 'Pending' ? 'selected' : ''); ?> > <i class="fa fa-dot-circle-o text-info"></i> Pending </option>
                                      <option value="Approved" <?php echo ($val->employer_approved_status == 'Approved' ? 'selected' : ''); ?> > <i class="fa fa-dot-circle-o text-success"></i> Approved </option>
                                      <option value="Declined" <?php echo ($val->employer_approved_status == 'Declined' ? 'selected' : ''); ?> > <i class="fa fa-dot-circle-o text-danger"></i> Declined </option>
                                    </select>
                                  <?php

                                  }else{
                                  echo ($val->employer_approved_status);
                                }
                                  ?>
                                </td>
                                 <?php
                                 $actionLink = '';
                                 $actionLink .= '<a href="javascript:void(0)" title="view" class="btn btn-icon waves-effect waves-light fa-new-grey m-b-5" data-toggle="modal" data-target="#view_leave_record" onclick="view_leave_record('.$val->leave_tracking_id.')"><i class="fa fa-eye"></i></a>';
                                /* $edit_url = base_url('employer/emp-management/leave_tracking/edit/').encode($val->leave_tracking_id);
                                  $actionLink .= '<a href="'.$edit_url.'" title="Edit" class="btn btn-icon waves-effect waves-light fa-new-grey m-b-5"><i class="fa fa-edit"></i></a>';*/
                                ?>
                                <td><span><?php echo $actionLink; ?></span></td>
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
        "processing": true,
        "serverSide": false,
        "stateSave": false,
        "columnDefs": [ { "targets": [0,-1], "bSortable": false } ],
    });
});

  $(document).ready(function(){
        var urls = BASEURL+"emp-management/leave_tracking/leaveStatus";
        //alert(urls)
        $(".leave_status").on("change", function(){

            var leave_status = $(this).val();
            var employee_id = $(this).attr('employee_id');
            var elementID = $(this).attr('elementID');
            
            swal({
                title: "Are you sure you want to change the status?",
                // text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
          .then((willDelete) => {
              if (willDelete) {
                 var formData = {
                      'row_id': elementID,
                      'leave_status': leave_status,
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
                              refreshPge();   
                          }else if(data.isSuccess == false && data.error == 'error' && data.message != ''){
                            swal(data.message);
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
        xmlhttp.open("GET","<?php echo base_url('employer/emp-management/leave_tracking/get-view-data');?>/"+tracking_id,true);
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