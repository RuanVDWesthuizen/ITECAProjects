<?php
// Check if the request is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input (you should add more validation as needed)
    $productId = isset($_POST['productId']) ? intval($_POST['productId']) : null;
    $userId = isset($_POST['userid']) ? intval($_POST['userid']) : null;

    // Validate required fields
    if (!$productId || !$productName || !$productDescription || !$productPrice) {
        echo json_encode(array("error" => "Missing required fields"));
        exit;
    }

    // Database configuration
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

    // Insert into orders table (assuming you have an orders table)
    $sql = "
set @productID = ?;
set @userID = ?;
set @price = 0;
set @now = CURDATE();
select @price := price from iteca.product where productID = @productID; 

INSERT INTO iteca.order (productID, userID, orderDate, totalAmount, status)
            VALUES (@productID, @userID, @now, @price, 1)";

    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isss", $productId, $productName, $productDescription, $productPrice);

    // Execute the statement
    if ($stmt->execute()) {
        $orderId = $stmt->insert_id; // Get the ID of the inserted order

        // Optionally, you can insert into order_items table if needed
        // This assumes you have a separate table to track order items

        // Close statement and connection
        $stmt->close();
        $conn->close();

        echo json_encode(array("success" => "Order added successfully", "orderId" => $orderId));
        exit;
    } else {
        echo json_encode(array("error" => "Error inserting order: " . $conn->error));
        exit;
    }
} else {
    echo json_encode(array("error" => "Invalid request method"));
    exit;
}
?>
