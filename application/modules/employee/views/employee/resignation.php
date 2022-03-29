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
        <div class="d-flex justify-content-between align-items-center float-right mt-2 mb-2">
            <div class="header-action">
               
                <a href="<?php echo base_url('employee/employee/resignation/add'); ?>" class="btn btn-primary float-right"><i class="fa fa-plus mr-2"></i>Add Resignation</a>
            </div>
        </div>
    </div>
</div>
<div class="section-body">
    <div class="container-fluid">
        
        <div class="tab-content">
            <div class="tab-pane fade show active" id="Employee-Request" role="tabpanel">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped table-vcenter text-nowrap mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
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
                                        <td class="text-left text-nowrap"><span><?php echo $val->main_reason; ?></span></td>
                                        <td class="text-left text-nowrap"><span><?php echo $val->other_reason; ?></span></td>
                                        <td class="text-left text-nowrap"><?php echo date('Y-m-d',strtotime($val->res_date)); ?></td>
                                        <td class="text-left text-nowrap"><?php echo $val->status; ?></td>
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

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Resignation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="cross-icon" aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row clearfix">
                    
                    <div class="col-md-6 col-sm-6">
                        <label> Notice Date</label>
                        <div class="form-group">
                            <input type="text" data-provide="datepicker" data-date-autoclose="true" class="form-control" placeholder="Notice date" />
                        </div>
                    </div>
                   
                    <div class="col-md-12 col-sm-6">
                        <label> Main Reason</label>
                        <div class="form-group">
                            <textarea class="form-control" placeholder="Main Reason"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-6">
                        <label> Other Reason</label>
                        <div class="form-group">
                            <textarea class="form-control" placeholder="Other Reason"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Apply</button>
            </div>
        </div>
    </div>
</div>
