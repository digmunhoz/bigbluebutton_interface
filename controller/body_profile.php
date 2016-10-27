<?php

require_once 'config/config.php';
require_once 'controller/validate_session.php';

?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <?= $lang['PROFILE_PAGE_TITLE'] ?>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-user"></i> <?= $lang['PROFILE_PAGE_SUBTITLE'] ?>
                            </li>
                        </ol>
                      <div class='table-responsive'>
                        <form data-toggle="validator" role="form" id="newUserForm"  action="controller/update_user.php" method="post">
                          <div class="form-group">
                            <label for="name"><i class="fa fa-user"></i> <?= $lang['PROFILE_PAGE_USERNAME'] ?>:</label>
                            <input type="text" id="name" name="name" class="form-control" value='<?= $_SESSION['fullname']; ?>' required >
                          </div>                          
                          <div class="form-group">
                            <label for="inputEmail" class="control-label"><i class="fa fa-envelope"></i> <?= $lang['PROFILE_PAGE_EMAIL'] ?>:</label>
                            <input type="email" class="form-control" id="inputEmail" name="email" data-error="<?= $lang['PROFILE_PAGE_EMAIL_MSG'] ?>" value='<?= $_SESSION['email']; ?>' required>
                            <div class="help-block with-errors"></div>
                          </div>
                          <div class="form-group">
                            <label for="password"><i class="fa fa-key"></i> <?= $lang['PROFILE_PAGE_PASSWORD'] ?>:</label>
                            <input type="password" id="password" name="password" class="form-control required" required>
                          </div>                        
                          <div class="form-group">
                            <button type="submit" class="btn btn-primary"><?= $lang['PROFILE_PAGE_UPDATE'] ?></button>
                          </div>                                                        
                        </form>      
                      </div>
                    </div>

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>