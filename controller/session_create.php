<?php

    require 'connect_db.php';

    $email      = $_POST['username'];
    $password   = $_POST['password'];
    $password   = sha1($password);

    $results    = $db->query("SELECT * FROM users where email = '{$email}' and password = '{$password}'");

    if ($results) {

    $results    = $results->fetchArray();
    $fullname   = $results['name'];
    $profile    = $results['profile'];
    $email      = $results['email'];

	    if(!empty($email)) {
		session_start();
		$_SESSION['fullname']   = urldecode($fullname);
		$_SESSION['profile']    = $profile;
		$_SESSION['email']    = $email;
		header("Location:../home.php");
		exit();
	      } else {
		echo '<script>alert("Usuário ou senha inválidos!");</script>';
		echo '<script>window.history.back();</script>';
		exit();
	      }
         
   }
               
   else {
       echo $db->lastErrorMsg();
   } 

/*

$login = 'admin';
$password = 'admin';
$password = sha1($password);
$db = new SQLite3('db/bbb_interface.db');
$results = $db->query("SELECT login,password FROM users where login = '{$login}' and password = '{$password}'");
while ($row = $results->fetchArray()) { echo $row['login'] ; }
*/

?>
