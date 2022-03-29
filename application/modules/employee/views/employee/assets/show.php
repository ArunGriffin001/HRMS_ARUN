<table class="table table-striped">
    
        <tr>
            <td>Asset type:</td>
            <td><?php echo $ueser_rec->type_name.' '.$ueser_rec->type_name; ?></td>
        </tr>
         <tr>
            <td>Employee:</td>
            <td><?php echo (!empty($ueser_rec->full_name) ? $ueser_rec->full_name : ''); ?></td>
        </tr>
        <tr>
            <td>Department:</td>
            <td><?php echo (!empty($ueser_rec->dept_name) ? $ueser_rec->dept_name : ''); ?></td>
        </tr>
        <tr>
            <td>Asset details:</td>
            <td><?php echo (!empty($ueser_rec->asset_detail) ? $ueser_rec->asset_detail : ''); ?></td>
        </tr>
        <tr>
            <td>Asset number:</td>
            <td><?php echo (!empty($ueser_rec->asset_no) ? $ueser_rec->asset_no : ''); ?></td>
        </tr>
        <tr>
            <td>Asset value:</td>
            <td><?php echo (!empty($ueser_rec->asset_value) ? $ueser_rec->asset_value : ''); ?></td>
        </tr>
        <tr>
            <td>Assets status:</td>
            <td><?php echo (!empty($ueser_rec->asset_status) ? date('Y-m-d', strtotime($ueser_rec->issue_date)) : ''); ?></td>
        </tr>
        <tr>
            <td>Issue date:</td>
            <td><?php echo (!empty($ueser_rec->issue_date) ? date('Y-m-d', strtotime($ueser_rec->issue_date)) : ''); ?></td>
        </tr>
        <tr>
            <td>Valid till:</td>
            <td><?php echo (!empty($ueser_rec->valid_till_date) ? date('Y-m-d', strtotime($ueser_rec->valid_till_date)) : ''); ?></td>
        </tr>
        <tr>
            <td>Returned on:</td>
            <td><?php echo (!empty($ueser_rec->return_on_date) ? date('Y-m-d', strtotime($ueser_rec->return_on_date)) : ''); ?></td>
        </tr>
        <tr>
            <td>Remarks:</td>
            <td><?php echo (!empty($ueser_rec->remark) ? $ueser_rec->remark : ''); ?></td>
        </tr>
        <tr>
            <td>Description:</td>
            <td><?php echo (!empty($ueser_rec->details) ? $ueser_rec->details : ''); ?></td>
        </tr>
            <td>Created Date:</td>
            <td><?php echo (!empty($ueser_rec->created_at) ? date('Y-m-d', strtotime($ueser_rec->created_at)) : ''); ?></td>
        </tr>
        <tr>
            <td>Status:</td>
            <td><?php echo (!empty($ueser_rec->status) ? $ueser_rec->status : ''); ?></td>
        </tr>     
    
</table>
