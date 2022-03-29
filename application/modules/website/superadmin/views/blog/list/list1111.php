<div class="section-body">
   <div class="container-fluid">
      <div class="d-flex justify-content-between align-items-center">
         <ul class="nav nav-tabs page-header-tab">
            <li class="nav-item"><a class="nav-link active" id="user-tab" data-toggle="tab" href="#user-list">List</a></li>
            <li class="nav-item"><a class="nav-link" id="user-tab" data-toggle="tab" href="#user-add">Add New</a></li>
         </ul>
         <div class="header-action text-right mt-2">
            <button type="button" class="btn btn-primary"><i class="fe fe-plus mr-2"></i>Add Blog</button>
         </div>
      </div>
   </div>
</div>
<div class="section-body mt-3">
   <div class="container-fluid">
      <div class="tab-content mt-3">
         <div class="tab-pane fade show active" id="user-list" role="tabpanel">
            <div class="card">
               <div class="card-header">
                  <h3 class="card-title">Blog List</h3>
                  <div class="card-options">
                     <form>
                        <div class="input-group">
                           <input type="text" class="form-control form-control-sm" placeholder="Search something..." name="s">
                           <span class="input-group-btn ml-2"><button class="btn btn-sm btn-default" type="submit"><span class="fe fe-search"></span></button></span>
                        </div>
                     </form>
                  </div>
               </div>
               <div class="card-body">
                  <div class="table-responsive">
                     <table class="table table-striped table-hover table-vcenter text-nowrap mb-0">
                        <thead>
                           <tr>
                              <th class="w60">Name</th>
                              <th></th>
                              <th></th>
                              <th>Created Date</th>
                              <th>Role</th>
                              <th class="w100">Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td class="width45">
                                 <span class="avatar avatar-blue" data-toggle="tooltip" data-placement="top" title="" data-original-title="Avatar Name">NG</span>
                              </td>
                              <td>
                                 <h6 class="mb-0">Marshall Nichols</h6>
                                 <span><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="80ede1f2f3e8e1ececadeec0e7ede1e9ecaee3efed">[email&#160;protected]</a></span>
                              </td>
                              <td><span class="tag tag-danger">Super Admin</span></td>
                              <td>24 Jun, 2015</td>
                              <td>CEO and Founder</td>
                              <td></td>
                           </tr>
                           <tr>
                              <td>
                                 <img src="<?php echo base_url('template/'); ?>superadmin/assets/images/xs/avatar1.jpg" data-toggle="tooltip" data-placement="top" title="" alt="Avatar" class="avatar" data-original-title="Avatar Name">
                              </td>
                              <td>
                                 <h6 class="mb-0">Susie Willis</h6>
                                 <span><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="6c1f191f1f0509411b2c0b010d0500420f0301">[email&#160;protected]</a></span>
                              </td>
                              <td><span class="tag tag-info">Admin</span></td>
                              <td>28 Jun, 2015</td>
                              <td>Team Lead</td>
                              <td>
                                 <button type="button" class="btn btn-icon" title="Edit"><i class="fa fa-edit"></i></button>
                                 <button type="button" class="btn btn-icon js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o text-danger"></i></button>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <img src="<?php echo base_url('template/'); ?>superadmin/assets/images/xs/avatar2.jpg" data-toggle="tooltip" data-placement="top" title="" alt="Avatar" class="avatar" data-original-title="Avatar Name">
                              </td>
                              <td>
                                 <h6 class="mb-0">Debra Stewart</h6>
                                 <span><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="9df9f8ffeffcddfaf0fcf4f1b3fef2f0">[email&#160;protected]</a></span>
                              </td>
                              <td><span class="tag tag-default">Employee</span></td>
                              <td>21 July, 2015</td>
                              <td>Team Lead</td>
                              <td>
                                 <button type="button" class="btn btn-icon" title="Edit"><i class="fa fa-edit"></i></button>
                                 <button type="button" class="btn btn-icon js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o text-danger"></i></button>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <span class="avatar avatar-green" data-toggle="tooltip" data-placement="top" title="" data-original-title="Avatar Name">KH</span>
                              </td>
                              <td>
                                 <h6 class="mb-0">Erin Gonzales</h6>
                                 <span><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="f0b582999e9f9e8a919c9583b0979d91999cde939f9d">[email&#160;protected]</a></span>
                              </td>
                              <td><span class="tag tag-default">Employee</span></td>
                              <td>21 July, 2015</td>
                              <td>Web Developer</td>
                              <td>
                                 <button type="button" class="btn btn-icon" title="Edit"><i class="fa fa-edit"></i></button>
                                 <button type="button" class="btn btn-icon js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o text-danger"></i></button>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <img src="<?php echo base_url('template/'); ?>superadmin/assets/images/xs/avatar3.jpg" data-toggle="tooltip" data-placement="top" title="" alt="Avatar" class="avatar" data-original-title="Avatar Name">
                              </td>
                              <td>
                                 <h6 class="mb-0">Susie Willis</h6>
                                 <span><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="14676167677d713963547379757d783a777b79">[email&#160;protected]</a></span>
                              </td>
                              <td><span class="tag tag-info">Admin</span></td>
                              <td>28 Jun, 2015</td>
                              <td>Team Lead</td>
                              <td>
                                 <button type="button" class="btn btn-icon" title="Edit"><i class="fa fa-edit"></i></button>
                                 <button type="button" class="btn btn-icon js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o text-danger"></i></button>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <img src="<?php echo base_url('template/'); ?>superadmin/assets/images/xs/avatar4.jpg" data-toggle="tooltip" data-placement="top" title="" alt="Avatar" class="avatar" data-original-title="Avatar Name">
                              </td>
                              <td>
                                 <h6 class="mb-0">Debra Stewart</h6>
                                 <span><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="afcbcacdddceefc8c2cec6c381ccc0c2">[email&#160;protected]</a></span>
                              </td>
                              <td><span class="tag tag-default">Employee</span></td>
                              <td>21 July, 2015</td>
                              <td>Team Lead</td>
                              <td>
                                 <button type="button" class="btn btn-icon" title="Edit"><i class="fa fa-edit"></i></button>
                                 <button type="button" class="btn btn-icon js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o text-danger"></i></button>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <img src="<?php echo base_url('template/'); ?>superadmin/assets/images/xs/avatar5.jpg" data-toggle="tooltip" data-placement="top" title="" alt="Avatar" class="avatar" data-original-title="Avatar Name">
                              </td>
                              <td>
                                 <h6 class="mb-0">Erin Gonzales</h6>
                                 <span><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="4b0e3922252425312a272e380b2c262a222765282426">[email&#160;protected]</a></span>
                              </td>
                              <td><span class="tag tag-default">Employee</span></td>
                              <td>21 July, 2016</td>
                              <td>Web Developer</td>
                              <td>
                                 <button type="button" class="btn btn-icon" title="Edit"><i class="fa fa-edit"></i></button>
                                 <button type="button" class="btn btn-icon js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o text-danger"></i></button>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <img src="<?php echo base_url('template/'); ?>superadmin/assets/images/xs/avatar6.jpg" data-toggle="tooltip" data-placement="top" title="" alt="Avatar" class="avatar" data-original-title="Avatar Name">
                              </td>
                              <td>
                                 <h6 class="mb-0">Ava Alexander</h6>
                                 <span><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="5839343d2039363c3d2a183f35393134763b3735">[email&#160;protected]</a></span>
                              </td>
                              <td><span class="tag tag-success">HR Admin</span></td>
                              <td>21 July, 2016</td>
                              <td>HR</td>
                              <td>
                                 <button type="button" class="btn btn-icon" title="Edit"><i class="fa fa-edit"></i></button>
                                 <button type="button" class="btn btn-icon js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o text-danger"></i></button>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <span class="avatar avatar-green" data-toggle="tooltip" data-placement="top" title="" data-original-title="Avatar Name">KH</span>
                              </td>
                              <td>
                                 <h6 class="mb-0">Ava Alexander</h6>
                                 <span><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="d3b2bfb6abb2bdb7b6a193b4beb2babffdb0bcbe">[email&#160;protected]</a></span>
                              </td>
                              <td><span class="tag tag-success">HR Admin</span></td>
                              <td>21 July, 2020</td>
                              <td>HR</td>
                              <td>
                                 <button type="button" class="btn btn-icon" title="Edit"><i class="fa fa-edit"></i></button>
                                 <button type="button" class="btn btn-icon js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o text-danger"></i></button>
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