<div class="header_btn">
    <div class="header-action">
        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-plus mr-2"></i>Add Attendance</button>
        </div>
  </div>
<div class="section-body mt-3 attendance-search">
     <div class="container-fluid">
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

<div class="section-body mt-3 attendance-table">
     <div class="container-fluid">
         <div class="row clearfix">
             <div class="col-md-12">
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="table-responsive">
                             <!-- <table class="table table-striped custom-table table-nowrap mb-0">
                                 <thead>
                                     <tr>
                                         <th>Employee</th>
                                         <th>1</th>
                                         <th>2</th>
                                         <th>3</th>
                                         <th>4</th>
                                         <th>5</th>
                                         <th>6</th>
                                         <th>7</th>
                                         <th>8</th>
                                         <th>9</th>
                                         <th>10</th>
                                         <th>11</th>
                                         <th>12</th>
                                         <th>13</th>
                                         <th>14</th>
                                         <th>15</th>
                                         <th>16</th>
                                         <th>17</th>
                                         <th>18</th>
                                         <th>19</th>
                                         <th>20</th>
                                         <th>22</th>
                                         <th>23</th>
                                         <th>24</th>
                                         <th>25</th>
                                         <th>26</th>
                                         <th>27</th>
                                         <th>28</th>
                                         <th>29</th>
                                         <th>30</th>
                                         <th>31</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <tr>
                                         <td>
                                             <h2 class="table-avatar">
                                                 <a class="avatar avatar-xs" href="profile.html"><img alt="" src="<?php echo base_url('template/'); ?>employer/assets/images/xs/avatar1.jpg" /></a>
                                                 <a href="profile.html">John Doe</a>
                                             </h2>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <div class="half-day">
                                                 <span class="first-off">
                                                     <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                                 </span>
                                                 <span class="first-off"><i class="fa fa-close text-danger"></i></span>
                                             </div>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td><i class="fa fa-close text-danger"></i></td>
                                         <td><i class="fa fa-close text-danger"></i></td>
                                         <td><i class="fa fa-close text-danger"></i></td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td><i class="fa fa-close text-danger"></i></td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <div class="half-day">
                                                 <span class="first-off"><i class="fa fa-close text-danger"></i></span>
                                                 <span class="first-off">
                                                     <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                                 </span>
                                             </div>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td><i class="fa fa-close text-danger"></i></td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td><i class="fa fa-close text-danger"></i></td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                     </tr>
                                     <tr>
                                         <td>
                                             <h2 class="table-avatar">
                                                 <a class="avatar avatar-xs" href="profile.html"><img alt="" src="<?php echo base_url('template/'); ?>employer/assets/images/xs/avatar2.jpg" /></a>
                                                 <a href="profile.html">Richard Miles</a>
                                             </h2>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td><i class="fa fa-close text-danger"></i></td>
                                         <td><i class="fa fa-close text-danger"></i></td>
                                         <td><i class="fa fa-close text-danger"></i></td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td><i class="fa fa-close text-danger"></i></td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td><i class="fa fa-close text-danger"></i></td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td><i class="fa fa-close text-danger"></i></td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                     </tr>
                                     <tr>
                                         <td>
                                             <h2 class="table-avatar">
                                                 <a class="avatar avatar-xs" href="profile.html"><img alt="" src="<?php echo base_url('template/'); ?>employer/assets/images/xs/avatar3.jpg" /></a>
                                                 <a href="profile.html">John Smith</a>
                                             </h2>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td><i class="fa fa-close text-danger"></i></td>
                                         <td><i class="fa fa-close text-danger"></i></td>
                                         <td><i class="fa fa-close text-danger"></i></td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td><i class="fa fa-close text-danger"></i></td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td><i class="fa fa-close text-danger"></i></td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td><i class="fa fa-close text-danger"></i></td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                     </tr>
                                     <tr>
                                         <td>
                                             <h2 class="table-avatar">
                                                 <a class="avatar avatar-xs" href="profile.html"><img alt="" src="<?php echo base_url('template/'); ?>employer/assets/images/xs/avatar4.jpg" /></a>
                                                 <a href="profile.html">Mike Litorus</a>
                                             </h2>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td><i class="fa fa-close text-danger"></i></td>
                                         <td><i class="fa fa-close text-danger"></i></td>
                                         <td><i class="fa fa-close text-danger"></i></td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td><i class="fa fa-close text-danger"></i></td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td><i class="fa fa-close text-danger"></i></td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td><i class="fa fa-close text-danger"></i></td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                     </tr>
                                     <tr>
                                         <td>
                                             <h2 class="table-avatar">
                                                 <a class="avatar avatar-xs" href="profile.html"><img alt="" src="<?php echo base_url('template/'); ?>employer/assets/images/xs/avatar5.jpg" /></a>
                                                 <a href="profile.html">Wilmer Deluna</a>
                                             </h2>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td><i class="fa fa-close text-danger"></i></td>
                                         <td><i class="fa fa-close text-danger"></i></td>
                                         <td><i class="fa fa-close text-danger"></i></td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td><i class="fa fa-close text-danger"></i></td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td><i class="fa fa-close text-danger"></i></td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td><i class="fa fa-close text-danger"></i></td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                     </tr>
                                     <tr>
                                         <td>
                                             <h2 class="table-avatar">
                                                 <a class="avatar avatar-xs" href="profile.html"><img alt="" src="<?php echo base_url('template/'); ?>employer/assets/images/xs/avatar6.jpg" /></a>
                                                 <a href="profile.html">Jeffrey Warden</a>
                                             </h2>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td><i class="fa fa-close text-danger"></i></td>
                                         <td><i class="fa fa-close text-danger"></i></td>
                                         <td><i class="fa fa-close text-danger"></i></td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td><i class="fa fa-close text-danger"></i></td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td><i class="fa fa-close text-danger"></i></td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td><i class="fa fa-close text-danger"></i></td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                     </tr>
                                     <tr>
                                         <td>
                                             <h2 class="table-avatar">
                                                 <a class="avatar avatar-xs" href="profile.html"><img alt="" src="<?php echo base_url('template/'); ?>employer/assets/images/xs/avatar7.jpg" /></a>
                                                 <a href="profile.html">Bernardo Galaviz</a>
                                             </h2>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td><i class="fa fa-close text-danger"></i></td>
                                         <td><i class="fa fa-close text-danger"></i></td>
                                         <td><i class="fa fa-close text-danger"></i></td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td><i class="fa fa-close text-danger"></i></td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td><i class="fa fa-close text-danger"></i></td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td><i class="fa fa-close text-danger"></i></td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                     </tr>
                                     <tr>
                                         <td>
                                             <h2 class="table-avatar">
                                                 <a class="avatar avatar-xs" href="profile.html"><img alt="" src="<?php echo base_url('template/'); ?>employer/assets/images/xs/avatar8.jpg" /></a>
                                                 <a href="profile.html">Lesley Grauer</a>
                                             </h2>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td><i class="fa fa-close text-danger"></i></td>
                                         <td><i class="fa fa-close text-danger"></i></td>
                                         <td><i class="fa fa-close text-danger"></i></td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td><i class="fa fa-close text-danger"></i></td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td><i class="fa fa-close text-danger"></i></td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td><i class="fa fa-close text-danger"></i></td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                     </tr>
                                     <tr>
                                         <td>
                                             <h2 class="table-avatar">
                                                 <a class="avatar avatar-xs" href="profile.html"><img alt="" src="<?php echo base_url('template/'); ?>employer/assets/images/xs/avatar9.jpg" /></a>
                                                 <a href="profile.html">Jeffery Lalor</a>
                                             </h2>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td><i class="fa fa-close text-danger"></i></td>
                                         <td><i class="fa fa-close text-danger"></i></td>
                                         <td><i class="fa fa-close text-danger"></i></td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td><i class="fa fa-close text-danger"></i></td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td><i class="fa fa-close text-danger"></i></td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td><i class="fa fa-close text-danger"></i></td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                     </tr>
                                     <tr>
                                         <td>
                                             <h2 class="table-avatar">
                                                 <a class="avatar avatar-xs" href="profile.html"><img alt="" src="<?php echo base_url('template/'); ?>employer/assets/images/xs/avatar10.jpg" /></a>
                                                 <a href="profile.html">Loren Gatlin</a>
                                             </h2>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td><i class="fa fa-close text-danger"></i></td>
                                         <td><i class="fa fa-close text-danger"></i></td>
                                         <td><i class="fa fa-close text-danger"></i></td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td><i class="fa fa-close text-danger"></i></td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td><i class="fa fa-close text-danger"></i></td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td><i class="fa fa-close text-danger"></i></td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                         <td>
                                             <a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a>
                                         </td>
                                     </tr>
                                 </tbody>
                             </table> -->


                             <table class="table table-hover table-striped table-vcenter text-nowrap mb-0">
                                    <thead>
                                       <tr>
                                         <th style="text-align:center">Name</th>
                                          <th style="text-align:center">Date</th>
                                          <th style="text-align:center">status</th>
                                          <th style="text-align:center">Action</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <tr>
                                          <td>
                                             <div class="font-15">Marshall Nichols</div>
                                          </td>
                                          <td>24 July, 2019</td>
                                          <td><span class="tag tag-danger">Present</span></td>
                                          <td>
                                             <button type="button" class="btn btn-icon btn-sm" title="Approved"><i class="fa fa-check"></i></button>
                                             <button type="button" class="btn btn-icon btn-sm js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o"></i></button>
                                          </td>
                                       </tr>
                                       <tr>
                                       <td>
                                            <div class="font-15">Gary Camara</div>
                                         </td>
                                          <td>24 July, 2019</td>
                                          <td><span class="tag tag-warning">on leave</span></td>
                                       
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
               <h5 class="modal-title" id="exampleModalLabel">Add attendence</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           </div>
           <div class="modal-body">
            <form>
               <div class="row">
                  
                  <div class="col-md-6">
                     <label class="control-label">Employee</label>
                     <select class="form-control" data-placeholder="Choose a color..." name="category-color">
                        <option value="success">Gary Camara</option>
                        <option value="danger">Gary Camara</option>
                        <option value="success">jhon doe</option>
                        <option value="danger">alies bell</option>
                     </select>
                  </div>
                  <div class="col-md-6">
                     <label class="control-label">status</label>
                     <select class="form-control" data-placeholder="Choose a color..." name="category-color">
                        <option value="success">Present</option>
                        <option value="danger">on leave</option>
                     </select>
                  </div>

                  <div class="col-md-6">
                     <label class="control-label">Date</label>
                     <input class="form-control" placeholder="Enter name" type="date" name="name">
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
</div>
        