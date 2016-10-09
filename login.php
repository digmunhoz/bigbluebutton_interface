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

    <?php include 'css/css.php'; ?>
    
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

      .container{
          width:550px; 
      }

      .container {
          margin-left: auto;
          margin-right: auto;
          padding-left: 15px;
          padding-right: 15px;
          padding-top: 80px;
      }

      .form-group {
          margin-bottom: -10px;
      }

      .form-signin {
          margin: 0 auto;
          max-width: 400px;
          padding: 15px;
      }      

    </style>

  </head>
  <body>
    <div class="container">
      <div class="panel panel-primary">
        <div class="panel-heading"><?= TITLE ?></div>
        <div class="panel-body">        
          <h2 class="form-signin-heading"><center><img src="<?= URL_LOGO ?>" height="90" width="250" alt="<?= TITLE ?>"/></center></h2>
          <div class='row'>
            <div class="col-lg-12">
            <?php if (empty($data) || !isset($xml->meetings->meeting->meetingName)) {
            echo"
                <div class='row'>
                    <div class='col-lg-12'>
                        <div class='alert alert-info alert-dismissable'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <i class='fa fa-exclamation-triangle'></i>  <strong>Info!</strong> Nenhuma sala disponível
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            ";
            } else {
            echo "

            <div class='row'>
                <div class='col-lg-12'>
                    <div class='alert alert-info alert-dismissable'>
                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                        <i class='fa fa-exclamation'></i> Preencha as informações abaixo e selecione a sala.
                    </div>
                </div>
            </div>

            <form class='form-signin' action='controller/aluno.php' method='post'>
                <div class='form-group row'>
                    <div class='col-xs-4'>
                            <label for='inputNome' ><i class='fa fa-user'></i> Nome:</label>
                    </div>
                    <div class='col-xs-8'>
                            <input type='text' class='form-control' id='inputNome' name='name' required autofocus>
                    </div>
                </div>
              ";          
              if (!isset($_GET['password'])) {
                echo "
                <br>                  
                <div class='form-group row'>
                    <div class='col-xs-4'>
                            <label for='inputPassword'><i class='fa fa-key'></i> Senha:</label>
                    </div>
                    <div class='col-xs-8'>
                            <input type='password' id='inputPassword' class='form-control' name='password' required >
                    </div>
                </div>              
                "; 
              } else {
                echo "
                  <input type='hidden' id='inputPassword' class='form-control' name='password' value='$_GET[password]'> 
                ";
              } 
              if (!isset($_GET['room'])) {
              echo "
                <br>                                          
                <div class='form-group row'>
                    <div class='col-xs-4'>
                      <label for='inputRoom'><i class='fa fa-graduation-cap'></i> Sala:</label>
                    </div>
                    <div class='col-xs-8'>
                      <div class='dropdown'>
                        <select name='room' class='form-control' required>                          
                      ";
                      foreach ($xml->meetings->meeting as $meeting):
                        echo "
                          <option value='{$meeting->meetingName}'>{$meeting->meetingName}</option>
                        ";
                      endforeach;
                      echo "
                        </select>
                      </div>
                    </div  
                    " ;
                    } else {
                    echo "                
                      <br>
                      <input type='hidden' value='$_GET[room]' name='room'>                  
                    ";
              }
              echo "
                <div class='form-group'>
                    <div class='col-sm-8'></div>                
                    <div class='col-sm-4'>
                            <br><button class='btn btn-sm btn-primary btn-block' type='submit'><i class='fa fa-sign-in'></i> Entrar</button>
                    </div>
                </div>              
            </form>
              ";
            } ?>                            
            </div>
          </div>
        </div>
      </div>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>