<table class="table table-striped">
    <tbody>
        <tr>
            <td>Subject:</td>
            <td><?php echo (!empty($results->subject) ? $results->subject : ''); ?></td>
        </tr>
        <tr>
            <td>Message:</td>
            <td><?php echo (!empty($results->description) ? $results->description : ''); ?></td>
        </tr>
        <tr>
            <td>Date</td>
            <td>
                <?php echo (isset($results->created_at) ? date('M d,Y',strtotime($results->created_at)) : ''); ?>
            </td>
        </tr>   
    </tbody>
</table>
