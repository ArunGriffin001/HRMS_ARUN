<div class="header_btn">
   <div class="header-action">
      <a href="<?php echo base_url('employer/emp-management/project'); ?>" class="btn btn-primary float-right"><i class="fa fa-plus mr-2"></i>Back</a>
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
                  <form method="post" action="<?php echo base_url('employer/emp-management/project/addProject'); ?>" data-parsley-validate="" enctype="multipart/form-data">
                     <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="form-group">
                              <label>Name*</label>
                              <input type="text" name="project_name" class="form-control" placeholder="Project name" required="" data-parsley-required-message="Please enter project name">
                          </div>
                        </div>
                        <!-- <div class="col-lg-6 col-md-6 col-sm-6">
                          <div class="form-group">
                            <div class="">
                            <label>Technology*</label>
                            </div>
                            <select class="form-control" name="technology_name" required="" data-parsley-required-message="Please select technology">
                              <option value="">Select technology</option>
                              <?php
                              if(!empty($tech_arr)){
                                foreach ($tech_arr as $tech_val) {
                                ?>
                                <option value="<?php echo $tech_val->tech_id; ?>"><?php echo $tech_val->tech_name; ?></option>
                                <?php
                                }
                              }
                              ?>
                            </select>
                          </div>
                        </div> -->
                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="form-group">
                              <label>Description*</label>
                               <textarea name="description"></textarea>
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
 <script type="text/javascript">
   $(document).ready(function(){
     CKEDITOR.replace('description');
   });
</script> 