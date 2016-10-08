<?php

require 'config/config.php';
require 'controller/session_validate.php';
require 'get_ec2_status.php';

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
    
    <link href="css/navbar-fixed-top.css" rel="stylesheet">
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
        <div class='col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main'>
          <h2 class='sub-header'>Servidor</h2>
          <div class='table-responsive'>

          <?php

          $reservations = $result['Reservations'];
          foreach ($reservations as $reservation) {
              $instances = $reservation['Instances'];
              foreach ($instances as $instance) {
                  $instanceName = '';
                  $stage = '';
                  foreach ($instance['Tags'] as $tag) {
                      if ($tag['Key'] == 'Name') {
                          $instanceName = $tag['Value'];
                      }
                      if (@$tag['Key'] == 'Stage') {
                          $stage = $tag['Value'];
                      }
                  }
            echo "
              <table class='table table-striped'>
              <br>
              <thead>
                <tr>
                  <th><span class='glyphicon glyphicon-facetime-video' aria-hidden='true'></span> Nome do Servidor</th>
                  <th><span class='glyphicon glyphicon-time' aria-hidden='true'></span> Status</th>
                  <th><span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span> ID do Servidor</th>
                  <th><span class='glyphicon glyphicon-eye-close' aria-hidden='true'></span> Tipo do Servidor</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>{$instanceName}</td>
                  <td>{$instance['State']['Name']}</td>
                  <td>{$instance['InstanceId']}</td>
                  <td>{$instance['InstanceType']}</td>
                  <td>
                  ";
                  if (($instance['State']['Name']) == 'stopped' ) {
                  echo "
                  <button type='button' class='btn btn-success btn-sm' onClick=\"if(confirm('Deseja realmente ligar o servidor?')) window.location='start_ec2_instance.php';\">Ligar</button>
                  ";
                  }
                  if (($instance['State']['Name']) == 'running' ) {
                  echo "
                  <button type='button' class='btn btn-danger btn-sm' onClick=\"if(confirm('Deseja realmente desligar o servidor?')) window.location='stop_ec2_instance.php';\">Desligar</button>
                  ";
                  }
              echo "
                  </td>
                </tr>
              </tbody>
            ";
                }
            }
            ?>
          </div>
        </div>
      </div>
    </div>
    <?php include 'controller/js.php';?>
  </body>

</html>