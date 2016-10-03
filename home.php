<?php

require 'config/config.php';
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
        <div class='col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main'>
          <h2 class='sub-header'>Página Inicial</h2>
          <div class='table-responsive'></div>
            <div class="panel panel-default">
              <div class="panel-body">
                Bem vindo ao <?= TITLE ?>! 
                <br>
                <br>
                Aqui você poderá fazer video conferencias e/ou dar aulas.
                <br>
                <br> 
                Para fazer melhor uso da ferramenta, disponibilizamos alguns links de vídeos que ensinam a manusear a ferramenta.
              </div>
            </div>
            <div class="container">
              <div class="row">
                <div class="col-sm-5">
                  <h4>Configuração de Áudio</h4>
                  <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="//www.youtube.com/embed/4Y__UsUrRx0"></iframe>
                  </div>
                </div>
                <div class="col-sm-5">
                  <h4>Tutorial do Apresentador</h4>
                  <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="//www.youtube.com/embed/J9mbw00P9W0"></iframe>
                  </div>
                </div>                
              </div>
            </div>
          </div><
        </div>
      </div>
    </div>
    <?php include 'controller/js.php'; ?>
  </body>

</html>