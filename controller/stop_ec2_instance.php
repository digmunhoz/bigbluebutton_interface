<?php

	require_once '../vendor/autoload.php';
	require_once '../config/config.php';
	require_once 'validate_session.php';
	include 'aws_credentials.php';

	$ec2Client = \Aws\Ec2\Ec2Client::factory($config);

	$results = $ec2Client->stopInstances(array(
	    // InstanceIds is required
	    'InstanceIds' => array(AWS_INSTANCE_ID),
	));

    if ($results) {
            //echo '<script>alert("Usuário criado com sucesso!");</script>';
            echo '<script>window.history.back();</script>';
    }
    else {
            echo "<script>alert('Erro ao desligar o servidor');</script>";
            echo '<script>window.history.back();</script>';
	}

?>