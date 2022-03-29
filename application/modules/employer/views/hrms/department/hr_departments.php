<div class="section-body">
   <div class="container-fluid">
      <div class="d-flex justify-content-between align-items-center">
         <ul class="nav nav-tabs page-header-tab">
            <!-- <li class="nav-item"><a class="nav-link active" id="Departments-tab" data-toggle="tab" href="#Departments-list">List View</a></li> -->
           <!--  <li class="nav-item"><a class="nav-link" id="Departments-tab" data-toggle="tab" href="#Departments-grid">Grid View</a></li> -->
         </ul>
         <div class="header-action">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fe fe-plus mr-2"></i><?php echo $this->lang->line('btn_add_department'); ?></button>
         </div>
      </div>
   </div>
</div>

</style>
<div class="section-body mt-3">
   <div class="container-fluid">
      <div class="tab-content mt-3">
         <div class="tab-pane fade show active" id="Departments-list" role="tabpanel">
            <div class="card">
               <div class="card-header">
                  <h3 class="card-title"><?php echo $page_heading; ?></h3>
                  
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
                     <table class="table table-striped table-vcenter table-hover mb-0" id="department_list">
                        <thead>
                           <tr>
                              <th><?php echo $this->lang->line('sr_no'); ?></th>
                              <th><?php echo $this->lang->line('tb_department_name'); ?></th>
                              <th><?php echo $this->lang->line('tb_department_head'); ?></th>
                              <th><?php echo $this->lang->line('tb_total_employee'); ?></th>
                              <th><?php echo $this->lang->line('tb_create_on'); ?></th>
                              <th><?php echo $this->lang->line('tb_status'); ?></th>
                              <th><?php echo $this->lang->line('tb_action'); ?></th>
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
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <form method="post" action="<?php echo base_url('employer/department/add'); ?>" data-parsley-validate="">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Add Department</h5>
              <!--  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
            </div>
            <div class="modal-body">
               <div class="row clearfix">
                  <div class="col-md-12">
                     <div class="form-group">
                        <input type="text" name="dept_name" class="form-control" placeholder="Department Name" data-parsley-required-message="Please enter the department name" required="">
                     </div>
                  </div>
                 
                  <div class="col-md-12">
                     <div class="form-group">
                        <input type="text" name="no_of_employee" class="form-control" placeholder="No of Employee" required="" data-parsley-type="number" min="1" data-parsley-required-message="Please enter the total number of employee" >
                     </div>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <button type="submit" name="save" class="btn btn-primary">Save</button>
            </div>
         </form>

      </div>
   </div>
</div>

<script type="text/javascript">
 
  var postListingUrl =  BASEURL+"department/department_list";
  $('#department_list').dataTable({
    "bPaginate": true,
    "pageLength": 50,
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
    "processing": true,
    "serverSide": true,
    "stateSave": false,
    "ajax": postListingUrl,
    /*"order": [[2,"asc"]],*/
    "columnDefs": [ { "targets": 0, "bSortable": true,"orderable": true, "visible": true } ],
          'aoColumnDefs': [{'bSortable': false,'aTargets': [0,-1, 3]}],
      });

  $(".dept_head_id").on("change", function(){
      let emp_name = $('select[name=dept_head_id] option:selected').attr('emp_name');
      $('.dept_head_name').val(emp_name);
      
   });


  function OtherStatus(ids, status, urls, table, field, idField=''){
        
    var idField = (idField!='') ? idField : '';
    swal({
        title: "Are you sure you want to do this?",
        // text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
           var formData = {
                'ids': ids,
                'status': status,
                'table': table,
                'field': field,
                'idField': idField,
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
                        refreshCurrentPage();   
                    }else if(data.isSuccess == false && data.error == 'error' && data.message != ''){
                      swal(data.message);
                    }else{
                      swal("Server error, please try again !");
                    }
                },
            });
        } 
    });
}
function refreshCurrentPage() {
    window.location.href = window.location.href;
}

</script>

<style type="text/css">
/* 
  #department_list tbody td:nth-child(2){
       display: block;
    width: 100px;
    border:0;
  } */

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

 #department_list thead {
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
     

