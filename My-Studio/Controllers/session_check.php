<?php
function session_set($SESSION) {
	if(!isset($_SESSION['id'])) { 
	return 0; 
	}else{  
	return 1; 
	}
}
?>
