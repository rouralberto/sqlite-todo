<?php

function createDatabase() {
	global $db;

	// create categories table if not already there
	$db->exec( "CREATE TABLE IF NOT EXISTS
    categories
    (
      id INTEGER PRIMARY KEY AUTOINCREMENT,
      name TEXT
    )" );

	// create todos table if not already there
	$db->exec( "CREATE TABLE IF NOT EXISTS
    todos
    (
      id INTEGER PRIMARY KEY AUTOINCREMENT,
      categories_id INTEGER NULL DEFAULT '0',
      todo TEXT,
      extra TEXT,
      completed INTEGER CHECK(completed IN ('0','1') ) NOT NULL DEFAULT '0',
      created TEXT,
      completedon TEXT
    )" );
}

createDatabase();

function getCategories() {
	$categories = ORM::for_table( 'categories' )->order_by_asc( 'name' )->find_array();

	return $categories;
}
