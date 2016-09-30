# bigbluebutton_interface
Interface para criação e administração de salas de conferência no BigBlueButton

Simple and easy to install.
Just deploy code in your server and configure config/config.php (as below) with your BigBlueButton informations.

########## config/config.php file #################

<?php
define('TITLE',                 '');
define('URL_LOGO',              '');
define('AUTH_PORTAL',           '');
define('AUTH_CONFERENCE_PORTAL','');
define('BIGBLUEBUTTON_SERVER',  '');
define('BIGBLUEBUTTON_API',     '');
define('SALT',                  '');
define('NUMBER_ROOMS',          20);
?>

##################################################

# Dependences
php php-curl php-xml
