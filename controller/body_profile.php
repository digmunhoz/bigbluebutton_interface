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
                            Perfil 
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-user"></i> Informações de Usuário
                            </li>
                        </ol>
                      <div class='table-responsive'>
                        <div class="form-group">
                          <label for="usr">Nome:</label>
                          <input type="text" class="form-control" id="usr" disabled value='<?= $_SESSION['fullname']; ?>'>
                        </div>
                        <div class="form-group">
                          <label for="usr">E-mail:</label>
                          <input type="text" class="form-control" id="usr" disabled value='<?= $_SESSION['email']; ?>'>
                        </div>                        
                        <div class="form-group">
                          <label for="pwd">Password:</label>
                          <input type="password" class="form-control" id="pwd" disabled value='*********'>
                        </div>      
                      </div>
                    </div>

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>