<?php

	require_once '../config/config.php';

	$db = new SQLite3('../'.DB);

	if(!$db){
	  echo $db->lastErrorMsg();
	}

?>