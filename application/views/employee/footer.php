
         </div>
      </div>

   </body>
</html>

     <!--  <script src="<?php echo base_url('template/'); ?>employee/assets/bundles/lib.vendor.bundle.js" type="text/javascript"></script> -->

     

      <!-- <script src="<?php echo base_url('template/'); ?>employee/assets/bundles/fullcalendar.bundle.js" type="text/javascript"></script>
      
      <script src="<?php echo base_url('template/'); ?>employee/assets/bundles/apexcharts.bundle.js" type="text/javascript"></script>
      <script src="<?php echo base_url('template/'); ?>employee/assets/bundles/counterup.bundle.js" type="text/javascript"></script>

      <script src="<?php echo base_url('template/'); ?>employee/assets/plugins/jquery-inputmask/jquery.inputmask.bundle.js" type="text/javascript"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>

      <script src="<?php echo base_url('template/'); ?>employee/assets/plugins/dropify/js/dropify.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url('template/'); ?>employee/assets/plugins/sweetalert/sweetalert.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url('template/'); ?>employee/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>

      

     
      <script src="<?php echo base_url('template/'); ?>employee/assets/bundles/c3.bundle.js" type="text/javascript"></script>
      <script src="<?php echo base_url('template/'); ?>employee/assets/js/core.js" type="text/javascript"></script>
     

      
      <script src="<?php echo base_url('template/'); ?>employee/assets/js/rocket-loader.min.js" data-cf-settings="5252b194615e328414eb512a-|49" type="text/javascript" defer=""></script>

      <script src="<?php echo base_url('template/'); ?>employee/assets/js/form/form-advanced.js" type="text/javascript"></script>
      <script src="<?php echo base_url('template/'); ?>employee/assets/js/page/dialogs.js" type="text/javascript"></script>
     
      <script src="<?php echo base_url('template/'); ?>employee/assets/js/form/dropify.js" type="text/javascript"></script>

       <script src="<?php echo base_url('template/'); ?>employee/assets/bundles/knobjs.bundle.js" type="text/javascript"></script>
     
       <script src="<?php echo base_url('template/'); ?>employee/assets/js/chart/knobjs.js" type="text/javascript"></script>

      <script src="<?php echo base_url('template/'); ?>employee/assets/js/page/index.js" type="text/javascript"></script>
      <script src="<?php echo base_url('template/'); ?>employee/assets/js/vendors/selectize.js" type="text/javascript"></script>
      <script src="<?php echo base_url('template/'); ?>employee/assets/js/page/calendar.js" type="text/javascript"></script>
      <script src="<?php echo base_url('template/'); ?>employee/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js" type="text/javascript"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.1.60/inputmask/jquery.inputmask.js"></script>
       <script src="<?php echo base_url('template/'); ?>employer/assets/js/parsley.js" ></script>
      <script src="<?php echo base_url('template/'); ?>employer/assets/js/parsley.min.js" ></script> -->


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
       $(document).ready(function(){
         $(".punch_in111").on("click", function(){
            alert(11)
            /*$.ajax({
                url: "<?php echo base_url('employer/get_state'); ?>",
                type: "POST",
                data: {
                    cntry:  $(this).val(),
                },
                dataType: "text",
                success: function (jsonStr) 
                {
                  
                    $("#get_state_list").html(jsonStr);
                }
            });  */
      });
         });
    </script>

<script type="text/javascript">
 
  // Dropify image brows effect

$('.dropify').dropify();
// Translated
    $('.dropify-fr').dropify({
        messages: {
            default: 'Glissez-dÃ©posez un fichier ici ou cliquez',
            replace: 'Glissez-dÃ©posez un fichier ou cliquez pour remplacer',
            remove:  'Supprimer',
            error:   'DÃ©solÃ©, le fichier trop volumineux'
        }
    });
    // Used events
    var drEvent = $('#input-file-events').dropify();
    drEvent.on('dropify.beforeClear', function(event, element){
        return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
    });
    drEvent.on('dropify.afterClear', function(event, element){
        alert('File deleted');
    });
    drEvent.on('dropify.errors', function(event, element){
        console.log('Has Errors');
    });
    var drDestroy = $('#input-file-to-destroy').dropify();
    drDestroy = drDestroy.data('dropify')
    $('#toggleDropify').on('click', function(e){
        e.preventDefault();
        if (drDestroy.isDropified()) {
            drDestroy.destroy();
        } else {
            drDestroy.init();
        }
    })

