<div class="header_btn">
   <div class="header-action">
     <a class="btn btn-primary" href="<?php echo base_url('employer/emp-management/leave_assign_record/list'); ?>"><i class="fe fe-plus mr-2"></i>Back </a>
   </div>
</div>

<div class="section-body">
   <div class="container-fluid">
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
      <div class="tab-content">
         <div class="tab-pane fade show active" id="Employee-list" role="tabpanel">
            <div class="card">
               <div class="card-header">
                  <h3 class="card-title"><b>Employee Name:</b> <?php echo (!empty($emp_info->full_name) ? $emp_info->full_name : '') ?></h3>
               </div>
               <div class="card-body">
                  <div class="table-responsive">
                     <table class="table table-hover table-striped table-vcenter text-nowrap mb-0 table_list" id="user_list" class='inventory_related' style="width:100%">
                        <thead> 
                           <tr>
                              <th>S.No.</th>
                              <th>Leave Type</th>
                              <th>Leave Type Status</th>
                              <th>Total Leave</th>
                              <th>Date</th>
                           </tr>
                        </thead>
                        <tbody>
                            <?php
                            if(!empty($res)){
                                $i = 1;
                                foreach ($res as  $res_val) {
                                ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo(!empty($res_val->leave_type_name) ? $res_val->leave_type_name : ''); ?></td>
                                    <td><?php echo $res_val->leave_type_status; ?></td>
                                    <td><?php echo(!empty($res_val->leave_assign_val) ? $res_val->leave_assign_val : ''); ?></td>
                                    <td><?php echo(!empty($res_val->created_at) ? dateTime($res_val->created_at) : ''); ?></td>
                                </tr>
                                <?php
                                $i++;
                                }
                            }else{
                            ?>
                            <tr><td>Record not found</td></tr>
                            <?php
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
 
  //var postListingUrl =  BASEURL+"emp-management/leave_assign_record/leave_assign_list";
  $('#user_list').dataTable({
    "bPaginate": true,
    "bLengthChange": true,
    "bFilter": true,
    "bSort": true,
    "bInfo": true,
    "bAutoWidth": false,
    "pageLength": 10,
    "scrollX": true,
    "scrollY": "600px",
    "scrollCollapse": true,
    "fixedHeader": true,
    "processing": false,
    "serverSide": false,
    "stateSave": false,
    /*"ajax": postListingUrl,*/
    /*"order": [[2,"asc"]],*/
   "columnDefs": [ { "targets": [0], "bSortable": false } ],
          
      });

      

function view_emp_record(tracking_id)
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
        xmlhttp.open("GET","<?php echo base_url('employer/hrms/users/get-view-data');?>/"+tracking_id,true);
        xmlhttp.send();
    }


 
  
</script>


<style type="text/css">

  #user_list tbody td:nth-child(2){
       display: block;
    width: 100px;
    border:0;
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

 #user_list thead {
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

       
<style>
   .card-icon{
font-size: 50px;
   }
</style>