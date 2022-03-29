<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

	<!-- header call -->
<?php 
    $this->load->view('superadmin/header');
    $this->load->view('superadmin/left_sidebar'); 
?>
		<!-- Content -->
		<?php
		    echo $content
		?>
<?php
	//footer of template
	$this->load->view('superadmin/footer')
?>