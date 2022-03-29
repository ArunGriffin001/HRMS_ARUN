<div class="section-body mt-3">
    <div class="container-fluid">
    </div>
</div>
<style type="text/css">
    .cursor_auto{
        cursor: auto;
    }
</style>
<?php
$this->login_data = $this->session->userdata('EmployeeLogin');
$user_info = getEmployeeInfo($this->login_data['userId'],'hs_users_employer','profile_img, dob, joining_date');
$user_profile = (!empty($user_info->profile_img) ? base_url().'/uploads/employer/users/'.$user_info->profile_img : base_url().'uploads/employer/users/default_img.jpg');

?>
<div class="section-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-6 col-lg-12 d-flex">
                <div class="card shadow-sm flex-fill">
                    <div class="card-body recent-activ">
                        <div class="recent-comment">
                            <h4 class="pt-20">Upcoming birthdays</h4>
                            <a href="javascript:void(0)" class="dash-card text-dark cursor_auto">
                                <div class="dash-card-container">
                                    <div class="dash-card-icon text-warning">
                                        <i class="fa fa-birthday-cake" aria-hidden="true"></i>
                                    </div>
                                    <div class="dash-card-content">
                                        <?php 
                                       
                                            $dateofbirth = ( !empty($user_info->dob) ? date('D, jS \\o\\f M', strtotime($user_info->dob)) : 'Date of birth is not available');
                                            
                                        ?>
                                        <h6 class="mb-0"><?php echo $dateofbirth; ?></h6>
                                    </div>
                                    <div class="dash-card-avatars">
                                        <div class="e-avatar"><img class="img-fluid" src="<?php echo $user_profile; ?>" alt="Avatar" /></div>
                                    </div>
                                </div>
                            </a>
                            <hr />
                            <h4 class="pt-20">Work anniversary</h4>
                            <a href="javascript:void(0)" class="dash-card text-dark cursor_auto" >
                                <div class="dash-card-container">
                                    <div class="dash-card-icon text-warning">
                                        <i class="fa fa-birthday-cake" aria-hidden="true"></i>
                                    </div>
                                    <div class="dash-card-content">
                                        <?php 
                                            $dateofjoining = ( !empty($user_info->joining_date) ? date('D, jS \\o\\f M', strtotime($user_info->joining_date)) : 'Date of joinig is not available');
                                            
                                        ?>

                                        <h6 class="mb-0"><?php echo $dateofjoining; ?></h6>
                                    </div>
                                    <div class="dash-card-avatars">
                                        <div class="e-avatar"><img class="img-fluid" src="<?php echo $user_profile; ?>" alt="Avatar" /></div>
                                    </div>
                                </div>
                            </a>
                            <hr />
                            <h4 class="pt-20">Upcoming Event</h4>
                            <!-- <a href="<?php base_url('employee/notification'); ?>" class="dash-card text-dark" > -->
                                <div class="dash-card-container">
                                    <?php 
                                    if(!empty($upcoming_event[0]->start)){
                                    ?>
                                        <div class="dash-card-icon text-warning">
                                            <a href="<?php echo base_url('employee/notification'); ?>"><i class="fa fa-bell" ></i></a>
                                        </div>
                                    
                                    <?php
                                    }
                                    ?>
                                    <div class="dash-card-content">
                                        <?php
                                        if(!empty($upcoming_event[0]->start)){
                                            $event_name =  (!empty($upcoming_event[0]->title) ? $upcoming_event[0]->title : '');
                                            echo '<a href="'.base_url('employee/notification').'"><b>'.$event_name.'</b></a>';
                                        }   
                                        ?>
                                    </div>
                                    <div class="dash-card-avatars">
                                        <div class="e-avatar"><img class="img-fluid" src="<?php echo $user_profile; ?>" alt="Avatar" /></div>
                                    </div>
                                </div>
                            <!-- </a> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Attendance</h3>
                        <div class="d-flex justify-content-between align-items-center view-btn">
                            <a href="<?php echo base_url('employee/employee/attendence'); ?>" class="btn btn-info btn-sm w200 ml-3">View More</a>
                        </div>
                    </div>
                    <div class="punch-det">
                        <h6>Punch In Today</h6>
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
                    </div>
                   <?php
                    
                  /* echo'<pre>';
                   print_r($punch_today);
                   echo'</pre>';*/
                   //$this->session->unset_userdata('punching_data');
               if(!empty($punch_today->punch_status2) && $punch_today->punch_status2 == 'OUT'){
                ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="punch-btn-section" > 
                        <button type="button" class="btn btn-primary punch-btn disabled" >Punch In</button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="punch-btn-section">
                            <button type="button" class="btn btn-secondary punch-btn disabled" >Break In</button>
                        </div>
                    </div>
                     <div class="col-md-6">
                        <div class="punch-btn-section">
                            <button type="button" class="btn btn-secondary punch-btn disabled" >Punch Out</button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="punch-btn-section">
                            <button type="button" class="btn btn-secondary punch-btn disabled" >Break Out</button>
                        </div>
                    </div>
                </div>
                <?php
               }else{
                /*echo '<pre>';
                print_r($punch_today);
                echo'</pre>';*/
                    if(!empty($punch_today) && $punch_today->punch_status == '2'){
                        ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="punch-btn-section">
                                    <button type="button" class="btn btn-secondary punch-btn disabled" >Punch In</button>
                                </div>
                            </div>
                        
                        <?php
                        if(!empty($punch_today->break_status)){
                            if($punch_today->break_status == 'IN'){
                            ?>
                            
                            <div class="col-md-6">
                                <div class="punch-btn-section">
                                    <button type="button" class="btn btn-secondary punch-btn disabled">Break In</button>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="punch-btn-section punchout_button punch">
                                    <button type="button" class="btn btn-info punch-btn punch_in " status="1">Punch Out</button>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="punch-btn-section punchout_button punch">
                                    <button type="button" class="btn btn-primary punch-btn punch_break_in_out" status="2">Break Out</button>
                                </div>
                            </div>
                           
                            <?php
                            }else if($punch_today->break_status == 'OUT'){
                            ?>
                                
                            <div class="col-md-6">
                                <div class="punch-btn-section punchout_button punch">
                                    <button type="button" class="btn btn-primary punch-btn punch_break_in_out" status="1">Break In</button>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="punch-btn-section punchout_button punch">
                                    <button type="button" class="btn btn-info punch-btn punch_in " status="1">Punch Out</button>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="punch-btn-section">
                                    <button type="button" class="btn btn-secondary punch-btn disabled" >Break Out</button>
                                </div>
                            </div>
                                
                            <?php
                            }

                        }else{
                        ?>
                            <div class="col-md-6">
                                <div class="punch-btn-section punchout_button punch">
                                    <button type="button" class="btn btn-primary punch-btn punch_break_in_out" status="1">Break In</button>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="punch-btn-section punchout_button punch">
                                    <button type="button" class="btn btn-info punch-btn punch_in " status="1">Punch Out</button>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="punch-btn-section">
                                    <button type="button" class="btn btn-secondary punch-btn disabled" >Break Out</button>
                                </div>
                            </div>
                        
                        <?php
                        }
                        ?>
                        </div>
                        <?php
                        }else if(!empty($punch_today) && $punch_today->punch_status == '1'){
                        ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="punch-btn-section punchin_button punch" > 
                                    <button type="button" class="btn btn-primary punch-btn punch_in " status="2">Punch In</button>
                                </div>
                            </div>
                        </div>
                        <?php
                        }else{
                            ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="punch-btn-section punchin_button punch" > 
                                        <button type="button" class="btn btn-primary punch-btn punch_in " status="2">Punch In</button>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="punch-btn-section">
                                        <button type="button" class="btn btn-secondary punch-btn disabled" >Break In</button>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="punch-btn-section">
                                        <button type="button" class="btn btn-secondary punch-btn disabled" >Punch Out</button>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="punch-btn-section">
                                        <button type="button" class="btn btn-secondary punch-btn disabled" >Break Out</button>
                                    </div>
                                </div>
                            </div>
                            <?php

                        }
                    }
                        ?>
                    
                    
                    <div class="punch-btn-section">
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
        <div class="row clearfix row-deck">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Leave Record Overview</h3>
                        <div class="d-flex justify-content-between align-items-center view-btn">
                            <a href="<?php echo base_url('employee/employee/leave'); ?>" class="btn btn-info btn-sm w200 ml-3">View More</a>
                        </div>
                    </div>
                    <div class="border-bottom"></div>
                    <div class="card-body text-center">
                        <div class="row">
                            <?php
                            if(!empty($leave_record)){
                                foreach($leave_record as $leave_blance){
                                ?>
                                <div class="col-md-6">
                                    <div class="stats-info">
                                        <h6><?php echo ($leave_blance->leave_cat_name); ?></h6>
                                        <h4><?php echo ($leave_blance->leave_assign_val); ?></h4>
                                    </div>
                                </div>
                                <?php
                                }
                            }
                            ?>
                        </div>
                        <div class="punch-btn-section">
                            <a class="btn btn-primary punch-btn" href="<?php echo base_url('employee/employee/apply_leave'); ?>">Apply leave</a>
                        </div>
                    </div>
                </div>
            </div>
           
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Holidays</h3>
                        <div class="d-flex justify-content-between align-items-center view-btn">
                            <a href="<?php echo base_url('employee/employee/holiday'); ?>" class="btn btn-info btn-sm w200 ml-3">View More</a>
                        </div>
                    </div>

                    <div class="border-bottom"></div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table_custom spacing5 border-style mb-0">
                                        <thead>
                                            <tr>
                                                <th>DAY</th>
                                                <th>DATE</th>
                                                <th>HOLIDAY</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if(!empty($holiday_info)){
                                                $no = 1;
                                                foreach ($holiday_info as $key => $hol_val) {
                                                    $day_name = (!empty($hol_val->day_name) ? $hol_val->day_name : '' );
                                                     $date_info = (!empty($hol_val->holiday_date) ? date('j M, Y', strtotime($hol_val->holiday_date)) : '' );
                                                     $h_details = (!empty($hol_val->holiday_details) ? $hol_val->holiday_details : '' );
                                                    if($no % 2 == 1){
                                                    ?>
                                                    <tr class="bg-yellow">
                                                        <td><span><?php echo $day_name; ?></span></td>
                                                        <td><span><?php echo $date_info; ?></span></td>
                                                        <td><span><?php echo $h_details; ?></span></td>
                                                    </tr>
                                                    <?php
                                                    }else{
                                                    ?>
                                                    <tr class="bg-color">
                                                        <td><span><?php echo $day_name; ?></span></td>
                                                        <td><span><?php echo $date_info; ?></span></td>
                                                        <td><span><?php echo $h_details; ?></span></td>
                                                    </tr>
                                                    <?php
                                                    }
                                                    $no++;
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
            <!-- <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Upcoming Event</h3>
                    </div>

                    <div class="border-bottom"></div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table_custom spacing5 border-style mb-0">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Start Date</th>
                                                <th>End date</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if(!empty($upcoming_event)){
                                                $no = 1;
                                                foreach ($upcoming_event as $key => $event_val) {
                                                    $event_name = (!empty($event_val->title) ? $event_val->title : '' );
                                                     $date_start = (!empty($event_val->start) ? date('j M, Y', strtotime($event_val->start)) : '' );
                                                     $date_end = (!empty($event_val->end) ? date('j M, Y', strtotime($event_val->end)) : '' );
                                                     
                                                    if($no % 2 == 1){
                                                    ?>
                                                    <tr class="bg-secondary">
                                                        <td><span class="text-white"><?php echo $event_name; ?></span></td>
                                                        <td><span class="text-white"><?php echo $date_start; ?></span></td>
                                                        <td><span class="text-white"><?php echo $date_end; ?></span></td>
                                                        
                                                    </tr>
                                                    <?php
                                                    }else{
                                                    ?>
                                                    <tr class="bg-white">
                                                        <td><span><?php echo $event_name; ?></span></td>
                                                        <td><span><?php echo $date_start; ?></span></td>
                                                        <td><span><?php echo $date_end; ?></span></td>
                                                    </tr>
                                                    <?php
                                                    }
                                                    $no++;
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
            </div> -->
        </div>
    </div>
</div>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<script type="text/javascript">
/*$(document).ready(function(){
  $(".punch_in").click(function(){
    alert("The paragraph was clicked.");
  });
});*/
   $(document).ready(function(){
        $(".punch .punch_in").on("click", function(){
            var status = $(this).attr('status');
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
                    location.reload();
                        // enable punchout
                       /* $('.punchout_button').addClass('d-block');
                        $('.punchout_button').removeClass('d-none');
                        $('.punchin_button').addClass('d-none');
                        $('.punchin_button').removeClass('d-block');*/
                       
                    }else{
                    location.reload();
                       // enable punch in
                        /*$('.punchin_button').addClass('d-block');
                        $('.punchin_button').removeClass('d-none');
                        $('.punchout_button').addClass('d-none');
                        $('.punchout_button').removeClass('d-block');*/
                        
                    }
                  console.log(data)
                    //$("#get_state_list").html(jsonStr);
                }
            });  
        });

        /* Manage break in and break out */
        $(".punch .punch_break_in_out").on("click", function(){
            var status = $(this).attr('status');
            $.ajax({
                url: "<?php echo base_url('employee/employeepunching/break-in-out'); ?>",
                type: "POST",
                data: {
                    break_status: status,
                },
                dataType: 'json',
                success: function (data) 
                {
                   if(data.isSuccess == true && data.status == '2'){
                    location.reload();
                        // enable punchout
                       /* $('.punchout_button').addClass('d-block');
                        $('.punchout_button').removeClass('d-none');
                        $('.punchin_button').addClass('d-none');
                        $('.punchin_button').removeClass('d-block');*/
                       
                    }else{
                    location.reload();
                       // enable punch in
                        /*$('.punchin_button').addClass('d-block');
                        $('.punchin_button').removeClass('d-none');
                        $('.punchout_button').addClass('d-none');
                        $('.punchout_button').removeClass('d-block');*/
                        
                    }
                  console.log(data)
                    //$("#get_state_list").html(jsonStr);
                }
            });  
        });
        /* end code */
    });
</script>


