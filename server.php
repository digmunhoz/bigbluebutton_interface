<?php

require_once 'config/config.php';
require_once 'controller/validate_session.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= TITLE ?></title>

    <?php include 'css/css.php'; ?>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->

            <?php include 'controller/header.php' ?>

            <?php include 'controller/menu.php'; ?>
            <!-- /.navbar-collapse -->
        </nav>

        <?php include 'controller/body_server.php'; ?>    
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php include 'js/js.php'; ?>   

</body>

</html>
