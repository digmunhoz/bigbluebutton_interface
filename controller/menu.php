        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'dashboard.php'){echo 'active'; }else { echo ''; } ?>">
                    <a href='dashboard.php'><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                </li>
                <li class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'list_rooms.php' || basename($_SERVER['SCRIPT_NAME']) == 'create_rooms.php'  ){echo 'active'; }else { echo ''; } ?>">
                    <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-graduation-cap"></i> Salas de Aula <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="demo" class="collapse">
                        <li>
                            <a href="list_rooms.php"><i class="fa fa-fw fa-list"></i> Listar</a>
                        </li>
                        <li>
                            <a href="create_rooms.php"><i class="fa fa-fw fa-plus-circle"></i> Criar</a>
                        </li>
                    </ul>
                </li>
                <li class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'server.php'){echo 'active'; }else { echo ''; } ?>">
                    <a href='server.php'><i class="fa fa-fw fa-server"></i> Servidor</a>
                </li>
            </ul>
        </div>