<?php

	require_once '../config/config.php';
	require_once 'validate_session.php';

	if( isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) ) {

		include 'connect_db.php';

		$email_real	= $_SESSION['email'];
		$name 		= $_POST['name'];
		$email 		= $_POST['email'];
		$password 	= $_POST['password'];
		$password	= sha1($password);

		$results = $db->query("UPDATE users set 
									'name' = '$name',
									'email' = '$email',
									'password' = '$password'
								WHERE
									email = '$email_real'
								");

        if ($results) {
                echo '<script>alert("Perfil alterado com sucesso!");</script>';
                echo '<script>window.history.back();</script>';
        }
        else {
                echo "<script>alert('Erro na atualização do usuário');</script>";
                echo '<script>window.history.back();</script>';
		}

	}
?>