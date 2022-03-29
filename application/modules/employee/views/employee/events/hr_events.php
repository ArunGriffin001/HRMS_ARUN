<div class="section-body mt-3">
   <div class="container-fluid">
      <div class="row">
         <div class="col-12">
            <div class="card">
               <div class="card-header bline">
                  <h3 class="card-title">All Events</h3>
               </div>
               <div class="card-body">
                  <div id="calendar"></div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>   

<div class="modal fade" id="addNewEvent" aria-hidden="true" style="display: none;">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title"><strong>Add</strong>event</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
         </div>
         <div class="modal-body">
            <form>
               <div class="row">
                  <div class="col-md-6">
                     <label class="control-label">Event Name</label>
                     <input class="form-control" placeholder="Enter name" type="text" name="category-name">
                  </div>
                  <div class="col-md-6">
                     <label class="control-label">Choose Event type</label>
                     <select class="form-control" data-placeholder="Choose a color..." name="category-color">
                        <option value="success">meeting</option>
                        <option value="danger">confrence</option>
                        <option value="info">birthday</option>
                     </select>
                  </div>
               </div>
            </form>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-success save-event" data-dismiss="modal">Save</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>
<?php 
$this->login_data = $this->session->userdata('EmployeeLogin');
$employer_id = $this->login_data['employer_id'];
 ?>
<style type="text/css">
  /*.fc-day-grid-event > .fc-content {
   white-space: normal;
   text-overflow: ellipsis;
   max-height:20px;
}
.fc-day-grid-event > .fc-content:hover {
   max-height:none!important; 
}*/
.fc-day-grid-event > .fc-content {
white-space: inherit; }
</style>
<script type="text/javascript">
  $(function () {
     var fetchEventUrl =  BASEURL+"employee/fetch_event/"+<?php echo $employer_id?>;
     //alert(fetchEventUrl)
      var today = new Date();
      var dd = today.getDate();
      var mm = today.getMonth() + 1;
      var yyyy = today.getFullYear();
      if (dd < 10) {
          dd = "0" + dd;
      }
      if (mm < 10) {
          mm = "0" + mm;
      }
      var current = yyyy + "-" + mm + "-";
      var calendar = $("#calendar");
     
      calendar.fullCalendar({
          header: {
              left: "title",
              center: "",
              right: "month, prev, next",
          },
          timeFormat: 'hh:mm a',
          editable: true,
          droppable: true,
          eventLimit: true,
          selectable: true,
          events: fetchEventUrl,
          drop: function (date, jsEvent) {
              if ($("#drop-remove").is(":checked")) {
                  $(this).remove();
              }
          },
      });
  });

</script>