<div class="section-body mt-3">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="technical_skill_page">
                    <div class="technical_skill_page_top_section">
                        <h3 class="page-title">Employee salary</h3>
                        <a href="#" class="btn add_new_list" data-toggle="modal" data-target="#add_techinical_training"><i class="fa fa-plus"></i> Add Salary </a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0 datatable">
                            <thead>
                                <tr>
                                    <th class="first_sec">#</th>
                                    <th class="second_sec">Name</th>
                                    <th class="three_sec">Email</th>
                                    <th class="four_sec">Join date</th>
                                    <th class="five_sec">Salary</th>
                                    <th class="eight_sec">Role</th>
                                    <th class="six_sec">Payslip</th>
                                    <th class="nine_sec">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="first_sec">1</td>
                                    <td class="second_sec">Alieas rhean</td>
                                    <td class="three_sec">
                                       aliens@gmail.com
                                    </td>
                                 
                                    <td class="five_sec">7 May 2019</td>
                                    <td class="six_sec">$400</td>
                                  
                                    <td class="eight_sec">
                                        <div class="dropdown action-label">
                                            <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false"> <i class="fa fa-dot-circle-o text-success active"></i>software devloper</a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success active"></i> Android devloper</a>
                                                <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i>web designer</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="seven_sec"><a href="<?php echo base_url('employer/hrms/payroll/payslip'); ?>">genrate <br>payslip</a></td>
                                    <td class="nine_sec">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit-traning"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_training"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="first_sec">2</td>
                                    <td class="second_sec">Alieas rhean</td>
                                    <td class="three_sec">
                                       aliens@gmail.com
                                    </td>
                                 
                                    <td class="five_sec">7 May 2019</td>
                                    <td class="six_sec">$400</td>
                                  
                                    <td class="eight_sec">
                                        <div class="dropdown action-label">
                                            <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false"> <i class="fa fa-dot-circle-o text-success active"></i>software devloper</a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success active"></i> Android devloper</a>
                                                <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i>web designer</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="seven_sec"><a href="<?php echo base_url('employer/hrms/payroll/payslip'); ?>">genrate <br>payslip</a></td>
                                    <td class="nine_sec">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit-traning"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_training"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                            </div>
                                        </div>
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

<!-- /Add Training List Modal -->
<div id="add_techinical_training" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Salary</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Select Staff</label>
                                <select class="select form-control">
                                    <option>jhon doe</option>
                                    <option>Rhen alies</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Net Salary</label>
                                <input class="form-control" type="text" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                               
                                <div class="form-group">
                                <label class="col-form-label">Earnings</label>
                                <input class="form-control" type="text" />
                            </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Deductions<span class="text-danger">*</span></label>
                                <input class="form-control" type="text" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                            <label class="col-form-label">HRA(15%)<span class="text-danger">*</span></label>
                                <input class="form-control" type="text" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                            <label class="col-form-label">PF<span class="text-danger">*</span></label>
                                <input class="form-control" type="text" />
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Allowance <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Prof. Tax <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Medical Allowance <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Leave</label>
                                <input class="form-control" type="text" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Others<span class="text-danger">*</span></label>
                                <input class="form-control" type="text" />
                            </div>
                        </div>
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Add Training List Modal -->





<div id="edit-traning" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Salary</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Select Staff</label>
                                <select class="select form-control">
                                    <option>jhon doe</option>
                                    <option>Rhen alies</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Net Salary</label>
                                <input class="form-control" type="text" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                               
                                <div class="form-group">
                                <label class="col-form-label">Earnings</label>
                                <input class="form-control" type="text" />
                            </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Deductions<span class="text-danger">*</span></label>
                                <input class="form-control" type="text" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                            <label class="col-form-label">HRA(15%)<span class="text-danger">*</span></label>
                                <input class="form-control" type="text" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                            <label class="col-form-label">PF<span class="text-danger">*</span></label>
                                <input class="form-control" type="text" />
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Allowance <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Prof. Tax <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Medical Allowance <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Leave</label>
                                <input class="form-control" type="text" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Others<span class="text-danger">*</span></label>
                                <input class="form-control" type="text" />
                            </div>
                        </div>
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
