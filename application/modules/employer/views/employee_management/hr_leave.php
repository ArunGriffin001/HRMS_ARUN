<div class="content container-fluid">
  <!-- Leave Statistics -->
  <div class="row">
      <div class="col-md-3">
          <div class="stats-info">
              <h6>Today Presents</h6>
              <h4>12 / 60</h4>
          </div>
      </div>
      <div class="col-md-3">
          <div class="stats-info">
              <h6>Planned Leaves</h6>
              <h4>8 <span>Today</span></h4>
          </div>
      </div>
      <div class="col-md-3">
          <div class="stats-info">
              <h6>Unplanned Leaves</h6>
              <h4>0 <span>Today</span></h4>
          </div>
      </div>
      <div class="col-md-3">
          <div class="stats-info">
              <h6>Pending Requests</h6>
              <h4>12</h4>
          </div>
      </div>
  </div>
  <!-- /Leave Statistics -->

  <div class="mt-3 attendance-search" style="margin-top: 0; margin-bottom: 30px;">
      <div class="">
          <div class="row clearfix">
              <div class="col-md-12">
                  <div class="card">
                      <div class="card-body">
                          <div class="row">
                              <div class="col-lg-4 col-md-4 col-sm-6">
                                  <label>Search</label>
                                  <div class="input-group"><input type="text" class="form-control" placeholder="Employee name" /></div>
                              </div>
                              <div class="col-lg-3 col-md-4 col-sm-6">
                                  <label>Select Month</label>
                                  <div class="multiselect_div">
                                      <select class="custom-select">
                                          <option>Select Month</option>
                                          <option>Jan</option>
                                          <option>Feb</option>
                                          <option>Mar</option>
                                          <option>Apr</option>
                                          <option>May</option>
                                          <option>Jun</option>
                                          <option>Jul</option>
                                          <option>Aug</option>
                                          <option>Sep</option>
                                          <option>Oct</option>
                                          <option>Nov</option>
                                          <option>Dec</option>
                                      </select>
                                  </div>
                              </div>
                              <div class="col-lg-3 col-md-4 col-sm-6">
                                  <label>Select Year</label>
                                  <div class="form-group">
                                      <select class="custom-select">
                                          <option>select Year</option>
                                          <option value="1">2015</option>
                                          <option value="1">2016</option>
                                          <option value="1">2017</option>
                                          <option value="1">2018</option>
                                          <option value="1">2019</option>
                                          <option value="1">2020</option>
                                          <option value="1">2021</option>
                                      </select>
                                  </div>
                              </div>
                              <div class="col-lg-2 col-md-4 col-sm-6"><label>&nbsp;</label><a href="javascript:void(0)" class="btn btn-sm btn-primary btn-block">Search</a></div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <div class="row">
      <div class="col-md-12">
          <div class="table-responsive">
              <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                  <div class="row">
                      <div class="col-sm-12 col-md-6">
                          <div class="dataTables_length" id="DataTables_Table_0_length">
                              <label>
                                  Show
                                  <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="custom-select custom-select-sm form-control form-control-sm">
                                      <option value="10">10</option>
                                      <option value="25">25</option>
                                      <option value="50">50</option>
                                      <option value="100">100</option>
                                  </select>
                                  entries
                              </label>
                          </div>
                      </div>
                      <div class="col-sm-12 col-md-6"></div>
                  </div>
                  <div class="row">
                      <div class="col-sm-12">
                          <table class="table table-striped custom-table mb-0 datatable dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                              <thead>
                                  <tr role="row">
                                      <th
                                          class="sorting_asc"
                                          tabindex="0"
                                          aria-controls="DataTables_Table_0"
                                          rowspan="1"
                                          colspan="1"
                                          aria-sort="ascending"
                                          aria-label="Employee: activate to sort column descending"
                                          style="width: 218px;"
                                      >
                                          Employee
                                      </th>
                                      <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Leave Type: activate to sort column ascending" style="width: 125px;">
                                          Leave Type
                                      </th>
                                      <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="From: activate to sort column ascending" style="width: 88px;">From</th>
                                      <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="To: activate to sort column ascending" style="width: 86px;">To</th>
                                      <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="No of Days: activate to sort column ascending" style="width: 119px;">
                                          No of Days
                                      </th>
                                      <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Reason: activate to sort column ascending" style="width: 137px;">Reason</th>
                                      <th class="text-center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 121px;">
                                          Status
                                      </th>
                                      <th class="text-right sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: 88px;">
                                          Actions
                                      </th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr role="row" class="odd">
                                      <td class="sorting_1">
                                          <h2 class="table-avatar">
                                              <a href="profile.html" class="avatar"><img alt="" src="assets/img/profiles/avatar-02.jpg" /></a>
                                              <a> John Doe <span>Web Designer</span></a>
                                          </h2>
                                      </td>
                                      <td>Medical Leave</td>
                                      <td>27 Feb 2019</td>
                                      <td>27 Feb 2019</td>
                                      <td>1 day</td>
                                      <td>Going to Hospital</td>
                                      <td class="text-center">
                                          <div class="dropdown action-label">
                                              <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false"> <i class="fa fa-dot-circle-o text-success"></i> Approved </a>
                                              <div class="dropdown-menu dropdown-menu-right">
                                                  <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-purple"></i> New</a>
                                                  <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-info"></i> Pending</a>
                                                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#approve_leave"><i class="fa fa-dot-circle-o text-success"></i> Approved</a>
                                                  <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Declined</a>
                                              </div>
                                          </div>
                                      </td>
                                      <td>
                                          <button type="button" class="btn btn-icon btn-sm" title="View"><i class="fa fa-eye"></i></button>
                                          <button type="button" class="btn btn-icon btn-sm" title="Edit"><i class="fa fa-edit"></i></button>
                                          <button type="button" class="btn btn-icon btn-sm js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o text-danger"></i></button>
                                      </td>
                                  </tr>
                                  <tr role="row" class="even">
                                      <td class="sorting_1">
                                          <h2 class="table-avatar">
                                              <a href="profile.html" class="avatar"><img alt="" src="assets/img/profiles/avatar-15.jpg" /></a>
                                              <a>Buster Wigton <span>Web Developer</span></a>
                                          </h2>
                                      </td>
                                      <td>Hospitalisation</td>
                                      <td>15 Jan 2019</td>
                                      <td>25 Jan 2019</td>
                                      <td>10 days</td>
                                      <td>Going to Hospital</td>
                                      <td class="text-center">
                                          <div class="dropdown action-label">
                                              <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false"> <i class="fa fa-dot-circle-o text-success"></i> Approved </a>
                                              <div class="dropdown-menu dropdown-menu-right">
                                                  <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-purple"></i> New</a>
                                                  <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-info"></i> Pending</a>
                                                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#approve_leave"><i class="fa fa-dot-circle-o text-success"></i> Approved</a>
                                                  <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Declined</a>
                                              </div>
                                          </div>
                                      </td>
                                      <td>
                                          <button type="button" class="btn btn-icon btn-sm" title="View"><i class="fa fa-eye"></i></button>
                                          <button type="button" class="btn btn-icon btn-sm" title="Edit"><i class="fa fa-edit"></i></button>
                                          <button type="button" class="btn btn-icon btn-sm js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o text-danger"></i></button>
                                      </td>
                                  </tr>
                                  <tr role="row" class="odd">
                                      <td class="sorting_1">
                                          <h2 class="table-avatar">
                                              <a href="profile.html" class="avatar"><img alt="" src="assets/img/profiles/avatar-08.jpg" /></a>
                                              <a>Catherine Manseau <span>Web Developer</span></a>
                                          </h2>
                                      </td>
                                      <td>Maternity Leave</td>
                                      <td>5 Jan 2019</td>
                                      <td>15 Jan 2019</td>
                                      <td>10 days</td>
                                      <td>Going to Hospital</td>
                                      <td class="text-center">
                                          <div class="dropdown action-label">
                                              <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false"> <i class="fa fa-dot-circle-o text-success"></i> Approved </a>
                                              <div class="dropdown-menu dropdown-menu-right">
                                                  <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-purple"></i> New</a>
                                                  <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-info"></i> Pending</a>
                                                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#approve_leave"><i class="fa fa-dot-circle-o text-success"></i> Approved</a>
                                                  <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Declined</a>
                                              </div>
                                          </div>
                                      </td>
                                      <td>
                                          <button type="button" class="btn btn-icon btn-sm" title="View"><i class="fa fa-eye"></i></button>
                                          <button type="button" class="btn btn-icon btn-sm" title="Edit"><i class="fa fa-edit"></i></button>
                                          <button type="button" class="btn btn-icon btn-sm js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o text-danger"></i></button>
                                      </td>
                                  </tr>
                                  <tr role="row" class="even">
                                      <td class="sorting_1">
                                          <h2 class="table-avatar">
                                              <a href="profile.html" class="avatar"><img alt="" src="assets/img/profiles/avatar-20.jpg" /></a>
                                              <a>Domenic Houston <span>Web Developer</span></a>
                                          </h2>
                                      </td>
                                      <td>Casual Leave</td>
                                      <td>10 Jan 2019</td>
                                      <td>11 Jan 2019</td>
                                      <td>2 days</td>
                                      <td>Going to Hospital</td>
                                      <td class="text-center">
                                          <div class="dropdown action-label">
                                              <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false"> <i class="fa fa-dot-circle-o text-success"></i> Approved </a>
                                              <div class="dropdown-menu dropdown-menu-right">
                                                  <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-purple"></i> New</a>
                                                  <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-info"></i> Pending</a>
                                                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#approve_leave"><i class="fa fa-dot-circle-o text-success"></i> Approved</a>
                                                  <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Declined</a>
                                              </div>
                                          </div>
                                      </td>
                                      <td>
                                          <button type="button" class="btn btn-icon btn-sm" title="View"><i class="fa fa-eye"></i></button>
                                          <button type="button" class="btn btn-icon btn-sm" title="Edit"><i class="fa fa-edit"></i></button>
                                          <button type="button" class="btn btn-icon btn-sm js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o text-danger"></i></button>
                                      </td>
                                  </tr>
                                  <tr role="row" class="odd">
                                      <td class="sorting_1">
                                          <h2 class="table-avatar">
                                              <a href="profile.html" class="avatar"><img alt="" src="assets/img/profiles/avatar-02.jpg" /></a>
                                              <a>John Doe <span>Web Designer</span></a>
                                          </h2>
                                      </td>
                                      <td>Casual Leave</td>
                                      <td>9 Jan 2019</td>
                                      <td>10 Jan 2019</td>
                                      <td>2 days</td>
                                      <td>Going to Hospital</td>
                                      <td class="text-center">
                                          <div class="dropdown action-label">
                                              <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false"> <i class="fa fa-dot-circle-o text-success"></i> Approved </a>
                                              <div class="dropdown-menu dropdown-menu-right">
                                                  <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-purple"></i> New</a>
                                                  <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-info"></i> Pending</a>
                                                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#approve_leave"><i class="fa fa-dot-circle-o text-success"></i> Approved</a>
                                                  <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Declined</a>
                                              </div>
                                          </div>
                                      </td>
                                      <td>
                                          <button type="button" class="btn btn-icon btn-sm" title="View"><i class="fa fa-eye"></i></button>
                                          <button type="button" class="btn btn-icon btn-sm" title="Edit"><i class="fa fa-edit"></i></button>
                                          <button type="button" class="btn btn-icon btn-sm js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o text-danger"></i></button>
                                      </td>
                                  </tr>
                                  <tr role="row" class="even">
                                      <td class="sorting_1">
                                          <h2 class="table-avatar">
                                              <a href="profile.html" class="avatar"><img alt="" src="assets/img/profiles/avatar-10.jpg" /></a>
                                              <a>John Smith <span>Android Developer</span></a>
                                          </h2>
                                      </td>
                                      <td>LOP</td>
                                      <td>24 Feb 2019</td>
                                      <td>25 Feb 2019</td>
                                      <td>2 days</td>
                                      <td>Personnal</td>
                                      <td class="text-center">
                                          <div class="dropdown action-label">
                                              <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false"> <i class="fa fa-dot-circle-o text-success"></i> Approved </a>
                                              <div class="dropdown-menu dropdown-menu-right">
                                                  <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-purple"></i> New</a>
                                                  <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-info"></i> Pending</a>
                                                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#approve_leave"><i class="fa fa-dot-circle-o text-success"></i> Approved</a>
                                                  <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Declined</a>
                                              </div>
                                          </div>
                                      </td>
                                      <td>
                                          <button type="button" class="btn btn-icon btn-sm" title="View"><i class="fa fa-eye"></i></button>
                                          <button type="button" class="btn btn-icon btn-sm" title="Edit"><i class="fa fa-edit"></i></button>
                                          <button type="button" class="btn btn-icon btn-sm js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o text-danger"></i></button>
                                      </td>
                                  </tr>
                                  <tr role="row" class="odd">
                                      <td class="sorting_1">
                                          <h2 class="table-avatar">
                                              <a href="profile.html" class="avatar"><img alt="" src="assets/img/profiles/avatar-20.jpg" /></a>
                                              <a>Melita Faucher <span>Web Developer</span></a>
                                          </h2>
                                      </td>
                                      <td>Casual Leave</td>
                                      <td>13 Jan 2019</td>
                                      <td>14 Jan 2019</td>
                                      <td>2 days</td>
                                      <td>Going to Hospital</td>
                                      <td class="text-center">
                                          <div class="dropdown action-label">
                                              <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false"> <i class="fa fa-dot-circle-o text-danger"></i> Declined </a>
                                              <div class="dropdown-menu dropdown-menu-right">
                                                  <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-purple"></i> New</a>
                                                  <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-info"></i> Pending</a>
                                                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#approve_leave"><i class="fa fa-dot-circle-o text-success"></i> Approved</a>
                                                  <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Declined</a>
                                              </div>
                                          </div>
                                      </td>
                                      <td>
                                          <button type="button" class="btn btn-icon btn-sm" title="View"><i class="fa fa-eye"></i></button>
                                          <button type="button" class="btn btn-icon btn-sm" title="Edit"><i class="fa fa-edit"></i></button>
                                          <button type="button" class="btn btn-icon btn-sm js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o text-danger"></i></button>
                                      </td>
                                  </tr>
                                  <tr role="row" class="even">
                                      <td class="sorting_1">
                                          <h2 class="table-avatar">
                                              <a href="profile.html" class="avatar"><img alt="" src="assets/img/profiles/avatar-05.jpg" /></a>
                                              <a>Mike Litorus <span>IOS Developer</span></a>
                                          </h2>
                                      </td>
                                      <td>Paternity Leave</td>
                                      <td>13 Feb 2019</td>
                                      <td>17 Feb 2019</td>
                                      <td>5 days</td>
                                      <td>Going to Hospital</td>
                                      <td class="text-center">
                                          <div class="dropdown action-label">
                                              <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false"> <i class="fa fa-dot-circle-o text-danger"></i> Declined </a>
                                              <div class="dropdown-menu dropdown-menu-right">
                                                  <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-purple"></i> New</a>
                                                  <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-info"></i> Pending</a>
                                                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#approve_leave"><i class="fa fa-dot-circle-o text-success"></i> Approved</a>
                                                  <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Declined</a>
                                              </div>
                                          </div>
                                      </td>
                                      <td>
                                          <button type="button" class="btn btn-icon btn-sm" title="View"><i class="fa fa-eye"></i></button>
                                          <button type="button" class="btn btn-icon btn-sm" title="Edit"><i class="fa fa-edit"></i></button>
                                          <button type="button" class="btn btn-icon btn-sm js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o text-danger"></i></button>
                                      </td>
                                  </tr>
                                  <tr role="row" class="odd">
                                      <td class="sorting_1">
                                          <h2 class="table-avatar">
                                              <a href="profile.html" class="avatar"><img alt="" src="assets/img/profiles/avatar-09.jpg" /></a>
                                              <a href="#">Richard Miles <span>Web Developer</span></a>
                                          </h2>
                                      </td>
                                      <td>Casual Leave</td>
                                      <td>8 Mar 2019</td>
                                      <td>9 Mar 2019</td>
                                      <td>2 days</td>
                                      <td>Going to Hospital</td>
                                      <td class="text-center">
                                          <div class="dropdown action-label">
                                              <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false"> <i class="fa fa-dot-circle-o text-purple"></i> New </a>
                                              <div class="dropdown-menu dropdown-menu-right">
                                                  <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-purple"></i> New</a>
                                                  <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-info"></i> Pending</a>
                                                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#approve_leave"><i class="fa fa-dot-circle-o text-success"></i> Approved</a>
                                                  <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Declined</a>
                                              </div>
                                          </div>
                                      </td>
                                      <td>
                                          <button type="button" class="btn btn-icon btn-sm" title="View"><i class="fa fa-eye"></i></button>
                                          <button type="button" class="btn btn-icon btn-sm" title="Edit"><i class="fa fa-edit"></i></button>
                                          <button type="button" class="btn btn-icon btn-sm js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o text-danger"></i></button>
                                      </td>
                                  </tr>
                                  <tr role="row" class="even">
                                      <td class="sorting_1">
                                          <h2 class="table-avatar">
                                              <a href="profile.html" class="avatar"><img alt="" src="assets/img/profiles/avatar-24.jpg" /></a>
                                              <a>Richard Parker <span>Web Developer</span></a>
                                          </h2>
                                      </td>
                                      <td>Casual Leave</td>
                                      <td>30 Jan 2019</td>
                                      <td>31 Jan 2019</td>
                                      <td>2 days</td>
                                      <td>Going to Hospital</td>
                                      <td class="text-center">
                                          <div class="dropdown action-label">
                                              <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false"> <i class="fa fa-dot-circle-o text-purple"></i> New </a>
                                              <div class="dropdown-menu dropdown-menu-right">
                                                  <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-purple"></i> New</a>
                                                  <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-info"></i> Pending</a>
                                                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#approve_leave"><i class="fa fa-dot-circle-o text-success"></i> Approved</a>
                                                  <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Declined</a>
                                              </div>
                                          </div>
                                      </td>
                                      <td>
                                          <button type="button" class="btn btn-icon btn-sm" title="View"><i class="fa fa-eye"></i></button>
                                          <button type="button" class="btn btn-icon btn-sm" title="Edit"><i class="fa fa-edit"></i></button>
                                          <button type="button" class="btn btn-icon btn-sm js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o text-danger"></i></button>
                                      </td>
                                  </tr>
                              </tbody>
                          </table>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-sm-12 col-md-5"><div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 1 to 10 of 12 entries</div></div>
                      <div class="col-sm-12 col-md-7">
                          <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                              <ul class="pagination">
                                  <li class="paginate_button page-item previous disabled" id="DataTables_Table_0_previous">
                                      <a href="#" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                                  </li>
                                  <li class="paginate_button page-item active"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                  <li class="paginate_button page-item"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                  <li class="paginate_button page-item next" id="DataTables_Table_0_next"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="3" tabindex="0" class="page-link">Next</a></li>
                              </ul>
                          </div>
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
        