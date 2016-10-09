<?php

require_once 'validate_session.php';

if ($profile != 1 ) {
	include 'body_deny.php';
	session_unset();
	session_destroy();
	die();	
}

?>