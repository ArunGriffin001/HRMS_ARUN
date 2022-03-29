<div class="section-body">
    <!-- <div class="container-fluid">
                  <div class="d-flex justify-content-between align-items-center">
                     <ul class="nav nav-tabs page-header-tab">
                        <li class="nav-item"><a class="nav-link active" id="Accounts-tab" data-toggle="tab" href="#Accounts-Invoices">Invoices</a></li>
                        <li class="nav-item"><a class="nav-link" id="Accounts-tab" data-toggle="tab" href="#Accounts-Payments">Payments</a></li>
                        <li class="nav-item"><a class="nav-link" id="Accounts-tab" data-toggle="tab" href="#Accounts-Expenses">Expenses</a></li>
                     </ul>
                     <div class="header-action">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus mr-2" aria-hidden="true"></i>Add</button>
                     </div>
                  </div>
               </div> -->
</div>
<div class="section-body mt-3">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center">
            <!-- <ul class="nav nav-tabs page-header-tab">
                           <li class="nav-item"><a class="nav-link active" id="user-tab" data-toggle="tab" href="#user-list">List</a></li>
                           <li class="nav-item"><a class="nav-link" id="user-tab" data-toggle="tab" href="#user-add">Add New</a></li>
                        </ul> -->
            <div class="header-action">
                <button type="button" class="btn btn-primary float-right"><i class="fa fa-plus mr-2"></i>Add</button>
            </div>
        </div>
        <div class="tab-content mt-3">
            <div class="tab-pane fade show active" id="user-list" role="tabpanel">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Traniners</h3>
                        <div class="card-options">
                            <form>
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-sm" placeholder="Search something..." name="s" />
                                    <span class="input-group-btn ml-2">
                                        <button class="btn btn-sm btn-default" type="submit"><span class="fa fa-search"></span></button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-vcenter text-nowrap mb-0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Contact number</th>

                                        <th>Email</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <!-- <th class="w100">Action</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <h6 class="mb-0"><span class="avatar avatar-blue" data-toggle="tooltip" data-placement="top" data-original-title="Avatar Name">NG</span> Marshall Nichols</h6>
                                        </td>
                                        <td>9868655454</td>

                                        <td>johndoe@example.com</td>
                                        <td>CEO and Founder</td>

                                        <td><span class="tag tag-danger">Pending</span></td>
                                        <!-- <td>
                                            <button type="button" class="btn btn-icon" title="Edit"><i class="fa fa-edit"></i></button>
                                            <button type="button" class="btn btn-icon js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o text-danger"></i></button>
                                        </td> -->
                                    </tr>
                                    <tr>
                                        <td>
                                            <h6 class="mb-0"><img src="<?php echo base_url('template/'); ?>employee/assets/images/avatar1.jpg" data-toggle="tooltip" data-placement="top" alt="Avatar" class="avatar" data-original-title="Avatar Name" /> Susie Willis</h6>
                                        </td>

                                        <td>9868655454</td>

                                        <td>johndoe@example.com</td>
                                        <td>CEO and Founder</td>

                                        <td><span class="tag tag-danger">Pending</span></td>
                                        <!-- <td>
                                            <button type="button" class="btn btn-icon" title="Edit"><i class="fa fa-edit"></i></button>
                                            <button type="button" class="btn btn-icon js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o text-danger"></i></button>
                                        </td> -->
                                    </tr>
                                    <tr>
                                        <td>
                                            <h6 class="mb-0"><img src="<?php echo base_url('template/'); ?>employee/assets/images/avatar2.jpg" data-toggle="tooltip" data-placement="top" alt="Avatar" class="avatar" data-original-title="Avatar Name" /> Debra Stewart</h6>
                                        </td>

                                        <td>9868655454</td>

                                        <td>johndoe@example.com</td>
                                        <td>CEO and Founder</td>

                                        <td><span class="tag tag-danger">Pending</span></td>
                                        <!-- <td>
                                            <button type="button" class="btn btn-icon" title="Edit"><i class="fa fa-edit"></i></button>
                                            <button type="button" class="btn btn-icon js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o text-danger"></i></button>
                                        </td> -->
                                    </tr>
                                    <tr>
                                        <td>
                                            <h6 class="mb-0"><span class="avatar avatar-green" data-toggle="tooltip" data-placement="top" data-original-title="Avatar Name">KH</span> Erin Gonzales</h6>
                                        </td>

                                        <td>9868655454</td>

                                        <td>johndoe@example.com</td>
                                        <td>CEO and Founder</td>

                                        <td><span class="tag tag-danger">Pending</span></td>
                                        <!-- <td>
                                            <button type="button" class="btn btn-icon" title="Edit"><i class="fa fa-edit"></i></button>
                                            <button type="button" class="btn btn-icon js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o text-danger"></i></button>
                                        </td> -->
                                    </tr>
                                    <tr>
                                        <td>
                                            <h6 class="mb-0"><img src="<?php echo base_url('template/'); ?>employee/assets/images/avatar1.jpg" data-toggle="tooltip" data-placement="top" alt="Avatar" class="avatar" data-original-title="Avatar Name" /> Susie Willis</h6>
                                        </td>

                                        <td>9868655454</td>
                                        <td>johndoe@example.com</td>
                                        <td>CEO and Founder</td>

                                        <td><span class="tag tag-danger">Pending</span></td>
                                        <!-- <td>
                                            <button type="button" class="btn btn-icon" title="Edit"><i class="fa fa-edit"></i></button>
                                            <button type="button" class="btn btn-icon js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o text-danger"></i></button>
                                        </td> -->
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="user-add" role="tabpanel">
                <div class="card">
                    <div class="card-body">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group"><input type="text" class="form-control" placeholder="Employee ID *" /></div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group"><input type="text" class="form-control" placeholder="First Name *" /></div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group"><input type="text" class="form-control" placeholder="Last Name" /></div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group"><input type="text" class="form-control" placeholder="Email ID *" /></div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group"><input type="text" class="form-control" placeholder="Mobile No" /></div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <select class="form-control show-tick">
                                        <option>Select Role Type</option>
                                        <option>Super Admin</option>
                                        <option>Admin</option>
                                        <option>Employee</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group"><input type="text" class="form-control" placeholder="Username *" /></div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group"><input type="text" class="form-control" placeholder="Password" /></div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group"><input type="text" class="form-control" placeholder="Confirm Password" /></div>
                            </div>
                            <div class="col-12">
                                <hr class="mt-4" />
                                <h6>Module Permission</h6>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Read</th>
                                                <th>Write</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Super Admin</td>
                                                <td>
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1" checked="" /><span class="custom-control-label">&nbsp;</span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1" checked="" /><span class="custom-control-label">&nbsp;</span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1" checked="" /><span class="custom-control-label">&nbsp;</span>
                                                    </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Admin</td>
                                                <td>
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1" checked="" /><span class="custom-control-label">&nbsp;</span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1" /><span class="custom-control-label">&nbsp;</span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1" /><span class="custom-control-label">&nbsp;</span>
                                                    </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Employee</td>
                                                <td>
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1" checked="" /><span class="custom-control-label">&nbsp;</span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1" /><span class="custom-control-label">&nbsp;</span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1" /><span class="custom-control-label">&nbsp;</span>
                                                    </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>HR Admin</td>
                                                <td>
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1" checked="" /><span class="custom-control-label">&nbsp;</span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1" checked="" /><span class="custom-control-label">&nbsp;</span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1" checked="" /><span class="custom-control-label">&nbsp;</span>
                                                    </label>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <button type="button" class="btn btn-primary">Add</button><button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit time Sheet</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row clearfix">
                    <div class="col-md-12">
                        <div class="form-group"><input type="text" class="form-control" placeholder="Time" /></div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group"><input type="text" class="form-control" placeholder="Project" /></div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group"><input type="number" class="form-control" placeholder="completion Hours" /></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button><button type="button" class="btn btn-primary">Save changes</button></div>
        </div>
    </div>
</div>
