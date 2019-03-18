<?php
spl_autoload_register(function($classN){
	$file="classes".DIRECTORY_SEPARATOR."$classN.php";
	if (file_exists($file)){
		require_once($file);
	}
});
?>