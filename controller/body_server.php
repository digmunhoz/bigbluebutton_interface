<?php

require_once 'validate_session.php';
require_once 'get_ec2_status.php';

?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <?= $lang['SERVER_PAGE_TITLE'] ?>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-server"></i> <?= $lang['SERVER_PAGE_SUBTITLE'] ?>
                            </li>
                            <a href="server.php"><i class='fa fa-refresh fa-pull-right'></i></a>
                        </ol>                      
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
                              <th><i class='fa fa-cloud'></i> {$lang['SERVER_PAGE_SRVNAME']}</th>
                              <th><i class='fa fa-power-off'></i> {$lang['SERVER_PAGE_SRVSTATUS']}</th>
                              <th><i class='fa fa-info-circle'></i> {$lang['SERVER_PAGE_SRVID']}</th>
                              <th><i class='fa fa-server'></i> {$lang['SERVER_PAGE_SRVTYPE']}</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>{$instanceName}</td>
                              ";
                              if (($instance['State']['Name']) == 'stopped' ) {
                              echo "
                              <td><span class='glyphicon glyphicon-asterisk' style='color:red' aria-hidden='true'></span> {$lang['SERVER_PAGE_STATEDOWN']}</td> ";
                              } elseif (($instance['State']['Name']) == 'running') {
                              echo "
                              <td><span class='glyphicon glyphicon-ok' style='color:green' aria-hidden='true'></span> {$lang['SERVER_PAGE_STATEUP']}</td>";
                              } else {
                              echo "
                              <td><span class='glyphicon glyphicon-hourglass' aria-hidden='true'></span> {$instance['State']['Name']}</td>";  
                              }
                              echo "
                              <td>{$instance['InstanceId']}</td>
                              <td>{$instance['InstanceType']}</td>
                              <td>
                              ";
                              if (($instance['State']['Name']) == 'stopped' ) {
                              echo "
                              <button type='button' class='btn btn-success btn-sm' onClick=\"if(confirm('Deseja realmente ligar o servidor?')) window.location='controller/start_ec2_instance.php';\">{$lang['SERVER_PAGE_TURNON']}</button>
                              ";
                              }
                              if (($instance['State']['Name']) == 'running' ) {
                              echo "
                              <button type='button' class='btn btn-danger btn-sm' onClick=\"if(confirm('Deseja realmente desligar o servidor?')) window.location='controller/stop_ec2_instance.php';\">{$lang['SERVER_PAGE_TURNOFF']}</button>
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
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>