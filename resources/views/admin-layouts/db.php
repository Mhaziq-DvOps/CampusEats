<?php
session_start();

// initializing variables
$username = "@locahost";
//$email    = "";
$errors = array(); 

// connect to the database
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "CampusEats");
   $db = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}
?>