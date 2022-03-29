<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

	<!-- header call -->
<?php 
    $this->load->view('employer/header');
    $this->load->view('employer/left_sidebar'); 
?>
		<!-- Content -->
		<?php
		    echo $content
		?>
<?php
	//footer of template
	$this->load->view('employer/footer')
?>