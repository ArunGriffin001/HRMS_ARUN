<div class="section-body">
   <div class="container-fluid">
      <div class="d-flex justify-content-between align-items-center">
         <ul class="nav nav-tabs page-header-tab">
            <!-- <li class="nav-item"><a class="nav-link active" id="Departments-tab" data-toggle="tab" href="#Departments-list">List View</a></li> -->
           <!--  <li class="nav-item"><a class="nav-link" id="Departments-tab" data-toggle="tab" href="#Departments-grid">Grid View</a></li> -->
         </ul>
         <div class="header-action">
           <!--  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fe fe-plus mr-2"></i><?php echo $this->lang->line('btn_add_project'); ?></button> -->
            <a class="btn btn-primary" href="<?php echo base_url('employer/emp-management/assets/add'); ?>"><i class="fe fe-plus mr-2"></i>Add </a>
         </div>
      </div>

      <div class="section-body mt-3">
               <div class="container-fluid">
                  <div class="tab-content mt-3">
                     <div class="tab-pane fade show active" id="Departments-list" role="tabpanel">
                        <div class="card">
                           <div class="card-header">
                              <h3 class="card-title">Assets</h3>
                              <div class="card-options">
                                 <form>
                                    <div class="input-group">
                                       <input type="text" class="form-control form-control-sm" placeholder="Search something..." name="s">
                                       <span class="input-group-btn ml-2"><button class="btn btn-icon" type="submit"><span class="fe fe-search"></span></button></span>
                                    </div>
                                 </form>
                              </div>
                           </div>
                           <div class="row clearfix">
                              <div class="col-lg-4 col-md-6">
                                 <div class="card">
                                    <div class="card-body text-center">
                                       <i class="fa fa-laptop card-icon" aria-hidden="true"></i>
                                       <h6 class="mt-3">Acer Laptop</h6>
                                    
                                       <button type="button" class="btn btn-icon btn-outline-primary"><i class="fa fa-pencil"></i></button>
                                       <button type="button" class="btn btn-icon btn-outline-danger"><i class="fa fa-trash"></i></button>
                                    </div>
                                    <div class="card-footer text-center">
                                       <div class="row clearfix">
                                          <div class="col-6">
                                             <h5 class="mb-0">Serial No.</h5>
                                             <div class="text-muted">#425785369</div>
                                          </div>
                                          <div class="col-6">
                                             <h5 class="mb-0">Issued on </h5>
                                             <div class="text-muted">01 Jan 2013</div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-lg-4 col-md-6">
                                 <div class="card">
                                    <div class="card-body text-center">
                                       <i class="fa fa-mobile card-icon" aria-hidden="true"></i>
                                       <h6 class="mt-3">Mobile Phone</h6>
                                       <button type="button" class="btn btn-icon btn-outline-primary"><i class="fa fa-pencil"></i></button>
                                       <button type="button" class="btn btn-icon btn-outline-danger"><i class="fa fa-trash"></i></button>
                                    </div>
                                    <div class="card-footer text-center">
                                       <div class="row clearfix">
                                          <div class="col-6">
                                             <h5 class="mb-0">Serial No.</h5>
                                             <div class="text-muted">#425785369</div>
                                          </div>
                                          <div class="col-6">
                                             <h5 class="mb-0">Issued on </h5>
                                             <div class="text-muted">01 Jan 2013</div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-lg-4 col-md-6">
                                 <div class="card">
                                    <div class="card-body text-center">
                                       <i class="fa fa-usb card-icon" aria-hidden="true"></i>
                                       <h6 class="mt-3">USB cable</h6>
                                       <button type="button" class="btn btn-icon btn-outline-primary"><i class="fa fa-pencil"></i></button>
                                       <button type="button" class="btn btn-icon btn-outline-danger"><i class="fa fa-trash"></i></button>
                                    </div>
                                    <div class="card-footer text-center">
                                       <div class="row clearfix">
                                          <div class="col-6">
                                             <h5 class="mb-0">Serial No.</h5>
                                             <div class="text-muted">#425785369</div>
                                          </div>
                                          <div class="col-6">
                                             <h5 class="mb-0">Issued on </h5>
                                             <div class="text-muted">01 Jan 2013</div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           
                           </div>
                        </div>
                     </div>
                  
                  </div>
               </div>
            </div>

   </div>
</div>
       


     
<style>
   .card-icon{
font-size: 50px;
   }
</style>