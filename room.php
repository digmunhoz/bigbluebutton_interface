<?php

require 'config/config.php';

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
            <li><a href="inicial.php">Listar Salas</a></li>
            <li class="active"><a href="room.php">Criar Sala de Aula<span class="sr-only">(current)</span></a></li>
          </ul>
          <ul class="nav nav-sidebar">
          </ul>
          <ul class="nav nav-sidebar">
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h2 class="sub-header">Criação de Conferencias</h2>
          <div class="table-responsive">
	  <br>
		<form action="controller/create_room.php" method="post">
		  <div class="form-group">
		    <label for="exampleTextarea">Nome da Sala de Aula</label>
		    <textarea class="form-control" id="exampleTextarea" name="name" rows="1" required="true"></textarea>
		  </div>  
		  <div class="form-group">
		    <label for="exampleTextarea">Mensagem de Boas vindas da sala</label>
		    <textarea class="form-control" id="exampleTextarea" name="welcome" rows="3" required="true"></textarea>
		  </div> 
		  <div class="form-group">
		    <label for="exampleSelect1">Quantidade de Participantes</label>
		    <select class="form-control" name="maxParticipants" id="exampleSelect1">
			<?php for ($i = 1; $i <= NUMBER_ROOMS; $i++): ?>
			      <option name="maxParticipants"><?= $i ?></option>
			<?php endfor; ?>
		    </select>
		  </div> 
		  <!--
		  <div class="form-group">
		    	<label for="passwordAttendee">Senha do Aluno</label>
			<input type="password" id="passwordAttendee" class="form-control" name="passwordAttendee" required>
		  </div>
		  --> 
		  <button type="submit" class="btn btn-primary">Criar</button>
		</form>
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
  </body>
</html>
