<?php

	require_once './vendor/autoload.php';
	require_once './config/config.php';
	require_once 'session_validate.php';

	$config = array();
	$config['key'] = AWS_ACCESS_KEY_ID;
	$config['secret'] = AWS_SECRET_ACCESS_KEY;
	$config['region'] = AWS_REGION;
	$config['profile'] = AWS_PROFILE;
	$config['version'] = 'latest'; // Or Specified
	$ec2Client = \Aws\Ec2\Ec2Client::factory($config);

	//$result = $ec2Client->DescribeInstances();

	$result = $ec2Client->describeInstances(
	    ['Filters' => [
	        ['Name' => "instance-id" , 'Values' => [AWS_INSTANCE_ID]]
	//        ['Name' => 'instance-type', 'Values' => ['m1.small']],
	//        ['Name' => 'tag-key', 'Values' => ['Stage']],
	//        ['Name' => 'tag-value', 'Values' => ['Development', 'Development-Tools']],
	        ]
	    ]
	);

?>


