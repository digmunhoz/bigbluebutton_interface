<?php

	require '../config/config.php';
	require 'validate_session.php';

	if( isset($_GET['login'])) {

		include 'connect_db.php';

		$login 		= $_GET['login'];

		$results = $db->query("DELETE FROM users WHERE email = '$login' ");

        if ($results) {
                echo '<script>window.history.back();</script>';
        }
        else {
                echo "<script>alert('Erro na remoção do usuário');</script>";
                echo '<script>window.history.back();</script>';
		}

	}
?>