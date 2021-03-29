<?php
#--------Start System Configurations--------#
/*
You can set $systemConfig['ENVIRONMENT'] with two available values. Tha values are
development
production
The default value is development. When the values are set to development, 
error reporting will be enabled throughout the whole framework. 
And when the value is set to production, error reporting will be disabled. 
It is suggested to use production value while your project is active in production. 
*/
$systemConfig['ENVIRONMENT'] = 'development';

/*
$systemConfig['APP_DIR_NAME'] contains the name of the app directory of the framework.
If you need to rename the app directory name then you have to replace the value of
your new app directory name in $systemConfig['APP_DIR_NAME'].
*/
$systemConfig['APP_DIR_NAME'] = 'app';

/*
$systemConfig['VIEW_DIR_NAME'] contains the name of the view directory of the framework.
If you need to rename the view directory name then you have to replace the value of
your new view directory name in $systemConfig['VIEW_DIR_NAME'].
*/
$systemConfig['VIEW_DIR_NAME'] = 'view';

/*
$systemConfig['MODEL_DIR_NAME'] contains the name of the model directory of the framework.
If you need to rename the model directory name then you have to replace the value of
your new model directory name in $systemConfig['MODEL_DIR_NAME'].
*/
$systemConfig['MODEL_DIR_NAME'] = 'model';

/*
$systemConfig['CONTROLLER_DIR_NAME'] contains the name of the controller directory of the framework.
If you need to rename the controller directory name then you have to replace the value of
your new controller directory name in $systemConfig['CONTROLLER_DIR_NAME'].
*/
$systemConfig['CONTROLLER_DIR_NAME'] = 'controller';

/*
$systemConfig['LIBRARY_DIR_NAME'] contains the name of the library directory of the framework.
If you need to rename the library directory name then you have to replace the value of
your new library directory name in $systemConfig['LIBRARY_DIR_NAME'].
*/
$systemConfig['LIBRARY_DIR_NAME'] = 'libraries';

/*
$systemConfig['HELPER_DIR_NAME'] contains the name of the helper directory of the framework.
If you need to rename the helper directory name then you have to replace the value of
your new helper directory name in $systemConfig['HELPER_DIR_NAME'].
*/
$systemConfig['HELPER_DIR_NAME'] = 'helper';

/*
$systemConfig['HELPER_DIR_NAME'] contains the name of the default controller of the framework.
By default the default controller will handle the request of your project's root url. If you
want to change the default controller then set your desired controller name in $systemConfig['DEFAULT_CONTROLLER']
*/
$systemConfig['DEFAULT_CONTROLLER'] = 'default_controller';

/*
$systemConfig['MAINTENANCE_EXCLUDE_CONTROLLERS'] contains the routes list which will be excluded from the
maintenance mode if maintenance mode is enabled
example: $systemConfig['MAINTENANCE_EXCLUDE_CONTROLLERS'] = array('admin/login', 'admin/settings', 'admin');
If the config is set like the above example then the following routes admin/login, admin/login & admin will
be excluded from maintenance mode. It receives actual controller/method route instead of custom routes config
keys.
*/
$systemConfig['MAINTENANCE_EXCLUDE_ROUTES'] = array();

#--------End System Configurations--------#


#--------Start Autoload Configurations--------#
/*
No models are loaded automatically by default. Models name in $autoloadConfig['MODELS'] array are loaded automatically.
So if you need to load any model automatically then you should add the model name in $autoloadConfig['MODELS'] array.
example: $autoloadConfig['MODELS'] = array('login_model', 'core_model');
*/
$autoloadConfig['MODELS'] = array('default_model');

/*
No libraries are loaded automatically by default. Libraries name in $autoloadConfig['LIBRARIES'] array are loaded automatically.
So if you need to load any library automatically then you should add the library name in $autoloadConfig['LIBRARIES'] array.
Example: 
$autoloadConfig['LIBRARIES'] = array(
    'database' => array(""),
    'session' => array("")
);
The $autoloadConfig['LIBRARIES'] array is a associative array. The key of the array is the name of the library. The key value is 
an another array which contains the parameter values which will be passed to the library class constructor. Suppose you want to 
load a library where you need to pass parameters for the class initialization. Then you can add the parameters in the array which
is the value of the each associative array keys. 
Example:
$autoloadConfig['LIBRARIES'] = array(
    'database' => array("database", "admin", "password")
);
Here we are loading a library named database. The library class receives 3 parameters or the class constructor requires 3 parameters for
initializing the class. we have provided the 3 parameters value in an array as an associative array key value where the key is the
name of the library that we are loading.
*/
$autoloadConfig['LIBRARIES'] = array();

/*
Helpers name in $autoloadConfig['HELPERS'] array are loaded automatically.
So if you need to load any helper automatically then you should add the helper name in $autoloadConfig['HELPERS'] array.
*/
$autoloadConfig['HELPERS'] = array('system');
#--------End Autoload Configurations--------#


$dbConfig = array();
#Database connection configuration
#This configurations is required for database library. codEBlaze native database library is under development.
#You can use other libraries and this configurations according to you need.
$dbConfig['db_host'] = 'localhost'; //Your database host. Example: $config['db_host'] = 'localhost';
$dbConfig['db_user'] = 'root'; //Your database username. Example: $config['db_user'] = 'root';
$dbConfig['db_pass'] = ''; //Your database user password. Example: $config['db_pass'] = 'password';
$dbConfig['db_name'] = ''; //Your database name. Example: $config['db_name'] = 'testdatabase';


