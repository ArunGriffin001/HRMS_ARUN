<div class="section-body">
   <div class="container-fluid">
      <div class="d-flex justify-content-between align-items-center">
         <ul class="nav nav-tabs page-header-tab">
            <!-- <li class="nav-item"><a class="nav-link active" id="user-tab" data-toggle="tab" href="#user-list">List</a></li>
            <li class="nav-item"><a class="nav-link" id="user-tab" data-toggle="tab" href="#user-add">Add New</a></li> -->
         </ul>
         <div class="header-action text-right mt-2">
            <a href="<?php echo base_url('superadmin/users'); ?>" class="btn btn-primary">Back</a>
           <!--  <button type="button" class="btn btn-primary"><i class="fe fe-plus mr-2"></i>Add Tag</button> -->
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
                  <h3 class="card-title"><?php echo (!empty($page_heading) ? $page_heading : ''); ?></h3>
               </div>
            </div>
         </div>
         <div class="" id="user-add" role="tabpanel">
            <div class="card">
               <div class="card-body">
               <?php
                 if($this->session->flashdata('errorclass') !='')
                 {
                   $error_class = $this->session->flashdata('errorclass');
                  
                  echo'<div class="text-left alert alert-'.$error_class.'">';
                  if(is_array($this->session->flashdata('error_message'))){
                       foreach ($this->session->flashdata('error_message') as $error_message) {
                       ?>
                           <?php echo $error_message.'</br>'; ?>
                   <?php
                       }
                   }else{
                       echo $this->session->flashdata('error_message');
                   }
                   echo '</div>';
                 }
               ?>
                  <form method="post" action="<?php echo base_url('superadmin/users/update/').encode($employer->employee_id); ?>" data-parsley-validate="" enctype="multipart/form-data">
                     <div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                          <div class="form-group">
                              <label for="first_name">First Name</label>
                              <input type="text" name="first_name" value="<?php echo(!empty($employer->first_name) ? $employer->first_name : ''); ?>" class="form-control" id="first_name" placeholder="First Name" data-parsley-required-message="Please enter first name" required="" autocomplete="off">
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                          <div class="form-group">
                              <label for="last_name">Last Name</label>
                              <input type="text" name="last_name" value="<?php echo(!empty($employer->last_name) ? $employer->last_name : ''); ?>" class="form-control" id="first_name" placeholder="Last Name" data-parsley-required-message="Please enter first name" required="" autocomplete="off">
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                          <div class="form-group">
                              <label for="email">Email</label>
                              <input type="text" value="<?php echo(!empty($employer->email_id) ? $employer->email_id : ''); ?>" class="form-control" placeholder="Email" id="email" data-parsley-required-message="Please enter email" required="" autocomplete="off" data-parsley-type="email" readonly>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                          <div class="form-group">
                              <label for="Company_name">Company name</label>
                              <input type="text" name="company_name" value="<?php echo(!empty($employer->company_name) ? $employer->company_name : ''); ?>" class="form-control" id="Company_name" placeholder="Company name" data-parsley-required-message="Please enter company name" required="" autocomplete="off">
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                          <div class="form-group">
                              <label for="Company_headcount">Company headcount</label>
                              <input type="text" name="team_member" value="<?php echo(!empty($employer->team_member) ? $employer->team_member : ''); ?>" class="form-control" id="Company_headcount" placeholder="Company headcount" data-parsley-required-message="Please enter company headcount" required="" autocomplete="off" data-parsley-type="number">
                              <input type="hidden" name="employer_id" value="<?php echo encode($employer->employer_id); ?>">
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                          <div class="form-group">
                              <label for="mobile_no">Phone</label>
                              <input type="text" name="mobile_no" value="<?php echo(!empty($employer->mobile_no) ? $employer->mobile_no : ''); ?>" class="form-control" id="mobile_no" placeholder="Phone number" data-parsley-required-message="Please enter phone number" required="" autocomplete="off" data-parsley-type="number" minlength="10" maxlength="12">
                             
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                          <div class="form-group">
                              <label for="password">Password</label>
                              <input type="text" name="password" class="form-control" id="password" placeholder="Password" data-parsley-required-message="Please enter password" autocomplete="off" minlength="6">
                             
                          </div>
                        </div>
                        

                        <div class="col-lg-12 col-md-12 col-sm-12">
                           <div class="form-group">
                              <input type="submit" class="btn btn-primary" required="">
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

