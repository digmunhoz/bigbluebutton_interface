<?php

require_once 'validate_session.php';
require 'getMeetings.php';

?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">    
                        <h1 class="page-header">
                            <?= $lang['ROOMS_PAGE_TITLE'] ?>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-list"></i> <?= $lang['ROOMS_PAGE_SUBTITLE'] ?>                                
                            </li>
                            <a href="list_rooms.php"><i class='fa fa-refresh fa-pull-right'></i></a>
                        </ol>  
                    <?php 
                    if (empty($data)) {
                        echo"
                            <div class='row'>
                                <div class='col-lg-12'>
                                    <div class='alert alert-danger alert-dismissable'>
                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                        <i class='fa fa-exclamation'></i>  <strong>{$lang['ALERT_CONNECT_ERROR']}</strong> {$lang['ALERT_CONNECT_MSG']}
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->
                        ";
                    } elseif ( isset($xml->meetings->meeting->meetingName)) {        
                        echo "
                            <table class='table table-striped'>
                            <thead>
                                <tr>
                                    <th><i class='fa fa-video-camera'></i> {$lang['ROOMS_PAGE_ROOM_NAME']}</th>
                                    <th><i class='fa fa-calendar'></i> {$lang['ROOMS_PAGE_ROOM_DATE']}</th>
                                    <th><i class='fa fa-unlock'></i> {$lang['ROOMS_PAGE_ROOM_ATTEPW']}</th>
                                    <th><i class='fa fa-key'></i> {$lang['ROOMS_PAGE_ROOM_MODPW']}</th>
                                    <th><i class='fa fa-users'></i> {$lang['ROOMS_PAGE_ROOM_PART']}</th>
                                    <th></th>
                                </tr>
                            </thead>    
                        ";
                        echo "              
                        <tbody> 
                        ";

                        foreach ($xml->meetings->meeting as $meeting) :
                        echo "
                            <tr>
                        ";

                        $name                   = $meeting->meetingName;
                        $room_name              = str_replace(' ', '+', $meeting->meetingName);
                        $room_date              = $meeting->createDate;
                        $room_attendeePW        = $meeting->attendeePW;
                        $room_participantCount  = $meeting->participantCount;
                        $room_moderatorPW       = $meeting->moderatorPW;
                        $fullname               = str_replace(' ', '+', $_SESSION['fullname']);

                        $params_join_checksum  = "joinredirect=true";
                        $params_join_checksum .= "&fullName=".$fullname;
                        $params_join_checksum .= "&meetingID={$room_name}";
                        $params_join_checksum .= "&password={$room_moderatorPW}".SALT;

                        $checksum_join = sha1($params_join_checksum);

                        $params_join  = "join?redirect=true"; 
                        $params_join .= "&fullName=".$fullname;
                        $params_join .= "&meetingID={$room_name}";
                        $params_join .= "&password={$room_moderatorPW}";
                        $params_join .= "&checksum={$checksum_join}";

                        $url_join = BIGBLUEBUTTON_API."{$params_join}";

                        $params_end_checksum  = "end"; 
                        $params_end_checksum .= "meetingID={$room_name}"; 
                        $params_end_checksum .= "&password={$room_moderatorPW}".SALT; 

                        $checksum_end = sha1($params_end_checksum);

                        $params_end  = "end"; 
                        $params_end .= "?meetingID={$room_name}"; 
                        $params_end .= "&password={$room_moderatorPW}"; 
                        $params_end .= "&checksum={$checksum_end}"; 

                        $url_end = BIGBLUEBUTTON_API."{$params_end}";
                        $auth_conference_portal = AUTH_CONFERENCE_PORTAL;
                        echo "
                            <td><a href='detail_room.php?room=$name&moderatorPW=$room_moderatorPW'>$name</a></td>
                            <td>$room_date</td>
                            <td>$room_attendeePW</td>
                            <td>$room_moderatorPW</td>
                            <td><span class='badge'>$room_participantCount</span></td>
                            <td>
                            <a href='$url_join' target='_blank'><button type='button' class='btn btn-success btn-sm'>{$lang['ROOMS_PAGE_MODLINK']}</button></a>
                            <a href='{$auth_conference_portal}?room=$name&password=$room_attendeePW ' target='_blank'><button type='button' class='btn btn-primary btn-sm'>{$lang['ROOMS_PAGE_ATTLINK']}</button></a>
                            <button type='button' class='btn btn-danger btn-sm' onClick=\"if(confirm('{$lang['ALERT_FINISH_ROOM']} \'$name\'?'))window.location='controller/end_room.php?room=$name&moderatorPW=$room_moderatorPW';\">{$lang['ROOMS_PAGE_FINISH']}</button>
                            </td>
                            </tr>
                        ";
                        endforeach; 

                        } else {

                        echo "
                            <div class='alert alert-info'>
                            <strong>{$lang['ALERT_INFO']}</strong> {$lang['ALERT_NO_ROOM']}</strong>
                            </div>
                        ";
                        }?> 
                        </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>