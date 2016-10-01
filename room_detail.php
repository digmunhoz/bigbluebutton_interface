<?php

require 'config/config.php';
require 'controller/session_validate.php';
require 'controller/session_validate.php';

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
        <div class='col-sm-3 col-md-2 sidebar'>
          <ul class='nav nav-sidebar'> 
          <?php include 'controller/menu.php'; ?></ul> 
          <ul class='nav nav-sidebar'></ul> 
          <ul class='nav nav-sidebar'></ul> 
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h2 class="sub-header"> <?php echo $_GET['room'];?></h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <br>
              <thead>
                <tr>
                  <th><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Participante</th>
                  <th><span class="glyphicon glyphicon-lock" aria-hidden="true"></span> Perfil</th>
                  <th><span class="glyphicon glyphicon-blackboard" aria-hidden="true"></span> Apresentador</th>
                  <th><span class="glyphicon glyphicon-volume-up" aria-hidden="true"></span> Apenas Ouvindo</th>
                  <th><span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span> Microfone</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  include 'controller/getMeetingInfo.php';
                  foreach ($xml->attendees->attendee as $meeting) :
                ?>
                <tr>
                  <?php 
                  $name 		= $meeting->fullName;
                  $role 		= $meeting->role;
                  $isPresenter 	= $meeting->isPresenter;
                  $isListeningOnly 	= $meeting->isListeningOnly;
                  $hasJoinedVoice 	= $meeting->hasJoinedVoice;
                  ?>
                  <td><?= $name ?></td>
                  <td><?= $role ?></td>
                  <td><?= $isPresenter ?></td>
                  <td><?= $isListeningOnly ?></td>
                  <td><?= $hasJoinedVoice ?></td>
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
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="js/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/dropdown.js"></script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>
