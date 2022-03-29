<div class="section-body">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center">
            <ul class="nav nav-tabs page-header-tab">
                <li class="nav-item"><a class="nav-link active" id="Accounts-tab" data-toggle="tab" href="#Accounts-Invoices">Invoices</a></li>
                <li class="nav-item"><a class="nav-link" id="Accounts-tab" data-toggle="tab" href="#Accounts-Payments">Payments</a></li>
                <li class="nav-item"><a class="nav-link" id="Accounts-tab" data-toggle="tab" href="#Accounts-Expenses">Expenses</a></li>
            </ul>
            <div class="header-action">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fe fe-plus mr-2"></i>Create Invoice</button>
            </div>
        </div>
    </div>
</div>
<div class="section-body mt-3">
    <div class="container-fluid">
        <div class="tab-content mt-3">
            <div class="tab-pane fade show active" id="Accounts-Invoices" role="tabpanel">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div>Total Accounts</div>
                                <div class="py-4 m-0 text-center h1 text-success counter1 counter">78</div>
                                <div class="d-flex">
                                    <small class="text-muted">This years</small>
                                    <div class="ml-auto"><i class="fa fa-caret-up text-success"></i>4%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div>New Account</div>
                                <div class="py-4 m-0 text-center h1 text-info counter counter1">29</div>
                                <div class="d-flex">
                                    <small class="text-muted">This years</small>
                                    <div class="ml-auto"><i class="fa fa-caret-up text-success"></i>13%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Invoices</h3>
                        <div class="card-options">
                            <form>
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-sm" placeholder="Search something..." name="s" />
                                    <span class="input-group-btn ml-2">
                                        <button class="btn btn-icon btn-sm" type="submit"><span class="fe fe-search"></span></button>
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
                                        <th>Invoice No.</th>
                                        <th>Clients</th>
                                        <th>Date</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th class="w100">Amount</th>
                                        <th class="w150">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#LA-5218</td>
                                        <td>vPro tec LLC.</td>
                                        <td>07 March, 2018</td>
                                        <td><i class="payment payment-cirrus" data-toggle="tooltip" title="" data-original-title="payment payment-cirrus"></i></td>
                                        <td><span class="tag tag-success">Approved</span></td>
                                        <td>$4,205</td>
                                        <td>
                                            <button type="button" class="btn btn-icon btn-sm btn-sm" title="Send Invoice" data-toggle="tooltip" data-placement="top"><i class="icon-envelope text-info"></i></button>
                                            <button type="button" class="btn btn-icon btn-sm" title="Print" data-toggle="tooltip" data-placement="top"><i class="icon-printer"></i></button>
                                            <button type="button" class="btn btn-icon btn-sm" title="Delete" data-toggle="tooltip" data-placement="top"><i class="icon-trash text-danger"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#LA-1212</td>
                                        <td>BT Technology</td>
                                        <td>25 Jun, 2018</td>
                                        <td><i class="payment payment-bitcoin" data-toggle="tooltip" title="" data-original-title="payment payment-bitcoin"></i></td>
                                        <td><span class="tag tag-warning">Pending</span></td>
                                        <td>$5,205</td>
                                        <td>
                                            <button type="button" class="btn btn-icon btn-sm" title="Send Invoice" data-toggle="tooltip" data-placement="top"><i class="icon-envelope text-info"></i></button>
                                            <button type="button" class="btn btn-icon btn-sm" title="Print" data-toggle="tooltip" data-placement="top"><i class="icon-printer"></i></button>
                                            <button type="button" class="btn btn-icon btn-sm" title="Delete" data-toggle="tooltip" data-placement="top"><i class="icon-trash text-danger"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#LA-0222</td>
                                        <td>More Infoweb Pvt.</td>
                                        <td>12 July, 2018</td>
                                        <td><i class="payment payment-paypal" data-toggle="tooltip" title="" data-original-title="payment payment-paypal"></i></td>
                                        <td><span class="tag tag-warning">Pending</span></td>
                                        <td>$2,000</td>
                                        <td>
                                            <button type="button" class="btn btn-icon btn-sm" title="Send Invoice" data-toggle="tooltip" data-placement="top"><i class="icon-envelope text-info"></i></button>
                                            <button type="button" class="btn btn-icon btn-sm" title="Print" data-toggle="tooltip" data-placement="top"><i class="icon-printer"></i></button>
                                            <button type="button" class="btn btn-icon btn-sm" title="Delete" data-toggle="tooltip" data-placement="top"><i class="icon-trash text-danger"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#LA-0312</td>
                                        <td>RETO Tech LLC.</td>
                                        <td>13 July, 2018</td>
                                        <td><i class="payment payment-paypal" data-toggle="tooltip" title="" data-original-title="payment payment-paypal"></i></td>
                                        <td><span class="tag tag-success">Approved</span></td>
                                        <td>$10,000</td>
                                        <td>
                                            <button type="button" class="btn btn-icon btn-sm" title="Send Invoice" data-toggle="tooltip" data-placement="top"><i class="icon-envelope text-info"></i></button>
                                            <button type="button" class="btn btn-icon btn-sm" title="Print" data-toggle="tooltip" data-placement="top"><i class="icon-printer"></i></button>
                                            <button type="button" class="btn btn-icon btn-sm" title="Delete" data-toggle="tooltip" data-placement="top"><i class="icon-trash text-danger"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#LA-5656</td>
                                        <td>SDRAPP Pvt.</td>
                                        <td>27 July, 2018</td>
                                        <td><i class="payment payment-visa-dark" data-toggle="tooltip" title="" data-original-title="payment payment-visa-dark"></i></td>
                                        <td><span class="tag tag-success">Approved</span></td>
                                        <td>$1,205</td>
                                        <td>
                                            <button type="button" class="btn btn-icon btn-sm" title="Send Invoice" data-toggle="tooltip" data-placement="top"><i class="icon-envelope text-info"></i></button>
                                            <button type="button" class="btn btn-icon btn-sm" title="Print" data-toggle="tooltip" data-placement="top"><i class="icon-printer"></i></button>
                                            <button type="button" class="btn btn-icon btn-sm" title="Delete" data-toggle="tooltip" data-placement="top"><i class="icon-trash text-danger"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#LA-4515</td>
                                        <td>Kdash Infoweb LLC.</td>
                                        <td>07 March, 2018</td>
                                        <td><i class="payment payment-paypal" data-toggle="tooltip" title="" data-original-title="payment payment-paypal"></i></td>
                                        <td><span class="tag tag-success">Approved</span></td>
                                        <td>$4,205</td>
                                        <td>
                                            <button type="button" class="btn btn-icon btn-sm" title="Send Invoice" data-toggle="tooltip" data-placement="top"><i class="icon-envelope text-info"></i></button>
                                            <button type="button" class="btn btn-icon btn-sm" title="Print" data-toggle="tooltip" data-placement="top"><i class="icon-printer"></i></button>
                                            <button type="button" class="btn btn-icon btn-sm" title="Delete" data-toggle="tooltip" data-placement="top"><i class="icon-trash text-danger"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#LA-1212</td>
                                        <td>BT Technology</td>
                                        <td>25 Jun, 2018</td>
                                        <td><i class="payment payment-bitcoin" data-toggle="tooltip" title="" data-original-title="payment payment-bitcoin"></i></td>
                                        <td><span class="tag tag-warning">Pending</span></td>
                                        <td>$5,205</td>
                                        <td>
                                            <button type="button" class="btn btn-icon btn-sm" title="Send Invoice" data-toggle="tooltip" data-placement="top"><i class="icon-envelope text-info"></i></button>
                                            <button type="button" class="btn btn-icon btn-sm" title="Print" data-toggle="tooltip" data-placement="top"><i class="icon-printer"></i></button>
                                            <button type="button" class="btn btn-icon btn-sm" title="Delete" data-toggle="tooltip" data-placement="top"><i class="icon-trash text-danger"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#LA-0222</td>
                                        <td>More Infoweb Pvt.</td>
                                        <td>12 July, 2018</td>
                                        <td><i class="payment payment-paypal" data-toggle="tooltip" title="" data-original-title="payment payment-paypal"></i></td>
                                        <td><span class="tag tag-warning">Pending</span></td>
                                        <td>$2,000</td>
                                        <td>
                                            <button type="button" class="btn btn-icon btn-sm" title="Send Invoice" data-toggle="tooltip" data-placement="top"><i class="icon-envelope text-info"></i></button>
                                            <button type="button" class="btn btn-icon btn-sm" title="Print" data-toggle="tooltip" data-placement="top"><i class="icon-printer"></i></button>
                                            <button type="button" class="btn btn-icon btn-sm" title="Delete" data-toggle="tooltip" data-placement="top"><i class="icon-trash text-danger"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#LA-7845</td>
                                        <td>BT infoweb</td>
                                        <td>25 Jun, 2018</td>
                                        <td><i class="payment payment-bitcoin" data-toggle="tooltip" title="" data-original-title="payment payment-bitcoin"></i></td>
                                        <td><span class="tag tag-warning">Pending</span></td>
                                        <td>$5,205</td>
                                        <td>
                                            <button type="button" class="btn btn-icon btn-sm" title="Send Invoice" data-toggle="tooltip" data-placement="top"><i class="icon-envelope text-info"></i></button>
                                            <button type="button" class="btn btn-icon btn-sm" title="Print" data-toggle="tooltip" data-placement="top"><i class="icon-printer"></i></button>
                                            <button type="button" class="btn btn-icon btn-sm" title="Delete" data-toggle="tooltip" data-placement="top"><i class="icon-trash text-danger"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#LA-5656</td>
                                        <td>SDRAPP Pvt.</td>
                                        <td>27 July, 2018</td>
                                        <td><i class="payment payment-visa-dark" data-toggle="tooltip" title="" data-original-title="payment payment-visa-dark"></i></td>
                                        <td><span class="tag tag-success">Approved</span></td>
                                        <td>$1,205</td>
                                        <td>
                                            <button type="button" class="btn btn-icon btn-sm" title="Send Invoice" data-toggle="tooltip" data-placement="top"><i class="icon-envelope text-info"></i></button>
                                            <button type="button" class="btn btn-icon btn-sm" title="Print" data-toggle="tooltip" data-placement="top"><i class="icon-printer"></i></button>
                                            <button type="button" class="btn btn-icon btn-sm" title="Delete" data-toggle="tooltip" data-placement="top"><i class="icon-trash text-danger"></i></button>
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
            <div class="tab-pane fade" id="Accounts-Payments" role="tabpanel">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive invoice_list">
                            <table class="table table-hover table-striped table-vcenter">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Clients Name</th>
                                        <th>Project Name</th>
                                        <th>Date</th>
                                        <th>Type</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>MP 4515</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="<?php echo base_url('template/'); ?>employer/assets/images/xs/avatar1.jpg" data-toggle="tooltip" data-placement="top" title="Avatar Name" alt="Avatar" class="w35 h35 rounded" />
                                                <div class="ml-3">
                                                    <a href="javascript:void(0)" title="">Zoe Baker</a>
                                                    <p class="mb-0"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="403a2f256e22212b2532002538212d302c256e232f2d">[email&#160;protected]</a></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>UPlo - Bootstrap 4</td>
                                        <td>07 March, 2018</td>
                                        <td><i class="payment payment-paypal" data-toggle="tooltip" title="" data-original-title="payment payment-paypal"></i></td>
                                        <td>$4,205</td>
                                    </tr>
                                    <tr>
                                        <td>LK 1515</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="<?php echo base_url('template/'); ?>employer/assets/images/xs/avatar2.jpg" data-toggle="tooltip" data-placement="top" title="Avatar Name" alt="Avatar" class="w35 h35 rounded" />
                                                <div class="ml-3">
                                                    <a href="javascript:void(0)" title="">South Shyanne</a>
                                                    <p class="mb-0">
                                                        <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="c0b3afb5b4a8eeb3a8b9a1aeaea580a5b8a1adb0aca5eea3afad">[email&#160;protected]</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Tito Wordpress</td>
                                        <td>25 Jun, 2018</td>
                                        <td><i class="payment payment-visa-dark" data-toggle="tooltip" title="" data-original-title="payment payment-visa-dark"></i></td>
                                        <td>$5,205</td>
                                    </tr>
                                    <tr>
                                        <td>SS 6323</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="<?php echo base_url('template/'); ?>employer/assets/images/xs/avatar3.jpg" data-toggle="tooltip" data-placement="top" title="Avatar Name" alt="Avatar" class="w35 h35 rounded" />
                                                <div class="ml-3">
                                                    <a href="javascript:void(0)" title="">South Shyanne</a>
                                                    <p class="mb-0">
                                                        <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="7c0f13090814520f14051d1212193c19041d110c1019521f1311">[email&#160;protected]</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Hotel Management</td>
                                        <td>12 July, 2018</td>
                                        <td><i class="payment payment-visa-dark" data-toggle="tooltip" title="" data-original-title="payment payment-visa-dark"></i></td>
                                        <td>$2,000</td>
                                    </tr>
                                    <tr>
                                        <td>PQ 8585</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="<?php echo base_url('template/'); ?>employer/assets/images/xs/avatar4.jpg" data-toggle="tooltip" data-placement="top" title="Avatar Name" alt="Avatar" class="w35 h35 rounded" />
                                                <div class="ml-3">
                                                    <a href="javascript:void(0)" title="">Zoe Baker</a>
                                                    <p class="mb-0"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="a6dcc9c388c4c7cdc3d4e6c3dec7cbd6cac388c5c9cb">[email&#160;protected]</a></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Bootstrap 4 Angular5 Admin</td>
                                        <td>13 July, 2018</td>
                                        <td><i class="payment payment-visa-dark" data-toggle="tooltip" title="" data-original-title="payment payment-visa-dark"></i></td>
                                        <td>$10,000</td>
                                    </tr>
                                    <tr>
                                        <td>WD 4455</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="<?php echo base_url('template/'); ?>employer/assets/images/xs/avatar5.jpg" data-toggle="tooltip" data-placement="top" title="Avatar Name" alt="Avatar" class="w35 h35 rounded" />
                                                <div class="ml-3">
                                                    <a href="javascript:void(0)" title="">Zoe Baker</a>
                                                    <p class="mb-0"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="fb81949ed5999a909e89bb9e839a968b979ed5989496">[email&#160;protected]</a></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Angular Dashboard</td>
                                        <td>27 July, 2018</td>
                                        <td><i class="payment payment-visa-dark" data-toggle="tooltip" title="" data-original-title="payment payment-visa-dark"></i></td>
                                        <td>$1,205</td>
                                    </tr>
                                    <tr>
                                        <td>MP 4515</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="<?php echo base_url('template/'); ?>employer/assets/images/xs/avatar6.jpg" data-toggle="tooltip" data-placement="top" title="Avatar Name" alt="Avatar" class="w35 h35 rounded" />
                                                <div class="ml-3">
                                                    <a href="javascript:void(0)" title="">Zoe Baker</a>
                                                    <p class="mb-0"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="f08a9f95de92919b9582b09588919d809c95de939f9d">[email&#160;protected]</a></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>UPlo - Bootstrap 4</td>
                                        <td>07 March, 2018</td>
                                        <td><i class="payment payment-paypal" data-toggle="tooltip" title="" data-original-title="payment payment-paypal"></i></td>
                                        <td>$4,205</td>
                                    </tr>
                                    <tr>
                                        <td>LK 1515</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="<?php echo base_url('template/'); ?>employer/assets/images/xs/avatar7.jpg" data-toggle="tooltip" data-placement="top" title="Avatar Name" alt="Avatar" class="w35 h35 rounded" />
                                                <div class="ml-3">
                                                    <a href="javascript:void(0)" title="">South Shyanne</a>
                                                    <p class="mb-0">
                                                        <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="a9dac6dcddc187dac1d0c8c7c7cce9ccd1c8c4d9c5cc87cac6c4">[email&#160;protected]</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Tito Wordpress</td>
                                        <td>25 Jun, 2018</td>
                                        <td><i class="payment payment-visa-dark" data-toggle="tooltip" title="" data-original-title="payment payment-visa-dark"></i></td>
                                        <td>$5,205</td>
                                    </tr>
                                    <tr>
                                        <td>SS 6323</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="<?php echo base_url('template/'); ?>employer/assets/images/xs/avatar8.jpg" data-toggle="tooltip" data-placement="top" title="Avatar Name" alt="Avatar" class="w35 h35 rounded" />
                                                <div class="ml-3">
                                                    <a href="javascript:void(0)" title="">South Shyanne</a>
                                                    <p class="mb-0">
                                                        <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="10637f6564783e637869717e7e75507568717d607c753e737f7d">[email&#160;protected]</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Hotel Management</td>
                                        <td>12 July, 2018</td>
                                        <td><i class="payment payment-visa-dark" data-toggle="tooltip" title="" data-original-title="payment payment-visa-dark"></i></td>
                                        <td>$2,000</td>
                                    </tr>
                                    <tr>
                                        <td>PQ 8585</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="<?php echo base_url('template/'); ?>employer/assets/images/xs/avatar1.jpg" data-toggle="tooltip" data-placement="top" title="Avatar Name" alt="Avatar" class="w35 h35 rounded" />
                                                <div class="ml-3">
                                                    <a href="javascript:void(0)" title="">Zoe Baker</a>
                                                    <p class="mb-0"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="3f45505a115d5e545a4d7f5a475e524f535a115c5052">[email&#160;protected]</a></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Bootstrap 4 Angular5 Admin</td>
                                        <td>13 July, 2018</td>
                                        <td><i class="payment payment-visa-dark" data-toggle="tooltip" title="" data-original-title="payment payment-visa-dark"></i></td>
                                        <td>$10,000</td>
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
            <div class="tab-pane fade" id="Accounts-Expenses" role="tabpanel">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped table-vcenter mb-0">
                                <thead>
                                    <tr>
                                        <th>Item</th>
                                        <th>Order by</th>
                                        <th>From</th>
                                        <th>Date</th>
                                        <th>Paid By</th>
                                        <th>Status</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>HP Laptop</td>
                                        <td>Marshall Nichols</td>
                                        <td>Paytem</td>
                                        <td>07 March, 2018</td>
                                        <td><i class="payment payment-paypal" data-toggle="tooltip" title="" data-original-title="payment payment-paypal"></i></td>
                                        <td><span class="tag tag-warning">Pending</span></td>
                                        <td>$205</td>
                                    </tr>
                                    <tr>
                                        <td>iMack Desktop</td>
                                        <td>Marshall Nichols</td>
                                        <td>ebay USA</td>
                                        <td>22 July, 2017</td>
                                        <td><i class="payment payment-paypal" data-toggle="tooltip" title="" data-original-title="payment payment-paypal"></i></td>
                                        <td><span class="tag tag-warning">Pending</span></td>
                                        <td>$355</td>
                                    </tr>
                                    <tr>
                                        <td>Logitech USB Mouse, Keyboard</td>
                                        <td>Marshall Nichols</td>
                                        <td>Amazon</td>
                                        <td>28 July, 2018</td>
                                        <td><i class="payment payment-paypal" data-toggle="tooltip" title="" data-original-title="payment payment-paypal"></i></td>
                                        <td><span class="tag tag-success">Approved</span></td>
                                        <td>$40</td>
                                    </tr>
                                    <tr>
                                        <td>MacBook Pro Air</td>
                                        <td>Debra Stewart</td>
                                        <td>Amazon</td>
                                        <td>17 Jun, 2018</td>
                                        <td><i class="payment payment-mastercard" data-toggle="tooltip" title="" data-original-title="payment payment-mastercard"></i></td>
                                        <td><span class="tag tag-success">Approved</span></td>
                                        <td>$800</td>
                                    </tr>
                                    <tr>
                                        <td>Dell Monitor 28 inch</td>
                                        <td>Ava Alexander</td>
                                        <td>Flipkart UK</td>
                                        <td>21 Jun, 2018</td>
                                        <td><i class="payment payment-paypal" data-toggle="tooltip" title="" data-original-title="payment payment-paypal"></i></td>
                                        <td><span class="tag tag-success">Approved</span></td>
                                        <td>$205</td>
                                    </tr>
                                    <tr>
                                        <td>Logitech USB Mouse, Keyboard</td>
                                        <td>Marshall Nichols</td>
                                        <td>Amazon</td>
                                        <td>28 July, 2018</td>
                                        <td><i class="payment payment-paypal" data-toggle="tooltip" title="" data-original-title="payment payment-paypal"></i></td>
                                        <td><span class="tag tag-success">Approved</span></td>
                                        <td>$40</td>
                                    </tr>
                                    <tr>
                                        <td>MacBook Pro Air</td>
                                        <td>Debra Stewart</td>
                                        <td>Amazon</td>
                                        <td>17 Jun, 2018</td>
                                        <td><i class="payment payment-mastercard" data-toggle="tooltip" title="" data-original-title="payment payment-mastercard"></i></td>
                                        <td><span class="tag tag-success">Approved</span></td>
                                        <td>$800</td>
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
               <h5 class="modal-title" id="exampleModalLabel">Add Today Work details</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           </div>
           <div class="modal-body">
            <form>
               <div class="row">
               <div class="col-md-6">
                     <label class="control-label">Clients</label>
                     <select class="form-control" data-placeholder="Choose a color..." name="category-color">
                        <option value="success">terassa welxer</option>
                        <option value="danger">luies deman</option>
                        <option value="info">other</option>
                     </select>
                  </div>
                  <div class="col-md-6">
                     <label class="control-label">Project</label>
                     <select class="form-control" data-placeholder="Choose a color..." name="category-color">
                        <option value="success">office management</option>
                        <option value="danger">Project management</option>
                        <option value="info">other</option>
                     </select>
                  </div>
                  <div class="col-md-6">
                     <label class="control-label">Cost</label>
                     <input class="form-control" placeholder="Enter name" type="text" name="category-name">
                  </div>
                       
                  <div class="col-md-6">
                     <label class="control-label">Invoice Date</label>
                     <input class="form-control" placeholder="Enter name" type="date" name="category-name">
                  </div>
                  <div class="col-md-6">
                     <label class="control-label">Due Date</label>
                     <input class="form-control" placeholder="Enter name" type="date" name="category-name">
                  </div>
            
                  <div class="col-md-6">
                  <label class="control-label">Billing Address</label>
                     <textarea class="form-control" placeholder="description" type="text" name="category-name"></textarea>
                  </div>
                  <div class="col-md-12">
                  <label class="control-label">Description</label>
                     <textarea class="form-control" placeholder="description" type="text" name="category-name"></textarea>
                  </div>
               </div>
            </form>
         </div>
           <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <button type="button" class="btn btn-primary">Save changes</button>
           </div>
       </div>
   </div>
</div