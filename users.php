<?php

require 'config/config.php';
require 'controller/session_validate.php';
require 'controller/get_users.php';

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
          <h2 class='sub-header'>Usuários</h2>
          <div class='table-responsive' >
            <span class='glyphicon glyphicon-plus pull-right btn btn-sm' data-toggle="modal" data-target="#myModal" aria-hidden='true' ></span>
          <table class='table table-striped'>
          <br>
          <thead>
            <tr>
              <th><span class='glyphicon glyphicon-asterisk' aria-hidden='true'></span> Login</th>
              <th><span class='glyphicon glyphicon-user' aria-hidden='true'></span> Nome</th>
              <th><span class='glyphicon glyphicon-envelope' aria-hidden='true'></span> E-mail</th>
              <th><span class='glyphicon glyphicon-time' aria-hidden='true'></span> Data Criacao</th>
              <th><span class='glyphicon glyphicon-cog' aria-hidden='true'></span> Perfil</th>
              <th></th>
            </tr>
          </thead>
        <tbody> 
          <tr>
          <?php
          while ($row = $results->fetchArray())
          {
          echo "  
          <td>{$row['login']}</td>
          <td>{$row['name']}</td>
          <td>{$row['email']}</td>
          <td>{$row['creation_date']}</td>
          <td>{$row['profile']}</td>
          <td>
          <a href='#'><button type='button' class='btn btn-success btn-sm'>Editar</button></a>
          <a href='#'><button type='button' class='btn btn-danger btn-sm' class='btn btn-info btn-lg' data-toggle='modal' data-target='#myModal'>Apagar</button>
          </td>
          </tr>
          ";} ?>
        </tbody>
        </table>
        </div>
      </div>
      </div>
    </div>
    <div id="myModal" class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Novo usuário</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Nome">
            </div>
            <div class="form-group">
              <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="E-mail">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" aria-describedby="emailHelp" placeholder="Senha">
            </div>                        
            <div class="form-group">
              <input type="password" class="form-control" aria-describedby="emailHelp" placeholder="Repita a Senha">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            <button type="button" class="btn btn-primary">Salvar</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <?php include 'controller/js.php';?>
  </body>
</html>