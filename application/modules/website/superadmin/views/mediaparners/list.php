<div class="section-body">
   <div class="container-fluid">
      <div class="d-flex justify-content-between align-items-center">
         <ul class="nav nav-tabs page-header-tab">
            <!-- <li class="nav-item"><a class="nav-link active" id="user-tab" data-toggle="tab" href="#user-list">List</a></li>
            <li class="nav-item"><a class="nav-link" id="user-tab" data-toggle="tab" href="#user-add">Add New</a></li> -->
         </ul>
         <div class="header-action text-right mt-2">
            <a href="<?php echo base_url('superadmin/media-parners/add'); ?>" class="btn btn-primary"><i class="fe fe-plus mr-2"></i>Add</a>
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
        <div class="tab-pane fade show active" id="user-list" role="tabpanel">
            <div class="card">
               <!-- <div class="card-header">
                  <h3 class="card-title"><?php echo (!empty($page_sub_heading) ? $page_sub_heading : ''); ?></h3>
               </div> -->
            </div>
         </div>
         <div class="tab-pane fade show active" id="user-list" role="tabpanel">
            <div class="card">
               <!-- <div class="card-header">
                 <h3 class="card-title"><?php echo (!empty($page_heading) ? $page_heading : ''); ?></h3>
                 
               </div> -->
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
                  <div class="table-responsive">
                  <table id="blogTagList1" class="table table-striped table-hover table-vcenter text-nowrap mb-0">
                  <thead>
                     <tr>
                       <th class="text-center">SNo.</th>
                       <th class="text-center">Title</th>
                       <th class="text-center">link</th>
                       <th class="text-center">Images</th>
                       <th class="text-center">Action</th>
                     </tr>
                  </thead>
                   <tbody>
                    <?php
                    $i=0;
                    foreach($media_parners as $row){
                      $i++;
                    ?>
                     <tr>
                       <td class="text-center"><?php echo $i;?></td>
                       <td class="text-center"><?php echo $row['title']?></td>
                       <td class="text-center"><?php echo $row['link']?></td>
                       <td class="text-center"><img src="<?php echo base_url("uploads/images/media_parners/".$row['images'])?>" width="80"></td>
                       <td class="text-center"><a href="<?php echo base_url('superadmin/media-parners/update/'.encode($row['id'])); ?>"><i class="fa fa-edit medi-list"></i></a> <a href="<?php echo base_url('superadmin/media-parners/delete/'.encode($row['id'])); ?>"><i class="fa fa-trash-o text-danger"></i></a></td>
                     </tr>
                     <?php
                      }
                     ?>
                  </tbody>
               </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<script type="text/javascript">
 $('#blogTagList1').dataTable({
    "bPaginate": true,
    "pageLength": 50,
    "bLengthChange": true,
    "bFilter": true,
    "bSort": true,
    "bInfo": true,
      });
  
  /*$(document).ready(function(){
    $('.select').select2();
  })*/

  
</script>