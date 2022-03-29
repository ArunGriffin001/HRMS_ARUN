<!-- <div class="header_btn">
    <div class="header-action">
        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus mr-2"></i>Add Holiday</button>
    </div>
</div> -->

<div class="section-body mt-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table_custom spacing5 border-style mb-0">
                                <thead>
                                    <tr>
                                        <th>DAY</th>
                                        <th>DATE</th>
                                        <th>HOLIDAY</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><span>Tuesday</span></td>
                                        <td><span>Jan 01, 2019</span></td>
                                        <td><span>New Year's Day</span></td>
                                    </tr>
                                    <tr>
                                        <td><span>Monday</span></td>
                                        <td><span>Jan 14, 2019</span></td>
                                        <td><span>Makar Sankranti / Pongal</span></td>
                                    </tr>
                                    <tr>
                                        <td><span>Saturday</span></td>
                                        <td><span>Jan 26, 2019</span></td>
                                        <td><span>Republic Day</span></td>
                                    </tr>
                                    <tr>
                                        <td><span>Monday</span></td>
                                        <td><span>Mar 04, 2019</span></td>
                                        <td><span>Maha Shivaratri</span></td>
                                    </tr>
                                    <tr>
                                        <td><span>Thursday</span></td>
                                        <td><span>Mar 21, 2019</span></td>
                                        <td><span>Holi</span></td>
                                    </tr>
                                    <tr>
                                        <td><span>Friday</span></td>
                                        <td><span>Apr 19, 2019</span></td>
                                        <td><span>Good Friday</span></td>
                                    </tr>
                                    <tr>
                                        <td><span>Wednesday</span></td>
                                        <td><span>Jun 05, 2019</span></td>
                                        <td><span>Eid-ul-Fitar</span></td>
                                    </tr>
                                    <tr>
                                        <td><span>Thursday</span></td>
                                        <td><span>Aug 15, 2019</span></td>
                                        <td><span>Independence Day</span></td>
                                    </tr>
                                    <tr>
                                        <td><span>Wednesday</span></td>
                                        <td><span>Oct 02, 2019</span></td>
                                        <td><span>Mathatma Gandhi Jayanti</span></td>
                                    </tr>
                                    <tr>
                                        <td><span>Wednesday</span></td>
                                        <td><span>Dec 25, 2019</span></td>
                                        <td><span>Christmas</span></td>
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
                <h5 class="modal-title" id="exampleModalLabel">Add Holiday</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="cross-icon" aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <select class="form-control custom-select">
                                <option value="true">Day</option>
                                <option>Monday</option>
                                <option>Tuesday</option>
                                <option>Wednesday</option>
                                <option>Thursday</option>
                                <option>Medical</option>
                                <option>Friday</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Description" />
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <input type="date" data-provide="datepicker" data-date-autoclose="true" class="form-control" placeholder="Date" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Add Holiday</button>
            </div>
        </div>
    </div>
</div>
