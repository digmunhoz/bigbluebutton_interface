<?php

require 'config/config.php';
require 'controller/getMeetings.php';

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title><?= TITLE ?></title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="asseie8-responsive-file-warning.js"></script><![endif]-->
    <script src="asseie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <?php include 'controller/header.php'; ?>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="inicial.php">Listar Salas <span class="sr-only">(current)</span></a></li>
            <li><a href="room.php">Criar Sala de Aula</a></li>
          </ul>
          <ul class="nav nav-sidebar">
          </ul>
          <ul class="nav nav-sidebar">
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h2 class="sub-header">Lista de Salas</h2>
          <div class="table-responsive">
            <table class="table table-striped">
	<br>
	      <thead>
                <tr>
                  <th><span class="glyphicon glyphicon-facetime-video" aria-hidden="true"></span> Nome da Sala</th>
                  <th><span class="glyphicon glyphicon-time" aria-hidden="true"></span> Data Criacao</th>
                  <th><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Senha Aluno</th>
                  <th><span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span> Senha Professor</th>
                  <th><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Participantes</th>
                  <th></th>
                </tr>
              </thead>
                <tbody>
		<?php foreach ($xml->meetings->meeting as $meeting) :?>
                <tr>

		<?php 

		$name 	 		= $meeting->meetingName;
		$room_name 	 	= str_replace(' ', '+', $meeting->meetingName);
		$room_date 	 	= $meeting->createDate;
		$room_attendeePW 	= $meeting->attendeePW;
		$room_participantCount  = $meeting->participantCount;
		$room_moderatorPW	= $meeting->moderatorPW;

		$params_join_checksum  = "joinredirect=true";
		$params_join_checksum .= "&fullName=Teste+Diogo";
		$params_join_checksum .= "&meetingID={$room_name}";
		$params_join_checksum .= "&password={$room_moderatorPW}".SALT;

		$checksum_join = sha1($params_join_checksum);

		$params_join  = "join?redirect=true"; 
		$params_join .= "&fullName=Teste+Diogo";
		$params_join .= "&meetingID={$room_name}";
		$params_join .= "&password={$room_moderatorPW}";
		$params_join .= "&checksum={$checksum_join}";

		$url_join = BIGBLUEBUTTON_API."/{$params_join}";

		$params_end_checksum  = "end"; 
		$params_end_checksum .= "meetingID={$room_name}"; 
		$params_end_checksum .= "&password={$room_moderatorPW}".SALT; 

		$checksum_end = sha1($params_end_checksum);
	
		$params_end  = "end"; 
		$params_end .= "?meetingID={$room_name}"; 
		$params_end .= "&password={$room_moderatorPW}"; 
		$params_end .= "&checksum={$checksum_end}"; 

		$url_end = BIGBLUEBUTTON_API."/{$params_end}";
		?>

		  <td> <a href="room_detail.php?room=<?= $name ?>&moderatorPW=<?= $room_moderatorPW ?>"><?= $name ?></a></td>
	  	  <td><?= $room_date ?></td>
		  <td><?= $room_attendeePW ?></td>
		  <td><?= $room_moderatorPW ?></td>
		  <td><span class="badge"><?= $room_participantCount ?></span></td>
		  <td>
			<a href="<?php echo AUTH_CONFERENCE_PORTAL."?room={$name}&password={$room_moderatorPW}"; ?>" target="_blank"><button type="button" class="btn btn-success btn-sm" data-toggle="modal">Acessar</button></a>

			<a href="<?php echo AUTH_CONFERENCE_PORTAL."?room={$name}"; ?>" target="_blank"><button type="button" class="btn btn-primary btn-sm" >Link do Aluno</button></a>
			<button name="<?= $name ?>" type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#endConferenceModal">Encerrar</button>
		  </td>
                </tr>
		<?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="assevendor/jquery.min.js"><\/script>')</script>
    <script src="dibootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="assevendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="asseie10-viewport-bug-workaround.js"></script>
    <script src="js/dropdown.js"></script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>
