<?php

		require_once '../vendor/autoload.php';
		require_once '../config/config.php';
		require_once 'session_validate.php';

		$config = array();
		$config['key'] = AWS_ACCESS_KEY_ID;
		$config['secret'] = AWS_SECRET_ACCESS_KEY;
		$config['region'] = AWS_REGION;
		$config['profile'] = AWS_PROFILE;
		$config['version'] = 'latest'; // Or Specified
		$ec2Client = \Aws\Ec2\Ec2Client::factory($config);

		$results = $ec2Client->startInstances(array(
		    // InstanceIds is required
		    'InstanceIds' => array(AWS_INSTANCE_ID),
		));

        if ($results) {
                //echo '<script>alert("Usuário criado com sucesso!");</script>';
                echo '<script>window.history.back();</script>';
        }
        else {
                echo "<script>alert('Erro ao ligar o servidor');</script>";
                echo '<script>window.history.back();</script>';
		}

?>


