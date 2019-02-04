<?php
//////////////////////////////////////////////
// General Configuration
//////////////////////////////////////////////

$config['appname'] = 'sqlite-todo';
$config['title'] = 'sqlite-todo';

// specify wheather to log errors. If false, errors will be shown on screen instead
$config['log_errors'] = false;

// Error Logging Directory Path
$config['log_path'] = '';

//////////////////////////////////////////////
// Database Configuration
//////////////////////////////////////////////
$config['database_enable'] = true; // set to true if app supports db
$config['database_type'] = 'sqlite'; // database type either mysql or sqlite

// details in case of mysql type database
$config['database_host'] = 'localhost';
$config['database_user'] = 'root';
$config['database_password'] = '';
$config['database_dbname'] = '';
