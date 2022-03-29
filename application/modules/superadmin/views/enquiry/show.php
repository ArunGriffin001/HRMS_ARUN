<table class="table table-striped">
    <tbody>
       
        <tr>
            <td>Company Name:</td>
            <td><?php echo (!empty($results->company_name) ? $results->company_name : ''); ?></td>
        </tr>
         <tr>
            <td>Email:</td>
            <td><?php echo (!empty($results->email) ? $results->email : ''); ?></td>
        </tr>
         <tr>
            <td>Subject:</td>
            <td><?php echo (!empty($results->subject) ? $results->subject : ''); ?></td>
        </tr>
        <tr>
            <td>Date:</td>
            <td>
                <?php echo (isset($results->created_at) ? date('M d,Y',strtotime($results->created_at)) : ''); ?>
            </td>
        </tr> 
        <tr>
            <td>Message:</td>
            <td><?php echo (!empty($results->message) ? $results->message : ''); ?></td>
        </tr>   
    </tbody>
</table>
