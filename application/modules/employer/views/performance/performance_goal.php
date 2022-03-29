<div class="header_btn">
    <div class="header-action">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fe fe-plus mr-2"></i>Add</button>
    </div>
</div>
<div class="section-body">
    <div class="container-fluid">
        <div class="tab-content">
            <div class="tab-pane fade show active" id="Employee-list" role="tabpanel">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Mid Year Appraisals</h3>
                        <div class="card-options"></div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Department</th>
                                        <th>Designation</th>
                                        <th>status</th>
                                        <th>Created at</th>
                                        <th>Salary</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>IT</td>
                                        <td>Developer</td>
                                        <td><span class="tag tag-danger">active</span></td>
                                        <td>2011/04/25</td>
                                        <td>$320,800</td>
                                    </tr>
                                    <tr>
                                        <td>Garrett Winters</td>
                                        <td>Account</td>
                                        <td>Oprator</td>
                                        <td><span class="tag tag-danger">active</span></td>
                                        <td>2011/07/25</td>
                                        <td>$170,750</td>
                                    </tr>
                                    <tr>
                                        <td>Ashton Cox</td>
                                        <td>HR</td>
                                        <td>Junir HR</td>
                                        <td><span class="tag tag-danger">active</span></td>
                                        <td>2009/01/12</td>
                                        <td>$86,000</td>
                                    </tr>
                                    <tr>
                                        <td>Cedric Kelly</td>
                                        <td>Admin</td>
                                        <td>Cordinator</td>
                                        <td><span class="tag tag-danger">active</span></td>
                                        <td>2012/03/29</td>
                                        <td>$433,060</td>
                                    </tr>
                                    <tr>
                                        <td>Airi Satou</td>
                                        <td>Account</td>
                                       <td>Oprator</td>
                                        <td><span class="tag tag-info">Inactive</span></td>
                                        <td>2008/11/28</td>
                                        <td>$162,700</td>
                                    </tr>
                                    <tr>
                                        <td>Brielle Williamson</td>
                                        <td>Development</td>
                                        <td>Programmer</td>
                                        <td><span class="tag tag-info">Inactive</span></td>
                                        <td>2012/12/02</td>
                                        <td>$372,000</td>
                                    </tr>
                                    <tr>
                                        <td>Herrod Chandler</td>
                                        <td>Sales</td>
                                        <td>BD</td>
                                        <td><span class="tag tag-info">Inactive</span></td>
                                        <td>2012/08/06</td>
                                        <td>$137,500</td>
                                    </tr>

                                    
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
                <h5 class="modal-title" id="exampleModalLabel">Add</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <select class="form-control">
                                <option value="">Select Department</option>
                                <option value="">Admin</option>
                                <option value="">IT</option>
                                <option value="">Account</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Employee name" />
                        </div>
                    </div>
                   
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Designation" />
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Salary" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</div>
