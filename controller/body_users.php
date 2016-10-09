<?php

require_once 'validate_session.php';
require_once 'get_users.php';
require_once 'admin_control.php';

?>

        <div id="page-wrapper">

            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <?= $lang['USERS_PAGE_TITLE'] ?>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-users"></i> <?= $lang['USERS_PAGE_SUBTITLE'] ?>
                            </li>
                        </ol>
                              <span class='glyphicon glyphicon-plus pull-right btn btn-sm' data-toggle="modal" data-target="#myModal" aria-hidden='true' ></span>
                            <table class='table table-striped'>
                            <br>
                            <thead>
                              <tr>
                                <th><i class="fa fa-user"></i> <?= $lang['USERS_PAGE_USER_NAME'] ?></th>
                                <th><i class="fa fa-envelope"></i> <?= $lang['USERS_PAGE_USER_EMAIL'] ?></th>
                                <th><i class="fa fa-calendar"></i></span> <?= $lang['USERS_PAGE_USER_DATE'] ?></th>
                                <th><i class="fa fa-user"></i> <?= $lang['USERS_PAGE_USER_PROF'] ?></th>
                                <th></th>
                              </tr>
                            </thead>
                          <tbody> 
                            <tr>
                            <?php
                              while ($row = $results->fetchArray())
                              {
                                $name           = $row['name'];
                                $email          = $row['email'];
                                $creation_date  = $row['creation_date'];
                                $creation_date  = gmdate('d/m/Y', $creation_date);
                                $profile        = $row['profile'];

                                if ($profile == 1 ) {
                                  $profile = 'Admin';
                                } else  {
                                    $profile = 'Moderador';
                                }
                            echo "  
                            <td>{$name}</td>
                            <td>{$email}</td>
                            <td>{$creation_date}</td>
                            <td>{$profile}</td>
                            <td>
                            <a href='#'><button type='button' class='btn btn-success btn-sm'>{$lang['USERS_PAGE_EDIT']}</button></a>
                            <button onClick=\"if(confirm('{$lang['ALERT_DELETE_USER']} \'$name\'?'))window.location='controller/delete_user.php?login={$email}';\" type='button' class='btn btn-danger btn-sm' class='btn btn-info btn-lg' >{$lang['USERS_PAGE_DELETE']}</button>      
                            </td>
                            </tr>
                            "; } ?>
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
                              <h4 class="modal-title"><?= $lang['USERS_PAGE_NEW_USER'] ?></h4>
                            </div>
                            <form data-toggle="validator" role="form" id="newUserForm"  action="controller/create_user.php" method="post">
                              <div class="modal-body">
                                <div class="form-group">
                                  <label for="name"><i class="fa fa-user"></i> <?= $lang['USERS_PAGE_USER_NAME'] ?></label>
                                  <input type="text" id="name" name="name" class="form-control" required >
                                </div>
                                <div class="form-group">
                                  <label for="inputEmail" class="control-label"><i class="fa fa-envelope"></i> <?= $lang['USERS_PAGE_USER_EMAIL'] ?></label>
                                  <input type="email" class="form-control" id="inputEmail" name="email" data-error="Endereço de E-mail inválido" required>
                                  <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                  <label for="password"><i class="fa fa-key"></i> <?= $lang['USERS_PAGE_NEW_PW'] ?></label>
                                  <input type="password" id="password" name="password" class="form-control required" required>
                                </div>                        
                                <div class="form-group">
                                  <label for="profile"><i class="fa fa-user"></i> <?= $lang['USERS_PAGE_USER_PROF'] ?></label>
                                  <select id="profile" class="form-control required" id="sel1" name="profile">
                                    <option value="2" selected><?= $lang['USERS_PAGE_PROF_MOD'] ?></option>
                                    <option value="1"><?= $lang['USERS_PAGE_PROF_ADMIN'] ?></option>
                                  </select>
                                </div>
                              </div>
                              <div class="modal-footer">                              
                                <div class="form-group">
                                  <button type="submit" class="btn btn-primary"><?= $lang['USERS_PAGE_NEW_BUTTON'] ?></button>
                                </div>                              
                              </div>                              
                            </form>
                          </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                      </div><!-- /.modal -->
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>