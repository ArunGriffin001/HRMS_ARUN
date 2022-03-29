<table class="table table-striped">
    <tbody>
        <tr>
            <td>Transaction ID:</td>
            <td><?php echo (!empty($results->transaction_id) ? $results->transaction_id : ''); ?></td>
        </tr>
        <tr>
            <td>Company Name:</td>
            <td><?php echo (!empty($results->company_name) ? $results->company_name : ''); ?></td>
        </tr>
         <tr>
            <td>Plan Name:</td>
            <td><?php echo (!empty($results->title) ? $results->title : ''); ?></td>
        </tr>
         <tr>
            <td>Date:</td>
            <td>
                <?php echo (isset($results->created_at) ? date('M d,Y',strtotime($results->created_at)) : ''); ?>
            </td>
        </tr>    
    </tbody>
</table>
