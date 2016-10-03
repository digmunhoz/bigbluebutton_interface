<?php

	require '../config/config.php';
	require 'session_validate.php';

	if( isset($_GET['login'])) {

		include 'connect_db.php';

		$login 		= $_GET['login'];

		$results = $db->query("DELETE FROM users WHERE login = '$login' ");

        if ($results) {
                echo '<script>window.history.back();</script>';
        }
        else {
                echo "<script>alert('Erro na remoção do usuário');</script>";
                echo '<script>window.history.back();</script>';
		}

	}
?>