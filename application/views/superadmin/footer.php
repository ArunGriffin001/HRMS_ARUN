        <div class="section-body">
          <footer class="footer">
             <div class="container-fluid">
                <div class="row">
                   <div class="col-md-6 col-sm-12">
                      <!-- Copyright © 2021. All Right Reserved. -->
                   </div>

                </div>
             </div>
          </footer>
        </div>
      </div>
    </div>

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

</script>
          <!-- dropify js -->
      <script type="text/javascript" src="<?php echo base_url('template/'); ?>superadmin/assets/js/dropify.min.js"></script>


      <script src="<?php echo base_url('template/'); ?>superadmin/assets/bundles/lib.vendor.bundle.js" type="a316c684ac11c7a0d3cd8f14-text/javascript"></script>
      <script src="<?php echo base_url('template/'); ?>superadmin/assets/bundles/apexcharts.bundle.js" type="a316c684ac11c7a0d3cd8f14-text/javascript"></script>
      <script src="<?php echo base_url('template/'); ?>superadmin/assets/bundles/counterup.bundle.js" type="a316c684ac11c7a0d3cd8f14-text/javascript"></script>
      <script src="<?php echo base_url('template/'); ?>superadmin/assets/bundles/knobjs.bundle.js" type="a316c684ac11c7a0d3cd8f14-text/javascript"></script>
      <script src="<?php echo base_url('template/'); ?>superadmin/assets/bundles/c3.bundle.js" type="a316c684ac11c7a0d3cd8f14-text/javascript"></script>
      <script src="<?php echo base_url('template/'); ?>superadmin/assets/js/core.js" type="a316c684ac11c7a0d3cd8f14-text/javascript"></script>
      <script src="<?php echo base_url('template/'); ?>superadmin/assets/js/page/index.js" type="a316c684ac11c7a0d3cd8f14-text/javascript"></script>
      <script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js" data-cf-settings="a316c684ac11c7a0d3cd8f14-|49" defer=""></script>


    

  </body>
</html>