<div class="section-body">
   <div class="container-fluid">
      <div class="d-flex justify-content-between align-items-center">
         <ul class="nav nav-tabs page-header-tab">
            <!-- <li class="nav-item"><a class="nav-link active" id="user-tab" data-toggle="tab" href="#user-list">List</a></li>
            <li class="nav-item"><a class="nav-link" id="user-tab" data-toggle="tab" href="#user-add">Add New</a></li> -->
         </ul>
         <div class="header-action text-right mt-2">
           <a href="<?php echo base_url(ADMIN_URL).'blog/list'; ?>" class="btn btn-primary"></i>Back</a>
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
                  <form method="post" action="<?php echo base_url('superadmin/blog/updateBlog/').encode($record->id); ?>" data-parsley-validate="" enctype="multipart/form-data">
                     <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="form-group">
                              <label>Title</label>
                              <input type="text" name="title" value="<?php echo $record->title; ?>" class="form-control" placeholder="Title" required="">
                          </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="form-group">
                              <label>Description</label>
                               <textarea name="editor1"><?php echo $record->description; ?></textarea>
                          </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                          <div class="col-12">
                            <label>Blog Image</label>
                          </div>  
                          <div class="col-12 from-group">
                           <!--  <input type="file" name="blog_img" class="dropify" data-height="200"  accept="image/gif, image/jpeg, image/png, image/jpg" class="form-control"  data-default-file="" required> -->
                            <?php
                              if(!empty($record->blog_img)){
                              ?>
                             <input type="file" name="blog_img" class="dropify" data-height="200"  accept="image/gif, image/jpeg, image/png, image/jpg" class="form-control"  data-default-file="<?php echo base_url();?>uploads/superadmin/blogs/<?php echo $record->blog_img; ?>"  <?php echo (!empty($record->blog_img) ? $record->blog_img : 'required');?> >
                              <?php
                              }else{
                              ?>
                              <input type="file" name="blog_img" class="dropify" data-height="200"  accept="image/gif, image/jpeg, image/png, image/jpg" class="form-control"  data-default-file="" required>
                              <?php
                              }
                              ?>
                              <input type="hidden" name="old_img" value="<?php echo (!empty($record->blog_img) ? $record->blog_img : '');?>" >
                          </div><!-- end -->
                        </div>
                        
                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="form-group">
                            <div class="">
                            <label>Category</label>
                            </div>
                            <?php
                            //die;
                            if(!empty($blog_cat_arr)){
                              foreach ($blog_cat_arr as $key => $blog_cat) {
                                $res = '';
                                $res = array_search($blog_cat->id, array_column($blog_cat_option, 'cat_id'));
                              ?>
                              <input type="checkbox" name="category_id[]" class="" value="<?php echo $blog_cat->id; ?>" data-parsley-mincheck="1" <?php echo ($res === false ? '' : 'checked'); ?> required> <?php echo ' '. $blog_cat->title; ?>
                              <?php
                              }
                            }
                            ?>
                          </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="form-group">
                             <div class="col-12">
                            <label>Tags</label>
                          </div>
                          <?php
                            if(!empty($blog_tag_arr)){
                              foreach ($blog_tag_arr as $key => $blog_tag) {
                                //$res = '';
                                $res = array_search($blog_tag->id, array_column($blog_tag_option, 'blog_tag_id'));
                                 //var_dump($res);
                              ?>
                              <input type="checkbox" name="tag_id[]" class="" value="<?php echo $blog_tag->id; ?>" data-parsley-mincheck="1" <?php echo($res === false ? '' : 'checked'); ?> required> <?php echo ' '.$blog_tag->title; ?>
                              <?php
                              }
                            }
                            ?>
                            
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


