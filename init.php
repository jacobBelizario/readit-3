<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "readit";

// Notice here that we have provided the database name on the connect function
$conn = mysqli_connect($hostname, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}