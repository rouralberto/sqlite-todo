<?php
// home
Flight::route( 'GET /', [ 'Dashboard', 'index' ] );

// todos
Flight::route( 'GET /todos', [ 'Todos', 'index' ] );
Flight::route( 'GET /todos/[0-9]+', [ 'Todos', 'index' ] );
Flight::route( 'POST /addtodo', [ 'Todos', 'addTodo' ] );
Flight::route( 'POST /updatetodo', [ 'Todos', 'updateTodo' ] );
Flight::route( 'POST /completed', [ 'Todos', 'completed' ] );
Flight::route( 'POST /active', [ 'Todos', 'active' ] );
Flight::route( 'POST /deletealltodos', [ 'Todos', 'deletealltodos' ] );
Flight::route( 'POST /cleardb', [ 'Todos', 'cleardb' ] );

// categories
Flight::route( 'GET /categories', [ 'Categories', 'index' ] );
Flight::route( 'POST /categories', [ 'Categories', 'add_or_update' ] );

// general
Flight::route( 'POST /delete', [ 'Common', 'delete' ] );
Flight::route( 'POST /backup', [ 'Common', 'backup' ] );
Flight::route( 'POST /restore', [ 'Common', 'restore' ] );

// settings
Flight::route( 'GET /settings', [ 'Settings', 'index' ] );
