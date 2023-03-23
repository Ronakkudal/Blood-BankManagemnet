<?php
$server = "localhost";
$username = "root";
$password = "root";
$dbname = "project";
$conn = mysqli_connect($server, $username, $password, $dbname);

if (!$conn) {
 die("Connection failed: " . mysqli_connect_error());
}
$db= new PDO("mysql:host=localhost;dbname=project","root","root");
?>