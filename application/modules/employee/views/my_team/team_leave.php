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
        <!-- <div class="row">
                     <div class="col-lg-3 col-md-6">
                        <div class="card">
                           <div class="card-body w_sparkline">
                              <div class="details">
                                 <span>Total Employee</span>
                                 <h3 class="mb-0 counter">614</h3>
                              </div>
                              <div class="w_chart">
                                 <span id="mini-bar-chart1" class="mini-bar-chart"></span>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-3 col-md-6">
                        <div class="card">
                           <div class="card-body w_sparkline">
                              <div class="details">
                                 <span">New Employee</span>
                                 <h3 class="mb-0 counter">124</h3>
                              </div>
                              <div class="w_chart">
                                 <span id="mini-bar-chart2" class="mini-bar-chart"></span>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-3 col-md-6">
                        <div class="card">
                           <div class="card-body w_sparkline">
                              <div class="details">
                                 <span>Male</span>
                                 <h3 class="mb-0 counter">504</h3>
                              </div>
                              <div class="w_chart">
                                 <span id="mini-bar-chart3" class="mini-bar-chart"></span>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-3 col-md-6">
                        <div class="card">
                           <div class="card-body w_sparkline">
                              <div class="details">
                                 <span>Female</span>
                                 <h3 class="mb-0 counter">110</h3>
                              </div>
                              <div class="w_chart">
                                 <span id="mini-bar-chart4" class="mini-bar-chart"></span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div> -->
    </div>
