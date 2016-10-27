<?php

    require_once './vendor/autoload.php';
    require_once './config/config.php';
    require_once 'validate_session.php';

    include 'aws_credentials.php';
    
    $ec2Client = \Aws\Ec2\Ec2Client::factory($config);

    $result = $ec2Client->describeInstances(
        ['Filters' => [
            ['Name' => "instance-id" , 'Values' => [AWS_INSTANCE_ID]]
            ]
        ]
    );

?>