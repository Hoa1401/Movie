<?php

$server = 'localhost';
$username = 'root';
$password = '';
$database = 'movie'; 
$conn = mysqli_connect($server, $username, $password, $database);

if ($conn->connect_error) {
    die("" . $conn->connect_error);
}

?>
