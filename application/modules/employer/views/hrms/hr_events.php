<div class="header_btn">
   <div class="header-action">
      <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addNewEvent"><i class="fa fa-plus mr-2"></i>Add Event</button>
   </div>
</div>
<div class="section-body mt-3">
   <div class="container-fluid">
      <div class="row">
         <div class="col-12">
            <div class="card">
               <div class="card-header bline">
                  <h3 class="card-title">Calender</h3>
                  <div class="card-options">
                     <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                     <a href="#" class="card-options-fullscreen" data-toggle="card-fullscreen"><i class="fe fe-maximize"></i></a>
                     <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                  </div>
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
<div class="modal fade" id="addDirectEvent" tabindex="-1" role="dialog">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Add Direct Event</h4>
         </div>
         <div class="modal-body">
            <div class="row">
               <div class="col-md-6">
                  <div class="form-group">
                     <label>Event Name</label>
                     <input class="form-control" name="event-name" type="text" />
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label>Event Type</label>
                     <select name="event-bg" class="form-control">
                        <option value="success">Success</option>
                        <option value="danger">Danger</option>
                        <option value="info">Info</option>
                        <option value="primary">Primary</option>
                        <option value="warning">Warning</option>
                     </select>
                  </div>
               </div>
            </div>
         </div>
         <div class="modal-footer">
            <button class="btn save-btn btn-success">Save</button>
            <button class="btn btn-secondary" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>
<div class="modal fade" id="eventEditModal" tabindex="-1" role="dialog">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Edit Event</h4>
         </div>
         <div class="modal-body">
            <div class="row">
               <div class="col-md-6">
                  <div class="form-group">
                     <label>Event Name</label>
                     <input class="form-control" name="event-name" type="text" />
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label>Event Type</label>
                     <select name="event-bg" class="form-control">
                        <option value="success">Success</option>
                        <option value="danger">Danger</option>
                        <option value="info">Info</option>
                        <option value="primary">Primary</option>
                        <option value="warning">Warning</option>
                     </select>
                  </div>
               </div>
            </div>
         </div>
         <div class="modal-footer">
            <button class="btn mr-auto delete-btn btn-danger">Delete</button>
            <button class="btn save-btn btn-success">Save</button>
            <button class="btn btn-default" data-dismiss="modal">Cancel</button>
         </div>
      </div>
   </div>
</div>
<?php 

$this->login_data = $this->session->userdata('EmployerLoginDetails');
$this->employer_id = $this->login_data['userId'];

$employer_id = $this->employer_id; ?>
<script type="text/javascript">
   $(function () {

   var fetchEventUrl =  BASEURL+"event/fetch_event/"+<?php echo $employer_id?>;
   alert(fetchEventUrl);
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
        editable: true,
        droppable: true,
        eventLimit: true,
        selectable: true,
        events: [
            { title: "Birthday Party", start: current + "01", className: "bg-info" },
            { title: "Conference", start: current + "05", end: "2019-06-06", className: "bg-warning" },
            { title: "Meeting", start: current + "09T12:30:00", allDay: false, className: "bg-success" },
            { title: "Meeting", start: current + "09T18:30:00", allDay: false, className: "bg-info" },
            { title: "BOD Event", start: "2019-06-16", end: "2019-06-16", className: "bg-indigo" },
            { title: "June Challenge", start: "2019-06-10", end: "2019-06-12", className: "bg-gray" },
            { title: "Earthcon Exhibition", start: "2019-06-18", end: "2019-06-22", className: "bg-red" },
            { title: "Toastmasters Meeting #3", start: "2019-06-26", end: "2019-06-26", className: "bg-orange" },
            { title: "Salary", start: "2019-06-07", end: "2019-06-07", className: "bg-pink" },
        ],
        drop: function (date, jsEvent) {
            if ($("#drop-remove").is(":checked")) {
                $(this).remove();
            }
        },
       
    });
});

</script>