<?php

if( isset($_POST['name']) && isset($_POST['welcome']) ) {

	require_once "../config/config.php";

        $name = urlencode($_POST['name']);
        $welcome = urlencode($_POST['welcome']);
        $maxParticipants = MAX_PARTICIPANTS;
        $moderatorPW = rand(1000,9999);
        $attendeePW = rand(1000,9999);

        $params  = "createallowStartStopRecording=false";
	$params .= "&record=false";
	$params .= "&voiceBridge=78014";
	$params .= "&autoStartRecording=false";
        $params .= "&attendeePW={$attendeePW}";
        $params .= "&maxParticipants={$maxParticipants}";
        $params .= "&meetingID={$name}";
        $params .= "&moderatorPW={$moderatorPW}";
        $params .= "&name={$name}";
        $params .= "&logoutURL=".AUTH_CONFERENCE_PORTAL;
        $params .= "&welcome={$welcome}".SALT;

        $checksum = sha1($params);

	$params  = BIGBLUEBUTTON_API;
	$params .= "create";
	$params .= "?allowStartStopRecording=false";
	$params .= "&record=false";
	$params .= "&voiceBridge=78014";
	$params .= "&autoStartRecording=false";
	$params .= "&attendeePW={$attendeePW}";
	$params .= "&maxParticipants={$maxParticipants}";
	$params .= "&meetingID={$name}";
	$params .= "&moderatorPW={$moderatorPW}";
	$params .= "&name={$name}";
	$params .= "&logoutURL=".AUTH_CONFERENCE_PORTAL;
	$params .= "&welcome={$welcome}";
	$params .= "&checksum={$checksum}";

        $url    = $params;

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
                echo '<script>window.location="../list_rooms.php";</script>';
	}
}
?>
