<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php 
    $this->load->view('website/header'); 
?>
    <?php
        echo $content
    ?>
    <?php
        //footer of template
    $this->load->view('website/footer')
    ?>