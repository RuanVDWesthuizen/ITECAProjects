<?php
header('Content-Type: application/json');

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

    $sql = "select productID, name, imageID from iteca.product;";
$result = $conn->query($sql);

$data = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    echo json_encode(array("message" => "No results found"));
    exit;
}
$conn->close();

echo json_encode($data);
?>
