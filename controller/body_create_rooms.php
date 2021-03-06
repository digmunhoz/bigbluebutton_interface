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
                            <?= $lang['ROOM_CT_PAGE_TITLE']?>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-plus-circle"></i> <?= $lang['ROOM_CT_PAGE_SUBTITLE']?>
                            </li>
                            <a href="create_rooms.php"><i class='fa fa-refresh fa-pull-right'></i></a>
                        </ol>
                    <?php         
                    if (empty($data)) {
                        echo"
                            <div class='row'>
                                <div class='col-lg-12'>
                                    <div class='alert alert-danger alert-dismissable'>
                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                        <i class='fa fa-exclamation'></i>  <strong>Problema de conexão:</strong> Não foi possível estabelecer a conexão com o servidor.
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->
                        ";
                    } else {
                        echo "
                          <form action='controller/create_room.php' method='post'>
                            <div class='form-group'>
                              <label for='exampleTextarea'>{$lang['ROOM_CT_FORM_NAME']}</label>
                              <textarea class='form-control' id='exampleTextarea' name='name' rows='1' required='true'></textarea>
                            </div>  
                            <div class='form-group'>
                              <label for='exampleTextarea'>{$lang['ROOM_CT_FORM_MSG']}</label>
                              <textarea class='form-control' id='exampleTextarea' name='welcome' rows='3' required='true'></textarea>
                            </div> 
                            <button type='submit' class='btn btn-primary'>Criar</button>
                          </form>                        
                        ";
                    } ?>
                    <!-- /.row -->
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->

        </div>