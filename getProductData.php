<?php
header('Content-Type: application/json');

$servername = "localhost";
$username = "public_User";
$password = "ILuvCoding76";
$dbname = "iteca";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Validate and sanitize input
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $productId = intval($_GET['id']);
} else {
    echo json_encode(array("error" => "Invalid product ID"));
    exit;
}

// Prepare statement
$sql = "SELECT p.productID, p.name, p.description, p.price, p.imageID, c.categoryName 
        FROM iteca.product AS p
        LEFT JOIN iteca.category AS c ON c.categoryID = p.categoryID 
        WHERE p.productID = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $productId);
$stmt->execute();
$result = $stmt->get_result();

$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    $data[] = array("message" => "No results found");
}

$stmt->close();
$conn->close();

echo json_encode($data);
?>
