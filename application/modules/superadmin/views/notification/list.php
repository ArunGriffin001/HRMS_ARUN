<div class="section-body">
   <div class="container-fluid">
      <div class="d-flex justify-content-between align-items-center">
         <ul class="nav nav-tabs page-header-tab">
            <!-- <li class="nav-item"><a class="nav-link active" id="user-tab" data-toggle="tab" href="#user-list">List</a></li>
            <li class="nav-item"><a class="nav-link" id="user-tab" data-toggle="tab" href="#user-add">Add New</a></li> -->
         </ul>
         <div class="header-action text-right mt-2">
            <a href="<?php echo base_url('superadmin/notification/add'); ?>" class="btn btn-primary"><i class="fe fe-plus mr-2"></i>Add Notification</a>
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
                  <h3 class="card-title"><?php echo (!empty($page_sub_heading) ? $page_sub_heading : ''); ?></h3>
                 
               </div>
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
                      <table id="notification" class="table table-striped table-hover table-vcenter text-nowrap mb-0">
                        <thead>
                          <tr>
                            <th class="text-center">SNo.</th>
                            <th class="text-center">Subject</th>
                            <th class="text-center">Date</th>
                            <th class="text-center">Action</th>
                          </tr>
                        </thead>
                      </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script type="text/javascript">
 
  var postListingUrl =  BASEURL+"notification_list";
  $('#notification').dataTable({
    "bPaginate": true,
    "pageLength": 50,
    "bLengthChange": true,
    "bFilter": true,
    "bSort": true,
    "bInfo": true,
    "bAutoWidth": false,
    "processing": true,
    "serverSide": true,
    "stateSave": false,
    "ajax": postListingUrl,
    /*"order": [[2,"asc"]],*/
    "columnDefs": [ { "targets": 0, "bSortable": true,"orderable": true, "visible": true } ],
          'aoColumnDefs': [{'bSortable': false,'aTargets': [0,-1, 3]}],
      });
  
  /*$(document).ready(function(){
    $('.select').select2();
  })*/


</script>



<script type="text/javascript">
function view_transaction_history(field_id)
    {
     // alert(field_id)
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
              //alert(xmlhttp.responseText);
              //console.log(xmlhttp.responseText);
                document.getElementById("view_text_div").innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","<?php echo base_url(ADMIN_URL);?>notification/get-view-enquiry-data/"+field_id,true);
        xmlhttp.send();
    }
</script>

<div class="modal fade" id="view_transaction_history" tabindex="-1" role="dialog" 
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
                       <span class="sr-only"><?php echo $this->lang->line('btn_close'); ?></span>
                </button>
                <h4 class="modal-title" id="#f">
                    <?php echo $this->lang->line('title_reward_details'); ?>
                </h4>
            </div>
            <!-- Modal Body -->
            <div class="modal-body" id="view_text_div">
                <!-- innserhtml -->
            </div>
        </div>
    </div>
</div>