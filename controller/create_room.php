<?php

if( isset($_POST['name']) && isset($_POST['welcome']) ) {

	require "../config/config.php";

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
        $params .= "&name=$_SESSION['name']";
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
	$params .= "&name=$_SESSION['name']";
	$params .= "&logoutURL=".AUTH_CONFERENCE_PORTAL;
	$params .= "&welcome={$welcome}";
	$params .= "&checksum={$checksum}";

        $url = $params;

        file_get_contents($url);

        echo '<script>alert("Sala de aula criada com sucesso!");</script>';
        echo '<script>window.location="../list_rooms.php";</script>';
	}
else {

        echo '<script>alert("Erro ao criar sala de aula!");</script>';
        echo '<script>window.history.back();</script>';

}
?>
