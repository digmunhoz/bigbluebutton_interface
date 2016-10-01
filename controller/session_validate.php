<?php

session_start();
 
	if (!isset($_SESSION['username'])) {
		die("Usuário não logado.<br>Por favor faça login antes.");
	} 
	else {
	    $username = $_SESSION['username'];
		$expireAfter = 1;
		 
		if(isset($_SESSION['last_action'])){
		    
		    $secondsInactive = time() - $_SESSION['last_action'];
		    
		    $expireAfterSeconds = $expireAfter * 60;
		    
		    if($secondsInactive >= 5){
		        session_unset();
		        session_destroy();
		        echo '<script>alert("Sessão expirada. Faça login novamente!");</script>';
        		echo '<script>window.location.href = "./index.php";;</script>';
		    }  
		}	 
	} 

	$_SESSION['last_action'] = time();
?>