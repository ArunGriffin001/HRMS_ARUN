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
                          <th><?php echo $this->lang->line('tb_action'); ?></th>
                        </tr>
                      </thead>
                      <tbody>
                         <?php
                         if(!empty($get_leave_request)){
                            $i = 1;
                            foreach ($get_leave_request as $val){
                              ?>
                              <tr>
                                <td><?php echo $i;?></td>
                                <td><span><?php echo $val->full_name;?></span></td>
                                <td><span><?php echo $val->leave_type_name; ?></span></td>
                                <td><span><?php  echo date('Y-m-d',strtotime($val->from_date)); ?></span></td>
                                <td><span><?php  echo date('Y-m-d',strtotime($val->to_date)); ?></span></td>
                                <td><span><?php echo $val->dept_name;?></span></td>
                                <td><span><?php echo $val->designation;?></span></td>
                                <td>
                                  <?php
                                  if($val->supervisor_approved_status == 'Pending'){
                                  ?>
                                  <select class="btn btn-white btn-sm btn-rounded dropdown-toggle leave_status" employee_id="<?php echo $val->employee_id; ?>" elementID="<?php echo encode($val->leave_tracking_id); ?>">
                                      <option value="Pending" <?php echo ($val->supervisor_approved_status == 'Pending' ? 'selected' : ''); ?> > <i class="fa fa-dot-circle-o text-info"></i> Pending </option>
                                      <option value="Approved" <?php echo ($val->supervisor_approved_status == 'Approved' ? 'selected' : ''); ?> > <i class="fa fa-dot-circle-o text-success"></i> Approved </option>
                                      <option value="Declined" <?php echo ($val->supervisor_approved_status == 'Declined' ? 'selected' : ''); ?> > <i class="fa fa-dot-circle-o text-danger"></i> Declined </option>
                                    </select>
                                  <?php

                                  }else{
                                  echo ($val->supervisor_approved_status);
                                }
                                  ?>
                                </td>
                                 <?php
                                 $actionLink = '';
                                 $actionLink .= '<a href="javascript:void(0)" title="view" class="btn btn-icon waves-effect waves-light fa-new-grey m-b-5" data-toggle="modal" data-target="#view_leave_record" onclick="view_leave_record('.$val->leave_tracking_id.')"><i class="fa fa-eye"></i></a>';
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
    "columnDefs": [ { "targets": 0, "bSortable": true,"orderable": true, "visible": true } ],
          'aoColumnDefs': [{'bSortable': false,'aTargets': [0,-1, 3]}],
      });

  $(document).ready(function(){
        var urls = BASEURL+"mywork/headLeaveApprove";
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
     
     </style>