<?php

require_once './config/config.php';
require_once './controller/validate_session.php';

$fullname = $_SESSION['fullname'];
$profile  = $_SESSION['profile'];

?>

            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="dashboard.php"><i class="fa fa-video-camera"></i> <?= TITLE ?></a>
            </div>

            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
               <?php if ($profile == 1 ) {
               echo "
               <li class='dropdown'>
                <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' ><i class='fa fa-cogs'></i> {$lang['HEADER_SETTINGS']} <span class='caret'></span></a>
                <ul class='dropdown-menu'>
                  <li>
                    <a href='users.php'><i class='fa fa-users'></i> {$lang['HEADER_SETTINGS_USERS']}</a>
                  </li>
                  <li>
                    <a href='configs.php'><i class='fa fa-sliders'></i> {$lang['HEADER_SETTINGS_SYSTEM']}</a>
                  </li>                  
                </ul>
               </li> ";} ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?= $fullname ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="profile.php"><i class="fa fa-fw fa-user"></i> <?= $lang['HEADER_USER_PROFILE'] ?></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> <?= $lang['HEADER_USER_LOGOUT'] ?></a>
                        </li>
                    </ul>
                </li>                       
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-globe"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>                            
                            <a href="<?= $_SERVER['SCRIPT_NAME'] ?>?lang=pt_br"><img src="images/Brazil.png" height="16" width="22">Portugues</a>
                        </li>
                        <li>
                            <a href="<?= $_SERVER['SCRIPT_NAME'] ?>?lang=en"><span class="lang-sm lang-lbl" lang="en"></span></a>
                        </li>
                    </ul>
                </li>                                       
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->