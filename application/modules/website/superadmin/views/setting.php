<div class="section-body">
   <div class="container-fluid">
      <div class="d-flex justify-content-between align-items-center">
         <ul class="nav nav-tabs page-header-tab">
            <!-- <li class="nav-item"><a class="nav-link active" id="user-tab" data-toggle="tab" href="#user-list">List</a></li>
            <li class="nav-item"><a class="nav-link" id="user-tab" data-toggle="tab" href="#user-add">Add New</a></li> -->
         </ul>
         <div class="header-action text-right mt-2">
           <a href="<?php echo base_url(ADMIN_URL).'testimonial/list'; ?>" class="btn btn-primary"></i>Back</a>
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
                  <form method="post" action="<?php echo base_url('superadmin/update_setting'); ?>" data-parsley-validate="" enctype="multipart/form-data">
                     <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="form-group">
                              <label>Logo</label>
                              <input type="file" name="name" value="<?php ?>" class="form-control" placeholder="Name" required="">
                              <?php
                              if(!empty($setting['site_logo']->meta_value)){
                              ?>
                               <img src="<?php echo base_url();?>uploads/superadmin/setting/<?php echo $setting['site_logo']->meta_value; ?>" width="150">
                              <?php
                              }
                              ?>
                             
                          </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="form-group">
                              <label>Facebook url</label>
                              <input type="text" name="" value="<?php echo (!empty($setting['facebook_url']->meta_value) ? $setting['facebook_url']->meta_value : ''); ?>" class="form-control" placeholder="Facebook url" required="">
                          </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="form-group">
                              <label>Twitter url</label>
                              <input type="text" name="" class="form-control" value="<?php echo (!empty($setting['twitter_url']->meta_value) ? $setting['twitter_url']->meta_value : ''); ?>" placeholder="Twitter url" required="">
                          </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="form-group">
                              <label>Youtube url</label>
                              <input type="text" name="" class="form-control" value="<?php echo (!empty($setting['youtube_url']->meta_value) ? $setting['youtube_url']->meta_value : ''); ?>" placeholder="Youtube url" required="">
                          </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="form-group">
                              <label>Linkedin url</label>
                              <input type="text" name="" class="form-control" value="<?php echo (!empty($setting['linkedin_url']->meta_value) ? $setting['linkedin_url']->meta_value : ''); ?>" placeholder="Linkedin url" required="">
                          </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="form-group">
                              <label>Copyright</label>
                              <input type="text" name="role_name" class="form-control" value="<?php echo (!empty($setting['copyrights']->meta_value) ? $setting['copyrights']->meta_value : ''); ?>" placeholder="Copyright" required="">
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



