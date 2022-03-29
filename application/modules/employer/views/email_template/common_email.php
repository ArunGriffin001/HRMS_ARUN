<!DOCTYPE html>
<html>
   <head>
      <title><?php echo (!empty($title) ? $title : ''); ?></title>
   </head>
   <body>
      <div class="EmailTemp" style="font-family: arial; background-color: #f5f5f5;width:600px;max-width: 600px;margin: 50px auto;border:1px solid #ddd;">
         <table width="100%">
            <tr>
               <td style="text-align: center;padding: 20px;background-color: #fff;border-bottom: 1px solid #ddd;">HRMS</td>
            </tr>
            <tr>
               <td style="padding: 20px;padding-bottom: 0;">
                  <h4 style="margin: 0;">Hello <?php echo (!empty($userInfo->full_name) ? $userInfo->full_name : ''); ?>,</h4>
               </td>
            </tr>
            <tr>
               <td style="padding: 20px;">
                  <p style="margin: 0;">Employee Name: <?php echo (!empty($userInfo->full_name) ? $userInfo->full_name : ''); ?></p>
               </td>
               <td style="padding: 20px;">
                  <p style="margin: 0;">Leave Approve Status: Approved</p>
               </td>
               <td style="padding: 20px;">
                  <p style="margin: 0;">From Date: 11-10-2021</p>
               </td>
               <td style="padding: 20px;">
                  <p style="margin: 0;">To Date: 11-10-2021</p>
               </td>
               <td style="padding: 20px;">
                  <p style="margin: 0;">Leave Type: Casual</p>
               </td>
               <td style="padding: 20px;">
                  <p style="margin: 0;">Leave Day: Full</p>
               </td>
               

            </tr>
         </table>
         
         <table width="100%">
            <tr>
               <td style="background-color: #18567B; padding: 10px;text-align: center;">
                  <p style="margin: 0;text-align: center;color: #fff;">&copy;Copyright. 2021 HRMS</p>
               </td>
            </tr>
         </table>
      </div>
   </body>
</html>