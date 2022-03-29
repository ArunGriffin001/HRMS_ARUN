<div class="header_btn">
   <div class="header-action">
      <a href="<?php echo base_url('employer/hrms/users/add'); ?>" class="btn btn-primary float-right"><i class="fa fa-plus mr-2"></i>Add Employee</a>
   </div>
</div>
<?php
$currDate = date('Y-m-d');
$report_file_name = 'Employee-list-report-'.$currDate;
?>
<!-- <div class="section-body">
   <div class="container-fluid">
      <div class="row">
         <div class="col-lg-3 col-md-6">
            <div class="card">
               <div class="card-body w_sparkline">
                  <div class="details">
                     <span>Total Employee</span>
                     <h3 class="mb-0 counter"><?php echo(!empty($total_emp) ? $total_emp : '0'); ?></h3>
                  </div>
                  <div class="w_chart">
                     <span id="mini-bar-chart1" class="mini-bar-chart"></span>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-3 col-md-6">
            <div class="card">
               <div class="card-body w_sparkline">
                  <div class="details">
                     <span">New Employee</span>
                     <h3 class="mb-0 counter"><?php echo(!empty($new_employee) ? $new_employee : '0'); ?></h3>
                  </div>
                  <div class="w_chart">
                     <span id="mini-bar-chart2" class="mini-bar-chart"></span>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-3 col-md-6">
            <div class="card">
               <div class="card-body w_sparkline">
                  <div class="details">
                     <span>Male</span>
                     <h3 class="mb-0 counter"><?php echo(!empty($total_male) ? $total_male : '0'); ?></h3>
                  </div>
                  <div class="w_chart">
                     <span id="mini-bar-chart3" class="mini-bar-chart"></span>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-3 col-md-6">
            <div class="card">
               <div class="card-body w_sparkline">
                  <div class="details">
                     <span>Female</span>
                     <h3 class="mb-0 counter"><?php echo(!empty($total_female) ? $total_female : '0'); ?></h3>
                  </div>
                  <div class="w_chart">
                     <span id="mini-bar-chart4" class="mini-bar-chart"></span>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div> -->

<!-- Filter option  -->
<div class="section-body">
   <div class="container-fluid">
      <div class="row">
         <div class="table-responsive">
            <form method="post" action="<?php echo base_url(EMPLOYER_URL) ?>hrms/users" name="search_form_ticket" id="search_form_ticket" autocomplete="off">
               <table width="100%" class="table table-bordered table-striped" >
                  <tr>
                     <th>First name</th>
                     <th>Last name</th>
                     <th>Department</th>

                  </tr> 
                  <tr>
                     <td>
                        <input type="text" name="first_name" id="first_name"  value="<?php echo (!empty($first_name) ? $first_name : '');?>" placeholder="First name" class="form-control" >
                     </td>
                      <td>
                        <input type="text" name="last_name" id="last_name"  value="<?php echo (!empty($last_name) ? $last_name : '');?>" placeholder="Last name" class="form-control" >
                     </td>
                     <td>
                        <input type="text" name="dept_name" id="dept_name"  value="<?php echo (!empty($dept_name) ? $dept_name : '');?>" placeholder="Department name" class="form-control" >
                     </td>
                  </tr>
                  <!-- <tr>
                     <th>Status</th>
                  </tr> -->
                  <tr>
                      <!-- <td>
                        <select class="form-control" name="status" id="status">
                           <option value="">Select status</option>
                           <option value="Active" <?php echo (!empty($status) && $status == 'Active' ? "selected" : '');?> >Active</option>
                           <option value="Deactive" <?php echo (!empty($status) && $status == "Deactive" ? "selected" : "");?> >Deactive</option>
                        </select>
                     </td> -->
                     <td nowrap class="text-left"><button type="submit" class="btn btn-primary">Search</button>&nbsp;<a href="<?php echo base_url(EMPLOYER_URL) ?>hrms/users" class="btn btn-primary">Reset Filter</a></td>
                  </tr>
               </table>
            </form>
         </div>
      </div>
   </div>
</div>
<!-- End filter section -->

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
                  <h3 class="card-title">Employee List</h3>
               </div>
               <div class="card-body">
                  <div class="table-responsive">
                     <table class="table table-hover table-striped table-vcenter text-nowrap mb-0 table_list" id="user_list" class='inventory_related' style="width:100%">
                        <thead> 
                           <tr>
                              <th>S.No.</th>
                              <th>Image</th>
                              <th>First Name</th>
                              <th>Last Name</th>
                              <th>Email</th>
                              <th>Department</th>
                              <th>Designation</th>
                              <th>Joining Date</th>
                              <th>Created Date</th>
                              <th>Status</th>
                              <th>Action</th>
                           </tr>
                         </thead> 
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<div class="modal fade" id="view_emp_record" tabindex="-1" role="dialog" 
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
  $(document).ready(function(){
   var download_file_name = "<?php echo $report_file_name; ?>";
  var postListingUrl =  BASEURL+"hrms/users/user_list";
  $('#user_list').dataTable({
      dom: "lBfrtip",
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
    "processing": true,
    "serverSide": true,
    "stateSave": false,
    "ajax": postListingUrl,
    "order": [[8,"desc"]],
    "columnDefs": [ { "targets": [0,1,-1], "bSortable": false } ],
   
    
   //'aoColumnDefs': [{'bSortable': false,'aTargets': [0,-1, 3]}],
          
      });
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

<!-- export button  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.7.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.2/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables-buttons/2.0.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.bootstrap.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.js"></script>
