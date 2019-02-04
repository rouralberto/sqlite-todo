<?php
// home
Flight::route('GET /', array('Dashboard', 'index'));
Flight::route('GET /home', array('Dashboard', 'index'));
Flight::route('GET /dashboard', array('Dashboard', 'index'));

// todos
Flight::route('GET /todos', array('Todos', 'index'));
Flight::route('GET /todos/[0-9]+', array('Todos', 'index'));
Flight::route('POST /addtodo', array('Todos', 'addTodo'));
Flight::route('POST /updatetodo', array('Todos', 'updateTodo'));
Flight::route('POST /completed', array('Todos', 'completed'));
Flight::route('POST /active', array('Todos', 'active'));
Flight::route('POST /deletealltodos', array('Todos', 'deletealltodos'));
Flight::route('POST /cleardb', array('Todos', 'cleardb'));


// categories
Flight::route('GET /categories', array('Categories', 'index'));
Flight::route('POST /categories', array('Categories', 'add_or_update'));

// general
Flight::route('POST /delete', array('Common', 'delete'));
Flight::route('POST /backup', array('Common', 'backup'));
Flight::route('POST /restore', array('Common', 'restore'));

// settings
Flight::route('GET /settings', array('Settings', 'index'));
