    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script><?php

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

     <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <style type="text/css">

      body {
        height: 100%;
        margin: 0;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.6)), url("images/background.jpg");
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;

      }  

      .container{width:550px}

      .container {
          margin-left: auto;
          margin-right: auto;
          padding-left: 15px;
          padding-right: 15px;
          padding-top: 80px;
      }

      .form-signin {
          margin: 0 auto;
          max-width: 330px;
          padding: 15px;
      }

    </style>

  </head>
  <body>
    <div class="container">
      <div class="panel panel-primary">
        <div class="panel-heading"><?= TITLE ?></div>
        <div class="panel-body">
         <form class="form-signin" action="controller/aluno.php" method="post">
            <h2 class="form-signin-heading"><img src="<?= URL_LOGO ?>" height="90" width="250" alt="<?= TITLE ?>"/></h2>
            <label for="inputNome" ><span class="glyphicon glyphicon-user"></span> Informe seu Nome:</label>
            <input type="text" class="form-control" id="inputNome" name="name" required autofocus>
            <?php if (!isset($_GET['password'])) {
              echo "
                <br>
                <label for='inputPassword'><span class='glyphicon glyphicon-eye-open'></span> Informe a Senha:</label>
                <input type='password' id='inputPassword' class='form-control' name='password' required >
              "; 
            } else {
              echo "
                <br>
                <input type='hidden' id='inputPassword' class='form-control' name='password' value='$_GET[password]'> 
              ";
            } ?>
            <?php if (!isset($_GET['room'])) {
              echo "  
                <label for='inputRoom'>Escolha a Sala:</label>
                <div class='dropdown'>
                <select name='room' class='form-control' required>";
                foreach ($xml->meetings->meeting as $meeting):
                echo "
                  <option value='{$meeting->meetingName}'>{$meeting->meetingName}</option>
                ";
                endforeach;
                echo "
                  </select>
                " ;
            } else {
              echo "                
                <br>
                <input type='hidden' value='$_GET[room]' name='room'>
              ";
            } ?>
            <br><button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
          </form>
        </div>
      </div>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
    <style type="text/css">

      body {
        height: 100%;
        margin: 0;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.6)), url("images/background.jpg");
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;

      }  

      .container{width:550px}

      .container {
          margin-left: auto;
          margin-right: auto;
          padding-left: 15px;
          padding-right: 15px;
          padding-top: 80px;
      }

      .form-signin {
          margin: 0 auto;
          max-width: 330px;
          padding: 15px;
      }

    </style>

