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
    <link rel="icon" href="../../favicon.ico">

    <title><?= TITLE ?></title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
<div class="container">
<div class="panel panel-primary">
  <div class="panel-heading"><?= TITLE ?></div>
  <div class="panel-body">
      <form class="form-signin" action="controller/aluno.php" method="post">
        <h2 class="form-signin-heading"><img src="<?= URL_LOGO ?>" height="90" width="250" alt="EAD Fastsupport"/></h2>
        <label for="inputNome" ><span class="glyphicon glyphicon-user"></span> Informe seu Nome:</label>
	<input type="text" class="form-control" id="inputNome" name="name" required autofocus>
	<?php if (!isset($_GET['password'])) {
		echo "
		<br><label for='inputPassword'><span class='glyphicon glyphicon-eye-open'></span> Informe a Senha:</label>
		<input type='password' id='inputPassword' class='form-control' name='password' required >" ; 
	} 
	else {
		echo "
		<br>
		<input type='hidden' id='inputPassword' class='form-control' name='password' value='{$_GET[password]}'> "; 
	} ?>
        <?php if (!isset($_GET['room'])) {
                echo "  
	        <label for='inputRoom'>Escolha a Sala:</label>
	        <div class='dropdown'>
	        <select name='room' class='form-control' required>";
	            foreach ($xml->meetings->meeting as $meeting):
        	        echo "<option value='{$meeting->meetingName}'>{$meeting->meetingName}</option>";
                    endforeach;
                echo "</select>" ;
        }
        else {
                echo "  
                <br>
		<input type='hidden' value='{$_GET[room]}' name='room'>";
        } ?>
        <br><button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
      </form>
  </div>
</div>
    </div> <!-- /container -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/ie-emulation-modes-warning.js"></script>
    <script src="js/dropdown.js"></script>
  </body>
</html>
