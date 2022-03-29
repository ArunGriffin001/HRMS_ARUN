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
                      <th class="text-center">Transaction ID.</th>
                      <th class="text-center">Plan Name</th>
                      <th class="text-center">Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                       <td class="text-center">1</td>
                       <td class="text-center">ff54545554</td>
                       <td class="text-center">Free plan</td>
                       <td class="text-center">2021-01-01</td>
                    </tr>
                    <tr>
                       <td class="text-center">2</td>
                       <td class="text-center">re45455</td>
                       <td class="text-center">Basic plan</td>
                       <td class="text-center">2021-02-18</td>
                    </tr>
                    <tr>
                       <td class="text-center">3</td>
                       <td class="text-center">hfg5565656h</td>
                       <td class="text-center">Gold plan</td>
                       <td class="text-center">2021-03-15</td>
                    </tr>
                    <tr>
                       <td class="text-center">4</td>
                       <td class="text-center">45ghjyuyu</td>
                       <td class="text-center">Regular plan</td>
                       <td class="text-center">2021-04-01</td>
                    </tr>
                  </tbody>
               </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="modal fade" id="view_users" tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
               <h4 class="modal-title text-center" id="myModalLabel">
                    View Details
                </h4>
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
            </div>
            <!-- Modal Body -->
            <div class="modal-body" id="view_users_div">
                <!-- innserhtml -->
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

 function view_users(user_id)
    {
        var xmlhttp;
        if (window.XMLHttpRequest)
        {
            xmlhttp=new XMLHttpRequest();
        }
        else
        {
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("view_users_div").innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","<?php echo base_url(ADMIN_URL);?>users/get-view-users-data/"+user_id,true);
        xmlhttp.send();
    }
  
  /*$(document).ready(function(){
    $('.select').select2();
  })*/

  
</script>