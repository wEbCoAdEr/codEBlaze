<?php

$systemConfig = array();
#Database connection configuration
$systemConfig['ENVIRONMENT'] = 'development'; //Your database host. Example: $config['db_host'] = 'localhost';
$systemConfig['APP_DIR_NAME'] = 'app';
$systemConfig['VIEW_DIR_NAME'] = 'view';
$systemConfig['MODEL_DIR_NAME'] = 'model';
$systemConfig['CONTROLLER_DIR_NAME'] = 'controller';
$systemConfig['LIBRARY_DIR_NAME'] = 'libraries';
$systemConfig['HELPER_DIR_NAME'] = 'helper';
$systemConfig['DEFAULT_CONTROLLER'] = 'default_controller';

$autoloadConfig['MODELS'] = array('default_model');
$autoloadConfig['LIBRARIES'] = array(
    'database' => array("webcoader", "wpassword")
);
$autoloadConfig['HELPERS'] = array('system');


$dbConfig = array();
#Database connection configuration
$dbConfig['db_host'] = 'localhost'; //Your database host. Example: $config['db_host'] = 'localhost';
$dbConfig['db_user'] = 'webcoader'; //Your database username. Example: $config['db_user'] = 'root';
$dbConfig['db_pass'] = ''; //Your database user password. Example: $config['db_pass'] = 'password';
$dbConfig['db_name'] = 'practise_phpoop'; //Your database name. Example: $config['db_name'] = 'testdatabase';
