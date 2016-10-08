<?php

        require_once 'validate_session.php';

        $data_to_post = array();
        //$data_to_post['checksum'] = CHECKSUM;

                $params          = "getMeetings".SALT;

                $checksum        = sha1($params);

        	$params		 = "getMeetings";
        	$params		.= "?checksum={$checksum}";

        $curl = curl_init();
        curl_setopt_array($curl, Array(
                CURLOPT_URL            => BIGBLUEBUTTON_API."$params",
                CURLOPT_TIMEOUT        => 120,
                CURLOPT_CONNECTTIMEOUT => 5,
                CURLOPT_RETURNTRANSFER => TRUE,
                CURLOPT_ENCODING       => 'UTF-8',
                CURLOPT_CONNECTTIMEOUT => 3,
                CURLOPT_TIMEOUT        => 10,
                CURLOPT_POST           => sizeof($data_to_post),
        ));

        $data = curl_exec($curl);

        curl_close($curl);        

        if (empty($data)) {

        } else {                
                $xml = simplexml_load_string($data, 'SimpleXMLElement', LIBXML_NOCDATA);        
        }

?>
