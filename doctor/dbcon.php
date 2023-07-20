<?php
$servername = "localhost";
$username = "root";
$password = "mysql";
$dbname = "drug_dispensary_tool";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if (!$conn) 
{
  die("Connection failed: " . $conn->connect_error);
}
?>
