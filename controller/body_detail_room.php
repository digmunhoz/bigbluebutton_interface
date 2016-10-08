<?php

require_once 'validate_session.php';

?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Detalhes da Sala
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-info-circle"></i> Detalhes da sala de aula <font color="blue"><b><?php echo $_GET['room'];?></b></font>
                            </li>
                            <a href="detail_room.php?room=<?= $_GET['room']?>&moderatorPW=<?= $_GET['moderatorPW'];?>"><i class='fa fa-refresh fa-pull-right'></i></a>
                        </ol>
                        <table class="table table-striped">
                          <br>
                          <thead>
                            <tr>
                              <th><i class='fa fa-users'></i>  Participante</th>
                              <th><i class='fa fa-lock'></i> Perfil</th>
                              <th><i class='fa fa-graduation-cap'></i> Apresentador</th>
                              <th><i class='fa fa-volume-up'></i> Apenas Ouvindo</th>
                              <th><i class='fa fa-microphone'></i> Microfone</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                              include 'controller/getMeetingInfo.php';
                              foreach ($xml->attendees->attendee as $meeting) :
                            ?>
                            <tr>
                              <?php 
                              $name         = $meeting->fullName;
                              $role         = $meeting->role;
                              $isPresenter  = $meeting->isPresenter;
                              $isListeningOnly  = $meeting->isListeningOnly;
                              $hasJoinedVoice   = $meeting->hasJoinedVoice;
                              ?>
                              <td><?= $name ?></td>
                              <td><?= $role ?></td>
                              <td><?= $isPresenter ?></td>
                              <td><?= $isListeningOnly ?></td>
                              <td><?= $hasJoinedVoice ?></td>
                            </tr>
                            <?php endforeach; ?>
                          </tbody>
                        </table>        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>