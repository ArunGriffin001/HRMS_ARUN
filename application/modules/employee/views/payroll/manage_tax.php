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
        <div class="tab-content mt-3">
            <div class="tab-pane fade show active" id="Accounts-Invoices" role="tabpanel">
                <!-- <div class="row clearfix">
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div>Total Accounts</div>
                                <div class="py-4 m-0 text-center h1 text-success counter">78</div>
                                <div class="d-flex">
                                    <small class="text-muted">This years</small>
                                    <div class="ml-auto"><i class="fa fa-caret-up text-success"></i>4%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div>New Account</div>
                                <div class="py-4 m-0 text-center h1 text-info counter">29</div>
                                <div class="d-flex">
                                    <small class="text-muted">This years</small>
                                    <div class="ml-auto"><i class="fa fa-caret-up text-success"></i>13%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div>Total Current A/C</div>
                                <div class="py-4 m-0 text-center h1 text-warning counter">8</div>
                                <div class="d-flex">
                                    <small class="text-muted">This years</small>
                                    <div class="ml-auto"><i class="fa fa-caret-up text-success"></i>3%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div>Total Seving A/C</div>
                                <div class="py-4 m-0 text-center h1 text-danger counter">70</div>
                                <div class="d-flex">
                                    <small class="text-muted">This years</small>
                                    <div class="ml-auto"><i class="fa fa-caret-down text-danger"></i>10%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tax Declarations for tax savings</h3>
                        <div class="card-options">
                            <form>
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-sm" placeholder="Search something..." name="s" />
                                    <span class="input-group-btn ml-2">
                                        <button class="btn btn-icon btn-sm" type="submit"><span class="fa fa-search"></span></button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped table-vcenter">
                                <thead>
                                    <tr>
                                        <th>Tax Name</th>
                                        <th>Tax Percentage (%)</th>
                                        <th>Date</th>

                                        <th>Status</th>
                                        <th class="w100">Amount</th>
                                        <th class="w150">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>GST</td>
                                        <td>12%</td>
                                        <td>07 March, 2018</td>

                                        <td><span class="tag tag-success">Approved</span></td>
                                        <td>$4,205</td>
                                        <td>
                                            <button type="button" class="btn btn-icon btn-sm btn-sm" title="Send Invoice" data-toggle="tooltip" data-placement="top"><i class="fa fa-envelope" aria-hidden="true"></i></button>
                                            <button type="button" class="btn btn-icon btn-sm" title="Print" data-toggle="tooltip" data-placement="top"><i class="fa fa-print" aria-hidden="true"></i></button>
                                            <button type="button" class="btn btn-icon btn-sm" title="Delete" data-toggle="tooltip" data-placement="top"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>VAT</td>
                                        <td>15%</td>
                                        <td>25 Jun, 2018</td>

                                        <td><span class="tag tag-warning">Pending</span></td>
                                        <td>$5,205</td>
                                        <td>
                                            <button type="button" class="btn btn-icon btn-sm" title="Send Invoice" data-toggle="tooltip" data-placement="top"><i class="fa fa-envelope" aria-hidden="true"></i></button>
                                            <button type="button" class="btn btn-icon btn-sm" title="Print" data-toggle="tooltip" data-placement="top"><i class="fa fa-print" aria-hidden="true"></i></button>
                                            <button type="button" class="btn btn-icon btn-sm" title="Delete" data-toggle="tooltip" data-placement="top"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Income tax</td>
                                        <td>13%</td>
                                        <td>12 July, 2018</td>

                                        <td><span class="tag tag-warning">Pending</span></td>
                                        <td>$2,000</td>
                                        <td>
                                            <button type="button" class="btn btn-icon btn-sm" title="Send Invoice" data-toggle="tooltip" data-placement="top"><i class="fa fa-envelope" aria-hidden="true"></i></button>
                                            <button type="button" class="btn btn-icon btn-sm" title="Print" data-toggle="tooltip" data-placement="top"><i class="fa fa-print" aria-hidden="true"></i></button>
                                            <button type="button" class="btn btn-icon btn-sm" title="Delete" data-toggle="tooltip" data-placement="top"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <nav aria-label="Page navigation">
                            <ul class="pagination mb-0 justify-content-end">
                                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
