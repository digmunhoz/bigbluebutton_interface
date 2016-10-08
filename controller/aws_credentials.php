<?php

	require_once './config/config.php';

    $credentials = new Aws\Credentials\Credentials(AWS_ACCESS_KEY_ID, AWS_SECRET_ACCESS_KEY);

    $config = array();
    $config['region'] = AWS_REGION;
    $config['credentials'] = $credentials ;
    $config['version'] = 'latest'; // Or Specified

?>
