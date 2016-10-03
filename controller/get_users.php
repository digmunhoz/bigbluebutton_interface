<?php

	$db = new SQLite3(DB);

	if(!$db){
	  echo $db->lastErrorMsg();
	} 
	else {
		$results = $db->query('SELECT * FROM users');
	} 

?>