</div>
<div class="section-body">
    <div class="container-fluid">
        <div class="tab-content">
            <!-- <div class="tab-pane fade show active" id="Employee-list" role="tabpanel">
                        <div class="card">
                           <div class="card-header">
                              <h3 class="card-title">Employee List</h3>
                              <div class="card-options">
                                 <form>
                                    <div class="input-group">
                                       <input type="text" class="form-control form-control-sm" placeholder="Search something..." name="s">
                                       <span class="input-group-btn ml-2"><button class="btn btn-icon btn-sm" type="submit"><span class="fe fe-search"></span></button></span>
                                    </div>
                                 </form>
                              </div>
                           </div>
                           <div class="card-body">
                              <div class="table-responsive">
                                 <table class="table table-hover table-striped table-vcenter text-nowrap mb-0">
                                    <thead>
                                       <tr>
                                          <th>#</th>
                                          <th>Name</th>
                                          <th>Employee ID</th>
                                          <th>Phone</th>
                                          <th>Join Date</th>
                                          <th>Role</th>
                                          <th>Action</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <tr>
                                          <td class="w40">
                                             <label class="custom-control custom-checkbox">
                                             <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1">
                                             <span class="custom-control-label">&nbsp;</span>
                                             </label>
                                          </td>
                                          <td class="d-flex">
                                             <span class="avatar avatar-blue" data-toggle="tooltip" title="" data-original-title="Avatar Name">MN</span>
                                             <div class="ml-3">
                                                <h6 class="mb-0">Marshall Nichols</h6>
                                                <span class="text-muted"><a href="https://nsdbytes.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="3954584b4a515855551457795e54585055175a5654">[email&#160;protected]</a></span>
                                             </div>
                                          </td>
                                          <td><span>LA-0215</span></td>
                                          <td><span>+ 264-625-1526</span></td>
                                          <td>12 Jun, 2015</td>
                                          <td>Web Designer</td>
                                          <td>
                                             <button type="button" class="btn btn-icon btn-sm" title="View"><i class="fa fa-eye"></i></button>
                                             <button type="button" class="btn btn-icon btn-sm" title="Edit"><i class="fa fa-edit"></i></button>
                                             <button type="button" class="btn btn-icon btn-sm js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o"></i></button>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td class="w40">
                                             <label class="custom-control custom-checkbox">
                                             <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1">
                                             <span class="custom-control-label">&nbsp;</span>
                                             </label>
                                          </td>
                                          <td class="d-flex">
                                             <img class="avatar" src="<?php echo base_url('template/'); ?>employee/assets/images/xs/avatar2.jpg" data-toggle="tooltip" title="" data-original-title="Avatar Name" />
                                             <div class="ml-3">
                                                <h6 class="mb-0">Debra Stewart</h6>
                                                <span class="text-muted"><a href="https://nsdbytes.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="1e737f6c6d767f727233705e79737f7772307d7173">[email&#160;protected]</a></span>
                                             </div>
                                          </td>
                                          <td><span>LA-0216</span></td>
                                          <td><span>+ 264-625-4613</span></td>
                                          <td>28 July, 2015</td>
                                          <td>Web Developer</td>
                                          <td>
                                             <button type="button" class="btn btn-icon btn-sm" title="View"><i class="fa fa-eye"></i></button>
                                             <button type="button" class="btn btn-icon btn-sm" title="Edit"><i class="fa fa-edit"></i></button>
                                             <button type="button" class="btn btn-icon btn-sm js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o"></i></button>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td class="w40">
                                             <label class="custom-control custom-checkbox">
                                             <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1">
                                             <span class="custom-control-label">&nbsp;</span>
                                             </label>
                                          </td>
                                          <td class="d-flex">
                                             <span class="avatar avatar-green" data-toggle="tooltip" title="" data-original-title="Avatar Name">JH</span>
                                             <div class="ml-3">
                                                <h6 class="mb-0">Jane Hunt</h6>
                                                <span class="text-muted"><a href="https://nsdbytes.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="b5dfd4dbd098ddc0dbc1f5d2d8d4dcd99bd6dad8">[email&#160;protected]</a></span>
                                             </div>
                                          </td>
                                          <td><span>LA-0215</span></td>
                                          <td><span>+ 264-625-4512</span></td>
                                          <td>13 Jun, 2015</td>
                                          <td>Web Designer</td>
                                          <td>
                                             <button type="button" class="btn btn-icon btn-sm" title="View"><i class="fa fa-eye"></i></button>
                                             <button type="button" class="btn btn-icon btn-sm" title="Edit"><i class="fa fa-edit"></i></button>
                                             <button type="button" class="btn btn-icon btn-sm js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o"></i></button>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td class="w40">
                                             <label class="custom-control custom-checkbox">
                                             <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1">
                                             <span class="custom-control-label">&nbsp;</span>
                                             </label>
                                          </td>
                                          <td class="d-flex">
                                             <img class="avatar" src="<?php echo base_url('template/'); ?>employee/assets/images/xs/avatar3.jpg" data-toggle="tooltip" title="" data-original-title="Avatar Name" />
                                             <div class="ml-3">
                                                <h6 class="mb-0">Susie Willis</h6>
                                                <span class="text-muted"><a href="https://nsdbytes.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="a1d2d4d2d2c8c48cd6e1c6ccc0c8cd8fc2cecc">[email&#160;protected]</a></span>
                                             </div>
                                          </td>
                                          <td><span>LA-0116</span></td>
                                          <td><span>+ 264-625-4152</span></td>
                                          <td>9 May, 2016</td>
                                          <td>Web Developer</td>
                                          <td>
                                             <button type="button" class="btn btn-icon btn-sm" title="View"><i class="fa fa-eye"></i></button>
                                             <button type="button" class="btn btn-icon btn-sm" title="Edit"><i class="fa fa-edit"></i></button>
                                             <button type="button" class="btn btn-icon btn-sm js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o"></i></button>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td class="w40">
                                             <label class="custom-control custom-checkbox">
                                             <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1">
                                             <span class="custom-control-label">&nbsp;</span>
                                             </label>
                                          </td>
                                          <td class="d-flex">
                                             <span class="avatar avatar-azure" data-toggle="tooltip" title="" data-original-title="Avatar Name">DD</span>
                                             <div class="ml-3">
                                                <h6 class="mb-0">Darryl Day</h6>
                                                <span class="text-muted"><a href="https://nsdbytes.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="593d382b2b2035773d3820193e34383035773a3634">[email&#160;protected]</a></span>
                                             </div>
                                          </td>
                                          <td><span>LA-0215</span></td>
                                          <td><span>+ 264-625-8596</span></td>
                                          <td>24 Jun, 2015</td>
                                          <td>Web Developer</td>
                                          <td>
                                             <button type="button" class="btn btn-icon btn-sm" title="View"><i class="fa fa-eye"></i></button>
                                             <button type="button" class="btn btn-icon btn-sm" title="Edit"><i class="fa fa-edit"></i></button>
                                             <button type="button" class="btn btn-icon btn-sm js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o"></i></button>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td class="w40">
                                             <label class="custom-control custom-checkbox">
                                             <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1">
                                             <span class="custom-control-label">&nbsp;</span>
                                             </label>
                                          </td>
                                          <td class="d-flex">
                                             <span class="avatar avatar-blue" data-toggle="tooltip" title="" data-original-title="Avatar Name">MN</span>
                                             <div class="ml-3">
                                                <h6 class="mb-0">Marshall Nichols</h6>
                                                <span class="text-muted"><a href="https://nsdbytes.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="deb3bfacadb6bfb2b2f3b09eb9b3bfb7b2f0bdb1b3">[email&#160;protected]</a></span>
                                             </div>
                                          </td>
                                          <td><span>LA-0215</span></td>
                                          <td><span>+ 264-625-7845</span></td>
                                          <td>11 Jun, 2015</td>
                                          <td>Web Designer</td>
                                          <td>
                                             <button type="button" class="btn btn-icon btn-sm" title="View"><i class="fa fa-eye"></i></button>
                                             <button type="button" class="btn btn-icon btn-sm" title="Edit"><i class="fa fa-edit"></i></button>
                                             <button type="button" class="btn btn-icon btn-sm js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o"></i></button>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td class="w40">
                                             <label class="custom-control custom-checkbox">
                                             <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1">
                                             <span class="custom-control-label">&nbsp;</span>
                                             </label>
                                          </td>
                                          <td class="d-flex">
                                             <img class="avatar" src="<?php echo base_url('template/'); ?>employee/assets/images/xs/avatar2.jpg" data-toggle="tooltip" title="" data-original-title="Avatar Name" />
                                             <div class="ml-3">
                                                <h6 class="mb-0">Debra Stewart</h6>
                                                <span class="text-muted"><a href="https://nsdbytes.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="74191506071c151818591a341319151d185a171b19">[email&#160;protected]</a></span>
                                             </div>
                                          </td>
                                          <td><span>LA-0216</span></td>
                                          <td><span>+ 264-625-2583</span></td>
                                          <td>28 Jun, 2018</td>
                                          <td>Web Developer</td>
                                          <td>
                                             <button type="button" class="btn btn-icon btn-sm" title="View"><i class="fa fa-eye"></i></button>
                                             <button type="button" class="btn btn-icon btn-sm" title="Edit"><i class="fa fa-edit"></i></button>
                                             <button type="button" class="btn btn-icon btn-sm js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o"></i></button>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td class="w40">
                                             <label class="custom-control custom-checkbox">
                                             <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1">
                                             <span class="custom-control-label">&nbsp;</span>
                                             </label>
                                          </td>
                                          <td class="d-flex">
                                             <span class="avatar avatar-indigo" data-toggle="tooltip" title="" data-original-title="Avatar Name">MN</span>
                                             <div class="ml-3">
                                                <h6 class="mb-0">Marshall Nichols</h6>
                                                <span class="text-muted"><a href="https://nsdbytes.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="5b363a2928333a373776351b3c363a323775383436">[email&#160;protected]</a></span>
                                             </div>
                                          </td>
                                          <td><span>LA-0215</span></td>
                                          <td><span>+ 264-625-2583</span></td>
                                          <td>24 Feb, 2019</td>
                                          <td>Android Developer</td>
                                          <td>
                                             <button type="button" class="btn btn-icon btn-sm" title="View"><i class="fa fa-eye"></i></button>
                                             <button type="button" class="btn btn-icon btn-sm" title="Edit"><i class="fa fa-edit"></i></button>
                                             <button type="button" class="btn btn-icon btn-sm js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o"></i></button>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td class="w40">
                                             <label class="custom-control custom-checkbox">
                                             <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1">
                                             <span class="custom-control-label">&nbsp;</span>
                                             </label>
                                          </td>
                                          <td class="d-flex">
                                             <img class="avatar" src="<?php echo base_url('template/'); ?>employee/assets/images/xs/avatar2.jpg" data-toggle="tooltip" title="" data-original-title="Avatar Name" />
                                             <div class="ml-3">
                                                <h6 class="mb-0">Debra Stewart</h6>
                                                <span class="text-muted"><a href="https://nsdbytes.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="8fe2eefdfce7eee3e3a2e1cfe8e2eee6e3a1ece0e2">[email&#160;protected]</a></span>
                                             </div>
                                          </td>
                                          <td><span>LA-0216</span></td>
                                          <td><span>+ 264-625-2589</span></td>
                                          <td>28 Jun, 2015</td>
                                          <td>IOS Developer</td>
                                          <td>
                                             <button type="button" class="btn btn-icon btn-sm" title="View"><i class="fa fa-eye"></i></button>
                                             <button type="button" class="btn btn-icon btn-sm" title="Edit"><i class="fa fa-edit"></i></button>
                                             <button type="button" class="btn btn-icon btn-sm js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o"></i></button>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td class="w40">
                                             <label class="custom-control custom-checkbox">
                                             <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1">
                                             <span class="custom-control-label">&nbsp;</span>
                                             </label>
                                          </td>
                                          <td class="d-flex">
                                             <img class="avatar" src="<?php echo base_url('template/'); ?>employee/assets/images/xs/avatar2.jpg" data-toggle="tooltip" title="" data-original-title="Avatar Name" />
                                             <div class="ml-3">
                                                <h6 class="mb-0">Debra Stewart</h6>
                                                <span class="text-muted"><a href="https://nsdbytes.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="45282437362d242929682b052228242c296b262a28">[email&#160;protected]</a></span>
                                             </div>
                                          </td>
                                          <td><span>LA-0216</span></td>
                                          <td><span>+ 264-625-2356</span></td>
                                          <td>28 Jun, 2015</td>
                                          <td>Team Leader</td>
                                          <td>
                                             <button type="button" class="btn btn-icon btn-sm" title="View"><i class="fa fa-eye"></i></button>
                                             <button type="button" class="btn btn-icon btn-sm" title="Edit"><i class="fa fa-edit"></i></button>
                                             <button type="button" class="btn btn-icon btn-sm js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o"></i></button>
                                          </td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="tab-pane fade" id="Employee-view" role="tabpanel">
                        <div class="row">
                           <div class="col-lg-4 col-md-12">
                              <div class="card">
                                 <div class="card-body">
                                    <div class="media mb-4">
                                       <img class="avatar avatar-xl mr-3" src="<?php echo base_url('template/'); ?>employee/assets/images/sm/avatar1.jpg" alt="avatar">
                                       <div class="media-body">
                                          <h5 class="m-0">Sara Hopkins</h5>
                                          <p class="text-muted mb-0">Webdeveloper</p>
                                          <ul class="social-links list-inline mb-0 mt-2">
                                             <li class="list-inline-item"><a href="javascript:void(0)" title="" data-toggle="tooltip" data-original-title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                             <li class="list-inline-item"><a href="javascript:void(0)" title="" data-toggle="tooltip" data-original-title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                             <li class="list-inline-item"><a href="javascript:void(0)" title="" data-toggle="tooltip" data-original-title="1234567890"><i class="fa fa-phone"></i></a></li>
                                             <li class="list-inline-item"><a href="javascript:void(0)" title="" data-toggle="tooltip" data-original-title="@skypename"><i class="fa fa-skype"></i></a></li>
                                          </ul>
                                       </div>
                                    </div>
                                    <p class="mb-4">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.</p>
                                    <button class="btn btn-outline-primary btn-sm"><span class="fa fa-twitter"></span> Follow</button>
                                 </div>
                              </div>
                              <div class="card">
                                 <div class="card-header">
                                    <h3 class="card-title">Statistics</h3>
                                    <div class="card-options">
                                       <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                       <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                                    </div>
                                 </div>
                                 <div class="card-body">
                                    <div class="text-center">
                                       <div class="row">
                                          <div class="col-6 pb-3">
                                             <label class="mb-0">Project</label>
                                             <h4 class="font-30 font-weight-bold">45</h4>
                                          </div>
                                          <div class="col-6 pb-3">
                                             <label class="mb-0">Growth</label>
                                             <h4 class="font-30 font-weight-bold">87%</h4>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label class="d-block">Laravel<span class="float-right">77%</span></label>
                                       <div class="progress progress-xs">
                                          <div class="progress-bar bg-blue" role="progressbar" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100" style="width: 77%;"></div>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label class="d-block">HTML<span class="float-right">50%</span></label>
                                       <div class="progress progress-xs">
                                          <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"></div>
                                       </div>
                                    </div>
                                    <div class="form-group mb-0">
                                       <label class="d-block">Photoshop <span class="float-right">23%</span></label>
                                       <div class="progress progress-xs">
                                          <div class="progress-bar bg-green" role="progressbar" aria-valuenow="23" aria-valuemin="0" aria-valuemax="100" style="width: 23%;"></div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-8 col-md-12">
                              <div class="card">
                                 <div class="card-body">
                                    <ul class="new_timeline mt-3">
                                       <li>
                                          <div class="bullet pink"></div>
                                          <div class="time">11:00am</div>
                                          <div class="desc">
                                             <h3>Attendance</h3>
                                             <h4>Computer Class</h4>
                                          </div>
                                       </li>
                                       <li>
                                          <div class="bullet pink"></div>
                                          <div class="time">11:30am</div>
                                          <div class="desc">
                                             <h3>Added an interest</h3>
                                             <h4>???Volunteer Activities???</h4>
                                             <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.</p>
                                          </div>
                                       </li>
                                       <li>
                                          <div class="bullet green"></div>
                                          <div class="time">12:00pm</div>
                                          <div class="desc">
                                             <h3>Developer Team</h3>
                                             <h4>Hangouts</h4>
                                             <ul class="list-unstyled team-info margin-0 p-t-5">
                                                <li><img src="<?php echo base_url('template/'); ?>employee/assets/images/xs/avatar1.jpg" alt="Avatar"></li>
                                                <li><img src="<?php echo base_url('template/'); ?>employee/assets/images/xs/avatar2.jpg" alt="Avatar"></li>
                                                <li><img src="<?php echo base_url('template/'); ?>employee/assets/images/xs/avatar3.jpg" alt="Avatar"></li>
                                                <li><img src="<?php echo base_url('template/'); ?>employee/assets/images/xs/avatar4.jpg" alt="Avatar"></li>
                                             </ul>
                                          </div>
                                       </li>
                                       <li>
                                          <div class="bullet green"></div>
                                          <div class="time">2:00pm</div>
                                          <div class="desc">
                                             <h3>Responded to need</h3>
                                             <a href="javascript:void(0)">???In-Kind Opportunity???</a>
                                          </div>
                                       </li>
                                       <li>
                                          <div class="bullet orange"></div>
                                          <div class="time">1:30pm</div>
                                          <div class="desc">
                                             <h3>Lunch Break</h3>
                                          </div>
                                       </li>
                                       <li>
                                          <div class="bullet green"></div>
                                          <div class="time">2:38pm</div>
                                          <div class="desc">
                                             <h3>Finish</h3>
                                             <h4>Go to Home</h4>
                                          </div>
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div> -->
            <div class="tab-pane fade show active" id="Employee-Request" role="tabpanel">
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
                                        <td><span>Casual Leave</span></td>
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
                                        <td><span>Casual Leave</span></td>
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
                            <textarea class="form-control" placeholder="Remaining Leave"></textarea>
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
