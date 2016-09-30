<?php

if( isset($_POST['name']) && isset($_POST['password']) && isset($_POST['room']) ) {
        require "../config/config.php";

        $name 	  = urlencode($_POST['name']);
        $password = $_POST['password'];
        $room 	  = urlencode($_POST['room']);

        $params  = "joinredirect=true";
        $params .= "&fullName={$name}";
        $params .= "&meetingID={$room}";
        $params .= "&password={$password}".SALT;

        $checksum = sha1($params);

        $url = BIGBLUEBUTTON_API."join?redirect=true&fullName={$name}&meetingID={$room}&password={$password}&checksum={$checksum}";

        echo "<script>window.location='{$url}';</script>";

	} 

else { 

        //echo '<script>alert("Erro ao entrar na sala de aula!");</script>';
        echo "<script>alert('Sala: $room Pass: $password');</script>";
        echo '<script>window.history.back();</script>';

}

?>
