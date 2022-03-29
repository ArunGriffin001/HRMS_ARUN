<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

	<!-- header call -->
<?php 
    $this->load->view('employee/header');
    $this->load->view('employee/left_sidebar'); 
?>
		<!-- Content -->
		<?php
		    echo $content
		?>
<?php
	//footer of template
	$this->load->view('employee/footer')
?>