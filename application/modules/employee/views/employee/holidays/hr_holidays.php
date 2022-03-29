<?php $employerID = $employerID; ?>
   <form method="post" action="<?php echo base_url('employee/employee/holiday'); ?>" data-parsley-validate="" class="form-group"> 
      <div class="section-body mt-3">
         <div class="container-fluid">
            <div class="row">
                  <input type="hidden" name="employer_val" value="<?php echo encode($employerID); ?>">
                  <div class="col-lg-3 col-md-4 col-sm-4">
                       <div class="form-group">
                           <select class="custom-select11 form-control" name="holiday_date" required="">
                               <option value="">select Year</option>
                               <?php
                               if(!empty($year_list)){
                                foreach ($year_list as $key => $year_val){
                                  ?>
                                  <option value="<?php echo $year_val->years; ?>" <?php echo ($year_val->years == $year ? 'selected' : ''); ?> > <?php echo $year_val->years; ?></option>
                                  <?php
                                }
                               }
                               ?>
                           </select>
                       </div>
                   </div>
                   <div class="col-lg-3 col-md-4 col-sm-4">
                        <div class="form-group">
                           <input type="submit" name="submit" value="submit" class="btn btn-sm btn-primary btn-block form-control">
                        </div>
                   </div>
               <div class="col-12">
                  <div class="card">
                     <div class="card-body">
                        <div class="table-responsive">
                           <table class="table table_custom spacing5 border-style mb-0">
                              <thead>
                                 <tr>
                                    <th><?php echo $this->lang->line('tb_day'); ?></th>
                                    <th><?php echo $this->lang->line('tb_holiday_date');?></th>
                                    <th><?php echo $this->lang->line('tb_holiday'); ?></th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                 if(!empty($holiday)){
                                    foreach ($holiday as $holiday_val){
                                       ?>
                                       <tr>
                                       <td><span><?php echo ucfirst($holiday_val->day_name);?></span></td>
                                       <td><span><?php  echo date('d M, Y',strtotime($holiday_val->holiday_date)); ?></span></td>
                                       <td><span><?php echo ucfirst($holiday_val->holiday_details);?></span></td>
                                       </tr>
                                       <?php
                                    }

                                 }else{
                                    echo " <tr><td colspan='3'>Sorry No record found </td></tr>";
                                 }
                                 ?>
                                
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </form>