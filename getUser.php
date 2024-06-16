<?php
header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input (you should add more validation as needed)
    $userName = isset($_POST['userName']) ? intval($_POST['userName']) : null;
    $password = isset($_POST['password']) ? intval($_POST['password']) : null;

    // Validate required fields
    if (!$productId || !$productName || !$productDescription || !$productPrice) {
        echo json_encode(array("error" => "Missing required fields"));
        exit;
    }

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
$sql = "SELECT * FROM iteca.users as u
left join iteca.user_passwords as up on up.userID = u.ID
where u.UserName = '?' and up.userPassword = '?';";

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
