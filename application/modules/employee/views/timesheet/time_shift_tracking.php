
<div class="section-body mt-3">
    <div class="container-fluid">
        <div class="tab-content mt-3">
            <div class="tab-pane fade show active" id="Accounts-Invoices" role="tabpanel">
                
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Time Sheet Tracking</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped table-vcenter">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Date</th>
                                        <th>Punch in</th>
                                        <th>Over Time</th>
                                        <th>Punch out</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>jhon Smith</td>

                                        <td>07 March, 2018</td>
                                        <td>10:AM</td>
                                        <td>1 Hours</td>

                                        <td>6pm</td>
                                       
                                    </tr>
                                    <tr>
                                        <td>michael niyan</td>
                                        <td>25 Jun, 2018</td>
                                        <td>10:AM</td>
                                        <td>2 Hours</td>

                                        <td>8pm</td>
                                        
                                    </tr>
                                    <tr>
                                        <td>Aliana</td>

                                        <td>12 July, 2018</td>
                                        <td>10:AM</td>
                                        <td>2hours</td>

                                        <td>7pm</td>
                                        
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
