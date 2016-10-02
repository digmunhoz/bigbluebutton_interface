<?php

if( isset($_GET['room']) && isset($_GET['moderatorPW']) ) {

		require "../config/config.php";

        $room_name 			= urlencode($_GET['room']);
        $room_moderatorPW 	= urlencode($_GET['moderatorPW']);

		$params  	 = "end"; 
		$params 	.= "meetingID={$room_name}"; 
		$params 	.= "&password={$room_moderatorPW}".SALT; 

		$checksum 	 = sha1($params);

		$params  	 = "end"; 
		$params 	.= "?meetingID={$room_name}"; 
		$params 	.= "&password={$room_moderatorPW}"; 
		$params 	.= "&checksum={$checksum}"; 

		$url 		 = BIGBLUEBUTTON_API."{$params}";

        $ch     = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        curl_close($ch);

        $xml    = simplexml_load_string($output);

        $returncode   = $xml->returncode;
        $message      = $xml->message;

        if ($returncode == 'FAILED') {
                echo "<script>alert('Erro: $message');</script>";
                echo '<script>window.history.back();</script>';
        }
        else {
                //echo '<script>alert("Sala de aula removida com sucesso!");</script>';
                //echo "<script>alert('echo r: $message');</script>";
                echo '<script>window.location="../list_rooms.php";</script>';
	}
}				
?>