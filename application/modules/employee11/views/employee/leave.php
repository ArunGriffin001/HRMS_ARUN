<div class="section-body">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center">
            <!-- <ul class="nav nav-tabs page-header-tab">
                        <li class="nav-item"><a class="nav-link active" id="user-tab" data-toggle="tab" href="#user-list">List</a></li>
                        <li class="nav-item"><a class="nav-link" id="user-tab" data-toggle="tab" href="#user-add">Add New</a></li>
                     </ul> -->
            <div class="header-action">
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus mr-2"></i>Add Leave</button>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-body w_sparkline">
                        <div class="details">
                            <span>vacation leave</span>
                            <h3 class="mb-0 counter">12</h3>
                        </div>
                        <div class="w_chart">
                            <span id="mini-bar-chart1" class="mini-bar-chart"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-body w_sparkline">
                        <div class="details">
                            <span>Emergency Leave</span>
                            <h3 class="mb-0 counter">3</h3>
                        </div>
                        <div class="w_chart">
                            <span id="mini-bar-chart2" class="mini-bar-chart"></span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="col-lg-3 col-md-6">
                        <div class="card">
                           <div class="card-body w_sparkline">
                              <div class="details">
                                 <span>Other Leave</span>
                                 <h3 class="mb-0 counter">4</h3>
                              </div>
                              <div class="w_chart">
                                 <span id="mini-bar-chart3" class="mini-bar-chart"></span>
                              </div>
                           </div>
                        </div>
                     </div> -->
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-body w_sparkline">
                        <div class="details">
                            <span>Remaining Leave</span>
                            <h3 class="mb-0 counter"></h3>
                        </div>
                        <div class="w_chart">
                            <span id="mini-bar-chart4" class="mini-bar-chart"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section-body">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-vcenter text-nowrap mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Employee ID</th>
                                <th>Leave Type</th>
                                <th>Date</th>
                                <th>Reason</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="width45">
                                    <span class="avatar avatar-orange" data-toggle="tooltip" title="Avatar Name">DB</span>
                                </td>
                                <td>
                                    <div class="font-15">Marshall Nichols</div>
                                </td>
                                <td><span>LA-8150</span></td>
                                <td><span>Casual Leave</span></td>
                                <td>24 July, 2019 to 26 July, 2019</td>
                                <td>Going to Family Function</td>
                                <td>
                                    <button type="button" class="btn btn-icon btn-sm" title="Approved"><i class="fa fa-check"></i></button>
                                    <button type="button" class="btn btn-icon btn-sm js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td class="width45">
                                    <span class="avatar avatar-pink" data-toggle="tooltip" title="Avatar Name">GC</span>
                                </td>
                                <td>
                                    <div class="font-15">Gary Camara</div>
                                </td>
                                <td><span>LA-8795</span></td>
                                <td><span>Medical Leave</span></td>
                                <td>20 July, 2019 to 26 July, 2019</td>
                                <td>Going to Development</td>
                                <td>
                                    <button type="button" class="btn btn-icon btn-sm" title="Approved"><i class="fa fa-check"></i></button>
                                    <button type="button" class="btn btn-icon btn-sm js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td class="width45">
                                    <img class="avatar" src="<?php echo base_url('template/'); ?>employee/assets/images/xs/avatar1.jpg" data-toggle="tooltip" title="Avatar Name" />
                                </td>
                                <td>
                                    <div class="font-15">Maryam Amiri</div>
                                </td>
                                <td><span>LA-0258</span></td>
                                <td><span>Maternity Leave</span></td>
                                <td>21 July, 2019 to 26 July, 2019</td>
                                <td>Attend Birthday party</td>
                                <td>
                                    <button type="button" class="btn btn-icon btn-sm" title="Approved"><i class="fa fa-check"></i></button>
                                    <button type="button" class="btn btn-icon btn-sm js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td class="width45">
                                    <img class="avatar" src="<?php echo base_url('template/'); ?>employee/assets/images/xs/avatar2.jpg" data-toggle="tooltip" title="Avatar Name" />
                                </td>
                                <td>
                                    <div class="font-15">Frank Camly</div>
                                </td>
                                <td><span>LA-1515</span></td>
                                <td><span>Paternity Leave</span></td>
                                <td>11 Aug, 2019 to 21 Aug, 2019</td>
                                <td>Going to Holiday</td>
                                <td>
                                    <button type="button" class="btn btn-icon btn-sm" title="Approved"><i class="fa fa-check"></i></button>
                                    <button type="button" class="btn btn-icon btn-sm js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td class="width45">
                                    <img class="avatar" src="<?php echo base_url('template/'); ?>employee/assets/images/xs/avatar2.jpg" data-toggle="tooltip" title="Avatar Name" />
                                </td>
                                <td>
                                    <div class="font-15">Frank Camly</div>
                                </td>
                                <td><span>LA-1515</span></td>
                                <td><span>Birthday Leave</span></td>
                                <td>11 Aug, 2019 to 21 Aug, 2019</td>
                                <td>Going to Holiday</td>
                                <td>
                                    <button type="button" class="btn btn-icon btn-sm" title="Approved"><i class="fa fa-check"></i></button>
                                    <button type="button" class="btn btn-icon btn-sm js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td class="width45">
                                    <img class="avatar" src="<?php echo base_url('template/'); ?>employee/assets/images/xs/avatar2.jpg" data-toggle="tooltip" title="Avatar Name" />
                                </td>
                                <td>
                                    <div class="font-15">Frank Camly</div>
                                </td>
                                <td><span>LA-1515</span></td>
                                <td><span>Anniversary Leaves</span></td>
                                <td>11 Aug, 2019 to 21 Aug, 2019</td>
                                <td>Going to Holiday</td>
                                <td>
                                    <button type="button" class="btn btn-icon btn-sm" title="Approved"><i class="fa fa-check"></i></button>
                                    <button type="button" class="btn btn-icon btn-sm js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o"></i></button>
                                </td>
                            </tr>
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
