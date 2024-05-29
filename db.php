<?php
$servername = "localhost";//"ProjectDB";
$username = "public_User";
$password = "ILuvCoding76";
$dbname = "iteca";//"my_ITECA_Project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
