<?php // Script connect.php

  // Set the database access information as constants...
  DEFINE ('DB_USER', 'gcds2901879');
  DEFINE ('DB_PASSWORD', '');
  DEFINE ('DB_HOST', '127.0.0.1');
  DEFINE ('DB_NAME', 'gym');

  // Make the connection...
  $db = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
  OR die ('Could not connect to MySQL! ' . mysqli_connect_error());

  // Set the encoding...
  mysqli_set_charset($db, 'utf8');
  
 // require_once('connect.php'); connection with the database in another page

?>
