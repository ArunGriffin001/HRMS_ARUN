<div class="section-body">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center">
            <!-- <ul class="nav nav-tabs page-header-tab">
                        <li class="nav-item"><a class="nav-link active" id="user-tab" data-toggle="tab" href="#user-list">List</a></li>
                        <li class="nav-item"><a class="nav-link" id="user-tab" data-toggle="tab" href="#user-add">Add New</a></li>
                     </ul> -->
            <div class="header-action">
                <!-- <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus mr-2"></i>Apply Leave</button> -->
                 <a href="<?php echo base_url('employee/employee/apply_leave'); ?>" class="btn btn-primary float-right"><i class="fa fa-plus mr-2"></i>Apply Leave</a>
            </div>
        </div>
        <br>
        <div class="row">
            <?php
            $total_leave = 0;
            $j = 1;
            $i = 2;
              if(!empty($get_leave_info)){
                foreach ($get_leave_info as $get_leave) {
                    $total_leave = $total_leave + $get_leave->leave_assign_val;
                }
            }
            ?>
            <div class="col-lg-4 col-md-4">
                <div class="card">
                    <div class="card-body w_sparkline">
                        <div class="details">
                            <span>Total Leave</span>
                            <h3 class="mb-0"><?php echo(!empty($total_leave) ? $total_leave : '0'); ?></h3>
                        </div>
                        <div class="w_chart">
                            <span id="mini-bar-chart<?php echo$j; ?>" class="mini-bar-chart"></span>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            if(!empty($get_leave_info)){
                foreach ($get_leave_info as $get_leave) {
                    $total_leave = $total_leave + $get_leave->leave_assign_val;
                 ?>
                 <div class="col-lg-4 col-md-4">
                    <div class="card">
                        <div class="card-body w_sparkline">
                            <div class="details">
                                <span><?php echo(!empty($get_leave->leave_cat_name) ? $get_leave->leave_cat_name : ''); ?></span>
                                <h3 class="mb-0"><?php echo(!empty($get_leave->leave_assign_val) ? $get_leave->leave_assign_val : ''); ?></h3>
                            </div>
                            <div class="w_chart">
                                <span id="mini-bar-chart<?php echo $i; ?>" class="mini-bar-chart"></span>
                            </div>
                        </div>
                    </div>
                </div>
                 <?php 
                 $i++;  
                }
            }
            ?>
            
        </div>
    </div>
</div>
<div class="section-body">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-vcenter text-nowrap mb-0" id="emp_leave_record">
                        <thead>
                            <tr>
                                <th>S.NO</th>
                                <th>Leave Type</th>
                                <th>Day Type</th>
                                <th>From Date</th>
                                <th>To Date</th>
                                <th>Applied Date</th>
                                <th>HR Admin Approval Status</th>
                                <th>Dept. Head Approval Status</th>
                                <th>Reason</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        if(!empty($get_apply_leave_info)){
                            $i = 1;
                            foreach ($get_apply_leave_info as $leave_info) {
                            ?>
                            <tr>
                                <td><?php echo$i; ?></td>
                                <td><?php echo(!empty($leave_info->leave_cat_name) ? $leave_info->leave_cat_name : ''); ?></td>
                                <td><?php echo(!empty($leave_info->leave_val) ? $leave_info->leave_val : ''); ?></td>
                                <td><?php echo(!empty($leave_info->from_date) ? date('Y-m-d',strtotime($leave_info->from_date)) : ''); ?></td>
                                <td><?php echo(!empty($leave_info->to_date) ? date('Y-m-d',strtotime($leave_info->to_date)) : ''); ?></td>
                                <td><?php echo(!empty($leave_info->created_at) ? dateTime($leave_info->created_at) : ''); ?></td>
                                <td><?php echo(!empty($leave_info->employer_approved_status) ? $leave_info->employer_approved_status : ''); ?></td>
                                <td><?php echo(!empty($leave_info->supervisor_approved_status) ? $leave_info->supervisor_approved_status : ''); ?></td>
                                <td><?php echo(!empty($leave_info->leave_reason) ? $leave_info->leave_reason : ''); ?></td>
                               
                            </tr>
                            <?php
                            $i++;
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

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Leave</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="cross-icon" aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <select class="form-control custom-select">
                                <option value="true">Leave Type</option>
                                <option>Medical</option>
                                <option>Causel</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Name" />
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <select class="form-control custom-select">
                                <option value="true">Half day</option>
                                <option>Full day</option>
                                <option>Half day</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <input type="number" class="form-control" placeholder="Remaining Leave" />
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <input type="text" data-provide="datepicker" data-date-autoclose="true" class="form-control" placeholder="From" />
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <input type="text" data-provide="datepicker" data-date-autoclose="true" class="form-control" placeholder="To" />
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-6">
                        <div class="form-group">
                            <textarea class="form-control" placeholder="Reason"></textarea>
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

<script type="text/javascript">
    $('#emp_leave_record').dataTable();
</script>
