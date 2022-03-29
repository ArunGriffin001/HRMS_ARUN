<div class="section-body">
   <div class="container-fluid">
      <div class="d-flex justify-content-between align-items-center">
         <ul class="nav nav-tabs page-header-tab">
            <!-- <li class="nav-item"><a class="nav-link active" id="user-tab" data-toggle="tab" href="#user-list">List</a></li>
            <li class="nav-item"><a class="nav-link" id="user-tab" data-toggle="tab" href="#user-add">Add New</a></li> -->
         </ul>
         <div class="header-action text-right mt-2">
           <a href="<?php echo base_url(ADMIN_URL).'plan/list'; ?>" class="btn btn-primary"></i>Back</a>
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
                  <form method="post" action="<?php echo base_url('superadmin/submit_plan'); ?>" data-parsley-validate="">
                     <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="form-group">
                              <label>Title</label>
                              <input type="text" name="title" class="form-control" placeholder="Title" data-parsley-required-message="Please enter plan title" required="">
                          </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="form-group">
                              <label>Tag Line</label>
                              <input type="text" name="tag_line" class="form-control" placeholder="Tag line" data-parsley-required-message="Please enter plan tag line" required="">
                          </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="form-group">
                              <label>Description</label>
                               <textarea name="editor1"></textarea>
                          </div>
                        </div>
                        
                        <div class="col-lg-6 col-md-6 col-sm-6">
                          <div class="form-group">
                              <label>Monthly Amount</label>
                              <input type="text" name="monthly_amount" class="form-control" placeholder="Monthly amount" data-parsley-type="number" data-parsley-required-message="Please enter monthly ammount in digit" required="">
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                          <div class="form-group">
                              <label>Yearly Amount</label>
                              <input type="text" name="yearly_amount" class="form-control" placeholder="Yearly amount" data-parsley-type="number" data-parsley-required-message="Please enter yearly amount in digit" required="">
                          </div>
                        </div>
                         <div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="form-group">
                            <div>
                              <label>Popular</label>
                            </div>
                              <input type="radio" name="is_popular" value="Yes" required=""> Yes
                              <input type="radio" name="is_popular" value="No" required="" checked=""> No
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
   CKEDITOR.replace( 'editor1');
</script>


