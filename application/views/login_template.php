<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php 
    $this->load->view('login/header'); 
?>
    <?php
        echo $content
    ?>
    <?php
        //footer of template
    $this->load->view('login/footer')
    ?>