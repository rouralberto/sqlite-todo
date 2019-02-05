<?php
session_start();

// Load dependencies
require_once 'vendor/autoload.php';
require_once 'func.php';
require_once 'routes.php';

// Setup paths
$request = (array) Flight::request();
Flight::set( 'flight.views.path', 'app/views/' );
Flight::set( 'base', $request['base'] );
Flight::set( 'controller', $request['url'] );
Flight::set( 'lastSegment', end( explode( '/', $request['url'] ) ) );

// Setup database
ORM::configure( 'sqlite:./db.sqlite' );
$db = ORM::get_db();
require_once( 'db.php' );

Flight::set( 'categories_options', makeDropDown( getCategories() ) );

Flight::start();
