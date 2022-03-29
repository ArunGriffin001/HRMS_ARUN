<div class="section-body mt-3">
    <div class="container-fluid">
        <div class="row clearfix row-deck">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Timesheet</h3>
                    </div>
                    <div class="punch-det">
                        <h6>Punch In Today</h6>
                        <?php// echo'time = '. date('Y-m-d h:i:s'); ?>
                        <?php 
                        if(!empty($punch_today)){
                            $punch_date = date('D, jS M Y g:i A', strtotime($punch_today->created_at));
                        ?>
                        <p><?php echo $punch_date; ?></p>
                        <?php
                        }else{
                        ?>
                        <p>NA</p>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="card-body text-center">
                        <div class="punch-info">
                            <div class="punch-hours"><span>
                                <?php 
                                if(filter_var($hours, FILTER_VALIDATE_FLOAT) && $hours < 0){
                                    echo '0';
                                }else{
                                    echo $hours;
                                }
                                ?>
                                hrs</span></div>
                        </div>

                        <div class="punch-btn-section" > 
                            <div class="btn btn-primary">Working Hours</div>
                            </div>
                            <div class="statistics">
                                <div class="row">
                                    <div class="col-md-6 col-6 text-center">
                                        <div class="stats-box">
                                            <p>Punch In at</p>
                                            <?php 
                                            if(!empty($punch_today)){
                                                $start_time = date('g:i A', strtotime($punch_today->punch_in_time));
                                            ?>
                                                <h6><?php echo $start_time; ?></h6>
                                            <?php
                                            }else{
                                            ?>
                                            <h6>NA</h6>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-6 text-center">
                                        <div class="stats-box">
                                            <p>Break</p>
                                            <?php 
                                            if(!empty($break_time)){
                                            ?>
                                            <h6><?php echo $break_time; ?> hrs</h6>
                                            <?php
                                            }else{

                                                echo'NA';
                                            }
                                            ?>

                                            
                                        </div>
                                    </div>
                                </div>
                            </div>

                    </div>
                    
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-header" style="border-bottom: 1px solid #ddd;">
                        <h3 class="card-title">Today Activity</h3>
                    </div>
                    <?php
                    if(!empty($punch_today)){
                    ?>
                    <div class="card-body acitivity_section">
                        <div class="timeline_item">
                            <img class="tl_avatar" src="<?php echo base_url('template/'); ?>employee/assets/images/avatar1.jpg" alt="fake_url" /><span>Punch In at</span><br />
                            
                            <?php 
                            if(!empty($punch_today)){
                                $start_time = date('h:i A', strtotime($punch_today->punch_in_time));
                            ?>
                                <span><i class="fa fa-clock-o"></i> <?php echo $start_time; ?> </span>
                            <?php
                            }else{
                            ?>
                            <h6>NA</h6>
                            <?php
                            }
                            ?>
                        </div>
                        <?php
                       
                        if(!empty($punch_log)){
                            foreach ($punch_log as $punch_val) {

                                if(!empty($punch_val->break_status) && $punch_val->break_status == 'OUT'){
                                    $break_in =  date('h:i A', strtotime($punch_val->break_in));
                                    $break_out =  date('h:i A', strtotime($punch_val->break_out));
                                ?>
                                    <div class="timeline_item">
                                        <img class="tl_avatar" src="<?php echo base_url('template/'); ?>employee/assets/images/avatar1.jpg" alt="fake_url" /><span>Break In at</span><br />
                                        <span><i class="fa fa-clock-o"></i> <?php echo $break_in;  ?> </span>
                                    </div>
                                    <div class="timeline_item">
                                        <img class="tl_avatar" src="<?php echo base_url('template/'); ?>employee/assets/images/avatar1.jpg" alt="fake_url" /><span>Break out at</span><br />
                                        <span><i class="fa fa-clock-o"></i> <?php echo $break_out;  ?> </span>
                                    </div>
                                <?php
                                }

                                if(!empty($punch_val->break_status) && $punch_val->break_status == 'IN'){
                                    $break_in =  date('h:i A', strtotime($punch_val->break_in));
                                ?>
                                    <div class="timeline_item">
                                        <img class="tl_avatar" src="<?php echo base_url('template/'); ?>employee/assets/images/avatar1.jpg" alt="fake_url" /><span>Break In at</span><br />
                                        <span><i class="fa fa-clock-o"></i> <?php echo $break_in;  ?> </span>
                                    </div>
                                <?php
                                }

                                if(!empty($punch_val->break_in) && empty($punch_val->break_out) && empty($punch_val->break_status)){
                                    $start_time = date('h:i A', strtotime($punch_val->break_in));
                                ?>
                                    <div class="timeline_item">
                                        <img class="tl_avatar" src="<?php echo base_url('template/'); ?>employee/assets/images/avatar1.jpg" alt="fake_url" /><span>Punch Out at</span><br />
                                        <span><i class="fa fa-clock-o"></i> <?php echo $start_time; ?> </span>
                                    </div>
                                <?php
                                }

                            }
                        }
                        ?>
                       
                    </div>
                    <?php 
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <h3 class="card-title">Punching Log List</h3>
                                <div><a  href="<?php echo base_url('employee/employee/regularization'); ?>" title="Regularization" class="btn btn-primary text-right mr-2">Attendance Regularization</a>  <a href="<?php echo base_url('employee/employee/my-manaul-log'); ?>" title="Regularization list" class="btn btn-primary text-left">Regularization Report</a>
                                </div>
                            </div>
                        </div>
                    </div>
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
                
                <div class="table-responsive">
                    <table class="table table-striped custom-table mb-0 punch_log ">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Date</th>
                                <th>Punch In</th>
                                <th>Punch Out</th>
                                <th>Hours</th>
                                <th>Break Time</th>
                                <!-- <th>Manual Log</th> -->
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if(!empty($log)){
                                $sno = 1;
                                foreach ($log as $pkey => $log_val) {
                                    $punch_date = (!empty($log_val['punch_date']) ? date('j M Y', strtotime($log_val['punch_date'])) : '' );
                                     $punchIn = (!empty($log_val['punch_in']) ? $log_val['punch_in'] : '' );
                                    $punchOut = (!empty($log_val['punch_out']) ? $log_val['punch_out'] : 'Missed punch-out' );
                                    $hour = (!empty($log_val['hours']) ? $log_val['hours'] : '0' );
                                    $break_time = (!empty($log_val['break_time']) ? $log_val['break_time'] : '0' );

                                  /* $manual_log = (($log_val['manual_log'] =='Yes') ? "Yes" : (($log_val['manual_log'] =='Approved') ? "Approved" : "") );*/
                                   $manual_log = (($log_val['manual_log'] =='Yes') ? "Yes" : (($log_val['manual_log'] =='Approved') ? "Approved" : (($log_val['manual_log'] =='Pending') ? "Pending" : '')) );

                                   /* $manual_log = ($log_val['manual_log'] =='Yes' ? $log_val['manual_log'] : '');*/

                                    $url = base_url('employee/employee/regularization/').encode($pkey);
                                    $apply_leave = base_url('employee/employee/apply_leave_regularization/').encode($pkey); 
                                    ?>
                                    <tr>
                                        <td><?php echo $sno; ?></td>
                                        <td><?php echo $punch_date; ?></td>
                                        <td><?php echo $punchIn; ?></td>
                                        <td><?php echo $punchOut; ?></td>
                                        <td><?php echo $hour; ?></td>
                                        <td><?php echo $break_time; ?></td>
                                        <!-- <td><?php echo $manual_log; ?></td> -->
                                        <td style="padding-right: 0px;">
                                        <?php
                                       
                                        if($log_val['punch_status2'] == 'IN'){
                                            if($log_val['manual_log'] == 'Pending'){
                                            echo'<b class="text-info"> Pending</b>';

                                            }else{
                                            ?>
                                            <button type="button" id="view_info" class="btn btn-primary" title="Reason" data-toggle="modal" data-target="#myModal">View</button>

                                            <a href="<?php echo $url; ?>" title="Regularize" class="btn btn-primary mt-1">Regularize</a>
                                            <a href="<?php echo $apply_leave; ?>" title="Regularize" class="btn btn-primary mt-1">Apply leave</a>
                                            <?php
                                            }
                                        }else if($log_val['punch_status2'] == 'OUT'){
                                            if($log_val['manual_log'] == 'Approved'){
                                                echo'<b class=""> Approved</b>';
                                            }
                                            if($log_val['manual_log'] == 'No'){
                                                echo'<b class=""> NA</b>';
                                            }
                                        }
                                        ?>
                                        </td>
                                    </tr>
                                    <?php
                                $sno++;
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- <ul class="pagination mt-2">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul> -->
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
                <p>Sorry, you forgot to punch out to corresponding day so please contact to your head or apply regularization for corresponding day</p>
                <!-- innserhtml -->
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('.punch_log').DataTable({
            "bPaginate": true,
            "pageLength": 50,
            "bLengthChange": true,
            "bFilter": true,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": false,
            "processing": false,
            "serverSide": false,
            "stateSave": false,
           
            /*"order": [[2,"asc"]],*/
             "columnDefs": [ { "targets": [0,-1], "bSortable": false } ],
        });
    });
   $(document).ready(function(){
         $(".punch .punch_in").on("click", function(){
            var status = $(this).attr('status');
            //alert(status);
            $.ajax({
                url: "<?php echo base_url('employee/employeepunching/punchIn'); ?>",
                type: "POST",
                data: {
                    punching_status: status,
                },
                dataType: 'json',
                success: function (data) 
                {
                   if(data.isSuccess == true && data.status == '2'){
                        // enable punchout
                        $('.punchout_button').addClass('d-block');
                        $('.punchout_button').removeClass('d-none');
                        $('.punchin_button').addClass('d-none');
                        $('.punchin_button').removeClass('d-block');
                       
                    }else{
                       // enable punch in
                        $('.punchin_button').addClass('d-block');
                        $('.punchin_button').removeClass('d-none');
                        $('.punchout_button').addClass('d-none');
                        $('.punchout_button').removeClass('d-block');
                        
                    }
                  console.log(data)
                    //$("#get_state_list").html(jsonStr);
                }
            });  
      });

        /* Open model */
        $("#view_info").click(function(){
            $('#view_emp_record').modal('show');
        });
});
</script>
<style type="text/css">
    .dataTables_wrapper .dataTables_paginate .paginate_button.current, .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
    color: #fff !important;
    }
    .card-body.acitivity_section {
    max-height: 350px;
    overflow: auto;
}
.card-body.acitivity_section::-webkit-scrollbar {
    width: 7px;
    height: 12px;
    transition: .3s background
}

.card-body.acitivity_section::-webkit-scrollbar-thumb {
    background: #adadad;
}

.card-body.acitivity_section:hover::-webkit-scrollbar-thumb {
    background: #adadad;
}
</style>
