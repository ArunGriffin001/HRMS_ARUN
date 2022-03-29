<div class="section-body mt-3">
   <div class="container-fluid">
      <div class="row">
         <div class="col-12">
            <div class="card">
               <div class="card-header bline">
                  <h3 class="card-title">Calender</h3>
                  <!-- <div class="card-options">
                     <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                     <a href="#" class="card-options-fullscreen" data-toggle="card-fullscreen"><i class="fe fe-maximize"></i></a>
                     <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                  </div> -->
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
$this->login_data = $this->session->userdata('EmployerLoginDetails');
$this->employer_id = $this->login_data['userId'];
$employer_id = $this->employer_id;

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

     var fetchEventUrl =  BASEURL+"hrms/fetch_event/"+<?php echo $employer_id?>;
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
      /*var newEvent = function (start) {
          $('#addDirectEvent input[name="event-name"]').val("");
          $('#addDirectEvent select[name="event-bg"]').val("");
          $("#addDirectEvent").modal("show");
          $("#addDirectEvent .save-btn").unbind();
          $("#addDirectEvent .save-btn").on("click", function () {
              var title = $('#addDirectEvent input[name="event-name"]').val();
              var classes = "bg-" + $('#addDirectEvent select[name="event-bg"]').val();
              if (title) {
                  var eventData = { title: title, start: start, className: classes };
                  calendar.fullCalendar("renderEvent", eventData, true);
                  $("#addDirectEvent").modal("hide");
              } else {
                  alert("Title can't be blank. Please try again.");
              }
          });
      };*/
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