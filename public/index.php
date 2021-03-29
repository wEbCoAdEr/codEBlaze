<?php

/**
 * codEBlaze
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2020, Skarbol
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package    codEBlaze
 * @author    wEbCoAdEr
 * @copyright    Copyright (c) 2020, Skarbol (https://skarbol.com/)
 * @license    https://opensource.org/licenses/MIT	MIT License
 * @link    https://codeblaze.skarbol.com
 * @since    Version 1.0
 */

//Defines system root directory
define('SYSTEM_ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);

//Loads configs & routes
include SYSTEM_ROOT . 'config.php';
include SYSTEM_ROOT . 'routes.php';

//Defines and process environmental setup
define('ENVIRONMENT', $systemConfig['ENVIRONMENT']);

switch (ENVIRONMENT):
    case "development":
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        break;
    case "production":
        ini_set('display_errors', 0);
        error_reporting(0);
        break;
    default:
        header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
        echo 'Invalid application environment setting. Please set the application environment from the config file';
        exit();
endswitch;

//Defines APP directory
define('APP', SYSTEM_ROOT . $systemConfig['APP_DIR_NAME'] . DIRECTORY_SEPARATOR);
if (!is_dir(APP)) {
    header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
    echo 'Invalid application directory configuration or application directory not found';
    exit();
}

//Defines VIEW directory
define('VIEW', APP . $systemConfig['VIEW_DIR_NAME'] . DIRECTORY_SEPARATOR);
if (!is_dir(VIEW)) {
    header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
    echo 'Invalid view directory configuration or view directory not found';
    exit();
}

//Defines MODEL directory
define('MODEL', APP . $systemConfig['MODEL_DIR_NAME'] . DIRECTORY_SEPARATOR);
if (!is_dir(MODEL)) {
    header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
    echo 'Invalid model directory configuration or model directory not found';
    exit();
}

//Defines CORE directory
define('CORE', SYSTEM_ROOT . 'core' . DIRECTORY_SEPARATOR);
if (!is_dir(CORE)) {
    header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
    echo 'Invalid core directory configuration or core directory not found';
    exit();
}

//Defines CONTROLLER directory
define('CONTROLLER', APP . $systemConfig['CONTROLLER_DIR_NAME'] . DIRECTORY_SEPARATOR);
if (!is_dir(CONTROLLER)) {
    header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
    echo 'Invalid model directory configuration or model directory not found';
    exit();
}

//Defines LIBRARY directory
define('LIBRARY', APP . $systemConfig['LIBRARY_DIR_NAME'] . DIRECTORY_SEPARATOR);
if (!is_dir(LIBRARY)) {
    header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
    echo 'Invalid library directory configuration or library directory not found';
    exit();
}

//Defines HELPER directory
define('HELPER', APP . $systemConfig['HELPER_DIR_NAME'] . DIRECTORY_SEPARATOR);
if (!is_dir(HELPER)) {
    header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
    echo 'Invalid helper directory configuration or helper directory not found';
    exit();
}

//Stores component directories in an array
$COMPONENTS_ARR = array(SYSTEM_ROOT, APP, CORE, CONTROLLER);

//Sets include path by adding component directories to include path and register autoload
set_include_path(get_include_path() . PATH_SEPARATOR . implode(PATH_SEPARATOR, $COMPONENTS_ARR));

spl_autoload_register();

//Initialize codeblaze class
new codeblaze();
