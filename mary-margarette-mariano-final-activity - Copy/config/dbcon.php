<?php
$servername="localhost";
$username="root";
$password="";
$dbname="admin";
//create database connection
$conn = new mysqli($servername, $username, $password, $dbname);
// check connection
if ($conn->connect_error) {
	die("Connection error: ".$conn->_connect_error);
}
?>