<?php
session_start();

define('__BASEURL__', 'http://localhost/workshop/');

$hostname = "localhost";
$username = "root";
$password = "";
$database = "db_blog";

$link = mysqli_connect($hostname, $username, $password, $database) or die(mysqli_connect_error($link));
?>