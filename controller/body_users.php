<?php

require_once 'validate_session.php';
require_once 'get_users.php';

?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Usuários
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-users"></i> Usuários cadastrados no sistema
                            </li>
                        </ol>
                              <span class='glyphicon glyphicon-plus pull-right btn btn-sm' data-toggle="modal" data-target="#myModal" aria-hidden='true' ></span>
                            <table class='table table-striped'>
                            <br>
                            <thead>
                              <tr>
                                <th><span class='glyphicon glyphicon-user' aria-hidden='true'></span> Nome</th>
                                <th><span class='glyphicon glyphicon-envelope' aria-hidden='true'></span> E-mail</th>
                                <th><span class='glyphicon glyphicon-time' aria-hidden='true'></span> Data Criacao</th>
                                <th><span class='glyphicon glyphicon-cog' aria-hidden='true'></span> Perfil</th>
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
                            <a href='#'><button type='button' class='btn btn-success btn-sm'>Editar</button></a>
                            <button onClick=\"if(confirm('Deseja realmente apagar o usuario \'$name\'?'))window.location='controller/delete_user.php?login={$email}';\" type='button' class='btn btn-danger btn-sm' class='btn btn-info btn-lg' >Apagar</button>      
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
                              <h4 class="modal-title">Novo usuário</h4>
                            </div>
                            <form id="newUserForm"  action="controller/create_user.php" method="post">
                              <div class="modal-body">
                                <div class="form-group">
                                  <label for="name"><span class="glyphicon glyphicon-user"></span> Nome:</label>
                                  <input type="text" id="name" name="name" class="form-control required" >
                                </div>
                                <div class="form-group">
                                  <label for="email"><span class="glyphicon glyphicon-envelope"></span> E-mail:</label>
                                  <input type="email" class="form-control required" size="50" id="email" name="email" required>
                                </div>
                                <div class="form-group">
                                  <label for="password"><span class="glyphicon glyphicon-eye-open"></span> Senha:</label>
                                  <input type="password" id="password" name="password" class="form-control required" required>
                                </div>                        
                                <div class="form-group">
                                  <label for="profile"><span class="glyphicon glyphicon-wrench"></span> Perfil:</label>
                                  <select id="profile" class="form-control required" id="sel1" name="profile">
                                    <option value="2" selected>Moderador</option>
                                    <option value="1">Admin</option>
                                  </select>
                                </div>
                              </div>
                            </form>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                              <button type="button" onclick='form_submit()' class="btn btn-primary">Salvar</button>
                            </div>
                          </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                      </div><!-- /.modal -->
                      <script type="text/javascript">
                      function form_submit() {
                        document.getElementById("newUserForm").submit();
                       }    
                      </script>
                      <script type="text/javascript">
                          function confirm_delete() {
                              return confirm("Tem certeza que deseja remover o usuário?");
                          }
                      </script>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>