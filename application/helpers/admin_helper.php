<?php
function ci_enc($str){
	$new_str = strtr(base64_encode(addslashes(@gzcompress(serialize($str), 9))), '+/=', '-_.');
	return $new_str; 
}

function ci_dec($str){
	$new_str = unserialize(@gzuncompress(stripslashes(base64_decode(strtr($str, '-_.', '+/=')))));
	return $new_str;
}

?>