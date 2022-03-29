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
       
    </div>
</div>
<div class="section-body">
    <div class="container-fluid">
        
        <div class="tab-content">
            <div class="tab-pane fade show active" id="Employee-Request" role="tabpanel">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped table-vcenter text-nowrap mb-0" id="get_resignation">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Employee Name</th>
                                        <th>Department</th>
                                        <th>Designation</th>
                                        <th>Main Reason</th>
                                        <th>Other Reason</th>
                                        <th>Resignation Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                if(!empty($get_data)){

                                    foreach ($get_data as $index => $val){

                                    ?>
                                    <tr>
                                        <td class="text-center text-nowrap"><?php echo $index+1; ?></td>
                                        <td class="text-left text-nowrap"><span><?php echo $val->full_name; ?></span></td>
                                        <td class="text-left text-nowrap"><span><?php echo $val->dept_name; ?></span></td>
                                        <td class="text-left text-nowrap"><span><?php echo $val->desig_name; ?></span></td>
                                        <td class="text-left text-nowrap"><span><?php echo $val->main_reason; ?></span></td>
                                        <td class="text-left text-nowrap"><span><?php echo $val->other_reason; ?></span></td>
                                        <td class="text-left text-nowrap"><?php echo date('Y-m-d',strtotime($val->res_date)); ?></td>
                                        <td class="text-left text-nowrap">
                                         <?php
                                          if($val->status == 'Pending'){
                                          ?>
                                          <select class="btn btn-white btn-sm btn-rounded dropdown-toggle get_status" employee_id="<?php echo $val->employee_id; ?>" elementID="<?php echo encode($val->id); ?>">
                                              <option value="Pending" <?php echo ($val->status == 'Pending' ? 'selected' : ''); ?> > <i class="fa fa-dot-circle-o text-info"></i> Pending </option>
                                              <option value="Approved" <?php echo ($val->status == 'Approved' ? 'selected' : ''); ?> > <i class="fa fa-dot-circle-o text-success"></i> Approved </option>
                                              <option value="Disapproved" <?php echo ($val->status == 'Disapproved' ? 'selected' : ''); ?> > <i class="fa fa-dot-circle-o text-danger"></i> Disapproved </option>
                                            </select>
                                          <?php

                                          }else{
                                          echo ($val->status);
                                        }
                                          ?>   

                                        </td>

                                    </tr>
                                    <?php 
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
    $('#get_resignation').dataTable();

    $(".get_status").on("change", function(){
            var urls = BASEURL+"Performance/updateResignationStatus";
            var get_status = $(this).val();
            var employee_id = $(this).attr('employee_id');
            var elementID = $(this).attr('elementID');
            
            swal({
                title: "Are you sure you want to change the status?",
              
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
          .then((willDelete) => {
              if (willDelete) {
                 var formData = {
                      'row_id': elementID,
                      'get_status': get_status,
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
</script>
