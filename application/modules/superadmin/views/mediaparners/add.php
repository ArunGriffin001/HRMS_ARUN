<div class="section-body">
   <div class="container-fluid">
      <div class="d-flex justify-content-between align-items-center">
         <ul class="nav nav-tabs page-header-tab">
            <!-- <li class="nav-item"><a class="nav-link active" id="user-tab" data-toggle="tab" href="#user-list">List</a></li>
            <li class="nav-item"><a class="nav-link" id="user-tab" data-toggle="tab" href="#user-add">Add New</a></li> -->
         </ul>
         <div class="header-action text-right mt-2">
            <a href="<?php echo base_url(ADMIN_URL).'blog-tag/list'; ?>" class="btn btn-primary"></i>Back</a>
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

                  <form method="post" enctype="multipart/form-data" action="<?php echo base_url('superadmin/media-parners/add'); ?>" data-parsley-validate=""  >
                     <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                           <div class="form-group">
                              <label>Title</label>
                              <input type="text" name="title" class="form-control" placeholder="Title" required="">
                           </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12">
                           <div class="form-group">
                              <label>Link</label>
                              <input type="text" name="link" class="form-control" placeholder="link" required="">
                           </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12">
                           <div class="form-group">
                              <label>Images</label>
                              <input type="file" name="images" class="dropify" data-height="200"  accept="image/gif, image/jpeg, image/png, image/jpg"  data-default-file="" required>
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