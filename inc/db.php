<?php

// Connect to Mysqli

$DB_HOST = 'localhost';
$DB_USER = 'id8652293_root';
$DB_PASS = 'Vghfadec786';
$DB_NAME = 'id8652293_lawyer';

$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

if(!$conn){
    die('Connection Failed:'.mysqli_connect_error());
}

?>