<div class="header_btn">
   <div class="header-action">
      <a href="<?php echo base_url('employer/emp-management/assets/list'); ?>" class="btn btn-primary float-right"><i class="fa fa-plus mr-2"></i>Back</a>
   </div>
</div>


<div class="section-body">
   <div class="container-fluid">
     <div class="card">
       <div class="card-body">
          <div class="row clearfix">
          <div class="col-md-4">
                        <div class="form-group">
                           <label class="form-label">Asset Type</label>
                           <select class="custom-select">
                              <option value="STATUS_CODE" selected="">Asset Type</option>
                              <option value="JSON_BODY">JSON body</option>
                              <option value="HEADERS">Headers</option>
                              <option value="TEXT_BODY">Text body</option>
                              <option value="RESPONSE_TIME">Response time</option>
                              </select>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label class="form-label">Asset Details                           </label>
                           <input type="text" class="form-control" placeholder="Asset Details">
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label class="form-label">Asset ID</label>
                           <input type="number" class="form-control" placeholder="
                           Asset ID">
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label class="form-label">Asset Value</label>
                           <input type="number" class="form-control" placeholder="
                          Asset Value">
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label class="form-label">Assets Status</label>
                           <select class="custom-select">
                              <option value="STATUS_CODE" selected="">Lost</option>
                              <option value="JSON_BODY">Recived</option>
                              <option value="HEADERS">Returned</option>
                              </select>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label class="form-label">Issue Date</label>
                           <input type="number" class="form-control" placeholder="
                          Asset Value">
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label class="form-label">Valid Till</label>
                           <input type="date" class="form-control" placeholder="
                           Issue Date
                           ">
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label class="form-label">Returned On</label>
                           <input type="date" class="form-control" placeholder="
                           Valid Till
                           ">
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="form-group">
                           <label class="form-label">Remarks</label>
                           <textarea row="5"></textarea>
                        </div>
                     </div>
           </div>
        </div>         
     </div>
   </div>
 </div>