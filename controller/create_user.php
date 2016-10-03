<?php

	require '../config/config.php';
	require 'session_validate.php';

	if( isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) ) {

		include 'connect_db.php';

		$name 		= $_POST['name'];
		$email 		= $_POST['email'];
		$password 	= $_POST['password'];
		$password	= sha1($password);

		$results = $db->query("INSERT INTO users (
									'name',
									'email',
									'password',
									'profile',
									'creation_date'
								) VALUES (
									'$name',
									'$email',
									'$password',
									2,
									strftime('%s','now')
								)");

        if ($results) {
                echo '<script>alert("Usuário criado com sucesso!");</script>';
                echo '<script>window.history.back();</script>';
        }
        else {
                echo "<script>alert('Erro na criação do usuário');</script>";
                echo '<script>window.history.back();</script>';
		}

	}
?>