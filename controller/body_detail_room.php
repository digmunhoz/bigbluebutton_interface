<?php

require_once 'validate_session.php';

?>

        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">    
                            <?= $lang['ROOM_DET_PAGE_TITLE'] ?>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-info-circle"></i> <?= $lang['ROOM_DET_PAGE_SUBTITLE'] ?> <font color="blue"><b><?php echo $_GET['room'];?></b></font>
                            </li>
                            <a href="detail_room.php?room=<?= $_GET['room']?>&moderatorPW=<?= $_GET['moderatorPW'];?>"><i class='fa fa-refresh fa-pull-right'></i></a>
                        </ol>
                        <table class="table table-striped">
                          <br>
                          <thead>  
                            <tr>
                              <th><i class='fa fa-users'></i>  <?= $lang['ROOM_DET_ROOM_NAME'] ?></th>
                              <th><i class='fa fa-lock'></i> <?= $lang['ROOM_DET_ROOM_PROFILE'] ?></th>
                              <th><i class='fa fa-graduation-cap'></i> <?= $lang['ROOM_DET_ROOM_PRES'] ?></th>
                              <th><i class='fa fa-volume-up'></i> <?= $lang['ROOM_DET_ROOM_LISTEN'] ?></th>
                              <th><i class='fa fa-microphone'></i> <?= $lang['ROOM_DET_ROOM_MIC'] ?></th>
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