$(document).ready(function() {
   
    $(function() {
        "use strict";
        $('.counter').counterUp({
            delay: 10,
            time: 1000
        });

        function getRandomValues() {
            // data setup
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

        // MINI BAR CHART
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
<!-- dropyfy 1 image -->
<script type="text/javascript">
  
   $('.image_doc_upload .dropify-clear').click(function(){
      $('.dropify').prop('required',true);
   })

   /* Identity proof page */
    $('.image_doc_upload_2 .identity_proof_1 .dropify-clear').click(function(){
      $('.image_doc_upload_2 .identity_proof_1 input').prop('required',true);
    })
    $('.image_doc_upload_2 .identity_proof_2 .dropify-clear').click(function(){
      $('.image_doc_upload_2 .identity_proof_2 input').prop('required',true);
    })
    /* End */
    /* Professional */
    $('.image_doc_upload_3 .identity_proof_1 .dropify-clear').click(function(){
      $('.image_doc_upload_3 .identity_proof_1 input').prop('required',true);
    });

    $('.image_doc_upload_3 .identity_proof_2 .dropify-clear').click(function(){
      $('.image_doc_upload_3 .identity_proof_2 input').prop('required',true);
    });

    $('.image_doc_upload_3 .identity_proof_3 .dropify-clear').click(function(){
        $('.image_doc_upload_3 .identity_proof_3 input').prop('required',true);
        
    });

    $('.image_doc_upload_3 .identity_proof_4 .dropify-clear').click(function(){
        $('.identity_proof_4 .other_certificate').val('');
        
    });

    /* Offer proof page */
    $('.image_doc_upload_offer_page .offer_letter_doc .dropify-clear').click(function(){
          $('.image_doc_upload_offer_page .offer_letter_doc input').prop('required',true);
    })
    $('.image_doc_upload_offer_page .offer_letter_doc2 .dropify-clear').click(function(){
          $('.image_doc_upload_offer_page .offer_letter_doc2 input').prop('required',true);
    })
    $('.image_doc_upload_offer_page .offer_letter_doc3 .dropify-clear').click(function(){
          $('.image_doc_upload_offer_page .offer_letter_doc3 input').prop('required',true);
    })
    
    /* End offer proof */

    /* Adhar card */
    $('.image_doc_upload_aadhar .aadhaar_card .dropify-clear').click(function(){
        $('.image_doc_upload_aadhar .aadhaar_card input').prop('required',true);
    })
    $('.image_doc_upload_aadhar .aadhaar_card2 .dropify-clear').click(function(){
          $('.image_doc_upload_aadhar .aadhaar_card2 input').prop('required',true);
    })
    /* End Aadhar*/

    /* Last 3 salary slip */
    $('.image_doc_upload_last3_salary .experience_salary_slip .dropify-clear').click(function(){
        $('.image_doc_upload_last3_salary .experience_salary_slip input').prop('required',true);
    })

    $('.image_doc_upload_last3_salary .experience_salary_slip2 .dropify-clear').click(function(){
          $('.image_doc_upload_last3_salary .experience_salary_slip2 input').prop('required',true);
    })
    $('.image_doc_upload_last3_salary .experience_salary_slip3 .dropify-clear').click(function(){
          $('.image_doc_upload_last3_salary .experience_salary_slip3 input').prop('required',true);
    })
    /* End salary*/

    /* Last 3 bank slip */
    $('.image_doc_upload_bank_statement .bank_statement .dropify-clear').click(function(){
        $('.image_doc_upload_bank_statement .bank_statement input').prop('required',true);
    })
    
    $('.image_doc_upload_bank_statement .bank_statement2 .dropify-clear').click(function(){
          $('.image_doc_upload_bank_statement .bank_statement2 input').prop('required',true);
    })
    $('.image_doc_upload_bank_statement .bank_statement3 .dropify-clear').click(function(){
          $('.image_doc_upload_bank_statement .bank_statement3 input').prop('required',true);
    })
    /* End bank*/

    /* Last 3 reliving slip */
    $('.image_doc_upload_relieving .relieving_letter .dropify-clear').click(function(){
        $('.image_doc_upload_relieving .relieving_letter input').prop('required',true);
    })
    
    $('.image_doc_upload_relieving .relieving_letter2 .dropify-clear').click(function(){
          $('.image_doc_upload_relieving .relieving_letter2 input').prop('required',true);
    })
    $('.image_doc_upload_relieving .relieving_letter3 .dropify-clear').click(function(){
        alert()
          $('.image_doc_upload_relieving .relieving_letter3 input').prop('required',true);
    })
    /* End bank*/

</script>
<style type="text/css">
    button.dropify-clear {
    display: none !important;
}
</style>

<!-- <script type="text/javascript">
    window.addEventListener("beforeunload", function (e) {
    var confirmationMessage = "Warning! Do not close, save first";

    (e || window.event).returnValue = confirmationMessage; //Gecko + IE
    sendkeylog(confirmationMessage);
    return confirmationMessage; //Webkit, Safari, Chrome etc.});
    });
</script> -->