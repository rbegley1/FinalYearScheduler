<?php

$user = 'root';
$pass = '';

$db = 'bookingsdb';

//Connect to MySQL
$db = new mysqli('localhost', $user, $pass, $db);

//Check connection
if ($mysqli->connect_error) {
  die('Connect Error: ' . $mysqli->connect_errno . ': ' . $mysqli->connect_error);
}

?>﻿
