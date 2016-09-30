<?php

$data_to_post = array();
$data_to_post['checksum'] = CHECKSUM;

$curl = curl_init();
curl_setopt_array($curl, Array(
        CURLOPT_URL            => BIGBLUEBUTTON_API."getMeetings",
        CURLOPT_TIMEOUT        => 120,
        CURLOPT_CONNECTTIMEOUT => 30,
        CURLOPT_RETURNTRANSFER => TRUE,
        CURLOPT_ENCODING       => 'UTF-8',
        CURLOPT_POST           => sizeof($data_to_post),
        CURLOPT_POSTFIELDS     => $data_to_post
));

$data = curl_exec($curl);

curl_close($curl);

$xml = simplexml_load_string($data, 'SimpleXMLElement', LIBXML_NOCDATA);

?>
