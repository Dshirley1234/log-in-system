<?php

$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "logintest";

$conection = mysqli_connect($hostname, $username, $password, $dbname) or die("Database connection not established.");