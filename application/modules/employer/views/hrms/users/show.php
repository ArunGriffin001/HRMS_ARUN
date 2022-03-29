<table class="table table-striped">
    
        <tr>
            <td>Employee name:</td>
            <td><?php echo $ueser_rec->first_name.' '.$ueser_rec->last_name; ?></td>
        </tr>
         <tr>
            <td>Department name:</td>
            <td><?php echo (!empty($ueser_rec->dept_name) ? $ueser_rec->dept_name : ''); ?></td>
        </tr>
        <tr>
            <td>Designation:</td>
            <td><?php echo (!empty($ueser_rec->desination_name) ? $ueser_rec->desination_name : ''); ?></td>
        </tr>
        <tr>
            <td>Fathers name:</td>
            <td><?php echo (!empty($ueser_rec->fathers_name) ? $ueser_rec->fathers_name : ''); ?></td>
        </tr>
        <tr>
            <td>Mothers name:</td>
            <td><?php echo (!empty($ueser_rec->mothers_name) ? $ueser_rec->mothers_name : ''); ?></td>
        </tr>
        <tr>
            <td>Email:</td>
            <td><?php echo (!empty($ueser_rec->email_id) ? $ueser_rec->email_id : ''); ?></td>
        </tr>
        <tr>
            <td>Mobile number:</td>
            <td><?php echo (!empty($ueser_rec->mobile_no) ? $ueser_rec->mobile_no : ''); ?></td>
        </tr>
        <tr>
            <td>Gender:</td>
            <td><?php echo (!empty($ueser_rec->gender) ? $ueser_rec->gender : ''); ?></td>
        </tr>
        <tr>
            <td>Level:</td>
            <?php
            $level_arr = rowData('hs_employee_level',array('id'=>$ueser_rec->level_name)); 
            ?>
            <td><?php echo (!empty($level_arr->level_name) ? $level_arr->level_name : ''); ?></td>
        </tr>
        <tr>
            <td>Grade:</td>
            <?php
            $grade_arr = rowData(' hs_employee_grade',array('id'=>$ueser_rec->grade_name)); 
            ?>
            <td><?php echo (!empty($grade_arr->grade_name) ? $grade_arr->grade_name : ''); ?></td>
        </tr>
        <tr>
            <td>Country:</td>
            <td><?php echo (!empty($ueser_rec->country_name) ? $ueser_rec->country_name : ''); ?></td>
        </tr>
        <tr>
            <td>State:</td>
            <td><?php echo (!empty($ueser_rec->state_name) ? $ueser_rec->state_name : ''); ?></td>
        </tr>
        <tr>
            <td>City:</td>
            <td><?php echo (!empty($ueser_rec->city_name) ? $ueser_rec->city_name : ''); ?></td>
        </tr>
         <tr>
            <td>Current address:</td>
            <td><?php echo (!empty($ueser_rec->address) ? $ueser_rec->address : ''); ?></td>
        </tr> <tr>
            <td>Alternate address:</td>
            <td><?php echo (!empty($ueser_rec->alternate_address) ? $ueser_rec->alternate_address : ''); ?></td>
        </tr> <tr>
            <td>Communication address:</td>
            <td><?php echo (!empty($ueser_rec->communication_address) ? $ueser_rec->communication_address : ''); ?></td>
        </tr>
        <tr>
            <td>Working Days:</td>
            <td><?php echo (!empty($ueser_rec->working_days) ? $ueser_rec->working_days : ''); ?></td>
        </tr>
        <tr>
            <td>PF number:</td>
            <td><?php echo (!empty($ueser_rec->PF_reg_number) ? $ueser_rec->PF_reg_number : ''); ?></td>
        </tr>
        <tr>
            <td>PRAN number:</td>
            <td><?php echo (!empty($ueser_rec->pran_number) ? $ueser_rec->pran_number : ''); ?></td>
        </tr>
        <tr>
            <td>PAN number:</td>
            <td><?php echo (!empty($ueser_rec->pan_number) ? $ueser_rec->pan_number : ''); ?></td>
        </tr>
        <tr>
            <td>UAN number:</td>
            <td><?php echo (!empty($ueser_rec->UAN_number) ? $ueser_rec->UAN_number : ''); ?></td>
        </tr>
        <tr>
            <td>Aadhar number:</td>
            <td><?php echo (!empty($ueser_rec->aadhar_number) ? $ueser_rec->aadhar_number : ''); ?></td>
        </tr>
         <!-- <tr>
            <td>Nationality number:</td>
            <td><?php echo (!empty($ueser_rec->nationality) ? $ueser_rec->nationality : ''); ?></td>
        </tr>
         <tr>
            <td>Religion:</td>
            <td><?php echo (!empty($ueser_rec->religion) ? $ueser_rec->religion : ''); ?></td>
        </tr> -->
        <tr>
            <td>Joining Date:</td>
            <td><?php echo (!empty($ueser_rec->joining_date) ? date('Y-m-d',strtotime($ueser_rec->joining_date)) : ''); ?></td>
        </tr>
        <tr>
            <?php 
            $confirmation_date = ( !empty($ueser_rec->joining_date) ? date('Y-m-d', strtotime("+6 months", strtotime($ueser_rec->joining_date))) : '');
            ?>
            <td>Confirmation Date:</td>
            <td><?php echo (!empty($confirmation_date) ? $confirmation_date : ''); ?></td>
        </tr>
        
        <tr>
            <td>Status:</td>
            <td><?php echo (!empty($ueser_rec->status) ? $ueser_rec->status : ''); ?></td>
        </tr>     
    
</table>
