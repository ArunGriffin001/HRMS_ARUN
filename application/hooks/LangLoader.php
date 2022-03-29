<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class LangLoader{
	
	function initialize() {
		$ci =& get_instance();
        if($ci->session->userdata('logged_in')){
            $language = $ci->session->userdata['logged_in']['session_language'];
            $ci->lang->load("message", "$language");
        } else {
            $language = "english";
            $ci->lang->load("message", "$language");
        }

        $path = $ci->config->item('Document_Root_Path').'application/language/'.$language.'/';
        if (file_exists($path.'breadcrumb_lang.php')) { $ci->lang->load('breadcrumb', $language); }
        if (file_exists($path.'message_lang.php')) { $ci->lang->load('message', $language); }
    }
}


?>
