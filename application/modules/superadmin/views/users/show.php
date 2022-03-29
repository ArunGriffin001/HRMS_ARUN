<table class="table table-striped">
    
        <tr>
            <td>User Type:</td>
            <td><?php echo ($user_result->Role_id == '1' ? 'Employer' : ''); ?></td>
        </tr>
        <tr>
            <td>Company Name:</td>
            <td><?php echo (!empty($user_result->company_name) ? $user_result->company_name : ''); ?></td>
        </tr>
         <tr>
            <td>Email:</td>
            <td><?php echo (!empty($user_result->email) ? $user_result->email : ''); ?></td>
        </tr>
         <tr>
            <td>Phone Number:</td>
            <td><?php echo (!empty($user_result->phone_number) ? $user_result->phone_number : ''); ?></td>
        </tr>
        <tr>
            <td>Address:</td>
            <td><?php echo (!empty($user_result->adress) ? $user_result->adress : ''); ?></td>
        </tr>
         <tr>
            <td>Status:</td>
            <td><?php echo ($user_result->status == 'Active' ? 'Active' : 'Deactive'); ?></td>
        </tr>
         <tr>
            <td>Member Expiry Date:</td>
            <td>
                <?php echo (isset($user_result->member_expiry_date) ? date('M d,Y',strtotime($user_result->member_expiry_date)) : ''); ?>
            </td>
        </tr>
        <tr>
            <td>Create Date:</td>
            <td><?php if(isset($user_result->created_at)){ echo date('M d,Y',strtotime($user_result->created_at)); } ?></td>
        </tr>    
    
</table>
