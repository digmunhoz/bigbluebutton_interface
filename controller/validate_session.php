<?php

session_start();

	if(isSet($_GET['lang']))
	{
	$lang = $_GET['lang'];
	 
	// register the session and set the cookie
	$_SESSION['lang'] = $lang;
	 
	setcookie('lang', $lang, time() + (3600 * 24 * 30));
	}
	else if(isSet($_SESSION['lang']))
	{
	$lang = $_SESSION['lang'];
	}
	else if(isSet($_COOKIE['lang']))
	{
	$lang = $_COOKIE['lang'];
	}
	else
	{
	$lang = 'pt_br';
	}
	 
	switch ($lang) {
	  case 'en':
	  $lang_file = 'lang.en.php';
	  break;

	  case 'pt_br':
	  $lang_file = 'lang.pt_br.php';
	  break;
	 
	  default:
	  $lang_file = 'lang.pt_br.php';
	 
	}
	 
	include_once './languages/'.$lang_file;
 
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