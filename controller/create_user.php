<?php

	require_once '../config/config.php';
	require_once 'validate_session.php';

	if( isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['profile']) ) {

		include 'connect_db.php';

		$name 		= $_POST['name'];
		$email 		= $_POST['email'];
		$profile 	= $_POST['profile'];
		$password 	= $_POST['password'];
		$password	= sha1($password);

		$results = $db->query("INSERT INTO users (
									'name',
									'email',
									'password',
									'creation_date',
									'profile'
								) VALUES (
									'$name',
									'$email',
									'$password',
									strftime('%s','now'),
									'$profile'
								)");

        if ($results) {
                //echo '<script>alert("Usuário criado com sucesso!");</script>';
                echo '<script>window.history.back();</script>';
        }
        else {
        		$erro = $db->lastErrorMsg();
                echo "<script>alert('Error: $erro');</script>";
                echo '<script>window.history.back();</script>';
		}

	}
?>