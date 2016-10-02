<?php
echo '
    <nav class="navbar navbar-inverse navbar-fixed-top">
    <div id="navbar" class="navbar-collapse collapse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="home.php">'.TITLE.'</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#"><span class="glyphicon glyphicon-user"></span> '.$_SESSION['name'].'</a></li>
          <li class="dropdown">

            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" ><span class="glyphicon glyphicon-cog"></span> Configurações <span class="caret"></span></a>

            <ul class="dropdown-menu">
              <li><a href="./users.php"><span class="glyphicon glyphicon-user"></span> Usuários</a></li>
              <li><a href="#"><span class="glyphicon glyphicon-wrench"></span> Sistema</a></li>
            </ul>
          </li>          

          <li><a href="./logout.php"><span class="glyphicon glyphicon-off"></span> Sair</a></li>
        </ul>
      </div>
    </nav>
';
?>


