<div class="section-body mt-3">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Notification</h3>
                    </div>
                    <div class="card-body">
                        <?php
                        if(!empty($upcoming_event)){
                            foreach ($upcoming_event as $event_val) {
                            ?>
                            <div class="timeline_item">
                                <img class="tl_avatar" src="<?php echo base_url('template/'); ?>employee/assets/images/avatar1.jpg" alt="fake_url" />
                                <span><?php echo $event_val->title ?><small class="float-right text-right"> <b>Start Event</b>: <?php echo monthInfo($event_val->start); ?> <?php echo date('h:i:s A', strtotime($event_val->start)); ?>, <b>End Event</b>: <?php echo monthInfo($event_val->start); ?> <?php echo date('h:i:s A', strtotime($event_val->end)); ?> </small></span>
                            </div>
                            <?php
                            }
                        }
                        ?>
                        
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
                <h5 class="modal-title" id="exampleModalLabel">Add Departments</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row clearfix">
                    <div class="col-md-4 col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Employee ID" />
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Name" />
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Email ID" />
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="form-group">
                            <input type="number" class="form-control" placeholder="Phone Number" />
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="form-group">
                            <input type="text" data-provide="datepicker" data-date-autoclose="true" class="form-control" placeholder="Start date *" />
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Role" />
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group mt-2 mb-3">
                            <input type="file" class="dropify" />
                            <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Facebook" />
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Twitter" />
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Linkedin" />
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="instagram" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
