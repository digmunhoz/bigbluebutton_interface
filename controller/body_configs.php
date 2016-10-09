<?php

require_once 'validate_session.php';
require_once 'admin_control.php';

?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <?= $lang['CONFIGS_PAGE_TITLE'] ?>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-sliders"></i> <?= $lang['CONFIGS_PAGE_SUBTITLE'] ?>
                            </li>
                        </ol>     
                        <div class="panel panel-default">
                          <div class="panel-heading"><i class="fa fa-wrench"></i> <b><?= $lang['CONFIGS_PAGE_GEN'] ?></b></div>
                          <div class="panel-body"> 
                            <fieldset disabled>
                                <div class="form-group">                                            
                                    <div class="col-xs-3">
                                      <label for="disabledSelect"><?= $lang['CONFIGS_PAGE_GEN_TITLE'] ?></label>
                                    </div>                                                                             
                                    <div class="col-xs-6">
                                      <input class="form-control" id="title" type="text" placeholder="Disabled input" disabled value="<?= TITLE ?>">
                                    </div>                                            
                                </div>                                    
                            </fieldset>
                            <br>
                            <fieldset disabled>
                                <div class="form-group">                                        
                                    <div class="col-xs-3">
                                      <label for="disabledSelect"><?= $lang['CONFIGS_PAGE_GEN_LOGO'] ?></label>
                                    </div>                                                                             
                                    <div class="col-xs-6">
                                      <input class="form-control" id="title" type="text" placeholder="Disabled input" disabled value="<?= URL_LOGO ?>">
                                    </div>                                            
                                </div>                                    
                            </fieldset>
                          </div>
                        </div>
                        <div class="panel panel-default">
                          <div class="panel-heading"><i class="fa fa-server"></i> <b><?= $lang['CONFIGS_PAGE_BBB_TITLE'] ?></b></div>
                          <div class="panel-body"> 
                            <fieldset disabled>
                                <div class="form-group">                                        
                                    <div class="col-xs-3">
                                      <label for="disabledSelect"><?= $lang['CONFIGS_PAGE_BBB_API'] ?></label>
                                    </div>                                                                             
                                    <div class="col-xs-6">
                                      <input class="form-control" id="title" type="text" placeholder="Disabled input" disabled value="<?= BIGBLUEBUTTON_API ?>">
                                    </div>                                            
                                </div>                                    
                            </fieldset>
                            <br>
                            <fieldset disabled>
                                <div class="form-group">                                        
                                    <div class="col-xs-3">
                                      <label for="disabledSelect"><?= $lang['CONFIGS_PAGE_BBB_SALT'] ?></label>
                                    </div>                                                                             
                                    <div class="col-xs-6">
                                      <input class="form-control" id="title" type="text" placeholder="Disabled input" disabled value="<?= SALT ?>">
                                    </div>                                            
                                </div>                                    
                            </fieldset>
                            <br>                                
                            <fieldset disabled>
                                <div class="form-group">                                        
                                    <div class="col-xs-3">
                                      <label for="disabledSelect"><?= $lang['CONFIGS_PAGE_BBB_PORT'] ?></label>
                                    </div>                                                                             
                                    <div class="col-xs-6">
                                      <input class="form-control" id="title" type="text" placeholder="Disabled input" disabled value="<?= AUTH_PORTAL ?>">
                                    </div>                                            
                                </div>                                    
                            </fieldset>                                                                
                          </div>
                        </div>
                        <div class="panel panel-default">
                          <div class="panel-heading"><i class="fa fa-cloud"></i> <b><?= $lang['CONFIGS_PAGE_AWS_TITLE'] ?></b></div>
                          <div class="panel-body"> 
                            <fieldset disabled>
                                <div class="form-group">                                        
                                    <div class="col-xs-3">
                                      <label for="disabledSelect"><?= $lang['CONFIGS_PAGE_AWS_AK'] ?></label>
                                    </div>                                                                             
                                    <div class="col-xs-6">
                                      <input class="form-control" id="title" type="text" placeholder="Disabled input" disabled value="<?= AWS_ACCESS_KEY_ID ?>">
                                    </div>                                            
                                </div>                                    
                            </fieldset>
                            <br>                                
                            <fieldset disabled>
                                <div class="form-group">                                        
                                    <div class="col-xs-3">
                                      <label for="disabledSelect"><?= $lang['CONFIGS_PAGE_AWS_SK'] ?></label>
                                    </div>                                                                             
                                    <div class="col-xs-6">
                                      <input class="form-control" id="title" type="text" placeholder="Disabled input" disabled value="<?= AWS_SECRET_ACCESS_KEY ?>">
                                    </div>                                            
                                </div>                                    
                            </fieldset>                                  
                            <br>                                
                            <fieldset disabled>
                                <div class="form-group">                                        
                                    <div class="col-xs-3">
                                      <label for="disabledSelect"><?= $lang['CONFIGS_PAGE_AWS_ID'] ?></label>
                                    </div>                                                                             
                                    <div class="col-xs-6">
                                      <input class="form-control" id="title" type="text" placeholder="Disabled input" disabled value="<?= AWS_INSTANCE_ID ?>">
                                    </div>                                            
                                </div>                                    
                            </fieldset>
                            <br>                                
                            <fieldset disabled>
                                <div class="form-group">                                        
                                    <div class="col-xs-3">
                                      <label for="disabledSelect"><?= $lang['CONFIGS_PAGE_AWS_REG'] ?></label>
                                    </div>                                                                             
                                    <div class="col-xs-6">
                                      <input class="form-control" id="title" type="text" placeholder="Disabled input" disabled value="<?= AWS_REGION ?>">
                                    </div>                                            
                                </div>                                    
                            </fieldset>                                                                           
                          </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>