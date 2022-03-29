          <!-- <div class="section-body">
            <footer class="footer">
               <div class="container-fluid">
                  <div class="row">
                     <div class="col-md-6 col-sm-12">
                        Copyright © 2021. All Right Reserved.
                     </div>
                     <div class="col-md-6 col-sm-12 text-md-right">
                        <ul class="list-inline mb-0">
                           <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
                           <li class="list-inline-item"><a href="#">FAQ</a></li>
                          
                        </ul>
                     </div>
                  </div>
               </div>
            </footer>
         </div> -->
      </div>
    </div>
      
        <script src="<?php echo base_url('template/'); ?>employer/assets/bundles/apexcharts.bundle.js" type="text/javascript"></script>
        <script src="<?php echo base_url('template/'); ?>employer/assets/bundles/counterup.bundle.js" type="text/javascript"></script>

        <script src="<?php echo base_url('template/'); ?>employer/assets/bundles/knobjs.bundle.js" type="text/javascript"></script>

        <script src="<?php echo base_url('template/'); ?>employer/assets/bundles/c3.bundle.js" type="text/javascript"></script>

        <script src="<?php echo base_url('template/'); ?>employer/assets/bundles/fullcalendar.bundle.js" type="text/javascript"></script>
        <script src="<?php echo base_url('template/'); ?>employer/assets/js/page/calendar.js" type="text/javascript"></script>

      <script src="<?php echo base_url('template/'); ?>employer/assets/js/core.js" type="text/javascript"></script>
      <script src="<?php echo base_url('template/'); ?>employer/assets/js/page/dashboard.js" type="text/javascript"></script>
      <script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js" data-cf-settings="a316c684ac11c7a0d3cd8f14-|49" defer=""></script>

      <script src="<?php echo base_url('template/'); ?>employer/assets/js/parsley.js" ></script>
      <script src="<?php echo base_url('template/'); ?>employer/assets/js/parsley.min.js" ></script>

      
      <script type="text/javascript" src="<?php echo base_url('template/'); ?>superadmin/assets/js/dropify.min.js"></script>
      
     
      <script type="text/javascript">
        $('.dropify').dropify();
      $( document ).ready(function() {
        $(function() {
             "use strict";
             $('.counter').counterUp({
                 delay: 10,
                 time: 1000
             });
         
             function getRandomValues() {
                 
                 var values = new Array(20);
         
                 for (var i = 0; i < values.length; i++) {
                     values[i] = [5 + randomVal(), 10 + randomVal(), 15 + randomVal(), 20 + randomVal(), 30 + randomVal(),
                         35 + randomVal(), 40 + randomVal(), 45 + randomVal(), 50 + randomVal()
                     ];
                 }
         
                 return values;
             }    
             function randomVal() {
                 return Math.floor(Math.random() * 80);
             }
         
            
             var values2 = getRandomValues();    
             var paramsBar = {
                 type: 'bar',
                 barWidth: 5,
                 height: 25,
             };
         
             $('#mini-bar-chart1').sparkline(values2[0], paramsBar);
             paramsBar.barColor = '#6c757d';
             $('#mini-bar-chart2').sparkline(values2[1], paramsBar);
             paramsBar.barColor = '#6c757d';
             $('#mini-bar-chart3').sparkline(values2[2], paramsBar);
             paramsBar.barColor = '#6c757d';
             $('#mini-bar-chart4').sparkline(values2[3], paramsBar);
             paramsBar.barColor = '#6c757d';
             
         });
        });
    </script>

