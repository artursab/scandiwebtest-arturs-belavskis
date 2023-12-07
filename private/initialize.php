<?php

use MyApp\models\Product;

require_once('../vendor/autoload.php');
include_once('db_credentials.php');
include_once('helper_functions.php');

// Connect to database
$database = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Set the database for the models
Product::set_database($database);

?>