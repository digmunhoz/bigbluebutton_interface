<?php

session_start();
 
	if (!isset($_SESSION['email'])) {
		die("Usuário não logado.<br>Por favor faça login antes.");
	} 
	else {
	    $username = $_SESSION['email'];
		$expireAfter = SESSION_TIMEOUT;
		 
		if(isset($_SESSION['last_action'])){
		    
		    $secondsInactive = time() - $_SESSION['last_action'];
		    
		    $expireAfterSeconds = $expireAfter * 60;
		    
		    if($secondsInactive >= $expireAfterSeconds){
		        session_unset();
		        session_destroy();
		        echo '<script>alert("Sessão expirada. Faça login novamente!");</script>';
        		echo '<script>window.location.href = "./index.php";;</script>';
		    }  
		}	 
	} 

	$_SESSION['last_action'] = time();
?>