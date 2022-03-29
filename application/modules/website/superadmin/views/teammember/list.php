<div class="section-body">
   <div class="container-fluid">
      <div class="d-flex justify-content-between align-items-center">
         <ul class="nav nav-tabs page-header-tab">
            <!-- <li class="nav-item"><a class="nav-link active" id="user-tab" data-toggle="tab" href="#user-list">List</a></li>
            <li class="nav-item"><a class="nav-link" id="user-tab" data-toggle="tab" href="#user-add">Add New</a></li> -->
         </ul>
         <div class="header-action text-right mt-2">
            <a href="<?php echo base_url('superadmin/team-member/add'); ?>" class="btn btn-primary"><i class="fe fe-plus mr-2"></i>Add</a>
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
                       <th class="text-center">Name</th>
                       <th class="text-center">Role</th>
                       <th class="text-center">Social link</th>
                       <th class="text-center">Images</th>
                       <th class="text-center">Action</th>
                     </tr>
                  </thead>
                   <tbody>
                    <?php
                    $i=0;
                    foreach($team_member as $row){
                      $i++;
                    ?>
                     <tr>
                       <td class="text-center"><?php echo $i;?></td>
                       <td class="text-center"><?php echo $row['name']?></td>
                       <td class="text-center"><?php echo $row['role_name']?></td>
                       <td class="text-center"><?php $link=json_decode($row['social_links'],true);
                      ?>
                        <a href="<?php echo $link["facebook_link"]?>">FaceBook</a><br>
                        <a href="<?php echo $link["twitter_link"]?>">Twitter</a><br>
                        <a href="<?php echo $link["youtube_link"]?>">Youtube</a><br>
                        <a href="<?php echo $link["linkedin_link"]?>">Linkedin</a><br>
                      </td>
                       <td class="text-center"><img src="<?php echo base_url("uploads/images/team_member/".$row['picture'])?>" width="80"></td>
                       <td class="text-center"><a href="<?php echo base_url('superadmin/team-member/update/'.encode($row['id'])); ?>">Edit</a> <a href="<?php echo base_url('superadmin/team-member/delete/'.encode($row['id'])); ?>">Delete</a></td>
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