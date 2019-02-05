<?php
session_start();

// error reporting
ini_set('display_errors', true);
error_reporting(1);

// autoload dependencies automatically via magical composer autoload
require_once 'vendor/autoload.php';

// website configuration file
require_once 'config.php';

// custom functions
require_once 'func.php';

// error logging
if ($config['log_errors']) {
    Flight::set('flight.log_errors', true);
    $logFile = fopen($config['log_path'] . 'applog.log', 'a+');

    Flight::map('error', function (Exception $ex) use ($logFile) {
        $message = date('d-m-Y h:i:s') . PHP_EOL . $ex->getTraceAsString() . PHP_EOL . str_repeat('-', 80) . PHP_EOL . PHP_EOL;
        fwrite($logFile, $message);
        fclose($logFile);
    });
}

// view path
Flight::set('flight.views.path', 'app/views/');

// set base path variable to be used in setting css js files in views
$request = (array)Flight::request();
Flight::set('base', $request['base']);
Flight::set('controller', $request['url']);
Flight::set('lastSegment', end(explode('/', $request['url'])));

// database configuration
if ($config['database_enable']) {
    if ($config['database_type'] === 'mysql') {
        ORM::configure('mysql:host=' . $config['database_host'] . ';dbname=' . $config['database_dbname']);
        ORM::configure('username', $config['database_user']);
        ORM::configure('password', $config['database_password']);
    } elseif ($config['database_type'] === 'sqlite') {
        ORM::configure('sqlite:./db.sqlite');
        $db = ORM::get_db();

        // create needed database tables
        require_once('db.php');

        $categories = getCategories();
        Flight::set('categories_options', makeDropDown($categories));
    }
}

// set global variables
Flight::set('appname', $config['appname']);

// setup routes
require_once 'routes.php';

// flight now
Flight::start();


