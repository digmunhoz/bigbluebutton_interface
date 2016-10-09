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
                        <form data-toggle="validator" role="form" id="newUserForm"  action="controller/update_user.php" method="post">
                          <div class="form-group">
                            <label for="name"><i class="fa fa-user"></i> Nome:</label>
                            <input type="text" id="name" name="name" class="form-control" value='<?= $_SESSION['fullname']; ?>' required >
                          </div>                          
                          <div class="form-group">
                            <label for="inputEmail" class="control-label"><i class="fa fa-envelope"></i> E-mail:</label>
                            <input type="email" class="form-control" id="inputEmail" name="email" data-error="Endereço de E-mail inválido" value='<?= $_SESSION['email']; ?>' required>
                            <div class="help-block with-errors"></div>
                          </div>
                          <div class="form-group">
                            <label for="password"><i class="fa fa-key"></i> Senha:</label>
                            <input type="password" id="password" name="password" class="form-control required" required>
                          </div>                        
                          <div class="form-group">
                            <button type="submit" class="btn btn-primary">Atualizar</button>
                          </div>                                                        
                        </form>      
                      </div>
                    </div>

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>