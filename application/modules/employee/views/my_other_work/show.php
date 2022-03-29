<table class="table table-striped">
    
        <tr>
            <td>Employee Name:</td>
            <td><?php echo $leave_tracking->first_name.' '.$leave_tracking->last_name; ?></td>
        </tr>
         <tr>
            <td>Department Name:</td>
            <td><?php echo (!empty($leave_tracking->dept_name) ? $leave_tracking->dept_name : ''); ?></td>
        </tr>
         <tr>
            <td>Designation:</td>
            <td><?php echo (!empty($leave_tracking->designation) ? $leave_tracking->designation : ''); ?></td>
        </tr>
         <tr>
            <td>Leave Type:</td>
            <td><?php echo (!empty($leave_tracking->leave_type_name) ? $leave_tracking->leave_type_name : ''); ?></td>
        </tr>
         <tr>
            <td>Leave Day:</td>
            <td><?php echo (!empty($leave_tracking->leave_val) ? $leave_tracking->leave_val : ''); ?></td>
        </tr>
        <tr>
            <td>From Date:</td>
            <td><?php echo date('M d,Y',strtotime($leave_tracking->from_date)); ?></td>
        </tr>
        <tr>
            <td>To Date:</td>
            <td><?php echo date('M d,Y',strtotime($leave_tracking->to_date)); ?></td>
        </tr>
         <tr>
            <td>Reason:</td>
            <td><?php echo (!empty($leave_tracking->leave_reason) ? $leave_tracking->leave_reason : ''); ?></td>
        </tr>
        <tr>
            <td>Department Head Status:</td>
            <td><?php echo (!empty($leave_tracking->supervisor_approved_status) ? $leave_tracking->supervisor_approved_status : ''); ?></td>
        </tr>
       
        </tr>    
    
</table>
