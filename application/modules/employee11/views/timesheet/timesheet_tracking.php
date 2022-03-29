<div id="page_top" class="section-body top_dark">
    <div class="container-fluid">
        <div class="page-header">
            <div class="left">
                <h1 class="page-title">Time Sheet Tarcking</h1>
                <!-- <select class="custom-select">
                           <option>Year</option>
                           <option>Month</option>
                           <option>Week</option>
                        </select>
                        <div class="input-group xs-hide">
                           <input type="text" class="form-control" placeholder="Search...">
                        </div> -->
            </div>
            <div class="right">
                <!-- <ul class="nav nav-pills">
                           <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Language</a>
                              <div class="dropdown-menu">
                                 <a class="dropdown-item" href="#"><img class="w20 mr-2" src="https://nsdbytes.com/template/epic/<?php echo base_url('template/'); ?>employee/assets/images/flags/us.svg">English</a>
                                 <div class="dropdown-divider"></div>
                                 <a class="dropdown-item" href="#"><img class="w20 mr-2" src="https://nsdbytes.com/template/epic/<?php echo base_url('template/'); ?>employee/assets/images/flags/es.svg">Spanish</a>
                                 <a class="dropdown-item" href="#"><img class="w20 mr-2" src="https://nsdbytes.com/template/epic/<?php echo base_url('template/'); ?>employee/assets/images/flags/jp.svg">japanese</a>
                                 <a class="dropdown-item" href="#"><img class="w20 mr-2" src="https://nsdbytes.com/template/epic/<?php echo base_url('template/'); ?>employee/assets/images/flags/bl.svg">France</a>
                              </div>
                           </li>
                           <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Reports</a>
                              <div class="dropdown-menu">
                                 <a class="dropdown-item" href="#"><i class="dropdown-icon fa fa-file-excel-o"></i> MS Excel</a>
                                 <a class="dropdown-item" href="#"><i class="dropdown-icon fa fa-file-word-o"></i> MS Word</a>
                                 <a class="dropdown-item" href="#"><i class="dropdown-icon fa fa-file-pdf-o"></i> PDF</a>
                              </div>
                           </li>
                           <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Project</a>
                              <div class="dropdown-menu">
                                 <a class="dropdown-item" href="#">Graphics Design</a>
                                 <a class="dropdown-item" href="#">Angular Admin</a>
                                 <a class="dropdown-item" href="#">PSD to HTML</a>
                                 <a class="dropdown-item" href="#">iOs App Development</a>
                                 <div class="dropdown-divider"></div>
                                 <a class="dropdown-item" href="#">Home Development</a>
                                 <a class="dropdown-item" href="#">New Blog post</a>
                              </div>
                           </li>
                        </ul> -->
                <div class="notification d-flex">
                    <div class="dropdown d-flex">
                        <a class="nav-link icon d-none d-md-flex btn btn-default btn-icon ml-1" data-toggle="dropdown"><i class="fa fa-envelope"></i><span class="badge badge-success nav-unread"></span></a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <ul class="right_chat list-unstyled w250 p-0">
                                <li class="online">
                                    <a href="javascript:void(0);">
                                        <div class="media">
                                            <img class="media-object" src="<?php echo base_url('template/'); ?>employee/assets/images/xs/avatar4.jpg" alt="" />
                                            <div class="media-body">
                                                <span class="name">Donald Gardner</span>
                                                <span class="message">Designer, Blogger</span>
                                                <span class="badge badge-outline status"></span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="online">
                                    <a href="javascript:void(0);">
                                        <div class="media">
                                            <img class="media-object" src="<?php echo base_url('template/'); ?>employee/assets/images/xs/avatar5.jpg" alt="" />
                                            <div class="media-body">
                                                <span class="name">Wendy Keen</span>
                                                <span class="message">Java Developer</span>
                                                <span class="badge badge-outline status"></span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="offline">
                                    <a href="javascript:void(0);">
                                        <div class="media">
                                            <img class="media-object" src="<?php echo base_url('template/'); ?>employee/assets/images/xs/avatar2.jpg" alt="" />
                                            <div class="media-body">
                                                <span class="name">Matt Rosales</span>
                                                <span class="message">CEO, Epic Theme</span>
                                                <span class="badge badge-outline status"></span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="online">
                                    <a href="javascript:void(0);">
                                        <div class="media">
                                            <img class="media-object" src="<?php echo base_url('template/'); ?>employee/assets/images/xs/avatar3.jpg" alt="" />
                                            <div class="media-body">
                                                <span class="name">Phillip Smith</span>
                                                <span class="message">Writter, Mag Editor</span>
                                                <span class="badge badge-outline status"></span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <div class="dropdown-divider"></div>
                            <a href="javascript:void(0)" class="dropdown-item text-center text-muted-dark readall">Mark all as read</a>
                        </div>
                    </div>
                    <div class="dropdown d-flex">
                        <a class="nav-link icon d-none d-md-flex btn btn-default btn-icon ml-1" data-toggle="dropdown"><i class="fa fa-bell"></i><span class="badge badge-primary nav-unread"></span></a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <ul class="list-unstyled feeds_widget">
                                <li>
                                    <div class="feeds-left"><i class="fa fa-check"></i></div>
                                    <div class="feeds-body">
                                        <h4 class="title text-danger">Issue Fixed <small class="float-right text-muted">11:05</small></h4>
                                        <small>WE have fix all Design bug with Responsive</small>
                                    </div>
                                </li>
                                <li>
                                    <div class="feeds-left"><i class="fa fa-user"></i></div>
                                    <div class="feeds-body">
                                        <h4 class="title">New User <small class="float-right text-muted">10:45</small></h4>
                                        <small>I feel great! Thanks team</small>
                                    </div>
                                </li>
                                <li>
                                    <div class="feeds-left"><i class="fa fa-thumbs-o-up"></i></div>
                                    <div class="feeds-body">
                                        <h4 class="title">7 New Feedback <small class="float-right text-muted">Today</small></h4>
                                        <small>It will give a smart finishing to your site</small>
                                    </div>
                                </li>
                                <li>
                                    <div class="feeds-left"><i class="fa fa-question-circle"></i></div>
                                    <div class="feeds-body">
                                        <h4 class="title text-warning">Server Warning <small class="float-right text-muted">10:50</small></h4>
                                        <small>Your connection is not private</small>
                                    </div>
                                </li>
                                <li>
                                    <div class="feeds-left"><i class="fa fa-shopping-cart"></i></div>
                                    <div class="feeds-body">
                                        <h4 class="title">7 New Orders <small class="float-right text-muted">11:35</small></h4>
                                        <small>You received a new oder from Tina.</small>
                                    </div>
                                </li>
                            </ul>
                            <div class="dropdown-divider"></div>
                            <a href="javascript:void(0)" class="dropdown-item text-center text-muted-dark readall">Mark all as read</a>
                        </div>
                    </div>
                    <div class="dropdown d-flex">
                        <a class="nav-link icon d-none d-md-flex btn btn-default btn-icon ml-1" data-toggle="dropdown"><i class="fa fa-user"></i></a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item" href="#"><i class="dropdown-icon fe fe-user"></i> Profile</a>
                            <a class="dropdown-item" href="#"><i class="dropdown-icon fe fe-settings"></i> Settings</a>
                            <a class="dropdown-item" href="javascript:void(0)">
                                <span class="float-right"><span class="badge badge-primary">6</span></span><i class="dropdown-icon fe fe-mail"></i> Inbox
                            </a>
                            <a class="dropdown-item" href="javascript:void(0)"><i class="dropdown-icon fe fe-send"></i> Message</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="javascript:void(0)"><i class="dropdown-icon fe fe-help-circle"></i> Need help?</a>
                            <a class="dropdown-item" href="#"><i class="dropdown-icon fe fe-log-out"></i> Sign out</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
                        <h3 class="card-title">Time Sheet Tarcking</h3>
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
                                        <th>Name</th>
                                        <th>Date</th>
                                        <th>Project</th>
                                        <th>Hours</th>
                                        <th>Description</th>

                                        <th class="w150">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>John Doe</td>
                                        <td>07 March, 2018</td>
                                        <td>Video Calling App</td>
                                        <td>12 hrs</td>

                                        <td>This project will develop a module offered to level 2 Undergraduate students and will seek to their discipline knowledge</td>
                                        <td>
                                            <button type="button" class="btn btn-icon btn-sm btn-sm" title="Send Invoice" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-edit" aria-hidden="true"></i></button>
                                            <button type="button" class="btn btn-icon btn-sm" title="Print" data-toggle="tooltip" data-placement="top"><i class="fa fa-print" aria-hidden="true"></i></button>
                                            <button type="button" class="btn btn-icon btn-sm" title="Delete" data-toggle="tooltip" data-placement="top"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Richard Miles</td>
                                        <td>25 Jun, 2018</td>
                                        <td>Project Management</td>
                                        <td>8 hrs</td>
                                        <td>This project will develop a module offered to level 2 Undergraduate students and will seek to their discipline knowledge</td>
                                        <td>
                                            <button type="button" class="btn btn-icon btn-sm" title="Send Invoice" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-edit" aria-hidden="true"></i></button>
                                            <button type="button" class="btn btn-icon btn-sm" title="Print" data-toggle="tooltip" data-placement="top"><i class="fa fa-print" aria-hidden="true"></i></button>
                                            <button type="button" class="btn btn-icon btn-sm" title="Delete" data-toggle="tooltip" data-placement="top"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>jhon Smith</td>
                                        <td>12 July, 2018</td>
                                        <td>fitnees aap</td>
                                        <td>7 hrs</td>
                                        <td>This project will develop a module offered to level 2 Undergraduate students and will seek to their discipline knowledge</td>
                                        <td>
                                            <button type="button" class="btn btn-icon btn-sm" title="Send Invoice" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-edit" aria-hidden="true"></i></button>
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
